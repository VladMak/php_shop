/**
 * Функция добавления товара в корзину
 * 
 * @param {integer} itemId идентификатор продукта
 * @returns в случае успеха обновятся данные корзины на странице
 */
function addToCart(itemId){
    console.log("js - addToCart()");
    $.ajax({
        type: 'POST',
        async: false,
        url: "/cart/addtocart/" + itemId + '/',
        dataType: 'json',
        success: function(data){
            if(data['success']){
                $('#cartCntItems').html(data['cntItems']);
                //Убрать, чтобы добавить возможность добавления нескольких
                //товаров
                $('#addCart_' + itemId).hide();
                $('#removeCart_' + itemId).show();
            }
        }
    });
}

/**
 * Удаление товара из корзины
 * 
 * @param {integer} itemId идентификатор продукта
 * @returns в случае успеха обновятся данные корзины на странице
 */
function removeFromCart(itemId){
    console.log("js - removeFromCart("+itemId+")");
    console.log('#removeCart_' + itemId);
    $.ajax({
        type: 'POST',
        async: false,
        url: "/cart/removefromcart/" + itemId + '/',
        dataType: 'json',
        success: function(data){
            if(data['success']){
                $('#cartCntItems').html(data['cntItems']);
                
                $('#addCart_' + itemId).show();
                $('#removeCart_' + itemId).hide();
            }
        }
    });
}

/**
 * Подсчет стоимости купленного товара
 * @param {type} itemId ID продукта
 * @returns {undefined}
 */
function conversionPrice(itemId){
    let newCnt = $('#itemCnt_' + itemId).val();
    let itemPrice = $('#itemPrice_' + itemId).attr('value');
    let itemRealPrice = newCnt * itemPrice;
    console.log(itemRealPrice);
    $('#itemRealPrice_' + itemId).html(itemRealPrice);
}