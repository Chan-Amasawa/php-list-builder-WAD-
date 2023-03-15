<?php require_once ViewDir . "/template/header.php"; ?>

<h1>Inventory Lists</h1>

<div class=" d-flex justify-content-between my-3">
  <a href="<?= route('inventory') ?>" class=" btn btn-outline-primary">All Items</a>
</div>

<form action="<?= route("inventory-store"); ?>" method="post">
  <div class="row rounded border p-5 align-items-end">
    <div class="col">
      <label for="name" class=" form-label">Item Name</label>
      <input type="text" id="name" name="name" class="form-control" required>
    </div>
    <div class="col">
      <label for="price" class=" form-label">Price</label>
      <input type="number" id="price" name="price" class="form-control" required>
    </div>
    <div class="col">
      <label for="stock" class=" form-label">Stock</label>
      <input type="number" id="stock" name="stock" class="form-control" required>
    </div>
    <div class="col-2">
      <button class="btn btn-primary">Add Item</button>
    </div>
  </div>
</form>

<?php require_once ViewDir . "/template/footer.php"; ?>