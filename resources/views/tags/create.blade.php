@extends('layouts.app')

@section('content')
    <div class="container-fluid py-3">
        <div class="page-header">
            <h1 class="page-title">Ticket tags</h1>
            <div class="page-subtitle">Create new tag</div>

            <div class="page-options d-flex">
                <a href="{{ route('tags.dashboard') }}" class="btn btn-secondary">
                    <i class="fe fe-list mr-2"></i> Overview
                </a>
            </div>
        </div>
    </div>

    <div class="container-fluid pb-3">
        <form method="POST" action="{{ route('tags.store') }}" class="card card-body border-0 shadow-sm">
            @csrf {{-- Form field protection --}}

            <div class="form-row">
                <div class="form-group col-7">
                    <label for="title">Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('name', 'is-invalid')" placeholder="Name for the tag" @input('name') id="name">
                    @error('name')
                </div>

                <div class="form-group col-12">
                    <label for="description">Description <span class="text-danger">*</span></label>
                    <textarea class="form-control @error('description', 'is-invalid')" rows="3" id="description" placeholder="Short description of the label" @input('description')>{{ old('description') }}</textarea>
                    @error('description')
                </div>
            </div>

            <hr class="mt-0">

            <div class="form-row">
                <div class="form-group col-12 mb-0">
                    <button type="submit" class="btn btn-success">Create</button>
                    <button type="reset" class="btn btn-light">Reset</button>
                </div>
            </div>
        </form>
    </div>
@endsection