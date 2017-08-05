<?php

use App\Models\Fine\Ticket;
use App\Models\Fine\Offence;

return [
    /*
     * Ticket model.
    */
    'ticket' => Ticket::class,

    /*
     * Tickets table used to store traffic tickets in the database.
     */
    'tickets_table' => 'tickets',

    /*
     * Offence model.
    */
    'offence' => Offence::class,

    /*
     * Offences table used to store traffic offences in the database.
     */
    'offences_table' => 'offences',

    /*
     * Ticket_Offence table used to store ticket and offence relations in the database.
     */
    'ticket_offence_table' => 'ticket_offence',
];
