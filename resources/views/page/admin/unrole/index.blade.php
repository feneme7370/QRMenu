<!-- Authentication -->
<form method="POST" action="{{ route('logout') }}" x-data>
    @csrf

    <button type="submit">Salir</button>
</form>