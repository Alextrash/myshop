<?php
/**
 * Модель для таблицв пользователей (users)
 */
/**
 * @param $email
 * @param $pwdMD5
 * @param $name
 * @param $phone
 * @param $address
 * @param $mysqli
 * return array   данные пользователя
 */
function registerNewUser($email, $pwdMD5, $name, $phone, $address, $mysqli){
    $email = htmlspecialchars($mysqli->escape_string($email));
    $pwdMD5 = htmlspecialchars($mysqli->escape_string($pwdMD5));
    $name = htmlspecialchars($mysqli->escape_string($name));
    $phone = htmlspecialchars($mysqli->escape_string($phone));
    $address = htmlspecialchars($mysqli->escape_string($address));

    $sql = "INSERT INTO
            `users` (`email`, `pwd`, `name`, `phone`, `address`)
            VALUES (`$email`, `$pwdMD5`, `$name`, `$phone`, `$address`)";

    $rs = $mysqli->query($sql);

    if($rs){
        $sql = "SELECT *
                FROM `users`
                WHERE (`email` = '{$email}' and `pwd` = '{$pwdMD5}')
                LIMIT 1";

        $rs = $mysqli->query($sql);
        $rs = createSmartyRsArray($rs, $mysqli);

        if(isset($rs[0])){
            $rs['success'] = 1;
        } else $rs['success'] = 0;

    }else $rs['success'] = 0;

    return $rs;
}


/**
 * Проверяем переменные
 * @param $email
 * @param $pwd1
 * @param $pwd2
 * @return array Описание ошибки
 */
function сheckRegisterParams($email, $pwd1, $pwd2){

    $res = array();

    if( ! $email) {
        $res['success'] = null;
        $res['message'] = 'Введите e-mail';
    }
    if( ! $pwd1){
        $res['success'] = null;
        $res['message'] = 'Введите пароль';
    }
    if( ! $pwd2){
        $res['success'] = null;
        $res['message'] = 'Введите повтор пароля';
    }
    if($pwd1 != $pwd2){
        $res['success'] = null;
        $res['message'] = 'Ошибка! Пароли не совпадают';
    }

    return $res;
}