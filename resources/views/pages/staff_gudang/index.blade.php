@extends('layouts.dashboard')

@section('content')
    <div class="container mx-auto px-4">
        <h1 class="text-2xl font-bold text-gray-800 mb-4 dark:text-gray-200 mt-8">Staff Dashboard</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
            <!-- Barang Masuk yang Perlu Diperiksa -->
            <div class="bg-white shadow-md rounded-lg p-6">
                <h2 class="text-lg font-semibold text-gray-700 mb-4">Barang Masuk yang Perlu Diperiksa</h2>
                <div class="flex flex-col">
                    <div class="overflow-x-auto">
                        <div class="inline-block min-w-full align-middle">
                            <div class="overflow-hidden shadow">
                                <table class="min-w-full divide-y divide-gray-200 table-fixed">
                                    <thead class="bg-[#3B82F6]">
                                        <tr>
                                            <th scope="col" class="p-4">
                                                <div class="flex items-center">
                                                    <input id="checkbox-all" aria-describedby="checkbox-1" type="checkbox"
                                                        class="w-4 h-4 border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300">
                                                    <label for="checkbox-all" class="sr-only">checkbox</label>
                                                </div>
                                            </th>
                                            <th scope="col" class="p-4 text-xs font-medium text-left text-white uppercase">
                                                ID
                                            </th>
                                            <th scope="col" class="p-4 text-xs font-medium text-left text-white uppercase">
                                                Produk
                                            </th>
                                            <th scope="col" class="p-4 text-xs font-medium text-left text-white uppercase">
                                                Jumlah
                                            </th>
                                           
                                            <th scope="col" class="p-4 text-xs font-medium text-left text-white uppercase">
                                                Status
                                            </th>
                                            <th scope="col" class="p-4 text-xs font-medium text-left text-white uppercase">
                                                Tanggal
                                            </th>
                                            <th scope="col" class="p-4 text-xs font-medium text-left text-white uppercase">
                                                Catatan
                                            </th>

                                        </tr>
                                    </thead>
            
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach ($barangMasuk as $transaction)
                                            <tr class="hover:bg-gray-100">
                                                <td class="w-4 p-4">
                                                    <div class="flex items-center">
                                                        <input id="checkbox-{{ $transaction->id }}"
                                                            aria-describedby="checkbox-{{ $transaction->id }}" type="checkbox"
                                                            class="w-4 h-4 border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300">
                                                        <label for="checkbox-{{ $transaction->id }}" class="sr-only">checkbox</label>
                                                    </div>
                                                </td>
                                                <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap">
                                                    {{ $transaction->id }}
                                                </td>
                                                <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap">
                                                    {{ $transaction->product->name }}</td>
                                                <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap">
                                                    {{ $transaction->quantity }}</td>
                                                
                                                <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap">
                                                    @php
                                                        $statusColors = [
                                                            'pending' => 'bg-yellow-100 text-yellow-800',
                                                            'diterima' => 'bg-green-100 text-green-800',
                                                            'ditolak' => 'bg-red-100 text-red-800',
                                                            'dikeluarkan' => 'bg-blue-100 text-blue-800',
                                                        ];
                                                        $defaultColor = 'bg-gray-100 text-gray-800';
                                                        $statusColor = $statusColors[$transaction->status] ?? $defaultColor;
                                                    @endphp
                                                    <span class="px-2 py-1 text-xs font-medium rounded {{ $statusColor }}">
                                                        {{ ucfirst($transaction->status ?? 'Tidak Diketahui') }}
                                                    </span>
                                                </td>
            
                                                <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap">
                                                    {{ $transaction->date }}</td>
                                                <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap">
                                                    {{ $transaction->notes }}</td>
                                                
            
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
            <div class="bg-white shadow-md rounded-lg p-6">
                <h2 class="text-lg font-semibold text-gray-700 mb-4">Barang Keluar yang Perlu Diperiksa</h2>
                <div class="flex flex-col">
                    <div class="overflow-x-auto">
                        <div class="inline-block min-w-full align-middle">
                            <div class="overflow-hidden shadow">
                                <table class="min-w-full divide-y divide-gray-200 table-fixed">
                                    <thead class="bg-[#3B82F6]">
                                        <tr>
                                            <th scope="col" class="p-4">
                                                <div class="flex items-center">
                                                    <input id="checkbox-all" aria-describedby="checkbox-1" type="checkbox"
                                                        class="w-4 h-4 border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300">
                                                    <label for="checkbox-all" class="sr-only">checkbox</label>
                                                </div>
                                            </th>
                                            <th scope="col" class="p-4 text-xs font-medium text-left text-white uppercase">
                                                ID
                                            </th>
                                            <th scope="col" class="p-4 text-xs font-medium text-left text-white uppercase">
                                                Produk
                                            </th>
                                            <th scope="col" class="p-4 text-xs font-medium text-left text-white uppercase">
                                                Jumlah
                                            </th>
                                           
                                            <th scope="col" class="p-4 text-xs font-medium text-left text-white uppercase">
                                                Status
                                            </th>
                                            <th scope="col" class="p-4 text-xs font-medium text-left text-white uppercase">
                                                Tanggal
                                            </th>
                                            <th scope="col" class="p-4 text-xs font-medium text-left text-white uppercase">
                                                Catatan
                                            </th>

                                        </tr>
                                    </thead>
            
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach ($barangKeluar as $transaction)
                                            <tr class="hover:bg-gray-100">
                                                <td class="w-4 p-4">
                                                    <div class="flex items-center">
                                                        <input id="checkbox-{{ $transaction->id }}"
                                                            aria-describedby="checkbox-{{ $transaction->id }}" type="checkbox"
                                                            class="w-4 h-4 border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300">
                                                        <label for="checkbox-{{ $transaction->id }}" class="sr-only">checkbox</label>
                                                    </div>
                                                </td>
                                                <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap">
                                                    {{ $transaction->id }}
                                                </td>
                                                <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap">
                                                    {{ $transaction->product->name }}</td>
                                                <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap">
                                                    {{ $transaction->quantity }}</td>
                                                
                                                <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap">
                                                    @php
                                                        $statusColors = [
                                                            'pending' => 'bg-yellow-100 text-yellow-800',
                                                            'diterima' => 'bg-green-100 text-green-800',
                                                            'ditolak' => 'bg-red-100 text-red-800',
                                                            'dikeluarkan' => 'bg-blue-100 text-blue-800',
                                                        ];
                                                        $defaultColor = 'bg-gray-100 text-gray-800';
                                                        $statusColor = $statusColors[$transaction->status] ?? $defaultColor;
                                                    @endphp
                                                    <span class="px-2 py-1 text-xs font-medium rounded {{ $statusColor }}">
                                                        {{ ucfirst($transaction->status ?? 'Tidak Diketahui') }}
                                                    </span>
                                                </td>
            
                                                <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap">
                                                    {{ $transaction->date }}</td>
                                                <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap">
                                                    {{ $transaction->notes }}</td>
                                                
            
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
