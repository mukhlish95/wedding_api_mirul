@extends('layouts.app')
@include('layouts.navbar')

@section('content')
    <div class="container mb-5 mt-5" style="padding:50px; background:rgba(255, 255, 255, 0.655);">
        {{-- Alert success --}}
        @if( session('success'))
            <p class="alert alert-success">{{ session('success') }}</p>
        @endif
        <form action="{{ route('wish.update', $wish->id) }}" method="POST">
            @csrf
            <h1 class="">EDIT RSVP</h1>
            {{-- input name --}}
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{$wish->nama}}" >
            </div>
            <div class="mb-3">
                <label for="komen" class="form-label">Ucapan</label>
                <input type="text" class="form-control @error('komen') is-invalid @enderror" id="komen" name="komen" value="{{$wish->komen}}" >
            </div>
            <div class="d-flex justify-content-between w-100">
                {{-- Back button --}}
                <a href="{{ route('wish.index') }}">Back</a>
                {{-- Save button --}}
                <button class="btn btn-primary" value="#">Save</button>
            </div>
        </form>
    </div>
@endsection

@section('scripts')
    @parent
@endsection