<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="assets/css/comum.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/icofont.min.css">
    <link rel="stylesheet" href="assets/css/login.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INNOUT</title>
</head>

<body>
    <form action="#" method="post" class="form-login">
        <div class="login-card card">
            <div class="card-header">
                <i class="icofont-travelling mr-2"></i>
                <span class="font-weight-light">In</span>
                <span class="font-weight-bold mx-2">N'</span>
                <span class="font-weight-light">Nout</span>
                <i class="icofont-runner-alt-1 ml-2"></i>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" id="email" name="email" value="<?= @$_POST['email'] ?>" class="form-control" placeholder="Informe seu email" autofocus>

                    <label for="password">Senha</label>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Informe sua senha">
                </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-lg btn-primary">Login</button>
            </div>
        </div>
    </form>
</body>

</html>