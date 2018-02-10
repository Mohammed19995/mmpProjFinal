//List of offices
var latDetail = document.getElementById('latDetail').value;
var lngDetail = document.getElementById('lngDetail').value;
var nameMousque = document.getElementById('nameMousque').value;
var path = document.getElementById("path").src;


var offices5 = [
    {
        "id": 0,
        "title": nameMousque,
        "latitude": latDetail,
        "longitude": lngDetail,
        "image":path,
        "description": "dsjkkj",
        "link": "offices.html",
        "map_marker_icon": "fa-building-o"
    },

];



var count1 = document.getElementById('count1').value;
var count2 = document.getElementById('count2').value;
var count3 = document.getElementById('count3').value;
var count4 = document.getElementById('count4').value;





var offices =[];

for (var i = 1; i <= count1; i++) {
    var getLat1 = "lat"+i;
    var getLng1 = "lng"+i;
    var getDis1 = "dis"+i;
    var pathA = "pathA"+i;
    offices.push({
        "id": i-1,
        "title": "Rider Office "+i,
        "latitude": document.getElementById(getLat1).value,
        "longitude": document.getElementById(getLng1).value,
        "image":document.getElementById(pathA).src,
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
    var pathB = "pathB"+i;
    offices2.push({
        "id": i-1,
        "title": "Rider Office "+i,
        "latitude": document.getElementById(getLat2).value,
        "longitude": document.getElementById(getLng2).value,
        "image":document.getElementById(pathB).src,
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
    var pathC = "pathC"+i;
    offices3.push({
        "id": i-1,
        "title": "Rider Office "+i,
        "latitude": document.getElementById(getLat3).value,
        "longitude": document.getElementById(getLng3).value,
        "image":document.getElementById(pathC).src,
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
    var pathE = "pathE"+i;
    offices4.push({
        "id": i-1,
        "title": "Rider Office "+i,
        "latitude": document.getElementById(getLat4).value,
        "longitude": document.getElementById(getLng4).value,
        "image":document.getElementById(pathE).src,
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

