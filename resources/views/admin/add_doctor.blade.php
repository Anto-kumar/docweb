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
            <h1 class="header">Add Doctor Form</h1>
            <div class="container">
       
        <form action="{{url('admin/upload_doctor')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Doctor Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="tel" id="phone" name="phone" pattern="[0-9]{11}" required>
            </div>
            <div class="form-group">
                <label for="speciality">Speciality:</label>
                <select id="speciality" name="speciality" required>
                    <option value="">Select Speciality</option>
                    <option value="general">General Health</option>
                    <option value="cardiology">Cardiology</option>
                    <option value="dental">Dental</option>
                    <option value="neurology">Neurology</option>
                    <option value="orthopaedics">Orthopaedics</option>
                    <option value="paediatrics">Paediatrics</option>
                    <option value="physiotherapy">Physiotherapy</option>
                    <option value="psychiatry">Psychiatry</option>
                    <option value="urology">Urology</option>
                    <option value="gynaecology">Gynaecology</option>
                    <option value="dermatology">Dermatology</option>
                    <option value="ophthalmology">Ophthalmology</option>
                    <option value="oncology">Oncology</option>
                    <option value="radiology">Radiology</option>
                    <option value="pathology">Pathology</option>
                    <option value="emergency">Emergency</option>
                    <option value="all">All</option>
                </select>
            </div>
            <div class="form-group">
                <label for="room">Room Number:</label>
                <input type="text" id="room" name="room" required>
            </div>
            <div class="form-group">
                <label for="image">Doctor Image:</label>
                <input type="file" id="image" name="image" required>
            </div>
            <input type="submit" value="Submit" class="btn">
        </form>
         </div>
            </div>
        </div>

@endsection