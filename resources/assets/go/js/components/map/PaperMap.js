/**
 * Created by n0m4dz on 4/16/16.
 */
/**
 * Created by n0m4dz on 4/13/16.
 */
import './../../../../../../node_modules/leaflet/dist/leaflet.css'

import React, {Component} from 'react'
import L from 'leaflet'

//import { Map, Marker, Popup, TileLayer } from 'react-leaflet'

class PaperMap extends Component {

    constructor() {
        super();
        this.state = {
            lat: 47.8916501,
            lng: 106.9018714,
            zoom: 12
        };
    }

    componentDidMount() {
        L.Icon.Default.imagePath = '//cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images';

        /**
         * Map types
         */
        var googleStreets = L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', {
            maxZoom: 20,
            subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
        });
        var googleHybrid = L.tileLayer('http://{s}.google.com/vt/lyrs=s,h&x={x}&y={y}&z={z}', {
            maxZoom: 20,
            subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
        });
        var osm = L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {});

        /**
         * init map
         */
        var map = L.map('map', {
            zoomControl: false,
            layers: [googleStreets]
        }).setView([47.8916501, 106.9018714], 6);

        /**
         * Map control
         */
        map.addControl(new L.Control.Zoom({position: 'bottomright'}));

        map.addControl(new L.Control.Layers({
            'Энгийн': googleStreets,
            'Хиймэл дагуул': googleHybrid,
            'Вектор газрын зураг': osm
        }));
        L.control.scale().addTo(map);

        map.on('resize', function () {
            map.invalidateSize();
        });

        /**
         * Copyright layer
         */
        L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
            maxZoom: 18,
            attribution: 'Copyright &copy; 2016 <a href="http://www.geek.mn/" title="MapQuest" target="_blank">Paper Map</a> <img src="/images/logo-white.png" width="24" height="18">'
        }).addTo(map);

        L.marker([47.8916501, 106.9018714]).addTo(map)
            .bindPopup('A pretty CSS3 popup. <br> Easily customizable.');
    }

    componentWillMount() {

    }

    render() {
        return (
            <div id="map">
                <div className="mapPlaceholder"><span className="fa fa-spin fa-spinner"></span> Түр хүлээнэ үү... </div>
            </div>
        )
    }
}

export default PaperMap