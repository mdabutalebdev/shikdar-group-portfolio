<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Concern') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="w-full">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    
                    <form action="{{ route('admin.concerns.update', $concern) }}" method="POST" class="space-y-6">
                        @csrf
                        @method('PUT')
                        
                        <div>
                            <x-input-label for="title" value="Title" />
                            <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" :value="old('title', $concern->title)" required />
                        </div>
                        
                        <div>
                            <x-input-label for="description" value="Description" />
                            <textarea id="description" name="description" rows="3" class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" required>{{ old('description', $concern->description) }}</textarea>
                        </div>
                        
                        <div>
                            <x-input-label for="icon_class" value="Icon Class (e.g. fa-shirt)" />
                            <x-text-input id="icon_class" name="icon_class" type="text" class="mt-1 block w-full" :value="old('icon_class', $concern->icon_class)" />
                        </div>
                        
                        <div>
                            <x-input-label for="order_index" value="Order Index" />
                            <x-text-input id="order_index" name="order_index" type="number" class="mt-1 block w-full" :value="old('order_index', $concern->order_index)" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <a href="{{ route('admin.concerns.index') }}" class="text-gray-600 hover:text-gray-900" style="margin-right: 1rem;">Cancel</a>
                            <x-primary-button>
                                {{ __('Update') }}
                            </x-primary-button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
