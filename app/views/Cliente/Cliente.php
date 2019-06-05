<!doctype html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  <title>Gestión de Clientes</title>

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
        <li class="nav-item active">
          <a class="nav-link" href="/Drugstore_mvc/Cliente">Gestión de Clientes</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/Drugstore_mvc/Proveedor">Gestión de Proveedores</a>
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
  <form action="<?= FOLDER_PATH . '/Cliente/newCliente' ?>" method="POST" class="col-lg-5">
    <h3>Gestión de Clientes</h3>
    <hr />
    <?php if (!empty($cliente_mod->id_cliente)) { ?>
      ID: <input type="text" name="id_cliente" class="form-control" value='<?php !empty($cliente_mod->id_cliente) ? print($cliente_mod->id_cliente) : ''; ?>' ; />
    <?php } ?>
    Nombre y Apellido: <input type="text" name="nombre_apellido" class="form-control" required value='<?php !empty($cliente_mod->nombre_apellido) ? print($cliente_mod->nombre_apellido) : ''; ?>' ; />
    DNI: <input type="text" name="dni" class="form-control" required value='<?php !empty($cliente_mod->dni) ? print($cliente_mod->dni) : ''; ?>' ; />
    Teléfono: <input type="text" name="telefono" class="form-control" required value='<?php !empty($cliente_mod->telefono) ? print($cliente_mod->telefono) : ''; ?>' ; />
    <div style='color:red'><?php !empty($error_message) ? print($error_message) : ''; ?></div>
    <?php if (!empty($cliente_mod->id_cliente)) { ?>
      <input type="submit" value="Actualizar" name="actualizar" class="btn btn-success" />
    <?php } else { ?>
      <input type="submit" value="Añadir" name="anadir" class="btn btn-success" />
    <?php } ?>
    <a href="<?= FOLDER_PATH . '/Cliente' ?>" class="btn btn-danger">Limpiar</a>
    <hr />
  </form>
  <aside>
    <div class="col-lg-5">
      <h3>Clientes</h3>
      <hr />
    </div>

    <section class="col-lg-5 usuario" style="height:450px;overflow-y:scroll;">
      <table>
        <tr>
          <td>ID</td>
          <td>Nombre y Apellido</td>
          <td>DNI</td>
          <td>Teléfono</td>
        </tr>

        <tr>
          <?php foreach ($allclientes as $cliente) { ?>
            <td><?php echo $cliente->id_cliente; ?></td>
            <td><?php echo $cliente->nombre_apellido; ?></td>
            <td><?php echo $cliente->dni; ?></td>
            <td><?php echo $cliente->telefono; ?></td>
            <td></td>
            <td>
              <div class="right">
                <a href="<?= FOLDER_PATH . '/Cliente/modCliente' ?>/<?php echo $cliente->id_cliente; ?>" class="btn btn-danger">Modificar</a>
              </div>
            </td>
            <td>
              <div class="right">
                <a href="<?= FOLDER_PATH . '/Cliente/deleteById' ?>/<?php echo $cliente->id_cliente; ?>" class="btn btn-danger">Borrar</a>
              </div>
            </td>
          </tr>
        <?php } ?>
      </table>
    </section>
  </aside>
</body>

</html>