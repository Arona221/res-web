<?php
//
function partial(string $name, $tabNav, $params = [],  string $stylePath = "")
{
    $tabNavElement = $tabNav;
    extract($params);
    $styleLink = $stylePath;
    require(dirname(__DIR__) . DIRECTORY_SEPARATOR . 'html_partials' . DIRECTORY_SEPARATOR . $name . '.html' . '.php');
}
// verifier si la formulaire est poster
function is_posted()
{
    return $_SERVER['REQUEST_METHOD'] === 'POST';
}

// fonction pour la creation d'une connexion
function pdo()
{
    return new PDO("mysql:host=localhost;port=3306;dbname=finalprojectdb", "root", '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}

//pour la redirection 

function redirect(string $url)
{
    header("Location:$url");
    die();
}

// fait une inclusion prend
//prend en parametre une url et le nombre de pas

function toInclude(string $url, int $nbPas = 0)
{
    if ($nbPas === 0) {

        require_once(__DIR__ . DIRECTORY_SEPARATOR . "$url.php");
    } else {
        require_once(dirname(__DIR__, $nbPas) . DIRECTORY_SEPARATOR . "$url.php");
    }
}

function valid_format_num_Card(string $numCard): bool
{

    if (strlen($numCard) == 9) {
        $tabNumCard = str_split($numCard);
        $StartNumCard = array_slice($tabNumCard, 0, 6);
        $strStartNumCard = implode($StartNumCard);
        var_dump($strStartNumCard);
        $numStartNumCard = filter_var($strStartNumCard, FILTER_SANITIZE_NUMBER_INT);
        if (!$numCard) {
            return false;
        } else if ($numStartNumCard != 0) {
            return true;
        } else
            return false;
    } else {
        return false;
    }
}

function dump($element)
{
    echo "<pre>";
    var_dump($element);
    echo ("</pre>");
}


//fonction relative aux fichiers


//recupere l'ixtention d'une fichier
function checkExtention(string $fileName): string
{
    $ext = strtolower(substr(strchr($fileName, '.'), 1));
    return $ext;
}

// determine l'extension d'une fichier
function checkImgExtension(string $fileName): bool
{
    $imgExt = array("jpg", 'png', 'jpeg', 'txt');
    if (in_array($fileName, $imgExt)) {
        return true;
    } else
        return false;
}
// permet de déplacer un fichier d'un dossier source $srcPath vers un dossier des detination $desPath
function moveFile(string $srcPath, string $desPath, string $fileName, int $i = null): string
{
    if (!is_dir($desPath)) {
        mkdir($desPath);
    }
    $desPath = $desPath . DIRECTORY_SEPARATOR . date("DmY_His", time()) . '.' . $fileName;
    if (move_uploaded_file($srcPath, $desPath)) {
        echo "je suis la";
        return $desPath;
    } else
        return "";
}
// permet de déternimer la taille du fichier;   
function checkZize(float $sizeIni, int $size = 1048576)
{
    if ($sizeIni < $size) {
        return true;
    }
    return false;
}
function make_request(string $r_request, array $data)
{
    require("../db/connectDB.php");
    $p_request = $connect->prepare($r_request);
    $p_request->execute($data);
    return $p_request->fetchAll(PDO::FETCH_ASSOC);
}
