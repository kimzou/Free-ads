@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit an ad</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('ad.store') }}" enctype="multipart/form-data">
                        @csrf
                        <p class="text-center">Mendatory</p>
                        <hr>
                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">Title :</label>
                            <div class="col-md-6">
                                <input type="text" id="title" name="title" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" value="{{$ad->title}}">
                                @if ($errors->has('title'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="desc" class="col-md-4 col-form-label text-md-right">Description :</label>
                            <div class="col-md-6">
                                <input type="text" id="desc" class="form-control{{ $errors->has('desc') ? ' is-invalid' : '' }}" name="desc" value="{{$ad->desc}}">
                                @if ($errors->has('desc'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('desc') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="price" class="col-md-4 col-form-label text-md-right">Price :</label>
                            <div class="col-md-6">
                                <input type="text" id="price" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" name="price" value="{{$ad->price}}">
                                @if ($errors->has('price'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('price') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="image" class="col-md-4 col-form-label text-md-right">Image :</label>
                            <div class="col-md-6">
                                <input type="file" id="image" class="{{ $errors->has('image') ? ' is-invalid' : '' }}" name="image" required>
                                @if ($errors->has('image'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('image') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <hr>
                        <p class="text-center">Optional</p>
                        <hr>
                        <div class="form-group row">
                            <label for="category" class="col-md-4 col-form-label text-md-right">Category :</label>
                            <div class="col-md-6">
                                <select name="category" id="category" class="form-control form-control-md">
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
                                <button class="btn btn-primary">Edit</button>
                            </div>
                        </div>
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection