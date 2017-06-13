<?php

/* 
 * Model for orders table (orders)
 */

/* 
 * Making order without product connection
 */

/**
 * @param type $name
 * @param type $phone
 * @param type $address
 * @return integer ID of new-created order
 */
function makeNewOrder($smarty, $name, $phone, $address, $mysqli){
    $userId = $_SESSION['user']['id'];
    $comment = "user ID: {$userId} <br />"
            . "Name: {$name} <br />"
            . "Phone: {$phone} <br />"
            . "Address {$address} <br />";
    $dateCreated = date('Y.m.d H:i:s');
    $userIp = $_SERVER['REMOTE_ADDR'];
    
    $sql = "INSERT INTO "
            . "orders (`user_id`, `date_created`, `date_payment`, `status`, `comment`, `user_ip`)"
            . " VALUES ('{$userId}', '{$dateCreated}', 'null', '0', '{$comment}', '{$userIp}')";
    $rs = $mysqli->query($sql);
        
    //get id of current order
    if($rs){
        $sql = "SELECT id "
                . "FROM orders "
                . "ORDER by id DESC "
                . "LIMIT 1";
        $rs = $mysqli->query($sql);
        $rs = createSmartyRsArray($rs, $mysqli);
        if(isset($rs[0])){
            return $rs[0]['id'];
        }
    }  return false;
}

function getOrdersWithProductsByUser($smarty, $userId, $mysqli){
    $userId = intval($userId);
    $sql = "SELECT * FROM orders "
            . "WHERE `user_id` = '{$userId}' "
            . "ORDER BY id DESC";
    $rs = $mysqli->query($sql);
    $smartyRs = array();
    while($row = $rs->fetch_assoc()){
        $smartyRs[] = $row;
    }
    d($smartyRs);
    return $smartyRs;
}