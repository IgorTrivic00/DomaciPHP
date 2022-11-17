<?php

session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit();
}

$cookie="";

if (isset($_COOKIE["korisnik"])){
    $cookie= $_COOKIE["korisnik"];
}


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
 
    </head>
    
    <body>

    <div style="width: 100%; height: 50px; background-color: #393E46; display:flex; justify-content: flex-end; align-items:center;">
            <div style="margin-right:50px;"class="col-lg-6 offset-lg-3 text-center">
                <button id="btn-dodaj" type="button" class="btn btn-success" style="background-color: #393E46; border: 1px #393E46;" data-toggle="modal" data-target="#myModal-D">Dodaj automobil</button>
                <button id="btn-izmeni" type="button" class="btn btn-success" style="background-color: #393E46; border: 1px #393E46;" data-toggle="modal" data-target="#myModal-I">Izmeni automobil</button>
                <button id="btn-obrisi" type="button" class="btn btn-success" style="background-color: #393E46; border: 1px #393E46;" data-toggle="modal" data-target="#myModal-O">Obrisi automobil</button>
            </div>  
        <h6 style="border-radius: 25px; padding: 5px;color:gray;background-color:white; margin-right: 10px; margin-left: 250px; margin-top:5px;"id="cookie"><?= $cookie; ?></h6>

    </div>

        <section class="section" id="pretraga" style="padding-top: 100px">
            <div class="container" style="margin-top: 20px">
                <div class="row">
                    <div class="col-lg-4 offset-lg-4 text-center">
                        <div class="section-heading">
                            <h2 style="color: white; text-shadow: 3px 5px grey; font-size: 40px">Rent A Car</h2>
                            <h5 id="info"></h5>
                            <br><br>
                        </div>
                    </div>
                </div>
            </div>

          
            
            <div class="row" style="width:50%; margin:auto; margin-top: 1%">
                <label for="proizvodjac-P">Model</label>
                <select class="form-control" id="proizvodjac-P"></select>
                <label for="sort-P">Cena</label>
                <select class="form-control" id="sort-P">
                    <option value="asc">Najniza ka najvecoj</option>
                    <option value="desc">Najveca ka najnizoj</option>
                </select>
            </div>
            <br><br>
            <div class="col-lg-4 offset-lg-4 text-center">
                <button class="btn btn-primary" style="background-color: #393E46; border: 1px #393E46;" onclick="pretraga()">Pretrazi</button>
            </div>
            
            <div class="row" id="rezultat" style="padding-top: 10px; width: 90%; margin: auto;"></div>
        </section>
        <div style="height: 50px; background-color: #393E46; margin-top: 200px; margin-bottom:0;"></div>
<!------------------ DODAJ -------------------------------->
    <div class="modal fade" id="myModal-D" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content" style="width: 565px;">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="container form">
                        <form action="#" method="post" id="dodajForm">
                            <h2 style="color: black; text-align: center; width: 500px;">Dodaj automobil</h2>
                            <div class="row" style="color: black;">
                                <div class="col-md-12">
                                    <div class="form-group">

                                        <label for="naziv-D">Naziv</label>
                                        <input type="text" class="form-control" id="naziv-D">
                                        
                                        <label for="proizvodjac-D">Proizvodjac</label>
                                        <select name="proizvodjac-D" id="proizvodjac-D" style="border: 1px solid black" class="form-control"></select>
                                        
                                        <label for="motor-D">Motor</label>
                                        <select class="form-control" id="motor-D">
                                            <option value="Dizel">Dizel</option>
                                            <option value="Benzin">Benzin</option>
                                        </select>

                                        <label for="prenos-D">Prenos</label>
                                        <select class="form-control" id="prenos-D">
                                            <option value="Manuelni">Manuelni</option>
                                            <option value="Automatski">Automatski</option>
                                        </select>


                                        <label for="tip-D">Tip</label>
                                        <select name="tip-D" id="tip-D" style="border: 1px solid black" class="form-control"></select>
                                        
                                        <label for="cena-D">Cena (€/dan)</label>
                                        <input type="number" class="form-control" id="cena-D">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <br>
                                    <button id="btnDodaj" type="button" class="btn btn-success btn-block" style="background-color: #393E46; border: 1px #393E46;" onclick="dodajAutomobil()">Dodaj</button>
                                    <br><br>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    


<!------------------ IZMENI -------------------------------->
    <div class="modal fade" id="myModal-I" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content" style="width: 565px;">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="container form">
                        <form action="#" method="post" id="izmeniForm">
                            <h2 style="color: black; text-align: center; width: 500px;">Izmeni automobil</h2>
                            <div class="row" style="color: black;">
                                <div class="col-md-12">
                                    <div class="form-group">

                                        <label for="automobil-I">Odaberi automobil</label>
                                        <select name="automobil-I" id="automobil-I" style="border: 1px solid black" class="form-control"></select><br>

                                        <label for="cena-I">Cena</label>
                                        <input type="number" class="form-control" id="cena-I">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <br>
                                    <button id="btnIzmeni" type="button" class="btn btn-success btn-block" style="background-color: #393E46; border: 1px #393E46;" onclick="izmeniAutomobil()">Izmeni</button>
                                    <br><br>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <!------------------ OBRISI -------------------------------->
    <div class="modal fade" id="myModal-O" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content" style="width: 565px;">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="container form">
                        <form action="#" method="post" id="obrisiForm">
                            <h2 style="color: black; text-align: center; width: 500px;">Obrisi automobil</h2>
                            <div class="row" style="color: black;">
                                <div class="col-md-12">
                                    <div class="form-group">

                                        <label for="automobil-O">Odaberi automobil</label>
                                        <select name="automobil-O" id="automobil-O" style="border: 1px solid black" class="form-control"> </select>
                                    </div>
                                    <div class="col-md-4">
                                        <br>
                                        <button id="btnObrisi" type="button" class="btn btn-success btn-block" style="background-color: #393E46; border: 1px #393E46;" onclick="obrisiAutomobil()">Obrisi</button>
                                        <br><br>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="assets/js/jquery-2.1.0.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
 
 

    <script>

        function popuniProizvodjace() {
            $.ajax({
                url: 'server_proizvodjaci.php',
                success: function (data) {
                    let t = "<option value='0'>Svi</option>" + data;
                    $("#proizvodjac-P").html(t);
                }
            })
        }

        function popuniProizvodjaceD() {
            $.ajax({
                url: 'server_proizvodjaci.php',
                success: function (data) {
                    $("#proizvodjac-D").html(data);
                }
            })
        }

        function popuniAutomobile() {
            $.ajax({
                url: 'server_automobili.php',
                success: function (data) {
                    $("#automobil-I").html(data);
                    $("#automobil-O").html(data);
                }
            })
        }

        function popuniTipove() {
            $.ajax({
                url: 'server_tipovi.php',
                success: function (data) {
                    $("#tip-D").html(data);
        
                }
            })
        }
        
        function pretraga() {
        

            let proizvodjac = $("#proizvodjac-P").val();
            let sort = $("#sort-P").val();

            $.ajax({
                url: 'server_pretraga.php',
                data: {
                    proizvodjac: proizvodjac,
                    sort: sort
                },
                success: function (data) {

                    $("#rezultat").html(data);
                }
            })
        }
        popuniProizvodjaceD();
        popuniProizvodjace();
        popuniTipove();
        popuniAutomobile();

        function dodajAutomobil() {
            let naziv = $("#naziv-D").val();
            let proizvodjac = $("#proizvodjac-D").val();
            let motor = $("#motor-D").val();
            let prenos = $("#prenos-D").val();
            let tip = $("#tip-D").val();
            let cena= $("#cena-D").val();
   
            
            $.ajax({
                url: 'server_unos_automobila.php',
                method: 'post',
                data: {
                    naziv: naziv,
                    proizvodjac: proizvodjac,
                    motor: motor,
                    prenos: prenos,
                    tip: tip,
                    cena: cena
                },
                success: function (data) {
                    $("#info").html(data);
                    popuniAutomobile();
                    pretraga();
                }
            })
        }

        function izmeniAutomobil() {
            let automobil = $("#automobil-I").val();
            let cena = $("#cena-I").val();
            $.ajax({
                url: 'server_izmena_automobila.php',
                method: 'post',
                data: {
                    automobil: automobil,
                    cena: cena
                },
                success: function (data) {

                    $("#info").html(data);
                    popuniAutomobile();
                    pretraga();
                }
            })
        }

        function obrisiAutomobil() {
            let automobil = $("#automobil-O").val();
            $.ajax({
                url: 'server_brisanje_automobila.php',
                method: 'post',
                data: {
                    automobil: automobil
                },
                success: function (data) {

                    $("#info").html(data);
                    popuniAutomobile();
                    pretraga();
                }
            })
        }

    </script>
  </body>
</html>