<?php

namespace App\Http\Controllers\Api\Fine;

use App\Models\Fine\Ticket;
use Carbon\Carbon as Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Access\User\Motorist;
use Illuminate\Support\Facades\Auth;
use App\Notifications\Api\Fine\UserReceivesTicket;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Make sure the logged in user has permission.
        //Auth::user()->hasPermission('create-ticket')

        // validate request
        $this->validate($request, [
            'license_no' => 'required|exists:motorists',
            'vehicle_no' => 'required',
            'lat' => 'nullable|numeric|between:-90,90',
            'lng' => 'nullable|numeric|between:-180,180',
            'location' => 'required_if:lat,null|required_if:lng,null',
            'offences' => 'required|array|exists:offences,id',
        ]);

        $officer = Auth::user()->officer->load('station');

        $input = $request->only('license_no', 'vehicle_no', 'lat', 'lng', 'location', 'remarks', 'offences');

        $motorist = Motorist::where('license_no', $input['license_no'])->first();

        // Other attributs needed to create a ticket
        $attribute = [
            'ticket_no' => unique_random(config('fine.tickets_table'), 'ticket_no', config('fine.ticket_no.length')),
            'motorist_id' => $motorist->id,
            'officer_id' => $officer->id,
            'station_id' => $officer->station->first()->id,
            'court_date' => Carbon::today()->addDays(24)->toDateString(),
        ];

        $input = array_merge($input, $attribute);

        // Create Ticket
        $ticket = Ticket::create($input);

        // Sync offences
        Ticket::find($ticket->id)->attachOffences($request->offences);

        // Calculate Total amount
        $total = 0;

        foreach ($ticket->offences as $offence) {
            $total = $total + $offence->fine;
        }

        // Add total to the new ticket
        Ticket::find($ticket->id)->update(['total_amount' => $total]);

        $user = $motorist->user;
        $ticket = Ticket::find($ticket->id);

        $user->notify(new UserReceivesTicket($ticket));

        return response()->json($this->showTicket($ticket->id));
    }

    /**
     * Display specified resource.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        // Make sure the logged in user has permission.
        //Auth::user()->hasPermission('read-ticket')

        // validate request
        $this->validate($request, [
            'ticket_no' => 'nullable|alpha_num',
        ]);

        $ticket = Ticket::where('ticket_no', $request->ticket_no)->first();

        return response()->json($this->showTicket($ticket->id));
    }

    /**
     * Show tickets for motorist.
     *
     * @return Collection
     */
    public function showMotoristTicket()
    {
        $tickets = Auth::user()->motorist->tickets->sortByDesc('created_at');

        $ticketArray = [];

        foreach ($tickets as $ticket) {
            array_push($ticketArray, $this->formatTicket($ticket));
        }

        return response()->json($ticketArray);
    }

    /**
     * Show tickets for officer.
     *
     * @return Collection
     */
    public function showOfficerTicket()
    {
        $tickets = Auth::user()->officer->tickets->sortByDesc('created_at');

        $ticketArray = [];

        foreach ($tickets as $ticket) {
            $ticketArray[] = $this->formatTicket($ticket);
        }

        return response()->json($ticketArray);
    }

    /**
     * Show the specified resource.
     *
     * @param int $id
     *
     * @return Collection
     */
    public function showTicket($id)
    {
        $ticket = Ticket::find($id)->load('motorist', 'officer', 'station', 'offences');

        return $this->formatTicket($ticket);
    }

    /**
     * Show the specified resource.
     *
     * @param  Collection Ticket
     *
     * @return Collection
     */
    public function formatTicket($ticket)
    {
        // make ticket object
        $response['ticket_no'] = $ticket->ticket_no;
        $response['total_amount'] = $ticket->total_amount;
        $response['paid'] = $ticket->paid;

        if (Auth::user()->id === $ticket->motorist->user->id || Auth::user()->id === $ticket->officer->user->id) {
            $response['motorist_name'] = $ticket->motorist->user->name;
            $response['motorist_address'] = $ticket->motorist->user->address;
            $response['vehicle_no'] = $ticket->vehicle_no;
            $response['license_no'] = $ticket->motorist->license_no;
            $response['motorist_nic'] = $ticket->motorist->user->nic;
            $response['motorist_vehicle_classes'] = [];

            foreach ($ticket->motorist->vehicleClasses as $class) {
                array_push($response['motorist_vehicle_classes'], $class->class);
            }
        }

        $response['offence_datetime'] = $ticket->created_at->toDayDateTimeString();
        $response['location'] = $ticket->location;
        $response['lat'] = $ticket->lat;
        $response['lng'] = $ticket->lng;
        $response['station'] = $ticket->station->name;
        $response['officer_name'] = $ticket->officer->user->name;
        $response['officer_badge_no'] = $ticket->officer->badge_no;
        $response['valid_from'] = $ticket->created_at->toFormattedDateString();
        $response['valid_to'] = $ticket->created_at->addDays(14)->toFormattedDateString();
        $response['court_name'] = $ticket->station->court->name;
        $response['court_date'] = $ticket->created_at->addDays(24)->toFormattedDateString();
        $response['remarks'] = $ticket->remarks;
        $response['offences'] = $ticket->offences->makeHidden(['id', 'pivot', 'dip']);

        return $response;
    }
}
