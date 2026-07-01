@extends('layouts.app')

@section('content')
    <!-- Sister Concerns Section -->
    <section id="concerns" class="py-24 bg-gray-50 relative min-h-[80vh] flex items-center overflow-hidden">
        <!-- Background Accent -->
        <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-transparent via-gold-500 to-transparent opacity-50"></div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16" data-aos="fade-down">
                <span class="text-gold-600 font-semibold tracking-widest uppercase text-sm mb-2 block">Our Entities</span>
                <h2 class="text-3xl md:text-4xl font-serif font-bold text-darkgreen-800">
                    Our Sister Concerns
                </h2>
                <div class="mt-4 w-16 h-1 bg-gold-500 mx-auto rounded-full"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($concerns as $index => $concern)
                    <!-- Card -->
                    <div class="glass-card rounded-xl p-8 transition-all-custom flex flex-col items-center text-center group" data-aos="fade-up" data-aos-delay="{{ ($index + 1) * 100 }}">
                        <div class="w-16 h-16 rounded-full bg-darkgreen-800/5 group-hover:bg-gold-500/10 flex items-center justify-center mb-6 transition-colors">
                            <i class="fa-solid {{ $concern->icon_class ?? 'fa-circle' }} text-2xl text-darkgreen-800 group-hover:text-gold-600 transition-colors"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-darkgreen-800 transition-colors">{{ $concern->title }}</h3>
                        <p class="text-gray-500 text-sm mt-auto">{{ $concern->description }}</p>
                    </div>
                @empty
                    <!-- Card 1 -->
                    <div class="glass-card rounded-xl p-8 transition-all-custom flex flex-col items-center text-center group" data-aos="fade-up" data-aos-delay="100">
                        <div class="w-16 h-16 rounded-full bg-darkgreen-800/5 group-hover:bg-gold-500/10 flex items-center justify-center mb-6 transition-colors">
                            <i class="fa-solid fa-shirt text-2xl text-darkgreen-800 group-hover:text-gold-600 transition-colors"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-darkgreen-800 transition-colors">SIKDER APPAREL HOSIERY LTD.</h3>
                        <p class="text-gray-500 text-sm mt-auto">Premium hosiery manufacturing with cutting-edge technology and superior quality control.</p>
                    </div>

                    <!-- Card 2 -->
                    <div class="glass-card rounded-xl p-8 transition-all-custom flex flex-col items-center text-center group" data-aos="fade-up" data-aos-delay="200">
                        <div class="w-16 h-16 rounded-full bg-darkgreen-800/5 group-hover:bg-gold-500/10 flex items-center justify-center mb-6 transition-colors">
                            <i class="fa-solid fa-droplet text-2xl text-darkgreen-800 group-hover:text-gold-600 transition-colors"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-darkgreen-800 transition-colors">SIKDER CLASSIC DYEING & KNITTING (PVT) LTD</h3>
                        <p class="text-gray-500 text-sm mt-auto">State-of-the-art dyeing and knitting facility ensuring color perfection and fabric durability.</p>
                    </div>

                    <!-- Card 3 -->
                    <div class="glass-card rounded-xl p-8 transition-all-custom flex flex-col items-center text-center group" data-aos="fade-up" data-aos-delay="300">
                        <div class="w-16 h-16 rounded-full bg-darkgreen-800/5 group-hover:bg-gold-500/10 flex items-center justify-center mb-6 transition-colors">
                            <i class="fa-solid fa-vest text-2xl text-darkgreen-800 group-hover:text-gold-600 transition-colors"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-darkgreen-800 transition-colors">SIKDER APPAREL LTD.</h3>
                        <p class="text-gray-500 text-sm mt-auto">High-volume, export-quality apparel production meeting global fashion standards.</p>
                    </div>

                    <!-- Card 4 -->
                    <div class="glass-card rounded-xl p-8 transition-all-custom flex flex-col items-center text-center group lg:col-start-2" data-aos="fade-up" data-aos-delay="400">
                        <div class="w-16 h-16 rounded-full bg-darkgreen-800/5 group-hover:bg-gold-500/10 flex items-center justify-center mb-6 transition-colors">
                            <i class="fa-solid fa-tags text-2xl text-darkgreen-800 group-hover:text-gold-600 transition-colors"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-darkgreen-800 transition-colors">SIKDER COMPUTERIZED LABEL LTD.</h3>
                        <p class="text-gray-500 text-sm mt-auto">Precision computerized labeling and branding solutions for the textile industry.</p>
                    </div>

                    <!-- Card 5 -->
                    <div class="glass-card rounded-xl p-8 transition-all-custom flex flex-col items-center text-center group lg:col-start-3" data-aos="fade-up" data-aos-delay="500">
                        <div class="w-16 h-16 rounded-full bg-darkgreen-800/5 group-hover:bg-gold-500/10 flex items-center justify-center mb-6 transition-colors">
                            <i class="fa-solid fa-umbrella-beach text-2xl text-darkgreen-800 group-hover:text-gold-600 transition-colors"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-darkgreen-800 transition-colors">PUBAIL RESORT CLUB</h3>
                        <p class="text-gray-500 text-sm mt-auto">An exclusive retreat offering world-class hospitality, recreation, and serenity.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection
