@extends('layouts.dashboard')

@section('title', 'Riwayat Transaksi Stok')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold text-gray-800 mb-4">Riwayat Transaksi Stok</h1>

    <div class="bg-white shadow rounded-lg p-6">
        <!-- Search and Filter -->
        <div class="flex justify-between items-center mb-4">
            <div>
                <label for="search" class="block text-sm font-medium text-gray-700">Cari Transaksi</label>
                <div class="relative mt-1">
                    <input type="text" id="search" name="search" placeholder="Cari berdasarkan produk atau supplier..." 
                        class="block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>
            </div>
            <div>
                <label for="filter-date" class="block text-sm font-medium text-gray-700">Filter Tanggal</label>
                <input type="date" id="filter-date" name="filter-date" 
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
        </div>

        <!-- Transaction Table -->
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase">ID</th>
                        <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase">Produk</th>
                        <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase">Nama User</th>
                        <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase">Jenis Transaksi</th>
                        <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase">Jumlah</th>
                        <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase">Tanggal</th>
                        <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase">Status</th>
                        <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase">Catatan</th>
              
                    </tr>
                </thead>

                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($transactions as $transaction)
                    <tr>
                        <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap">{{ $transaction->id }}</td>
                        <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap">{{ $transaction->product->name }}</td>
                        <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap">{{ $transaction->user->name}}</td>
                        <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap">{{ $transaction->type }}</td>
                        <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap">{{ $transaction->quantity }}</td>
                        <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap">{{ $transaction->date }}</td>
                        <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap">{{ $transaction->status }}</td>
                        <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap">{{ $transaction->notes }}</td>
                    </tr>
                    @endforeach
                </tbody>
                
            </table>
        </div>
    </div>
</div>
@endsection
