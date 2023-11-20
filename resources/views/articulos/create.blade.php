<x-guest-layout>
    <form method="POST" action="{{ route('articulos.store') }}">
        @csrf

        <!-- Nombre -->
        <div>
            <x-input-label for="denominacion" :value="'Nombre del artículo'" />
            <x-text-input id="denominacion" class="block mt-1 w-full" type="text" name="denominacion" :value="old('denominacion')" required autofocus autocomplete="denominacion" />
            <x-input-error :messages="$errors->get('denominacion')" class="mt-2" />
        </div>
        <div>
            <x-input-label for="precio" :value="'Precio'" />
            <x-text-input id="precio" class="block mt-1 w-full" type="text" name="precio" :value="old('precio')" required autofocus autocomplete="precio" />
            <x-input-error :messages="$errors->get('precio')" class="mt-2" />
        </div>
        <div>
            <x-input-label for="categoria_id" :value="'Categoría'" />
            <select id="categoria_id" name="categoria_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @foreach ($categorias as $categoria)
                <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('categoria_id')" class="mt-2" />
        </div>
        <div class="flex items-center justify-end mt-4">
            <a href="{{ route('categorias.index') }}">
                <x-secondary-button class="ms-4">
                    Volver
                </x-primary-button>
            </a>
            <x-primary-button class="ms-4">
                Insertar
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
