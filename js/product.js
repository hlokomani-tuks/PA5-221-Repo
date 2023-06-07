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

//Populating reviews for each wine

var req2= new XMLHttpRequest();

const body2 = {
    "type":"get_reviews",
    "wine_id":wineID
}

var toSend2 = JSON.stringify(body2);

req2.open('POST', 'http://localhost/PA5-221-Repo/api.php', true);

req2.send(toSend2);

req2.addEventListener('load', function(){

    if(req2.status === 200 && req2.readyState == 4){
        
        var obj = JSON.parse(req2.responseText);
        populateReviews(obj);
        
    }else{
        var text = document.createElement("h3");
        text.textContent = "There are currently no reviews for this wine";
        document.getElementById("review-section").appendChild(text);
    }

});

function populatePager(obj){
    let data = obj.data;
    
    $("#wine-image").attr("src", data.image_url);
    $("#year-data").html(data.year);
    $("#sweetness-data").html(data.sweetness);
    $("#tannin-data").html(data.tannin);
    $("#winery-data").html(data.winery_name);
    $("#variety-data").html(data.grape_varieties);
    $("#wine-data").html(`${data.winery_name} ${data.name}`);
    $("#location-data").html(`${data.country}, ${data.province}`);
    $("#user-rating-data").html(data.user_rating);
    $("#critic-rating-data").html(data.critic_rating);
    $("#description-data").html(data.description);
    $("#pairing-data").html(data.food_pairing);

    // var i = 0;
    // var wine_id = obj.wine_id;
    // var name = obj.data.name;
    // var year = obj.data.year;
    // var descr = obj.data.description;
    // var foodpair = obj.data.food_pairing;
    // var image = obj.data.image_url;
    // var user_rating = obj.data.user_rating;
    // var user_rating_count = obj.data.user_rating_count;
    // var critic_rating = obj.data.critic_rating;
    // var critic_rating_count = obj.data.critic_rating_count;
    // var grape_varieties = obj.data.grape_varieties;
    // var colour = obj.data.colour;   
    // var winery = obj.data.winery_name;   
    // var sweetness = obj.data.sweetness;
    // var tannin = obj.data.tannin;
    // var farm = obj.data.farm;
    // var country = obj.data.country;
    // var province = obj.data.province;


    // var wineBrand = document.querySelector('.wine-brand');
    // var wineRegion = document.querySelector('.region');
    // var wineYear = document.querySelector('.year');
    // var wineSweetness = document.querySelector('.sweetness');
    // var wineTannin = document.querySelector('.tannin');
    // var wineFoodPairing = document.querySelector('.food-pairing');
    // var wineFarm = document.querySelector('.farm');
    // var wineDescription = document.querySelector('.description');
    // var img = document.querySelector('img');
    // var userRating = document.querySelector('.ss-rating');
    // var criticRating = document.querySelector('.critic-rating');

    // wineYear.innerHTML = year;
    // wineRegion.innerHTML = country + ", " + province;
    // wineSweetness.innerHTML = sweetness;
    // wineTannin.innerHTML = tannin;
    // wineFoodPairing.innerHTML = foodpair;
    // wineFarm.innerHTML = farm;
    // wineBrand.innerHTML = winery + " " + grape_varieties;
    // wineDescription.innerHTML = descr;
    // img.src = image;
    // userRating.innerHTML = user_rating;
    // criticRating.innerHTML = critic_rating;

    // if no critic reviewed, critic rating ain't displayed
    var cRating = document.querySelector('.c-rating');
    if (data.critic_rating == 0) {
        cRating.classList.add('remove');
    }
}

function populateReviews(obj){
    let data = obj.data;
    console.log(data);

    //critic reviews must be the first to show
    for(var i in data) {
        if(data[i].is_critic == 1){
            var fName = data[i].first_name;
            var lName = data[i].last_name;
            var rating = data[i].rating;
            var comment = data[i].comment;

            var box = document.createElement("div");
            box.id = "review"+i;

            var name = document.createElement("h4");
            name.textContent ="Verified Critic: " + fName + " " + lName;

            var uRating = document.createElement("h4");
            uRating.textContent = rating;

            var uComment = document.createElement("h5");
            uComment.textContent = comment;

            box.appendChild(name);
            box.appendChild(uRating);
            box.appendChild(uComment);
            
            document.getElementById("review-section").appendChild(box);
        }
    }

    //then normal user reviews must show
    for(var i in data) {
        if(data[i].is_critic == 0){
            var fName = data[i].first_name;
            var lName = data[i].last_name;
            var rating = data[i].rating;
            var comment = data[i].comment;
    
            var box = document.createElement("div");
            box.id = "review"+i;
    
            var name = document.createElement("h4");
            name.textContent = fName + " " + lName;
    
            var uRating = document.createElement("h4");
            uRating.textContent = rating;
    
            var uComment = document.createElement("h5");
            uComment.textContent = comment;
            
            box.appendChild(name);
                box.appendChild(uRating);
                box.appendChild(uComment);
                
                document.getElementById("review-section").appendChild(box);
        }
        
    }
}