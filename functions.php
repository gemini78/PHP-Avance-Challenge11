<?php
require_once __DIR__."/sql/connDb.php"; 
const LENGTH_MAX = 45;

if (!function_exists('test_input')) {
    function test_input(string $data)
    {
        
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        
        return $data;
    }
}

if (!function_exists('not_empty')) {
    function not_empty($fields = [])
    {
        if (count($fields) != 0) {
            foreach ($fields as $field) {
                if (empty($_POST[$field]) || trim($_POST[$field]) == "") {
                    return false;
                }
            }
            return true;
        }
    }
}

if (!function_exists('validateName')) {
    function validateName(string $name)
    {
        return preg_match("%^[a-zA-Z-' ]*$%",$name);
    }
}


if (!function_exists('validateLength')) {
    function validateLength(string $str)
    {
        return mb_strlen($str)<=LENGTH_MAX;
    }
}

if (!function_exists('getFriends')) {
    function getFriends()
    {
        global $pdo;

        $stmt = $pdo->query("SELECT * FROM friends");
        $result = [];
        while($rows = $stmt->fetchObject()) {
            $result[] = $rows;
        }
        return $result;
    }
}

if (!function_exists('savefriends')) {
    function savefriends(string $firstname, string $lastname)
    {
        global $pdo;
        $sql = "INSERT INTO friends (firstname, lastname) VALUES (:firstname,:lastname)";
        $stmt= $pdo->prepare($sql);
        $stmt->bindValue(':firstname', $firstname, PDO::PARAM_STR);
        $stmt->bindValue(':lastname', $lastname, PDO::PARAM_STR);
        $stmt->execute();
    }

}

