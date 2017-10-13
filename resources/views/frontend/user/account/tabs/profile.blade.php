<table class="table table-striped table-hover">
    <tr>
        <th>{{ trans('labels.frontend.user.profile.name') }}</th>
        <td>{{ $logged_in_user->name }}</td>
    </tr>
    <tr>
        <th>{{ trans('labels.frontend.user.profile.email') }}</th>
        <td>{{ $logged_in_user->email }}</td>
    </tr>
    <tr>
        <th>Phone</th>
        <td>{{ $logged_in_user->phone }}</td>
    </tr>
    <tr>
        <th>Addresss</th>
        <td>{{ $logged_in_user->address }}</td>
    </tr>
    <tr>
        <th>NIC</th>
        <td>{{ $logged_in_user->nic }}</td>
    </tr>
    <tr>
        <th>Passport</th>
        <td>{{ $logged_in_user->passport }}</td>
    </tr>
    <tr>
        <th>Birthday</th>
        <td>{{ $logged_in_user->date_of_birth }}</td>
    </tr>
    <tr>
        <th>Joined</th>
        <td>{{ $logged_in_user->created_at->diffForHumans() }}</td>
    </tr>
    <tr>
        <th>{{ trans('labels.frontend.user.profile.last_updated') }}</th>
        <td>{{ $logged_in_user->updated_at }} ({{ $logged_in_user->updated_at->diffForHumans() }})</td>
    </tr>
</table>