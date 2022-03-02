<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="view/login/style.css">
    <link rel="stylesheet" href="view/include/fonts.css">
    <title>Game Hub</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <section class="login_section">
        <img src="view/img/escudo.png" alt="img_Escudo">
        <form method="POST" action="controller/login/loginController.php" class="login_content" id="formLogin" name="teste">
            <h1>Bem Vindo ao Game Hub</h1>
            <p>Faça login ou cadastre-se para continuar</p>
            <table class="login_table">
                <tr>
                    <td class="login_label">Usuário</td>
                    <td><input type="text" class="login_input" name="data[tbusuario][usuario]"></td>
                </tr>
                <tr>
                    <td class="login_label">Senha</td>
                    <td><input type="password" class="login_input" name="data[tbusuario][senha]"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><a href="view/esqueciMinhaSenha/esqueciMinhaSenha.php" id="esqueciSenha">Esqueci minha senha</a></td>
                </tr>
            </table>
            <article class="login_btn">
                <button class="btnLoguin"><input type="hidden" name="data[formType]" value="formLogin">Entrar</button>
            </article>
        </form>
        <button class="btnLoguin"><a href="view/cadastro/cadastro.php">Cadastrar</a></button>
    </section>
</body>
<script src="controller/login/script.js"></script>
</html>