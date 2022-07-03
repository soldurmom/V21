<div class="container">
    <main>
      <div class="album py-5 bg-light">
        <div class="container">
            <div class="dropdown" style="margin-bottom: 20px">
                <button class="btn btn-secondary dropdown-toggle"
                        type="button" id="dropdownMenu1" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                    Order by <?php if(isset($_GET['order_by'])){echo $_GET['order_by'];} ?>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenu1">
                    <?php if(isset($_GET['category'])): ?>
                    <a class="dropdown-item" href="../newSite/?category=<?=$_GET['category']?>&order_by=name">name</a>
                    <a class="dropdown-item" href="../newSite/?category=<?=$_GET['category']?>&order_by=price">price</a>
                    <?php else: ?>
                    <a class="dropdown-item" href="../newSite/?order_by=name">name</a>
                    <a class="dropdown-item" href="../newSite/?order_by=price">price</a>
                    <?php endif ?>
                </div>
            </div>
            <ul class="nav nav-tabs" style="margin-bottom: 30px">
                <li class="nav-item"><a <?php if($_SERVER['REQUEST_URI']=='/newSite/'){echo 'class="nav-link active"';}else{echo 'class="nav-link"';}?> href="../newSite/">Все</a></li>
                <?php foreach ($category as $item): ?>
                <li class="nav-item"><a <?php if(isset($_GET['category']) && $item['id']==$_GET['category']){echo 'class="nav-link active"';}else{echo 'class="nav-link"';}?> href="../newSite/?category=<?=$item['id']?>"><?= $item['name'] ?></a></li>
                <?php endforeach ?>
            </ul>
          <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
              <?php
              foreach($products as $item):
                  ?>
            <div class="col">
              <div class="card shadow-sm">
                <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="40%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
                <div class="card-body">
                    <a href="../newSite/product/<?=$item['id']?>"><?= $item['name'] ?></a>
                  <p class="card-text">
                      <ul>
                        <li>Цена: <?=$item['price']?></li>
                        <li>Кол-во: <?=$item['count']?></li>
                    </ul>
                  </p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                        <?php if(isset($_COOKIE['user'])): ?>
                      <button type="button" class="btn btn-sm btn-outline-secondary add-to-cart" onclick="toCart(this,<?=$item['id']?>,'add')">В корзину</button>
                        <?php endif; ?>
                    </div>
                    <small class="text-muted">9 mins</small>
                  </div>
                </div>
              </div>

            </div>
              <?php endforeach; ?>
          </div>
        </div>
      </div>
    </main>
</div>