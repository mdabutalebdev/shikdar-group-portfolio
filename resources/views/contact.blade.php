@extends('layouts.app')

@section('content')
    <section class="py-20 bg-white min-h-[80vh] flex items-center overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16" data-aos="fade-down">
                <h2 class="text-3xl md:text-4xl font-serif font-bold text-darkgreen-800 inline-block relative">
                    Get In Touch
                    <div class="absolute -bottom-4 left-1/2 transform -translate-x-1/2 w-12 h-1 bg-gold-500"></div>
                </h2>
                <p class="mt-8 text-gray-600 max-w-2xl mx-auto" data-aos="fade-up" data-aos-delay="200">
                    We'd love to hear from you. Whether you have a question about our concerns, pricing, or anything else, our team is ready to answer all your questions.
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                <!-- Contact Form -->
                <div class="glass-card rounded-2xl p-8 shadow-lg" data-aos="fade-right" data-aos-delay="400">
                    <h3 class="text-2xl font-serif font-bold text-darkgreen-800 mb-6">Send us a message</h3>
                    
                    @if (session('success'))
                        <div class="mb-6 p-4 rounded-md bg-green-50 border border-green-200">
                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <i class="fa-solid fa-circle-check text-green-500"></i>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm font-medium text-green-800">
                                        {{ session('success') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endif

                    <form action="{{ route('contact.submit') }}" method="POST" class="space-y-6">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="first_name" class="block text-sm font-medium text-gray-700">First Name</label>
                                <input type="text" name="first_name" id="first_name" value="{{ old('first_name') }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-gold-500 focus:ring-gold-500 border p-3 bg-gray-50 @error('first_name') border-red-500 @enderror" placeholder="John">
                                @error('first_name') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label for="last_name" class="block text-sm font-medium text-gray-700">Last Name</label>
                                <input type="text" name="last_name" id="last_name" value="{{ old('last_name') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-gold-500 focus:ring-gold-500 border p-3 bg-gray-50 @error('last_name') border-red-500 @enderror" placeholder="Doe">
                                @error('last_name') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                            <input type="email" name="email" id="email" value="{{ old('email') }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-gold-500 focus:ring-gold-500 border p-3 bg-gray-50 @error('email') border-red-500 @enderror" placeholder="john@example.com">
                            @error('email') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label for="subject" class="block text-sm font-medium text-gray-700">Subject</label>
                            <input type="text" name="subject" id="subject" value="{{ old('subject') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-gold-500 focus:ring-gold-500 border p-3 bg-gray-50 @error('subject') border-red-500 @enderror" placeholder="How can we help you?">
                            @error('subject') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label for="message" class="block text-sm font-medium text-gray-700">Message</label>
                            <textarea id="message" name="message" rows="4" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-gold-500 focus:ring-gold-500 border p-3 bg-gray-50 @error('message') border-red-500 @enderror" placeholder="Your message here...">{{ old('message') }}</textarea>
                            @error('message') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <button type="submit" class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-darkgreen-900 gold-gradient-bg hover:shadow-lg hover:shadow-gold-500/30 transition-all cursor-pointer">
                                Send Message
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Contact Information & Map -->
                <div class="space-y-8" data-aos="fade-left" data-aos-delay="600">
                    <div class="bg-darkgreen-900 rounded-2xl p-8 text-white relative shadow-lg h-full flex flex-col justify-between">
                        
                        <div class="relative z-10 mb-8">
                            <h3 class="text-2xl font-serif font-bold mb-8 gold-gradient-text">Contact Information</h3>
                            
                            <ul class="space-y-6">
                                <li class="flex items-start">
                                    <div class="flex-shrink-0 w-10 h-10 rounded-full bg-white/10 flex items-center justify-center text-gold-500 mt-1 border border-gold-500/30">
                                        <i class="fa-solid fa-building"></i>
                                    </div>
                                    <div class="ml-4">
                                        <span class="block text-lg font-semibold text-white mb-1">Head Office</span>
                                        <span class="block text-gray-300">373/1, East Rampura, Dhaka-1219</span>
                                    </div>
                                </li>
                                
                                <li class="flex items-start">
                                    <div class="flex-shrink-0 w-10 h-10 rounded-full bg-white/10 flex items-center justify-center text-gold-500 mt-1 border border-gold-500/30">
                                        <i class="fa-solid fa-industry"></i>
                                    </div>
                                    <div class="ml-4">
                                        <span class="block text-lg font-semibold text-white mb-1">Factory</span>
                                        <span class="block text-gray-300">Khadun (Dug No. 342/343), Tarabo,<br>Rupgonj, Narayangonj.</span>
                                    </div>
                                </li>
                                
                                <li class="flex items-center">
                                    <div class="flex-shrink-0 w-10 h-10 rounded-full bg-white/10 flex items-center justify-center text-gold-500 border border-gold-500/30">
                                        <i class="fa-solid fa-phone"></i>
                                    </div>
                                    <div class="ml-4">
                                        <span class="block text-lg font-semibold text-white mb-1">Phone</span>
                                        <a href="tel:+8801711532644" class="text-gray-300 hover:text-gold-400 transition-colors">+88-01711-532644</a>
                                    </div>
                                </li>

                                <li class="flex items-center">
                                    <div class="flex-shrink-0 w-10 h-10 rounded-full bg-white/10 flex items-center justify-center text-gold-500 border border-gold-500/30">
                                        <i class="fa-solid fa-globe"></i>
                                    </div>
                                    <div class="ml-4">
                                        <span class="block text-lg font-semibold text-white mb-1">Website</span>
                                        <a href="http://www.sikdergroup.com" target="_blank" class="text-gray-300 hover:text-gold-400 transition-colors">www.sikdergroup.com</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        
                        <!-- Map -->
                        <div class="h-48 rounded-xl overflow-hidden shadow-inner border border-white/10 relative z-10 w-full mt-auto">
                            <iframe 
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14605.903730302385!2d90.41366114999999!3d23.76606015!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c79b763ec7c9%3A0xc660d19f80f688!2sEast%20Rampura%2C%20Dhaka!5e0!3m2!1sen!2sbd!4v1709400000000!5m2!1sen!2sbd" 
                                width="100%" 
                                height="100%" 
                                style="border:0;" 
                                allowfullscreen="" 
                                loading="lazy" 
                                referrerpolicy="no-referrer-when-downgrade"
                                class="absolute inset-0 grayscale hover:grayscale-0 transition-all duration-500 opacity-80 hover:opacity-100">
                            </iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
