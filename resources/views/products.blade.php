@extends('layouts.main')

@section('title', 'HDC Events')

@section('content')

    <h1>Esta é a página de produtos!</h1>

    @if ($busca != '')
        <p>O usuário esta buscando por: {{ $busca }}</p>
    @endif

@endsection