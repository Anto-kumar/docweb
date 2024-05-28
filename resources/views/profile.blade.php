@extends('layouts.app')
 
@section('title', 'Profile Settings')
 
@section('contents')
<hr />
<div class="flex justify-center items-center h-screen">
    <div class="bg-white p-8 rounded shadow">
        <h1 class="text-2xl font-bold mb-4">Profile</h1>
        <div class="mb-4">
            <label class="label">
            <span class="text-base label-text">Name</span>
            </label>
            <input name="name" type="text" value="{{ auth()->user()->name }}" class="w-full input input-bordered" style="color: blue; font-weight: bold;" />
        </div>
        <div class="mb-4">
            <label class="label">
            <span class="text-base label-text">Email</span>
            </label>
            <input name="email" type="text" value="{{ auth()->user()->email }}" class="w-full input input-bordered" style="color: red; font-style: italic;" />
        </div>
    </div>
</div>
@endsection