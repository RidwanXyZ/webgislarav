import Feature from "ol/Feature.js";
import {Point} from "ol/geom.js";
import Style from "ol/style/Style.js";
import Icon from "ol/style/Icon.js";
import VectorSource from "ol/source/Vector.js";
import VectorLayer from "ol/layer/Vector.js";

function onClick(id, callback) {
    document.getElementById(id).addEventListener('click', callback);
}

function asyncMap(endpoint = "/api/map", kelas = null, method = "GET"){
    $.ajax({
        url: "http://localhost:8000" + endpoint,
        type: method,
        dataType: 'json',
        kelas: {
            kelas: kelas
        },
        success: function (data) {
            let features = [];
            for (let i = 0; i < data.data.length; i++) {
                let feature = new Feature({
                    geometry: new Point([data.data[i].geometry.latitude, data.data[i].geometry.longitude]),
                    name: data.data[i].name,
                });
                feature.set('kelas', data.data[i].kelas);
                feature.set('alamat', data.data[i].alamat);
                feature.set('nisn', data.data[i].nisn);
                feature.setStyle(new Style({
                    image: new Icon({
                        crossOrigin: 'anonymous',
                        src: '/images/circlegreen16.png',
                    }),
                }));
                features.push(feature);
            }
            let vectors = new VectorSource();
            vectors.addFeatures(features);
            const layers = new VectorLayer(
                {
                    source: vectors,
                }
            )
            map.addLayer(layers);
        }
    });
}

export default { onClick, asyncMap };
