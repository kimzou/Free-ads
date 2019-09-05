@extends('layouts.app')

@section('content')
    <h3 class="text-center">All ads</h3>
    @if (count($ads) !== 0)
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    <table class="table table-striped">
        <thead>
            <tr>
                <td class="font-weight-bold">Image</td>
                <td class="font-weight-bold">
                <td class="font-weight-bold">
                    <a href="{{ route('ad.index') }}">
                        Title
                    </a>
                </td>
                <td class="font-weight-bold">Description</td>
                <td class="font-weight-bold">Category</td>
                <td class="font-weight-bold">
                    <a href="{{ route('ad.order') }}">
                        Date
                    </a>
                </td>
                <td class="font-weight-bold">Price</td>
                <td class="font-weight-bold">Link</td>
            </tr>
        </thead>
        <tbody>
        @foreach ($ads as $ad)
            <tr>
                <td>
                    <img src="/images/{{ $ad->image }}" alt="as pic" style="height: 100px; width=100px">
                </td>
                <td>{{ $ad->title }}</td>
                <td>{{ $ad->desc }}</td>
                <td>
                    @if ($ad->category !== null)
                        {{ $ad->category }}
                    @else
                        None
                    @endif
                </td>
                <td>{{ $ad->price }}</td>
                <td>{{ $ad->created_at }}</td>
                <td>
                    <a href="{{ route('ad.show', $ad->id) }}" class="btn btn-outline-info">
                        See this ad
                    </a>
                    @if (($ad->user_id == Auth::id()) && ($ad->user_id !== null))
                        <a href="{{ route('ad.edit', $ad->id) }}" class="btn btn-outline-warning">
                            Edit this ad
                        </a>
                        <form action="{{ route('ad.destroy', $ad->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button class="btn btn-outline-danger btn-block">
                                Delete this ad
                            </button>
                        </form>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="row justify-content-center">
        {{ $ads->links() }}
    </div>
    @else
        <h2>No ad available</h2>
    @endif
@endsection