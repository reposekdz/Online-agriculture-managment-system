<?php
include("header.php");
if(isset($_POST['submit']))
{
    $to = "mailto:reponsekdz06@gmail.com";
    $subject = "Ubutumwa kuva TMMZ";        
    $message = "<html>
    <head>
    <title>Ifishi yo kutuvugisha TMMZ</title>
    </head>
    <body>
    <p>Ifishi yo kutuvugisha</p>
    <table>
    <tr>
    <th>Izina</th>
    <td>".htmlspecialchars($_POST['name'])."</td>
    </tr>
    <tr>    
    <th>Imeyili</th>
    <td>".htmlspecialchars($_POST['email'])."</td>
    </tr>
    <tr>
    <th>Nomero ya telefoni</th>
    <td>".htmlspecialchars($_POST['contctno'])."</td>
    </tr>
    <tr>
    <th>Umutwe</th>
    <td>".htmlspecialchars($_POST['subject'])."</td>
    </tr>
    <tr>
    <th>Ubutumwa</th>
    <td>".htmlspecialchars($_POST['message'])."</td>
    </tr>
    </table>
    </body>
    </html>";
    echo "<script>alert('Murakoze kutuvugisha!! Tuzasubiza vuba..');</script>";
    include("phpmailer.php");
    echo "<script>window.location='contact.php';</script>";
}
?>

<main id="main">

  <!-- ======= Breadcrumbs ======= -->
  <section id="breadcrumbs" class="breadcrumbs">
    <div class="container">
      <div class="d-flex justify-content-between align-items-center">
        <h2>TUVUGISHE</h2>
        <ol>
          <li>Turi kumwe muburyo bwose</li>
        </ol>
      </div>
    </div>
  </section>

  <!-- ======= Cta Section ======= -->
  <section id="cta" class="cta">
    <div class="container">
      <div class="text-center" data-aos="zoom-in">
        <h3>Turi kumwe muburyo bwose!</h3>
        <p class="mb-4">Koresha iyo fomu iri hasi niba ufite ibibazo cyangwa ibyo usaba, bijyanye n'ibyo dukora. <br>Tuzasubiza vuba </p>
        <div class="social-links d-flex justify-content-center">
          <a href="mailto:reponsekdz06@gmail.com" class="google-plus"><i class="bx bxl-skype"></i></a>
          <a href="https://x.com/reponse_kdz" class="twitter"><i class="bx bxl-twitter"></i></a>
          <a href="https://www.linkedin.com/in/reponse-kdz-958" class="linkedin"><i class="bx bxl-linkedin"></i></a>
          <a href="https://www.instagram.com/reponse_kdz/?next=%2F=" class="instagram"><i class="bx bxl-instagram"></i></a>
          <a href="https://wa.me/250788123456" class="whatsapp"><i class="bx bxl-whatsapp"></i></a>
        </div>
      </div>
    </div>
  </section>

  <!-- ======= Contact Section ======= -->
  <section id="contact" class="contact">
    <div class="container">
      <div class="row">
        <!-- Profile Card - Modern Design -->
        <div class="col-lg-4 col-md-6 mb-5 mb-lg-0">
          <div class="profile-card text-center p-4 shadow rounded">
            <img src="images/chandan.jpg" class="img-fluid rounded-circle mb-3" style="width:180px;height:180px;object-fit:cover;">
            <h3>Reponse NIYONKURU</h3>
            <p class="text-muted">Umwigishwa, GARDEN TSS</p>
            <hr class="mx-auto" style="width:50px;">
            <h5 class="mb-3">Duhuze</h5>
            <div class="social-links d-flex justify-content-center">
              <a href="mailto:reponsekdz06@gmail.com" class="text-danger mx-2"><i class="bx bxs-envelope bx-sm"></i></a>
              <a href="tel:+250788123456" class="text-success mx-2"><i class="bx bxs-phone bx-sm"></i></a>
              <a href="https://wa.me/250788123456" class="text-success mx-2"><i class="bx bxl-whatsapp bx-sm"></i></a>
            </div>
          </div>
          
          <!-- Contact Info Box -->
          <div class="contact-info-box mt-4 p-4 shadow rounded">
            <div class="d-flex align-items-center mb-3">
              <i class="icofont-location-pin mr-3"></i>
              <div>
                <h6 class="mb-0">Aho turi:</h6>
                <p class="mb-0">Kirehe, Kigali Rwanda</p>
              </div>
            </div>
            <div class="d-flex align-items-center mb-3">
              <i class="icofont-email mr-3"></i>
              <div>
                <h6 class="mb-0">Imeri:</h6>
                <p class="mb-0">reponsekdz06@gmail.com</p>
              </div>
            </div>
            <div class="d-flex align-items-center">
              <i class="icofont-phone mr-3"></i>
              <div>
                <h6 class="mb-0">Telefoni:</h6>
                <p class="mb-0">+250 722725735</p>
              </div>
            </div>
          </div>
        </div>

        <!-- Contact Form - Modern Design -->
        <div class="col-lg-8">
          <div class="contact-form p-4 shadow rounded">
            <h4 class="text-center mb-4">Tuvugishe</h4>
            
            <form action="" method="post" role="form" class="php-email-form">
              <div class="form-row">
                <div class="col-md-6 form-group">
                  <label for="name">Izina ryose</label>
                  <input type="text" name="name" class="form-control" id="name" placeholder="Andika izina" required />
                  <div class="validate"></div>
                </div>
                <div class="col-md-6 form-group">
                  <label for="email">Imeyili</label>
                  <input type="email" class="form-control" name="email" id="email" placeholder="Andika imeyili" required />
                  <div class="validate"></div>
                </div>
              </div>
              <div class="form-group">
                <label for="contctno">Nomero ya telefoni</label>
                <input type="tel" class="form-control" name="contctno" id="contctno" placeholder="Andika numero ya telefoni" required />
                <div class="validate"></div>
              </div>
              <div class="form-group">
                <label for="subject">Umutwe</label>
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Andika umutwe w'ubutumwa" required />
                <div class="validate"></div>
              </div>
              <div class="form-group">
                <label for="message">Ubutumwa</label>
                <textarea class="form-control" name="message" rows="5" placeholder="Andika ubutumwa" required></textarea>
                <div class="validate"></div>
              </div>
              <div class="text-center">
                <button type="submit" class="btn btn-primary btn-lg" name="submit">
                  <i class="bx bx-paper-plane mr-2"></i>Kohereza
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
      
      <!-- Map Section with Modern Card -->
      <!-- Map Section with Modern Card - Enhanced Version -->
<div class="row mt-5">
  <div class="col-12">
    <!-- Add Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <!-- Add Leaflet Routing Machine CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@3.2.12/dist/leaflet-routing-machine.css" />
    
    <div class="map-card shadow-lg rounded-lg overflow-hidden border-0">
      <div class="map-header p-4 bg-gradient-primary text-white d-flex justify-content-between align-items-center">
        <h5 class="mb-0 font-weight-bold"><i class="fas fa-map-marked-alt mr-2"></i>Aho duherereye mukarere ka Kirehe</h5>
        <div class="map-controls">
          <button class="btn btn-sm btn-light mr-2" id="zoom-in"><i class="fas fa-search-plus"></i></button>
          <button class="btn btn-sm btn-light" id="zoom-out"><i class="fas fa-search-minus"></i></button>
        </div>
      </div>
      
      <div class="map-container position-relative">
        <!-- Interactive Map Container -->
        <div id="interactive-map" style="height: 500px;"></div>
        
        <!-- Map Overlay Controls -->
        <div class="map-overlay-controls">
          <div class="map-legend bg-white p-3 shadow-sm rounded">
            <h6 class="font-weight-bold mb-3"><i class="fas fa-key mr-2"></i>Ibisobanuro</h6>
            <ul class="list-unstyled">
              <li class="mb-2"><span class="legend-icon bg-primary mr-2"></span>Ahantu duherereye</li>
              <li class="mb-2"><span class="legend-icon bg-success mr-2"></span>Amabanki</li>
              <li class="mb-2"><span class="legend-icon bg-info mr-2"></span>Amasoko</li>
              <li><span class="legend-icon bg-warning mr-2"></span>Amashuri</li>
            </ul>
          </div>
          
          <button class="btn btn-primary btn-locate px-4" id="locate-me">
            <i class="fas fa-location-arrow mr-2"></i>Shaka aho uri
          </button>
        </div>
      </div>
      
      <div class="map-footer bg-light p-3 d-flex flex-wrap justify-content-between align-items-center">
        <div class="transport-options mb-2 mb-md-0">
          <button class="btn btn-sm btn-outline-secondary mr-2 active" data-transport="walking" id="walking-btn">
            <i class="fas fa-walking mr-1"></i>Kugenda
          </button>
          <button class="btn btn-sm btn-outline-secondary mr-2" data-transport="driving" id="driving-btn">
            <i class="fas fa-car mr-1"></i>Gukoresha imodoka
          </button>
          <button class="btn btn-sm btn-outline-secondary" data-transport="transit" id="transit-btn">
            <i class="fas fa-bus mr-1"></i>Gukoresha bus
          </button>
        </div>
        <div class="map-actions">
          <button class="btn btn-sm btn-success mr-2" id="get-directions">
            <i class="fas fa-route mr-1"></i>Reba inzira
          </button>
          <button class="btn btn-sm btn-info" id="share-location">
            <i class="fas fa-share-alt mr-1"></i>Sangiza
          </button>
        </div>
      </div>
    </div>
    
    <!-- Add Required JavaScript Libraries -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-routing-machine@3.2.12/dist/leaflet-routing-machine.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet-gpx/1.7.0/gpx.min.js"></script>
    
    <!-- JavaScript for Enhanced Interactive Map -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Initialize Leaflet map
      const map = L.map('interactive-map').setView([-2.26315, 30.63901], 15);
      
      // Add OpenStreetMap tiles
      L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
      }).addTo(map);
      
      // Variables for routing control
      let routingControl = null;
      let currentTransportMode = 'walking';
      let userLocationMarker = null;
      let userLocation = null;
      
      // Add custom marker for TMMZ location
      const customIcon = L.icon({
        iconUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.4/images/marker-icon.png',
        iconSize: [25, 41],
        iconAnchor: [12, 41],
        popupAnchor: [1, -34]
      });
      
      const tmmzLocation = [-2.26315, 30.63901];
      const marker = L.marker(tmmzLocation, {icon: customIcon}).addTo(map)
        .bindPopup(`
          <div class="map-popup">
            <h6>TMMZ</h6>
            <p class="mb-2">Nyamugari Parish, Kirehe</p>
            <div class="d-flex">
              <button class="btn btn-sm btn-primary mr-2" id="popup-directions">
                <i class="fas fa-directions"></i>
              </button>
              <a href="tel:+250788123456" class="btn btn-sm btn-success">
                <i class="fas fa-phone"></i>
              </a>
            </div>
          </div>
        `).openPopup();
      
      // Add points of interest
      const points = [
        {lat: -2.265, lng: 30.637, type: 'bank', name: 'BK Kirehe'},
        {lat: -2.261, lng: 30.642, type: 'market', name: 'Isoko rya Kirehe'},
        {lat: -2.264, lng: 30.640, type: 'school', name: 'G.S. Kirehe'}
      ];
      
      points.forEach(point => {
        let iconColor;
        if(point.type === 'bank') iconColor = '#28a745'; // green
        else if(point.type === 'market') iconColor = '#17a2b8'; // blue
        else iconColor = '#fd7e14'; // orange
        
        L.circleMarker([point.lat, point.lng], {
          radius: 8,
          fillColor: iconColor,
          color: '#fff',
          weight: 1,
          opacity: 1,
          fillOpacity: 0.8
        }).addTo(map).bindPopup(`<b>${point.name}</b><br>${point.type}`);
      });
      
      // Map controls functionality
      document.getElementById('zoom-in').addEventListener('click', () => map.zoomIn());
      document.getElementById('zoom-out').addEventListener('click', () => map.zoomOut());
      
      // Locate me functionality
      document.getElementById('locate-me').addEventListener('click', locateUser);
      
      // Transport mode buttons
      const transportButtons = {
        'walking': document.getElementById('walking-btn'),
        'driving': document.getElementById('driving-btn'),
        'transit': document.getElementById('transit-btn')
      };
      
      Object.keys(transportButtons).forEach(mode => {
        transportButtons[mode].addEventListener('click', () => {
          // Update UI
          Object.values(transportButtons).forEach(btn => btn.classList.remove('active'));
          transportButtons[mode].classList.add('active');
          
          // Update transport mode
          currentTransportMode = mode;
          
          // If we have a route and user location, update the route
          if(routingControl && userLocation) {
            calculateRoute(userLocation, tmmzLocation, mode);
          }
        });
      });
      
      // Get directions button
      document.getElementById('get-directions').addEventListener('click', () => {
        if(userLocation) {
          calculateRoute(userLocation, tmmzLocation, currentTransportMode);
        } else {
          alert('Nyamuneka kanda "Shaka aho uri" mbere yo gusaba inzira.');
        }
      });
      
      // Share location button
      document.getElementById('share-location').addEventListener('click', shareLocation);
      
      // Popup directions button
      document.addEventListener('click', function(e) {
        if(e.target && e.target.id === 'popup-directions') {
          if(userLocation) {
            calculateRoute(userLocation, tmmzLocation, currentTransportMode);
          } else {
            alert('Nyamuneka kanda "Shaka aho uri" mbere yo gusaba inzira.');
          }
        }
      });
      
      // Function to locate user
      function locateUser() {
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(position => {
            const userLat = position.coords.latitude;
            const userLng = position.coords.longitude;
            userLocation = [userLat, userLng];
            
            // Remove previous user marker if exists
            if(userLocationMarker) {
              map.removeLayer(userLocationMarker);
            }
            
            // Add new user marker
            userLocationMarker = L.marker([userLat, userLng], {
              icon: L.divIcon({
                className: 'user-location-icon', 
                html: '<div style="background:#fff;border-radius:50%;width:40px;height:40px;display:flex;align-items:center;justify-content:center;"><i class="fas fa-user text-primary"></i></div>'
              })
            }).addTo(map).bindPopup('Aho uri').openPopup();
            
            // Center map on user location
            map.setView([userLat, userLng], 15);
            
            // Show success message
            alert('Aho uri yagaragaye neza kumikarita!');
            
          }, () => {
            alert('Ntibishoboka kumenya aho uri. Gereranya ko GPS yakunze.');
          }, {
            enableHighAccuracy: true,
            timeout: 10000,
            maximumAge: 0
          });
        } else {
          alert('Ububiko bwakoze ikosa, ntibishoboka kumenya aho uri!');
        }
      }
      
      // Function to calculate route
      function calculateRoute(start, end, transportMode) {
        // Remove previous routing control if exists
        if(routingControl) {
          map.removeControl(routingControl);
        }
        
        // Determine the routing profile based on transport mode
        let profile;
        switch(transportMode) {
          case 'walking':
            profile = 'foot';
            break;
          case 'driving':
            profile = 'car';
            break;
          case 'transit':
            profile = 'bicycle'; // Note: OSRM doesn't have transit, using bicycle as alternative
            break;
          default:
            profile = 'foot';
        }
        
        // Create new routing control
        routingControl = L.Routing.control({
          waypoints: [
            L.latLng(start[0], start[1]),
            L.latLng(end[0], end[1])
          ],
          routeWhileDragging: true,
          showAlternatives: false,
          addWaypoints: false,
          draggableWaypoints: false,
          fitSelectedRoutes: true,
          lineOptions: {
            styles: [
              {color: '#4e73df', opacity: 0.8, weight: 6}
            ]
          },
          createMarker: function() { return null; }, // Don't create markers
          router: L.Routing.osrmv1({
            serviceUrl: 'https://router.project-osrm.org/route/v1',
            profile: profile
          })
        }).addTo(map);
        
        // Customize the route instructions container
        routingControl.on('routesfound', function(e) {
          const routes = e.routes;
          const summary = routes[0].summary;
          
          // Calculate distance and time
          let distance = (summary.totalDistance / 1000).toFixed(1);
          let time = (summary.totalTime / 60).toFixed(0);
          
          // Create custom instructions
          let instructions = `
            <div class="route-instructions p-3">
              <h5>Inzira</h5>
              <div class="d-flex justify-content-between mb-2">
                <span><i class="fas fa-road mr-2"></i>Intera: ${distance} km</span>
                <span><i class="fas fa-clock mr-2"></i>Igihe: ${time} min</span>
              </div>
              <div class="route-steps">
          `;
          
          routes[0].instructions.forEach(instruction => {
            instructions += `<div class="route-step mb-2">${instruction.text}</div>`;
          });
          
          instructions += `</div></div>`;
          
          // Add instructions to the map
          L.popup()
            .setLatLng([start[0], start[1]])
            .setContent(instructions)
            .openOn(map);
        });
      }
      
      // Function to share location
      function shareLocation() {
        if (navigator.share) {
          navigator.share({
            title: 'TMMZ Location',
            text: 'Ahantu duherereye muri Kirehe',
            url: `https://www.google.com/maps/dir/?api=1&destination=${tmmzLocation[0]},${tmmzLocation[1]}&travelmode=${currentTransportMode}`
          }).catch(err => console.log('Error sharing:', err));
        } else {
          // Fallback for browsers that don't support Web Share API
          const shareUrl = `https://www.google.com/maps/dir/?api=1&destination=${tmmzLocation[0]},${tmmzLocation[1]}&travelmode=${currentTransportMode}`;
          prompt('Gukoporora URL:', shareUrl);
        }
      }
    });
    </script>

    <style>
    /* Custom Map Styles */
    .map-card {
      transition: all 0.3s ease;
      border: 1px solid rgba(0,0,0,0.1);
    }

    .map-card:hover {
      box-shadow: 0 10px 30px rgba(0,0,0,0.15) !important;
    }

    .map-header {
      background: linear-gradient(135deg, #4e73df 0%, #224abe 100%);
    }

    .map-container {
      height: 500px;
      overflow: hidden;
      position: relative;
    }

    #interactive-map {
      width: 100%;
      height: 100%;
      z-index: 1;
    }

    .map-overlay-controls {
      position: absolute;
      top: 20px;
      left: 20px;
      z-index: 1000;
    }

    .map-legend {
      max-width: 200px;
      margin-bottom: 15px;
    }

    .legend-icon {
      display: inline-block;
      width: 12px;
      height: 12px;
      border-radius: 50%;
    }

    .btn-locate {
      position: absolute;
      bottom: 20px;
      right: 20px;
      z-index: 1000;
      box-shadow: 0 2px 10px rgba(0,0,0,0.2);
    }

    .map-popup {
      min-width: 200px;
    }

    .leaflet-popup-content {
      margin: 10px !important;
    }
    
    /* Transport mode active state */
    .transport-options .btn.active {
      background-color: #4e73df;
      color: white;
      border-color: #4e73df;
    }
    
    /* Route instructions styling */
    .route-instructions {
      max-height: 300px;
      overflow-y: auto;
    }
    
    .route-step {
      padding: 5px;
      border-left: 3px solid #4e73df;
      background-color: #f8f9fa;
    }

    @media (max-width: 768px) {
      .map-container, #interactive-map {
        height: 350px;
      }
      
      .map-overlay-controls {
        top: 10px;
        left: 10px;
      }
      
      .btn-locate {
        bottom: 10px;
        right: 10px;
      }
      
      .map-legend {
        max-width: 150px;
        padding: 10px !important;
      }
    }
    </style>
  </div>
</div>
  </section>
</main>

<?php
include("footer.php");
?>