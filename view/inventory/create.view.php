<?php require_once ViewDir . "/template/header.php"; ?>

<h1>Inventory Lists</h1>

<div class=" d-flex justify-content-between my-3">
  <a href="<?= route('inventory') ?>" class=" btn btn-outline-primary">All Items</a>
</div>

<form action="<?= route("inventory-store"); ?>" method="post">
  <div class="row rounded border p-5 align-items-end">
    <div class="col-6">
      <label for="name" class=" form-label">Item Name</label>
      <input type="text" id="name" name="name" value="<?= old('name') ?>" class="form-control <?= hasError('name') ? 'is-invalid' : ''; ?>">
      <?php if (hasError('name')) : ?>
        <div class="invalid-feedback">
          <?= showError('name') ?>
        </div>
      <?php endif; ?>
    </div>
    <div class="col-6">
      <label for="price" class=" form-label">Price</label>
      <input type="number" id="price" name="price" value="<?= old('price') ?>" class="form-control <?= hasError('price') ? 'is-invalid' : ''; ?>">
      <?php if (hasError('price')) : ?>
        <div class="invalid-feedback">
          <?= showError('price') ?>
        </div>
      <?php endif; ?>
    </div>
    <div class="col-12">
      <label for="stock" class=" form-label">Stock</label>
      <input type="number" id="stock" name="stock" value="<?= old('stock') ?>" class="form-control <?= hasError('stock') ? 'is-invalid' : ''; ?>">
      <?php if (hasError('stock')) : ?>
        <div class="invalid-feedback">
          <?= showError('stock') ?>
        </div>
      <?php endif; ?>
    </div>
    <div class="col-12 mt-3">
      <button class="btn btn-primary w-100">Add Item</button>
    </div>
  </div>
</form>

<?php require_once ViewDir . "/template/footer.php"; ?>