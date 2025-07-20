import Modal from "bootstrap/js/dist/modal";
import { Tab } from "bootstrap";
import { initLayout } from "../layout.js";
import Swiper from "swiper/bundle";
// import styles bundle
import "swiper/css/bundle";
import gsap from "gsap";
import { ScrollToPlugin } from "gsap/ScrollToPlugin";

gsap.registerPlugin(ScrollToPlugin);

window.addEventListener("load", function () {
	let sectionID = getSectionId();
	activeCurrentSection(sectionID);
	if (sectionID == "company") {
		scrollToSection("#company");
	}
	if (sectionID == "facilities") {
		scrollToSection("#facilities");
	}
	if (sectionID == "story") {
		scrollToSection("#story");
	}

	if (sectionID == "teams") {
		scrollToSection("#teams");
	}
	if (sectionID == "vision") {
		scrollToSection("#vision");
	}
});

initLayout();

function pillar() {
	let swiperPillars = new Swiper(".pillarSwiper", {
		slidesPerView: 1.5,
		spaceBetween: 16,
		loop: false,
		pagination: {
			el: ".pillar .swiper-pagination",
			clickable: true,
		},
		navigation: {
			nextEl: ".pillar .swiper-button-next",
			prevEl: ".pillar .swiper-button-prev",
		},
		breakpoints: {
			768: {
				slidesPerView: 2.5,
				spaceBetween: 20,
			},
			1200: {
				slidesPerView: 4,
				spaceBetween: 30,
			},
		},
	});
}

pillar();

function whyUs() {
	let swiperWhyUs = new Swiper(".whyUsSwiper", {
		slidesPerView: 1.5,
		spaceBetween: 16,
		loop: false,
		pagination: {
			el: ".why-us .swiper-pagination",
			clickable: true,
		},
		navigation: {
			nextEl: ".why-us .swiper-button-next",
			prevEl: ".why-us .swiper-button-prev",
		},
		breakpoints: {
			768: {
				slidesPerView: 2.5,
				spaceBetween: 20,
			},
			1200: {
				slidesPerView: 4,
				spaceBetween: 30,
			},
		},
	});
}

whyUs();

function ourStory() {
	var swiper = new Swiper(".mySwiper", {
		loop: false,
		spaceBetween: 10,
		slidesPerView: 3,
		freeMode: true,
		watchSlidesProgress: true,
		slidesOffsetAfter: 100,
		breakpoints: {
			768: {
				slidesPerView: 4,
				spaceBetween: 30,
			},
			1024: {
				slidesPerView: 4,
				spaceBetween: 30,
			},
		},
	});
	var swiper2 = new Swiper(".mySwiper2", {
		loop: false,
		effect: "fade",
		spaceBetween: 10,
		navigation: {
			nextEl: ".story .swiper-button-next",
			prevEl: ".story .swiper-button-prev",
		},
		thumbs: {
			swiper: swiper,
		},
		on: {
			slideChange: function () {
				updateActiveDescription(this.activeIndex);
			},
		},
	});

	function updateActiveDescription(index) {
		const descriptions = document.querySelectorAll(
			".story__detail-item-description",
		);
		descriptions.forEach((desc, i) => {
			if (i === index) {
				desc.classList.add("active");
			} else {
				desc.classList.remove("active");
			}
		});
	}

	// Set initial active state
	updateActiveDescription(0);
}

ourStory();

function getSectionId() {
	const params = new Proxy(new URLSearchParams(window.location.search), {
		get: (searchParams, prop) => searchParams.get(prop),
	});
	let value = params.section;
	return value;
}

function scrollToSection(target) {
	gsap.to(window, { duration: 0.1, scrollTo: target });
}

function activeCurrentSection(currentSection) {
	const links = document.querySelectorAll(".navbar__menu-link");

	// Filter links that include "section=vision" in the href

	const matchingLinks = Array.from(links).filter((link) => {
		const url = new URL(link.href, window.location.origin);
		link.classList.remove("active");
		if (url.searchParams.get("section") === currentSection) {
			link.classList.add("active");
		} else {
			link.classList.remove("active");
		}
	});
}
