<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sikder Group | Building Values, Creating Futures</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        gold: {
                            400: '#DAB879',
                            500: '#C5A059',
                            600: '#A6823F',
                        },
                        darkgreen: {
                            800: '#004b23',
                            900: '#003314',
                        }
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        serif: ['Playfair Display', 'serif'],
                    }
                }
            }
        }
    </script>
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@600;700;800&display=swap" rel="stylesheet">
    <!-- AOS CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <style>
        .gold-gradient-text {
            background: linear-gradient(to right, #A6823F, #DAB879, #C5A059);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        .gold-gradient-bg {
            background: linear-gradient(135deg, #C5A059 0%, #A6823F 100%);
        }
        .glass-card {
            background: #ffffff;
            border: 1px solid rgba(0, 0, 0, 0.03);
            box-shadow: 0 10px 40px -10px rgba(0, 0, 0, 0.08);
            border-radius: 1rem;
        }
        .glass-card:hover {
            border-color: rgba(197, 160, 89, 0.3);
            transform: translateY(-4px);
            box-shadow: 0 20px 40px -10px rgba(15, 41, 30, 0.12);
        }
        .transition-all-custom {
            transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
        }
        
        /* Navbar Scrolled State */
        .navbar-scrolled {
            background: rgba(255, 255, 255, 0.98);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            padding-top: 0.5rem;
            padding-bottom: 0.5rem;
        }
    </style>
</head>
<body class="font-sans antialiased text-gray-800 bg-gray-50 flex flex-col min-h-screen">

    <!-- Navigation -->
    <header id="main-header" class="fixed w-full z-50 bg-white/90 backdrop-blur-md border-b border-gray-100 transition-all duration-300 py-2">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <a href="{{ url('/') }}" class="flex-shrink-0 flex items-center gap-3 cursor-pointer group">
                    <div class="w-12 h-12 rounded-full border-2 border-gold-500 flex items-center justify-center bg-darkgreen-800 shadow-md group-hover:shadow-gold-500/50 transition-all">
                        <span class="text-2xl font-serif font-bold gold-gradient-text">S</span>
                    </div>
                    <div class="flex flex-col">
                        <span class="font-serif font-bold text-xl tracking-wider text-darkgreen-800 uppercase">Sikder Group</span>
                        <span class="text-[0.6rem] tracking-[0.2em] text-gold-600 font-medium uppercase">Building Values</span>
                    </div>
                </a>

                <!-- Desktop Menu -->
                <nav class="hidden md:flex space-x-8">
                    <a href="{{ url('/') }}" class="text-sm font-semibold {{ request()->is('/') ? 'text-gold-600' : 'text-gray-600 hover:text-gold-500' }} transition-colors uppercase tracking-wider relative group">
                        Home
                        <span class="absolute -bottom-2 left-0 w-full h-0.5 bg-gold-500 {{ request()->is('/') ? 'scale-x-100' : 'scale-x-0 group-hover:scale-x-100' }} transition-transform origin-left"></span>
                    </a>
                    <a href="{{ url('/about') }}" class="text-sm font-semibold {{ request()->is('about') ? 'text-gold-600' : 'text-gray-600 hover:text-gold-500' }} transition-colors uppercase tracking-wider relative group">
                        About Us
                        <span class="absolute -bottom-2 left-0 w-full h-0.5 bg-gold-500 {{ request()->is('about') ? 'scale-x-100' : 'scale-x-0 group-hover:scale-x-100' }} transition-transform origin-left"></span>
                    </a>
                    <a href="{{ url('/concerns') }}" class="text-sm font-semibold {{ request()->is('concerns') ? 'text-gold-600' : 'text-gray-600 hover:text-gold-500' }} transition-colors uppercase tracking-wider relative group">
                        Our Concerns
                        <span class="absolute -bottom-2 left-0 w-full h-0.5 bg-gold-500 {{ request()->is('concerns') ? 'scale-x-100' : 'scale-x-0 group-hover:scale-x-100' }} transition-transform origin-left"></span>
                    </a>
                    <a href="{{ url('/contact') }}" class="text-sm font-semibold {{ request()->is('contact') ? 'text-gold-600' : 'text-gray-600 hover:text-gold-500' }} transition-colors uppercase tracking-wider relative group">
                        Contact
                        <span class="absolute -bottom-2 left-0 w-full h-0.5 bg-gold-500 {{ request()->is('contact') ? 'scale-x-100' : 'scale-x-0 group-hover:scale-x-100' }} transition-transform origin-left"></span>
                    </a>
                </nav>

                <!-- Mobile Menu Button -->
                <div class="md:hidden flex items-center">
                    <button class="text-darkgreen-800 hover:text-gold-500 focus:outline-none">
                        <i class="fa-solid fa-bars text-2xl"></i>
                    </button>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-grow pt-20">
        @yield('content')
    </main>

    <!-- Contact Section / Footer -->
    <footer class="bg-darkgreen-900 pt-20 pb-10 border-t-2 border-gold-500 mt-auto">
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-12 mb-16">
                
                <!-- Brand Info -->
                <div class="lg:col-span-4">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-10 h-10 rounded-full border border-gold-500 flex items-center justify-center bg-white/10">
                            <span class="text-xl font-serif font-bold gold-gradient-text">S</span>
                        </div>
                        <span class="font-serif font-bold text-xl tracking-wider text-white uppercase">Sikder Group</span>
                    </div>
                    <p class="text-gray-300 text-sm leading-relaxed mb-6">
                        Building values and creating futures through unwavering commitment to quality and excellence across our diverse portfolio of companies in the garments and textile industry.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="w-10 h-10 rounded-full bg-white/5 flex items-center justify-center text-gray-300 hover:bg-gold-500 hover:text-white transition-all">
                            <i class="fa-brands fa-facebook-f"></i>
                        </a>
                        <a href="#" class="w-10 h-10 rounded-full bg-white/5 flex items-center justify-center text-gray-300 hover:bg-gold-500 hover:text-white transition-all">
                            <i class="fa-brands fa-linkedin-in"></i>
                        </a>
                        <a href="#" class="w-10 h-10 rounded-full bg-white/5 flex items-center justify-center text-gray-300 hover:bg-gold-500 hover:text-white transition-all">
                            <i class="fa-brands fa-twitter"></i>
                        </a>
                    </div>
                </div>

                <!-- Contact Info -->
                <div class="lg:col-span-5">
                    <h4 class="text-lg font-bold text-white mb-6 uppercase tracking-wider border-b border-gray-700 pb-2 inline-block">Contact Information</h4>
                    
                    <ul class="space-y-5">
                        <li class="flex items-start">
                            <div class="flex-shrink-0 w-8 h-8 rounded bg-darkgreen-800 border border-gray-700 flex items-center justify-center text-gold-500 mt-1">
                                <i class="fa-solid fa-building"></i>
                            </div>
                            <div class="ml-4">
                                <span class="block text-sm font-semibold text-gray-200 mb-1">Head Office</span>
                                <span class="block text-sm text-gray-400">373/1, East Rampura, Dhaka-1219</span>
                            </div>
                        </li>
                        
                        <li class="flex items-start">
                            <div class="flex-shrink-0 w-8 h-8 rounded bg-darkgreen-800 border border-gray-700 flex items-center justify-center text-gold-500 mt-1">
                                <i class="fa-solid fa-industry"></i>
                            </div>
                            <div class="ml-4">
                                <span class="block text-sm font-semibold text-gray-200 mb-1">Factory</span>
                                <span class="block text-sm text-gray-400">Khadun (Dug No. 342/343), Tarabo,<br>Rupgonj, Narayangonj.</span>
                            </div>
                        </li>
                        
                        <li class="flex items-center">
                            <div class="flex-shrink-0 w-8 h-8 rounded bg-darkgreen-800 border border-gray-700 flex items-center justify-center text-gold-500">
                                <i class="fa-solid fa-phone"></i>
                            </div>
                            <div class="ml-4">
                                <a href="tel:+8801711532644" class="text-sm text-gray-400 hover:text-gold-400 transition-colors">+88-01711-532644</a>
                            </div>
                        </li>

                        <li class="flex items-center">
                            <div class="flex-shrink-0 w-8 h-8 rounded bg-darkgreen-800 border border-gray-700 flex items-center justify-center text-gold-500">
                                <i class="fa-solid fa-globe"></i>
                            </div>
                            <div class="ml-4">
                                <a href="http://www.sikdergroup.com" target="_blank" class="text-sm text-gray-400 hover:text-gold-400 transition-colors">www.sikdergroup.com</a>
                            </div>
                        </li>
                    </ul>
                </div>

                <!-- Quick Links -->
                <div class="lg:col-span-3">
                    <h4 class="text-lg font-bold text-white mb-6 uppercase tracking-wider border-b border-gray-700 pb-2 inline-block">Quick Links</h4>
                    <ul class="space-y-3">
                        <li><a href="{{ url('/') }}" class="text-sm text-gray-400 hover:text-gold-400 transition-colors flex items-center gap-2"><i class="fa-solid fa-angle-right text-xs"></i> Home</a></li>
                        <li><a href="{{ url('/about') }}" class="text-sm text-gray-400 hover:text-gold-400 transition-colors flex items-center gap-2"><i class="fa-solid fa-angle-right text-xs"></i> About Us</a></li>
                        <li><a href="{{ url('/concerns') }}" class="text-sm text-gray-400 hover:text-gold-400 transition-colors flex items-center gap-2"><i class="fa-solid fa-angle-right text-xs"></i> Sister Concerns</a></li>
                        <li><a href="{{ url('/contact') }}" class="text-sm text-gray-400 hover:text-gold-400 transition-colors flex items-center gap-2"><i class="fa-solid fa-angle-right text-xs"></i> Contact</a></li>
                    </ul>
                </div>
            </div>
            
            <div class="border-t border-gray-800 pt-8 flex flex-col md:flex-row justify-between items-center">
                <p class="text-sm text-gray-500 text-center md:text-left">
                    &copy; <script>document.write(new Date().getFullYear())</script> SIKDER GROUP OF COMPANIES LTD. All rights reserved.
                </p>
                <div class="mt-4 md:mt-0">
                    <span class="text-xs text-gray-600">Building Values, Creating Futures</span>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <!-- AOS JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 800,
            easing: 'ease-out-cubic',
            once: true,
            offset: 50,
        });

        // Navbar blur and shrink on scroll
        window.addEventListener('scroll', function() {
            const header = document.getElementById('main-header');
            if (window.scrollY > 20) {
                header.classList.add('navbar-scrolled');
                header.classList.remove('py-2');
            } else {
                header.classList.remove('navbar-scrolled');
                header.classList.add('py-2');
            }
        });
    </script>
</body>
</html>
