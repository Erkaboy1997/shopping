@extends('admin.layouts.main')
@section('content')

    <div style="margin: 30px;">
        <h1>Пользователь: {{ $user->name  }}</h1>
        <form action="{{ route('admin.users.update',['user' => $user->id])  }}" method="POST">
            @csrf
            {{ method_field('PUT') }}
            @foreach($roles as $value)
                 <input type="checkbox" name="roles[]" value="{{ $value->id  }}" {{ $user->hasAnyRole($value->name)?'checked':''  }}>
                 <label>{{ $value->name  }}</label>
            @endforeach
            <button type="submit" class="btn btn-success">Update</button>
        </form>
    </div>
@endsection
