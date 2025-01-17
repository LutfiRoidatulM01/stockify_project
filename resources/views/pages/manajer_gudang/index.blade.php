@extends('layouts.dashboard')

@section('content')
    <div class="container mx-auto px-4">
        <h1 class="text-2xl font-bold text-gray-800 mb-4 dark:text-gray-200 mt-8">Manajer Dashboard</h1>
        <div class="w-full bg-white shadow-md rounded-lg p-6 mb-4 dark:bg-gray-800">
            <h2 class="text-lg font-semibold text-gray-700 mb-4 dark:text-gray-300">Informasi Stok Menipis</h2>
            <div class="flex flex-col">
                <div class="overflow-x-auto">
                    <div class="inline-block min-w-full align-middle">
                        <div class="overflow-hidden shadow">
                            <table class="min-w-full divide-y divide-gray-200 table-fixed dark:divide-gray-700">
                                <thead class="bg-gray-100 dark:bg-gray-700">
                                    <tr>
                                        <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-300">Nama Produk</th>
                                        <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-300">SKU</th>
                                        <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-300">Stok</th>
                                        <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-300">Stok Minimum</th>
                                        <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-300">Status Produk</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                                    @foreach ($stokMenipis as $product)
                                        <tr class="hover:bg-gray-100 dark:hover:bg-gray-600">
                                            <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-300">{{ $product->name }}</td>
                                            <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-300">{{ $product->sku }}</td>
                                            <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-300">{{ $product->totalStock() }}</td>
                                            <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-300">{{ $product->minimum_stock }}</td>
                                            <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap">
                                                <span class="px-2 py-1 text-xs font-medium text-white bg-red-500 rounded">Stok Menipis</span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="grid grid-cols-2 gap-4 mt-4">
            <!-- Barang Masuk yang Perlu Diperiksa -->
            <div class="col-span-1 bg-white shadow-md rounded-lg p-6 dark:bg-gray-800">
                <h2 class="text-lg font-semibold text-gray-700 mb-4 dark:text-gray-300">Barang Masuk Hari Ini</h2>
                <div class="flex flex-col">
                    <div class="overflow-x-auto">
                        <div class="inline-block min-w-full align-middle">
                            <div class="overflow-hidden shadow">
                                <table class="min-w-full divide-y divide-gray-200 table-fixed dark:divide-gray-700">
                                    <thead class="bg-gray-100 dark:bg-gray-700">
                                        <tr>
                                            <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-300">ID</th>
                                            <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-300">Produk</th>
                                            <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-300">Jumlah</th>
                                            <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-300">Status</th>
                                            <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-300">Tanggal</th>
                                            <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-300">Catatan</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                                        @foreach ($barangMasuk as $transaction)
                                            <tr class="hover:bg-gray-100 dark:hover:bg-gray-600">
                                                <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-300">{{ $transaction->id }}</td>
                                                <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-300">{{ $transaction->product->name }}</td>
                                                <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-300">{{ $transaction->quantity }}</td>
                                                <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-300">
                                                    @php
                                                        $statusColors = [
                                                            'pending' => 'bg-yellow-100 text-yellow-800',
                                                            'diterima' => 'bg-green-100 text-green-800',
                                                            'ditolak' => 'bg-red-100 text-red-800',
                                                            'dikeluarkan' => 'bg-blue-100 text-blue-800',
                                                        ];
                                                        $statusColor = $statusColors[$transaction->status] ?? 'bg-gray-100 text-gray-800';
                                                    @endphp
                                                    <span class="px-2 py-1 text-xs font-medium rounded {{ $statusColor }}">
                                                        {{ ucfirst($transaction->status) }}
                                                    </span>
                                                </td>
                                                <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-300">{{ $transaction->date }}</td>
                                                <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-300">{{ $transaction->notes }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
            <!-- Barang Keluar yang Perlu Diperiksa -->
            <div class="col-span-1 bg-white shadow-md rounded-lg p-6 dark:bg-gray-800">
                <h2 class="text-lg font-semibold text-gray-700 mb-4 dark:text-gray-300">Barang Keluar Hari Ini</h2>
                <div class="flex flex-col">
                    <div class="overflow-x-auto">
                        <div class="inline-block min-w-full align-middle">
                            <div class="overflow-hidden shadow">
                                <table class="min-w-full divide-y divide-gray-200 table-fixed dark:divide-gray-700">
                                    <thead class="bg-gray-100 dark:bg-gray-700">
                                        <tr>
                                            <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark :text-gray-300">ID</th>
                                            <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-300">Produk</th>
                                            <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-300">Jumlah</th>
                                            <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-300">Status</th>
                                            <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-300">Tanggal</th>
                                            <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-300">Catatan</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                                        @foreach ($barangKeluar as $transaction)
                                            <tr class="hover:bg-gray-100 dark:hover:bg-gray-600">
                                                <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-300">{{ $transaction->id }}</td>
                                                <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-300">{{ $transaction->product->name }}</td>
                                                <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-300">{{ $transaction->quantity }}</td>
                                                <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-300">
                                                    @php
                                                        $statusColors = [
                                                            'pending' => 'bg-yellow-100 text-yellow-800',
                                                            'diterima' => 'bg-green-100 text-green-800',
                                                            'ditolak' => 'bg-red-100 text-red-800',
                                                            'dikeluarkan' => 'bg-blue-100 text-blue-800',
                                                        ];
                                                        $statusColor = $statusColors[$transaction->status] ?? 'bg-gray-100 text-gray-800';
                                                    @endphp
                                                    <span class="px-2 py-1 text-xs font-medium rounded {{ $statusColor }}">
                                                        {{ ucfirst($transaction->status) }}
                                                    </span>
                                                </td>
                                                <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-300">{{ $transaction->date }}</td>
                                                <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-300">{{ $transaction->notes }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
