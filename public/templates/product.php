<div class="container" style="margin-top: 30px">
<svg class="bd-placeholder-img card-img-top" width="50%" height="325" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="50%" height="100%" fill="#55595c"/><text x="22%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
<h1><?=$product['name']?></h1>
<ul>
    <li>Цена: <?=$product['price']?></li>
    <li>Кол-во: <?=$product['count']?></li>
</ul>
<button type="button" class="btn btn-sm btn-outline-secondary add-to-cart" onclick="toCart(this,<?=$product['id']?>,'add')">В корзину</button>
</div>