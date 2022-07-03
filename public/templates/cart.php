<?php
if(isset($_SESSION['cart']) && $_SESSION['cart.count']>0):?>
    <p id="totalCount">Всего товаров: <?=$_SESSION['cart.count']?></p>
    <p id="totalPrice">На сумму: <?=$_SESSION['cart.price']?>Р</p>
<?php
foreach($_SESSION['cart'] as $item):
    ?>
    <div class="col" id="cartItem<?=$item['id']?>">
        <div class="card shadow-sm"  style="max-width: 400px">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="40%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
            <div class="card-body">
                <a href="../newSite/product/<?=$item['id']?>"><?= $item['name'] ?></a>
                <p class="card-text">
                <ul>
                    <li>Цена: <?=$item['price']?></li>
                    <li id="counter<?=$item['id']?>" >Кол-во: <?=$item['count']?></li>
                </ul>
                </p>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-outline-secondary add-to-cart" onclick="toCart(this,<?=$item['id']?>,'add',true)">+</button>
                        <button type="button" class="btn btn-sm btn-outline-secondary add-to-cart" onclick="toCart(this,<?=$item['id']?>,'rem',true)">-</button>
                    </div>
                    <small class="text-muted">9 mins</small>
                </div>
            </div>
        </div>

    </div>
<?php endforeach;
else:
?>
<h4>Корзина пуста</h4>
<?php endif; ?>
