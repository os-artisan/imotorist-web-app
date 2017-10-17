<?php

namespace App\Models\Fine\Traits\Attribute;

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
        return $this->paid == 1;
    }
}
