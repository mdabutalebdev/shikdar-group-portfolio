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
                    
                    <form action="{{ route('admin.concerns.update', $concern) }}" method="POST" class="space-y-6" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div>
                            <x-input-label for="title" value="Title" />
                            <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" :value="old('title', $concern->title)" required />
                        </div>
                        
                        <div>
                            <x-input-label for="description" value="Short Description (For Card)" />
                            <textarea id="description" name="description" rows="3" class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" required>{{ old('description', $concern->description) }}</textarea>
                        </div>
                        
                        <div>
                            <x-input-label for="details" value="Detailed Description (For Details Page - Paragraphs)" />
                            <textarea id="details" name="details" rows="6" class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">{{ old('details', $concern->details) }}</textarea>
                        </div>
                        
                        <div>
                            <x-input-label for="images" value="Add Images (Multiple)" />
                            <input type="file" id="images" name="images[]" multiple accept="image/*" class="mt-1 block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
                        </div>

                        @if($concern->images && count($concern->images) > 0)
                            <div>
                                <x-input-label value="Existing Images (Select to remove)" />
                                <div class="flex flex-wrap gap-4 mt-2">
                                    @foreach($concern->images as $index => $image)
                                        <div class="relative group border p-2 rounded-md">
                                            <img src="{{ Storage::url($image) }}" alt="Image" class="h-24 w-auto object-cover">
                                            <div class="mt-2 text-center">
                                                <label class="inline-flex items-center text-sm text-red-600">
                                                    <input type="checkbox" name="remove_images[]" value="{{ $index }}" class="rounded border-gray-300 text-red-600 shadow-sm focus:ring-red-500">
                                                    <span class="ml-2">Remove</span>
                                                </label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                        
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
