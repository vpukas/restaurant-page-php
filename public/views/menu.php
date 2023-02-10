<!doctype html>

<html>

<head>
    <link href="https://fonts.googleapis.com/css?family=Inter&display=swap" rel="stylesheet" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/public/css/style.css" rel="stylesheet" />
    <link href="/public/css/menu.css" rel="stylesheet" />
</head>

<body>
<div class="content">
    <div class="header-wrapper">
        <div class="back"><a href="/index">BACK</a></div>
        <p class="create-an-account">click on the picture to add product to your cart</p>
        <div class="cart"><a href="/cart">CART</a></div>
    </div>
    <div class="context-wrapper">
        <?php if (isset($products)) {
            foreach ($products as $product): ?>
            <form action="menu"  method="POST" class="peperoni">
                <button class="submit-order-button" type="submit">
                    <img src="/public/img/<?=$product->getImg()?>">
                </button>
                <label class="product-description"><?= $product->getName()?></label>
                <input type="hidden" name="product_id" value=<?=$product->getIdProduct()?>>
            </form>
            <?php endforeach;
        } ?>
    </div>
</div>
</body>
</html>
