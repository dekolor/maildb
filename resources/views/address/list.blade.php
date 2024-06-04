<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight flex justify-between">
            {{ __('Email Addresses') }}
            <a href="{{ route('address.add') }}"><x-primary-button>Add manually</x-primary-button></a>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <ul>
                        <li>test@example.com</li>
                        <li>test@example.com</li>
                        <li>test@example.com</li>
                        <li>test@example.com</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
