const urlParams = new URLSearchParams(window.location.search);
const wineID = urlParams.get('wine_id');


var req = new XMLHttpRequest();

const body = {
    "type":"get_wines",
    "wine_id":wineID,
    "sort_by":null,
    "sort_in":null
};

var toSend = JSON.stringify(body);

req.open('POST', 'http://localhost/PA5-221-Repo/api.php', true);

req.send(toSend);

req.addEventListener('load', function(){

    if(req.status === 200 && req.readyState == 4){
        
        var obj = JSON.parse(req.responseText);
        populatePager(obj);
        
    }

});

function populatePager(obj){
    console.log(obj);

    var i = 0;
    var wine_id = obj.wine_id;
    var name = obj.data.name;
    var year = obj.data.year;
    var descr = obj.data.description;
    var foodpair = obj.data.food_pairing;
    var image = obj.data.image_url;
    var user_rating = obj.data.user_rating;
    var user_rating_count = obj.data.user_rating_count;
    var critic_rating = obj.data.critic_rating;
    var critic_rating_count = obj.data.critic_rating_count;
    var grape_varieties = obj.data.grape_varieties;
    var colour = obj.data.colour;   
    var winery = obj.data.winery_name;   
    var sweetness = obj.data.sweetness;
    var tannin = obj.data.tannin;
    var farm = obj.data.farm;
    var country = obj.data.country;
    var province = obj.data.province;

    console.log(name);
    console.log(year);


    var wineBrand = document.querySelector('.wine-brand');
    var wineRegion = document.querySelector('.region');
    var wineYear = document.querySelector('.year');
    var wineSweetness = document.querySelector('.sweetness');
    var wineTannin = document.querySelector('.tannin');
    var wineFoodPairing = document.querySelector('.food-pairing');
    var wineFarm = document.querySelector('.farm');
    var wineDescription = document.querySelector('.description');
    var img = document.querySelector('img');

    wineYear.innerHTML = year;
    wineRegion.innerHTML = country + ", " + province;
    wineSweetness.innerHTML = sweetness;
    wineTannin.innerHTML = tannin;
    wineFoodPairing.innerHTML = foodpair;
    wineFarm.innerHTML = farm;
    wineBrand.innerHTML = winery + " " + grape_varieties;
    wineDescription.innerHTML = descr;
    img.src = image;
}