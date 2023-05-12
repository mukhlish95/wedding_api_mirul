@extends('layouts.app')
@include('layouts.navbar')

@section('content')
    <div class="container mb-5 mt-5" style="padding:50px; background:rgba(255, 255, 255, 0.655);">
        {{-- Alert success --}}
        @if( session('success'))
            <p class="alert alert-success">{{ session('success') }}</p>
        @endif
        <form action="{{ route('rsvp.update', $rsvp->id) }}" method="POST">
            @csrf
            <h1 class="">EDIT RSVP</h1>
            {{-- input name --}}
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{$rsvp->nama}}" >
            </div>
            <div class="mb-3">
                <label for="no_tel" class="form-label">No Tel</label>
                <input type="text" class="form-control @error('no_tel') is-invalid @enderror" id="no_tel" name="no_tel" value="{{$rsvp->no_tel}}" >
            </div>
            <div class="mb-3">
                <label for="kehadiran" class="form-label">Kehadiran</label>
                <input type="text" class="form-control @error('kehadiran') is-invalid @enderror" id="kehadiran" name="kehadiran" value="{{$rsvp->kehadiran}}" >
            </div>
            <div class="d-flex justify-content-between w-100">
                {{-- Back button --}}
                <a href="{{ route('rsvp.index') }}">Back</a>
                {{-- Save button --}}
                <button class="btn btn-primary" value="#">Save</button>
            </div>
        </form>
    </div>
@endsection

@section('scripts')
    @parent
@endsection