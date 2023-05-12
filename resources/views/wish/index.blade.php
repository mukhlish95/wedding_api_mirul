@extends('layouts.app')
@extends('layouts.navbar')

{{-- CSS --}}
@section('head')
    @parent
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
    <style>
    .container-master{
        height:90%;
        width:100%;      
    }
    .container{
        width: 60%;
        font-size: 50%;
    }
    </style>
@endsection

@section('content')
    {{-- Container --}}
    <div class="container rounded mx-auto d-block mt-3">
        
        {{-- ALERT MESSAGE --}}
        @if( session('success'))
            <p class="alert alert-success">{{ session('success') }}</p>
        @endif

        <div class="d-flex justify-content-between w-100">
            <h5 class="text-light">Wish</h5>
            {{-- ADD NEW BUTTON --}}
            <a class="btn btn-primary btn-sm align-self-center h-7" href="{{ route('wish.create') }}">ADD NEW</a>
        </div>
        {{-- wish list Table --}}
        <table class="table">
            <thead class="bg-dark text-light text-sm " style="font-size: 12px">
                <th>No</th>
                <th>Nama</th>
                <th>Ucapan</th>
                <th>Action</th>
            </thead>
            <tbody class="text-sm" style="font-size: 10px">
                @foreach ($wishes as $wish)
                    <tr class="text-dark">
                        <td>{{ $counter++ }}</td>
                        <td>{{ $wish->nama }}</td>
                        <td>{{ $wish->komen }}</td>
                        <td> 
                        {{-- EDIT BUTTON --}}
                            <a href="{{ route('wish.edit', $wish->id) }}" class="btn btn-primary btn-sm " style="min-width: 63px" >EDIT</a>
                            
                            {{-- DELETE BUTTON --}}
                            <form action="{{ route('wish.destroy', $wish->id)}}" method="POST" class="d-inline" 
                                onsubmit="return confirm ('Are you sure you want to delete?')">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm" style="background-color: red">DELETE</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{-- END Table --}}
        {{-- PAGINATION --}}
        <div class="d-flex justify-content-start ">{{$wishes->links()}}</div>
    </div>
@endsection

@section('scripts')
    @parent
@endsection