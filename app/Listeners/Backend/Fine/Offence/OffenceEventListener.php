<?php

namespace App\Listeners\Backend\Fine\Offence;

/**
 * Class OffenceEventListener.
 */
class OffenceEventListener
{
    /**
     * @var string
     */
    private $history_slug = 'Offence';

    /**
     * @param $event
     */
    public function onCreated($event)
    {
        history()->withType($this->history_slug)
            ->withEntity($event->offence->id)
            ->withText('trans("history.backend.offences.created") <strong>{offence}</strong>')
            ->withIcon('plus')
            ->withClass('bg-green')
            ->withAssets([
                'offence_link' => ['admin.fine.offence.show', $event->offence->description, $event->offence->id],
            ])
            ->log();
    }

    /**
     * @param $event
     */
    public function onUpdated($event)
    {
        history()->withType($this->history_slug)
            ->withEntity($event->offence->id)
            ->withText('trans("history.backend.offences.updated") <strong>{offence}</strong>')
            ->withIcon('save')
            ->withClass('bg-aqua')
            ->withAssets([
                'offence_link' => ['admin.fine.offence.show', $event->offence->description, $event->offence->id],
            ])
            ->log();
    }

    /**
     * @param $event
     */
    public function onDeleted($event)
    {
        history()->withType($this->history_slug)
            ->withEntity($event->offence->id)
            ->withText('trans("history.backend.offences.deleted") <strong>{offence}</strong>')
            ->withIcon('trash')
            ->withClass('bg-maroon')
            ->withAssets([
                'offence_link' => ['admin.fine.offence.show', $event->offence->description, $event->offence->id],
            ])
            ->log();
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param \Illuminate\Events\Dispatcher $events
     */
    public function subscribe($events)
    {
        $events->listen(
            \App\Events\Backend\Fine\Offence\OffenceCreated::class,
            'App\Listeners\Backend\Fine\Offence\OffenceEventListener@onCreated'
        );

        $events->listen(
            \App\Events\Backend\Fine\Offence\OffenceUpdated::class,
            'App\Listeners\Backend\Fine\Offence\OffenceEventListener@onUpdated'
        );

        $events->listen(
            \App\Events\Backend\Fine\Offence\OffenceDeleted::class,
            'App\Listeners\Backend\Fine\Offence\OffenceEventListener@onDeleted'
        );
    }
}
