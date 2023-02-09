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
    <div class="restaurant-header">Restauracja</div>
    <div class="form-content">
<!--        <p th:if="${loginError}" class="error">wrong user or password</p>-->
        <form method="POST" action="login" class="login_panel" id="login_form">
            <div class="messages">
                    <?php if(isset($messages)) {
                        foreach ($messages as $message){
                            echo $message;
                        }
                    }
                ?>
            </div>
            <input type="text" name="username" placeholder="jan.kowalski" />
            <input type="password" name="password" placeholder="*******">
            <button class="submit-button">log in</button>
        </form>
        </div>
    <div class="form-content">
            <form method="POST" action="guest" class="login_panel">
                <button class="submit-button">log in as guest</button>
            </form>
        </div>
</div>

<!--<script src="/js/tools.js"></script>-->
<!--<script src="/js/login.js"></script>-->
</body>

</html>