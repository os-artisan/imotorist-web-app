<?php

namespace App\Http\Controllers\Backend\Fine;

use App\Models\Fine\Offence;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\Fine\OffenceRepository;
use App\Http\Requests\Backend\Fine\Offence\StoreOffenceRequest;
use App\Http\Requests\Backend\Fine\Offence\ManageOffenceRequest;

class OffenceController extends Controller
{
    /**
     * @var OffenceRepository
     */
    protected $offences;

    /**
     * @param OffenceRepository $offences
     */
    public function __construct(OffenceRepository $offences)
    {
        $this->offences = $offences;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ManageOffenceRequest $request)
    {
        return view('backend.fine.offence.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(ManageOffenceRequest $request)
    {
        return view('backend.fine.offence.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOffenceRequest $request)
    {
        $this->offences->create($request->all());

        return redirect()->route('admin.fine.offence.index')->withFlashSuccess(trans('alerts.backend.offences.created'));
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
    public function destroy(Offence $offence, ManageOffenceRequest $request)
    {
        $this->offences->delete($offence);

        return redirect()->route('admin.fine.offence.index')->withFlashSuccess(trans('alerts.backend.offences.deleted'));
    }
}
