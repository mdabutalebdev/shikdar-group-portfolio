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
                            <!-- Hero Section -->
                            <div class="border-b border-gray-200 pb-6 mb-6">
                                <h3 class="text-lg font-medium leading-6 text-gray-900 dark:text-gray-100 mb-4">Hero Section Settings</h3>
                                
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div>
                                        <x-input-label for="hero_title_1" value="Title Line 1" />
                                        <x-text-input id="hero_title_1" name="hero_title_1" type="text" class="mt-1 block w-full" :value="old('hero_title_1', $setting->hero_title_1)" />
                                    </div>
                                    <div>
                                        <x-input-label for="hero_title_2" value="Title Line 2 (Gold)" />
                                        <x-text-input id="hero_title_2" name="hero_title_2" type="text" class="mt-1 block w-full" :value="old('hero_title_2', $setting->hero_title_2)" />
                                    </div>
                                    <div class="md:col-span-2">
                                        <x-input-label for="hero_subtitle" value="Subtitle" />
                                        <x-text-input id="hero_subtitle" name="hero_subtitle" type="text" class="mt-1 block w-full" :value="old('hero_subtitle', $setting->hero_subtitle)" />
                                    </div>
                                    <div>
                                        <x-input-label for="hero_btn1_text" value="Button 1 Text" />
                                        <x-text-input id="hero_btn1_text" name="hero_btn1_text" type="text" class="mt-1 block w-full" :value="old('hero_btn1_text', $setting->hero_btn1_text)" />
                                    </div>
                                    <div>
                                        <x-input-label for="hero_btn1_url" value="Button 1 URL" />
                                        <x-text-input id="hero_btn1_url" name="hero_btn1_url" type="text" class="mt-1 block w-full" :value="old('hero_btn1_url', $setting->hero_btn1_url)" />
                                    </div>
                                    <div>
                                        <x-input-label for="hero_btn2_text" value="Button 2 Text" />
                                        <x-text-input id="hero_btn2_text" name="hero_btn2_text" type="text" class="mt-1 block w-full" :value="old('hero_btn2_text', $setting->hero_btn2_text)" />
                                    </div>
                                    <div>
                                        <x-input-label for="hero_btn2_url" value="Button 2 URL" />
                                        <x-text-input id="hero_btn2_url" name="hero_btn2_url" type="text" class="mt-1 block w-full" :value="old('hero_btn2_url', $setting->hero_btn2_url)" />
                                    </div>
                                    <div class="md:col-span-2">
                                        <x-input-label for="hero_bg_image_file" value="Hero Background Image" />
                                        <input type="file" id="hero_bg_image_file" name="hero_bg_image_file" class="mt-1 block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
                                        @if($setting->hero_bg_image)
                                            <div class="mt-2">
                                                <img src="{{ asset($setting->hero_bg_image) }}" alt="Hero Background" class="h-20 object-cover rounded">
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
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

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ms-4">
                                {{ __('Save Changes') }}
                            </x-primary-button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
