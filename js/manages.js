
// displays file extension after image is chosen
const fileAdded = document.querySelector('.file-added');
const btn = document.querySelector('#image_url');

btn.addEventListener('change', () => {
    if (btn.value) {
        fileAdded.innerHTML = btn.value.match(/[\/\\]([\w\d\s\.\-\(\)]+)$/)[1];
    }
    else {
        fileAdded.innerHTML = 'No file chosen yet';
    }
})

// pull from api for specific winery
const urlParams = new URLSearchParams(window.location.search);
const wineryName = urlParams.get('winery_name');
var winesContainer = document.querySelector('.wines-container');

getWines();
// getWinery();

// trying to get wines that belong to specific winery
function getWines() {
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

            // console.log(obj);
            loadWines(obj);
        }

    });
}

// pull data from wineries
function getWinery() {
    var req = new XMLHttpRequest();

    const body = {
        "type":"get_wineries",
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
            addWineryInfo(obj)
            // console.log(obj);
        }

    });
}

// using data from wineries
function addWineryInfo(obj) {

    console.log(obj);

    let data = obj.data;
    // $("#winery-name").html(data.name);
    // $("#rating").html(data.rating);
    // document.querySelector('#winery-name').innerHTML = data.name;
    // document.querySelector('#rating').innerHTML = data.rating;
}


function populateWinery(obj) {

    let data = obj.data;
    
    // calculations: count no. of wines in winery and number of reviews
    // $("#num-wines").html();
    // $("#num-reviews").html();

    for (var i in obj.data) {
        loadWines(obj);
    }

}

function loadWines(obj) {
    var loop = 0;
    var string = '';
    var index = 0;

    for(var i in obj.data) {
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
        var winery = obj.data[i].winery_name;

        var html = `
        <div class="wine-col" id="wine${i}">
            <img class="image" src="${image}" alt="${name} ${grape_varieties}">
            <div class="overlay">
                <h3 class="grape"> ${winery} ${grape_varieties}</h3>
                <p class="wine-name"> ${name}</p>
                <p class="year"> ${year}</p>
            </div>
        </div> `;

        string += html;
        
        loop++;
        if (loop == 3 || i == obj.data.length - 1) {
            var newRow = document.createElement('div');
            newRow.className = "row";

            newRow.insertAdjacentHTML("afterbegin", string);
            winesContainer.appendChild(newRow);
            string = '';
            loop = 0;
        }

    }

    for(var i in obj.data) {
        let wine_id = obj.data[i].wine_id;
        
        document.getElementById(`wine${i}`).addEventListener('click', function(){
            window.location.href = `product.php?wine_id=${wine_id}`;
        })
    }
}


async function addWine() {
    let headersList = {
        "Content-Type": "application/json"
    }

    let bodyContent = JSON.stringify({
        "type": "add_wine",
        "name": $("#name").val(),
        "year": $("#year").val(),
        "description": $("#description").val(),
        "food_pairing": $("#food_pairing").val(),
        // Dummy link, image would be put on some storage server and the link retrieved and put here
        "image_url": "https://t2.gstatic.com/images?q=tbn:ANd9GcSZIKJkYYh03df8VeBZQICg_i3gtFkbePFcRr-7yS7b5LwlWjq-", 
        "type_id": $("#type").prop("selectedIndex")
    });

    console.log(bodyContent)

    await fetch("http://localhost/PA5-221-Repo/api.php", { 
        method: "POST",
        body: bodyContent,
        headers: headersList
    });

    closePopup();
    
    window.location.reload();
}