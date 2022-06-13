fetchApi(nominatimUrl, "get", [], onloadMapAdresseData);

function onloadMapAdresseData(xhr){
    if (xhr.status == 200) {
        let json = JSON.parse(xhr.response);
        var iconFeature1 = new ol.Feature({
            geometry: new ol.geom.Point(ol.proj.fromLonLat([json[0].lon, json[0].lat])),
            name: 'Somewhere',
        });


        // specific style for that one point
        iconFeature1.setStyle(new ol.style.Style({
            image: new ol.style.Icon({
                anchor: [0.5, 46],
                anchorXUnits: 'fraction',
                anchorYUnits: 'pixels',
                src: 'http://alpha.ljltongle.com/assets/img/landing/pin.png',
            })
        }));




        const iconLayerSource = new ol.source.Vector({
            features: [iconFeature1]
        });

        const iconLayer = new ol.layer.Vector({
            source: iconLayerSource,
            // style for all elements on a layer
            style: new ol.style.Style({
                image: new ol.style.Icon({
                    anchor: [0.5, 46],
                    anchorXUnits: 'fraction',
                    anchorYUnits: 'pixels',
                    src: 'https://openlayers.org/en/v4.6.4/examples/data/icon.png'
                })
            })
        });


        const map = new ol.Map({
            target: 'event-map',
            layers: [
                new ol.layer.Tile({
                    source: new ol.source.OSM(),
                }),
                iconLayer
            ],
            view: new ol.View({
                center: ol.proj.fromLonLat([ json[0].lon, json[0].lat]),
                zoom: 16
            })
        });
    }else{
        ShowDanger("Oops something unusually went wrong, Please try again or try to refresh the page.");
    }
}
