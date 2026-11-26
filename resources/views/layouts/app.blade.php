<!doctype html>
<html lang="es"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
<title>@yield('title','Gestor Financiero') | Gestor Financiero</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
<style>
:root{--brand:#176b4d;--brand2:#23845f;--ink:#1f2937;--muted:#718096;--bg:#f4f7f6}
body{background:var(--bg);color:var(--ink);font-family:system-ui,-apple-system,"Segoe UI",sans-serif}
.navbar{background:linear-gradient(110deg,#12583f,#21835d)}.navbar-brand{font-weight:750;letter-spacing:.2px}
.nav-link{color:#e7f5ee!important}.nav-link.active,.nav-link:hover{background:#ffffff20;border-radius:8px}
.page-wrap{max-width:1220px}.page-title{font-weight:750;letter-spacing:-.5px}.card{border:0;border-radius:16px;box-shadow:0 5px 22px #153d2b0b}
.stat-icon{width:48px;height:48px;border-radius:14px;display:grid;place-items:center;font-size:1.3rem}
.btn-success{background:var(--brand);border-color:var(--brand)}.btn-success:hover{background:#10543c;border-color:#10543c}
.form-control,.form-select{border-radius:10px;padding:.65rem .8rem}.table thead th{font-size:.78rem;text-transform:uppercase;letter-spacing:.5px;color:#718096;background:#f8faf9}
.badge-soft{background:#e8f5ee;color:#176b4d}.text-muted{color:var(--muted)!important}
@media(max-width:767px){.navbar .container{gap:8px}.navbar-nav{flex-direction:row;flex-wrap:wrap}.navbar-nav .nav-link{padding:.45rem .55rem;font-size:.9rem}}
</style></head><body>
<nav class="navbar navbar-expand-lg navbar-dark shadow-sm"><div class="container page-wrap">
<a class="navbar-brand" href="{{ route('dashboard') }}"><i class="bi bi-wallet2 me-2"></i>Gestor Financiero</a>
<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav"><span class="navbar-toggler-icon"></span></button>
<div class="collapse navbar-collapse" id="mainNav"><ul class="navbar-nav me-auto ms-lg-4 gap-lg-1">
<li class="nav-item"><a class="nav-link {{ request()->routeIs('dashboard')?'active':'' }}" href="{{ route('dashboard') }}"><i class="bi bi-grid me-1"></i>Inicio</a></li>
<li class="nav-item"><a class="nav-link {{ request()->routeIs('categorias.*')?'active':'' }}" href="{{ route('categorias.index') }}"><i class="bi bi-tags me-1"></i>Categorías</a></li>
<li class="nav-item"><a class="nav-link {{ request()->routeIs('cuentas.*')?'active':'' }}" href="{{ route('cuentas.index') }}"><i class="bi bi-bank me-1"></i>Cuentas</a></li>
<li class="nav-item"><a class="nav-link {{ request()->routeIs('transacciones.*')?'active':'' }}" href="{{ route('transacciones.index') }}"><i class="bi bi-arrow-left-right me-1"></i>Movimientos</a></li>
</ul><div class="d-flex align-items-center gap-3 text-white"><span class="small d-none d-md-inline"><i class="bi bi-person-circle me-1"></i>{{ auth()->user()->name }}</span>
<form method="POST" action="{{ route('logout') }}">@csrf<button class="btn btn-sm btn-outline-light"><i class="bi bi-box-arrow-right me-1"></i>Salir</button></form></div></div></div></nav>
<main class="container page-wrap py-4 py-lg-5">
@if(session('success'))<div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert"><i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}<button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>@endif
@if(session('error'))<div class="alert alert-danger alert-dismissible fade show shadow-sm" role="alert"><i class="bi bi-exclamation-triangle-fill me-2"></i>{{ session('error') }}<button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>@endif
@if($errors->any())<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong><i class="bi bi-exclamation-circle me-1"></i>Revisa los datos:</strong><ul class="mb-0 mt-1">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul><button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>@endif
@yield('content')</main><footer class="container page-wrap pb-4 text-center small text-muted">Gestor Financiero · Programación III</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>@stack('scripts')</body></html>
