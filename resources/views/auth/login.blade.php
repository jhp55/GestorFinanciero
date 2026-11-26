<x-guest-layout>
@if(session('status'))<div class="alert alert-success">{{ session('status') }}</div>@endif
<form method="POST" action="{{ route('login') }}">@csrf
<div class="mb-3"><label class="form-label" for="email">Correo electrónico</label><input class="form-control" id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username"></div>
<div class="mb-3"><label class="form-label" for="password">Contraseña</label><input class="form-control" id="password" type="password" name="password" required autocomplete="current-password"></div>
<div class="form-check mb-3"><input class="form-check-input" type="checkbox" name="remember" id="remember"><label class="form-check-label" for="remember">Recordarme</label></div>
<button class="btn btn-success w-100 py-2">Ingresar</button></form>
<div class="text-center mt-3 small">¿No tienes cuenta? <a href="{{ route('register') }}" class="link-success">Regístrate</a></div>
</x-guest-layout>
