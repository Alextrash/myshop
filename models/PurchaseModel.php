<?php

function setPurchaseForOrder($orderId, $cart, $mysqli){
    $sql = "INSERT INTO purchase "
            . "(`order_id`, `product_id`, `price`, `amount`) "
            . "VALUES ";
    $values = array();
    //forming array of strings for every merchandize
    foreach ($cart as $item){
        $values[] = "('{$orderId}', '{$item['id']}', '{$item['price']}', '{$item['cnt']}')";
    }
    $sql .= implode($values, ', ');
    $rs = $mysqli->query($sql);
    
    return $rs;
}