<?php
$pageActive = 'about';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Challenge 11 : Simuler une prise de contact</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php require('parts/topbar.php')  ?>
    <main>
        <div class="wrapper">
            <div class="about">
                <div class="content">
                    <h1>A propos</h1>
                    <div class="rules">
                        <div class="content">
                            <h2>Fais-toi des amis !</h2>
                            <p>
                                Crée une page index.php qui liste les “friends” contenus dans la base, sous la forme d’une liste HTML.
                                Pense à créer un fichier _connec.php que tu n’enverras pas avec ta solution, afin de ne pas dévoiler ton mot de passe.

                                Sous la liste, crée un formulaire simple disposant des champs obligatoires Firstname et Lastname.
                                Lorsque tu soumets le formulaire, un nouveau personnage doit être inséré dans la base de données, via une requête préparée.

                                Poste ta solution.
                            </p>
                            <h2>Bonus</h2>
                            <p>
                            <ul>
                                <li>
                                    Tu peux effectuer des validations afin de t’assurer que les noms et prénoms ne soient pas vides et fassent moins de 45 caractères (les champs de la table étant des <span class="inBlack">VARCHAR(45)</span>).
                                </li>
                                <li>
                                    Une fois l’enregistrement effectué, effectue une redirection via l’<span class="inRed">header</span>() approprié, afin d’éviter de soumettre le formulaire à nouveau (et donc de créer un doublon) si tu réactualises la page.
                                </li>
                            </ul>
                            </p>
                            <h2>Critères de validation</h2>
                            <ul>
                                <li>Le fichier index.php est bien présent</li>
                                <li>La connexion à la base de données est correctement configurée avec PDO (tu peux réutiliser le même fichier _connec.php que tu as créé pour réaliser cette quête).</li>
                                <li>La page affiche la liste des friends contenus dans ta propre base de données.</li>
                                <li>La page affiche un formulaire d’ajout de friend. Lorsque tu soumets le formulaire, un nouveau friend apparaît dans la liste.</li>
                                <li>La requête d’insertion est une requête préparée.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php require('parts/footer.php') ?>
</body>

</html>