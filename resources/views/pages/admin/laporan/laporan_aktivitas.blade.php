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
                                    class="ml-1 text-gray-700 hover:text-primary-600 md:ml-2 dark:text-gray-300 dark:hover:text-white">Laporan Aktifitas User</a>
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
                <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl">Laporan Aktifitas User</h1>

            </div>
            
            
            <div class="block md:flex md:items-center md:justify-between space-y-4 md:space-y-0 md:space-x-4">
                <!-- Export Button -->
                <div class="w-full md:w-auto flex justify-center">
                    <a href="{{ route('admin.laporan.laporan-aktivitas.export') }}"
                       class="inline-flex items-center justify-center w-full md:w-auto px-3 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-300 rounded hover:bg-gray-100 focus:ring-4 focus:ring-primary-300">
                        <svg class="w-5 h-5 mr-2 -ml-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
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
                               
                                <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase">
                                    Tanggal
                                </th>
                                <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase">
                                    Nama User
                                </th>
                                <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase">
                                    Role
                                </th>
                                <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase">
                                    Aktivitas
                                </th>
                            </tr>
                        </thead>
                    
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($laporan_aktivitas as $laporan)
                                <tr class="hover:bg-gray-100">
                                    
                                    <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap">
                                        {{ \Carbon\Carbon::parse($laporan->date)->format('d/m/Y') }}
                                    </td>
                                    <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap">
                                        {{ $laporan->user->name ?? 'Unknown User' }}
                                    </td>
                                    <td class="p-4 text-base font-semibold text-gray-900 whitespace-nowrap">
                                        @if($laporan->user->role == 'admin')
                                            Admin
                                        @elseif($laporan->user->role == 'manajer_gudang')
                                            Manajer Gudang
                                        @elseif($laporan->user->role == 'staff_gudang')
                                            Staff Gudang
                                        @else
                                            {{ $laporan->user->role }} 
                                        @endif
                                    </td>
                                    <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap">
                                        {{ $laporan->log }}
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