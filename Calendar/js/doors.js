// GLOBAL VARIABLES
let door = document.querySelectorAll('.door');
let firstInside = document.getElementById('inside-one');
let firstPopup = document.getElementById('first-popup');
let secondInside = document.getElementById('inside-two');
let secondPopup = document.getElementById('second-popup');
let thirdInside = document.getElementById('inside-three');
let thirdPopup = document.getElementById('third-popup');
let fourthInside = document.getElementById('inside-four');
let fourthPopup = document.getElementById('fourth-popup');
let exit = document.querySelectorAll('.exit');

// Function that loops through all doors and opens the clicked one
doorOpener = () => {
    door.forEach( (doors) => {
        doors.addEventListener('click', function(){
            doors.classList.toggle('open');
        });
    });
}

// Function for toggling modal class
modalToggle = () => {
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
}

// Close function for looping through all exits and adding an EventListener to them
close = () => {
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
}

// Constructor function that holds every other function
constructor = () => {
    // 1. Open the doors
    doorOpener();
    // 2. Open the modals
    modalToggle();
    // 3. Close the open modal and the open doors
    close();
}

// Calling the constructor function
constructor();