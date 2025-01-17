@extends('layouts.dashboard')
@section('content')
    @php

    @endphp

    <div class="p-4 bg-white block sm:flex items-center justify-between border-b border-gray-200 lg:mt-1.5">
        <div class="w-full mb-1">
            <div class="mb-4">
                <nav class="flex mb-5" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 text-sm font-medium md:space-x-2">
                        <li class="inline-flex items-center">
                            <a href="#"
                                class="inline-flex items-center text-gray-700 hover:text-primary-600 dark:text-gray-300 dark:hover:text-white">
                                <svg class="w-5 h-5 mr-2.5" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
                                    </path>
                                </svg>
                                Dashboard
                            </a>
                        </li>
                        <li>
                            <div class="flex items-center">
                                <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <a href="#"
                                    class="ml-1 text-gray-700 hover:text-primary-600 md:ml-2 dark:text-gray-300 dark:hover:text-white">Laporan
                                    Transaksi</a>
                            </div>
                        </li>
                        <li>
                            <div class="flex items-center">
                                <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="ml-1 text-gray-400 md:ml-2 dark:text-gray-500" aria-current="page">List</span>
                            </div>
                        </li>
                    </ol>
                </nav>
                <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl">Laporan Transaksi Masuk dan Keluar</h1>

            </div>


            <div class="block md:flex md:items-center md:justify-between space-y-4 md:space-y-0 md:space-x-4">
                <form action="" method="GET" class="flex flex-wrap gap-2 md:gap-4 items-center">
                    <div class="w-full md:w-auto">
                        <select name="transaction_type"
                            class="w-full p-1.5 text-sm border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-primary-500">
                            <option value="">Pilih Type</option>
                            <option value="Masuk" {{ request('transaction_type') == 'Masuk' ? 'selected' : '' }}>Masuk</option>
                            <option value="Keluar" {{ request('transaction_type') == 'Keluar' ? 'selected' : '' }}>Keluar</option>
                        </select>
                    </div>

                    <div class="w-full md:w-auto">
                        <label for="start_date" class="block text-xs text-gray-600">Start Date</label>
                        <input type="date" name="start_date" value="{{ request('start_date') }}"
                            class="w-full p-1.5 text-sm border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-primary-500">
                    </div>

                    <div class="w-full md:w-auto">
                        <label for="end_date" class="block text-xs text-gray-600">End Date</label>
                        <input type="date" name="end_date" value="{{ request('end_date') }}"
                            class="w-full p-1.5 text-sm border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-primary-500">
                    </div>

                    <div class="w-full md:w-auto">
                        <button type="submit"
                            class="w-full px-3 py-1.5 text-sm bg-primary-500 text-white rounded hover:bg-primary-600 focus:outline-none focus:ring-2 focus:ring-primary-500">
                            Filter
                        </button>
                    </div>
                </form>

                <div class="w-full md:w-auto flex justify-center">
                    <a href="{{ route('admin.laporan.laporanTransaksi.export', request()->all()) }}"
                        class="inline-flex items-center justify-center w-full md:w-auto px-3 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-300 rounded hover:bg-gray-100 focus:ring-4 focus:ring-primary-300">
                        <svg class="w-5 h-5 mr-2 -ml-1" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6zm5 6a1 1 0 10-2 0v3.586l-1.293-1.293a1 1 0 10-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 11.586V8z"
                                clip-rule="evenodd"></path>
                        </svg>
                        Export
                    </a>
                </div>
            </div>


        </div>
    </div>
    <div class="flex flex-col">
        <div class="overflow-x-auto">
            <div class="inline-block min-w-full align-middle">
                <div class="overflow-hidden shadow">
                    <table class="min-w-full divide-y divide-gray-200 table-fixed">
                        <thead class="bg-gray-100">
                            <tr>
                                <th scope="col" class="p-4">
                                    <div class="flex items-center">
                                        <input id="checkbox-all" aria-describedby="checkbox-1" type="checkbox"
                                            class="w-4 h-4 border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300">
                                        <label for="checkbox-all" class="sr-only">checkbox</label>
                                    </div>
                                </th>
                                <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase">
                                    Nama Produk
                                </th>
                                <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase">
                                    Transaksi
                                </th>

                                <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase">
                                    Jumlah
                                </th>
                                <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase">
                                    Status
                                </th>
                                <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase">
                                    Tanggal
                                </th>

                            </tr>
                        </thead>

                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($laporan_transaksi as $laporan)
                                <tr class="hover:bg-gray-100">
                                    <td class="w-4 p-4">
                                        <div class="flex items-center">
                                            <input id="checkbox-{{ $laporan->id }}"
                                                aria-describedby="checkbox-{{ $laporan->id }}" type="checkbox"
                                                class="w-4 h-4 border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300">
                                            <label for="checkbox-{{ $laporan->id }}" class="sr-only">checkbox</label>
                                        </div>
                                    </td>
                                    <td class="p-4 text-base font-semibold text-gray-900 whitespace-nowrap">
                                        {{ $laporan->product->name }}
                                    </td>
                                    <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap">
                                        {{ $laporan->type }}
                                    </td>

                                    <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap">
                                        {{ $laporan->quantity }}
                                    </td>
                                    <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap">
                                        @php
                                            $statusColors = [
                                                'pending' => 'bg-yellow-100 text-yellow-800',
                                                'diterima' => 'bg-green-100 text-green-800',
                                                'ditolak' => 'bg-red-100 text-red-800',
                                                'dikeluarkan' => 'bg-blue-100 text-blue-800',
                                            ];
                                            $defaultColor = 'bg-gray-100 text-gray-800';
                                            $statusColor = $statusColors[$laporan->status] ?? $defaultColor;
                                        @endphp
                                        <span class="px-2 py-1 text-xs font-medium rounded {{ $statusColor }}">
                                            {{ ucfirst($laporan->status ?? 'Tidak Diketahui') }}
                                        </span>
                                    </td>
                                    <td class="p-4 text-sm font-normal text-gray-900 whitespace-nowrap">
                                        {{ \Carbon\Carbon::parse($laporan->date)->format('d/m/Y') }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection
