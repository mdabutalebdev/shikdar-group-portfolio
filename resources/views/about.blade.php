@extends('layouts.app')

@section('content')
    <!-- Page Header -->
    <section class="relative pt-32 pb-20 bg-darkgreen-900 border-b-2 border-gold-500 overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-serif font-bold text-white mb-4" data-aos="fade-down">About Sikder Group</h1>
            <div class="w-24 h-1 bg-gold-500 mx-auto rounded-full" data-aos="fade-up" data-aos-delay="200"></div>
            <p class="mt-6 text-gray-300 max-w-2xl mx-auto text-lg" data-aos="fade-up" data-aos-delay="300">
                Building Values, Creating Futures since our inception. Discover the story, mission, and people behind our success.
            </p>
        </div>
    </section>

    <!-- 1. The Story / Intro Section (with Industry Image) -->
    <section class="py-24 bg-white relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <!-- Left Side: Image -->
                <div class="relative group h-full" data-aos="fade-right">
                    <div class="aspect-[4/5] lg:aspect-auto lg:h-[600px] rounded-2xl overflow-hidden relative shadow-2xl border border-gray-100">
                        <img src="{{ asset('images/about_industry.png') }}" alt="Garments Manufacturing" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-700">
                        <div class="absolute inset-0 bg-darkgreen-900/10 group-hover:bg-transparent transition-colors duration-700"></div>
                    </div>
                    <!-- Accent box -->
                    <div class="absolute -bottom-6 -left-6 w-3/4 h-3/4 bg-gold-500/10 rounded-2xl -z-10 group-hover:bg-gold-500/20 transition-all duration-700"></div>
                </div>
                
                <!-- Right Side: Content -->
                <div class="space-y-8" data-aos="fade-left" data-aos-delay="200">
                    <div>
                        <span class="text-gold-600 font-semibold tracking-widest uppercase text-sm mb-2 block">Our Legacy</span>
                        <h2 class="text-3xl md:text-4xl font-serif font-bold text-darkgreen-800 mb-6">A Legacy of Excellence & Innovation</h2>
                    </div>
                    
                    <p class="text-gray-600 leading-relaxed text-lg">
                        Sikder Group of Companies Ltd. is a leading conglomerate renowned for its uncompromising commitment to quality and sustainable growth. From apparel manufacturing to advanced textile dyeing and premium resort experiences, our diverse portfolio is united by a singular vision: building enduring value for our partners and creating a brighter future for the communities we serve.
                    </p>
                    <p class="text-gray-600 leading-relaxed text-lg">
                        Guided by ethical business practices and technological advancement, we have established state-of-the-art facilities that meet global standards. We take pride in our skilled workforce, whose dedication is the cornerstone of our success across the hosiery, knitting, apparel, labeling, and hospitality sectors.
                    </p>
                    
                    <div class="pt-8 grid grid-cols-2 gap-8 border-t border-gray-100">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 rounded-full bg-darkgreen-800/5 flex items-center justify-center text-darkgreen-800">
                                <i class="fa-solid fa-users text-xl"></i>
                            </div>
                            <div>
                                <div class="text-2xl font-bold text-gray-900">5000+</div>
                                <div class="text-sm font-semibold text-gray-500 uppercase">Skilled Workers</div>
                            </div>
                        </div>
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 rounded-full bg-gold-500/10 flex items-center justify-center text-gold-600">
                                <i class="fa-solid fa-earth-americas text-xl"></i>
                            </div>
                            <div>
                                <div class="text-2xl font-bold text-gray-900">Global</div>
                                <div class="text-sm font-semibold text-gray-500 uppercase">Export Reach</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 2. Mission & Vision -->
    <section class="py-24 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Mission -->
                <div class="bg-white p-12 rounded-2xl shadow-sm border border-gray-100 hover:shadow-xl transition-all group" data-aos="fade-up">
                    <div class="w-16 h-16 rounded-xl bg-darkgreen-800 flex items-center justify-center text-gold-500 mb-8 shadow-lg">
                        <i class="fa-solid fa-bullseye text-2xl"></i>
                    </div>
                    <h3 class="text-3xl font-serif font-bold text-darkgreen-800 mb-4">Our Mission</h3>
                    <p class="text-gray-600 leading-relaxed text-lg">
                        To deliver unparalleled quality in apparel and textile manufacturing while maintaining the highest ethical standards. We strive to continuously innovate, empower our workforce, and provide sustainable solutions that exceed our global clients' expectations.
                    </p>
                </div>
                
                <!-- Vision -->
                <div class="bg-darkgreen-900 p-12 rounded-2xl shadow-lg border-b-4 border-gold-500 group" data-aos="fade-up" data-aos-delay="200">
                    <div class="w-16 h-16 rounded-xl bg-gold-500 flex items-center justify-center text-darkgreen-900 mb-8 shadow-lg">
                        <i class="fa-solid fa-eye text-2xl"></i>
                    </div>
                    <h3 class="text-3xl font-serif font-bold text-white mb-4">Our Vision</h3>
                    <p class="text-gray-300 leading-relaxed text-lg">
                        To be the most trusted and preferred partner in the global garments and textile industry. We envision a future where Sikder Group is synonymous with innovation, environmental stewardship, and socio-economic development in Bangladesh.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- 3. Our Core Values -->
    <section class="py-24 bg-white relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16" data-aos="fade-down">
                <span class="text-gold-600 font-semibold tracking-widest uppercase text-sm mb-2 block">What Drives Us</span>
                <h2 class="text-3xl md:text-4xl font-serif font-bold text-darkgreen-800">
                    Our Core Values
                </h2>
                <div class="mt-4 w-16 h-1 bg-gold-500 mx-auto rounded-full"></div>
            </div>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Value 1 -->
                <div class="text-center" data-aos="zoom-in" data-aos-delay="100">
                    <div class="w-20 h-20 mx-auto rounded-full bg-darkgreen-800/5 flex items-center justify-center text-darkgreen-800 mb-6 border border-gray-100 shadow-sm">
                        <i class="fa-solid fa-gem text-3xl"></i>
                    </div>
                    <h4 class="text-xl font-bold text-gray-900 mb-3">Quality First</h4>
                    <p class="text-gray-500 text-sm">Uncompromising standards in every stitch, ensuring premium output for global brands.</p>
                </div>
                
                <!-- Value 2 -->
                <div class="text-center" data-aos="zoom-in" data-aos-delay="200">
                    <div class="w-20 h-20 mx-auto rounded-full bg-darkgreen-800/5 flex items-center justify-center text-darkgreen-800 mb-6 border border-gray-100 shadow-sm">
                        <i class="fa-solid fa-leaf text-3xl"></i>
                    </div>
                    <h4 class="text-xl font-bold text-gray-900 mb-3">Sustainability</h4>
                    <p class="text-gray-500 text-sm">Committed to eco-friendly practices and minimizing our environmental footprint.</p>
                </div>
                
                <!-- Value 3 -->
                <div class="text-center" data-aos="zoom-in" data-aos-delay="300">
                    <div class="w-20 h-20 mx-auto rounded-full bg-darkgreen-800/5 flex items-center justify-center text-darkgreen-800 mb-6 border border-gray-100 shadow-sm">
                        <i class="fa-solid fa-handshake text-3xl"></i>
                    </div>
                    <h4 class="text-xl font-bold text-gray-900 mb-3">Integrity</h4>
                    <p class="text-gray-500 text-sm">Building lasting relationships through transparent, honest, and ethical business practices.</p>
                </div>
                
                <!-- Value 4 -->
                <div class="text-center" data-aos="zoom-in" data-aos-delay="400">
                    <div class="w-20 h-20 mx-auto rounded-full bg-darkgreen-800/5 flex items-center justify-center text-darkgreen-800 mb-6 border border-gray-100 shadow-sm">
                        <i class="fa-solid fa-lightbulb text-3xl"></i>
                    </div>
                    <h4 class="text-xl font-bold text-gray-900 mb-3">Innovation</h4>
                    <p class="text-gray-500 text-sm">Embracing the latest technologies to stay ahead in the competitive textile industry.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- 4. Chairman's Message -->
    <section class="py-24 bg-gray-50 border-t border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-3xl shadow-xl overflow-hidden border border-gray-100" data-aos="fade-up">
                <div class="grid grid-cols-1 lg:grid-cols-3">
                    <div class="bg-darkgreen-900 p-12 text-center lg:text-left flex flex-col justify-center relative overflow-hidden">
                        <div class="absolute top-0 right-0 text-gold-500/10 transform translate-x-4 -translate-y-4">
                            <i class="fa-solid fa-quote-right text-9xl"></i>
                        </div>
                        <div class="relative z-10">
                            <h3 class="text-3xl font-serif font-bold text-white mb-2">Message from the Chairman</h3>
                            <div class="w-12 h-1 bg-gold-500 mx-auto lg:mx-0 rounded-full mb-6"></div>
                            <h4 class="text-xl font-bold gold-gradient-text">Mr. John Doe</h4>
                            <p class="text-gray-400 text-sm uppercase tracking-widest mt-1">Chairman, Sikder Group</p>
                        </div>
                    </div>
                    <div class="lg:col-span-2 p-12 lg:p-16 flex items-center">
                        <div class="space-y-6">
                            <p class="text-gray-600 text-lg leading-relaxed italic">
                                "Since the foundation of Sikder Group, our goal has always been simple yet ambitious: to redefine excellence in the garments and textile industry. We started with a vision to create not just products, but value for our clients, our employees, and our nation. 
                            </p>
                            <p class="text-gray-600 text-lg leading-relaxed italic">
                                Today, as we look at our state-of-the-art facilities across multiple sister concerns, I am incredibly proud of the dedicated team that makes this possible. We remain steadfast in our commitment to sustainable practices, technological innovation, and uncompromising quality. Together, we are building a legacy that will stand the test of time."
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
