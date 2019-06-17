let btn = document.querySelector('.upload');
let menu = document.querySelector('.offset');
let close = document.querySelector('.close');

// Function for displaying/hiding the upload form
uploadToggle = () => {
    btn.addEventListener('click', () => {
        menu.classList.toggle('offset-visible');
    });
    
    close.addEventListener('click', () => {
        menu.classList.toggle('offset-visible');
    });
}

uploadToggle();
