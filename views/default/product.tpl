{*Страница продукта*}
<h3>{$rsProduct['name']}</h3>
<img src="/images/products/{$rsProduct['image']}" width="575">
Стоимость: {$rsProduct['price']}

<a id="addCart"_{$rsProduct['id']} href="#" onclick="addToCart({$rsProduct['id']})"; return false; alt="Добавить в корзину">Добавить в корзину</a>
<p>Описание<br />{$rsProduct['description']}</p>