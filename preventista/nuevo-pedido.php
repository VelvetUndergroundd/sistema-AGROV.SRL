<!DOCTYPE html>
<html>
<head>

<meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Register - SB Admin</title>
        <link href="../css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

    <title>Mapa interactivo</title>
    <style>
        #mapa {
            height: 350px; /* Altura del mapa */
            width: 100%;
            margin-top: 20px; /* Margen superior para separar el mapa del campo de texto */
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header">
                        <h3 class="text-center font-weight-light my-4">Nuevo Pedido</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="registrar-producto.php">

                        <div class="form-floating mb-3">
                                <label for="productoSelect">Selecciona un Producto</label>
                                <select class="form-select" id="productoSelect" name="productoSelect">
                                    <!-- Opciones de la lista desplegable -->
                                    <option value="Producto1">Producto 1 - Precio: $10 - Stock: 50</option>
                                    <option value="Producto2">Producto 2 - Precio: $15 - Stock: 30</option>
                                    <option value="Producto3">Producto 3 - Precio: $20 - Stock: 20</option>
                                    <!-- Agrega más opciones aquí con datos de tu base de datos -->
                                </select>
                            </div>

                                        
                            <div class="form-floating mb-3">
                                <input class="form-control" id="inputPreventista" name="inputPreventista" type="text" placeholder="Definir el Preventista" />
                                    <label for="inputPreventista">Preventista</label>
                                </div>
                                        
                            <div class="form-floating mb-3">
                                <input class="form-control" id="inputDistribuidor" name="inputDistribuidor" type="text" placeholder="Definir el Distribuidor" />
                                    <label for="inputDistribuidor">Distribuidor</label>
                                </div>

                            <div class="form-floating mb-3">
                                <input class="form-control" id="inputGeolocalizacion" name="inputGeolocalizacion" type="text" placeholder="Geolocalización" readonly />
                                <label for="inputGeolocalizacion">Geolocalización</label>
                            </div>

                            <div id="mapa"></div> <!-- Nuevo div para el mapa -->

                            <div class="mt-4 mb-0">
                                <div class="d-grid">
                                    <button class="btn btn-primary btn-block" type="submit">Registrar nuevo Producto</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Función para inicializar el mapa y agregar marcadores
        function initMap() {
            var map = new google.maps.Map(document.getElementById('mapa'), {
                zoom: 15,
                center: { lat: -17.3895, lng: -66.151885 }
            });

            var marker = new google.maps.Marker({
                position: { lat: -17.380028, lng: -66.152022 }, // Coordenadas por defecto
                map: map,
                icon: {
                    path: google.maps.SymbolPath.CIRCLE,
                    scale: 8,
                    fillColor: 'red',
                    fillOpacity: 1,
                    strokeColor: 'white',
                    strokeWeight: 2
                }
            });

            var geolocalizacionInput = document.getElementById('inputGeolocalizacion');

            map.addListener('click', function(event) {
                var latitude = event.latLng.lat();
                var longitude = event.latLng.lng();
                var coordinates = latitude.toFixed(6) + ', ' + longitude.toFixed(6);

                marker.setPosition(event.latLng);

                // Actualizar el campo de texto con las coordenadas
                geolocalizacionInput.value = coordinates;
            });
        }
    </script>
    <script src="geol.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyByBL6NMGLshPSLUHcBkrtN1iL9PvRUEh4&callback=initMap" async defer></script>
</body>
</html>
