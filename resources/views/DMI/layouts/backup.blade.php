<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/logo.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    {{-- Owl Carousel CSS --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
        crossorigin="anonymous" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
        integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw=="
        crossorigin="anonymous" />

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- AOS --}}
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    {{-- Custom CSS --}}
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/global.css') }}">


    @yield('css')

</head>

<body>

    @include('DMI.layouts.partials.navbar')
    <div>
        @yield('content')
    </div>
    @include('DMI.layouts.partials.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>

    {{-- Fontawesome JS --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js"
        integrity="sha512-naukR7I+Nk6gp7p5TMA4ycgfxaZBJ7MO5iC3Fp6ySQyKFHOGfpkSZkYVWV5R7u7cfAicxanwYQ5D1e17EfJcMA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    {{-- AOS JS --}}
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>

    <!--Jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous"></script>
    <!-- Owl Carousel -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

    @yield('scripts')

    {{-- pagination plugin --}}
    <script src="{{ asset('plugins/pagination-search/flexible.pagination.js') }}"></script>

    <!-- custom JS code after importing jquery and owl -->
    <script type="text/javascript">
        $(document).ready(function() {
            $("#owl-brand").owlCarousel();
        });

        $('#owl-brand').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            responsive: {
                0: {
                    items: 4
                },
                600: {
                    items: 6
                },
                1000: {
                    items: 7
                }
            }
        })
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            if ($('.bbb_slider').length) {
                var trendsSlider = $('.bbb_slider');
                trendsSlider.owlCarousel({
                    loop: true,
                    margin: 30,
                    nav: false,
                    dots: false,
                    autoplayHoverPause: true,
                    autoplay: false,
                    responsive: {
                        0: {
                            items: 1
                        },
                        575: {
                            items: 2
                        },
                        991: {
                            items: 4
                        }
                    }
                });

                if ($('.bbb_next').length) {
                    var next = $('.bbb_next');
                    next.on('click', function() {
                        trendsSlider.trigger('next.owl.carousel');
                    });
                }

                if ($('.bbb_prev').length) {
                    var prev = $('.bbb_prev');
                    prev.on('click', function() {
                        trendsSlider.trigger('prev.owl.carousel');
                    });
                }
            }
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            if ($('.ft_slider').length) {
                var ftSlider = $('.ft_slider');
                ftSlider.owlCarousel({
                    loop: true,
                    margin: 30,
                    nav: false,
                    dots: false,
                    autoplayHoverPause: true,
                    autoplay: false,
                    responsive: {
                        0: {
                            items: 2
                        },
                        575: {
                            items: 2
                        },
                        991: {
                            items: 5
                        }
                    }
                });

                if ($('.ft_next').length) {
                    var next = $('.ft_next');
                    next.on('click', function() {
                        ftSlider.trigger('next.owl.carousel');
                    });
                }

                if ($('.ft_prev').length) {
                    var prev = $('.ft_prev');
                    prev.on('click', function() {
                        ftSlider.trigger('prev.owl.carousel');
                    });
                }
            }
        });
    </script>

    <script>
        const items = document.querySelectorAll('.accordion button');

        function toggleAccordion() {
            const itemToggle = this.getAttribute('aria-expanded');

            for (i = 0; i < items.length; i++) {
                items[i].setAttribute('aria-expanded', 'false');
            }

            if (itemToggle == 'false') {
                this.setAttribute('aria-expanded', 'true');
            }
        }

        items.forEach((item) => item.addEventListener('click', toggleAccordion));
    </script>
</body>

</html>
