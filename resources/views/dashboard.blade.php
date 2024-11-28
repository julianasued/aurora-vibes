<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-lg text-gray-800 leading-tight mb-6">
            {{ __('Cardápio') }}
        </h2>
    </x-slot>

    <div class="py-2 min-h-screen">
        <div class="max-w-6xl mx-auto sm:px-4 lg:px-6">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Bem-vindo ao Ticket do Restaurante Universitário!!") }}
                    
                    <!-- Tabela do Cardápio Responsiva -->
                    <div class="mt-16 overflow-x-auto"> <!-- Apliquei mt-16 para ajustar o posicionamento da tabela -->
                        <table class="table-auto w-full border-collapse border border-gray-300 text-sm text-center">
                            <thead class="bg-gray-100">
                                <!-- Cabeçalho -->
                                <tr>
                                    <th rowspan="2" class="border border-gray-300 px-3 py-3">Estrutura do Cardápio</th>
                                    <th colspan="6" class="border border-gray-300 px-3 py-3">ALMOÇO</th>
                                    <th colspan="6" class="border border-gray-300 px-3 py-3">JANTAR</th>
                                </tr>
                                <tr>
                                    <th class="border border-gray-300 px-3 py-3">2ª Feira</th>
                                    <th class="border border-gray-300 px-3 py-3">3ª Feira</th>
                                    <th class="border border-gray-300 px-3 py-3">4ª Feira</th>
                                    <th class="border border-gray-300 px-3 py-3">5ª Feira</th>
                                    <th class="border border-gray-300 px-3 py-3">6ª Feira</th>
                                    <th class="border border-gray-300 px-3 py-3">Sábado</th>
                                    <th class="border border-gray-300 px-3 py-3">2ª Feira</th>
                                    <th class="border border-gray-300 px-3 py-3">3ª Feira</th>
                                    <th class="border border-gray-300 px-3 py-3">4ª Feira</th>
                                    <th class="border border-gray-300 px-3 py-3">5ª Feira</th>
                                    <th class="border border-gray-300 px-3 py-3">6ª Feira</th>
                                    <th class="border border-gray-300 px-3 py-3">Sábado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Salada -->
                                <tr>
                                    <td class="border border-gray-300 px-3 py-3">Salada</td>
                                    <td class="border border-gray-300 px-3 py-3"></td>
                                    <td class="border border-gray-300 px-3 py-3"></td>
                                    <td class="border border-gray-300 px-3 py-3"></td>
                                    <td class="border border-gray-300 px-3 py-3"></td>
                                    <td class="border border-gray-300 px-3 py-3"></td>
                                    <td class="border border-gray-300 px-3 py-3"></td>
                                    <td class="border border-gray-300 px-3 py-3"></td>
                                    <td class="border border-gray-300 px-3 py-3"></td>
                                    <td class="border border-gray-300 px-3 py-3"></td>
                                    <td class="border border-gray-300 px-3 py-3"></td>
                                    <td class="border border-gray-300 px-3 py-3"></td>
                                </tr>
                                <!-- Prato Principal -->
                                <tr>
                                    <td class="border border-gray-300 px-3 py-3">Prato Principal</td>
                                    <td class="border border-gray-300 px-3 py-3"></td>
                                    <td class="border border-gray-300 px-3 py-3"></td>
                                    <td class="border border-gray-300 px-3 py-3"></td>
                                    <td class="border border-gray-300 px-3 py-3"></td>
                                    <td class="border border-gray-300 px-3 py-3"></td>
                                    <td class="border border-gray-300 px-3 py-3"></td>
                                    <td class="border border-gray-300 px-3 py-3"></td>
                                    <td class="border border-gray-300 px-3 py-3"></td>
                                    <td class="border border-gray-300 px-3 py-3"></td>
                                    <td class="border border-gray-300 px-3 py-3"></td>
                                    <td class="border border-gray-300 px-3 py-3"></td>
                                </tr>
                                <!-- Guarnição -->
                                <tr>
                                    <td class="border border-gray-300 px-3 py-3">Guarnição</td>
                                    <td class="border border-gray-300 px-3 py-3"></td>
                                    <td class="border border-gray-300 px-3 py-3"></td>
                                    <td class="border border-gray-300 px-3 py-3"></td>
                                    <td class="border border-gray-300 px-3 py-3"></td>
                                    <td class="border border-gray-300 px-3 py-3"></td>
                                    <td class="border border-gray-300 px-3 py-3"></td>
                                    <td class="border border-gray-300 px-3 py-3"></td>
                                    <td class="border border-gray-300 px-3 py-3"></td>
                                    <td class="border border-gray-300 px-3 py-3"></td>
                                    <td class="border border-gray-300 px-3 py-3"></td>
                                    <td class="border border-gray-300 px-3 py-3"></td>
                                </tr>
                                <!-- Acompanhamentos -->
                                <tr>
                                    <td class="border border-gray-300 px-3 py-3">Acompanhamentos</td>
                                    <td class="border border-gray-300 px-3 py-3"></td>
                                    <td class="border border-gray-300 px-3 py-3"></td>
                                    <td class="border border-gray-300 px-3 py-3"></td>
                                    <td class="border border-gray-300 px-3 py-3"></td>
                                    <td class="border border-gray-300 px-3 py-3"></td>
                                    <td class="border border-gray-300 px-3 py-3"></td>
                                    <td class="border border-gray-300 px-3 py-3"></td>
                                    <td class="border border-gray-300 px-3 py-3"></td>
                                    <td class="border border-gray-300 px-3 py-3"></td>
                                    <td class="border border-gray-300 px-3 py-3"></td>
                                    <td class="border border-gray-300 px-3 py-3"></td>
                                </tr>
                                <!-- Sobremesa -->
                                <tr>
                                    <td class="border border-gray-300 px-3 py-3">Sobremesa</td>
                                    <td class="border border-gray-300 px-3 py-3"></td>
                                    <td class="border border-gray-300 px-3 py-3"></td>
                                    <td class="border border-gray-300 px-3 py-3"></td>
                                    <td class="border border-gray-300 px-3 py-3"></td>
                                    <td class="border border-gray-300 px-3 py-3"></td>
                                    <td class="border border-gray-300 px-3 py-3"></td>
                                    <td class="border border-gray-300 px-3 py-3"></td>
                                    <td class="border border-gray-300 px-3 py-3"></td>
                                    <td class="border border-gray-300 px-3 py-3"></td>
                                    <td class="border border-gray-300 px-3 py-3"></td>
                                    <td class="border border-gray-300 px-3 py-3"></td>
                                </tr>
                                <!-- Exclusivo Vegetarianos -->
                                <tr>
                                    <td class="border border-gray-300 px-3 py-3">Exclusivo para Vegetarianos</td>
                                    <td colspan="6" class="border border-gray-300 px-3 py-3">A definir</td>
                                    <td colspan="6" class="border border-gray-300 px-3 py-3">A definir</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- Fim da Tabela -->
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
