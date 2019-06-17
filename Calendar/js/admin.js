let button = document.querySelector('.opret-click');
let signIn = document.querySelector('.login');
let signUp = document.querySelector('.create');

button.addEventListener('click', () => {
    signIn.style.display = 'none';
    signUp.style.display = 'block';
});