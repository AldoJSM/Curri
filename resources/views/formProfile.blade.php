<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://unicons.iconscout.com/release/v2.1.9/css/unicons.css'>
    <link rel="stylesheet" href="../assets/css/style.css">


</head>

<body>


    <div class="section ">
        <div class="container">
            <div class="row full-height justify-content-center">
                <div class="col-12 text-center align-self-center py-5">
                    <div class="section pb-5 pt-5 pt-sm-2 text-center">
                        <div class="card-3d-wrap mx-autoo">
                            <div class="card-3d-wrapper">
                                <div class="card-front">
                                    <div class="center-wrap">
                                        <form action="{{ route('registerProfile') }}" method="POST"
                                            enctype="multipart/form-data">
                                            <div class="section text-center">
                                                @csrf
                                                <h4 class="mb-4 pb-3">Registro</h4>
                                                <div class="form-group">
                                                    <input type="text" name="Nombres" class="form-style"
                                                        placeholder="Nombre(s)*" id="logname" autocomplete="off"
                                                        required>
                                                    <i class="input-icon uil uil-user"></i>
                                                </div>
                                                <div class="form-group mt-2">
                                                    <input type="text" name="apellidop" class="form-style"
                                                        placeholder="Apellido paterno" id="logemail" autocomplete="off"
                                                        required>
                                                    <i class="input-icon uil uil-user-square"></i>
                                                </div>
                                                <div class="form-group mt-2">
                                                    <input type="text" name="apellidom" class="form-style"
                                                        placeholder="Apellido materno" id="logpass" autocomplete="off"
                                                        required>
                                                    <i class="input-icon uil uil-user-square"></i>
                                                </div>
                                                <div class="form-group mt-2">
                                                    <input type="file" name="image" class="form-style"
                                                        placeholder="Archivo" id="logpass" autocomplete="off"
                                                        required>
                                                    <i class="input-icon uil uil-image"></i>
                                                </div>
                                                <div class="form-group mt-2">
                                                    <select name="pais" class="form-style" id="pais">
                                                        <option value="" selected disabled>Selecciona un pais
                                                        </option>
                                                        @foreach ($countrys as $country)
                                                            <option value="{{ $country->id }}">{{ $country->Pais }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <i class="input-icon uil uil-map-marker-alt"></i>
                                                </div>
                                                <div class="form-group mt-2">
                                                    <select name="estado" class="form-style" id="estado">
                                                        <option value="" selected disabled>Selecciona un Estado
                                                        </option>
                                                        <option value=""></option>
                                                    </select>
                                                    <i class="input-icon uil uil-map"></i>
                                                </div>
                                                <div class="form-group mt-2">
                                                    <select name="municipio" class="form-style" id="municipio">
                                                        <option value="" selected disabled>Selecciona un Municipio
                                                        </option>
                                                        <option value=""></option>
                                                    </select>
                                                    <i class="input-icon uil uil-map"></i>
                                                </div>
                                                <div class="form-group mt-2">
                                                    <input type="number" name="numeroCalle" class="form-style"
                                                        placeholder="Numero de calle" id="logpass" autocomplete="off"
                                                        required>
                                                    <i class="input-icon uil uil-directions"></i>
                                                </div>
                                                <div class="form-group mt-2">
                                                    <input type="text" name="calle" class="form-style"
                                                        placeholder="Calle" id="logpass" autocomplete="off" required>
                                                    <i class="input-icon uil uil-directions"></i>
                                                </div>
                                                <div class="form-group mt-2">
                                                    <input type="text" name="colonia" class="form-style"
                                                        placeholder="Colonia" id="logpass" autocomplete="off"
                                                        required>
                                                    <i class="input-icon uil uil-location-point"></i>
                                                </div>
                                                <div class="form-group mt-2">
                                                    <input type="number" name="codigoPostal" class="form-style"
                                                        placeholder="Codigo postal" id="numeroCP" required>
                                                    <i class="input-icon uil uil-parcel"></i>
                                                </div>
                                                <br>
                                                <h4 class="mb-4 pb-3">Lenguajes de programació</h4>
                                                <div class="form-group mt-2" id="habilidades">

                                                </div>

                                                <a id="add_language" class="btn mt-4"
                                                    onclick="addLanguageLine()">Añadir lenguaje de
                                                    programación</a>
                                                <input type="hidden" name="variable" id="variable" value="">
                                                <button type="submit" onclick="numero()"
                                                    class="btn mt-4">Enviar</button>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.slim.js"
        integrity="sha256-dWvV84T6BhzO4vG6gWhsWVKVoa4lVmLnpBOZh/CAHU4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"
        integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $('#pais').on('change', function() {
            var country_id = $(this).val();
            $.ajax({
                url: '{{ route('consultaAjax') }}',
                type: 'GET',
                dataType: 'json',
                data: {
                    country_id: country_id
                },
                success: function(response) {
                    var selectEstado = $('#estado');
                    selectEstado.empty();
                    $.each(response, function(key, value) {
                        selectEstado.append('<option value="' + value.id + '">' + value.Estado +
                            '</option>');
                    });
                },
                error: function(xhr, status, error) {
                    console.log(error);
                    // Agrega aquí la lógica para manejar el error
                }
            });
        });
        $('#estado').change(function() {
            var state_id = $(this).val();
            $.ajax({
                url: '{{ route('getMunicipios') }}',
                type: 'GET',
                dataType: 'json',
                data: {
                    state_id: state_id
                },
                success: function(response) {
                    var municipiosSelect = $('#municipio');
                    municipiosSelect.empty();
                    $.each(response, function(key, value) {
                        municipiosSelect.append('<option value="' + value.id + '">' +
                            value.Nombre + '</option>');
                    });
                },
                error: function(xhr, status, error) {
                    console.log(error);
                    // Agrega aquí la lógica para manejar el error
                }
            });
        });
    </script>

    <script>
        var lineCount = 0;
        var rangeId = [];
        document.getElementById('variable').value = lineCount;

        function addLanguageLine() {

            var i = document.createElement('input');
            i.setAttribute("type", "text");
            i.setAttribute("placeholder", "Nombre del lenguaje de programacion " + ++lineCount);
            i.setAttribute("id", "lenguaje" + lineCount);
            i.setAttribute("name", "lenguaje" + lineCount);
            i.setAttribute("class", "form-style");

            var j = document.createElement('div');
            var newContent = document.createTextNode("Nivel de conocimiento");

            rangeId.push('nivel' + lineCount);

            var q = document.createElement('div');
            q.setAttribute('class', 'value');
            q.setAttribute('id', 'porcentaje' + rangeId[lineCount - 1]);
            var newC = document.createTextNode("50");

            var k = document.createElement('input');
            k.setAttribute("type", "range");
            k.setAttribute("min", "0");
            k.setAttribute("max", "100");
            k.setAttribute("class", "rango");
            k.setAttribute("value", "50");
            k.setAttribute("id", rangeId[lineCount - 1]);
            k.setAttribute("name", rangeId[lineCount - 1]);
            k.setAttribute("onchange", "actualizar(" + lineCount + "," + lineCount + ")");

            var desc = document.createElement('input');
            desc.setAttribute("type", "text");
            desc.setAttribute("placeholder", "Agrega una descripcion descripción ");
            desc.setAttribute("id", "descripcion" + lineCount);
            desc.setAttribute("name", "descripcion" + lineCount);
            desc.setAttribute("class", "form-style");



            var languageContainer = document.getElementById("habilidades");

            var section = document.createElement('div');
            section.setAttribute("class", "form-group mt-2");
            section.setAttribute("id", "section" + lineCount);

            languageContainer.appendChild(section);

            var s = document.getElementById("section" + lineCount);

            s.appendChild(i);
            s.appendChild(j);
            j.appendChild(newContent);
            s.appendChild(q);
            q.appendChild(newC);
            s.appendChild(k);
            s.appendChild(desc);



        }

        function actualizar(nivel, procentaje) {
            var rango = document.getElementById("nivel" + nivel);
            var divValor = document.getElementById("porcentajenivel" + procentaje);
            divValor.innerHTML = rango.value;
        }

        function numero() {
            document.getElementById('variable').value = lineCount;
        }
    </script>
    <style>
        .rango {
            -webkit-appearance: none;
            width: 200px;
            height: 2px;
            background: #4471ef;
            border: none;
            outline: none;
        }

        .rango::-webkit-slider-thumb {
            -webkit-appearance: none;
            width: 20px;
            height: 20px;
            background: #eee;
            border: 2px solid #4471ef;
            border-radius: 50%;
        }

        .rango::-webkit-slider-thumb:hover {
            background: #4471ef;
        }

        .value {
            color: #4471ef;
            text-align: center;
            font-weight: 600;
            line-height: 40px;
            height: 40px;
            overflow: hidden;
            margin-left: 10px;
        }
    </style>

    <!-- partial
    <script src="./script.js"></script>
    -->

</body>

</html>
