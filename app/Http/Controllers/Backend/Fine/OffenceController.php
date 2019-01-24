<?php

namespace App\Http\Controllers\Backend\Fine;

use App\Models\Fine\Offence;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OffenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.fine.offence.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return 'gdfgd';
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
        return 'gdfgd';
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Offence $offence
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Offence $offence)
    {
        return 'gdfgd';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Offence $offence
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Offence $offence)
    {
        return 'gdfgd';
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Offence             $offence
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Offence $offence)
    {
        return 'gdfgd';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Offence $offence
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Offence $offence)
    {
        return 'gdfgd';
    }
}
