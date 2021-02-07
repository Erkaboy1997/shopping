@extends('admin.layouts.main')
@section('content')

<table class="table">
    <thead>
    <tr>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Roles</th>
        <th scope="col">Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach($users as $value)
        <tr>
            <td>{{ $value -> name  }}</td>
            <td>{{ $value -> email  }}</td>
            <td>{{ implode(', ', $value->roles()->get()->pluck('name')->toArray())  }}</td>
            <td>
                <a class="float-left" style="margin-left: 10px" href="{{ route('admin.users.edit',$value->id)  }}">
                    <button class="btn btn-dark">Change</button>
                </a>
                <form action="{{ route('admin.users.destroy',$value->id)  }}" method="POST">
                    @csrf
                    {{ method_field('DELETE') }}
                    <button style="margin-left:10px" type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
    {{ $users->links()  }}
@endsection
