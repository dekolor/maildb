<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight flex justify-between">
            {{ __('Newsletters') }}
            <div>
                <a href="{{ route('campaign.add') }}">
                    <x-primary-button>Email Templates</x-primary-button>
                </a>
                <a href="{{ route('campaign.add') }}">
                    <x-primary-button>Add newsletter</x-primary-button>
                </a>
            </div>
        </h2>
    </x-slot>

    <div class="pt-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if(session('status'))
                        <div
                            class="p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400"
                            role="alert">
                            <span class="font-medium">{{ session('status') }}</span>
                        </div>
                    @endif
                    <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg">
                        <div
                            class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead
                                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-4 py-3">Name</th>
                                    <th scope="col" class="px-4 py-3">Destination</th>
                                    <th scope="col" class="px-4 py-3">Added</th>
                                    <th scope="col" class="px-4 py-3">Last sent</th>
                                    <th scope="col" class="px-4 py-3">
                                        <span class="sr-only">Actions</span>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($campaignList as $campaign)
                                    <tr class="border-b dark:border-gray-700">
                                        <td class="px-4 py-3">{{ $campaign->name }}</td>
                                        <td class="px-4 py-3"><span
                                                class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">{{ ucFirst($campaign->category->name) }}</span>
                                        </td>
                                        <td class="px-4 py-3">{{ $campaign->created_at }}</td>
                                        <td class="px-4 py-3">{{ $campaign->sentCampaigns[count($campaign->sentCampaigns) - 1]->created_at }}</td>
                                        <td class="px-4 py-3 flex items-center justify-end">
                                            <button id="dropdown-{{ $campaign->id }}-button"
                                                    data-dropdown-toggle="dropdown-{{ $campaign->id }}"
                                                    class="inline-flex items-center p-0.5 text-sm font-medium text-center text-gray-500 hover:text-gray-800 rounded-lg focus:outline-none dark:text-gray-400 dark:hover:text-gray-100"
                                                    type="button">
                                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                     viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z"/>
                                                </svg>
                                            </button>
                                            <div id="dropdown-{{ $campaign->id }}"
                                                 class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                                <div class="py-1">
                                                    <a href="{{ route('campaign.send', $campaign->id) }}"
                                                       class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Send</a>
                                                </div>
                                                <div class="py-1">
                                                    <form action="{{ route('campaign.destroy', $campaign->id) }}" method="POST">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button
                                                            class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                                            Delete
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <nav class="space-y-3 md:space-y-0 p-4" aria-label="Table navigation">
                            {{ $campaignList->links() }}
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
