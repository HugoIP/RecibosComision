<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Agrupar Recibos</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a href="#" class="navbar-brand">Recibos</a>
    <ul class="navbar-nav ml-auto">
      <form class="form-inline my-2 my-lg-0">
        <input type="search" id="search" class="form-control mr-sm-2" placeholder="Leer codigo">
        <button class="btn btn-success my-2 my-sm-0" type="submit">Buscar</button>
      </form>
    </ul>
  </nav>
  <div class="container p-4">
    <div class="row">
      <div class="col-md-5">
        <div class="card">
          <div class="card-body">
            <form id="recibo-form">
              <div class="form-group">
                <input type="text" id="name" placeholder="Buscar codigo" class="form-control">
              </div>
              <div class="form-group">
                <textarea id="descripcion" cols="30" rows="10" class="form-control" placeholder="Descripcion de servicio"></textarea>
              </div>
              <button type="submit" class="btn btn-primary btn-block text-center">Agregar Recibo</button>  
            </form>
          </div>
        </div>
      </div>
      <div class="col-md-7">
        <div class="card" my-4 id="task-result">
          <div class="car-body">
            <ul id="container"></ul>
          </div>
        </div>
          <table>
            <thead>
              <tr>
                <td>Codigo</td>
                <td>Nombre</td>
                
              </tr>
            </thead>
            <tbody id="Recibos">
              
            </tbody>
          </table>
      </div>
    </div>
  </div>
<script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous">
</script>
<script src="js/app.js"></script>
</body>
</html>