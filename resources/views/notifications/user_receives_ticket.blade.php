You have received a <a href="{{ route('frontend.ticket.show', $notification->data['ticket_no']) }}">traffic ticket</a>.
<p class="small">{{ $notification->created_at->toDayDateTimeString() }}</p>