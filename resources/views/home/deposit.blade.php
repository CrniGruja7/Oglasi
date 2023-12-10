@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-4">
            @include('partials.slidebar')
        </div>
        <div class="col-8">
            <form action="{{ route('home.AddDeposit') }}" method="POST">
                @csrf
                <label for="deposit" placeholder="Add deposit">Deposit</label><br>
                <input type="number" name="deposit" class="form-control"><br>
                @error('deposit')
                    <p class="bg-warning">{{$errors->first('deposit')}}</p>
                @enderror
                <button type="submit" class="btn btn-primary form-control">Add deposit</button><br>
            </form>
        </div>
    </div>
</div>
@endsection