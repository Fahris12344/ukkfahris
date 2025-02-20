@extends('partials.main')

@section('content')
    <div class="container mt-5 mb-5">
        <div class="row">
            @foreach ($photos as $photo)
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm rounded">
                        <div class="card-body">
                            <img src="{{ asset('storage/' . $photo->foto) }} class="rounded" style="width: 100%">
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card border-0 shadow-sm rounded">
                        <div class="card-body">
                            <h3>{{ $photo->judul }}</h3>
                            <hr />
                            <code>
                                <p>{!! $photo->description !!}</p>
                            </code>
                            <hr />
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
