<?php

namespace App\Http\Controllers\Api\Fine;

use App\Models\Fine\Offence;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OffenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Make sure the logged in user has permission.
        //Auth::user()->hasPermission('read-offence')

        $Offences = Offence::all();

        return response()->json($Offences);
    }
}
