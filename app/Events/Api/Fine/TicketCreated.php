<?php

namespace App\Events\Api\Fine;

use Illuminate\Queue\SerializesModels;

/**
 * Class TicketCreated.
 */
class TicketCreated
{
    use SerializesModels;

    /**
     * @var
     */
    public $ticket;

    /**
     * @param $ticket
     */
    public function __construct($ticket)
    {
        $this->ticket = $ticket;
    }
}
