<?php require_once ViewDir . "/template/header.php"; ?>

<h1>Friends' List</h1>

<div class=" d-flex justify-content-between my-3">
  <div>
    <a href="<?= route('friend-create') ?>" class=" btn btn-outline-primary">Create New</a>
  </div>
  <div>
    <form class="d-flex input-group " method="get" action="">
      <input class="form-control border-end-0" name="q" placeholder="Search" value="<?= $_GET['q'] ?>">
      <?php if (isset($_GET['q'])) : ?>
        <a href="<?= route('friends'); ?>" class="input-group-text border-start-0">
          <i class=" bi bi-x position-relative my-auto"></i>
        </a>
      <?php endif; ?>
      <button class="btn btn-primary">Search</button>
    </form>
  </div>
</div>

<table class=" table table-bordered">
  <thead>
    <tr>
      <th>#</th>
      <th>Name</th>
      <th>Email</th>
      <th>Gender</th>
      <th>Favourite Color</th>
      <th>Address</th>
      <th>Control</th>
      <th>Created At</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($lists['data'] as $list) : ?>
      <tr>
        <td>
          <?= $list['id']; ?>
        </td>
        <td>
          <?= $list['name']; ?>
        </td>
        <td>
          <?= $list['email']; ?>
        </td>
        <td>
          <?= $list['gender']; ?>
        </td>
        <td>
          <?= $list['favouriteColor']; ?>
        </td>
        <td>
          <?= $list['address']; ?>
        </td>
        <td>
          <a href="<?= route('friend-edit', ['id' => $list['id']]) ?>" class="btn btn-outline-info btn-sm">Edit</a>
          <form class=" d-inline-block" action="<?= route('friend-delete') ?>" method="post">
            <input type="hidden" name="id" value="<?= $list['id']; ?>">
            <input type="hidden" name="_method" value="DELETE">
            <button class="btn btn-outline-danger btn-sm">Delete</button>
          </form>
        </td>
        <td>
          <?= $list['created_at']; ?>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>

</table>
<?= paginator($lists); ?>

<?php require_once ViewDir . "/template/footer.php"; ?>