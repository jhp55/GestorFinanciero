@extends('layouts.app')

@section('title', 'Categorías')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>

        <h1 class="page-title h2 mb-1">
            Categorías
        </h1>

        <p class="text-muted mb-0">
            Organiza el origen de tus ingresos y tus gastos.
        </p>

    </div>

    <a class="btn btn-success" href="{{ route('categorias.create') }}">

        <i class="bi bi-plus-lg me-1"></i>

        Nueva categoría

    </a>

</div>

<div class="card p-3 p-md-4">

    <div class="table-responsive">

        <table class="table align-middle">

            <thead>

                <tr>
                    <th>Nombre</th>
                    <th>Tipo</th>
                    <th>Descripción</th>
                    <th>Movimientos</th>
                    <th class="text-end">Acciones</th>
                </tr>

            </thead>

            <tbody>

                @forelse($categorias as $c)

                    <tr>

                        <td class="fw-semibold">
                            {{ $c->nombre }}
                        </td>

                        <td>

                            <span class="badge {{ $c->tipo === 'ingreso' ? 'text-bg-success' : 'text-bg-danger' }}">
                                {{ ucfirst($c->tipo) }}
                            </span>

                        </td>

                        <td>
                            {{ $c->descripcion ?: '—' }}
                        </td>

                        <td>
                            {{ $c->transacciones_count }}
                        </td>

                        <td class="text-end">

                            <a
                                class="btn btn-sm btn-outline-primary"
                                href="{{ route('categorias.edit', $c) }}"
                            >
                                <i class="bi bi-pencil"></i>
                            </a>

                            <form
                                class="d-inline"
                                method="POST"
                                action="{{ route('categorias.destroy', $c) }}"
                                onsubmit="return confirm('¿Eliminar esta categoría?')"
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

                        <td colspan="5" class="text-center text-muted py-4">
                            No hay categorías. Crea la primera.
                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection