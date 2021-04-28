<!DOCTYPE html>
<html>
        <head>
            <title>Récupération des données</title>

        </head>

        <body> 
<?php
//connexion a la base de données
//instanciation d'un objet PDO pour créer une connexion a la base de données 
        $bddPDO = new PDO('mysql:host=localhost:3306;dbname=webtoup', 'root', "");

        $bddPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $requete = "SELECT * FROM clients ORDER BY id_clients ASC";
        $result = $bddPDO->query($requete);

        if (!$result){
            echo "La récupération des données a rencontré un problème";
        }else{
            $nbre_clients = $result->rowCount();
        
?>
<h3>Tous nos clients</h3>
<h4>Il y a <?=$nbre_clients?></h4>
<table>
<tr>
        <th>Numéro de clients</th>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Age</th>
        <th>Adresse</th>
        <th>Ville</th>
        <th>Adresse Email</th>
</tr>

<?php
// methode FETCH recupère la ligne suivant d'un jeu de resultat d'une requete SELECT 
while($ligne= $result->fetch(PDO::FETCH_NUM)){

    echo"<tr>";
    foreach ($ligne as $valeur) {
        echo "<td>$valeur</td>";

    }
    echo"</tr>";
}
?>



</table>
<?php
//Pour liberer notre connexion pour permettre a d'autre requete sql de communiquer sans aucun probleme
$result->closeCursor();

}
?>


        </body>
</html>