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

<h1 class="text-2xl font-bold text-center"><u> Our All Doctors List :</u></h1>

<div style="text-align: center;">
    <table style="border-collapse: collapse; width: 100%; background-color: #f2f2f2; border-radius: 5px;">
        <tr style="background-color: skyblue;">
            <th style="border: 2px solid black; padding: 8px; background-color: #333; color: white;">Doctor Name</th>
            <th style="border: 2px solid black; padding: 8px; background-color: #333; color: white;">Phone</th>
            <th style="border: 2px solid black; padding: 8px; background-color: #333; color: white;">Speciality</th>
            <th style="border: 2px solid black; padding: 8px; background-color: #333; color: white;">Room No</th>
            <th style="border: 2px solid black; padding: 8px; background-color: #333; color: white;">Image</th>
            <th style="border: 2px solid black; padding: 8px; background-color: #333; color: white;">Update</th>
            <th style="border: 2px solid black; padding: 8px; background-color: #333; color: white;">Delete</th>
        </tr>

        @foreach($data as $doctor)

        <tr>
            <td style="border: 1px solid black; padding: 8px; background-color: #f9f9f9;">{{$doctor->name}}</td>
            <td style="border: 1px solid black; padding: 8px; background-color: #f9f9f9;">{{$doctor->phone}}</td>
            <td style="border: 1px solid black; padding: 8px; background-color: #f9f9f9;">{{$doctor->speciality}}</td>
            <td style="border: 1px solid black; padding: 8px; background-color: #f9f9f9;">{{$doctor->room}}</td>
            <td style="border: 1px solid black; padding: 8px; background-color: #f9f9f9;"><img src="/doctorimage/{{$doctor->image}}" style="width: 100px; height: 100px; border-radius: 50%;"></td>
            <td style="border: 1px solid black; padding: 8px; background-color: #f9f9f9;"><a class="btn btn-success" href="{{url('admin/update_doctor',$doctor->id)}}">Update</a></td>
            <td style="border: 1px solid black; padding: 8px; background-color: #f9f9f9;"><a class="btn btn-danger" onclick="return confirm('Are you sure to delete the doctor from website database')" href="{{url('admin/delete_doctor',$doctor->id)}}">Delete</a></td> 

        </tr>
        @endforeach
       
    </table>
</div>

@endsection
