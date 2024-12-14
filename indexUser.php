<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tierra del cafe</title>
    <link rel="stylesheet" href="./CSS/PaginaInicial.css">
    <link rel="stylesheet" href="./CSS/DropdownMenu.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="/JS/dropdownMenu.js"></script>
</head>
<body>

    <header>
        <nav class="navbar">
            <div class="logo">
                <img src="../proyecto-cafeteria/Img/logo.jpg" alt="logo"  alt="Tierra del Café"> 


                
            </div>
            <div class="nav-links"> 
                <li><a href="javascript:void(0)">TIENDA<span class="glyphicon glyphicon-chevron-down iconsize"></span></a>
                    <ul class="dropdown">
                        <li><a href="PHP/cafePage.php" >CAFÉ</a></li>
                        <li><a href="PHP/AccesoriosPage.php">ACCESORIOS</a></li>
                    </div>
                <li><a href="NosotrosPage.html" class="us">NOSOTROS</a></li>
            </ul>
            
                <div class="iconos">
                    <a href="#carrito">
                        <img src="../proyecto-cafeteria/Img/carrito.svg" class="iconos">
                    </a>
                    
                    <a href="../proyecto-cafeteria/perfil.php">
                    
                        <img src="../proyecto-cafeteria/Img/inicio-sesion.svg" class="iconos">
                    </a>
            
        </nav>
    </header>

    <div class="container">
        <div class="wrapper">
            <div class="wrapper-holder">
                <div id="slider-img1"> <img src="../proyecto-cafeteria/Img/GranoCafeSlider1.jpg" alt=""> </div>
                <div id="slider-img2"> <img src="../proyecto-cafeteria/Img/TazasCafeSlider2.jpg" alt=""></div>
                <div id="slider-img3"> <img src="../proyecto-cafeteria/Img/prensaFrancesaSlider3.jpg" alt=""></div>
                <div id="slider-img4"> <img src="../proyecto-cafeteria/Img/chorreadorCafeSlider4.jpg" alt=""></div>
            </div>

           
        </div>
        <div class="button-holder">
            <a href="#slider-img1" class="button"></a>
            <a href="#slider-img2" class="button"></a>
            <a href="#slider-img3" class="button"></a>
            <a href="#slider-img4" class="button"></a>
        </div>
    </div>

 
</body>
</html>