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
    <h3>Venta</h3>
    <hr />
    <?php if (!empty($cliente->id_cliente)) { ?>
      ID: <input type="text" name="id_cliente" class="form-control" value='<?php !empty($cliente->id_cliente) ? print($cliente->id_cliente) : ''; ?>' ; />
    <?php } ?>
    Nombre y Apellido: <input type="text" name="nombre_apellido" class="form-control" required value='<?php !empty($cliente->nombre_apellido) ? print($cliente->nombre_apellido) : ''; ?>' ; />
    DNI: <input type="text" name="dni" class="form-control" required value='<?php !empty($cliente->dni) ? print($cliente->dni) : ''; ?>' ; />
    Teléfono: <input type="text" name="telefono" class="form-control" required value='<?php !empty($cliente->telefono) ? print($cliente->telefono) : ''; ?>' ; />

    <hr />
  </form>
  <aside>
    <div class="mdl-textfield mdl-js-textfield">
      <select class="mdl-textfield__input">
        <option value="" disabled="" selected="">Selecciones Productos</option>
        <?php foreach ($allarticulos as $articulo) { ?>
          <option value=""><?php echo $articulo->nombre_articulo; ?></option>
        <?php } ?>
      </select>
    </div>
  </aside>
</body>

</html>