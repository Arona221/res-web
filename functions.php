<?php

function checkExtention(string $fileName): string
{
    $ext = strtolower(substr(strchr($fileName, '.'), 1));
    return $ext;
}

function checkImgExtension(string $fileName): bool
{
    $imgExt = array("jpg", 'jpeg', 'gif', "png");
    if (in_array($fileName, $imgExt)) {
        return true;
    } else
        return false;
}
function moveFile(string $srcPath, string $desPath, string $fileName, int $i = null): string
{
    if (!is_dir($desPath)) {
        mkdir($desPath);
    }
    $desPath = $desPath . DIRECTORY_SEPARATOR . date("DmY_His", time()) . '.' . $fileName;
    if (move_uploaded_file($srcPath, $desPath)) {
        return $desPath;
    } else
        return "";
}
function checkZize(float $sizeIni, int $size = 1048576)
{
    if ($sizeIni < $size) {
        return true;
    }
    return false;
}
