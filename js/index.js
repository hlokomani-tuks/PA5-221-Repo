
function dropdown() {
    const selected = document.querySelector('.selected');
    const optionsContainer = document.querySelector('.options-container');

    const optionsList = document.querySelectorAll('.option');

    selected.addEventListener('click', () => {
        optionsContainer.classList.toggle("active");
    });

    optionsList.forEach(o => {
        o.addEventListener('click', () => {
            selected.innerHTML = o.querySelector('label').innerHTML;
            o.querySelector("input").checked = true;
            optionsContainer.classList.remove('active');
        });
    });
}

function dropdown1() {
    const selected = document.querySelector('.selected1');
    const optionsContainer = document.querySelector('.options-container1');

    const optionsList = document.querySelectorAll('.option1');

    selected.addEventListener('click', () => {
        optionsContainer.classList.toggle("active");
    });

    optionsList.forEach(o => {
        o.addEventListener('click', () => {
            selected.innerHTML = o.querySelector('label').innerHTML;
            o.querySelector("input").checked = true;
            optionsContainer.classList.remove('active');
        });
    });
}
function dropdown2() {
    const selected = document.querySelector('.selected2');
    const optionsContainer = document.querySelector('.options-container2');

    const optionsList = document.querySelectorAll('.option2');

    selected.addEventListener('click', () => {
        optionsContainer.classList.toggle("active");
    });

    optionsList.forEach(o => {
        o.addEventListener('click', () => {
            selected.innerHTML = o.querySelector('label').innerHTML;
            o.querySelector("input").checked = true;
            optionsContainer.classList.remove('active');
        });
    });
}
function dropdown3() {
    const selected = document.querySelector('.selected3');
    const optionsContainer = document.querySelector('.options-container3');

    const optionsList = document.querySelectorAll('.option3');

    selected.addEventListener('click', () => {
        optionsContainer.classList.toggle("active");
    });

    optionsList.forEach(o => {
        o.addEventListener('click', () => {
            selected.innerHTML = o.querySelector('label').innerHTML;
            o.querySelector("input").checked = true;
            optionsContainer.classList.remove('active');
        });
    });
}
function dropdown4() {
    const selected = document.querySelector('.selected4');
    const optionsContainer = document.querySelector('.options-container4');

    const optionsList = document.querySelectorAll('.option4');

    selected.addEventListener('click', () => {
        optionsContainer.classList.toggle("active");
    });

    optionsList.forEach(o => {
        o.addEventListener('click', () => {
            selected.innerHTML = o.querySelector('label').innerHTML;
            o.querySelector("input").checked = true;
            optionsContainer.classList.remove('active');
        });
    });
}

function pageSetup() {
    
}