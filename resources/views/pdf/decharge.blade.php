<!DOCTYPE html>
<html>
<head>
    <title>PROFORMA</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>

    <header>
        <img src="{{ public_path('images/header-logo.png') }}" style="width:700px; height:150px;margin-right:100px">
        <hr>

        <div style="width:100%;height:30px;margin-top:100px">
          <h2 style="text-align:center;padding:5px 10px;text-decoration:underline">DECHARGE</h2>
        </div>
    </header>

     <article style="margin-bottom:50px;text-align:center">
     <p style="font-size:20px">Je soussigné Mr {{$decharge->prestataire}}, atteste par cette présente avoir reçu la somme <br>
     de {{$decharge->montant}} FCFA destiné à ................................................<br>
     Cette somme lui est remis comme ............est le solde de ................<br>
     lui sera remis dés que ......................................................<br>
     En foi de quoi, nous lui remettrons cette decharge qu'il signe pour servir et<br>
     valoir ce que de droit.
     </p><br>
     <p></p><br>
     <p></p>
   </article>


    
    <div style="dispay:flex; flex-direction:row;justify-content:space-between;margin-left:20px;">
                  <span class="col-sm-4" style="margin-left:10px;font-weight:bold;text-decoration:underline">MR BENEFICIAIRE</span>
                  <span class="col-sm-8" style="margin-left:200px;font-weight:bold;text-decoration:underline">EGPC BATIMENT LA COMPTABILITE</span>
    </div>
   
    


    
</body>
</html>