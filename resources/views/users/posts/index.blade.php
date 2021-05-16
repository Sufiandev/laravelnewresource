@extends('layouts.app')

@section('content')
 <div class="flex justify-center">
    <div class="">
        <h1 class="text-2xl ">{{$user->name}}</h1>
        <span>{{$user->posts()->count()}} has posted and received {{$user->receivedLikes->count()}}likes </span>
    </div><br>
 	<div class="w-8/12 bg-white p-6 rounded-lg mb-2">	
    <x-post-component :posts="$posts"/>
 </div>
@endsection