<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Halaman Tambah Barang
                </h2>
                <div class="text-sm text-gray-500">Akses menu dan informasi penting lainnya di sini</div>
            </div>
            <div>
                <a href="{{ route('item.index') }}" class="bg-blue-950 text-white rounded-md py-2 px-4 text-sm">Kembali</a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        @if ($errors->any())
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-3">
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Terjadi Kesalahan!</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('item.store') }}" method="POST" class="max-w-sm mx-auto">
                        @csrf

                        <div class="mb-5">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Nama Barang</label>
                            <input type="text" name="name" id="name" required
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="Masukkan Nama Barang" />
                        </div>

                        <div class="mb-5">
                            <label for="merk" class="block mb-2 text-sm font-medium text-gray-900">Merk</label>
                            <input type="text" name="merk" id="merk" required
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="Masukkan Merk Barang" />
                        </div>

                        <div class="mb-5">
                            <label for="color" class="block mb-2 text-sm font-medium text-gray-900">Warna</label>
                            <input type="text" name="color" id="color" required
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="Masukkan Warna Barang" />
                        </div>

                        <button type="submit" class="mt-4 text-white bg-blue-950 font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center">Simpan Barang</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
