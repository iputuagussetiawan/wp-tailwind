import Offcanvas from "bootstrap/js/dist/offcanvas";
import { initNavigation } from "./modules/navigation.js";
import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";
import { ScrollSmoother } from "gsap/ScrollSmoother";
import lazySizes from "lazysizes";
import "lazysizes/plugins/parent-fit/ls.parent-fit";
// example importing other Bootstrap Javascript Module

gsap.registerPlugin(ScrollTrigger, ScrollSmoother);
let scroller = "";

function initLayout() {
	initNavigation();
	//initScrollSmoother()
	scrollToTop();
	footer();
}

function footer() {
	window.addEventListener("scroll", moveFooterSocialMedia);
	moveFooterSocialMedia();
}

function moveFooterSocialMedia() {
	let footerSocialMediaDesktop = document.querySelector(
		".footer__socialMedia-desktop",
	);
	let footerSocialMediaMobile = document.querySelector(
		".footer__socialMedia-mobile",
	);
	let socialMedia = document.querySelector(".social-icon");
	if (window.innerWidth < 992) {
		footerSocialMediaMobile.appendChild(socialMedia);
	} else {
		footerSocialMediaDesktop.appendChild(socialMedia);
	}
}

function initScrollSmoother() {
	// Clean up existing instances if they exist
	if (ScrollSmoother.get()) {
		ScrollSmoother.get().kill();
	}

	if (ScrollTrigger.isTouch !== 1 && window.innerWidth > 1200) {
		// Initialize ScrollSmoother
		ScrollSmoother.create({
			smooth: 1, // how long (in seconds) it takes to "catch up" to the native scroll position
			effects: true, // looks for data-speed and data-lag attributes on elements
		});
	}
}

function scrollToTop() {
	let floatingButtonScrollTopElm = document.querySelector(
		".floating-button__scrollTop",
	);
	floatingButtonScrollTopElm.addEventListener("click", (event) => {
		event.preventDefault();
		window.scrollTo({
			top: 0,
			behavior: "smooth",
		});
	});
}

export { initLayout };
