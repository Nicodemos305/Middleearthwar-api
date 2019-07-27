<?php
include_once "/var/www/html/util/header.php";
include_once "/var/www/html/repository/playerDao.class.php";
$playerDao = new PlayerDao();

if (validate($post)) {
    $player = $playerDao->signIn($post->login, $post->password);
    echo json_encode($player);
}

function validate($post)
{
    $loginIsNull    = (!isset($post->login) || $post->login == "");
    $passwordIsNull = (!isset($post->password) || $post->password == "");
    if ($loginIsNull || $passwordIsNull) {
        $msg    = $msg . "Login nao definido";
        $result = array(
            'msg' => $msg
        );
        echo json_encode($result);
        return false;
    }
    return true;
}