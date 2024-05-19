@extends('layouts.user')

@section('title', 'My Appointment')

@section('contents')

<div style="text-align: center;">
    <table style="border-collapse: collapse; width: 100%; background-color: #f2f2f2; border-radius: 5px;">
        <tr>
            <th style="border: 2px solid black; padding: 8px; background-color: #333; color: white;">Doctor Name</th>
            <th style="border: 2px solid black; padding: 8px; background-color: #333; color: white;">Appointment Date</th>
            <th style="border: 2px solid black; padding: 8px; background-color: #333; color: white;">Appointment Message</th>
            <th style="border: 2px solid black; padding: 8px; background-color: #333; color: white;">Appointment Status</th>
            <th style="border: 2px solid black; padding: 8px; background-color: #333; color: white;">Cancel Appointment </th>

        </tr>
        @foreach($appoint as $appoints)
        <tr>
            <td style="border: 1px solid black; padding: 8px; background-color: #f9f9f9;">{{$appoints->doctor}}</td>
            <td style="border: 1px solid black; padding: 8px; background-color: #f9f9f9;">{{$appoints->date}}</td>
            <td style="border: 1px solid black; padding: 8px; background-color: #f9f9f9;">{{$appoints->message}}</td>

            <td style="border: 1px solid black; padding: 8px; background-color: #f9f9f9;">{{$appoints->status}}</td>

            <td style="border: 1px solid black; padding: 8px; background-color: #f9f9f9;"><a class="btn btn-danger" onclick="return confirm('Are you sure to cancel Appointment')" href="{{url('cancel_appoint',$appoints->id)}}">Cancel</a></td>  

        </tr>
        @endforeach
    </table>
</div>

@endsection