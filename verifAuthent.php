<?php
session_start();
require_once "db/connectdb.php";
if (isset($_POST['user']) && isset($_POST['pwd']) && !empty($_POST["user"]) && !empty($_POST["pwd"])) {
    $p_request = getConnection()->prepare("SELECT *FROM admin_resto WHERE login=:user AND pass_word=:pass_word");
    $p_request->execute(array("user" => $_POST['user'], "pass_word" => $_POST['pwd']));
    $r_request = $p_request->fetchAll(PDO::FETCH_ASSOC);
    if (!empty($r_request) && !is_null($r_request)) {
        setcookie("login", $r_request[0]["login"], 7 * 24 * 3600);
        $_SESSION["admin"] = $r_request[0];
        header("Location:dasbord.php");
    } else
        echo "Verifier vos information";
}
