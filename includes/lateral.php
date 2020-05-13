
<!--barra lateral-->
<aside id="sidebar">
    
     <div id="buscador" class="bloque">
        <h3>Buscar</h3>
        
        <?php if(isset($_SESSION['error_busqueda'])): ?>
            <div class="alerta alerta-error">
                <?= $_SESSION['error_login'];?>
            </div>
        <?php endif; ?>
        
        <form action="buscar.php" method="POST">

            <input type="text" name="busqueda"/>
            <input type="submit" value="buscar"/>
            
        </form>
    </div>
    
    <?php if(isset($_SESSION['usuario'])): ?>
        <div id="usuario-logueado" class="bloque">
           <h3> Bienvenido, <?= $_SESSION['usuario']['nombre'].' '.$_SESSION['usuario']['apellidos']; ?></h3>
           <!--botones-->
           <?php if($_SESSION['usuario']['rol'] == 'admin'):?>
           <a href="crear-entradas.php" class="boton boton-verde">Crear entradas</a>
           <a href="crear-categoria.php" class="boton">Crear categorias</a>
           <?php endif;?>
           <a href="mis-datos.php" class="boton boton-amarillo">Mis datos</a>
           <a href="cerrar.php" class="boton boton-rojo">Cerrar sesion</a>
        </div>
    <?php endif; ?>
        
        
    <?php if(!isset($_SESSION['usuario'])): ?>
    <div id="login" class="bloque">
        <h3>Identificate</h3>
        
        <?php if(isset($_SESSION['error_login'])): ?>
            <div class="alerta alerta-error">
                <?= $_SESSION['error_login'];?>
            </div>
        <?php endif; ?>
        
        <form action="login.php" method="POST">
            <label for="email">Email</label>
            <input type="email" name="email"/>

            <label for="password">Contraseña</label>
            <input type="password" name="password"/>

            <input type="submit" value="Entrar"/>
        </form>
    </div>

     <div id="register" class="bloque">
         
        <h3>Registrate</h3>
        <!--mostrar errores-->
        <?php if(isset($_SESSION['completado'])):?>
        <div class="alerta alerta-exito"> 
               <?=$_SESSION['completado']?>
        </div>
        <?php elseif(isset($_SESSION['errores']['general'])): ?>
        <div class="alerta alerta-error"> 
               <?=$_SESSION['errores']['general']?>
        </div>
        <?php endif; ?>
        <form action="registro.php" method="POST">
            
            <label for="email">Email</label>
            <input type="email" name="email"/>
            <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'email') :'' ; ?>

            <label for="password">Contraseña</label>
            <input type="password" name="password"/>
            <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'password') :'' ; ?>

            <label for="nombre">Nombre</label>
            <input type="text" name="nombre"/>
           <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'nombre') :'' ; ?>

            <label for="apellidos">Apellidos</label>
            <input type="text" name="apellidos"/>
            <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'apellidos') :'' ; ?>

            <input type="submit" name="submit" value="Registrar"/>
            
        </form>
        <?php borrarErrores() ?>
    </div>
    <?php endif; ?>
</aside>