<x-app-layout>
    <x-slot name="header">
        {{-- <h2 class="font-semibold text-lg text-gray-800 leading-tight mb-6">
            {{ __('Cardápio') }}
        </h2> --}}
    </x-slot>

    <div class="py-2 min-h-screen">
        <div class="max-w-6xl mx-auto sm:px-4 lg:px-6">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Bem-vindo ao Ticket do Restaurante Universitário!!") }}
                    
                    <!-- Incluindo a View do Cardápio -->
                    @include('menu_semanal.cardapio', ['cardapios' => $cardapios])
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
