// import './css/style.css';
import Map from 'ol/Map.js';
import OSM from 'ol/source/OSM.js';
import TileLayer from 'ol/layer/Tile.js';
import View from 'ol/View.js';
import Feature from 'ol/Feature';
import Style from 'ol/style/Style';
import {Point} from 'ol/geom';
import VectorSource from 'ol/source/Vector';
import VectorLayer from 'ol/layer/Vector';
import Icon from 'ol/style/Icon';
import Overlay from 'ol/Overlay';
import {defaults as defaultControls, MousePosition} from "ol/control.js";
import {createStringXY} from "ol/coordinate.js";
import {getDistance} from "ol/sphere.js";

//informasi
const nama = document.getElementById('nama');
const rombel = document.getElementById('rombel');
const alamat = document.getElementById('alamat');
const nisn = document.getElementById('nisn');
const centerSMAN = [112.75967153196585, -7.309855];

function initializeMap(){
    let initView = new View({
        projection: 'EPSG:4326',
        center: [112.75967153196585, -7.309855],
        zoom: 19,
    });
    const sman = new Feature({
        geometry: new Point(centerSMAN),
        name: 'SMAN 16 Surabaya',
    });
    sman.setStyle(new Style({
        image: new Icon({
            crossOrigin: 'anonymous',
            src: '/images/circlegreen16.png',
        }),
    }));
    const vectorSource = new VectorSource({
        features: [sman],
    });

    const vectorLayer = new VectorLayer({
        source: vectorSource,
        name: 'sman',
    });
    return new Map({
        target: 'map',
        layers: [
            new TileLayer({
                source: new OSM(),
            }),
            vectorLayer,
        ],
        overlays: [overlay],
        view: initView,
    });
}

const container = document.getElementById('popup');
const content = document.getElementById('popup-content');
const overlay = new Overlay({
    positioning: 'bottom-center',
    element: container,
    autoPan: {
        animation: {
            duration: 250,
        },
    },
});

function asyncMap(kelas = "10") {
    $.ajax({
        url: "http://143.198.82.250/api/map/search" , type: "POST",dataType:"json", data: {
            kelas: kelas
        }, success: function (data) {
            map.getLayers().getArray().forEach(function (layer) {
                if (layer instanceof VectorLayer && layer.get('name') !== 'sman') {
                    map.removeLayer(layer);
                }
            })
            console.log(data);
            let features = [];
            for (let i = 0; i < data.data.length; i++) {
                let feature = new Feature({
                    geometry: new Point([data.data[i].geometry.latitude, data.data[i].geometry.longitude]),
                    name: data.data[i].name,
                });
                feature.set('kelas', data.data[i].kelas);
                feature.set('rombel', data.data[i].rombel);
                feature.set('alamat', data.data[i].alamat);
                feature.set('nisn', data.data[i].nisn);
                feature.setStyle(new Style({
                    image: new Icon({
                        crossOrigin: 'anonymous', src: '/images/circlegreen16.png',
                    }),
                }));
                features.push(feature);
            }
            let vectors = new VectorSource();
            vectors.addFeatures(features);
            const layers = new VectorLayer({
                source: vectors,
            })
            map.addLayer(layers);
        }
    });
}

const map = initializeMap();


map.on('loadstart',function () {
    map.getTargetElement().classList.add('spinner');
})

map.on('loadend', function () {
    map.getTargetElement().classList.remove('spinner');
    container.className = 'ol-popup card w-100 visible';
});


map.on('click', function (evt) {

    try {
        let feature = map.forEachFeatureAtPixel(evt.pixel, function (feature) {
            return feature;
        });
        if (feature.get('name') === 'SMAN 16 Surabaya') {
            return;
        }
        // console.log(feature);
        if (feature.get('name')) {
            nama.innerHTML = feature.get('name');
            rombel.innerHTML = feature.get('kelas');
            alamat.innerHTML = feature.get('alamat');
            nisn.innerHTML = feature.get('nisn');
            rombel.innerHTML = feature.get('rombel');
        } else {
            nama.innerHTML = "Tidak ada data";
            rombel.innerHTML = "Tidak ada data";
            alamat.innerHTML = "Tidak ada data";
            nisn.innerHTML = "Tidak ada data";
            rombel.innerHTML = "Tidak ada data";
        }
    }catch (e) {
        console.log("Bukan feature");
    }
});

// sidebar
function onClick(id, callback) {
    document.getElementById(id).addEventListener('click', callback);
}

// fires up first time the page is loaded
$(document).ready(function () {
    asyncMap();
    onClick("backto", function () {
        map.getView().animate({
            center: [112.75967153196585, -7.309855],
            zoom: 19,
        })
    });
    $('#filter').on('click', function () {
        // filter by class on map
        const kelas = $('#filter-kelas').val().trim();
        console.log(kelas);
        asyncMap(kelas);
    });
});


