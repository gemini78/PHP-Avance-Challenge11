<?php
require "functions.php";

const MSG_ERROR_NAME  = "Seul les lettres, espaces et le tiret sont permis";
const MSG_ERROR_LENGTH_LASTNAME = "Le nom est trop long, 45 caracatères maximum";
const MSG_ERROR_LENGTH_FIRSTNAME = "Le prénom est trop long, 45 caracatères maximum";

if (isset($_POST['send'])) {
    if (not_empty(['lastname', 'firstname'])) {
        $errors = [];
        extract($_POST);

        $lastname = test_input($lastname);
        $firstname = test_input($firstname);

        if (!validateName($lastname)) {
            $errors['lastname'] = MSG_ERROR_NAME;
        }

        if (!validateName($firstname)) {
            $errors['firstname'] = MSG_ERROR_NAME;
        }

        if (!validateLength($lastname)) {
            $errors['lastname_length'] = MSG_ERROR_LENGTH_LASTNAME;
        }

        if (!validateLength($firstname)) {
            $errors['firstname_length'] = MSG_ERROR_LENGTH_FIRSTNAME;
        }

        if (count($errors) == 0) {
            savefriends($firstname, $lastname);
            header('Location : /index.php');
        }
    } else {
        $errors[] = "Veuillez SVP remplir tous les champs !";
        //sauvegarde des champs en erreurs
    }
}
$friends = getFriends();
$pageActive = 'home';
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Challenge 10 : FAIS-TOI DES AMIS !</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php require('parts/topbar.php')  ?>
    <main>
        <div class="wrapper">
            <h1>Challenge 11 : Fais-toi des amis !</h1>
            <?php if (empty($friends)) { ?>
                <h3 class="friends">Vous n'avez pas d'amis<br>Utiliser le formulaire ci-dessous</h3>
            <?php } else { ?>
                <ul class="list">
                <?php foreach ($friends as $friend) { ?>
                    <li><?=$friend->firstName. ' '.$friend->lastName; ?></li>
                <?php } ?>
                </ul>
            <?php } ?>
            <div class="container-cards">
                <div class="card">
                    <div class="card-header">
                        <span>Formulaire</span>
                    </div>
                    <div class="card-body">
                        <?php if (isset($errors) && count($errors) > 0) { ?>
                            <ol>
                                <?php foreach ($errors as $error) {
                                    echo '<li class="error">' . $error . '</li>';
                                } ?>
                            </ol>
                        <?php    } ?>
                        <form method="post">
                            <div class="box-input">
                                <label for="firstname">Prénom :</label>
                                <input type="text" id="firstname" name="firstname" value="<?= (isset($_POST['firstname'])?$_POST['firstname']:"") ?>">
                            </div>
                            <div class="box-input">
                                <label for="lastname">Nom :</label>
                                <input type="text" id="lastname" name="lastname" value="<?= (isset($_POST['lastname'])?$_POST['lastname']:"") ?>">
                            </div>
                            <div class="button">
                                <button type="submit" name="send">Ajout d'un ami</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer">
                        <span>Formulaire</span>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php require('parts/footer.php') ?>
</body>

</html>