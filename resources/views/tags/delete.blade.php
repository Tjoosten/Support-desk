@extends('layouts.app')

@section('content')
    <div class="container-fluid py-3">
        <div class="page-header">
            <h1 class="page-title">Ticket tag: {{ ucfirst($tag->name) }}</h1>
            <div class="page-subtitle">Delete tag</div>

            <div class="page-options d-flex">
                <a href="{{ route('tags.dashboard') }}" class="btn btn-secondary">
                    <i class="fe fe-list mr-2"></i> Overview
                </a>
            </div>
        </div>
    </div>

    <div class="container-fluid pb-3">
        <div class="row">
            <div class="col-9">
                <form action="{{ route('tags.delete', $tag) }}" method="POST" class="card card-body shadow-sm border-0">
                    @csrf               {{-- Form field protection --}}
                    @method('DELETE')   {{-- HTTP method spoofing --}}

                    <h6 class="border-bottom bordser-gray pb-1 mb-3">Remove <span class="font-weight-bold">{{ $tag->name }}</span> as ticket tag</h6>

                    <p class="card-text text-danger">
                        <i class="icon fe fe-alert-octagon mr-1"></i> <span class="font-weight-bold mr-2">Warning:</span> Your at the point to delete the ticket tag {{ $tag->name }}.
                    </p>

                    <p class="card-text">
                        By deleting the tag all the tcikets that are connected to the tag will be detached. So be sure if you want to perform this action on {{ config('app.name') }}.
                        Also this action <span class="font-weight-bold">cannot</span> be undone. 
                    </p>

                    <hr class="mt-0">

                    <div class="row no-gutters">
                        <div class="col">
                            <button type="submit" class="btn btn-outline-danger mr-1">
                                <i class="icon fe fe-trash-2"></i> Delete
                            </button>

                            <a href="{{ route('tags.dashboard') }}" class="btn btn-outline-secondary">
                                Cancel
                            </a>
                        </div> 
                    </div>
                </form>
            </div>

            <div class="col-3">
                @include('tags.partials.sidebar', ['tag' => $tag])
            </div>
        </div>
    </div>
@endsection