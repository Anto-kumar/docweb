@extends('layouts.app')
 
@section('contents')
<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .header {
            background-color: #87CEEB;
            font-weight: bold;
            font-size: 20px;
            color:black;
            text-align: center;
            padding: 10px;
        }
        .container {
            width: 50%;
            margin: 50px auto;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            font-weight: bold;
        }
        input[type="text"], input[type="tel"], select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="file"] {
            margin-top: 10px;
        }
        .btn {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            float: right;
        }
        .btn:hover {
            background-color: #45a049;
        }
    </style>
            <div>
            <h1 class="header">Add Doctor Form</h1>
            <div class="container">
       
            <form action="{{url('admin/edit_doctor',$data->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Doctor Name:</label>
                <input type="text" name="name" value="{{$data->name}}" placeholder="Doctor Name" class="border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none">
            </div>
            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="text" name="phone" value="{{$data->phone}}" placeholder="Phone" class="border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none">
            </div>
            <div class="form-group">
                <label for="speciality">Speciality:</label>
                <select id="speciality" name="speciality" required>
                    <option value="{{$data->speciality}}">{{$data->speciality}}</option>
                    <option value="general">General Health</option>
                    <option value="cardiology">Cardiology</option>
                    <option value="dental">Dental</option>
                    <option value="neurology">Neurology</option>
                    <option value="orthopaedics">Orthopaedics</option>    
                </select>
            </div>
            <div class="form-group">
                <label for="room">Room Number:</label>
                <input type="text" name="room" value="{{$data->room}}" placeholder="Room No" class="border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none">
            </div>
            <div class="form-group">
                <label for="image">Old Image:</label>
                <img src="{{asset('images')}}/{{$data->image}}" style="width: 100px; height: 100px; border-radius: 50%;">
            </div>
            <div class="form-group">
                <label for="image">Change Image:</label>
                <input type="file" name="image">
            </div>
            <input type="submit" value="Update" class="btn">
        </form>
         </div>
            </div>
        </div>

@endsection