<?php
function createLink()
{
    $dbHost = "localhost";
    $dbPort = 3306;
    $dbLogin = "root";
    $dbPassword = "";
    $dbName = "media_db";
    return new mysqli($dbHost, $dbLogin, $dbPassword, $dbName);
}

function getFileList()
{
    $link = createLink();
    $result = $link->query("SELECT id, name, type FROM file;");
    
    $files = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $files[] = $row;
    }

    destroyLink($link);
    return $files;
}

function destroyLink(&$link)
{
    $link = null;
}


// function createUser($name, $pass, $groupId)
// {
//     $query = "INSERT INTO USERS (Name, Password,GroupID) values ('$name','" . md5($pass) . "',$groupId);";
//     $link = createLink();
//     $result = $link->query($query);
//     destroyLink($link);
//     return $result;
// }

function addFile($name, $data, $directory_id = 1, $type = "p")
{
    $link = createLink();
    $query = "INSERT INTO file (name,data,directory_id,type) VALUES ('" . mysqli_real_escape_string($link, $name) . "','" . 
    mysqli_real_escape_string($link, $data) . "','" . $directory_id . "','" .$type . "');";
    $result = $link->query($query) or die($link->error);

    destroyLink($link);
    error_log("CZYTAJ TU " + $result);
    return $result;
}

function getImage($id)
{
 
    $link = createLink();

    $query = "SELECT data FROM file WHERE id=$id";

    $result = $link->query($query);
    $image = $result->fetch_assoc();

    destroyLink($link);
    return $image;
}

// function getImagesForAll()
// {
//     $link = createLink();
//     $query = "Select Name,Image from FILES where shareAll = true and Image is not null";

//     $result = $link->query($query);
//     $images = array();
//     while ($row = $result->fetch_row()) {
//         $images[] = $row;
//     }
//     destroyLink($link);
//     return $images;
// }

// function getVideos($sharedGroupId)
// {
//     $link = createLink();
//     $query = "Select Name,Video from FILES where (SharedGroupId = $sharedGroupId or shareAll = true) and Video is not null";

//     $result = $link->query($query);
//     $videos = array();
//     while ($row = $result->fetch_row()) {
//         $groups[] = $row;
//     }
//     destroyLink($link);
//     return $videos;
// }

?>