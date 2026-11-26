@extends('layouts.app')

@section('title', 'Editar cuenta')

@section('content')

<div class="mb-4">

    <h1 class="page-title h2">
        Editar cuenta
    </h1>

    <p class="text-muted">
        Actualiza la información de la cuenta.
    </p>

</div>

<form method="POST" action="{{ route('cuentas.update', $cuenta) }}">

    @csrf

    @method('PUT')

    @include('cuentas.form')

</form>

@endsection