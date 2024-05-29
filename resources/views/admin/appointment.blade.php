@extends('layouts.app')
@section('contents')

@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
    <script>
        setTimeout(function(){
            document.querySelector('.alert').remove();
        }, 3000);
    </script>
@endif

<div style="text-align: center;">
    <table style="border-collapse: collapse; width: 100%; background-color: #f2f2f2; border-radius: 5px;">
        <tr>
            <th style="border: 2px solid black; padding: 8px; background-color: #333; color: white;">Patient Name</th>
            <th style="border: 2px solid black; padding: 8px; background-color: #333; color: white;">Email</th>
            <th style="border: 2px solid black; padding: 8px; background-color: #333; color: white;">Phone</th>
            <th style="border: 2px solid black; padding: 8px; background-color: #333; color: white;">Doctor Name</th>
            <th style="border: 2px solid black; padding: 8px; background-color: #333; color: white;">Date</th>
            <th style="border: 2px solid black; padding: 8px; background-color: #333; color: white;">Appointment Message</th>
            <th style="border: 2px solid black; padding: 8px; background-color: #333; color: white;">Appointment Status</th>
            <th style="border: 2px solid black; padding: 8px; background-color: #333; color: white;">Approved</th>
            <th style="border: 2px solid black; padding: 8px; background-color: #333; color: white;">Cancel</th>
            <th style="border: 2px solid black; padding: 8px; background-color: #333; color: white;">Delete</th>



        </tr>

        @foreach($data as $appoint)

        <tr>
            <td style="border: 1px solid black; padding: 8px; background-color: #f9f9f9;">{{$appoint->name}}</td>
            <td style="border: 1px solid black; padding: 8px; background-color: #f9f9f9;">{{$appoint->email}}</td>
            <td style="border: 1px solid black; padding: 8px; background-color: #f9f9f9;">{{$appoint->phone}}</td>
            <td style="border: 1px solid black; padding: 8px; background-color: #f9f9f9;">{{$appoint->doctor}}</td>
            <td style="border: 1px solid black; padding: 8px; background-color: #f9f9f9;">{{$appoint->date}}</td>
            <td style="border: 1px solid black; padding: 8px; background-color: #f9f9f9;">{{$appoint->message}}</td>
            <td style="border: 1px solid black; padding: 8px; background-color: #f9f9f9;">{{$appoint->status}}</td>
            <td style="border: 1px solid black; padding: 8px; background-color: #f9f9f9;"><a class="btn btn-success" style="background-color: green;" href="{{url('admin/approve_appoint',$appoint->id)}}">Approve</a></td>
            <td style="border: 1px solid black; padding: 8px; background-color: #f9f9f9;"><a class="btn btn-warning" onclick="return confirm('Are you sure to cancel Appointment')" href="{{url('admin/cancel_appoint',$appoint->id)}}">Cancel</a></td>
            <td style="border: 1px solid black; padding: 8px; background-color: #f9f9f9;"><a class="btn btn-danger" onclick="return confirm('Are you sure to delete the Appointment from website database')" href="{{url('admin/delete_appoint',$appoint->id)}}">Delete</a></td>

        </tr>
        @endforeach
       
    </table>
</div>
@endsection