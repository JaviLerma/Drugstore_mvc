<!doctype html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  <title>Venta</title>

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
        <li class="nav-item">
          <a class="nav-link" href="/Drugstore_mvc/User">Gestión de usuarios</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/Drugstore_mvc/Cliente">Gestión de Clientes</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/Drugstore_mvc/Proveedor">Gestión de Proveedores</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="/Drugstore_mvc/Proveedor">Venta</a>
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
  <form action="<?= FOLDER_PATH . '/Proveedor/newProveedor' ?>" method="POST" class="col-lg-5">
    <h3>Gestión de Proveedores</h3>
    <hr />
    <?php if (!empty($proveedor_mod->id_proveedor)) { ?>
      ID: <input type="text" name="id_proveedor" class="form-control" value='<?php !empty($proveedor_mod->id_proveedor) ? print($proveedor_mod->id_proveedor) : ''; ?>' ; />
    <?php } ?>

    Nombre Proveedor: <input type="text" name="nombre_proveedor" class="form-control" required value='<?php !empty($proveedor_mod->nombre_proveedor) ? print($proveedor_mod->nombre_proveedor) : ''; ?>' ; />

    Teléfono: <input type="text" name="telefono" class="form-control" required value='<?php !empty($proveedor_mod->telefono) ? print($proveedor_mod->telefono) : ''; ?>' ; />
    
    Direccion: <input type="text" name="direccion" class="form-control" required value='<?php !empty($proveedor_mod->direccion) ? print($proveedor_mod->direccion) : ''; ?>' ; />
    
    Localidad: <input type="text" name="localidad" class="form-control" required value='<?php !empty($proveedor_mod->localidad) ? print($proveedor_mod->localidad) : ''; ?>' ; />

    Provincia: <input type="text" name="provincia" class="form-control" required value='<?php !empty($proveedor_mod->provincia) ? print($proveedor_mod->provincia) : ''; ?>' ; />

    Correo: <input type="email" name="mail" class="form-control" required value='<?php !empty($proveedor_mod->mail) ? print($proveedor_mod->mail) : ''; ?>' ; />
    
    <div style='color:red'><?php !empty($error_message) ? print($error_message) : ''; ?></div>
    <?php if (!empty($proveedor_mod->id_proveedor)) { ?>
      <input type="submit" value="Actualizar" name="actualizar" class="btn btn-success" />
    <?php } else { ?>
      <input type="submit" value="Añadir" name="anadir" class="btn btn-success" />
    <?php } ?>
    <a href="<?= FOLDER_PATH . '/Proveedor' ?>" class="btn btn-danger">Limpiar</a>
    <hr />
  </form>
  <aside>
    <div class="col-lg-7">
      <h3>Proveedores</h3>
      <hr />
    </div>

    <section class="col-lg-7 usuario" style="height:450px;overflow-y:scroll;">
      <table>
        <tr>
          <td>ID</td>
          <td>Nombre Proveedor</td>
          <td>Teléfono</td>
          <td>Direccion</td>
          <td>Localidad</td>
          <td>Provincia</td>
          <td>Correo</td>
        </tr>

        <tr>
          <?php foreach ($allproveedores as $proveedor) { ?>
            <td><?php echo $proveedor->id_proveedor; ?></td>
            <td><?php echo $proveedor->nombre_proveedor; ?></td>
            <td><?php echo $proveedor->telefono; ?></td>
            <td><?php echo $proveedor->direccion; ?></td>
            <td><?php echo $proveedor->localidad; ?></td>
            <td><?php echo $proveedor->provincia; ?></td>
            <td><?php echo $proveedor->mail; ?></td>
            <td></td>
            <td>
              <div class="right">
                <a href="<?= FOLDER_PATH . '/Proveedor/modProveedor' ?>/<?php echo $proveedor->id_proveedor; ?>" class="btn btn-danger">Modificar</a>
              </div>
            </td>
            <td>
              <div class="right">
                <a href="<?= FOLDER_PATH . '/Proveedor/deleteById' ?>/<?php echo $proveedor->id_proveedor; ?>" class="btn btn-danger">Borrar</a>
              </div>
            </td>
          </tr>
        <?php } ?>
      </table>
    </section>
  </aside>
</body>

</html>