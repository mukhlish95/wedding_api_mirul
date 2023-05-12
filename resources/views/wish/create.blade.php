@extends('layouts.app')
@include('layouts.navbar')

@section('content')
    <form action="{{ route('wish.store') }}" method="POST">
        @csrf
        <div class="container mb-5" style="padding:50px; background:rgba(255, 255, 255, 0.655);">
            <h1 class="">CREATE WISH</h1>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Nama</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama') }}" >
                @error('nama')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Komen</label>
                <input type="text" class="form-control @error('komen') is-invalid @enderror" id="komen" name="komen" value="{{ old('komen') }}" >
                @error('komen')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="d-flex justify-content-between w-100">
                {{-- Back button --}}
                <a href="{{ route('wish.index') }}">Back</a>
                {{-- Save button --}}
                <button class="btn btn-primary" value="#">Save</button>
            </div>
        </div> 
    </form>
@endsection

@section('scripts')
    @parent
@endsection