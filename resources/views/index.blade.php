@extends('layouts.app')
@section('content')
<h2 class="jumbotron text-center">Post your ads for free</h2>
            <div class="container">
                <a href="{{ route('ad.index') }}" class="btn btn-outline-primary btn-block">
                    See ads
                </a>
                <a href="{{ route('ad.create') }}" class="btn btn-outline-secondary btn-block">
                    Create an ad
                </a>
            </div>
@endsection