<?php require_once ViewDir . "/template/header.php"; ?>

<h1>Edit List</h1>

<div class=" d-flex justify-content-between my-3">
  <a href="<?= route('list') ?>" class=" btn btn-outline-primary">All Lists</a>
</div>

<form action="<?= route("list-update"); ?>" method="post">
  <div class="row rounded border p-5 align-items-end">
    <input type="hidden" name="_method" value="put">
    <input type="hidden" name="id" value="<?= $list['id'] ?>">
    <div class="col-5">
      <label for="name" class=" form-label">Name</label>
      <input type="text" id="name" name="name" class="form-control" value="<?= $list['name'] ?>">
    </div>
    <div class="col-5">
      <label for="money" class=" form-label">Money</label>
      <input type="number" id="money" name="money" class="form-control" value="<?= $list['money'] ?>">
    </div>
    <div class="col-2">
      <button class="btn btn-primary">Update List</button>
    </div>
  </div>
</form>

<?php require_once ViewDir . "/template/footer.php"; ?>