@extends('layouts.dashboard')
@section('content')
    @php
        $json = Illuminate\Support\Facades\File::get(public_path('data/products.json'));
        $data = json_decode($json, true);
    @endphp
    <div class="p-4 bg-white block sm:flex items-center justify-between border-b border-gray-200 lg:mt-1.5">
        <div class="w-full mb-1">
            <div class="mb-4">
                <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl">Produk</h1>
            </div>
            <div class="items-center justify-between block sm:flex md:divide-x md:divide-gray-100">
                <div class="flex items-center mb-4 sm:mb-0">
                    <form class="sm:pr-3" action="#" method="GET">
                        <label for="products-search" class="sr-only">Search</label>
                        <div class="relative w-48 mt-1 sm:w-64 xl:w-96">
                            <input type="text" name="email" id="products-search"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5"
                                placeholder="Cari Produk">
                        </div>
                    </form>

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
                                    ID
                                </th>
                                <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase">
                                    Kategori
                                </th>
                                <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase">
                                    Supplier
                                </th>
                                <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase">
                                    SKU
                                </th>
                                <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase">
                                    Nama Produk
                                </th>
                                <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase">
                                    Stok
                                </th>
                                <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase">
                                    Harga Beli
                                </th>
                                <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase">
                                    Harga jual
                                </th>
                               
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($products as $product)
                                <tr>
                                    <td class="p-4">
                                        <div class="flex items-center">
                                            <input type="checkbox"
                                                class="w-4 h-4 border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300">
                                        </div>
                                    </td>

                                    <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap">{{ $product->id }}
                                    </td>
                                    <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap">
                                        {{ $product->category->name }}</td>
                                    <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap">
                                        {{ $product->supplier->name }}</td>
                                    <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap">{{ $product->sku }}
                                    </td>
                                    <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap">{{ $product->name }}
                                    </td>
                                    <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap">{{ $product->totalStock() }}</td>
                                    <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap">
                                        Rp. {{ $product->purchase_price }}</td>
                                    <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap">
                                        Rp. {{ $product->selling_price }}</td>
                                    
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

    <div
        class="sticky bottom-0 right-0 items-center w-full p-4 bg-white border-t border-gray-200 sm:flex sm:justify-between">
        <div class="flex items-center mb-4 sm:mb-0">
            <a href="#"
                class="inline-flex justify-center p-1 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100">
                <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                        clip-rule="evenodd"></path>
                </svg>
            </a>
            <a href="#"
                class="inline-flex justify-center p-1 mr-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100">
                <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                        clip-rule="evenodd"></path>
                </svg>
            </a>
            <span class="text-sm font-normal text-gray-500">Showing <span class="font-semibold text-gray-900">1-20</span>
                of <span class="font-semibold text-gray-900">2290</span></span>
        </div>
        <div class="flex items-center space-x-3">
            <a href="#"
                class="inline-flex items-center justify-center flex-1 px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300">
                <svg class="w-5 h-5 mr-1 -ml-1"" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                        clip-rule="evenodd"></path>
                </svg>
                Previous
            </a>
            <a href="#"
                class="inline-flex items-center justify-center flex-1 px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300">
                Next
                <svg class="w-5 h-5 ml-1 -mr-1" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                        clip-rule="evenodd"></path>
                </svg>
            </a>
        </div>
    </div>

    <!-- Add Product Drawer -->
    {{-- <div class="fixed left-0 right-0 z-50 items-center justify-center hidden overflow-x-hidden overflow-y-auto top-4 md:inset-0 h-modal sm:h-full"
        id="add-product-modal">
        <div class="relative w-full h-full max-w-2xl px-4 md:h-auto">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow">
                <!-- Modal header -->
                <div class="flex items-start justify-between p-5 border-b rounded-t">
                    <h3 class="text-xl font-semibold">
                        Tambah Produk
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                        data-modal-toggle="add-product-modal">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-6 space-y-6">
                    <form action="{{ route('products.store') }}" method="POST">
                        @csrf
                        <div class="grid grid-cols-6 gap-6">
                            <!-- Kategori -->
                            <div class="col-span-6 sm:col-span-3">
                                <label for="category_id"
                                    class="block mb-2 text-sm font-medium text-gray-900">Kategori</label>
                                <select id="category_id" name="category_id"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5"
                                    required>
                                    <option value="">Pilih Kategori</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Supplier -->
                            <div class="col-span-6 sm:col-span-3">
                                <label for="supplier_id"
                                    class="block mb-2 text-sm font-medium text-gray-900">Supplier</label>
                                <select id="supplier_id" name="supplier_id"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5"
                                    required>
                                    <option value="">Pilih Supplier</option>
                                    @foreach ($suppliers as $supplier)
                                        <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- SKU -->
                            <div class="col-span-6 sm:col-span-3">
                                <label for="sku" class="block mb-2 text-sm font-medium text-gray-900">SKU</label>
                                <input type="text" id="sku" name="sku"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5"
                                    placeholder="Masukkan SKU" required>
                            </div>

                            <!-- Nama Produk -->
                            <div class="col-span-6 sm:col-span-3">
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Nama
                                    Produk</label>
                                <input type="text" id="name" name="name"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5"
                                    placeholder="Masukkan Nama Produk" required>
                            </div>

                            <!-- Harga Beli -->
                            <div class="col-span-6 sm:col-span-3">
                                <label for="purchase_price" class="block mb-2 text-sm font-medium text-gray-900">Harga
                                    Beli</label>
                                <input type="number" id="purchase_price" name="purchase_price"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5"
                                    placeholder="Masukkan Harga Beli" required>
                            </div>

                            <!-- Harga Jual -->
                            <div class="col-span-6 sm:col-span-3">
                                <label for="selling_price" class="block mb-2 text-sm font-medium text-gray-900">Harga
                                    Jual</label>
                                <input type="number" id="selling_price" name="selling_price"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5"
                                    placeholder="Masukkan Harga Jual" required>
                            </div>
                        </div>
                </div>
                <!-- Modal footer -->
                <div class="items-center p-6 border-t border-gray-200 rounded-b">
                    <button
                        class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
                        type="submit">Tambah Produk</button>
                </div>
                </form>
            </div>
        </div>
    </div> --}}

    <!-- Edit Product Drawer -->
    {{-- @foreach ($products as $product)
        <div class="fixed left-0 right-0 z-50 items-center justify-center hidden overflow-x-hidden overflow-y-auto top-4 md:inset-0 h-modal sm:h-full"
            id="edit-user-modal-{{ $product->id }}">
            <div class="relative w-full h-full max-w-2xl px-4 md:h-auto">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow">
                    <!-- Modal header -->
                    <div class="flex items-start justify-between p-5 border-b rounded-t">
                        <h3 class="text-xl font-semibold">
                            Edit Produk
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                            data-modal-toggle="edit-user-modal-{{ $product->id }}">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>c
                            </svg>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-6 space-y-6">
                        <form action="{{ route('products.update', $product->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="name"
                                        class="block mb-2 text-sm font-medium text-gray-900">Nama Produk</label>
                                    <input type="text" name="name" value="{{ old('name', $product->name) }}"
                                        id="name"
                                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5"
                                        placeholder="Enter full name" required>
                                </div>
                                <!-- Kategori -->
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="category_id"
                                        class="block mb-2 text-sm font-medium text-gray-900">Kategori</label>
                                    <select id="category_id" name="category_id"
                                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5"
                                        required>
                                        <option value="">Pilih Kategori</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Supplier -->
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="supplier_id"
                                        class="block mb-2 text-sm font-medium text-gray-900">Supplier</label>
                                    <select id="supplier_id" name="supplier_id"
                                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5"
                                        required>
                                        <option value="">Pilih Supplier</option>
                                        @foreach ($suppliers as $supplier)
                                            <option value="{{ $supplier->id }}"
                                                {{ old('supplier_id', $product->supplier_id) == $supplier->id ? 'selected' : '' }}>
                                                {{ $supplier->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>


                                <!-- SKU -->
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="sku" class="block mb-2 text-sm font-medium text-gray-900">SKU</label>
                                    <input type="text" id="sku" name="sku" value="{{ old('sku', $product->sku) }}"
                                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5"
                                        placeholder="Masukkan SKU" required>
                                </div>


                                <!-- Harga Beli -->
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="purchase_price" class="block mb-2 text-sm font-medium text-gray-900">Harga
                                        Beli</label>
                                    <input type="number" id="purchase_price" name="purchase_price" value="{{ old('purchase_price', $product->purchase_price) }}"
                                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5"
                                        placeholder="Masukkan Harga Beli" required>
                                </div>

                                <!-- Harga Jual -->
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="selling_price" class="block mb-2 text-sm font-medium text-gray-900">Harga
                                        Jual</label>
                                    <input type="number" id="selling_price" name="selling_price" value="{{ old('selling_price', $product->selling_price) }}"
                                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5"
                                        placeholder="Masukkan Harga Jual" required>
                                </div>
                            </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="items-center p-6 border-t border-gray-200 rounded-b">
                        <button
                            class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
                            type="submit">Save all</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach --}}


    <!-- Delete Product Drawer -->
    {{-- <div id="drawer-delete-product-default"
        class="fixed top-0 right-0 z-40 w-full h-screen max-w-xs p-4 overflow-y-auto transition-transform translate-x-full bg-white"
        tabindex="-1" aria-labelledby="drawer-label" aria-hidden="true">
        <h5 id="drawer-label" class="inline-flex items-center text-sm font-semibold text-gray-500 uppercase">Delete item
        </h5>
        <button type="button" data-drawer-dismiss="drawer-delete-product-default"
            aria-controls="drawer-delete-product-default"
            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 right-2.5 inline-flex items-center">
            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                    clip-rule="evenodd"></path>
            </svg>
            <span class="sr-only">Close menu</span>
        </button>
        <svg class="w-10 h-10 mt-8 mb-4 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"
            xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
        </svg>
        <h3 class="mb-6 text-lg text-gray-500">Are you sure you want to delete this product?</h3>
        <a href="#"
            class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-3 py-2.5 text-center mr-2">
            Yes, I'm sure
        </a>
        <a href="#"
            class="text-gray-900 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-primary-300 border border-gray-200 font-medium inline-flex items-center rounded-lg text-sm px-3 py-2.5 text-center"
            data-drawer-hide="drawer-delete-product-default">
            No, cancel
        </a>
    </div> --}}
@endsection
