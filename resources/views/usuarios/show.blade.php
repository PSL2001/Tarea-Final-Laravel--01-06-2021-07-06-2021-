<x-plantilla>
    <x-slot name="titulo">Gestion</x-slot>
    <x-slot name="cabecera">Detalles Usuario ({{ $usuario->id }})</x-slot>
    <div class="card bg-dark text-white border-info mb-3 m-auto" style="width: 34rem;">
        <div class="card-body">
            <h4 class="card-title text-info">{{ $usuario->nomusu }}</h4>
            <h6 class="card-subtitle mb-2 text-muted">{{ $usuario->mail }}</h6>
            <h6 class="card-subtitle mb-2 text-muted"></h6>
            <p class="card-text"><b>Localidad: </b> {{ $usuario->localidad }}</p>

            <p class="card-text"><u>Perfil asignado a este usuario</u>
            <ul class="list-group">
                <li class="list-group-item list-group-item-action list-group-item-dark">
                    <a href="{{ route('perfils.show', $usuario->perfil->id) }}"
                        class="card-link">{{ $usuario->perfil->nombre }}</a>
                </li>
            </ul>
            </p>

            <div class="card-footer bg-transparent border-info mt-2">
                <button class="ml-3 btn btn-primary" onclick="window.history.back();"><i class="fas fa-backward"></i>
                    Volver</button>
            </div>

        </div>
    </div>

</x-plantilla>
