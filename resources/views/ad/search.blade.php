@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Search ads</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('ad.results') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="search-name" class="col-md-4 col-form-label text-md-right">Name</label>
                            <div class="col-md-6">
                                <input type="text" id="search-name" class="form-control{{ $errors->has('search-name') ? ' is-invalid' : '' }}" name="search-name" value="{{ old('search-name') }}" autofocus>
                                @if ($errors->has('search-name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('search-name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="search-category" class="col-md-4 col-form-label text-md-right">Category</label>
                            <div class="col-md-6">
                                <select name="search-category" id="search-category" class="form-control form-control-md {{ $errors->has('search-category') ? ' is-invalid' : '' }}">
                                    <option selected disabled>Choose</option>
                                    <option value="books">Books</option>
                                    <option value="fashion">Fashion</option>
                                    <option value="music">Music</option>
                                    <option value="high-tech">High-Tech</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Search
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
