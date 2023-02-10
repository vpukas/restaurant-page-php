<!DOCTYPE html>
<html>
    <head>
        <link href="https://fonts.googleapis.com/css?family=Inter&display=swap" rel="stylesheet" />
        <link href="/public/css/style.css" rel="stylesheet" />
        <meta charset="UTF-8">
        <title>Document</title>
    </head>

    <body>
        <div class="content">
            <div class="restaurant-header"><a href="index"><img src="/public/img/logo.svg" alt="restauracja"></a></div>
                <div class="form-content">
                    <form method="POST" action="login" class="login_panel" id="login_form">
                        <div class="messages">
                            <?php if(isset($messages)) {
                                foreach ($messages as $message){
                                    echo $message;
                                }
                            }
                            ?>
                        </div>
                        <input type="text" name="username" placeholder="login" />
                        <input type="password" name="password" placeholder="password">
                        <button class="submit-button">SIGN IN</button>
                    </form>
                </div>
                <div class="form-content">
                    <form method="POST" action="guest" class="login_panel">
                        <button class="submit-button">CONTINUE AS GUEST</button>
                    </form>
                </div>
        </div>
    </body>
</html>