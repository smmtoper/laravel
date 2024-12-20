@extends('layouts.app')

@section('content')
    <h2>Submitted Data</h2>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $entry)
                <tr>
                    <td>{{ $entry['name'] }}</td>
                    <td>{{ $entry['email'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
