//List of offices
/*
var lat1 = document.getElementById('lat1').value;
var lng1 = document.getElementById('lng1').value;
var dis1 = document.getElementById('dis1').value;


var lat2 = document.getElementById('lat2').value;
var lng2 = document.getElementById('lng2').value;
var dis2 = document.getElementById('dis2').value;


var lat3 = document.getElementById('lat3').value;
var lng3 = document.getElementById('lng3').value;
var dis3 = document.getElementById('dis3').value;

var lat4 = document.getElementById('lat4').value;
var lng4 = document.getElementById('lng4').value;
var dis4 = document.getElementById('dis4').value;

*/
/*
var lat21 =document.getElementById('lat21').value;
var lng21=document.getElementById('lng21').value;
var dis21=document.getElementById('dis21').value;

var lat22 =document.getElementById('lat22').value;
var lng22=document.getElementById('lng22').value;
var dis22=document.getElementById('dis22').value;
*/
var count1 = document.getElementById('count1').value;
var count2 = document.getElementById('count2').value;
var count3 = document.getElementById('count3').value;
var count4 = document.getElementById('count4').value;


/*
var offices = [
    {
        "id": 0,
        "title": "Rider Office 1",
        "latitude": lat1,
        "longitude": lng1,
        //"image":"images/office-1.jpg",
        "description": "dddddddddddd",
        "link": "offices.html",
        "map_marker_icon": "fa-building-o"
    },
    {
        "id": 1,
        "title": "Rider Office 1",
        "latitude": lat1,
        "longitude": lng1,
        //"image":"images/office-1.jpg",
        "description": dis1,
        "link": "offices.html",
        "map_marker_icon": "fa-building-o"
    },
    {
        "id": 2,
        "title": "Rider Office 2",
        "latitude": lat2,
        "longitude": lng2,
        "image": "images/office-2.jpg",
        "description": dis2,
        "link": "offices.html",
        "map_marker_icon": "fa-building-o"
    },
    {
        "id": 3,
        "title": "Rider Office 3",
        "latitude": lat3,
        "longitude": lng3,
        "image": "images/office-3.jpg",
        "description": dis3,
        "link": "offices.html",
        "map_marker_icon": "fa-building-o"
    },
    {
        "id": 4,
        "title": "Rider Office 4",
        "latitude": lat4,
        "longitude": lng4,
        "image": "images/office-4.jpg",
        "description": dis4,
        "link": "offices.html",
        "map_marker_icon": "fa-building-o"
    },


];
*/
var offices =[];

for (var i = 1; i <= count1; i++) {
    var getLat1 = "lat"+i;
    var getLng1 = "lng"+i;
    var getDis1 = "dis"+i;

    offices.push({
        "id": i-1,
        "title": "Rider Office "+i,
        "latitude": document.getElementById(getLat1).value,
        "longitude": document.getElementById(getLng1).value,
        //"image":"images/office-1.jpg",
        "description": document.getElementById(getDis1).value ,
        "link": "offices.html",
        "map_marker_icon": "fa-building-o"
    });

}

var offices2 =[];

for (var i = 1; i <= count2; i++) {
    var getLat2 = "lat2"+i;
    var getLng2 = "lng2"+i;
    var getDis2 = "dis2"+i;

    offices2.push({
        "id": i-1,
        "title": "Rider Office "+i,
        "latitude": document.getElementById(getLat2).value,
        "longitude": document.getElementById(getLng2).value,
        //"image":"images/office-1.jpg",
        "description": document.getElementById(getDis2).value ,
        "link": "offices.html",
        "map_marker_icon": "fa-building-o"
    });

}

var offices3 =[];

for (var i = 1; i <= count3; i++) {
    var getLat3 = "lat3"+i;
    var getLng3 = "lng3"+i;
    var getDis3 = "dis3"+i;

    offices3.push({
        "id": i-1,
        "title": "Rider Office "+i,
        "latitude": document.getElementById(getLat3).value,
        "longitude": document.getElementById(getLng3).value,
        //"image":"images/office-1.jpg",
        "description": document.getElementById(getDis3).value ,
        "link": "offices.html",
        "map_marker_icon": "fa-building-o"
    });

}

var offices4 =[];

for (var i = 1; i <= count4; i++) {
    var getLat4 = "lat4"+i;
    var getLng4 = "lng4"+i;
    var getDis4 = "dis4"+i;

    offices4.push({
        "id": i-1,
        "title": "Rider Office "+i,
        "latitude": document.getElementById(getLat4).value,
        "longitude": document.getElementById(getLng4).value,
        //"image":"images/office-1.jpg",
        "description": document.getElementById(getDis4).value ,
        "link": "offices.html",
        "map_marker_icon": "fa-building-o"
    });

}
/*
var offices2 = [
    {
        "id": 0,
        "title": "Rider Office 0",
        "latitude": lat21,
        "longitude": lng21,
        //"image":"images/office-1.jpg",
        "description": dis21,
        "link": "offices.html",
        "map_marker_icon": "fa-building-o"
    },
    {
        "id": 1,
        "title": "Rider Office 1",
        "latitude": lat22,
        "longitude": lng22,
        //"image":"images/office-1.jpg",
        "description": dis22,
        "link": "offices.html",
        "map_marker_icon": "fa-building-o"
    },


];
*/