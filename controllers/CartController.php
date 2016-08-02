<?php
/**
 * Контроллер работы с корзиной покупок
 */

include_once '../models/CategoriesModel.php';
include_once '../models/ProductsModel.php';

/**
 * Добавление продукта в корзину
 */
function addtocartAction(){
    $itemId = isset($_GET['id']) ? intval($_GET['id']) : null;
    if ( ! $itemId) return false;

    $resData = array();

    //если в сессии ЕСТЬ корзина, но НЕТ товара с индексом в базе "$itemID", то добавляем его:
    if (isset($_SESSION['cart']) && array_search($itemId, $_SESSION['cart']) === false) {
        $_SESSION['cart'][] = $itemId;
        $resData['cntItems'] = count($_SESSION['cart']);
        $resData['success'] = 1;
    }
    else { $resData['success'] = 0; d($_SESSION['cart']);}

    echo json_encode($resData);
}

/**
 * Удаление продукта с номером из корзины
 */
function removefromcartAction(){

    $itemId = isset($_GET['id']) ? intval($_GET['id']) : null;
    if ( ! $itemId) exit();

    $resData = array();
    $keyToDelete = array_search($itemId, $_SESSION['cart']);

    //если в корзине ЕСТЬ товар с номером в базе "$itemID", то удаляем его:
    if($keyToDelete !== false){
        unset($_SESSION['cart'][$keyToDelete]);
        $resData['success'] = 1;
        $resData['cntItems'] = count($_SESSION['cart']);
    }
    else { $resData['success'] = 0; d($_SESSION['cart']);}

    echo json_encode($resData);
}

/**
 * Формирование страницы корзины
 * @param $smarty
 * @param $mysqli
 * @link /cart/
 */
function indexAction($smarty, $mysqli){ 

    $itemsIds = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();

    $rsCategories = getAllMainCatsWithChildren($mysqli);
    $rsProducts = getProductsFromArray($itemsIds, $mysqli);

    $smarty->assign('pageTitle', 'Корзина');
    $smarty->assign('rsCategories', $rsCategories);
    $smarty->assign('rsProducts', $rsProducts);

    loadTemplate($smarty, 'header');
    loadTemplate($smarty, 'cart');
    loadTemplate($smarty, 'footer');
}

function orderAction($smarty, $mysqli){
    //получаем массив идентификаторов товара добавленного в корзину
    $itemsIds = isset($_SESSION['cart']) ? $_SESSION['cart'] : NULL;
    //при пустой корзине -> редирект в обратно в корзину
    if(! $itemsIds){
        redirect();
        return;
    }
    $itemsCnt = array();
    foreach($itemsIds as $items){
        
    }
}