@extends('layouts.user')

@section('title', 'Home')

@section('contents')

<h1 class="text-2xl font-bold text-center"><u> Our All Doctors List :</u></h1>

<div class="row">
@foreach($doctor as $doctors)
    <div class="col-md-4">
        <div class="item">
            <div class="card-doctor">
                <div class="header">
                    <img src="/doctorimage/{{$doctors->image}}" alt="">
                    <div class="meta">
                        <a href="#"><span class="mai-call"></span></a>
                        <a href="#"><span class="mai-logo-whatsapp"></span></a>
                    </div>
                </div>
                <div class="body" style="background-color: lightblue;">
                    <p class="text-xl mb-0">Dr.  {{$doctors->name}}</p>
                    <span class="text-sm text-grey">Specialist : {{$doctors->speciality}}</span>
                    <p class="text-sm text-grey">Phone : {{$doctors->phone}}</p>
                </div>
            </div>
        </div>
    </div>
@endforeach
</div>

@endsection