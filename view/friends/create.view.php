<?php require_once ViewDir . "/template/header.php"; ?>

<h1>Add New Friend</h1>

<div class=" d-flex justify-content-between my-3">
  <a href="<?= route('friends') ?>" class=" btn btn-outline-primary">All Lists</a>
</div>

<form action="<?= route("friend-store"); ?>" method="post">
  <div class="row rounded border p-5 align-items-end">
    <div class="col-6">
      <label for="name" class=" form-label">Name</label>
      <input type="text" id="name" name="name" class="form-control" required>
    </div>
    <div class="col-6">
      <label for="email" class=" form-label">Email</label>
      <input type="email" id="email" name="email" class="form-control" required>
    </div>
    <div class="col-6">
      <label for="gender" class=" form-label">Gender</label>
      <input type="text" id="gender" name="gender" class="form-control" required>
    </div>
    <div class="col-6">
      <label for="favorite_color" class=" form-label">Favourite Color</label>
      <input type="text" id="favorite_color" name="favourite_color" class="form-control" required>
    </div>
    <div class="col-12">
      <label for="address" class=" form-label">Address</label>
      <input type="text" id="address" name="address" class="form-control" required>
    </div>
    <div class="col-12">
      <button class="btn btn-primary w-100 mt-4">Add List</button>
    </div>
  </div>
</form>

<?php require_once ViewDir . "/template/footer.php"; ?>