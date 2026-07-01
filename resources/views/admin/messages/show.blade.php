<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('View Message') }}
            </h2>
            <a href="{{ route('admin.messages.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                Back to List
            </a>
        </div>
    </x-slot>

    <div class="py-4">
        <div class="w-full">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    
                    <div class="mb-6 border-b border-gray-200 dark:border-gray-700 pb-6">
                        <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">Contact Details</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Name</p>
                                <p class="font-semibold">{{ $message->first_name }} {{ $message->last_name }}</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Email</p>
                                <p class="font-semibold"><a href="mailto:{{ $message->email }}" class="text-indigo-600 hover:text-indigo-900 dark:text-indigo-400">{{ $message->email }}</a></p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Received At</p>
                                <p class="font-semibold">{{ $message->created_at->format('F d, Y h:i A') }}</p>
                            </div>
                        </div>
                    </div>

                    <div>
                        <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-2">Message</h3>
                        @if($message->subject)
                            <p class="font-bold mb-4 border-b border-gray-200 dark:border-gray-700 pb-2">Subject: {{ $message->subject }}</p>
                        @endif
                        
                        <div class="bg-gray-50 dark:bg-gray-900 p-4 rounded-md whitespace-pre-wrap">{{ $message->message }}</div>
                    </div>
                    
                    <div class="mt-8 pt-6 border-t border-gray-200 dark:border-gray-700 flex justify-end">
                        <form action="{{ route('admin.messages.destroy', $message) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this message?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                Delete Message
                            </button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
