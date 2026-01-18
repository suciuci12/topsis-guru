<nav class="bg-green-600 shadow">
<div class="max-w-7xl mx-auto px-4">

<div class="flex justify-between h-16 items-center">

<!-- LOGO -->
<div class="flex items-center gap-2">

<img src="{{ asset('images/LOGOAPP-removebg-preview.png') }}" class="h-12 w-auto">

<span class="text-white font-bold">
CN-AWARD
</span>

</div>

<!-- MENU -->
<div class="flex gap-2">

<a href="/dashboard"
class="nav-btn px-4 py-2 text-white rounded
{{ request()->is('dashboard') ? 'nav-active' : '' }}">
Dashboard
</a>

@if(auth()->user()->role == 'admin')

<a href="/guru"
class="nav-btn px-4 py-2 text-white rounded
{{ request()->is('guru*') ? 'nav-active' : '' }}">
Guru
</a>

<a href="/kriteria"
class="nav-btn px-4 py-2 text-white rounded
{{ request()->is('kriteria*') ? 'nav-active' : '' }}">
Kriteria
</a>

<a href="/nilai"
class="nav-btn px-4 py-2 text-white rounded
{{ request()->is('nilai*') ? 'nav-active' : '' }}">
Nilai
</a>

@endif

<a href="/topsis"
class="nav-btn px-4 py-2 text-white rounded
{{ request()->is('topsis*') ? 'nav-active' : '' }}">
Hasil TOPSIS
</a>

</div>

<!-- USER -->
<div class="flex items-center gap-3">

<span class="text-white">
{{ auth()->user()->name }}
</span>

<form method="POST" action="{{ route('logout') }}">
@csrf
<button class="bg-white text-green-700 px-3 py-1 rounded">
Logout
</button>
</form>

</div>

</div>
</div>
</nav>
