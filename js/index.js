
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

var req = new XMLHttpRequest();

const body = {
    "type":"get_wines"
};

var toSend = JSON.stringify(body);

req.open('POST', 'https://localhost/PA5-2121-Repo', true);

req.send(toSend);

req.addEventListener('load', function(){

    if(req.status === 200 && req.readyState === 4){
        var obj = JSON.parse(req.responseText);
        createWineBoxes(obj);
    }

});

function createWineBoxes(obj){
    for(var i = 0; i < 9; i++){
        var wine_id = obj.data[i].wine_id;
        var name = obj.data[i].name;
        var year = obj.data[i].year;
        var descr = obj.data[i].description;
        var foodpair = obj.data[i].food_pairing;
        var image = obj.data[i].image_url;
        var user_rating = obj.data[i].user_rating;
        var user_rating_count = obj.data[i].user_rating_count;
        var critic_rating = obj.data[i].critic_rating;
        var critic_rating_count = obj.data[i].critic_rating_count;
        var grape_varieties = obj.data[i].grape_varieties;
        var colour = obj.data[i].colour;
        //

        var box = document.createElement("div");
        box.id = wine_id;

        var bName = document.createElement("h3");
        bName.textContent = name;

        var grapeV = document.createElement("h4");
        grapeV.textContent = grape_varieties;

        box.appendChild(bName);
        box.appendChild(grapeV);

        document.getElementById("wine-container").appendChild(box);
    }
}