<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

        <!-- SEO Meta Tags -->
        <meta name="description" content="Pavo is a mobile app Tailwind CSS HTML template created to help you present benefits, features and information about mobile apps in order to convince visitors to download them" />
        <meta name="author" content="Your name" />

        <!-- OG Meta Tags to improve the way the post looks when you share the page on Facebook, Twitter, LinkedIn -->
        <meta property="og:site_name" content="" /> <!-- website name -->
        <meta property="og:site" content="" /> <!-- website link -->
        <meta property="og:title" content="" /> <!-- title shown in the actual shared post -->
        <meta property="og:description" content="" /> <!-- description shown in the actual shared post -->
        <meta property="og:image" content="" /> <!-- image link, make sure it's jpg -->
        <meta property="og:url" content="" /> <!-- where do you want your post to link to -->
        <meta name="twitter:card" content="summary_large_image" /> <!-- to have large image post format in Twitter -->

        <!-- Webpage Title -->
        <title>Whisper</title>

        <!-- Styles -->
        <link rel="preconnect" href="https://fonts.gstatic.com" />
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,600;0,700;1,400&display=swap" rel="stylesheet" />
        <link href="/resources/css/fontawesome-all.css" rel="stylesheet" />
        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet" />
        <link href="/resources/css/swiper.css" rel="stylesheet" />
        <link href="/resources/css/magnific-popup.css" rel="stylesheet" />
        <link href="/resources/css/styles.css" rel="stylesheet" />

        <!-- Favicon  -->
        <link rel="icon" href="images/favicon.png" />
    </head>
    <body data-spy="scroll" data-target=".fixed-top">
    @vite(['resources/css/app.css', 'resources/js/app.js','/resources/css/magnific-popup.css','/resources/css/styles.css','/resources/css/swiper.css','/resources/css/fontawesome-all.css','/resources/js/jquery.easing.min.js','/resources/js/jquery.magnific-popup.js','/resources/js/jquery.min.js','/resources/js/scripts.js','/resources/js/swiper.min.js'])
        <!-- Navigation -->
        <nav class="navbar fixed-top">
            <div class="container sm:px-4 lg:px-8 flex flex-wrap items-center justify-between lg:flex-nowrap">
                
                <!-- Text Logo - Use this if you don't have a graphic logo -->
                <!-- <a class="text-gray-800 font-semibold text-3xl leading-4 no-underline page-scroll" href="index.html">Pavo</a> -->

                <!-- Image Logo -->
                <a class="inline-block mr-4 py-0.5 text-xl whitespace-nowrap hover:no-underline focus:no-underline" href="index.html">
                    <img src="{{ asset('images/Capture_d_écran_2024-02-27_155417-removebg-preview (2).png') }}" alt="alternative" class="h-8" />
                </a>

                <button class="background-transparent rounded text-xl leading-none hover:no-underline focus:no-underline lg:hidden lg:text-gray-400" type="button" data-toggle="offcanvas">
                    <span class="navbar-toggler-icon inline-block w-8 h-8 align-middle"></span>
                </button>
                @if (Route::has('login'))
                <div class="navbar-collapse offcanvas-collapse lg:flex lg:flex-grow lg:items-center" id="navbarsExampleDefault">
                    <ul class="pl-0 mt-3 mb-2 ml-auto flex flex-col list-none lg:mt-0 lg:mb-0 lg:flex-row">
                    @auth
                        <li>
                        <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                        </li>
                        @else
                        <li>
                        <a href="{{ route('login') }}" class="relative inline-flex items-center justify-start py-3 pl-4 pr-12 overflow-hidden font-semibold text-indigo-600 transition-all duration-150 ease-in-out rounded hover:pl-10 hover:pr-6 bg-gray-50 group">
                        <span class="absolute bottom-0 left-0 w-full h-1 transition-all duration-150 ease-in-out bg-indigo-600 group-hover:h-full"></span>
                        <span class="absolute right-0 pr-4 duration-200 ease-out group-hover:translate-x-12">
                        <svg class="w-5 h-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </span>
                        <span class="absolute left-0 pl-2.5 -translate-x-12 group-hover:translate-x-0 ease-out duration-200">
                        <svg class="w-5 h-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </span>
                        <span class="relative w-full text-left transition-colors duration-200 ease-in-out group-hover:text-white">Log-In</span>
                        </a>
                        </li>
                        @if (Route::has('register'))
                        <li>
                        <a href="{{ route('register') }}" class="relative inline-flex items-center justify-start px-6 py-3 overflow-hidden font-medium transition-all bg-red-500 rounded-xl group">
                        <span class="absolute top-0 right-0 inline-block w-4 h-4 transition-all duration-500 ease-in-out bg-red-700 rounded group-hover:-mr-4 group-hover:-mt-4">
                        <span class="absolute top-0 right-0 w-5 h-5 rotate-45 translate-x-1/2 -translate-y-1/2 bg-white"></span>
                        </span>
                        <span class="absolute bottom-0 left-0 w-full h-full transition-all duration-500 ease-in-out delay-200 -translate-x-full translate-y-full bg-red-600 rounded-2xl group-hover:mb-12 group-hover:translate-x-0"></span>
                        <span class="relative w-full text-left text-white transition-colors duration-200 ease-in-out group-hover:text-white">Sign-up</span>
                        </a>
                        </li>
                        @endif
                        @endauth
                       
                    </ul>
                </div> <!-- end of navbar-collapse -->
                @endif
            </div> <!-- end of container -->
        </nav> <!-- end of navbar -->
        <!-- end of navigation -->
        <!-- Header -->
        <header id="header" class="header py-28 text-center md:pt-36 lg:text-left xl:pt-44 xl:pb-32">
            <div class="container px-4 sm:px-8 lg:grid lg:grid-cols-2 lg:gap-x-8 items-center">
                <div class="mb-16 lg:mt-32 xl:mt-40 xl:mr-12">
                    <h1 class="h1-large mb-5">Hey there, welcome to Whisper!</h1>
                    <p class="p-large mb-8"> It's your cozy corner where you can connect with friends in a private, tranquil atmosphere</p>
                    <a class="cta" href="{{ route('register') }}">
                        <span class="span">Get Started</span>
                        <span class="second">
                        <svg width="50px" height="20px" viewBox="0 0 66 43" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <g id="arrow" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <path class="one" d="M40.1543933,3.89485454 L43.9763149,0.139296592 C44.1708311,-0.0518420739 44.4826329,-0.0518571125 44.6771675,0.139262789 L65.6916134,20.7848311 C66.0855801,21.1718824 66.0911863,21.8050225 65.704135,22.1989893 C65.7000188,22.2031791 65.6958657,22.2073326 65.6916762,22.2114492 L44.677098,42.8607841 C44.4825957,43.0519059 44.1708242,43.0519358 43.9762853,42.8608513 L40.1545186,39.1069479 C39.9575152,38.9134427 39.9546793,38.5968729 40.1481845,38.3998695 C40.1502893,38.3977268 40.1524132,38.395603 40.1545562,38.3934985 L56.9937789,21.8567812 C57.1908028,21.6632968 57.193672,21.3467273 57.0001876,21.1497035 C56.9980647,21.1475418 56.9959223,21.1453995 56.9937605,21.1432767 L40.1545208,4.60825197 C39.9574869,4.41477773 39.9546013,4.09820839 40.1480756,3.90117456 C40.1501626,3.89904911 40.1522686,3.89694235 40.1543933,3.89485454 Z" fill="#FFFFFF"></path>
                            <path class="two" d="M20.1543933,3.89485454 L23.9763149,0.139296592 C24.1708311,-0.0518420739 24.4826329,-0.0518571125 24.6771675,0.139262789 L45.6916134,20.7848311 C46.0855801,21.1718824 46.0911863,21.8050225 45.704135,22.1989893 C45.7000188,22.2031791 45.6958657,22.2073326 45.6916762,22.2114492 L24.677098,42.8607841 C24.4825957,43.0519059 24.1708242,43.0519358 23.9762853,42.8608513 L20.1545186,39.1069479 C19.9575152,38.9134427 19.9546793,38.5968729 20.1481845,38.3998695 C20.1502893,38.3977268 20.1524132,38.395603 20.1545562,38.3934985 L36.9937789,21.8567812 C37.1908028,21.6632968 37.193672,21.3467273 37.0001876,21.1497035 C36.9980647,21.1475418 36.9959223,21.1453995 36.9937605,21.1432767 L20.1545208,4.60825197 C19.9574869,4.41477773 19.9546013,4.09820839 20.1480756,3.90117456 C20.1501626,3.89904911 20.1522686,3.89694235 20.1543933,3.89485454 Z" fill="#FFFFFF"></path>
                            <path class="three" d="M0.154393339,3.89485454 L3.97631488,0.139296592 C4.17083111,-0.0518420739 4.48263286,-0.0518571125 4.67716753,0.139262789 L25.6916134,20.7848311 C26.0855801,21.1718824 26.0911863,21.8050225 25.704135,22.1989893 C25.7000188,22.2031791 25.6958657,22.2073326 25.6916762,22.2114492 L4.67709797,42.8607841 C4.48259567,43.0519059 4.17082418,43.0519358 3.97628526,42.8608513 L0.154518591,39.1069479 C-0.0424848215,38.9134427 -0.0453206733,38.5968729 0.148184538,38.3998695 C0.150289256,38.3977268 0.152413239,38.395603 0.154556228,38.3934985 L16.9937789,21.8567812 C17.1908028,21.6632968 17.193672,21.3467273 17.0001876,21.1497035 C16.9980647,21.1475418 16.9959223,21.1453995 16.9937605,21.1432767 L0.15452076,4.60825197 C-0.0425130651,4.41477773 -0.0453986756,4.09820839 0.148075568,3.90117456 C0.150162624,3.89904911 0.152268631,3.89694235 0.154393339,3.89485454 Z" fill="#FFFFFF"></path>
                            </g>
                        </svg>
                        </span> 
                    </a>
                </div>
                <div class="xl:text-right ">
                    <img class="inline" src="{{ asset('images/ooo.png') }}" alt="alternative" />
                </div>
            </div> <!-- end of container -->
        </header> <!-- end of header {{ asset('images/ooo.png') }} -->
        <!-- end of header -->


        <!-- Introduction -->
        <div class="pt-4 pb-14 text-center">
            <div class="container px-4 sm:px-8 xl:px-4">
                <p class="mb-4 text-gray-800 text-3xl leading-10 lg:max-w-5xl lg:mx-auto"> Think of it as your personal sanctuary, akin to Messenger, where you can chat and unwind. Feel free to explore and make it your own</p>
            </div> <!-- end of container -->
        </div>
        <!-- end of introduction -->


        <!-- Features -->
        <div id="features" class="cards-1">
            <div class="container px-4 sm:px-8 xl:px-4">

                <!-- Card -->
                <div class="card">
                    <div class="card-image">
                        <img src="images/features-icon-1.svg" alt="alternative" />
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Platform Integration</h5>
                        <p class="mb-4">You sales force can use the app on any smartphone platform without compatibility issues</p>
                    </div>
                </div>
                <!-- end of card -->

                <!-- Card -->
                <div class="card">
                    <div class="card-image">
                        <img src="images/features-icon-2.svg" alt="alternative" />
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Easy On Resources</h5>
                        <p class="mb-4">Works smoothly even on older generation hardware due to our optimization efforts</p>
                    </div>
                </div>
                <!-- end of card -->

                <!-- Card -->
                <div class="card">
                    <div class="card-image">
                        <img src="images/features-icon-3.svg" alt="alternative" />
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Great Performance</h5>
                        <p class="mb-4">Optimized code and innovative technology insure no delays and ultra-fast responsiveness</p>
                    </div>
                </div>
                <!-- end of card -->

                <!-- Card -->
                <div class="card">
                    <div class="card-image">
                        <img src="images/features-icon-4.svg" alt="alternative" />
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Multiple Languages</h5>
                        <p class="mb-4">Choose from one of the 40 languages that come pre-installed and start selling smarter</p>
                    </div>
                </div>
                <!-- end of card -->

                <!-- Card -->
                <div class="card">
                    <div class="card-image">
                        <img src="images/features-icon-5.svg" alt="alternative" />
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Free Updates</h5>
                        <p class="mb-4">Don't worry about future costs, pay once and receive all future updates at no extra cost</p>
                    </div>
                </div>
                <!-- end of card -->

                <!-- Card -->
                <div class="card">
                    <div class="card-image">
                        <img src="images/features-icon-6.svg" alt="alternative" />
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Community Support</h5>
                        <p class="mb-4">Register the app and get acces to knowledge and ideas from the Pavo online community</p>
                    </div>
                </div>
                <!-- end of card -->

            </div> <!-- end of container -->
        </div> <!-- end of cards-1 -->
        <!-- end of features -->


        <!-- Details 1 -->
        <div id="details" class="pt-12 pb-16 lg:pt-16">
            <div class="container px-4 sm:px-8 lg:grid lg:grid-cols-12 lg:gap-x-12 items-center">
                <div class="lg:col-span-5">
                    <div class="mb-16 lg:mb-0 xl:mt-16">
                        <h2 class="mb-6">Results driven ground breaking technology</h2>
                        <p class="mb-4">Based on our team's extensive experience in developing line of business applications and constructive customer feedback we reached a new level of revenue.</p>
                        <p class="mb-4">We enjoy helping small and medium sized tech businesses take a shot at established  </p>
                    </div>
                </div> <!-- end of col -->
                <div class="lg:col-span-7">
                    <div class="xl:ml-14">
                        <img class="inline shadow-2xl" src="images/e-mail-global-communications-connection-social-networking-concept.jpg" alt="alternative" />
                    </div>
                </div> <!-- end of col -->
            </div> <!-- end of container -->
        </div>
        <!-- end of details 1 -->


        
        <!-- Lightbox -->
        <div id="details-lightbox" class="lightbox-basic zoom-anim-dialog mfp-hide">
            <div class="lg:grid lg:grid-cols-12 lg:gap-x-8">
                <button title="Close (Esc)" type="button" class="mfp-close x-button">×</button>
                <div class="lg:col-span-8">
                    <div class="mb-12 text-center lg:mb-0 lg:text-left xl:mr-6">
                        <img class="inline rounded-lg" src="images/details-lightbox.jpg" alt="alternative" />
                    </div>
                </div> <!-- end of col -->
                <div class="lg:col-span-4">
                    <h3 class="mb-2">Goals Setting</h3>
                    <hr class="w-11 h-0.5 mt-0.5 mb-4 ml-0 border-none bg-indigo-600" />
                    <p>The app can easily help you track your personal development evolution if you take the time to set it up.</p>
                    <h4 class="mt-7 mb-2.5">User Feedback</h4>
                    <p class="mb-4">This is a great app which can help you save time and make your live easier. And it will help improve your productivity.</p>
                    <ul class="list mb-6 space-y-2">
                        <li class="flex">
                            <i class="fas fa-chevron-right"></i>
                            <div>Splash screen panel</div>
                        </li>
                        <li class="flex">
                            <i class="fas fa-chevron-right"></i>
                            <div>Statistics graph report</div>
                        </li>
                        <li class="flex">
                            <i class="fas fa-chevron-right"></i>
                            <div>Events calendar layout</div>
                        </li>
                        <li class="flex">
                            <i class="fas fa-chevron-right"></i>
                            <div>Location details screen</div>
                        </li>
                        <li class="flex">
                            <i class="fas fa-chevron-right"></i>
                            <div>Onboarding steps interface</div>
                        </li>
                    </ul>
                    <a class="btn-solid-reg mfp-close page-scroll" href="{{ route('register') }}">LogIn</a>
                    <button class="btn-outline-reg mfp-close as-button" type="button">Back</button>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of lightbox-basic -->
        <!-- end of lightbox -->
        <!-- end of details lightbox -->


        


        <!-- Statistics -->
        <div class="counter">
            <div class="container px-4 sm:px-8">
                
                <!-- Counter -->
                <div id="counter">
                    <div class="cell">
                        <div class="counter-value number-count" data-count="231">1</div>
                        <p class="counter-info">Happy Users</p>
                    </div>
                    <div class="cell">
                        <div class="counter-value number-count" data-count="385">1</div>
                        <p class="counter-info">Issues Solved</p>
                    </div>
                    <div class="cell">
                        <div class="counter-value number-count" data-count="159">1</div>
                        <p class="counter-info">Good Reviews</p>
                    </div>
                    <div class="cell">
                        <div class="counter-value number-count" data-count="127">1</div>
                        <p class="counter-info">Case Studies</p>
                    </div>
                    <div class="cell">
                        <div class="counter-value number-count" data-count="211">1</div>
                        <p class="counter-info">Orders Received</p>
                    </div>
                </div>
                <!-- end of counter -->

            </div> <!-- end of container -->
        </div> <!-- end of counter -->
        <!-- end of statistics -->


        <!-- Testimonials -->
        <div class="slider-1 py-32 bg-gray">
            <div class="container px-4 sm:px-8">
                <h2 class="mb-12 text-center lg:max-w-xl lg:mx-auto">What do users think about Pavo</h2>

                <!-- Card Slider -->
                <div class="slider-container">
                    <div class="swiper-container card-slider">
                        <div class="swiper-wrapper">
                            
                            <!-- Slide -->
                            <div class="swiper-slide">
                                <div class="card">
                                    <img class="card-image" src="images/testimonial-1.jpg" alt="alternative" />
                                    <div class="card-body">
                                        <p class="italic mb-3">It's been so fun to work with Pavo, I've managed to integrate it properly into my business flow and it's great</p>
                                        <p class="testimonial-author">Jude Thorn - Designer</p>
                                    </div>
                                </div>
                            </div> <!-- end of swiper-slide -->
                            <!-- end of slide -->

                            <!-- Slide -->
                            <div class="swiper-slide">
                                <div class="card">
                                    <img class="card-image" src="images/testimonial-2.jpg" alt="alternative" />
                                    <div class="card-body">
                                        <p class="italic mb-3">We were so focused on launching as many campaigns as possible that we've forgotten to target our loyal customers</p>
                                        <p class="testimonial-author">Roy Smith - Developer</p>
                                    </div>
                                </div>
                            </div> <!-- end of swiper-slide -->
                            <!-- end of slide -->

                            <!-- Slide -->
                            <div class="swiper-slide">
                                <div class="card">
                                    <img class="card-image" src="images/testimonial-3.jpg" alt="alternative" />
                                    <div class="card-body">
                                        <p class="italic mb-3">I've been searching for a tool like Pavo for so long. I love the reports it generates and the amazing high accuracy</p>
                                        <p class="testimonial-author">Marsha Singer - Marketer</p>
                                    </div>
                                </div>
                            </div> <!-- end of swiper-slide -->
                            <!-- end of slide -->

                            <!-- Slide -->
                            <div class="swiper-slide">
                                <div class="card">
                                    <img class="card-image" src="images/testimonial-4.jpg" alt="alternative" />
                                    <div class="card-body">
                                        <p class="italic mb-3">We've been waiting for a powerful piece of software that can help businesses manage their marketing projects</p>
                                        <p class="testimonial-author">Tim Shaw - Designer</p>
                                    </div>
                                </div>
                            </div> <!-- end of swiper-slide -->
                            <!-- end of slide -->

                            <!-- Slide -->
                            <div class="swiper-slide">
                                <div class="card">
                                    <img class="card-image" src="images/testimonial-5.jpg" alt="alternative" />
                                    <div class="card-body">
                                        <p class="italic mb-3">Searching for a great prototyping and layout design app was difficult but thankfully I found app suite quickly</p>
                                        <p class="testimonial-author">Lindsay Spice - Marketer</p>
                                    </div>
                                </div>
                            </div> <!-- end of swiper-slide -->
                            <!-- end of slide -->

                            <!-- Slide -->
                            <div class="swiper-slide">
                                <div class="card">
                                    <img class="card-image" src="images/testimonial-6.jpg" alt="alternative" />
                                    <div class="card-body">
                                        <p class="italic mb-3">The app support team is amazing. They've helped me with some issues and I am so grateful to the entire team</p>
                                        <p class="testimonial-author">Ann Blake - Developer</p>
                                    </div>
                                </div>
                            </div> <!-- end of swiper-slide -->
                            <!-- end of slide -->

                        </div> <!-- end of swiper-wrapper -->

                        <!-- Add Arrows -->
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                        <!-- end of add arrows -->

                    </div> <!-- end of swiper-container -->
                </div> <!-- end of slider-container -->
                <!-- end of card slider -->

            </div> <!-- end of container -->
        </div> <!-- end of slider-1 -->
        <!-- end of testimonials -->


       


        <!-- Conclusion -->
        <div id="download" class="basic-5">
            <div class="container px-4 sm:px-8 lg:grid lg:grid-cols-2">
                <div class="mb-16 lg:mb-0">
                    <img src="images/conclusion-smartphone.png" alt="alternative" />
                </div>
                <div class="lg:mt-24 xl:mt-44 xl:ml-12">
                    <p class="mb-9 text-gray-800 text-3xl leading-10">Team management mobile applications don’t get much better than Pavo. Download it today</p>
                    <a class="btn-solid-lg" href="{{ route('register') }}">Sign-Up</a>
                </div>
            </div> <!-- end of container -->
        </div> <!-- end of basic-5 -->
        <!-- end of conclusion -->


        


        <!-- Copyright -->
        <div class="copyright">
            <div class="container px-4 sm:px-8 lg:grid lg:grid-cols-3">
                <ul class="mb-4 list-unstyled p-small">
                    <li class="mb-2"><a href="#">Article Details</a></li>
                    <li class="mb-2"><a href="#">Terms & Conditions</a></li>
                    <li class="mb-2"><a href="#">Privacy Policy</a></li>
                </ul>
                <p class="pb-2 p-small statement">Copyright © <a href="#your-link" class="no-underline">NIGHTCROWLER</a></p>

                <p class="pb-2 p-small statement">Distributed by :<a href="https://themewagon.com/" class="no-underline">Themewagon</a></p>
            </div> 

        <!-- end of container -->
        </div> <!-- end of copyright -->
        <!-- end of copyright -->


        <!-- Scripts -->
        <script src="resources/js/jquery.min.js"></script> <!-- jQuery for JavaScript plugins -->
        <script src="resources/js/jquery.easing.min.js"></script> <!-- jQuery Easing for smooth scrolling between anchors -->
        <script src="resources/js/swiper.min.js"></script> <!-- Swiper for image and text sliders -->
        <script src="resources/js/jquery.magnific-popup.js"></script> <!-- Magnific Popup for lightboxes -->
        <script src="resources/js/scripts.js"></script> <!-- Custom scripts -->
    </body>
</html>
