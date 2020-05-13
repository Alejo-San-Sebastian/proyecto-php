
<?php require_once 'includes/cabecera.php'; ?>

<?php require_once 'includes/lateral.php'; ?>
            
<!--contenido princupal-->
<div id="principal">
<h1>Ultimas noticias</h1>

    <?php
       $entradas = conseguirEntradas($db, true);
       if(!empty($entradas)):
            
           while ($entrada = mysqli_fetch_assoc($entradas)):
    ?>

            <article class="entrada">
                <a href="entrada.php?id=<?= $entrada['id']?>">
                    <h2><?=$entrada['titulo']?></h2>
                    <span class="fecha"><?= $entrada['categoria'].' | '.$entrada['fecha']?> </span>
                        <p>
                           <?= substr($entrada['descripcion'], 0,250)."...";?>
                        </p>
                </a>
            </article>

    <?php
       endwhile;
       endif;
    ?>
 
</article>
<div id="ver-todas">
    <a href="entradas.php">Ver todas las noticias</a>
</div>
</div>
        
<?php require_once 'includes/pie.php'; ?>