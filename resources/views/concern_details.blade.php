@extends('layouts.app')

@section('content')
    <!-- Detail Header Section -->
    <section class="py-24 bg-gray-50 relative flex items-center overflow-hidden">
        <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-transparent via-gold-500 to-transparent opacity-50"></div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
            <div class="text-center mb-12" data-aos="fade-down">
                <span class="text-gold-600 font-semibold tracking-widest uppercase text-sm mb-2 block">Concern Details</span>
                <h1 class="text-4xl md:text-5xl font-serif font-bold text-darkgreen-800 flex items-center justify-center gap-4">
                    <i class="fa-solid {{ $concern->icon_class ?? 'fa-circle' }} text-3xl text-gold-500"></i>
                    {{ $concern->title }}
                </h1>
                <div class="mt-6 w-24 h-1 bg-gold-500 mx-auto rounded-full"></div>
            </div>
            
            <div class="w-full text-lg text-gray-700 leading-relaxed mb-16 text-justify" data-aos="fade-up">
                @if($concern->details)
                    {!! nl2br(e($concern->details)) !!}
                @else
                    <p>{{ $concern->description }}</p>
                @endif
            </div>

            @if($concern->images && count($concern->images) > 0)
                <div class="mt-16">
                    <div class="text-center mb-10" data-aos="fade-up">
                        <h2 class="text-2xl font-bold text-darkgreen-800">Gallery</h2>
                        <div class="mt-2 w-12 h-1 bg-gold-500 mx-auto rounded-full"></div>
                    </div>
                    
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                        @foreach($concern->images as $index => $image)
                            <div class="overflow-hidden rounded-xl shadow-md group cursor-pointer" data-aos="zoom-in" data-aos-delay="{{ $index * 100 }}">
                                <img src="{{ Storage::url($image) }}" alt="{{ $concern->title }} Image {{ $index + 1 }}" class="w-full h-64 object-cover transform group-hover:scale-110 transition-transform duration-500">
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
            
            <div class="text-center mt-16">
                <a href="{{ route('concerns.public') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-darkgreen-800 text-white rounded-lg hover:bg-darkgreen-900 transition-colors font-medium shadow-md hover:shadow-lg">
                    <i class="fa-solid fa-arrow-left"></i> Back to Concerns
                </a>
            </div>
        </div>
    </section>
@endsection
