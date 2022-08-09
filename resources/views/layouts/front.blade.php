<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="{{ asset('css/app.css')}}" rel="stylesheet">
        <link href="{{ asset('css/main.css') }}" rel="stylesheet">
        <link rel="icon" type="image/x-icon" href="{{ asset('images/favicon.ico')}}"/>
        <!-- CSS -->
        <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"> -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>

        <!-- jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

        <!-- Share JS -->
        <script src="{{ asset('js/share.js') }}"></script>
        <title>@yield('title')</title>
        @yield('page-meta')
    </head>
    <body>
        <!-- Navigation  -->
        <div class="text-center text-2xl text-green-600">@include('layouts.messages')</div>
        <div id="navDesktop" class="z-40 fixed bg-white w-full lg:grid grid-cols-5 gap-3 shadow lg:px-24 px-8 py-4 flex justify-between items-center">
            <div class="flex justify-between w-full items-center">
                <div id="menu" class="lg:hidden cursor-pointer lg:ml-auto">
                    <svg class="w-10 h-10" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
                </div>
                <div class="">
                    <a href="{{ route('front') }}">
                        <div class="lg:col-span-1">
                            <img class="w-14 lg:w-16 lg:ml-0" src="{{ asset('images/bowdi.png') }}" alt="BOWDI logo">
                        </div>
                    </a>
                </div>
            </div>
            <div class="lg:col-span-4 hidden lg:block">
                <nav class="lg:flex justify-between list-none uppercase font-medium">
                    <li class="py-1 hover:text-green-600"><a href="{{ route('front') }}">Home</a></li>
                    <li class="py-1 hover:text-green-600"><a href="{{ route('where-we-work') }}">Where We Work</a></li>
                    <li class="py-1 hover:text-green-600"><a href="{{ route('who-we-are') }}">Who We Are</a></li>
                    <li class="py-1 hover:text-green-600"><a href="{{ route('what-we-do') }}">What We Do</a></li>
                    <li class="py-1 hover:text-green-600"><a href="{{ route('contact-us') }}">Contact Us</a></li>
                </nav>
            </div>
        </div>
        <!-- Mobile Nav -->
        <div id="navMobile" class="w-full fixed h-screen z-30 hidden bg-white py-8">
            <div class="list-none p-2 text-xl border-t bg-white pt-20">
                <li class="py-3 px-8">
                    <a href="{{ route('front') }}" class="flex justify-between items-center">
                        <span>Home</span>
                        &nbsp;&nbsp;
                        <span><i class="fa-solid fa-house text-2xl"></i></span>
                    </a>
                </li>
                <hr>
                <li class="py-3 px-8">
                    <a href="{{ route('where-we-work') }}" class="flex justify-between items-center">
                        <span>Where We Work</span>
                        &nbsp;&nbsp;
                        <span><i class="fa-solid fa-building text-2xl"></i></span>
                    </a>
                </li>
                <hr>
                <li class="py-3 px-8">
                    <a href="{{ route('who-we-are') }}" class="flex justify-between items-center">
                        <span>Who We Are</span>
                        &nbsp;&nbsp;
                        <span><i class="fa-solid fa-person-circle-question text-2xl"></i></span>

                    </a>
                </li>
                <hr>
                <li class="py-3 px-8">
                    <a href="{{ route('what-we-do') }}" class="flex justify-between border-b-1 items-center">
                        <span>What We Do</span>
                        &nbsp;&nbsp;
                        <span><i class="fa-solid fa-briefcase text-2xl"></i></span>
                    </a>
                </li>
                <hr>
                <li class="py-3 px-8">
                    <a href="{{ route('blog.front') }}" class="flex justify-between border-b-1 items-center">
                        <span>Blog</span>
                        &nbsp;&nbsp;
                        <span><i class="fa-brands fa-blogger-b text-2xl"></i></span>
                    </a>
                </li>
                <hr>
                <li class="py-3 px-8">
                    <a href="{{ route('portal') }}" class="flex justify-between items-center">
                        <span>Log In</span>
                        &nbsp;&nbsp;
                        <span><i class="fa-solid fa-house-lock text-2xl"></i></span>
                    </a>
                </li>
                <hr>
                <li class="py-3 px-8">
                    <a href="{{ route('contact-us') }}" class="flex justify-between items-center">
                        <span>Contact Us</span>
                        &nbsp;&nbsp;
                        <span><i class="fa-solid fa-headset text-2xl"></i></span>
                    </a>
                </li>
            </div>
        </div>
        <!-- End of Navigation Bar  -->
        
        <!-- Body Content  -->
        <div class="relative top-24 py-6">
            @yield('body-content')
        </div>
        <!-- End of Body Content  -->

        <!-- Footer  -->
        <div class="relative top-24">
            <div id="footer" class=" bg-green-600 py-12 px-8 lg:px-24 lg:grid grid-cols-5 gap-8 text-white">
                <div class="col-span-2">
                    <div>
                        <h1 class="text-3xl font-bold mb-4">Vision</h1>
                        <p class="py-1 text-left lg:w-2/3 w-full">
                            BOWDI's vision is to nurture developed and resilient communities of resourceful, independent, educated women, girls and boys with good vision and services. Reduce poverty and Sexual/Gender Based Violence
                        </p>
                    </div>
                    <div class="mt-4">
                        <h1 class="text-2xl font-bold pb-4">Borno Women Development Initiative (BOWDI)</h1>
                        <img class="w-28 mx-auto lg:mx-0" src="{{ asset('images/bowdi.png') }}" alt="BOWDI Logo">
                        <p class="py-1 text-left lg:w-2/3 w-full">
                            Plot 130 Tampul Road, Molai Road GRA Extension Maiduguri, Borno State Nigeria
                        </p>
                    </div>
                </div>
                <div class="col-span-2">
                    <h1 class="text-3xl font-bold mb-4">Our Partners</h1>
                    <nav class="list-none text-white">
                        <li class="py-1 hover:text-gray-800">
                            <a class="flex items-center py-1" href="https://www.unhcr.org/">
                                United Nations High Refugee (UNHCR)
                            </a>
                        </li>
                        <li class="py-1 hover:text-gray-800">
                            <a class="flex items-center py-1" href="#">
                                Federal Republic of Germany
                            </a>
                        </li>
                        <li class="py-1 hover:text-gray-800">
                            <a class="flex items-center py-1" href="https://www.rescue.org/">
                                International Rescue Committee (IRC)
                            </a>
                        </li>
                        <li class="py-1 hover:text-gray-800">
                            <a class="flex items-center py-1" href="#">
                                Educational Crisis Response (ECR)
                            </a>
                        </li>
                        <li class="py-1 hover:text-gray-800">
                            <a class="flex items-center py-1" href="http://www.bosema.gov.ng/">
                                State Emergency Management Agency (SEMA)
                            </a>
                        </li>
                        <li class="py-1 hover:text-gray-800">
                            <a class="flex items-center py-1" href="https://www1.wfp.org/">
                                World Food Program (WFP)
                            </a>
                        </li>
                        <li class="py-1 hover:text-gray-800">
                            <a class="flex items-center py-1" href="https://www.undp.org/">
                                United Nations Development Programme (UNDP)
                            </a>
                        </li>
                    </nav>
                </div>
                <div class="col-span-1">    
                    <div>
                        <h1 class="text-3xl font-bold mb-4">Follow Us</h1>
                        <nav class="list-none text-white">
                            <li class="py-1 hover:text-gray-800">
                                <a class="flex items-center py-1" href="https://twitter.com/bornowomendevt">
                                    <span><i class="fa-brands fa-twitter text-xl"></i></span> &nbsp;&nbsp;
                                    <span>Twitter</span>
                                </a>
                            </li>
                            <li class="py-1 hover:text-gray-800">
                                <a class="flex items-center py-1" href="https://web.facebook.com/bornowomen/">
                                    <span><i class="fa-brands fa-facebook text-xl"></i></span> &nbsp;&nbsp;
                                    <span>Facebook</span>
                                </a>
                            </li>
                            <li class="py-1 hover:text-gray-800">
                                <a class="flex items-center py-1" href="https://www.linkedin.com/company/bowdi/">
                                    <span><i class="fa-brands fa-linkedin text-xl"></i></span> &nbsp;&nbsp;
                                    <span>LinkedIn</span>
                                </a>
                            </li>
                            <li class="py-1 hover:text-gray-800">
                                <a class="flex items-center py-1" href="#">
                                    <span><i class="fa-brands fa-instagram text-xl"></i></span> &nbsp;&nbsp;
                                    <span>Instagram</span>
                                </a>
                            </li>
                        </nav>
                    </div>
                    <div class="mt-5">
                        <h1 class="text-3xl font-bold mb-4">Navigation</h1>
                        <nav class="list-none text-white">
                            <li class="py-1 hover:text-gray-800">
                                <a class="flex items-center py-1" href="{{ route('front') }}">
                                    <span>Home</span>
                                </a>
                            </li>
                            <li class="py-1 hover:text-gray-800">
                                <a class="flex items-center py-1" href="{{ route('where-we-work') }}">
                                    <span>Where We Work</span>
                                </a>
                            </li>
                            <li class="py-1 hover:text-gray-800">
                                <a class="flex items-center py-1" href="{{ route('who-we-are') }}">
                                    <span>Who We Are</span>
                                </a>
                            </li>
                            <li class="py-1 hover:text-gray-800">
                                <a class="flex items-center py-1" href="{{ route('what-we-do') }}">
                                    <span>What We Do</span>
                                </a>
                            </li>
                            <li class="py-1 hover:text-gray-800">
                                <a class="flex items-center py-1" href="{{ route('blog.front') }}">
                                    <span>Blog</span>
                                </a>
                            </li>
                            <li class="py-1 hover:text-gray-800">
                                <a class="flex items-center py-1" href="{{ route('portal') }}">
                                    <span>Log In</span>
                                </a>
                            </li>
                            <li class="py-1 hover:text-gray-800">
                                <a class="flex items-center py-1" href="{{ route('contact-us') }}">
                                    <span>Contact Us</span>
                                </a>
                            </li>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="py-7 text-center sm:text-sm">
                <footer>
                    Designed & Developed by <a class="hover:text-green-600" href="https://teampiccolo.com">Team Piccolo</a><br>
                    Copyright © 2020-@php echo date('Y') @endphp BOWDI. All Rights Reserved 
                </footer>
            </div>
        </div>
        <script src="{{ asset('js/front.js') }}"></script>
    </body>
</html>
