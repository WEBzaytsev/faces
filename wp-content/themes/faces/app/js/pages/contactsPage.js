'use strict';

export const contactsPage = function ($, settings) {
    const self = this;
    this.mainSettings = settings;
    this.map = null;

    this.initMap = () => {
        const myLatLng = {
            lat: 55.603247,
            lng: 37.167854
        };
        const map = new google.maps.Map(document.getElementById("map"), {
            zoom: 12,
            center: myLatLng,
        });

        new google.maps.Marker({
            position: myLatLng,
            map,
            icon: `${settings.home_url}/wp-content/themes/faces/map-icon.png`,
            title: "Hello World!",
        });
    }

    this.init = () => {
        window.initMap = self.initMap();
        console.log(123);
    }
}