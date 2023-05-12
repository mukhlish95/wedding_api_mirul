@extends('layouts.app')
@include('layouts.navbar')

@section('content')
    <form action="{{ route('rsvp.store') }}" method="POST">
        @csrf
        <div class="container mb-5" style="padding:50px; background:rgba(255, 255, 255, 0.655);">
            <h1 class="">CREATE RSVP</h1>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Nama</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama') }}" >
                @error('nama')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">No Tel</label>
                <input type="text" class="form-control @error('no_tel') is-invalid @enderror" id="no_tel" name="no_tel" value="{{ old('no_tel') }}" >
                @error('no_tel')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Kehadiran</label>
                <input type="text" class="form-control @error('kehadiran') is-invalid @enderror" id="kehadiran" name="kehadiran" value="{{ old('kehadiran') }}" >
                @error('kehadiran')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="d-flex justify-content-between w-100">
                {{-- Back button --}}
                <a href="{{ route('rsvp.index') }}">Back</a>
                {{-- Save button --}}
                <button class="btn btn-primary" value="#">Save</button>
            </div>
        </div> 
    </form>
@endsection

@section('scripts')
    @parent
@endsection