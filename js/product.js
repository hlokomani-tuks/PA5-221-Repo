// calling api to get the wine for this page
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

//Calling api to get reviews for that specific wine

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

//add review functionality
var reviewBtn = document.getElementById("review-btn");
reviewBtn.addEventListener('click', function(){

    var comment = document.getElementById("review-comment").value;

    var rating = document.getElementById("input-rating").value;

    if(comment == ""){
        alert("You cannot submit an empty review.");

    }else if(rating == ""){
        alert("You must specify the rating please.");
    }
    else{
        var req3 = new XMLHttpRequest();
        const body3 = {
            "type":"add_review",
            "is_critic":0,
            "rating":rating,
            "comment":comment,
            "wine_id":wineID
        };
    
        var toSend3 = JSON.stringify(body3);
    
        req3.open('POST', 'http://localhost/PA5-221-Repo/api.php', true);
    
        req3.send(toSend3);

        
        //handle response
        if(req3.status === 200 && req.readyState == 4){
            var obj = JSON.parse(req3.responseText);
            alert("Your review has been succesfully added.");
            window.location.reload();
        }else{
            var obj = JSON.parse(req3.responseText);
            console.log(obj.error);
            alert("You must be logged in to review a wine.")
        }
    }

    

})


//functions


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

    

    // if no critic reviewed, critic rating ain't displayed
    var cRating = document.querySelector('.c-rating');
    if (data.critic_rating == 0) {
        cRating.classList.add('remove');
    }
}

function populateReviews(obj){
    let data = obj.data;
    

    //critic reviews must be the first to show
    for(var i in data) {
        if(data[i].is_critic == 1){
            var fName = data[i].first_name;
            var lName = data[i].last_name;
            var rating = data[i].rating;
            var comment = data[i].comment;

            var box = document.createElement("div");
            box.className = "review-row";
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

            // html = `
            //     <div class="review-row">
            //         <h3 id="reviewee"></h3>
            //         <h3 id="user-rating"></h3>
            //         <h5 id="comment"></h5>
            //     </div>
            // `;

            // $("#reviewee").html(fName + " " + lName);
            // $("#user-rating").html(uRating);
            // $("#comment").html(uComment);

            // var newRow = document.createElement('div');
            // newRow.insertAdjacentHTML("afterbegin", html);
            // document.getElementById("review-section").appendChild(newRow);
            
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
            box.className = "review-row";
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

            // html = `
            //     <div class="review-row">
            //         <h3 id="reviewee"></h3>
            //         <h3 id="user-rating"></h3>
            //         <h5 id="comment"></h5>
            //     </div> <br>
            // `;

            // $("#reviewee").html(fName + " " + lName);
            // $("#user-rating").html(rating);
            // $("#comment").html(comment);

            // var newRow = document.createElement('div');
            // newRow.insertAdjacentHTML("afterbegin", html);
            // document.getElementById("review-section").appendChild(newRow);

        }
        
    }
}