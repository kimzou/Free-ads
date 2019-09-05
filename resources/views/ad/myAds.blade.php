@extends('layouts.app')

@section('content')
    <h3 class="text-center">My ads</h3>
    @if (count($ads) !== 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <td class="font-weight-bold">Image</td>
                    <td class="font-weight-bold">Title</td>
                    <td class="font-weight-bold">Description</td>
                    <td class="font-weight-bold">Price</td>
                    <td class="font-weight-bold">Date</td>
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
                                <button class="btn btn-outline-danger">
                                    Delete this ad
                                </button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <h2>No ad available</h2>
    @endif
@endsection