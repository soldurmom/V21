toCart = async(target,id, action,count=false) => {
    const response = await fetch('http://localhost/newSite/to_cart/'+id+'/'+action).then(response=>response.json());
    const message = document.createElement('div');
    if(typeof response.item === 'undefined'){
        document.getElementById('cartItem'+id).remove();
    }
    if(!count){
        message.innerHTML = 'Товар добавлен в корзину. Кол-во товаров в корзине: '+response.item['count'];
    } /*else if(!response.item['count']){
        message.innerHTML = 'Нельзя больше добавить'
    }*/
    else{
        let totalPrice = document.getElementById('totalPrice');
        let totalCount = document.getElementById('totalCount');
        totalCount.innerHTML = 'Всего товаров: '+response.totalCount;
        totalPrice.innerHTML = 'На сумму: '+response.totalPrice+'P';
    }
    if(count && typeof response.item !== 'undefined'){
        let counter = document.getElementById('counter'+id);
        counter.innerHTML = 'Кол-во: '+response.item['count'];
    }

    target.parentElement.append(message);
    setTimeout(() => message.remove(), 3500);
}