@extends('layouts.app')

@section('content')
@if (strtolower(auth()->user()->type) === 'admin')
    
<div class="container-fluid">
    <h1 class="text-black-50">Bienvenido, Administrador!</h1>
</div>

@endif

@endsection
