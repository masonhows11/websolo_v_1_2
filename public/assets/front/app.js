// custom scripts
function openNav() {
    //document.getElementById('mySidenav').style.display = "block";
    document.getElementById("my-side-nav").style.width = "280px";
}

function closeNav() {
    //document.getElementById('mySidenav').style.display = "none";
    document.getElementById("my-side-nav").style.width = "0";
}

const swiper_most_visited = new Swiper(".swiper-most-visited", {
    slidesPerView: 1,
    spaceBetween: 10,
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    autoplay: {
        delay: 3000,
    },
    breakpoints: {
        320: {
            slidesPerView: 1,
            spaceBetween: 20
        },
        360: {
            slidesPerView: 1,
            spaceBetween: 20
        },
        480: {
            slidesPerView: 2,
            spaceBetween: 40,
        },
        540: {
            slidesPerView: 2,
            spaceBetween: 50,
        },
        640: {
            slidesPerView: 3,
            spaceBetween: 50,
        },
        750: {
            slidesPerView: 2,
            spaceBetween: 50,
        },
        1024: {
            slidesPerView: 3,
            spaceBetween: 50,
        }
    },
});

const swiper_best_selling = new Swiper(".swiper-best-selling", {
    slidesPerView: 1,
    spaceBetween: 10,
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    autoplay: {
        delay: 3000,
    },
    breakpoints: {
        320: {
            slidesPerView: 1,
            spaceBetween: 20
        },
        360: {
            slidesPerView: 1,
            spaceBetween: 20
        },
        480: {
            slidesPerView: 2,
            spaceBetween: 40,
        },
        540: {
            slidesPerView: 2,
            spaceBetween: 50,
        },
        640: {
            slidesPerView: 3,
            spaceBetween: 50,
        },
        750: {
            slidesPerView: 2,
            spaceBetween: 50,
        },
        1024: {
            slidesPerView: 3,
            spaceBetween: 50,
        }
    },
});
