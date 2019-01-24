<?php

namespace App\Http\Controllers\Backend\Fine;

use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Repositories\Backend\Fine\OffenceRepository;
use App\Http\Requests\Backend\Fine\ManageOffenceRequest;

class OffenceTableController extends Controller
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
     * @param ManageOffenceRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageOffenceRequest $request)
    {
        return Datatables::of($this->offences->getForDataTable())
            ->addColumn('actions', function ($offence) {
                return $offence->action_buttons;
            })
            ->rawColumns(['actions'])
            ->make(true);
    }
}
