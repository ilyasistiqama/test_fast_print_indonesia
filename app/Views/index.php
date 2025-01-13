<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<?php
$page = $page == null ? 1 : $page;
?>

<div class="d-flex justify-content-end gap-1 mb-4 mt-4">
     <form action="<?= route_to('sync') ?>" method="post">
          <button type="submit" class="btn btn-success btn-sm btn-sync">
               <i class="fa-solid fa-rotate"></i>
               Sync Data
          </button>
     </form>
     <a href="<?= route_to('create') ?>" class="btn btn-primary btn-sm">
          <i class="fa-solid fa-plus"></i>
          Add Product
     </a>
</div>
<div class="table-responsive">
     <table class="table table-hover table-striped table-bordered border-dark rounded-circle">
          <thead>
               <tr>
                    <th class="text-center align-middle" scope="col">#</th>
                    <th class="text-center align-middle" scope="col">Name</th>
                    <th class="text-center align-middle" scope="col">Price</th>
                    <th class="text-center align-middle" scope="col">Category</th>
                    <th class="text-center align-middle" scope="col">Status</th>
                    <th class="text-center align-middle" scope="col">Created At</th>
                    <th class="text-center align-middle" scope="col">Synced At</th>
                    <th class="text-center align-middle" scope="col">Action</th>
               </tr>
          </thead>
          <tbody>
               <?php if (empty($products)): ?>
                    <tr>
                         <td colspan="7" class="text-center">No data</td>
                    </tr>
               <?php endif; ?>

               <?php foreach ($products as $index => $product): ?>
                    <tr>
                         <th class="text-center align-middle" scope="row"><?= ($paginate * ($page - 1)) + ($index + 1) ?></th>
                         <td class="text-center align-middle"><?= $product->product_name ?></td>
                         <td class="text-center align-middle"><?= format_rupiah($product->price)  ?></td>
                         <td class="text-center align-middle"><?= $product->category_name  ?></td>
                         <td class="text-center align-middle"><?= $product->status_name  ?></td>
                         <td class="text-center align-middle"><?= $product->created_at  ?></td>
                         <td class="text-center align-middle"><?= $product->synced_at  ?></td>
                         <td class="text-center align-middle">
                              <div class="d-flex justify-content-center gap-1">
                                   <a href="<?= route_to('edit', $product->id_product) ?>" class="btn btn-sm btn-warning">
                                        <i class="fa-solid fa-pencil"></i>
                                   </a>
                                   <form action="<?= route_to('delete') ?>" method="POST" class="d-inline form-delete">
                                        <?= csrf_field() ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="id_product" value="<?= $product->id_product ?>">
                                        <button type="button" class="btn btn-sm btn-danger btn-delete">
                                             <i class="fa-solid fa-trash"></i>
                                        </button>
                                   </form>
                              </div>
                         </td>
                    </tr>
               <?php endforeach; ?>
          </tbody>
     </table>
     <div class="d-flex justify-content-center">
          <?= $pager->links('default', 'bootstrap') ?>
     </div>
</div>


<script>
     const deleteButtons = document.getElementsByClassName('btn-delete');
     const syncButton = document.getElementsByClassName('btn-sync');

     for (let button of deleteButtons) {
          button.addEventListener('click', function() {
               const form = this.closest('form');

               Swal.fire({
                    title: 'Warning',
                    icon: 'warning',
                    text: 'Are you sure to delete this data?',
               }).then((result) => {
                    if (result.isConfirmed) {
                         form.submit();
                    }
               });
          });
     }

     for (let button of syncButton) {
          button.addEventListener('click', function() {
               Swal.fire({
                    title: 'Processing...',
                    text: 'Please wait while we process your request.',
                    icon: 'info',
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    showConfirmButton: false
               });
          });
     }
</script>


<?= $this->endSection() ?>