/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './js/component/map.js';
import 'leaflet';
import '@ansur/leaflet-pulse-icon/dist/L.Icon.Pulse.css'


import './styles/app.css';
import './styles/script.js';
global.$ = global.jQuery = $;
import './images';
// start the Stimulus application
import './bootstrap';
import './../node_modules/bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap';
import 'jquery';
import 'popper.js';
import 'remixicon/fonts/remixicon.css';


// API METEO //

// const APIKEY = '1d7424d8bc19286753e6243f88a300a5';

let apiCall = function(city){
    let url = "https://api.openweathermap.org/data/2.5/weather?q=Rambouillet&appid=1d7424d8bc19286753e6243f88a300a5&units=metric&lang=fr";

    fetch(url).then((response =>
            response.json().then((data)=> {
                console.log(data);
                document.getElementById('city').innerHTML = data.name;
                document.getElementById('temp').innerHTML = "<i class='fas fa-thermometer-three-quarters'></i>" + data.main.temp + '°';
                document.getElementById('humidity').innerHTML = "<i class='fas fa-tint'></i>" + data.main.humidity + '%';
                document.getElementById('wind').innerHTML = "<i class='fas fa-wind'></i>" + data.wind.speed + 'km/h';

            })
    ))
    ;
}

// document.getElement('form').addEventListener('submit', function(e){
//     e.preventDefault();
//     let ville = document.getElementById('inputcity').value;
//
//     apiCall(ville);
// });

apiCall('Rambouillet');