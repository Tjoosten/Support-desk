@extends('layouts.app')

@section('content')
    <div class="container-fluid py-3">
        <div class="page-header">
            <h1 class="page-title">Ticket tag: {{ ucfirst($tag->name) }}</h1>
            <div class="page-subtitle">Information</div>

            <div class="page-options d-flex">
                <a href="" class="btn btn-outline-danger mr-2">
                    <i class="fe fe-trash-2 mr-2"></i> Delete tag
                </a>

                <a href="{{ route('tags.dashboard') }}" class="btn btn-secondary">
                    <i class="fe fe-list mr-2"></i> Overview
                </a>
            </div>
        </div>
    </div>
@endsection