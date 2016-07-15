{*Страница продукта*}
<h3>{$rsProduct['name']}</h3>
<img src="/images/products/{$rsProduct['image']}" width="575">
Стоимость: {$rsProduct['price']}

<a href="#" alt="Добавить в корзину" id="addCart_{$rsProduct['id']}" onclick="addToCart({$rsProduct['id']}); return false;">Добавить в корзину</a>
{*<a id="removeCart_{$rsProduct['id']}" onclick="addToCart({$rsProduct['id']}); return false;" href="#" alt="Убрать из корзины">Убрать из корзины</a>*}
<p>Описание<br />{$rsProduct['description']}</p>