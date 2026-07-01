@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <section id="home" class="relative pt-20 pb-32 lg:pt-32 lg:pb-40 overflow-hidden min-h-[90vh] flex items-center bg-darkgreen-900" style="background-image: url('{{ $setting->hero_bg_image ? asset($setting->hero_bg_image) : asset('images/hero_banner.png') }}'); background-size: cover; background-position: center; background-attachment: fixed;">
        <!-- Dark Overlay -->
        <div class="absolute inset-0 bg-darkgreen-900/90"></div>
        
        <!-- Decorative Elements -->
        <div class="absolute top-0 left-0 w-full h-full opacity-30 bg-[radial-gradient(circle_at_top_right,_var(--tw-gradient-stops))] from-gold-500 via-transparent to-transparent"></div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 w-full text-center">
            <div data-aos="fade-down" data-aos-delay="100" class="inline-flex items-center gap-2 px-4 py-2 rounded-full border border-gold-500/50 bg-black/30 backdrop-blur-md mb-8">
                <i class="fa-solid fa-leaf text-gold-500 text-sm"></i>
                <span class="text-gold-400 text-xs font-semibold tracking-widest uppercase">Excellence in every thread</span>
                <i class="fa-solid fa-leaf text-gold-500 text-sm"></i>
            </div>
            
            <h1 data-aos="zoom-in" data-aos-delay="300" class="text-4xl md:text-6xl lg:text-7xl font-serif font-extrabold tracking-tight mb-6 text-white drop-shadow-lg">
                <span class="block">{{ $setting->hero_title_1 ?? 'SIKDER GROUP OF' }}</span>
                <span class="block gold-gradient-text mt-2">{{ $setting->hero_title_2 ?? 'COMPANIES LTD.' }}</span>
            </h1>
            
            <p data-aos="fade-up" data-aos-delay="500" class="mt-6 max-w-2xl mx-auto text-lg md:text-xl text-gray-200 tracking-wide font-light border-y border-gold-500/30 py-4">
                {{ $setting->hero_subtitle ?? 'BUILDING VALUES, CREATING FUTURES' }}
            </p>
            
            <div data-aos="fade-up" data-aos-delay="700" class="mt-8 md:mt-12 flex flex-col sm:flex-row justify-center gap-4">
                <a href="{{ url($setting->hero_btn1_url ?? '/concerns') }}" class="gold-gradient-bg text-darkgreen-900 font-bold px-6 py-3 md:px-8 md:py-4 text-sm md:text-base rounded-md shadow-lg hover:shadow-gold-500/30 transition-all hover:-translate-y-1">
                    {{ $setting->hero_btn1_text ?? 'Explore Our Concerns' }}
                </a>
                <a href="{{ url($setting->hero_btn2_url ?? '/contact') }}" class="bg-transparent border border-gold-500 text-gold-400 font-bold px-6 py-3 md:px-8 md:py-4 text-sm md:text-base rounded-md shadow-lg hover:bg-gold-500/10 transition-all hover:-translate-y-1 backdrop-blur-sm">
                    {{ $setting->hero_btn2_text ?? 'Contact Us' }}
                </a>
            </div>
        </div>
    </section>

    <!-- Brief About Us Section -->
    <section class="py-24 bg-white relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <div data-aos="fade-right">
                    <span class="text-gold-600 font-semibold tracking-widest uppercase text-sm mb-2 block">{{ $setting->about_subtitle ?? 'Who We Are' }}</span>
                    <h2 class="text-3xl md:text-5xl font-serif font-bold text-darkgreen-800 mb-6">
                        {{ $setting->about_title ?? 'Pioneering the Future of Textile Manufacturing' }}
                    </h2>
                    <p class="text-gray-600 leading-relaxed text-lg mb-6">
                        {{ $setting->about_desc_1 ?? 'Sikder Group of Companies Ltd. is a leading conglomerate renowned for its uncompromising commitment to quality and sustainable growth in the heart of Bangladesh\'s booming garments sector.' }}
                    </p>
                    <p class="text-gray-600 leading-relaxed text-lg mb-8">
                        {{ $setting->about_desc_2 ?? 'Guided by ethical business practices and technological advancement, we have established state-of-the-art facilities that meet global standards across all our sister concerns.' }}
                    </p>
                    <a href="{{ url($setting->about_btn_url ?? '/about') }}" class="inline-flex items-center gap-2 text-darkgreen-800 font-bold hover:text-gold-600 transition-colors group border-b-2 border-transparent hover:border-gold-500 pb-1">
                        {{ $setting->about_btn_text ?? 'Read Our Full Story' }} <i class="fa-solid fa-arrow-right transform group-hover:translate-x-1 transition-transform"></i>
                    </a>
                </div>
                
                <div class="relative" data-aos="fade-left">
                    <div class="grid grid-cols-2 gap-4">
                        <div class="bg-gray-100 rounded-2xl h-64 overflow-hidden mt-8 shadow-lg">
                            <div class="w-full h-full bg-darkgreen-800/10 flex items-center justify-center">
                                <i class="fa-solid fa-shirt text-6xl text-darkgreen-800/20"></i>
                            </div>
                        </div>
                        <div class="bg-gray-100 rounded-2xl h-64 overflow-hidden shadow-lg relative">
                             <div class="w-full h-full bg-gold-500/10 flex items-center justify-center">
                                <i class="fa-solid fa-industry text-6xl text-gold-500/30"></i>
                            </div>
                        </div>
                    </div>
                    <!-- Experience Badge -->
                    <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-white p-6 rounded-full shadow-2xl border-4 border-gold-500 flex flex-col items-center justify-center w-36 h-36">
                        <span class="text-3xl font-bold text-darkgreen-800">{{ $setting->about_years_experience ?? '20+' }}</span>
                        <span class="text-xs font-semibold text-gray-500 uppercase tracking-wider text-center mt-1">Years<br>Experience</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Key Metrics Banner -->
    <section class="py-20 relative bg-darkgreen-900 border-y border-gold-500/30">
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
                <div data-aos="zoom-in" data-aos-delay="100">
                    <div class="text-5xl font-bold gold-gradient-text mb-3">{{ $setting->metric_1_number ?? '5+' }}</div>
                    <div class="text-gray-300 font-medium uppercase tracking-widest text-sm">{{ $setting->metric_1_text ?? 'Sister Concerns' }}</div>
                </div>
                <div data-aos="zoom-in" data-aos-delay="200">
                    <div class="text-5xl font-bold gold-gradient-text mb-3">{{ $setting->metric_2_number ?? '100%' }}</div>
                    <div class="text-gray-300 font-medium uppercase tracking-widest text-sm">{{ $setting->metric_2_text ?? 'Export Oriented' }}</div>
                </div>
                <div data-aos="zoom-in" data-aos-delay="300">
                    <div class="text-5xl font-bold gold-gradient-text mb-3">{{ $setting->metric_3_number ?? '24/7' }}</div>
                    <div class="text-gray-300 font-medium uppercase tracking-widest text-sm">{{ $setting->metric_3_text ?? 'Production' }}</div>
                </div>
                <div data-aos="zoom-in" data-aos-delay="400">
                    <div class="text-5xl font-bold gold-gradient-text mb-3">{{ $setting->metric_4_number ?? '50+' }}</div>
                    <div class="text-gray-300 font-medium uppercase tracking-widest text-sm">{{ $setting->metric_4_text ?? 'Global Clients' }}</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Core Capabilities -->
    <section class="py-24 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16" data-aos="fade-down">
                <span class="text-gold-600 font-semibold tracking-widest uppercase text-sm mb-2 block">What We Do</span>
                <h2 class="text-3xl md:text-4xl font-serif font-bold text-darkgreen-800">
                    Our Core Capabilities
                </h2>
                <div class="mt-4 w-16 h-1 bg-gold-500 mx-auto rounded-full"></div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @forelse($concerns as $index => $concern)
                    <div class="bg-white p-8 rounded-2xl shadow-sm hover:shadow-xl transition-all border border-gray-100 group" data-aos="fade-up" data-aos-delay="{{ ($index + 1) * 100 }}">
                        <div class="w-14 h-14 rounded-lg bg-darkgreen-800/5 group-hover:bg-gold-500/20 flex items-center justify-center mb-6 transition-colors">
                            <i class="fa-solid {{ $concern->icon_class ?? 'fa-circle' }} text-2xl text-darkgreen-800 group-hover:text-gold-600 transition-colors"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">{{ $concern->title }}</h3>
                        <p class="text-gray-500 text-sm">{{ $concern->description }}</p>
                    </div>
                @empty
                    <!-- Fallback Service 1 -->
                    <div class="bg-white p-8 rounded-2xl shadow-sm hover:shadow-xl transition-all border border-gray-100 group" data-aos="fade-up" data-aos-delay="100">
                        <div class="w-14 h-14 rounded-lg bg-darkgreen-800/5 group-hover:bg-gold-500/20 flex items-center justify-center mb-6 transition-colors">
                            <i class="fa-solid fa-shirt text-2xl text-darkgreen-800 group-hover:text-gold-600 transition-colors"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Apparel Manufacturing</h3>
                        <p class="text-gray-500 text-sm">High-volume, export-quality garments production tailored to global brands.</p>
                    </div>
                    
                    <!-- Fallback Service 2 -->
                    <div class="bg-white p-8 rounded-2xl shadow-sm hover:shadow-xl transition-all border border-gray-100 group" data-aos="fade-up" data-aos-delay="200">
                        <div class="w-14 h-14 rounded-lg bg-darkgreen-800/5 group-hover:bg-gold-500/20 flex items-center justify-center mb-6 transition-colors">
                            <i class="fa-solid fa-droplet text-2xl text-darkgreen-800 group-hover:text-gold-600 transition-colors"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Dyeing & Knitting</h3>
                        <p class="text-gray-500 text-sm">State-of-the-art facility ensuring vibrant color perfection and durable fabric.</p>
                    </div>
                    
                    <!-- Fallback Service 3 -->
                    <div class="bg-white p-8 rounded-2xl shadow-sm hover:shadow-xl transition-all border border-gray-100 group" data-aos="fade-up" data-aos-delay="300">
                        <div class="w-14 h-14 rounded-lg bg-darkgreen-800/5 group-hover:bg-gold-500/20 flex items-center justify-center mb-6 transition-colors">
                            <i class="fa-solid fa-tags text-2xl text-darkgreen-800 group-hover:text-gold-600 transition-colors"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Computerized Labels</h3>
                        <p class="text-gray-500 text-sm">Precision branding solutions with advanced computerized labeling technology.</p>
                    </div>
                    
                    <!-- Fallback Service 4 -->
                    <div class="bg-white p-8 rounded-2xl shadow-sm hover:shadow-xl transition-all border border-gray-100 group" data-aos="fade-up" data-aos-delay="400">
                        <div class="w-14 h-14 rounded-lg bg-darkgreen-800/5 group-hover:bg-gold-500/20 flex items-center justify-center mb-6 transition-colors">
                            <i class="fa-solid fa-umbrella-beach text-2xl text-darkgreen-800 group-hover:text-gold-600 transition-colors"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Premium Hospitality</h3>
                        <p class="text-gray-500 text-sm">Exclusive retreat experiences offering world-class recreation and serenity.</p>
                    </div>
                @endforelse
            </div>
            
            <div class="text-center mt-12" data-aos="fade-up" data-aos-delay="500">
                 <a href="{{ url('/concerns') }}" class="inline-flex items-center justify-center px-8 py-3 border border-darkgreen-800 text-base font-medium rounded-md text-darkgreen-800 bg-transparent hover:bg-darkgreen-800 hover:text-white transition-all">
                    View All Concerns
                </a>
            </div>
        </div>
    </section>
@endsection
