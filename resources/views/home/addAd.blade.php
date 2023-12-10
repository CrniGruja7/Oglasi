@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-4">
            @include('partials.slidebar')
        </div>
        <div class="col-8">
            <h1>New ad</h1>
            <form action="{{ route('home.addAd') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="text" name="title" class="form-control m-2" placeholder="title">
                <textarea name="body" cols="30" rows="10" class="form-control m-2" placeholder="Description:"></textarea>
                <input type="number" name="price" class="form-control m-2" placeholder="price">
                <input type="file" name="image1" class="form-control m-2" placeholder="Image 1">
                <input type="file" name="image2" class="form-control m-2" placeholder="Image 2">
                <input type="file" name="image3" class="form-control m-2" placeholder="Image 3">
                <select name="category" class="form-control m-2">
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-info">Save</button>
            </form>
        </div>
    </div>
</div>
@endsection