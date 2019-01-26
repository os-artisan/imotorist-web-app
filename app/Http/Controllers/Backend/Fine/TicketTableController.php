<?php

namespace App\Http\Controllers\Backend\Fine;

use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Repositories\Backend\Fine\TicketRepository;
use App\Http\Requests\Backend\Fine\Ticket\ManageTicketRequest;

class TicketTableController extends Controller
{
    /**
     * @var TicketRepository
     */
    protected $tickets;

    /**
     * @param TicketRepository $tickets
     */
    public function __construct(TicketRepository $tickets)
    {
        $this->tickets = $tickets;
    }

    /**
     * @param ManageTicketRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageTicketRequest $request)
    {
        return Datatables::of($this->tickets->getForDataTable())
            ->escapeColumns(['motorist_id', 'officer_id', 'station_id', 'payment_id', 'vehicle_no', 'lat', 'lng', 'location', 'court_date', 'remarks'])
            ->editColumn('paid', function ($ticket) {
                return $ticket->paid_label;
            })
            ->addColumn('actions', function ($ticket) {
                return $ticket->action_buttons;
            })
            ->make(true);
    }
}
