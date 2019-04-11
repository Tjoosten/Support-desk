@extends('layouts.app')

@section('content')
    <div class="container-fluid py-3">
        <div class="page-header">
            <h1 class="page-title">Ticket tag: {{ ucfirst($tag->name) }}</h1>
            <div class="page-subtitle">Information</div>

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
                <form method="POST" action="{{ route('tags.update', $tag) }}" class="card card-body shadow-sm border-0">
                    @csrf                       {{-- Form field protection --}}
                    @form($tag)                 {{-- Bind model data to the form. --}}
                    @method('PATCH')            {{-- HTTP method spoofing --}}

                    <h6 class="border-bottom border-gray pb-1 mb-3">Update information</h6>
                    @include('flash::message')  {{-- Flash session view partial --}}

                    <div class="form-row">
                        <div class="form-group col-7">
                            <label for="title">Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('name', 'is-invalid')" placeholder="Name for the tag" @input('name') id="name">
                            @error('name')
                        </div>

                        <div class="form-group col-12">
                            <label for="description">Description <span class="text-danger">*</span></label>
                            <textarea class="form-control @error('description', 'is-invalid')" rows="3" id="description" placeholder="Short description of the label" @input('description')>{{ $tag->description ?? old('description') }}</textarea>
                            @error('description')
                        </div>
                    </div>

                    <hr class="mt-0">

                    <div class="form-row">
                        <div class="form-group col-12 mb-0">
                            <button type="submit" class="btn btn-success">Update</button>
                            <button type="reset" class="btn btn-light">Reset</button>
                        </div>
                    </div>
                </form>
            </div>
            
            <div class="col-3">
                @include ('tags.partials.sidebar', ['tag' => $tag])
            </div>
        </div>
    </div>
@endsection