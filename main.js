// Faq Section Effect
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

// Toggle Mobile Nav
const mobileNav = document.querySelector('.navbar');
const toggleChange = document.querySelector('.navbar-toggler');

toggleChange.addEventListener('click', () => {
    toggleChange.classList.toggle('change');
    mobileNav.classList.toggle('mobile-nav');
});
