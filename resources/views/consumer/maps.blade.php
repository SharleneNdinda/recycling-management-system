@extends('layouts.consumer')

@section('content')  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/maps.css') }} ">
    <script src='https://api.mapbox.com/mapbox-gl-js/v2.6.1/mapbox-gl.js'></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.6.1/mapbox-gl.css' rel='stylesheet' />
    <style>
        * {
            box-sizing: border-box;
        }
        
        body {
            color: #404040;
            margin: 0;
            padding: 0;
            -webkit-font-smoothing: antialiased;
        }

        h1 {
            font-size: 22px;
            margin: 0;
            font-weight: 400;
            line-height: 20px;
            padding: 20px 2px;
        }

        a {
            color: #404040;
            text-decoration: none;
        }

        a:hover {
            color: #101010;
        }

        /* The page is split between map and sidebar - the sidebar gets 1/3, map
        gets 2/3 of the page. You can adjust this to your personal liking. */
        .sidebar-map {
            position: absolute;
            width: 33.3333%;
            height: 100%;
            margin-left: 17rem;
            top: 0;
            left: 0;
            overflow: hidden;
            border-right: 1px solid rgba(0, 0, 0, 0.25);
        }

        .map {
            position: absolute;
            left: 33.3333%;
            width: 66.6666%;
            top: 0;
            bottom: 0;
        }

        .heading {
            background: #fff;
            border-bottom: 1px solid #eee;
            height: 60px;
            line-height: 60px;
            padding: 0 10px;
        }
        .listings {
        height: 100%;
        overflow: auto;
        padding-bottom: 60px;
        }

        .listings .item {
        border-bottom: 1px solid #eee;
        padding: 10px;
        text-decoration: none;
        }

        .listings .item:last-child { border-bottom: none; }

        .listings .item .title {
        display: block;
        color: #00853e;
        font-weight: 700;
        }

        .listings .item .title small { font-weight: 400; }

        .listings .item.active .title,
        .listings .item .title:hover { color: #8cc63f; }

        .listings .item.active {
        background-color: #f8f8f8;
        }

        ::-webkit-scrollbar {
        width: 3px;
        height: 3px;
        border-left: 0;
        background: rgba(0, 0, 0, 0.1);
        }

        ::-webkit-scrollbar-track {
        background: none;
        }

        ::-webkit-scrollbar-thumb {
        background: #00853e;
        border-radius: 0;
        }

            /* Marker tweaks */
        .mapboxgl-popup-close-button {
        display: none;
        }

        .mapboxgl-popup-content {
        font: 400 15px/22px 'Source Sans Pro', 'Helvetica Neue', sans-serif;
        padding: 0;
        width: 180px;
        }

        .mapboxgl-popup-content h3 {
        background: #91c949;
        color: #fff;
        margin: 0;
        padding: 10px;
        border-radius: 3px 3px 0 0;
        font-weight: 700;
        margin-top: -15px;
        }

        .mapboxgl-popup-content h4 {
        margin: 0;
        padding: 10px;
        font-weight: 400;
        }

        .mapboxgl-popup-content div {
        padding: 10px;
        }

        .mapboxgl-popup-anchor-top > .mapboxgl-popup-content {
        margin-top: 15px;
        }

        .mapboxgl-popup-anchor-top > .mapboxgl-popup-tip {
        border-bottom-color: #91c949;
        }
    </style>  

    <title>Rebotto</title>

</head>
<body>
 
<div class='sidebar-map'>
  <div class='heading'>
    <h1>Our locations</h1>
  </div>
  <div id='listings' class='listings'></div>
</div>
<div id="map" class="map"></div>
 
<div id='map' class="maps" style=' margin-left : 20rem; margin-top : 5rem; width: 1200px; height: 400px;'></div>
<script>
mapboxgl.accessToken = 'pk.eyJ1IjoibmRpbmRhIiwiYSI6ImNreHA4b3NvdzN5d3MzMG80M2t0cjJ2ZWQifQ.RzNGhBbXRlgz0FBKf46ifA';
const map = new mapboxgl.Map({
    container: 'map', // container ID
    style: 'mapbox://styles/mapbox/streets-v11', // style URL
    center: [36.825, 1.31], // starting position [lng, lat] kenyan coordinates
    zoom: 7 // starting zoom
})
const stores = {
  "type": "FeatureCollection",
  "features": [
    {
      "type": "Feature",
      "geometry": {
        "type": "Point",
        "coordinates": [
          
            36.827151062521686,
              -1.3134915312840978
        ]
      },
      "properties": {
        "phoneFormatted": "0700-477-021",
        "address": "South C Shopping Center",
        "city": "Nairobi",
        "country": "Kenya",
        "crossStreet": "",
        "postalCode": "00100",
      }
    },
    {
      "type": "Feature",
      "geometry": {
        "type": "Point",
        "coordinates": [
         36.829254456042584,
         -1.298150223944174
        ]
      },
      "properties": {
        "phoneFormatted": "0700-321-457",
        "address": "Industrial Area, Workshop Road",
        "city": "Nairobi",
        "country": "Kenya",
        "crossStreet": "",
        "postalCode": "00100",
      }
    },
    {
      "type": "Feature",
      "geometry": {
        "type": "Point",
        "coordinates": [
         36.79700239913376,
         -1.294455222912995
        ]
      },
      "properties": {
        "phoneFormatted": "071-567-564",
        "address": "Ngong Road, Argwings Kodhek Rd",
        "city": "Nairobi",
        "country": "Kenya",
        "crossStreet": "",
        "postalCode": "00100",
      }
    },
    {
      "type": "Feature",
      "geometry": {
        "type": "Point",
        "coordinates": [
        36.72517296181491,  
       -1.3348055391788616
        ]
      },
      "properties": {
        "phoneFormatted": "0711-784-342",
        "address": "Kamili Designs, Karen",
        "city": "Nairobi",
        "country": "Kenya",
        "crossStreet": "",
        "postalCode": "00100",
      }
    },
    {
      "type": "Feature",
      "geometry": {
        "type": "Point",
        "coordinates": [
       
          36.824658588430694,
            -1.2840604302674419
        ]
      },
      "properties": {
        "phoneFormatted": "0711-679-235",
        "address": "Mali Store, Moi Avenue",
          "city": "Nairobi",
        "country": "Kenya",
        "crossStreet": "",
        "postalCode": "00100",
      }
    },
  ]
};

/* Assign a unique ID to each store */
stores.features.forEach(function (store, i) {
  store.properties.id = i;
});

map.on('load', () => {
  /* Add the data to your map as a layer */
  map.addLayer({
    id: 'locations',
    type: 'circle',
    /* Add a GeoJSON source containing place coordinates and information. */
    source: {
      type: 'geojson',
      data: stores
    }
  });
  buildLocationList(stores);
});

map.on('click', (event) => {
  /* Determine if a feature in the "locations" layer exists at that point. */
  const features = map.queryRenderedFeatures(event.point, {
    layers: ['locations']
  });

  /* If it does not exist, return */
  if (!features.length) return;

  const clickedPoint = features[0];

  /* Fly to the point */
  flyToStore(clickedPoint);

  /* Close all other popups and display popup for clicked store */
  createPopUp(clickedPoint);

  /* Highlight listing in sidebar (and remove highlight for all other listings) */
  const activeItem = document.getElementsByClassName('active');
  if (activeItem[0]) {
    activeItem[0].classList.remove('active');
  }
  const listing = document.getElementById(
    `listing-${clickedPoint.properties.id}`
  );
  listing.classList.add('active');
});

function buildLocationList(stores) {
  for (const store of stores.features) {
    /* Add a new listing section to the sidebar. */
    const listings = document.getElementById('listings');
    const listing = listings.appendChild(document.createElement('div'));
    /* Assign a unique `id` to the listing. */
    listing.id = `listing-${store.properties.id}`;
    /* Assign the `item` class to each listing for styling. */
    listing.className = 'item';

    /* Add the link to the individual listing created above. */
    const link = listing.appendChild(document.createElement('a'));
    link.href = '#';
    link.className = 'title';
    link.id = `link-${store.properties.id}`;
    link.innerHTML = `${store.properties.address}`;

    /* Add details to the individual listing. */
    const details = listing.appendChild(document.createElement('div'));
    details.innerHTML = `${store.properties.city}`;
    if (store.properties.phone) {
      details.innerHTML += ` · ${store.properties.phoneFormatted}`;
    }
    if (store.properties.distance) {
      const roundedDistance = Math.round(store.properties.distance * 100) / 100;
      details.innerHTML += `<div><strong>${roundedDistance} miles away</strong></div>`;
    }

    link.addEventListener('click', function () {
  for (const feature of stores.features) {
    if (this.id === `link-${feature.properties.id}`) {
      flyToStore(feature);
      createPopUp(feature);
    }
  }
    const activeItem = document.getElementsByClassName('active');
    if (activeItem[0]) {
        activeItem[0].classList.remove('active');
    }
    this.parentNode.classList.add('active');
    });
    }
    }
    function flyToStore(currentFeature) {
    map.flyTo({
        center: currentFeature.geometry.coordinates,
        zoom: 15
    });
    }
    function createPopUp(currentFeature) {
    const popUps = document.getElementsByClassName('mapboxgl-popup');
    /** Check if there is already a popup on the map and if so, remove it */
    if (popUps[0]) popUps[0].remove();

    const popup = new mapboxgl.Popup({ closeOnClick: false })
        .setLngLat(currentFeature.geometry.coordinates)
        .setHTML(`<h3>Rebotto</h3><h4>${currentFeature.properties.address}</h4>`)
        .addTo(map);
    }
;
</script>
</body>
</html>

<script src="//code.jquery.com/jquery.js"></script> 
@include('flashy::message')


@endsection('content')
  

