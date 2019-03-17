{* страница продукта *}

<h3>{$rsProduct['name']}</h3>

<img width="575" src="/images/products/{$rsProduct['image']}">
Стоимость: {$rsProduct['price']}

<a id="addCart_{$rsProduct['id']}" onclick="addToCart({$rsProduct['id']});
        return false;" href="#" alt="Добавить в корзину">Добавить в корзину</a>
<p>Описание <br/> {$rsProduct['description']}</p>