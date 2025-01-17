@extends('layouts.dashboard')

@section('content')
    <div class="container mx-auto px-4">
        <h1 class="text-2xl font-bold text-gray-800 mb-4 dark:text-gray-200 mt-8">Admin Dashboard</h1>

        <!-- Grid Layout -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
            <!-- Box Produk -->
            <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6 flex items-center">
                <div class="p-4 border border-blue-500 text-blue-500 rounded-full mr-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M20 13V20H4V13M20 10L12 3L4 10" />
                    </svg>
                </div>
                <div>
                    <h2 class="text-lg font-semibold text-gray-700 dark:text-gray-200">Jumlah Produk</h2>
                    <p class="text-3xl font-bold text-gray-900 dark:text-gray-100">{{ $jumlahProduk }}</p>
                </div>
            </div>

            <!-- Box Transaksi Masuk -->
            <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6 flex items-center">
                <div class="p-4 border border-green-500 text-green-500 rounded-full mr-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8V12M12 16H12.01M4 4H20M4 20H20" />
                    </svg>
                </div>
                <div>
                    <h2 class="text-lg font-semibold text-gray-700 dark:text-gray-200">Transaksi Masuk</h2>
                    <p class="text-3xl font-bold text-gray-900 dark:text-gray-100">{{ $jumlahTransaksiMasuk }}</p>
                </div>
                <div class="flex items-center">
                    <div class="mr-4"></div>
                    <div>
                        <canvas id="barChart" width="100" height="100"></canvas>
                    </div>
                </div>
            </div>

            <!-- Box Transaksi Keluar -->
            <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6 flex items-center">
                <div class="p-4 border border-red-500 text-red-500 rounded-full mr-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M20 13L12 20L4 13M12 3V20" />
                    </svg>
                </div>
                <div>
                    <h2 class="text-lg font-semibold text-gray-700 dark:text-gray-200">Transaksi Keluar</h2>
                    <p class="text-3xl font-bold text-gray-900 dark:text-gray-100">{{ $jumlahTransaksiKeluar }}</p>
                </div>
            </div>
        </div>


        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-4">
            <!-- Grafik Stok Barang -->
            <div class="col-span-1 bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
                <h2 class="text-lg font-semibold text-gray-700 dark:text-gray-200 mb-4">Grafik Stok Barang</h2>
                <canvas id="productStockChart" width="400" height="200"></canvas>

                {{-- <div class="flex flex-col items-center mt-4">
                    <span class="text-sm text-gray-700 dark:text-gray-400">
                        Showing <span
                            class="font-semibold text-gray-900 dark:text-white">{{ $products->firstItem() }}</span> to <span
                            class="font-semibold text-gray-900 dark:text-white">{{ $products->lastItem() }}</span> of <span
                            class="font-semibold text-gray-900 dark:text-white">{{ $products->total() }}</span> Entries
                    </span>

                    <div class="inline-flex mt-2 xs:mt-0">
                        <!-- Previous Button -->
                        @if ($products->onFirstPage())
                            <button disabled
                                class="flex items-center justify-center px-3 h-8 text-sm font-medium text-white bg-gray-400 rounded-s cursor-not-allowed">
                                <svg class="w-3.5 h-3.5 me-2 rtl:rotate-180" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M13 5H1m0 0 4 4M1 5l4-4" />
                                </svg>
                                Prev
                            </button>
                        @else
                            <a href="{{ $products->previousPageUrl() }}"
                                class="flex items-center justify-center px-3 h-8 text-sm font-medium text-white bg-primary-700 rounded-s hover:bg-primary-800 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                <svg class="w-3.5 h-3.5 me-2 rtl:rotate-180" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M13 5H1m0 0 4 4M1 5l4-4" />
                                </svg>
                                Prev
                            </a>
                        @endif

                        <!-- Next Button -->
                        @if ($products->hasMorePages())
                            <a href="{{ $products->nextPageUrl() }}"
                                class="flex items-center justify-center px-3 h-8 text-sm font-medium text-white bg-primary-700 border-0 border-s border-gray-700 rounded-e hover:bg-primary-800 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                Next
                                <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                </svg>
                            </a>
                        @else
                            <button disabled
                                class="flex items-center justify-center px-3 h-8 text-sm font-medium text-white bg-gray-400 rounded-e cursor-not-allowed">
                                Next
                                <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                </svg>
                            </button>
                        @endif
                    </div>
                </div> --}}
            </div>

            <div class="col-span-1 bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
                <h2 class="text-lg font-semibold text-gray-700 dark:text-gray-200 mb-4">Aktivitas Pengguna Terbaru</h2>
                <div class="overflow-y-auto max-h-64"> <!-- Tambahkan scrollable area -->
                    <table class="min-w-full divide-y divide-gray-200 table-fixed">
                        <thead class="bg-[#3B82F6] dark:bg-[#1E3A8A]">
                            <tr>
                                <th scope="col" class="p-4">
                                    <div class="flex items-center">
                                        <input id="checkbox-all" aria-describedby="checkbox-1" type="checkbox"
                                            class="w-4 h-4 border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="checkbox-all" class="sr-only">checkbox</label>
                                    </div>
                                </th>
                                <th scope="col" class="p-4 text-xs font-medium text-left text-white uppercase">Nama
                                    User</th>
                                <th scope="col" class="p-4 text-xs font-medium text-left text-white uppercase">Activity
                                </th>
                                <th scope="col" class="p-4 text-xs font-medium text-left text-white uppercase">Waktu
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($userActivities->isNotEmpty())
                                @foreach ($userActivities as $activity)
                                    <tr>
                                        <td class="p-4">
                                            <div class="flex items-center">
                                                <input type="checkbox"
                                                    class="w-4 h-4 border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600">
                                            </div>
                                        </td>
                                        <td class="p-4 text-sm text-gray-900 dark:text-gray-300">
                                            {{ $activity->user->name ?? 'Unknown User' }}</td>
                                        <td class="p-4 text-sm text-gray-900 dark:text-gray-300">{{ $activity->log }}</td>
                                        <td class="p-4 text-sm text-gray-900 dark:text-gray-300">
                                            {{ $activity->created_at->format('d-m-Y H:i:s') }}
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="5" class="p-4 text-center text-gray-500 dark:text-gray-400">Tidak ada
                                        aktivitas.</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

    <script>
        const productNames = @json($productNames);
        const stockQuantities = @json($stockQuantities);
    
        const ctx = document.getElementById('productStockChart').getContext('2d');
        const productStockChart = new Chart(ctx, {
            type: 'line', 
            data: {
                labels: productNames,
                datasets: [{
                    label: 'Stok Barang',
                    data: stockQuantities,
                    backgroundColor: 'rgba(56, 189, 248, 0.5)', 
                    borderColor: '#3B82F6', 
                    borderWidth: 2, 
                    fill: true, 
                    tension: 0.3 
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection
