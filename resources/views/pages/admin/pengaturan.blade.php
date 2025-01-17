@extends('layouts.dashboard')

@section('content')
<div class="container mx-auto p-6">
   

    <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-300 mb-6">Pengaturan</h2>
        <form action="{{ route('pengaturan.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Nama Aplikasi -->
            <div class="mb-4">
                <label for="app_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nama Aplikasi</label>
                <input type="text" id="app_name" name="app_name"
                    class="mt-1 block w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    value="{{ $settings->app_name ?? '' }}" required>
            </div>

            <!-- Logo Aplikasi -->
            <div class="mb-4">
                <label for="app_logo" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Logo Aplikasi</label>
                <div class="mt-1 flex items-center space-x-4">
                    <span class="inline-block h-24 w-24 rounded-full overflow-hidden bg-gray-100 dark:bg-gray-600">
                        <img id="logoPreview" 
                            src="{{ $settings->app_logo ? asset('storage/' . $settings->app_logo) : '' }}"
                            alt="Logo" class="h-full w-full object-cover">
                    </span>
                    <input type="file" id="app_logo" name="app_logo" class="bg-white dark:bg-gray-700 dark:text-gray-300 p-2 border rounded-md w-full sm:w-auto"
                        accept="image/*" onchange="previewLogo(event)">
                </div>
            </div>

            <!-- Button Simpan -->
            <div class="flex justify-end">
                <button type="submit"
                    class="bg-primary-600 dark:bg-primary-700 text-white px-4 py-2 rounded-md shadow hover:bg-indigo-700 dark:hover:bg-indigo-600">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>


    <script>
        function previewLogo(event) {
            const logoPreview = document.getElementById('logoPreview');
            logoPreview.src = URL.createObjectURL(event.target.files[0]);
        }
    </script>
@endsection
