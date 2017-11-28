<?php
function createLink() {
    $dbHost = "127.0.0.1";
    $dbPort = 3306;
    $dbLogin = "root";
    $dbPassword = "";
    $dbName = "media_db";
    return new mysqli($dbHost, $dbLogin, $dbPassword, $dbName);
}

function getFileList() {
    $link = createLink();
    $result = $link->query("SELECT id, name, type FROM file;");
    
    $files = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $files[] = $row;
    }

    destroyLink($link);
    return $files;
}

function getMovieList() {
    $link = createLink();
    $result = $link->query("SELECT id, name, type FROM file WHERE type = 'f';");
    
    $files = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $files[] = $row;
    }

    destroyLink($link);
    return $files;
}

function destroyLink(&$link) {
    $link = null;
}

function addFile($name, $data, $directory_id = 1, $type = "p") {
    $link = createLink();
    $query = "INSERT INTO file (name,data,directory_id,type) VALUES ('" . mysqli_real_escape_string($link, $name) . "','" . 
    mysqli_real_escape_string($link, $data) . "','" . $directory_id . "','" .$type . "');";
    $result = $link->query($query) or die($link->error);

    destroyLink($link);
    error_log("CZYTAJ TU " + $result);
    return $result;
}

function getImage($id) {
 
    $link = createLink();
    $query = "SELECT data FROM file WHERE id=$id";
    $result = $link->query($query);
    $image = $result->fetch_assoc();
    destroyLink($link);
    return $image;
}

function isUserValid($login, $password) {
    
    $link = createLink();    
    $query = "SELECT name FROM user_account WHERE name='$login' AND password='$password';";    
    $result = $link->query($query);
    $loggedUser = $result->fetch_array();
    destroyLink($link);

    if(empty($loggedUser)) {
        return false;
    } else {
        return true;
    }
}

function getUserId($name) {
    
    $link = createLink();    
    $query = "SELECT id FROM user_account WHERE name='$name'";
    $result = $link->query($query);
    $userId = $result->fetch_array();
    destroyLink($link);

    return $userId[0];
}

// function getUserGroups($name) {
    
//     $userId = getUserId($name);

//     $link = createLink();
//     $query = "SELECT id, 'name' from group 
//     inner join user_group on user_group.group_id=group.id where user_group.user_id=" + $userId + ";";
    
//     $result = $link->query($query);
//     $userGroups = $result->fetch_assoc();
//     destroyLink($link);

//     return $userGroups;
// }

// function isUserInGroup($name, $groupId) {
    
//     $userId = getUserId($name);

//     $link = createLink();
//     $query = "SELECT id from group on user_group.group_id=$groupId where user_group.user_id=" + $userId + ";";
//     $result = $link->query($query);
//     $fetchedGroupId = $result->fetch_array();
//destroyLink($link);
//     if($groupId == $fetchedGroupId[0]) {
//         return true;
//     } else {
//         return false;
//     }
// }

function addUser($name, $password) {

    $response = 200;

    $link = createLink();
    $query = "SELECT `name` from user_account where `name` = '$name';";
    $result = $link->query($query);
    if($result === false) {
        echo mysqli_error($link);
    }    
    $fetchedUser = $result->fetch_array();
    destroyLink($link);
    
    if($name == $fetchedUser[0]) {
        $response = 400;
        echo "Username is taken!";
        return $response;
    }

    try {
        $userHomeGroupId = createUserHomeGroup($name);
        createUser($name, $password, $userHomeGroupId);
        linkGroupToUser($userHomeGroupId, $name);
    } catch (Exception $e){
        $response = 400;
        echo $e;
        echo $e->getMessage();
    }
    

    return $response;
}

function createUser($userName, $password, $userHomeGroupId) {
    
    $link = createLink();
    $query = "INSERT INTO `user_account` (`name`, `password`, `home_group_id`) VALUES ('$userName', '$password', '$userHomeGroupId');";
    $result = $link->query($query);
    destroyLink($link);

    if($result === true) {
        $link = createLink();
        $query = "SELECT id FROM `user_account` WHERE name='$userName';";
        $result = $link->query($query);
        echo mysqli_error($link);
        $fetchedUserId = $result->fetch_array();
        destroyLink($link);

        return $fetchedUserId[0];
    } else {
        throw new Exception("Creating User Error", 1);
    } 
}

function createUserHomeGroup($userName) {
    $groupName = $userName;
    for ($i=0; !isUserGroupNameAvailable($groupName); $i++) {
        $groupName = $userName . "_" . $i;
        echo $groupName;
    }
    return createGroup($groupName);
}

function addUserGroup($groupName, $userName) {
    $response = 200;
    if(!isUserGroupNameAvailable($groupName)) {
        $response = 400;
    } else {
        try {
            $groupId = createGroup($groupName);
            linkGroupToUser($groupId, $userName);
        } catch(Exception $e) {
            $response = 400;
            echo $e->getMessage();
        }        
    }
    return $response;
    
}
function createGroup($groupName) {
    $link = createLink();
    $query = "INSERT INTO `group` (`name`) VALUES ('$groupName');";
    $result = $link->query($query);
    destroyLink($link);
    
    if($result === true) {
        $link = createLink();
        $query = "SELECT id FROM `group` WHERE name='$groupName';";
        $result = $link->query($query);
        echo mysqli_error($link);
        $fetchedGroupId = $result->fetch_array();
        destroyLink($link);

        return $fetchedGroupId[0];
    } else {
        throw new Exception("Creating Group Error", 1);
    }    
}

function linkGroupToUser($groupId, $userName) {
    $userId = getUserId($userName);
    
    $link = createLink();
    $query = "INSERT INTO `user_group` (`user_id`, `group_id`) VALUES ('$userId', '$groupId');";
    $result = $link->query($query);
    destroyLink($link);
    if($result === false) {
        throw new Exception("Linking group to user error", 1);
    }    
}

function isUserGroupNameAvailable($groupName) {

    $link = createLink();
    $query = "SELECT name FROM `group` WHERE name='$groupName';";
    $result = $link->query($query);
    
    $fetchedGroupNames = $result->fetch_array();
    destroyLink($link);

    if($groupName == $fetchedGroupNames[0]) {
        return false;
    } 
    return true;
}
function isUserNameAvailable($userName) {
    
        $link = createLink();
        $query = "SELECT name from user_account where name=$groupName;";
        $result = $link->query($query);
        $fetchedUserNames = $result->fetch_array();
        destroyLink($link);

        if($userName == $fetchedUserNames[0]) {
            return false;
        } 
        return true;
}

?>