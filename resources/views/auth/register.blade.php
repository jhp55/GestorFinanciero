<x-guest-layout><form method="POST" action="{{ route('register') }}">@csrf
<div class="mb-3"><label class="form-label">Nombre</label><input class="form-control" name="name" value="{{ old('name') }}" required autofocus></div>
<div class="mb-3"><label class="form-label">Correo electrónico</label><input class="form-control" type="email" name="email" value="{{ old('email') }}" required></div>
<div class="mb-3"><label class="form-label">Contraseña</label><input class="form-control" type="password" name="password" required autocomplete="new-password"></div>
<div class="mb-3"><label class="form-label">Confirmar contraseña</label><input class="form-control" type="password" name="password_confirmation" required></div>
<button class="btn btn-success w-100 py-2">Crear cuenta</button></form><div class="text-center mt-3 small">¿Ya tienes cuenta? <a href="{{ route('login') }}" class="link-success">Inicia sesión</a></div></x-guest-layout>
