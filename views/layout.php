<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>App Hospital de Especialidades San Bartolo</title>
    <link rel="icon" href="build/img/logo.png">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="build/css/app.css">
</head>
<body>
    <header class="header">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="/" class="logo"><i class="fas fa-heartbeat"></i><span>HESB</span></a>
                <div class="mobile-menu">
                        <img src="/build/img/barra.svg" alt="Icono menu responsive">
                </div>
                <div class="derecha">
                        <nav class="navegacion">
                        <?php if(!isset($_SESSION['login'])) echo '<a href="/login">Iniciar Sesion</a>';?>
                        <?php if(isset($_SESSION['login']) === true) echo '<a href="/menu">Menu Principal</a>';?>
                        <?php if(isset($_SESSION['login']) === true) echo '<a href="/logout">Cerrar Sesión</a>';?>

                        </nav>
                </div>
            </div>
        </div>
    </header>
    <div class="contenedor">
        <?php echo $contenido; ?>
    </div>
    <?php
        echo "<script src='build/js/app.js'></script>";  
        echo "<script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.2/chart.min.js' integrity='sha512-zjlf0U0eJmSo1Le4/zcZI51ks5SjuQXkU0yOdsOBubjSmio9iCUp8XPLkEAADZNBdR9crRy3cniZ65LF2w8sRA==' crossorigin='anonymous' referrerpolicy='no-referrer'></script>";
    ?>
</body>
</html>