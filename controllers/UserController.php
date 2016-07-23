<?php
/**
 * Контроллер функций пользователя
 */

include_once '../models/CategoriesModel.php';
include_once '../models/UsersModel.php';

function isInArray($array, $key, $default=NULL){
    return isset($array[$key]) ? $array[$key] : $default;        
}

function registerAction($smarty, $mysqli){

    $email = isInArray($_REQUEST, 'email');
    $email = trim($email);
    $pwd1 = isInArray($_REQUEST, 'pwd1');
    $pwd2 = isInArray($_REQUEST, 'pwd2');
    $phone = isInArray($_REQUEST, 'phone');
    $address = isInArray($_REQUEST, 'address');
    $name = isInArray($_REQUEST, 'name');
    $name = trim($name);

    //$resData == null при отсутствии ошибок регистрации
    // или массив с индексами: [message] == код ошибки и [success] != null
    $resData = null;
    $resData = checkRegisterParams($email, $pwd1, $pwd2);

    if(!$resData && checkUserEmail($email, $mysqli)){
        $resData['success'] = null;
        $resData['message'] = "Пользователь с таким email ('{$email}') уже существует";
    }

    if(! $resData ){
        $pwdMd5 = md5($pwd1);
        $userData = registerNewUser($email, $pwdMd5, $name, $phone, $address, $mysqli);

        if ($userData['success'] == 1){
            $resData['message'] = 'Пользователь успешно зарегистрирован';
            $resData['success'] = 1;
            
            $userData = $userData[0];
            
            $resData['userName'] = $userData['name'] ? $userData['name'] : $userData['email'];
            $resData['userEmail'] = $userData['email'];

            $_SESSION['user'] = $userData;
            $_SESSION['user']['displayName'] = $userData['name'] ? $userData['name'] : $userData['email'];
        } else {
            $resData['success'] = null;
            $resData['message'] = 'Ошибка регистрации';}
    }

    echo json_encode($resData);
}