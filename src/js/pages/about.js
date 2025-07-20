import Swiper from "swiper/bundle";
// import styles bundle
import "swiper/css/bundle";

window.addEventListener("load", function () {
	let swiper = new Swiper(".mySwiper", {
		slidesPerView: 1,
		spaceBetween: 30,
		pagination: {
			el: ".swiper-pagination",
			clickable: true,
		},
		breakpoints: {
			768: {
				slidesPerView: 2,
				spaceBetween: 40,
			},
		}
    });
});
