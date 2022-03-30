@extends('layouts.app')
@section('content')

<div class="container">
    <h2 class="text-center">List of services</h2>

    <table class="table table-striped">
        <tr>
            <th>Service name</th>
            <th></th>
        </tr>

        @foreach ($services as $service)
        <tr>
            <td>{{ $service->name }}</td>
            <td><a class="text-primary" href="/api/services/{{$service->id}}">View</a></td>
        </tr>
        @endforeach
    </table>
</div>

@endsection