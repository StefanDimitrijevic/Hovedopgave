var door = document.querySelectorAll('.door');
var inside = document.querySelectorAll('.inside');
var popup = document.querySelector('.popup');
var exit = document.querySelectorAll('.exit');

door.forEach( (item) => {
    item.addEventListener('click', function(){
        item.classList.toggle('open');
    });
});

inside.forEach( (insides) => {
    insides.addEventListener('click', function(){
        popup.classList.toggle('modal');
    });
});

exit.forEach( (exits) => {
    exits.addEventListener('click', function() {
        popup.classList.toggle('modal');
        door.forEach( (doors) => {
            doors.classList.remove('open');
        });
    });
});