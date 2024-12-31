let currentIndex = 1; // Bắt đầu từ hình thứ hai (do đã clone hình đầu tiên)
const slides = document.querySelector('.slides');
const totalImages = document.querySelectorAll('.slides img').length;

function nextSlide() {
    if (currentIndex === totalImages -7) {
        // Khi đến hình cuối cùng, chuyển về hình đầu tiên
        currentIndex = 1; 
        updateSlider();
        setTimeout(() => {
            slides.style.transition = 'transform 0.5s ease-in-out'; // Bật lại hiệu ứng chuyển tiếp
        }, 50);
    } else {
        currentIndex++;
        updateSlider();
    }
}

function prevSlide() {
    if (currentIndex === 0) {
        // Khi đến hình đầu tiên, chuyển về hình cuối cùng
        currentIndex = totalImages -7;
        updateSlider();
        setTimeout(() => {
            slides.style.transition = 'transform 0.5s ease-in-out'; // Bật lại hiệu ứng chuyển tiếp
        }, 50);
    } else {
        currentIndex--;
        updateSlider();
    }
}

function updateSlider() {
    slides.style.transform = `translateX(${-currentIndex * 100}%)`;
}