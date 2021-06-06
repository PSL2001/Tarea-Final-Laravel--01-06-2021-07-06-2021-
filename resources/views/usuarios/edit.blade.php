<x-plantilla>
    <x-slot name="titulo">Creacion</x-slot>
    <x-slot name="cabecera">Editando Usuario</x-slot>
    <x-errores />
    <form name="sd" method="POST" action="{{route('usuarios.update', $usuario)}}" class="p-4 bg-dark text-light">
        @csrf
        @method("PUT")
        @bind($usuario)
        <x-form-input name="nomusu" label="Nombre de usuario" />
        <x-form-input name="mail" label="E-Mail" type="mail" />
        <x-form-input name="localidad" label="Localidad" />
        <x-form-select name="perfil_id" :options="$misPerfils" label="Haz click abajo y asigna un perfil:" />

        <div class="mt-3">
            <button type="submit" class="btn btn-info"><i class="fas fa-save"></i> Crear</button>
            <button type="reset" class=" ml-3 btn btn-warning"><i class="fas fa-broom"></i> Limpiar</button>
            <button class="ml-3 btn btn-primary" onclick="window.history.back();"><i class="fas fa-backward"></i>
                Volver</button>
        </div>
    </form>
</x-plantilla>
