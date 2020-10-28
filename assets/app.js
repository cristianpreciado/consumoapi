/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.scss';

// Need jQuery? Install it with "yarn add jquery", then uncomment to import it.
import $ from 'jquery';
import {Map, View} from 'ol';
import TileLayer from 'ol/layer/Tile';
import XYZ from 'ol/source/XYZ';
import {transform} from 'ol/proj';

var viewmap = new View({
    center: [0, 0],
    zoom: 2
});

var map = new Map({
    target: 'mapa',
    layers: [
      new TileLayer({
        source: new XYZ({
          url: 'https://{a-c}.tile.openstreetmap.org/{z}/{x}/{y}.png'
        })
      })
    ],
    view: viewmap
});

$('#buscarCiudad').submit((e)=>{
    e.preventDefault();
    const ciudad=$('#ciudad').val();
    const key = "258f6ed41fcd2c6f89cb19c02d236bd8";
    const data=fetch(`https://api.openweathermap.org/data/2.5/weather?q=${ciudad}&appid=${key}`)
    .then(response => response.json())
    .then(data => {
        const datasend={'temperatura':data.main.temp,'humedad':data.main.temp,'presion':data.main.pressure,'latitud':data.coord.lat,'longitud':data.coord.lon,'ciudad':ciudad}
        fetch(guardarhistorial, {
            method: 'POST', // or 'PUT'
            body: JSON.stringify(datasend), // data can be `string` or {object}!
            headers:{
              'Content-Type': 'application/json'
            }
        }).then(res => res.json())
        .catch(error => console.error('Error:', error))
        .then(response => {
            map.setView(new View({
                center: transform([datasend.longitud,datasend.latitud], 'EPSG:4326', 'EPSG:3857'),
                zoom: 8
            }));
            $('#temperatura').text(datasend.temperatura);
            $('#latitud').text(datasend.latitud);
            $('#longitud').text(datasend.longitud);
            $('#humedad').text(datasend.humedad);
            $('#presion').text(datasend.presion);
        });
    });
});