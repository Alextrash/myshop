<?php
/**
 * Модель для таблицв пользователей (users)
 */

/**
 * Регистрация пользователя в базе
 * @param $email
 * @param $pwdMD5
 * @param $name
 * @param $phone
 * @param $address
 * @param $mysqli
 * @return array|bool массив с [0]=данными пользователя, [success]=флагом успеха
 */
function registerNewUser($email, $pwdMD5, $name, $phone, $address, $mysqli){
    
    $email = htmlspecialchars($mysqli->real_escape_string($email));
    $pwdMD5 = htmlspecialchars($mysqli->real_escape_string($pwdMD5));
    $name = htmlspecialchars($mysqli->real_escape_string($name));
    $phone = htmlspecialchars($mysqli->real_escape_string($phone));
    $address = htmlspecialchars($mysqli->real_escape_string($address));

    $sql = "INSERT INTO `users` (`email`, `pwd`, `name`, `phone`, `address`)
            VALUES ('$email', '$pwdMD5', '$name', '$phone', '$address')";
    $rs = $mysqli->query($sql);

    if($rs){
        $sql = "SELECT * FROM `users`
                WHERE (`email` = '{$email}' and `pwd` = '{$pwdMD5}')
                LIMIT 1";
        $rs = $mysqli->query($sql);
        $rs = createSmartyRsArray($rs, $mysqli);
        
        if(isset($rs[0])){
            $rs['success'] = 1;
        } else {$rs['success'] = 0;}
        
    }else {$rs['success'] = 0;}

    return $rs;
}

/**
 * Проверяем регистрационные данные - наличие обоих паролей и их совпадение, наличие email
 * @param $email
 * @param $pwd1
 * @param $pwd2
 * @return array Описание ошибки
 */
function checkRegisterParams($email, $pwd1, $pwd2){

    $res = array();

    if(! $email) {
        $res['success'] = null;
        $res['message'] = 'Введите e-mail';
    }
    if(! $pwd1){
        $res['success'] = null;
        $res['message'] = ' Введите пароль';
    }
    if(! $pwd2){
        $res['success'] = null;
        $res['message'] = ' Введите повтор пароля';
    }
    if($pwd1 != $pwd2){
        $res['success'] = null;
        $res['message'] = ' Пароли не совпадают';
    }

    return $res;
}

/**
 * Проверка почты до регистрации, на наличие в базе
 * @param $email
 * @param $mysqli
 * @return array|bool возвращаем id записи с существующим email или null
 */
function checkUserEmail($email, $mysqli)
{
    $email = $mysqli->real_escape_string($email);
    $sql = "SELECT id 
            FROM `users`
            WHERE `email` = '{$email}'";

    $rs = $mysqli->query($sql);
    $rs = createSmartyRsArray($rs, $mysqli);

    return $rs; 
} 

/**
 * Забираем данные пользователя из базы
 * @param type $email
 * @param type $pwd
 * @param type $mysqli
 * @return array данные пользователя и флаг об успешности выполнения запроса
 */
function loginUser($email, $pwd, $mysqli){
    $email = htmlspecialchars($mysqli->real_escape_string($email));
    $pwd = md5($pwd);
    
    $sql = "SELECT * FROM `users`
            WHERE (`email` = '{$email}' and `pwd` = '{$pwd}')
            LIMIT 1";
            
    $rs = $mysqli->query($sql);
    
    $rs = createSmartyRsArray($rs, $mysqli);
    if(isset($rs[0])){
            $rs['success'] = 1;
    } else {
        $rs['success'] = 0;
    }
    return $rs;
}

function updateUserData($email, $name, $phone, $address, $pwd1, $pwd1, $curPwd, $mysqli){
                   
    if($curPwd != NULL && $email != NULL){
        $sql = "SELECT `pwd` FROM `users` WHERE `email`='{$email}'";
        $rs = $mysqli->query($sql);
    }
    
    if($pwd1 !=NULL && $pwd2 != NULL && $pwd1 == $pwd2){
        $pwdMD5 = md5($pwd1);
        
        $sql = "UPDATE `users`
                SET 
                `name`='{$name}', `phone`='{$phone}', `address`='{$address}', `pwd`='{$pwdMD5}'
                WHERE `email`='{$email} AND '";
    } elseif ($pwd1 != $pwd2) {
         
    }
}

    $sql = 
    $rs = $mysqli->query($sql);

   
 
    return $rs;
}