$(Window).scroll(function () {
    $(".navbar-main").toggleClass("bg-white", $(Window).scrollTop() > 0);
});

$(".owl-mitra").owlCarousel({
    loop: true,
    margin: 10,
    nav: true,
    responsive: {
        0: {
            items: 1,
        },
        600: {
            items: 3,
        },
        1000: {
            items: 5,
        },
    },
});

$(".owl-visi-misi").owlCarousel({
    loop: true,
    margin: 12,
    nav: true,
    autoHeight: false,
    autoWidth: false,
    responsive: {
        0: {
            items: 1,
        },
        600: {
            items: 3,
        },
        1000: {
            items: 4,
        },
    },
});

// $(".owl-prakata").owlCarousel({
//     loop: false,
//     margin: 12,
//     nav: true,
//     autoHeight: false,
//     autoWidth: false,
//     responsive: {
//         0: {
//             items: 1,
//         },
//         600: {
//             items: 2,
//         },
//         1000: {
//             items: 4,
//         },
//     },
// });

$(".owl-featured-news").owlCarousel({
    loop: false,
    nav: false,
    autoHeight: false,
    autoWidth: true,
    responsive: {
        0: {
            items: 1,
        },
        600: {
            items: 2,
        },
        1000: {
            items: 3,
        },
    },
});

Dropzone.options.imageUpload = {
    maxFilesize: 2,
    acceptedFiles: ".jpeg,.jpg,.png,.gif",
};

$(document).ready(function () {
    $("#portofolio").DataTable({
        responsive: true,
    });
});
