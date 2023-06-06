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

req.open('POST', 'http://localhost/api.php', true);

req.send(toSend);

req.addEventListener('load', function(){

    if(req.status === 200 && req.readyState == 4){
        
        var obj = JSON.parse(req.responseText);
        populatePager(obj);
        
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
    $("#user-rating").html(`User rating: ${data.user_rating}/10`);
    $("#critic-rating").html(`Critic rating: ${data.critic_rating}/10`);
    $("#description-data").html(data.description);

}