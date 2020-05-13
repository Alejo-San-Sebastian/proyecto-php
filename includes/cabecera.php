
<?php require_once 'conexion.php'; ?>

<?php require_once 'includes/helpers.php'; ?>

<!DOCTIPE HTML>

<html lang="es">
    
    <head>
        
        <meta charset="utf-8"/>
        <title>InfoBus</title>
        <link rel="stylesheet" type="text/css" href="./assets/css/style.css"/>
        <link rel="shortcut icon" type="image/jpg" href=”../img/logo.jpg”/>
        
    </head>
    
        <!--cabecera-->
        <heder id="cabecera">
            <!-- LOGO-->
            <div id="logo">
                <a href="index.php">
                     InfoBus
                </a>
            </div>
        <!--menu-->
            <nav id="menu">
                <ul>
                    <li>
                        <a href="index.php">Inicio</a>
                    </li>
           
                    <?php
                        $categorias = conseguirCategorias($db); 
                            if(!empty($categorias)):
                                while($categoria = mysqli_fetch_assoc($categorias)): 
                     ?>
                                        <li>
                                            <a href="categoria.php?id=<?=$categoria['id']?>"><?= $categoria['nombre']?></a>
                                        </li>
                    <?php
                     endwhile;
                     endif;
                    ?>
                    <li>
                        <a href="index.php">Sobre mi</a>
                    </li>
                      <li>
                        <a href="index.php">Contacto</a>
                    </li>
                </ul>
            </nav>
        <div class="clearfix"></div>
        </heder>
        
         <div id="contenedor">