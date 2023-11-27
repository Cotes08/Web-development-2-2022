<div class="container">
  <div class="row">
    <div class="col-12">
      <h1>Hola, <?= session()->get('firstname') ?></h1>
      <h1>Este es tu correo: <?= session()->get('email') ?></h1>
      <h1>Este es tu apellido: <?= session()->get('lastname') ?></h1>
    </div>
  </div>
</div>
