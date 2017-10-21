<?php

namespace App\Http\Controllers\Api\Fine;

use App\Http\Controllers\Controller;
use App\Models\Access\User\Motorist;
use App\Models\Fine\Ticket;
use App\Notifications\Api\Fine\UserReceivesTicket;
use Carbon\Carbon as Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Make sure the logged in user has permission.
        //Auth::user()->hasPermission('create-ticket')

        // validate request
        $this->validate($request, [
            'license_no'    => 'required|exists:motorists',
            'vehicle_no'    => 'required',
            'lat'           => 'nullable|numeric|between:-90,90',
            'lng'           => 'nullable|numeric|between:-180,180',
            'location'      => 'required_if:lat,null|required_if:lng,null',
            'offences'      => 'required|array|exists:offences,id',
        ]);

        $officer = Auth::user()->officer->load('station');

        $input = $request->only('license_no', 'vehicle_no', 'lat', 'lng', 'location', 'remarks', 'offences');

        $motorist = Motorist::where('license_no', $input['license_no'])->first();

        $input['motorist_id'] = $motorist->id;
        $input['officer_id'] = $officer->id;
        $input['station_id'] = $officer->station->first()->id;
        $input['court_date'] = Carbon::today()->addDays(24)->toDateString();

        // Create Ticket
        $ticket = Ticket::create($input);

        // Sync offences
        Ticket::find($ticket->id)->attachOffences($request->offences);

        // Cal Total amount
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        // Make sure the logged in user has permission.
        //Auth::user()->hasPermission('read-ticket')

        // validate request
        $this->validate($request, [
            'id'           => 'nullable|numeric|min:1',
        ]);

        $ticket = Ticket::find($request->id);

        return response()->json($this->showTicket($ticket->id));
    }

    /**
     * Show the specified resource.
     *
     * @param  int  $id
     * @return Collection
     */
    public function showTicket($id)
    {
        $t = Ticket::find($id)->load('motorist', 'officer', 'station', 'offences');

        // make ticket object
        $response['id'] = $t->id;
        $response['total_amount'] = $t->total_amount;
        $response['paid'] = $t->paid;
        $response['motorist_name'] = $t->motorist->user->name;
        $response['motorist_address'] = $t->motorist->user->address;
        $response['vehicle_no'] = $t->vehicle_no;
        $response['motorist_nic'] = $t->motorist->user->nic;
        $response['motorist_vehicle_classes'] = [];

        foreach ($t->motorist->vehicleClasses as $class) {
            array_push($response['motorist_vehicle_classes'], $class->class);
        }

        $response['offence_datetime'] = $t->created_at->toDayDateTimeString();
        $response['location'] = $t->location;
        $response['lat'] = $t->lat;
        $response['lng'] = $t->lng;
        $response['station'] = $t->station->name;
        $response['officer_name'] = $t->officer->user->name;
        $response['officer_badge_no'] = $t->officer->badge_no;
        $response['valid_from'] = $t->created_at->toFormattedDateString();
        $response['valid_to'] = $t->created_at->addDays(14)->toFormattedDateString();
        $response['court_name'] = $t->station->court->name;
        $response['court_date'] = $t->created_at->addDays(24)->toFormattedDateString();
        $response['remarks'] = $t->remarks;
        $response['offences'] = $t->offences->makeHidden(['id', 'pivot', 'dip']);

        return $response;
    }
}
