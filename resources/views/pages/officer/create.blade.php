<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Petugas
        </h2>
        <div class="text-sm text-gray-500">Akses menu dan informasi penting lainnya di sini</div>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-20">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <form action="{{ route('officer.store')}}" method="POST" class="max-w-sm mx-auto">
                    @csrf

                    <div class="mb-5">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Officer</label>
                        <input type="text" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Masukkan Nama Ruangan" required />
                    </div>

                    <div class="mb-5">
                        <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No.Telephone</label>
                        <input type="text" name="phone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Masukkan Nomor Ruangan" required />
                    </div>

                    <div class="mb-5">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                        <input type="email" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Masukkan Nomor Ruangan" required />
                    </div>

                    <button type="submit" class="mt-4 text-white bg-blue-950 font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center">Submit</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
