let btn = document.querySelector('.upload');
let menu = document.querySelector('.offset');
let close = document.querySelector('.close');

btn.addEventListener('click', () => {
    menu.classList.toggle('offset-visible');
});

close.addEventListener('click', () => {
    menu.classList.toggle('offset-visible');
});
