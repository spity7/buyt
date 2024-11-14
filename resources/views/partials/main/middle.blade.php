<div class="main-middle__container">
    <div class="main-middle__buttons-container">
        <a href="" class="btn main-middle__buttons">
            مراكز
        </a>
        <a href="" class="btn main-middle__buttons">
            سكن
        </a>
        <a href="" class="btn main-middle__buttons">
            الكل
        </a>
        <a href="{{ route('housings_page') }}" class="btn main-middle__buttons main-middle__search-btn">
            <span>
                أطلب سكن
            </span>
            <i class="fa fa-search"></i>
        </a>
    </div>

    <div id="map"></div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var features = [];

        // Prepare features for clustering
        @foreach ($cityHousings as $cityHousing)
            @if ($cityHousing->city && $cityHousing->city->latitude && $cityHousing->city->longitude)
                var feature = new ol.Feature({
                    geometry: new ol.geom.Point(ol.proj.fromLonLat([
                        {{ $cityHousing->city->longitude }},
                        {{ $cityHousing->city->latitude }}
                    ])),
                    count: {{ $cityHousing->count }},
                    price: {{ $cityHousing->price }}
                });
                features.push(feature);
            @endif
        @endforeach

        var clusterSource = new ol.source.Cluster({
            distance: 40, // Clustering distance
            source: new ol.source.Vector({
                features: features
            })
        });

        // Dynamic styling based on feature count
        var clusterStyle = function(feature) {
            var clusteredFeatures = feature.get('features');
            var size = clusteredFeatures.length;

            // If there's only one housing, display the price
            if (size === 1) {
                var price = clusteredFeatures[0].get('price');
                return new ol.style.Style({
                    image: new ol.style.Circle({
                        radius: 18,
                        stroke: new ol.style.Stroke({
                            color: 'white',
                            width: 2
                        }),
                        fill: new ol.style.Fill({
                            color: '#0089f2'
                        })
                    }),
                    text: new ol.style.Text({
                        text: price.toString() + '$',
                        fill: new ol.style.Fill({
                            color: '#fff'
                        }),
                        font: 'bold 10px Arial'
                    })
                });
            } else {
                // For clusters, show the number of housings
                return new ol.style.Style({
                    image: new ol.style.Circle({
                        radius: 15,
                        stroke: new ol.style.Stroke({
                            color: '#fff'
                        }),
                        fill: new ol.style.Fill({
                            color: '#ff5722'
                        })
                    }),
                    text: new ol.style.Text({
                        text: size.toString(),
                        fill: new ol.style.Fill({
                            color: '#fff'
                        }),
                        font: 'bold 12px Arial'
                    })
                });
            }
        };

        var clusters = new ol.layer.Vector({
            source: clusterSource,
            style: clusterStyle
        });

        var map = new ol.Map({
            target: 'map',
            layers: [
                new ol.layer.Tile({
                    source: new ol.source.OSM() // OpenStreetMap layer
                }),
                clusters // Clustered layer
            ],
            view: new ol.View({
                center: ol.proj.fromLonLat([35.495480, 33.888630]),
                zoom: 8.5 // Set a default zoom level
            })
        });

        // Event listener to refresh clustering when zooming in or out
        map.getView().on('change:resolution', function() {
            clusters.changed();
        });
    });
</script>

<style>
    /* Map marker styles */
    .map-marker {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 30px;
        height: 30px;
        background-color: #ff5722;
        color: #fff;
        font-weight: bold;
        font-size: 14px;
        border-radius: 50%;
        text-align: center;
        cursor: pointer;
        border: 2px solid white;
    }
</style>
