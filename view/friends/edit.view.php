<?php require_once ViewDir . "/template/header.php"; ?>

<h1>Edit Friend</h1>

<div class=" d-flex justify-content-between my-3">
  <a href="<?= route('friends') ?>" class=" btn btn-outline-primary">All Friends</a>
</div>

<form action="<?= route("friend-update"); ?>" method="post">
  <div class="row rounded border p-5 align-items-end">
    <input type="hidden" name="_method" value="put">
    <input type="hidden" name="id" value="<?= $list['id'] ?>">
    <div class="col-6">
      <label for="name" class=" form-label">Name</label>
      <input type="text" id="name" name="name" class="form-control" value="<?= $list['name'] ?>">
    </div>
    <div class="col-6">
      <label for="email" class=" form-label">Email</label>
      <input type="email" id="email" name="email" class="form-control" value="<?= $list['email'] ?>">
    </div>
    <div class="col-6">
      <label for="gender" class=" form-label">Gender</label>
      <input type="text" id="gender" name="gender" class="form-control" value="<?= $list['gender'] ?>">
    </div>
    <div class="col-6">
      <label for="favourite_color" class=" form-label">Favourite Color</label>
      <input type="text" id="favourite_color" name="favourite_color" class="form-control" value="<?= $list['favouriteColor'] ?>">
    </div>
    <div class="col-12">
      <label for="address" class=" form-label">Address</label>
      <input type="text" id="address" name="address" class="form-control" value="<?= $list['address'] ?>">
    </div>
    <div class="col-12">
      <button class="btn btn-primary w-100 mt-4">Update List</button>
    </div>
  </div>
</form>

<?php require_once ViewDir . "/template/footer.php"; ?>