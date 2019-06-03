<!doctype html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <title>Menu Principal</title>

  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }

    input {
      margin-top: 5px;
      margin-bottom: 5px;
    }

    .right {
      float: right;
    }
  </style>
  <!-- Custom styles for this template -->
  <link href="navbar-top-fixed.css" rel="stylesheet">
</head>

<body>

  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="#"><?= $usuario ?></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="/Drugstore_mvc/Main">Menu Principal <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="/Drugstore_mvc/User">Gestión de usuarios</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#">Disabled</a>
        </li>
      </ul>
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="/Drugstore_mvc/main/logout">Cerrar Sesion</a>
        </li>
      </ul>
    </div>
  </nav>
  <hr />
  <hr />
  <form action="<?= FOLDER_PATH . '/User/newUser' ?>" method="POST" class="col-lg-5">
    <h3>Añadir usuario</h3>
    <hr />
    <?php if (!empty($usuario_mod->usuario)) { ?>
      ID: <input type="text" name="id_usuario" class="form-control" value='<?php !empty($usuario_mod->id_usuario) ? print($usuario_mod->id_usuario) : ''; ?>' ; />
    <?php } ?>
    Nombre y Apellido: <input type="text" name="nombre_apellido" class="form-control" required value='<?php !empty($usuario_mod->nombre_apellido) ? print($usuario_mod->nombre_apellido) : ''; ?>' ; />
    Usuario: <input type="text" name="usuario" class="form-control" required value='<?php !empty($usuario_mod->usuario) ? print($usuario_mod->usuario) : ''; ?>' ; />
    Contraseña: <input type="password" name="pass" class="form-control" required />
    Repite Contraseña: <input type="password" name="pass2" class="form-control" required />
    <div style='color:red'><?php !empty($error_message) ? print($error_message) : ''; ?></div>
    <?php if (!empty($usuario_mod->usuario)) { ?>
      <input type="submit" value="Actualizar" name="actualizar" class="btn btn-success" />
    <?php } else { ?>
      <input type="submit" value="Añadir" name="anadir" class="btn btn-success" />
    <?php } ?>

    <hr />
    <hr />
  </form>

  <div class="col-lg-5">
    <h3>Usuarios</h3>
    <hr />
  </div>

  <section class="col-lg-5 usuario" style="height:400px;overflow-y:scroll;">
    <table>
      <tr>
        <td>ID</td>
        <td>Nombre y Apellido</td>
        <td>Usuario</td>
      </tr>

      <tr>
        <?php foreach ($allusers as $user) { ?>
          <td><?php echo $user->id_usuario; ?></td>
          <td><?php echo $user->nombre_apellido; ?></td>
          <td><?php echo $user->usuario; ?></td>
          <td>
            <div class="right">
              <a href="<?= FOLDER_PATH . '/User/modUser' ?>/<?php echo $user->id_usuario; ?>" class="btn btn-danger">Modificar</a>
            </div>
          </td>
          <td>
            <div class="right">
              <a href="<?= FOLDER_PATH . '/User/deleteById' ?>/<?php echo $user->id_usuario; ?>" class="btn btn-danger">Borrar</a>
            </div>
          </td>
        </tr>
      <?php } ?>
    </table>

  </section>

</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script>
  window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')
</script>
<script src="/docs/4.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
</body>

</html>