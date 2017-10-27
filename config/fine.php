<?php

use App\Models\Fine\Cart;
use App\Models\Fine\Ticket;
use App\Models\Fine\Offence;
use App\Models\Fine\Payment;

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

    /*
     * Payment model.
    */
    'payment' => Payment::class,

    /*
     * Payments table used to store payment details.
     */
    'payments_table' => 'payments',

    /*
     * Cart model.
    */
    'cart' => Cart::class,

    /*
     * Cart table.
     */
    'carts_table' => 'carts',

    /*
     * Ticket attributes.
     */
    'ticket_no' => [
        'length' => 6,
    ],

    'convenience_fee' => 25,

    /*
     * Payment attributes.
     */
    'payment_token' => [
        'length' => 32,
    ],
];
