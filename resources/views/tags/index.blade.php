@extends('layouts.app')

@section('content')
    <div class="container-fluid py-3">
        <div class="page-header">
            <h1 class="page-title">Ticket tags</h1>
            <div class="page-subtitle">Overzicht</div>

            <div class="page-options d-flex">
                <a href="{{ route('tags.create') }}" class="btn btn-secondary">
                    <i class="fe fe-plus"></i>
                </a>
                <form method="GET" action="" class="w-100 ml-2">
                    <input type="text" class="form-control" @input('term') placeholder="Zoek tag">
                </form>
            </div>
        </div>
    </div>

    <div class="container-fluid pb-3">
        @include ('flash::message')  {{-- Flash session view partial --}}

        <div class="card card-body border-0 shadow-sm">
            <div class="table-responsive">
                <table class="table table-sm mb-0">
                    <thead>
                        <tr>
                            <th scope="col" class="border-top-0">#</th>
                            <th scope="col" class="border-top-0">Title</th>
                            <th scope="col" class="border-top-0">Description</th>
                            <th scope="col" class="border-top-0">Tickets</th>
                            <th scope="col" class="border-top-0">&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($tags as $tag) {{-- Loop through the support desk tags. --}}
                            <tr>
                                <th scope="row"><span class="font-weight-bold text-secondary">#{{ $tag->id }}</th>
                                <td class="font-weight-bold">{{ $tag->name }}</td>
                                <td>{{ $tag->description }}</td>
                                <td>
                                    <span class="small text-success">{{ $tag->tickets()->open(true)->count() }} open</span>
                                    <span class="small text-secondary">/</span>
                                    <span class="small text-danger">{{ $tag->tickets()->open(false)->count() }} closed</span>
                                </td>

                                <td> {{-- Options --}}
                                    <span class="float-right">
                                        <a href="{{ route('tags.show', $tag) }}" class="text-decoration-none text-secondary mr-2">
                                            <i class="fe fe-eye mr-1"></i> View
                                        </a>
                                        <a href="{{ route('tags.delete', $tag) }}" class="text-decoration-none text-danger">
                                            <i class="fe fe-trash-2 mr-1"></i> Delete
                                        </a>
                                    </span>
                                </td> {{-- /// Options--}}
                            </tr>
                        @empty {{-- There are no tags currently in the support desk  --}} 
                            <tr>
                                <td colspan="5" class="text-secondary">
                                    Currently there are no ticket tags in {{ config('app.name') }}
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{ $tags->links() }} {{-- Pagination view partial --}}
        </div>
    </div>
@endsection