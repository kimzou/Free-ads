@extends('layouts.app');

@section('content')
    @if (isset($ad))
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="container">
            <div class="row justify-content-center">
                <div class="card col-md-8">
                    <div class="card-header">
                        {{ $ad->title }}
                    </div>
                    <img src="/images/{{ $ad->image }}" class="card-img-top" alt="ad pic">
                    <div class="card-body">
                        <p class="cart-text">
                            <strong>Description</strong> :{{ $ad->desc }}
                        </p>
                        <p class="cart-text">
                            <strong>Category</strong> : {{ $ad->category ?? "None" }}
                        </p>
                        <p class="cart-text">
                            <strong>Price</strong> : {{ $ad->price }}
                        </p>
                        <a href="{{ route('contact') }}" class="btn btn-outline-primary btn-block">
                            Contact
                        </a>
                    </div>
                    <div class="card-footer text-muted text-center">
                        <p class="cart-text">
                            <strong>Date</strong> : {{ $ad->created_at }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
        @if (($ad->user_id == Auth::id()) && ($ad->user_id !== null))
            <a href="{{ route('ad.edit', $ad->id) }}" class="btn btn-warning">
                Edit this ad
            </a>
            <form action="{{ route('ad.destroy', $ad->id) }}" method="POST" style="display:">
                @csrf
                @method('delete')
                <button class="btn btn-danger">
                    Delete this ad
                </button>
            </form>
        @endif
        </div>
        <div class="col-md-8">
            <a href="{{ route('ad.index') }}" class="btn btn-outline-dark" role="button">
                Go back to ads
            </a>
        </div>
        @else
            <p class="text-center">You have no ads yet !</p>
    @endif
@endsection