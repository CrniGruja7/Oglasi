@extends('layouts.master')

@section('main')
    <h1>All ads</h1>
    <div class="row">
        <div class="col-3 bg-secondary">
            <ul class="list-group list-group-flush">
                @foreach ($all_categories as $cat)
                    <li class="list-group-item bg-secondary" >
                        <a class="text-light" href="{{ route('welcome') }}?cat={{$cat->name}}">{{$cat->name}}</a>
                    </li>
                @endforeach
                <li class="list-group-item bg-secondary">
                    <form action="{{ route('welcome') }}" method="get">
                        <select name="type" class="form-control">
                            <option value="lower" {{(isset(request()->type) && request()->type == "lower") ? "selected" : ""}}>opadajuce</option>
                            <option value="upper" {{(isset(request()->type) && request()->type == "upper") ? "selected" : ""}}>rastuce</option>
                        </select>
                        <button type="submit" class="btn btn-success form-control m-1">Search</button>
                    </form>
                </li>
            </ul>
        </div>
        <div class="col-9">
            <ul class="list-group">
                @foreach ($all_ads as $ad)
                    <li class="list-group-item" style="background-color: white">
                        <a href="{{ route('singleAd', ['id'=>$ad->id]) }}">{{$ad->title}}</a>
                        <span class="badge bg-primary badge p-1">Price: {{$ad->price}}</span>
                        <span class="badge bg-secondary float-end">Views: {{$ad->views}}</span> 
                    </li>     
                @endforeach
            </ul>
        </div>
    </div>
@endsection