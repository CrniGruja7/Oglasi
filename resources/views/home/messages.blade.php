@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-4">
            @include('partials.slidebar')
        </div>
        <div class="col-8">
            <h1>All messages</h1>
            <ul class="list-group">
                @foreach ($messages as $message)
                    <li class="list-group-item mb-2" >
                        <p>Oglas: {{$message->ad->title}} <span class="float-right">{{$message->created_at->format('d M Y')}}</span></p>
                        <p>From: {{$message->sender->name}}</p>
                        <strong>{{$message->text}}</strong><br>
                        <a href="{{ route('home.reply', ['sender_id'=>$message->sender->id,'ad_id'=>$message->ad_id]) }}">Reply</a>
                    </li>
                @endforeach
                @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{session()->get('message')}}
                        </div>
                @endif
            </ul>
        </div>
    </div>
</div>
@endsection
