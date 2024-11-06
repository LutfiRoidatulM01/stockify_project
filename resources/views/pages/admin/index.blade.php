@extends('layouts.dashboard')

@section('content')
    <div class="grid w-full grid-cols-1 gap-4 mt-4 xl:grid-cols-2 2xl:grid-cols-3">
        <div class="items-center justify-between p-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:flex sm:p-6">
            <div class="w-full">
                <h3 class="text-base font-normal text-gray-500">New products</h3>
                <span class="text-2xl font-bold leading-none text-gray-900 sm:text-3xl">2,340</span>
                <p class="flex items-center text-base font-normal text-gray-500">
                    <span class="flex items-center mr-1.5 text-sm text-green-500">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"
                            aria-hidden="true">
                            <path clip-rule="evenodd" fill-rule="evenodd"
                                d="M10 17a.75.75 0 01-.75-.75V5.612L5.29 9.77a.75.75 0 01-1.08-1.04l5.25-5.5a.75.75 0 011.08 0l5.25 5.5a.75.75 0 11-1.08 1.04l-3.96-4.158V16.25A.75.75 0 0110 17z">
                            </path>
                        </svg>
                        12.5%
                    </span>
                    Since last month
                </p>
            </div>
            <div class="w-full" id="new-products-chart"></div>
        </div>
        <div class="items-center justify-between p-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:flex sm:p-6">
            <div class="w-full">
                <h3 class="text-base font-normal text-gray-500">Users</h3>
                <span class="text-2xl font-bold leading-none text-gray-900 sm:text-3xl">2,340</span>
                <p class="flex items-center text-base font-normal text-gray-500">
                    <span class="flex items-center mr-1.5 text-sm text-green-500">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"
                            aria-hidden="true">
                            <path clip-rule="evenodd" fill-rule="evenodd"
                                d="M10 17a.75.75 0 01-.75-.75V5.612L5.29 9.77a.75.75 0 01-1.08-1.04l5.25-5.5a.75.75 0 011.08 0l5.25 5.5a.75.75 0 11-1.08 1.04l-3.96-4.158V16.25A.75.75 0 0110 17z">
                            </path>
                        </svg>
                        3,4%
                    </span>
                    Since last month
                </p>
            </div>
            <div class="w-full" id="week-signups-chart"></div>
        </div>
        <div class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:p-6">
            <div class="w-full">
                <h3 class="mb-2 text-base font-normal text-gray-500">Audience by age</h3>
                <div class="flex items-center mb-2">
                    <div class="w-16 text-sm font-medium">50+</div>
                    <div class="w-full bg-gray-200 rounded-full h-2.5">
                        <div class="bg-primary-600 h-2.5 rounded-full" style="width: 18%"></div>
                    </div>
                </div>
                <div class="flex items-center mb-2">
                    <div class="w-16 text-sm font-medium">40+</div>
                    <div class="w-full bg-gray-200 rounded-full h-2.5">
                        <div class="bg-primary-600 h-2.5 rounded-full" style="width: 15%"></div>
                    </div>
                </div>
                <div class="flex items-center mb-2">
                    <div class="w-16 text-sm font-medium">30+</div>
                    <div class="w-full bg-gray-200 rounded-full h-2.5">
                        <div class="bg-primary-600 h-2.5 rounded-full" style="width: 60%"></div>
                    </div>
                </div>
                <div class="flex items-center mb-2">
                    <div class="w-16 text-sm font-medium">20+</div>
                    <div class="w-full bg-gray-200 rounded-full h-2.5">
                        <div class="bg-primary-600 h-2.5 rounded-full" style="width: 30%"></div>
                    </div>
                </div>
            </div>
            <div id="traffic-channels-chart" class="w-full"></div>
        </div>
    </div>
@endsection
