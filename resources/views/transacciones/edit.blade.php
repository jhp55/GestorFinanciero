@extends('layouts.app')

@section('title', 'Editar movimiento')

@section('content')

<div class="mb-4">

    <h1 class="page-title h2">
        Editar movimiento
    </h1>

    <p class="text-muted">
        El saldo anterior se revertirá y se aplicarán los nuevos datos.
    </p>

</div>

<form method="POST" action="{{ route('transacciones.update', $transaccion) }}">

    @csrf

    @method('PUT')

    @include('transacciones.form')

</form>

@endsection