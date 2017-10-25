You have received a <a href="{{ route('frontend.ticket.show', $notification->data['ticket_no']) }}">traffic ticket</a>.
<p class="small mb-0">{{ $notification->created_at->diffForHumans() }}</p>