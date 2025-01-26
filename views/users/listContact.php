<?php require 'templates/header.php'; ?>


<div class="container-list">
    <div class="list-title">
        <h2>La liste des contacts</h2>
        <div class="search-bar">
            <form action="/?route=searchContact" method="post">
                <select name="get_by" id="get_by" class="btn" required>
                    <option value="">Rechercher par </option>
                    <option value="Prenom">Prenom</option>
                    <option value="Nom">Nom</option>
                    <option value="Email">Email</option>
                    <option value="Telephone">Telephone</option>
                </select>
                <input type="search" name="search" placeholder="Rechercher par prenom,nom ..." required>
                <button type="submit" class="btn-search">Rechercher</button>
            </form>
        </div>
    </div>
    
    <div class="list-contacts">
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Prenom</th>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Telephone</th>
                    <th>Adresse</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                   
                   if (isset($contacts) && sizeof($contacts)!==0) {
                    # code...
                    $content_tbody='' ;
                    foreach ($contacts as  $contact) {
                     $adresse=$contact["adresse"] ?? '' ;
                     $description=$contact["description"] ?? '' ;
                     $content_tbody .=' 
                        <tr>
                           <td>'.$contact["id"].'</td>
                           <td>'.$contact["first_name"].'</td>
                           <td>'.$contact["last_name"].'</td>
                           <td>'.$contact["email"].'</td>
                           <td>'.$contact["phone"].'</td>
                           <td>'.$adresse.'</td>
                           <td>'.$description.'</td>
                           <td><a href="/?route=update&id='.$contact["id"].'" class="btn-update btn">modifier</a>
                            <a href="/?route=delete&id='.$contact["id"].'" class="btn-danger btn">Supprimer</a></td>
                      </tr>
                       ' ;
                    }
                      echo $content_tbody ;
                   }
                ?>
            </tbody>
        </table>
    </div>
</div>
























<?php require 'templates/footer.php'; ?>