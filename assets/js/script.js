const defaultLocation=[35.7077718,51.4873992];
const defaultZoom=12;


let map = L.map('map').setView(defaultLocation, defaultZoom);

let tiles = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
    maxZoom: 18,
    attribution: 'Map data &copy; <a href="">`1Map Project`</a>',
    id: 'mapbox/streets-v11',
    tileSize: 512,
    zoomOffset: -1
}).addTo(map);



// setTimeout(function(){
//     map.setView([35.722,50.328], defaultZoom);
// },4000);




// show and pin markers

// L.marker(defaultLocation).addTo(map).bindPopup("7Learn Office 1").openPopup();
// L.marker([35.712,50.338]).addTo(map).bindPopup("7Learn Office 2");

// map.on('popupopen',function(){
//     alert('popup opened')
// });

// let northLine=map.getBounds().getNorth();
// let wesstLine=map.getBounds().getWest();
// let southLine=map.getBounds().getSouth();
// let eastLine=map.getBounds().getEast();

// map.on('zoomend',function(){
//     // alert(map.getBounds().getCenter());
// })

map.on('dblclick',function(event){
    // alert(event.latlng.lat +' '+ event.latlng.lng);
    L.marker(event.latlng).addTo(map);
    $('.modal-overlay').fadeIn();
    $('#lat-display').val(event.latlng.lat);
    $('#lng-display').val(event.latlng.lng);
    $('#l-type').val(0);
    $('#l-title').val('');
})


// setTimeout(function(){
//     // map.setView([northLine,wesstLine], defaultZoom);
// },3000);

var current_position , current_accuracy;

map.on('locationfound',function(e){

    if(current_position){
        map.removeLayer(current_position);
        map.removeLayer(current_accuracy);

    }
    var radius=e.accuracy;
    current_position = L.marker(e.latlng).addTo(map)
    .bindPopup("دقت تقریبی"+radius+"متر").openPopup();
    current_accuracy = L.circle(e.latlng,radius).addTo(map);

});

map.on('locationerror',function(e){
    alert(e.message);
});

function locate(){
    map.locate({setView:true,maxZoom:defaultZoom});
}

// setInterval(locate,5000);

$(document).ready(function() {
    $('form#addLocationForm').submit(function(e) {
        e.preventDefault(); // prevent form submiting
        var form = $(this);
        var resultTag = form.find('.ajax-result');
        $.ajax({
            url: form.attr('action'),
            method: form.attr('method'),
            data: form.serialize(),
            success: function(response) {
                resultTag.html(response);
            }
        });
    });


    $('.modal-overlay .close').click(function() {
        $('.modal-overlay').fadeOut();
    });
});
