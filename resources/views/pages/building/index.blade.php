<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Data Inventaris
        </h2>
        <div class="text-sm text-gray-500">Akses menu dan informasi penting lainnya di sini</div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-md p-4 mb-4">
                <div class="flex justify-between items-center">
                    <form action="{{ route('building.index') }}" method="GET" class="flex items-center space-x-2 w-full md:w-auto">
                        <input type="text" name="search" placeholder="Cari Building..." value="{{ request('search') }}"
                            class="border border-gray-300 rounded-md px-3 py-2 text-sm focus:ring-blue-500 focus:border-blue-500">
                        <button type="submit" class="bg-blue-950 text-white rounded-md text-sm py-2 px-3">Cari</button>
                    </form>
                    <a href="{{ route('building.create') }}" class="bg-blue-950 text-white rounded-md text-sm py-2 px-3">
                        Tambah Data Gedung
                    </a>
                </div>
            </div>
            <div class="bg-white rounded-md p-4 mb-4">
                <div class="relative overflow-x-auto">
                    <div class="flex flex-wrap justify-start">
                        @foreach ($buildings as $building)
                        <div class="w-full md:w-1/2 p-4">
                            <div class="bg-white shadow-md rounded-lg p-4 flex items-center">
                                <img src="{{ asset('images/buildings/' . $building->image) }}" alt="{{ $building->name }}" class="w-42 h-42 object-cover mr-4">
                                <div class="flex flex-col">
                                    <a href="{{ route('room.index', $building->id) }}" class="text-xl font-semibold mb-2">{{ $building->name }}</a>
                                    <p class="text-gray-500 mb-4">Dibuat pada: {{ $building->created_at }}</p>
                                    <div class="flex space-x-4">
                                        <a href="{{ route('building.edit', $building->id) }}" class="text-blue-950 hover:underline">Edit</a>
                                        <form action="{{ route('building.destroy', $building->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:underline">Hapus</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
