@extends('layouts.user')

@section('title', 'Make Appointment')

@section('contents')

@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
    <script>
        setTimeout(function(){
            document.querySelector('.alert').remove();
        }, 2000);
    </script>
@endif

<div class="page-section" style="background-color: lightblue;">
  <div class="container">
    <h1 class="text-center wow fadeInUp">Make an Appointment</h1>

    <form class="main-form" action ="{{url('appointment')}}" method="GET">
    <div class="row mt-5 ">
      <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
      <input type="text" name = "name" class="form-control" placeholder="Full name" required>
      </div>
      <div class="col-12 col-sm-6 py-2 wow fadeInRight">
      <input type="text" name ="email" class="form-control" placeholder="Email address..">
      </div>
      <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
      <input type="date" name = "date" class="form-control" requred>
      </div>
      <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">
      <select name="doctor" id="departement" class="custom-select" required>

      <option value="">--Select Doctor--</option>
        @foreach($doctor as $doctors)

        <option value="{{$doctors->name}}">{{$doctors->name}}  Speciality->  {{$doctors->speciality}}</option>

       @endforeach
      </select>
      </div>
      <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
      <input type="text" name = "phone" class="form-control" placeholder="Number.." required>
      </div>
      <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
      <textarea name="message" id="message" class="form-control" rows="6" placeholder="Enter message.."></textarea>
      </div>
    </div>

    <button type="submit" class="btn btn-primary mt-3 wow zoomIn">Submit Request</button>
    </form>
  </div>
  </div> <!-- .page-section -->

@endsection('contents')

