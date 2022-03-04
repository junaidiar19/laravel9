@extends('layouts.app')
@section('content')

<div class="row justify-content-center">
  <div class="col-md-8">
    <div class="table-responsive">
      <table class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>#</th>
            <th>Nama</th>
            <th>Email</th>
            <th>No. HP</th>
            <th>Address</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($users as $user)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td><a href="{{ route('users.detail', $user->id) }}">{{ $user->name }}</a></td>
              <td>{{ $user->email }}</td>
              <td>{{ $user->person->phone }}</td>
              <td>{{ $user->person->address }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    {{ $users->links() }}
  </div>
</div>

@endsection