@extends('layouts.app')

@section('title', 'Movimientos')

@section('content')

<div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">

    <div>

        <h1 class="page-title h2 mb-1">
            Movimientos
        </h1>

        <p class="text-muted mb-0">
            Historial de ingresos y gastos.
        </p>

    </div>

    <a class="btn btn-success" href="{{ route('transacciones.create') }}">

        <i class="bi bi-plus-lg me-1"></i>

        Nuevo movimiento

    </a>

</div>

<div class="card p-3 mb-3">

    <form class="row g-2 align-items-end">

        <div class="col-md-3">

            <label class="form-label small">
                Tipo
            </label>

            <select class="form-select" name="tipo">

                <option value="">
                    Todos
                </option>

                <option value="ingreso" @selected(request('tipo') === 'ingreso')>
                    Ingresos
                </option>

                <option value="gasto" @selected(request('tipo') === 'gasto')>
                    Gastos
                </option>

            </select>

        </div>

        <div class="col-md-3">

            <label class="form-label small">
                Desde
            </label>

            <input
                class="form-control"
                type="date"
                name="desde"
                value="{{ request('desde') }}"
            >

        </div>

        <div class="col-md-3">

            <label class="form-label small">
                Hasta
            </label>

            <input
                class="form-control"
                type="date"
                name="hasta"
                value="{{ request('hasta') }}"
            >

        </div>

        <div class="col-md-3 d-flex gap-2">

            <button class="btn btn-outline-success flex-grow-1">
                Filtrar
            </button>

            <a href="{{ route('transacciones.index') }}" class="btn btn-light">
                Limpiar
            </a>

        </div>

    </form>

</div>

<div class="card p-3 p-md-4">

    <div class="table-responsive">

        <table class="table align-middle">

            <thead>

                <tr>
                    <th>Fecha</th>
                    <th>Tipo</th>
                    <th>Cuenta</th>
                    <th>Categoría</th>
                    <th>Descripción</th>
                    <th>Registrado por</th>
                    <th class="text-end">Monto</th>
                    <th></th>
                </tr>

            </thead>

            <tbody>

                @forelse($transacciones as $t)

                    <tr>

                        <td class="text-nowrap">
                            {{ $t->fecha->format('d/m/Y') }}
                        </td>

                        <td>

                            <span class="badge {{ $t->tipo === 'ingreso' ? 'text-bg-success' : 'text-bg-danger' }}">
                                {{ ucfirst($t->tipo) }}
                            </span>

                        </td>

                        <td>
                            {{ $t->cuenta->nombre }}
                        </td>

                        <td>
                            {{ $t->categoria->nombre }}
                        </td>

                        <td>
                            {{ $t->descripcion ?: '—' }}
                        </td>

                        <td>
                            {{ $t->creado_por ?: '—' }}
                        </td>

                        <td class="text-end fw-semibold text-nowrap {{ $t->tipo === 'ingreso' ? 'text-success' : 'text-danger' }}">

                            {{ $t->tipo === 'ingreso' ? '+' : '-' }}${{ number_format((float)$t->monto, 2, ',', '.') }}

                        </td>

                        <td class="text-end text-nowrap">

                            <a
                                href="{{ route('transacciones.edit', $t) }}"
                                class="btn btn-sm btn-outline-primary"
                            >
                                <i class="bi bi-pencil"></i>
                            </a>

                            <form
                                class="d-inline"
                                method="POST"
                                action="{{ route('transacciones.destroy', $t) }}"
                                onsubmit="return confirm('¿Eliminar el movimiento? El saldo será revertido.')"
                            >

                                @csrf

                                @method('DELETE')

                                <button class="btn btn-sm btn-outline-danger">
                                    <i class="bi bi-trash"></i>
                                </button>

                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="8" class="text-center text-muted py-4">
                            No hay movimientos para mostrar.
                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection