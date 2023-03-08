<?php require_once ViewDir . "/template/header.php"; ?>

<h1>My Lists</h1>

<div class=" d-flex justify-content-between my-3">
  <a href="<?= route('list') ?>" class=" btn btn-outline-primary">All Lists</a>
</div>

<form action="<?= route("list-store"); ?>" method="post">
  <div class="row rounded border p-5 align-items-end">
    <div class="col-5">
      <label for="name" class=" form-label">Name</label>
      <input type="text" id="name" name="name" class="form-control" required>
    </div>
    <div class="col-5">
      <label for="money" class=" form-label">Money</label>
      <input type="number" id="money" name="money" class="form-control" required>
    </div>
    <div class="col-2">
      <button class="btn btn-primary">Add List</button>
    </div>
  </div>
</form>

<?php require_once ViewDir . "/template/footer.php"; ?>