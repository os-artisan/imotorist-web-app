<?php

namespace App\Repositories\Backend\Fine;

use App\Models\Fine\Ticket;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TicketRepository.
 */
class TicketRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Ticket::class;

    /**
     * @return mixed
     */
    public function getForDataTable()
    {
        /**
         * Note: You must return deleted_at or the User getActionButtonsAttribute won't
         * be able to differentiate what buttons to show for each row.
         */
        $dataTableQuery = $this->query()
            ->select([
                config('fine.tickets_table').'.id',
                config('fine.tickets_table').'.ticket_no',
                config('fine.tickets_table').'.total_amount',
                config('fine.tickets_table').'.paid',
            ]);

        return $dataTableQuery;
    }
}
