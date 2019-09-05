@extends('layouts.app')
@section('content')
    <div class="col-md-8">
        <a href="{{ route('ad.search') }}" class="btn btn-outline-dark" role="button">
            Go back to research
        </a>
    </div>
    @if (count($ads) !== 0)
        @foreach ($ads as $ad)
            <div class="container">
                <div class="row justify-content-center">
                    <div class="card col-md-8">
                        <div class="card-header">
                            <a href="{{ route('ad.show', $ad->id) }}">{{ $ad->title }}</a>
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
                            <a href="#" class="btn btn-outline-primary btn-block">Contact</a>
                        </div>
                        <div class="card-footer text-muted text-center">
                            <p class="cart-text">
                                <strong>Date</strong> : {{ $ad->created_at }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        <hr></hr>
        @endforeach
    @else
        <p class="text-center">Sorry, there's no results for this research.</p>
    @endif
@endsection