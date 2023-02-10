<!doctype html>

<html>
    <head>
        <link href="https://fonts.googleapis.com/css?family=Inter&display=swap" rel="stylesheet" />
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="/public/css/style.css" rel="stylesheet" />
        <link href="/public/css/cart.css" rel="stylesheet" />
    </head>
    <body>
        <div class="content">
            <div class="header-wrapper">
                <div class="back"><a href="menu">BACK</a></div>
            </div>
            <div class="context-wrapper">
                <div class="order-wrapper">
                    <form method="POST" action="order" class="order-form-content">
                        <input type="text" name="address" placeholder="your address"/>
                        <input type="text" name="notes" placeholder="notes">
                        <input type="hidden" name="total_cost" value=<?php if (isset($totalPrice)) {
                            echo $totalPrice;
                        } ?> >
                        <button class="submit-button" type="submit">PLACE AN ORDER</button>
                    </form>
                    <div class="total-cost-container">
                        <p>Total cost: <?php if (isset($totalPrice)) {
                                echo " ".$totalPrice;
                            } else { echo " 0.0";}?></p>
                    </div>
                </div>
                <div class="cart-container">
                    <?php if (isset($items)) {
                        foreach ($items as $item): ?>
                        <form class="item-form-content" action="cart" method="POST">
                            <p><?php echo $item->getProductName()?></p>
                            <p><?php echo $item->getProductPrice()?></p>
                            <input type="hidden" name="id_cart" value=<?php echo $item->getIdCart()?>>
                            <button class="submit-order-button">DELETE</button>
                        </form>
                        <?php endforeach;
                    } ?>
                </div>
            </div>
        </div>
    </body>
</html>