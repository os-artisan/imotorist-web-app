<?php

namespace App\Models\Fine\Traits\Attribute;

use App\Models\Fine\Cart;
use Illuminate\Support\Facades\Auth;

/**
 * Class TicketAttribute.
 */
trait TicketAttribute
{
    /**
     * @return string
     */
    public function getPaidLabelAttribute()
    {
        if ($this->isPaid()) {
            return '<span class="label label-success">Paid</span>';
        }

        return '<span class="label label-danger">Unpaid</span>';
    }

    /**
     * @return bool
     */
    public function isPaid()
    {
        return 1 === $this->paid;
    }

    /**
     * @return bool
     */
    public function inCart()
    {
        $cart = Cart::where(['ticket_id' => $this->id, 'user_id' => Auth::id()])->get();

        if ($cart->count()) {
            return 1;
        }

        return 0;
    }

    /**
     * @return string
     */
    public function getShowButtonAttribute()
    {
        return '<a href="'.route('admin.fine.ticket.show', $this).'" class="btn btn-xs btn-info"><i class="fa fa-search" data-toggle="tooltip" data-placement="top" title="'.trans('buttons.general.crud.view').'"></i></a> ';
    }

    /**
     * @return string
     */
    public function getActionButtonsAttribute()
    {
        return $this->getShowButtonAttribute();
    }
}
