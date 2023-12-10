@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-4">
            @include('partials.slidebar')
        </div>
        <div class="col-8">
            <h1>Reply</h1>
            <ul class="list-group">
                @foreach ($messages as $message)
                    <li class="list-group-item mb-2" >
                        <p>Oglas: {{$message->ad->title}} <span class="float-right">
                        {{$message->created_at->format('d M Y')}}</span></p>
                        <p>From: {{$message->sender->name}}</p>
                        <strong>{{$message->text}}</strong>
                    </li>
                @endforeach
                <li class="list-group-item mb-2">
                    <form action="{{ route('home.replyStore')}}" method="POST">
                        @csrf
                        <input type="hidden" name="sender_id" value="{{$sender_id}}" >
                        <input type="hidden" name="ad_id" value="{{$ad_id}}" >
                        <textarea name="msg" cols="30" rows="10" class="form-control"></textarea>
                        <button type="subimt" class="btn btn-primary form-control">Reply</button>
                    </form>
                    
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection
