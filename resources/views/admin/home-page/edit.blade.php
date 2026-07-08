<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Home Page Settings') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="w-full">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    
                    @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif

                    <form action="{{ route('admin.home-page-settings.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                        @csrf

                        <!-- Section Logic -->
                        @php
                            $section = request('section', 'hero');
                        @endphp
                        
                        <input type="hidden" name="section" value="{{ $section }}">

                        @if($section === 'hero')
                            <!-- Hero Section (Banners CRUD) -->
                            <div class="mb-6">
                                <div class="flex justify-between items-center mb-6">
                                    <h3 class="text-xl font-bold text-gray-900 dark:text-gray-100">Manage Banners</h3>
                                    <a href="{{ route('admin.banners.create') }}" style="background-color: #4f46e5; color: #ffffff;" class="px-4 py-2 border border-transparent rounded-md font-semibold text-xs uppercase tracking-widest hover:opacity-90 transition">Create Banner</a>
                                </div>

                                <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg shadow-sm overflow-hidden">
                                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                        <thead class="bg-gray-50 dark:bg-gray-700">
                                            <tr>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Image</th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Title</th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Order</th>
                                                <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                                            @forelse(isset($banners) ? $banners : [] as $banner)
                                                <tr>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <img src="{{ $banner->image_path ? asset($banner->image_path) : asset('images/hero_banner.png') }}" class="h-12 w-20 object-cover rounded shadow-sm">
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100 font-medium">
                                                        {{ $banner->title_1 ?? 'No Title' }}
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                                        {{ $banner->order }}
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                        <a href="{{ route('admin.banners.edit', $banner->id) }}" class="text-indigo-600 hover:text-indigo-900 dark:text-indigo-400 dark:hover:text-indigo-300 mr-3">Edit</a>
                                                        <button type="button" onclick="if(confirm('Are you sure you want to delete this banner?')) { document.getElementById('delete-banner-{{ $banner->id }}').submit(); }" class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-300">Delete</button>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="4" class="px-6 py-8 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400 text-center">
                                                        No active banners found.
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            @if(isset($banners) && count($banners) > 0)
                                @foreach($banners as $banner)
                                    <form id="delete-banner-{{ $banner->id }}" action="{{ route('admin.banners.destroy', $banner->id) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                @endforeach
                            @endif
                        @elseif($section === 'about')

                        <!-- About Section -->
                        <div class="border-b border-gray-200 pb-6 mt-6">
                            <h3 class="text-lg font-medium leading-6 text-gray-900 dark:text-gray-100 mb-4">About Section</h3>
                            <div class="grid grid-cols-1 gap-6">
                                <div>
                                    <x-input-label for="about_subtitle" value="Subtitle (e.g. Who We Are)" />
                                    <x-text-input id="about_subtitle" name="about_subtitle" type="text" class="mt-1 block w-full" :value="old('about_subtitle', $setting->about_subtitle)" />
                                </div>
                                <div>
                                    <x-input-label for="about_title" value="Main Title" />
                                    <x-text-input id="about_title" name="about_title" type="text" class="mt-1 block w-full" :value="old('about_title', $setting->about_title)" />
                                </div>
                                <div>
                                    <x-input-label for="about_desc_1" value="Description Paragraph 1" />
                                    <textarea id="about_desc_1" name="about_desc_1" rows="3" class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">{{ old('about_desc_1', $setting->about_desc_1) }}</textarea>
                                </div>
                                <div>
                                    <x-input-label for="about_desc_2" value="Description Paragraph 2" />
                                    <textarea id="about_desc_2" name="about_desc_2" rows="3" class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">{{ old('about_desc_2', $setting->about_desc_2) }}</textarea>
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div>
                                        <x-input-label for="about_btn_text" value="Button Text" />
                                        <x-text-input id="about_btn_text" name="about_btn_text" type="text" class="mt-1 block w-full" :value="old('about_btn_text', $setting->about_btn_text)" />
                                    </div>
                                    <div>
                                        <x-input-label for="about_btn_url" value="Button URL" />
                                        <x-text-input id="about_btn_url" name="about_btn_url" type="text" class="mt-1 block w-full" :value="old('about_btn_url', $setting->about_btn_url)" />
                                    </div>
                                </div>
                                <div>
                                    <x-input-label for="about_years_experience" value="Years Experience" />
                                    <x-text-input id="about_years_experience" name="about_years_experience" type="text" class="mt-1 block w-full" :value="old('about_years_experience', $setting->about_years_experience)" />
                                </div>
                            </div>
                        </div>

                        @elseif($section === 'counter')
                        <!-- Metrics Section -->
                        <div class="border-b border-gray-200 pb-6 mb-6">
                            <h3 class="text-lg font-medium leading-6 text-gray-900 dark:text-gray-100 mb-4">Counter (Metrics) Section</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <x-input-label for="metric_1_number" value="Metric 1 Number" />
                                    <x-text-input id="metric_1_number" name="metric_1_number" type="text" class="mt-1 block w-full" :value="old('metric_1_number', $setting->metric_1_number)" />
                                    <x-input-label for="metric_1_text" value="Metric 1 Text" class="mt-2" />
                                    <x-text-input id="metric_1_text" name="metric_1_text" type="text" class="mt-1 block w-full" :value="old('metric_1_text', $setting->metric_1_text)" />
                                </div>
                                <div>
                                    <x-input-label for="metric_2_number" value="Metric 2 Number" />
                                    <x-text-input id="metric_2_number" name="metric_2_number" type="text" class="mt-1 block w-full" :value="old('metric_2_number', $setting->metric_2_number)" />
                                    <x-input-label for="metric_2_text" value="Metric 2 Text" class="mt-2" />
                                    <x-text-input id="metric_2_text" name="metric_2_text" type="text" class="mt-1 block w-full" :value="old('metric_2_text', $setting->metric_2_text)" />
                                </div>
                                <div>
                                    <x-input-label for="metric_3_number" value="Metric 3 Number" />
                                    <x-text-input id="metric_3_number" name="metric_3_number" type="text" class="mt-1 block w-full" :value="old('metric_3_number', $setting->metric_3_number)" />
                                    <x-input-label for="metric_3_text" value="Metric 3 Text" class="mt-2" />
                                    <x-text-input id="metric_3_text" name="metric_3_text" type="text" class="mt-1 block w-full" :value="old('metric_3_text', $setting->metric_3_text)" />
                                </div>
                                <div>
                                    <x-input-label for="metric_4_number" value="Metric 4 Number" />
                                    <x-text-input id="metric_4_number" name="metric_4_number" type="text" class="mt-1 block w-full" :value="old('metric_4_number', $setting->metric_4_number)" />
                                    <x-input-label for="metric_4_text" value="Metric 4 Text" class="mt-2" />
                                    <x-text-input id="metric_4_text" name="metric_4_text" type="text" class="mt-1 block w-full" :value="old('metric_4_text', $setting->metric_4_text)" />
                                </div>
                            </div>
                        </div>
                        @elseif($section === 'footer')
                        <!-- Footer Section -->
                        <div class="border-b border-gray-200 pb-6 mb-6">
                            <h3 class="text-lg font-medium leading-6 text-gray-900 dark:text-gray-100 mb-4">Footer Social Links</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                                
                                <!-- Facebook -->
                                <div class="bg-gray-50 dark:bg-gray-700/50 p-4 rounded-lg border border-gray-200 dark:border-gray-600">
                                    <div class="flex items-center justify-between mb-2">
                                        <x-input-label for="facebook_url" value="Facebook URL" class="text-base font-bold" />
                                        <label class="inline-flex items-center cursor-pointer">
                                            <input type="hidden" name="facebook_active" value="0">
                                            <input type="checkbox" name="facebook_active" value="1" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" {{ old('facebook_active', $setting->facebook_active ?? 1) ? 'checked' : '' }}>
                                            <span class="ms-2 text-sm font-bold text-gray-900 dark:text-gray-300">Active</span>
                                        </label>
                                    </div>
                                    <x-text-input id="facebook_url" name="facebook_url" type="url" class="mt-1 block w-full" :value="old('facebook_url', $setting->facebook_url)" placeholder="https://facebook.com/..." />
                                </div>

                                <!-- Instagram -->
                                <div class="bg-gray-50 dark:bg-gray-700/50 p-4 rounded-lg border border-gray-200 dark:border-gray-600">
                                    <div class="flex items-center justify-between mb-2">
                                        <x-input-label for="instagram_url" value="Instagram URL" class="text-base font-bold" />
                                        <label class="inline-flex items-center cursor-pointer">
                                            <input type="hidden" name="instagram_active" value="0">
                                            <input type="checkbox" name="instagram_active" value="1" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" {{ old('instagram_active', $setting->instagram_active ?? 1) ? 'checked' : '' }}>
                                            <span class="ms-2 text-sm font-bold text-gray-900 dark:text-gray-300">Active</span>
                                        </label>
                                    </div>
                                    <x-text-input id="instagram_url" name="instagram_url" type="url" class="mt-1 block w-full" :value="old('instagram_url', $setting->instagram_url)" placeholder="https://instagram.com/..." />
                                </div>

                                <!-- WhatsApp -->
                                <div class="bg-gray-50 dark:bg-gray-700/50 p-4 rounded-lg border border-gray-200 dark:border-gray-600">
                                    <div class="flex items-center justify-between mb-2">
                                        <x-input-label for="whatsapp_url" value="WhatsApp URL" class="text-base font-bold" />
                                        <label class="inline-flex items-center cursor-pointer">
                                            <input type="hidden" name="whatsapp_active" value="0">
                                            <input type="checkbox" name="whatsapp_active" value="1" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" {{ old('whatsapp_active', $setting->whatsapp_active ?? 1) ? 'checked' : '' }}>
                                            <span class="ms-2 text-sm font-bold text-gray-900 dark:text-gray-300">Active</span>
                                        </label>
                                    </div>
                                    <x-text-input id="whatsapp_url" name="whatsapp_url" type="url" class="mt-1 block w-full" :value="old('whatsapp_url', $setting->whatsapp_url)" placeholder="https://wa.me/..." />
                                </div>

                                <!-- LinkedIn -->
                                <div class="bg-gray-50 dark:bg-gray-700/50 p-4 rounded-lg border border-gray-200 dark:border-gray-600">
                                    <div class="flex items-center justify-between mb-2">
                                        <x-input-label for="linkedin_url" value="LinkedIn URL" class="text-base font-bold" />
                                        <label class="inline-flex items-center cursor-pointer">
                                            <input type="hidden" name="linkedin_active" value="0">
                                            <input type="checkbox" name="linkedin_active" value="1" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" {{ old('linkedin_active', $setting->linkedin_active ?? 1) ? 'checked' : '' }}>
                                            <span class="ms-2 text-sm font-bold text-gray-900 dark:text-gray-300">Active</span>
                                        </label>
                                    </div>
                                    <x-text-input id="linkedin_url" name="linkedin_url" type="url" class="mt-1 block w-full" :value="old('linkedin_url', $setting->linkedin_url)" placeholder="https://linkedin.com/..." />
                                </div>

                                <!-- X (Twitter) -->
                                <div class="bg-gray-50 dark:bg-gray-700/50 p-4 rounded-lg border border-gray-200 dark:border-gray-600">
                                    <div class="flex items-center justify-between mb-2">
                                        <x-input-label for="twitter_url" value="X (Twitter) URL" class="text-base font-bold" />
                                        <label class="inline-flex items-center cursor-pointer">
                                            <input type="hidden" name="twitter_active" value="0">
                                            <input type="checkbox" name="twitter_active" value="1" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" {{ old('twitter_active', $setting->twitter_active ?? 1) ? 'checked' : '' }}>
                                            <span class="ms-2 text-sm font-bold text-gray-900 dark:text-gray-300">Active</span>
                                        </label>
                                    </div>
                                    <x-text-input id="twitter_url" name="twitter_url" type="url" class="mt-1 block w-full" :value="old('twitter_url', $setting->twitter_url)" placeholder="https://x.com/..." />
                                </div>

                            </div>
                        </div>
                        @endif

                        @if($section !== 'hero')
                            <div class="flex items-center justify-end mt-4">
                                <x-primary-button class="ms-4">
                                    {{ __('Save Changes') }}
                                </x-primary-button>
                            </div>
                        @endif
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
