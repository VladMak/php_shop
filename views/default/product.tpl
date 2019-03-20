{* страница продукта *}

<h3>{$rsProduct['name']}</h3>

<img width="575" src="/images/products/{$rsProduct['image']}">
Стоимость: {$rsProduct['price']}

<a id="removeCart_{$rsProduct['id']}" {if !$itemInCart}class="hideme"{/if}
   onclick="removeFromCart({$rsProduct['id']});
            return false;" href="#" alt="Удалить из корзины">Удалить из корзины</a>
            
<a id="addCart_{$rsProduct['id']}" {if $itemInCart}class="hideme"{/if}
   onclick="addToCart({$rsProduct['id']});
        return false;" href="#" alt="Добавить в корзину">Добавить в корзину</a>
<p>Описание <br/> {$rsProduct['description']}</p>