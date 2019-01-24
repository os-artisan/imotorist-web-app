<?php

namespace App\Events\Backend\Fine\Offence;

use Illuminate\Queue\SerializesModels;

/**
 * Class OffenceUpdated.
 */
class OffenceUpdated
{
    use SerializesModels;

    /**
     * @var
     */
    public $offence;

    /**
     * @param $offence
     */
    public function __construct($offence)
    {
        $this->offence = $offence;
    }
}
