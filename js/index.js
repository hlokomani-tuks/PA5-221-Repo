
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
    "type":"get_wines",
    "wine_id":null,
    "sort_by":null,
    "sort_in":null
};

var toSend = JSON.stringify(body);

req.open('POST', 'http://localhost/PA5-221-Repo/api.php', true);

req.send(toSend);

req.addEventListener('load', function(){

    if(req.status === 200 && req.readyState == 4){
        
        var obj = JSON.parse(req.responseText);
        // createWineBoxes(obj);
        loadWines(obj);
        // console.log(obj);
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
        box.className = "box";

        var pic = document.createElement("img");
        pic.src = image;

        var bName = document.createElement("h3");
        bName.textContent = name;

        
        var grapeV = document.createElement("h4");
        grapeV.textContent = grape_varieties;

        var wYear = document.createElement("h5");
        wYear.textContent = "Year: "+year;

        box.appendChild(pic);
        box.appendChild(bName);
        box.appendChild(grapeV);
        box.appendChild(wYear);

        box.addEventListener('click', function(){
            // var xhr = new XMLHttpRequest();
            // const body ={
            //     "wine_id":this.id
            // };
            // var toSend = JSON.stringify(body);
    
            // req.open('POST', 'http://localhost/PA5-221-Repo/product.php', true);
    
            // req.send(toSend);
            
            window.location.href = 'product.php?wine_id='+wine_id;
        })

        document.getElementById("wine-container").appendChild(box);
    }

    
}

var winesContainer = document.querySelector('.wines-container');

function loadWines(obj) {
    var loop = 0;
    var string = '';
    var index = 0;

    for(var i in obj.data){
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

        var html = `
        <div class="wine-col">
            <img class="image" src="${image}" alt=${name} ${grape_varieties}>
            <div class="overlay">
                <h3 class="grape"> ${grape_varieties}</h3>
                <p class="wine-name"> ${name}</p>
                <p class="year"> ${year}</p>
            </div>
        </div> `;

        string += html;

        // adds link to each wine box
        document.addEventListener('click', function(e){
            const target = e.target.closest('.wine-col');
            if (target) {
                window.location.href = `product.php?wine_id=${this.wine_id}`;
            }
        })
        
        loop++;
        if (loop == 3) {
            var newRow = document.createElement('div');
            newRow.className = "row";

            newRow.insertAdjacentHTML("afterbegin", string);
            winesContainer.appendChild(newRow);
            string = '';
            loop = 0;
        }

    }
}


// boxes.forEach(function(box){
    
//     box.addEventListener('click', function(){
//         var xhr = new XMLHttpRequest();
//         const body ={
//             "wine_id":this.id
//         };
//         var toSend = JSON.stringify(body);

//         req.open('POST', 'http://localhost/PA5-221-Repo/product.php', true);

//         req.send(toSend);

//         window.location.href = 'product.php';
//     })
// })