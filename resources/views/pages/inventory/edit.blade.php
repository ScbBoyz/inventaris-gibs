<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-2">
            {{ $building->name }}
        </h2>
        <div class="text-sm text-gray-500 mb-6">Akses menu dan informasi penting lainnya di sini</div>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-10">
        <div class="bg-white rounded-md p-4 mb-4">
            <div class="flex justify-between mb-3">
                <div class="font-semibold text-lg text-gray-800 leading-tight">
                    <table class="w-full">
                        <tr>
                            <td class="pr-4">Nomor Ruang</td>
                            <td>: {{ $room->name }}</td>
                        </tr>
                        <tr>
                            <td class="pr-4">Ruang</td>
                            <td>: {{ $room->number }}</td>
                        </tr>
                        <tr>
                            <td class="pr-4">Tanggal</td>
                            <td>: {{ $room->created_at->format('d-m-Y') }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-md p-6">
                <form action="{{ route('inventory.update', ['inventory' => $inventory->id, 'building' => $building->id, 'room' => $room->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="grid grid-cols-1 gap-6">
                        <!-- Dropdown untuk Tahun -->
                        <div>
                            <label for="year" class="block text-sm font-medium text-gray-700">Tahun</label>
                            <select id="year" name="year" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                @for ($i = 0; $i <= 5; $i++)
                                    <option value="{{ date('Y', strtotime($room->created_at . " +$i years")) }}" {{ $inventory->year == date('Y', strtotime($room->created_at . " +$i years")) ? 'selected' : '' }}>
                                        {{ date('Y', strtotime($room->created_at . " +$i years")) }}
                                    </option>
                                @endfor
                            </select>
                        </div>

                        <!-- Dropdown untuk Item -->
                        <div>
                            <label for="item_id" class="block text-sm font-medium text-gray-700">Nama Barang</label>
                            <select id="item_id" name="item_id" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                @foreach ($items as $item)
                                    <option value="{{ $item->id }}" {{ $inventory->item_id == $item->id ? 'selected' : '' }}>
                                        {{ $item->name }} - {{ $item->merk }} - {{ $item->color }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- jumlah --}}
                        <div>
                            <label for="quantity" class="block text-sm font-medium text-gray-700">Jumlah</label>
                            <input type="text" name="quantity" value="{{ $inventory->quantity }}" rows="3" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        </div>

                        <!-- Kondisi Barang -->
                        <div class="grid grid-cols-3 gap-6">
                            <div>
                                <label for="good" class="block text-sm font-medium text-gray-700">Kondisi Baik</label>
                                <input type="number" id="good" name="good" required min="0" value="{{ $inventory->good }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" placeholder="Jumlah">
                            </div>
                            <div>
                                <label for="not_good" class="block text-sm font-medium text-gray-700">Kondisi Kurang Baik</label>
                                <input type="number" id="not_good" name="not_good" required min="0" value="{{ $inventory->not_good }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" placeholder="Jumlah">
                            </div>
                            <div>
                                <label for="bad" class="block text-sm font-medium text-gray-700">Kondisi Rusak</label>
                                <input type="number" id="bad" name="bad" required min="0" value="{{ $inventory->bad }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" placeholder="Jumlah">
                            </div>
                        </div>

                        <!-- Keterangan -->
                        <div>
                            <label for="information" class="block text-sm font-medium text-gray-700">Keterangan</label>
                            <input type="text" name="information" value="{{ $inventory->information }}" rows="3" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        </div>

                        <!-- Tombol Submit -->
                        <div class="mt-6">
                            <button type="submit" class="bg-blue-950 text-white rounded-md py-2 px-4">Perbarui Inventaris</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
