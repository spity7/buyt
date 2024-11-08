@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

<div class="card">
    <div class="card-header users-list__header">Users List</div>

    <div class="card-body">
        <table class="table table-responsive-sm table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>name</th>
                    <th>Phone</th>
                    <th>Role</th>
                    <th></th>
                </tr>
            </thead>
            <tbody class="users-list__body">
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>
                            <a href="{{ route('users.show', $user) }}">
                                {{ $user->first_name }}
                            </a>
                        </td>
                        <td>{{ $user->phone }}</td>
                        <td>
                            @foreach ($user->roles as $role)
                                {{ $role->name }}
                            @endforeach
                        </td>
                        <td>
                            <form action="{{ route('users.destroy', $user) }}" method="POST"
                                onsubmit="return confirm('Are your sure?');" style="display: inline-block;">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="submit" class="btn btn-sm btn-danger" value="Delete">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
