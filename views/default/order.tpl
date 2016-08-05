{*страница оформления заказа*}

<h2>Данные заказа</h2>
<form id="formOrder" action="/cart/saveorder/" method="POST">
    <table>
        <tr>
            <td>#</td>
            <td>Наименование</td>
            <td>Количество</td>
            <td>Цена за единицу</td>
            <td>Стоимость</td>
        </tr>
        
        {foreach $rsProducts as $item name=products}
            <tr>
                <td>{$smarty.foreach.products.iteration}</td>
                <td>{$item['name']}</td>
                <td>
                    <span id="itemCnt_{$item['id']}">
                        <input type="hidden" name="itemCnt_{$item['id']}" value="{$item['cnt']}"/>
                        {$item['cnt']}
                    </span>
                </td>
                                <td>
                    <span id="itemPrice_{$item['id']}">
                        <input type="hidden" name="itemPrice_{$item['id']}" value="{$item['price']}"/>
                        {$item['price']}
                    </span>
                </td>
                </td>
                                <td>
                    <span id="itemRealPrice_{$item['id']}">
                        <input type="hidden" name="itemRealPrice_{$item['id']}" value="{$item['realPrice']}"/>
                        {$item['realPrice']}
                    </span>
                </td>

            </tr>
        {/foreach}
    </table>
    
    {if isset($arUser)}
        {$buttonclass = ""}
        <h2>Данные заказчика</h2>
        <div id="orederUserInfoBox" {$buttonClass}>
            {$name = $arUser['name']}        
            {$phone = $arUser['phone']}        
            {$address = $arUser['address']}    
            <table>
                <tr>
                    <td>Имя*</td>
                    <td><input type="text" id="name" name="name" value="{$name}"/> </td>
                </tr>
                <tr>
                    <td>Тел*</td>
                    <td><input type="text" id="phone" name="phone" value="{$phone}"/> </td>
                </tr>
                <tr>
                    <td>Адрес*</td>
                    <td><textarea id="address" name="address"/>{$address}</textarea></td>
                </tr>
            </table>
        </div>
        {else}
    {/if}
        
        
</form>