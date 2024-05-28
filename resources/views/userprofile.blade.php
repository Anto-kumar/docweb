@extends('layouts.user')
 
@section('title', 'Profile Settings')
 
@section('contents')
<header class="bg-white shadow">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-gray-900">
            Profile
        </h1>
    </div>
</header>
<div class="bg-white shadow p-6">
    <div class="bg-white shadow p-6">
        <div class="mt-4">
            <label class="block text-sm font-medium text-gray-700">Name:</label>
            <p class="mt-1 text-lg font-semibold text-blue-500">{{ auth()->user()->name }}</p>
        </div>
        <div class="mt-4">
            <label class="block text-sm font-medium text-gray-700">Email:</label>
            <p class="mt-1 text-lg font-semibold text-blue-500">{{ auth()->user()->email }}</p>
        </div>
    </div>
</div>
            </div>
<hr />

   

@endsection