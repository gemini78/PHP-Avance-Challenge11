<?php

require "functions.php";

const MSG_ERROR_NAME  = "Seul les lettres, espaces et le tiret sont permis";
const MSG_ERROR_LENGTH_LASTNAME = "Le nom est trop court, 45 caracatères minimum";
const MSG_ERROR_LENGTH_FIRSTNAME = "Le prénom est trop court, 45 caracatères minimum";



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

        if(!validateLength($lastname)) {
            $errors['lastname_length'] = MSG_ERROR_LENGTH_LASTNAME;
        }

        if(!validateLength($firstname)) {
            $errors['firstname_length'] = MSG_ERROR_LENGTH_FIRSTNAME;
        }

        if (count($errors) == 0) {
            echo 'store in BDD';
        }
    } else {
        $errors[] = "Veuillez SVP remplir tous les champs !";
        //sauvegarde des champs en erreurs
    }
}



$pageActive = '';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Challenge 8 : Simuler une prise de contact</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php require('parts/topbar.php')  ?>
    <main>
        <div class="wrapper">
            <h1>Thanks !!!</h1>
            <div class="container-cards">
                <div class="card">
                    <div class="card-header">
                        <span>informations</span>
                    </div>
                    <div class="card-body">
                        <?php
                        if (isset($errors) && count($errors) > 0) { ?>
                            <ol>
                                <?php foreach ($errors as $error) {
                                    echo '<li class="error">' . $error . '</li>';
                                } ?>
                            </ol>
                        <?php    } else {
                            echo "<p>$message</p>";
                        }
                        ?>
                    </div>
                    <div class="card-footer">
                        <span>informations</span>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php require('parts/footer.php') ?>
</body>

</html>