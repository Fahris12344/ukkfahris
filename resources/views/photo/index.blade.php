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
        <div class="mt-3">
            <a href="{{ route('photo.create') }}" class="btn btn-primary">Tambah</a>
        </div>

        <div class="mt-4">
            <div class="row">

                @foreach ($photos as $photo)
                    <div class="col-xl-3 col-lg-4 col-md-5 col-sm-6 col-2 d-flex justify-content-end gap-10 mt-3">
                        <div class="card">
                                <a href="{{ route('photo.show', $photo->id) }}">
                                    <img src="{{ asset('storage/' . $photo->foto) }}" class="card-img-top"
                                        alt="{{ $photo->judul }}">
                                </a>
                                <div class="card-body">
                                <h5 class="card-title">{{ $photo->judul }}</h5>
                                <p class="card-text">{{ $photo->deskripsi ?? 'Tidak ada deskripsi.' }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
