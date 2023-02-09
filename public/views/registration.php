<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration</title>
    <link href="/public/css/style.css" rel="stylesheet" />
    <link href="https://fonts.cdnfonts.com/css/saira-semicondensed" rel="stylesheet">
    <script type="text/javascript" src="/public/js/registration.js" defer></script>
</head>
<body>
<div class="content">
  <div class="restaurant-header">restauracja</div>
  <div class="form-content">
    <form class="register_panel" method="POST" action="registration" id="form">
      <p class="create-an-account" >create an account</p>
        <div class="messages">
            <?php if(isset($messages)) {
                foreach ($messages as $message){
                    echo $message;}
            }
            ?>
        </div>
      <input type="text" class="form-control" placeholder="username" name="username" >
      <input type="password" placeholder="password" class="form-control" name="password">
      <input type="text" class="form-control" placeholder="email" name="email">
      <input type="text" class="form-control" placeholder="phone" name="phone">
      <button type="submit" class="submit-button">sign up</button>
    </form>
  </div>
</div>
</body>
</html>