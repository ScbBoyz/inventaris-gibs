<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Petugas
        </h2>
        <div class="text-sm text-gray-500">Akses menu dan informasi penting lainnya di sini</div>
    </x-slot>

    <div class="py-12">
        @if (session('success'))
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-3">
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Berhasil!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        </div>
        @endif

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-md p-4 mb-4">
                <div class="flex justify-between mb-3">
                    <form action="{{ route('officer.index') }}" method="GET" class="flex items-center space-x-2 w-full md:w-auto">
                        <input type="text" name="search" placeholder="Cari Officer..." value="{{ request('search') }}"
                            class="border border-gray-300 rounded-md px-3 py-2 text-sm focus:ring-blue-500 focus:border-blue-500">
                        <button type="submit" class="bg-blue-950 text-white rounded-md text-sm py-2 px-3">Cari</button>
                    </form>
                    <a href="{{ route('officer.create') }}" class="bg-blue-950 text-white rounded-md text-sm py-2 px-3">Tambah Officer</a>
                </div>
            </div>

            <div class="bg-white rounded-md p-4 mb-4">
                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr>
                                <th class="px-6 py-3">No</th>
                                <th class="px-6 py-3">Nama Officer</th>
                                <th class="px-6 py-3">Nomor Telepon</th>
                                <th class="px-6 py-3">Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($officers as $officer)
                            <tr class="bg-white border-b">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    {{ $loop->iteration }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $officer->name }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $officer->phone }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $officer->email }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
