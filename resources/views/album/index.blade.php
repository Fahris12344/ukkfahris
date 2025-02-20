@extends('partials.main')
@section('content')
    <!-- Hero Section -->
    <div class="tm-hero d-flex justify-content-center align-items-center"
        style="background: url({{ asset('asset/img/hero.jpg') }}) no-repeat center center; background-size: cover;"
        aria-label="Hero image">
        <form class="d-flex tm-search-form">
            <input class="form-control tm-search-input" type="search" placeholder="Cari..." aria-label="Search">
            <button class="btn btn-primary tm-search-btn" type="submit">
                <i class="fas fa-search"></i>
            </button>
        </form>
    </div>
    <div class="container">
        <!-- Button to create a new album -->
        <div class="mt-3">
            <a href="{{ route('album.create') }}" class="btn btn-primary">Tambah</a>
        </div>

        <!-- Display albums -->
        <div class="mt-4">
            <div class="row">

                @foreach ($albums as $album)
                <div class="col-sm-3 mb-3 mb-sm-0">
                    <div class="card">
                      <div class="card-body">
                                <h5 class="card-title">{{ $album->nama }}</h5>
                                <p class="card-text">{{ $album->deskripsi ?? 'Tidak ada deskripsi.' }}</p>
                                {{-- <a href="{{route('album.show')}}">
                                learn more
                            </a> --}}

                                <form action="{{ route('album.destroy', $album->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i></button>
                                    <a href="" class="btn btn-primary"><i class="bi bi-zoom-in"></i></a>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
 </div>
@endsection
