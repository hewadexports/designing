// GSAP Animation For Bottom Cards
var bottomCard = gsap.timeline({
  scrollTrigger: {
    trigger: ".events-area",
    start: "top 70%",
    end: "bottom 20%",
    toggleActions: "play reverse play reverse",
    markers: false,
  },
});

bottomCard.from(".single-event", {
  duration: 0.5,
  autoAlpha: 0,
  y: "10%",
  stagger: 0.15,
});

// Toggle Mobile Nav
const mobileNav = document.querySelector(".navbar");
const toggleChange = document.querySelector(".navbar-toggler");

toggleChange.addEventListener("click", () => {
  toggleChange.classList.toggle("change");
  mobileNav.classList.toggle("mobile-nav");
});

// Picks Swiper Slider Options
const swiper3 = new Swiper(".picks-swiper", {
  slidesPerView: 5,
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  autoplay: {
    delay: 5000,
    disableOnInteraction: false,
  },
  loop: true,
  speed: 700,
  spaceBetween: 30,
  breakpoints: {
    100: {
      slidesPerView: 1,
    },
    650: {
      slidesPerView: 2,
    },
    991: {
      slidesPerView: 3,
    },
    1350: {
      slidesPerView: 4,
    },
  },
});

// Product Swiper Slider Options
const swiper2 = new Swiper(".product-swiper", {
  slidesPerView: 5,
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  autoplay: {
    delay: 5000,
    disableOnInteraction: false,
  },
  loop: true,
  speed: 700,
  spaceBetween: 30,
  breakpoints: {
    100: {
      slidesPerView: 1,
    },
    650: {
      slidesPerView: 2,
    },
    991: {
      slidesPerView: 3,
    },
    1350: {
      slidesPerView: 4,
    },
  },
});

// Banner Swiper Slider Options
const swiper1 = new Swiper(".banner-swiper", {
  slidesPerView: 1,
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  autoplay: {
    delay: 5000,
    disableOnInteraction: false,
  },
  loop: true,
  speed: 700,
  spaceBetween: 20,
});

// Smooth Scroll Effect
const links = document.querySelectorAll(".showcase a");

for (const link of links) {
  link.addEventListener("click", clickHandler);
}

link.addEventListener("click", clickHandler);

function clickHandler(e) {
  const href = this.getAttribute("href");
  const offsetTop = document.querySelector(href).offsetTop;

  scroll({
    top: offsetTop,
    behavior: "smooth",
  });
}
