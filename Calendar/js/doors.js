// GLOBAL VARIABLES
var door = document.querySelectorAll('.door');

var firstInside = document.getElementById('inside-one');
var firstPopup = document.getElementById('first-popup');
var secondInside = document.getElementById('inside-two');
var secondPopup = document.getElementById('second-popup');
var thirdInside = document.getElementById('inside-three');
var thirdPopup = document.getElementById('third-popup');
var fourthInside = document.getElementById('inside-four');
var fourthPopup = document.getElementById('fourth-popup');

var exit = document.querySelectorAll('.exit');

// Looping through all doors and adding an EventListener to them
door.forEach( (doors) => {
    doors.addEventListener('click', function(){
        doors.classList.toggle('open');
    });
});

    firstInside.addEventListener('click', () => {
        firstPopup.classList.toggle('modal');
    });

    secondInside.addEventListener('click', () => {
        secondPopup.classList.toggle('modal');
    });

    thirdInside.addEventListener('click', () => {
        thirdPopup.classList.toggle('modal');
    });

    fourthInside.addEventListener('click', () => {
        fourthPopup.classList.toggle('modal');
    });

// Looping through all exits and adding an EventListener to them
exit.forEach( (exits) => {
    exits.addEventListener('click', function() {
        firstPopup.classList.remove('modal');
        secondPopup.classList.remove('modal');
        thirdPopup.classList.remove('modal');
        fourthPopup.classList.remove('modal');
        door.forEach( (doors) => {
            doors.classList.remove('open');
        });
    });
});