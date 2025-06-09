document.addEventListener("DOMContentLoaded", () => {
    // Animasi mobil masuk dari kiri saat halaman dimuat
    const car = document.createElement('div');
    car.classList.add('car-animation');
    document.body.appendChild(car);

    setTimeout(() => {
        car.classList.add('drive');
    }, 100);

    // Animasi masuk untuk setiap note
    document.querySelectorAll('.note').forEach((note, i) => {
        note.style.animationDelay = `${i * 0.2}s`;
        note.classList.add('slide-in');
    });

    // Tombol melompat saat di-hover
    const buttons = document.querySelectorAll('button');
    buttons.forEach(button => {
        button.addEventListener('mouseenter', () => {
            button.classList.add('jump');
        });
        button.addEventListener('mouseleave', () => {
            button.classList.remove('jump');
        });
    });
    // Efek muncul dari bawah untuk seluruh elemen utama
document.querySelectorAll('.container, .note, input, textarea, button').forEach((el, i) => {
    el.classList.add('fade-up');
    el.style.animationDelay = `${i * 0.1}s`;
    });
});
