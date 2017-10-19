<?php

namespace App\Models\Fine\Traits;

/**
 * Class TicketAccess.
 */
trait TicketAccess
{
    /**
     * Alias to eloquent many-to-many relation's attach() method.
     *
     * @param mixed $offence
     *
     * @return void
     */
    public function attachOffence($offence)
    {
        if (is_object($offence)) {
            $offence = $offence->getKey();
        }

        if (is_array($offence)) {
            $offence = $offence['id'];
        }

        $this->offences()->attach($offence);
    }

    /**
     * Alias to eloquent many-to-many relation's detach() method.
     *
     * @param mixed $offence
     *
     * @return void
     */
    public function detachOffence($offence)
    {
        if (is_object($offence)) {
            $offence = $offence->getKey();
        }

        if (is_array($offence)) {
            $offence = $offence['id'];
        }

        $this->offences()->detach($offence);
    }

    /**
     * Attach multiple offences to a ticket.
     *
     * @param mixed $offences
     *
     * @return void
     */
    public function attachOffences($offences)
    {
        foreach ($offences as $offence) {
            $this->attachOffence($offence);
        }
    }

    /**
     * Detach multiple offences from a ticket.
     *
     * @param mixed $offences
     *
     * @return void
     */
    public function detachOffences($offences)
    {
        foreach ($offences as $offence) {
            $this->detachOffence($offence);
        }
    }
}
