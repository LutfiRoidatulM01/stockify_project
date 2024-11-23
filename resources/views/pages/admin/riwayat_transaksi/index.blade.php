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
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Produk</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama User</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jenis Transaksi</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jumlah</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Catatan</th>
              
                    </tr>
                </thead>

                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($transactions as $transaction)
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
                </tbody>
                {{-- <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($transactions as $transaction)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $transaction->created_at->format('d M Y') }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $transaction->product->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm {{ $transaction->type === 'in' ? 'text-green-600' : 'text-red-600' }}">
                            {{ $transaction->type === 'in' ? 'Barang Masuk' : 'Barang Keluar' }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $transaction->quantity }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $transaction->supplier->name ?? '-' }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                            <a href="{{ route('stock_transactions.show', $transaction->id) }}" 
                               class="text-indigo-600 hover:text-indigo-900">Detail</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody> --}}
            </table>
        </div>

        <!-- Pagination -->
        {{-- <div class="mt-4">
            {{ $transactions->links() }}
        </div> --}}
    </div>
</div>
@endsection
