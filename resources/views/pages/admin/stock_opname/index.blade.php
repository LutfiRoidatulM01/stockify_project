@extends('layouts.dashboard')

@section('title', 'Riwayat Transaksi Stok')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold text-gray-800 mb-4">Stok Opname</h1>

    <div class="bg-white shadow rounded-lg p-6">
        <!-- Search and Filter -->
        <div class="flex justify-between items-center mb-4">
            <div>
                <label for="search" class="block text-sm font-medium text-gray-700">Cari Stock</label>
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
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Produk</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">SKU</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Stok Sistem</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Stok Fisik</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Selisih</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Keterangan</th>

                    </tr>
                </thead>
                {{-- <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($stok_opname as $stok)
                    <tr>
                        <td class="px-6 py-3 text-sm text-gray-900">{{ $transaction->id }}</td>
                        <td class="px-6 py-3 text-sm text-gray-500">{{ $transaction->product->name }}</td>
                        <td class="px-6 py-3 text-sm text-gray-500">{{ $transaction->user->name}}</td>
                        <td class="px-6 py-3 text-sm text-gray-500">{{ $transaction->type }}</td>
                        <td class="px-6 py-3 text-sm text-gray-500">{{ $transaction->quantity }}</td>
                        <td class="px-6 py-3 text-sm text-gray-500">{{ $transaction->date }}</td>
                        <td class="px-6 py-3 text-sm text-gray-500">{{ $transaction->status }}</td>
                        <td class="px-6 py-3 text-sm text-gray-500">{{ $transaction->notes }}</td>
                    </tr>
                @endforeach
                </tbody> --}}
            </table>
        </div>

        
    </div>
</div>
@endsection
