<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA-5RQjpTb8ixazSXtmt25m7QtRsAzy0nE"></script>
<style>
    #map-canvas {
        height: 300px
    }

    .two-fields {
        width: 100%;
    }

    .two-fields .input-group {
        width: 100%;
    }

    .two-fields input {
        width: 50% !important;
    }
</style>
<div class="container">
    <div class="panel-body">
        <div class="row">
            <div class="col-md-6">
                <form class="commonForm"
                      action="<?php echo base_url(); ?>clugares/guardar" method="post">

                    <fieldset>
                        <h3 class="dark-grey">Alta de Lugar</h3>
                        <div class="form-group col-lg-12">
                            <label>Nombre:</label> <input type="text" class="form-control"
                                                          name="nombre">
                        </div>
                        <div class="form-group col-lg-12">
                            <label>Direccion:</label> <input type="text" class="form-control"
                                                             name="Direccion">
                        </div>
                        <div class="form-group col-lg-12">
                            <label>Descripcion:</label> <input type="text" class="form-control"
                                                               name="Direccion">
                        </div>
                        <div class="form-group col-lg-12">
                            <label>Deporte:</label> <select class="form-control" name="ciudad">
                                <?php
                                foreach ($ciudades as $ci) :
                                ?>
                                <option value="<?php echo $ci->idCiudad ?>"><?php echo $ci->Nombre ?>
                                    <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group col-lg-12">
                            <label>Ciudad:</label> <input id="ciudad" type="text" class="form-control"
                                                             name="Ciudad" disabled>
                        </div>

                        <div class="form-group col-lg-12">
                            <label>Imagen:</label>
                            <div class="input-group image-preview">
                                <input type="text" class="form-control image-preview-filename" disabled="disabled">
                                <!-- don't give a name === doesn't send on POST/GET -->
                                <span class="input-group-btn">
                                    <!-- image-preview-clear button -->
                                    <button type="button" class="btn btn-default image-preview-clear"
                                            style="display:none;">
                                        <span class="glyphicon glyphicon-remove"></span> Clear
                                    </button>
                                    <!-- image-preview-input -->
                                    <div class="btn btn-default image-preview-input">
                                        <span class="glyphicon glyphicon-folder-open"></span>
                                        <span class="image-preview-input-title">Browse</span>
                                        <input type="file" accept="image/png, image/jpeg, image/gif"
                                               name="input-file-preview"/> <!-- rename it -->
                                    </div>
                                </span>
                            </div>
                        </div>

                        <div class="submitCont">
                            <button id="saveButton" type="submit"
                                    onclick="confirm('¿Desea guardar el Lugar?')"
                                    class="login-button">Guardar
                            </button>
                            <input type="hidden" name="idLugar">
                        </div>
                    </fieldset>
                </form>
            </div>
            <div class="col-md-6">
                <h3 class="dark-grey">Mapa de google</h3>
                <div class="form-group col-lg-12">
                    <div class="input-group">
                  <span class="input-group-addon"> <i
                              class="glyphicon glyphicon-globe"></i>
                  </span>
                        <input type="text" class="form-control" id="latitud" placeholder="Latitud" disabled>
                        <span class="input-group-addon">-</span>
                        <input type="text" class="form-control" id="longitud" placeholder="Longitud" disabled>
                    </div>
                </div>
                <div class="form-group col-lg-12">
                    <div id="map-canvas"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    // In the following example, markers appear when the user clicks on the map.
    // The markers are stored in an array.
    // The user can then click an option to hide, show or delete the markers.

    var map;
    var markers = [];

    google.maps.event.addDomListener(window, 'load', initialize);

    function initialize() {
        var initialPoint = new google.maps.LatLng(-40.81419898875185, -62.99811172590125);
        var mapOptions = {
            zoom: 15,
            center: initialPoint,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

        // This event listener will call addMarker() when the map is clicked.
        google.maps.event.addListener(map, 'click', function (event) {
            addMarker(event.latLng);

            //get data of point to form
            //marker = new google.maps.Marker({position: event.latLng, map: map});

            saveData(map, event);
        });


        // Adds a marker at the center of the map.
        addMarker(initialPoint);
    }

    function saveData(map, event) {
        document.getElementById("latitud").value = event.latLng.lat();
        document.getElementById("longitud").value = event.latLng.lng();

        var latlng = {
            lat: event.latLng.lat(),
            lng: event.latLng.lng()
        };
        var geocoder = new google.maps.Geocoder;
        geocoder.geocode({
            'location': latlng
            // ej. "-34.653015, -58.674850"
        }, function (results, status) {
            if (status === google.maps.GeocoderStatus.OK) {
                if (results[1]) {
                    var string = results[1].formatted_address;
                    document.getElementById("ciudad").value = string.split(',')[0];
                } else {
                    window.alert('No hay resultados');
                }
            } else {
                window.alert('Geocoder failed due to: ' + status);
            }
        });
    }

    // Add a marker to the map and push to the array.
    function addMarker(location) {
        clearMarkers();
        var marker = new google.maps.Marker({
            position: location,
            map: map,
            draggable: true
        });

        google.maps.event.addListener(marker, 'dragend', function (event) {
            saveData(map, event);

        });

        markers.push(marker);
    }

    // Sets the map on all markers in the array.
    function setAllMap(map) {
        for (var i = 0; i < markers.length; i++) {
            markers[i].setMap(map);
        }
    }

    // Removes the markers from the map, but keeps them in the array.
    function clearMarkers() {
        setAllMap(null);
    }

    // Shows any markers currently in the array.
    function showMarkers() {
        setAllMap(map);
    }

    // Deletes all markers in the array by removing references to them.
    function deleteMarkers() {
        clearMarkers();
        markers = [];
        $('#position').val('0,0,0');
    }

    ///////////////IMPUT IMAGEN

    $(function () {
        // Create the close button
        var closebtn = $('<button/>', {
            type: "button",
            text: 'x',
            id: 'close-preview',
            style: 'font-size: initial;',
        });
        closebtn.attr("class", "close pull-right");
        // Set the popover default content
        $('.image-preview').popover({
            trigger: 'manual',
            html: true,
            title: "<strong>Preview</strong>" + $(closebtn)[0].outerHTML,
            content: "There's no image",
            placement: 'bottom'
        });
        // Clear event
        $('.image-preview-clear').click(function () {
            $('.image-preview').attr("data-content", "").popover('hide');
            $('.image-preview-filename').val("");
            $('.image-preview-clear').hide();
            $('.image-preview-input input:file').val("");
            $(".image-preview-input-title").text("Browse");
        });
        // Create the preview image
        $(".image-preview-input input:file").change(function () {
            var img = $('<img/>', {
                id: 'dynamic',
                width: 250,
                height: 200
            });
            var file = this.files[0];
            var reader = new FileReader();
            // Set preview image into the popover data-content
            reader.onload = function (e) {
                $(".image-preview-input-title").text("Change");
                $(".image-preview-clear").show();
                $(".image-preview-filename").val(file.name);
                img.attr('src', e.target.result);
                $(".image-preview").attr("data-content", $(img)[0].outerHTML).popover("show");

                $('.close-preview').click(function () {
                    $('.image-preview').popover('hide');
                    // Hover befor close the preview
                    $('.image-preview').hover(
                        function () {
                            $('.image-preview').popover('show');
                        },
                        function () {
                            $('.image-preview').popover('hide');
                        }
                    );
                });
            }
            reader.readAsDataURL(file);
        });

        $(document).on('click', '#close-preview', function () {
            $('.image-preview').popover('hide');
            // Hover befor close the preview
            $('.image-preview').hover(
                function () {
                    $('.image-preview').popover('show');
                },
                function () {
                    $('.image-preview').popover('hide');
                }
            );
        });
    });

</script>

<style>
    .container {
        margin-top: 20px;
    }

    .image-preview-input {
        position: relative;
        overflow: hidden;
        margin: 0px;
        color: #333;
        background-color: #fff;
        border-color: #ccc;
    }

    .image-preview-input input[type=file] {
        position: absolute;
        top: 0;
        right: 0;
        margin: 0;
        padding: 0;
        font-size: 20px;
        cursor: pointer;
        opacity: 0;
        filter: alpha(opacity=0);
    }

    .image-preview-input-title {
        margin-left: 2px;
    }
</style>