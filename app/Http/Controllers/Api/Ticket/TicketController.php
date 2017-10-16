<?php

namespace App\Http\Controllers\Api\Ticket;

use Illuminate\Http\Request;
use App\Models\Fine\Ticket;
use Carbon\Carbon as Carbon;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Access\User\Motorist;

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
            'license_no' => 'required',
            'vehicle_no' => 'required',
            'lat' => 'required',
            'lng' => 'required',
            'location' => 'required',
        ]);

        $officer = Auth::user()->officer->load('station');

        $ticket = $request->only('license_no', 'vehicle_no', 'lat', 'lng', 'location', 'remarks');

        $motorist = Motorist::where('license_no', $ticket['license_no'])->first();

        $ticket['motorist_id'] = $motorist->id;
        $ticket['officer_id'] = $officer->id;
        $ticket['station_id'] = $officer->station->first()->id;
        $ticket['court_date'] = Carbon::today()->addDays(24)->toDateString();
        $ticket['total_amount'] = 500;

        $tic = Ticket::create($ticket);

        return $tic;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Make sure the logged in user has permission.

        //return "ok";
    }
}
