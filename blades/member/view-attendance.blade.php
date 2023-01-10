@extends('layouts.child')

@section('title', 'Member | Attendance')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Date</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $count = 1; @endphp
                        @foreach($attendances as $attendance)
                            <tr>
                                <td>{{ $count++ }}</td>
                                <td>{{ $attendance->date }}</td>
                                <td>{{ $attendance->action }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection