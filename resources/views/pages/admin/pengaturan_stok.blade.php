@extends('layouts.dashboard')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Pengaturan Stok Minimum</h1>

    <!-- Notifikasi -->
    @if(session('success'))
    <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
        {{ session('success') }}
    </div>
    @endif

    <!-- Form untuk Pengaturan Stok Minimum -->
    <form action="" method="POST">
        @csrf
        <div class="overflow-x-auto relative">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                    <tr>
                        <th scope="col" class="px-6 py-3">ID</th>
                        <th scope="col" class="px-6 py-3">Nama Produk</th>
                        <th scope="col" class="px-6 py-3">Stok Saat Ini</th>
                        <th scope="col" class="px-6 py-3">Stok Minimum</th>
                    </tr>
                </thead>
                {{-- <tbody>
                    @foreach($products as $product)
                    <tr class="bg-white border-b">
                        <td class="px-6 py-4">{{ $product->id }}</td>
                        <td class="px-6 py-4">{{ $product->name }}</td>
                        <td class="px-6 py-4">{{ $product->stock }}</td>
                        <td class="px-6 py-4">
                            <input 
                                type="number" 
                                name="minimum_stock[{{ $product->id }}]" 
                                value="{{ old('minimum_stock.' . $product->id, $product->minimum_stock) }}" 
                                class="border border-gray-300 rounded p-2 w-full"
                                min="0">
                        </td>
                    </tr>
                    @endforeach
                </tbody> --}}
            </table>
        </div>

        {{-- <div class="mt-4">
            <button type="submit" class="px-6 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                Simpan Perubahan
            </button>
        </div> --}}
    </form>
</div>
@endsection
