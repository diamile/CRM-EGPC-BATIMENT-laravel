<aside class="col-md-2 SideNav">
        <ul class="list-group">
        <li class="list-group-item"><a href="{{route('home')}}"><i class="fa fa-address-card" ></i>&nbsp;Listes des client</a></li>
        <li class="list-group-item"><a href="#"><i class="fa fa-address-card" ></i>&nbsp;Listes des contrats</a></li>
        </ul>

        
        <ul class="list-group">
                <li class="list-group-item"><a href="{{route('user_data.create')}}"><i class="fa fa-user-plus" aria-hidden="true"></i> Création d'utilisateurs</a></li> 
        </ul>

      
       <a href="/"   data-toggle="dropdown" class="list-group-item">
         relations clients
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="{{route('projets')}}"><i class="fa fa-folder" aria-hidden="true"></i>&nbsp;&nbsp;projets</a>
        <a class="dropdown-item" href="#">factures</a>
        <a class="dropdown-item" href="{{ route('devis-list')}}">devis</a>
        <a class="dropdown-item" href="#">Affaires</a>
        <a class="dropdown-item" href="#">Commandes</a>
        <a class="dropdown-item" href="#">Bon de commande</a>
      </div>



      <div style="cursor:pointer; color:#18BC9C">
      <a  class="list-group-item" data-toggle="dropdown">
      <img src="https://img.icons8.com/ios-filled/30/000000/accounting.png"/> Comptabilité
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="#">Liste des frais</a>
        <a class="dropdown-item" href="{{ route('decaissements')}}">Liste des Decaissements</a>
        <a href="#"><i class="fa fa-user-plus" aria-hidden="true"></i>&nbsp;&nbsp;Ajouter un frais</a>
        
      </div>
    </div>

    <ul class="list-group">
        <li class="list-group-item"><a href="#"><img src="https://img.icons8.com/ios-glyphs/30/000000/money-bag-euro.png"/>&nbsp;&nbsp;Ajouter un frais</a></li>
        <li class="list-group-item"><a href="#"><img src="https://img.icons8.com/ios-glyphs/30/000000/money-bag-euro.png"/>&nbsp;&nbsp;Ajouter un décaissement</a></li> 
    </ul>

    <ul class="list-group">
        <li class="list-group-item"><a href="#"><img src="https://img.icons8.com/ios/30/000000/leave.png"/>&nbsp;&nbsp;Ajouter un congé</a></li>
        <li class="list-group-item"><a href="{{route('projet-create')}}">&nbsp;&nbsp;Ajouter un nouveau projet</a></li>
        
    </ul>

    <ul class="list-group">
        <li class="list-group-item"><a href="#"><img src="https://img.icons8.com/ios/30/000000/create-order.png"/>&nbsp;&nbsp;Ajouter une commande</a></li>
        <li class="list-group-item"><a href="#"><img src="https://img.icons8.com/ios/30/000000/purchase-order.png"/>&nbsp;&nbsp;Ajouter un bon de commande</a></li>
        <li class="list-group-item"><a href="{{route('create-devis')}}"><img src="https://img.icons8.com/ios/30/000000/quote-right.png"/>&nbsp;&nbsp;Ajouter un devis</a></li>
        <li class="list-group-item"><a href="{{route('suivis')}}"><i class="fa fa-user-plus" aria-hidden="true"></i>&nbsp;&nbsp;Liste des suivis</a></li>
        <li class="list-group-item"><a href="#"><img src="https://img.icons8.com/wired/30/000000/task--v3.png"/>&nbsp;&nbsp;Liste des taches</a></li>
        
        
    </ul>

    </aside>
    
    