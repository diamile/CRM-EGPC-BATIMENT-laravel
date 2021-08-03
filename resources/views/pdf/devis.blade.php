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
        <span style="margin-left:550px">Dakar, le 01 Mars 2021</span>
        <div style="display:flex; flex-direction:row; justify-content:space-between">
        <div style="width:100%;color:blue">
           <h4 style="text-decoration:underline">TRAVAUX : </h4> 
        <div>

        <div style="width:100%;color:blue">
           <h4 style="text-decoration:underline">CLIENTS : </h4> 
        </div>

        </div>

        <div>
          <h1 style="text-align:center;color:black;text-decoration:underline">DEVIS N° 056/01/21</h1>
        </div>
    </header>

    <article style="margin-bottom:50px;">

    <table  style="width:700px;border:1px solid black;color:black">
              <thead style="width:700px;background-color:gray">
                  <tr style="width:100%;border:1px solid black">
                      <th style="width: 40%;border:1px solid black">
                         DESIGNATION
                      </th>
                      <th style="width: 20%;border:1px solid black">
                         QTE
                      </th>
                      <th style="width: 20%;border:1px solid black">
                         Unité
                      </th>
                      <th style="width: 20%;border:1px solid black">
                          P.Unitaire HT
                      </th>
                      <th style="width:20%;border:1px solid black">
                          P.Total HT
                      </th>
                     
                  </tr>
              </thead>
              <tbody style="border:1px solid black">
             

                 @foreach($devis_lignes as $item)
                  <tr style="border:1px solid black">
                      <td style="border:1px solid black">
                         {{$item->designation}}
                      </td>
                      <td style="border:1px solid black">
                         {{$item->quantity}}
                      </td>
                      <td style="border:1px solid black">
                         unité
                      </td>
                      <td style="border:1px solid black">
                        {{$item->prix_unitaire}}
                     </td>
                      <td style="border:1px solid black">
                      {{$item->prix_total}}
                      </td>
                     
                  </tr>

                  @endforeach

              </tbody>
          </table>
          <div style="border:1px solid black !important;display:flex;flex-direction:row;mt-20 pt-20;background-color:gray;color:black">
         <div style="width:462px;border:1px solid black;height:50px;background-color:gray;">
           MONTANT TOTAL
         </div>
         <div style="width:234px;margin-left:464px;border:1px solid black;height:50px;background-color:gray">
            <span style="margin-left:70px;">{{$total}}  FCFA </span><br>
         </div>
         </div>
          <span>Arrêté le présent DEVIS à la somme de {{ testdata($total)}} </span>
          
    
    </article>

    <section style="display:flex;flex-direction:row; justify-content:space-between;mt-10 pt-10;height:220px">
     <div style="width:450px;height:60px;border:1px solid black">
      NB : 
     </div>
     <div style="width:150px;margin-left:550px;">
      <span style="text-decoration:underline">Mr MOUSSA SARR</span><br>
       <span>Administrateur EGPC</span>
     </div>
    </section>

    <footer style="margin-top:-20px">
       <hr style="color:black">
       <img src="{{ public_path('images/footer-logo.png') }}" style="width:450px; height:80px;margin-left:120px !important;">
       
    </footer>
    


    
</body>
</html>