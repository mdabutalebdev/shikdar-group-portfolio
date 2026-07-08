<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Banner') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    
                    @if ($errors->any())
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>- {{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('admin.banners.update', $banner->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                        @csrf
                        @method('PUT')
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <x-input-label for="title_1" value="Title Line 1" />
                                <x-text-input id="title_1" name="title_1" type="text" class="mt-1 block w-full" :value="old('title_1', $banner->title_1)" />
                            </div>
                            <div>
                                <x-input-label for="title_2" value="Title Line 2 (Gold Text)" />
                                <x-text-input id="title_2" name="title_2" type="text" class="mt-1 block w-full" :value="old('title_2', $banner->title_2)" />
                            </div>
                            
                            <div class="md:col-span-2">
                                <x-input-label for="subtitle" value="Subtitle" />
                                <x-text-input id="subtitle" name="subtitle" type="text" class="mt-1 block w-full" :value="old('subtitle', $banner->subtitle)" />
                            </div>

                            <div>
                                <x-input-label for="btn1_text" value="Button 1 Text" />
                                <x-text-input id="btn1_text" name="btn1_text" type="text" class="mt-1 block w-full" :value="old('btn1_text', $banner->btn1_text)" />
                            </div>
                            <div>
                                <x-input-label for="btn1_url" value="Button 1 URL" />
                                <x-text-input id="btn1_url" name="btn1_url" type="text" class="mt-1 block w-full" :value="old('btn1_url', $banner->btn1_url)" />
                            </div>

                            <div>
                                <x-input-label for="btn2_text" value="Button 2 Text" />
                                <x-text-input id="btn2_text" name="btn2_text" type="text" class="mt-1 block w-full" :value="old('btn2_text', $banner->btn2_text)" />
                            </div>
                            <div>
                                <x-input-label for="btn2_url" value="Button 2 URL" />
                                <x-text-input id="btn2_url" name="btn2_url" type="text" class="mt-1 block w-full" :value="old('btn2_url', $banner->btn2_url)" />
                            </div>

                            <div class="md:col-span-2">
                                <x-input-label for="image" value="Banner Background Image (Leave blank to keep current)" />
                                <input type="file" id="image" name="image" accept="image/jpeg, image/png, image/gif, image/webp" class="mt-1 block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
                                @if($banner->image_path)
                                    <div class="mt-2">
                                        <p class="text-sm text-gray-500 mb-1">Current Image:</p>
                                        <img src="{{ asset($banner->image_path) }}" alt="Current Banner" class="h-32 object-cover rounded shadow">
                                    </div>
                                @endif
                            </div>

                            <div>
                                <x-input-label for="order" value="Display Order" />
                                <x-text-input id="order" name="order" type="number" class="mt-1 block w-full" :value="old('order', $banner->order)" />
                                <p class="text-xs text-gray-500 mt-1">Lower numbers appear first.</p>
                            </div>

                            <div class="flex items-center pt-6">
                                <input type="checkbox" id="is_active" name="is_active" value="1" {{ old('is_active', $banner->is_active) ? 'checked' : '' }} class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800">
                                <x-input-label for="is_active" value="Active (Display on website)" class="ml-2" />
                            </div>
                        </div>

                        <div class="flex items-center justify-end mt-4 gap-4">
                            <a href="{{ route('admin.banners.index') }}" class="text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100">Cancel</a>
                            <x-primary-button>
                                {{ __('Update Banner') }}
                            </x-primary-button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
