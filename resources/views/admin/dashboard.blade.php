@extends('layouts.app')
 
@section('contents')
<div>
    <h1 class="font-bold text-2xl ml-3">Dashboard</h1>
</div>

<div class="grid grid-cols-3 gap-4 mt-8">
    <div class="bg-blue-500 p-4 rounded-lg">
        <h2 class="text-white text-xl font-bold">Number of Appointments</h2>
        <p class="text-white text-3xl font-bold">{{ $appointments->count() }}</p>
    </div>
    <div class="bg-green-500 p-4 rounded-lg">
        <h2 class="text-white text-xl font-bold">Number of Doctors</h2>
        <p class="text-white text-3xl font-bold">{{ $doctors->count() }}</p>
    </div>
    <div class="bg-yellow-500 p-4 rounded-lg">
        <h2 class="text-white text-xl font-bold">Number of Users</h2>
        <p class="text-white text-3xl font-bold">{{ $users->count() }}</p>
    </div>
</div>
@endsection