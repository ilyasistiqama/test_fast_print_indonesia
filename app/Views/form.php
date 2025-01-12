<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<?php
$url = $product != null ? route_to('update', $product->id_product) : route_to('store');
?>

<form method="post" action="<?= $url ?>">
     <?= csrf_field() ?>

     <?php if ($product != null) : ?>
          <input type="hidden" name="_method" value="PUT">
     <?php endif; ?>

     <div class="d-block text-end mt-4">
          <h3>Form Product - (<?= $product != null ? 'Edit' : 'Add' ?>)</h3>
     </div>
     <hr>

     <div class="mb-3">
          <label for="product-name" class="form-label">Product Name</label>
          <input type="text" class="form-control" id="product-name" name="product_name" value="<?= old('product_name', $product != null ? $product->product_name : null) ?>">
          <?php if (isset($validation) && $validation->hasError('product_name')): ?>
               <div class="text-danger">
                    <?= $validation->getError('product_name') ?>
               </div>
          <?php endif; ?>
     </div>
     <div class="mb-3">
          <label for="price" class="form-label">Price</label>
          <input type="number" min="0" class="form-control" id="price" name="price" value="<?= old('price', $product != null ? $product->price : null) ?>">
          <?php if (isset($validation) && $validation->hasError('price')): ?>
               <div class="text-danger">
                    <?= $validation->getError('price') ?>
               </div>
          <?php endif; ?>
     </div>
     <div class="mb-3">
          <label for="category" class="form-label">Category</label>
          <select id="category" class="form-select" name="category">
               <option value="" selected>Choose Category</option>
               <?php foreach ($categories as $category) : ?>
                    <option value="<?= $category->id_category ?>" <?= ($product != null ? ($product->category_id == $category->id_category ? 'selected' : '') : '') ?>>
                         <?= $category->category_name ?>
                    </option>
               <?php endforeach; ?>
          </select>
          <?php if (isset($validation) && $validation->hasError('category')): ?>
               <div class="text-danger">
                    <?= $validation->getError('category') ?>
               </div>
          <?php endif; ?>
     </div>
     <div class="mb-3">
          <label for="status" class="form-label">Status</label>
          <select id="status" class="form-select" name="status">
               <option value="" selected>Choose Status</option>
               <?php foreach ($status as $stats) : ?>
                    <option value="<?= $stats->id_status ?>" <?= ($product != null ? ($product->status_id == $stats->id_status ? 'selected' : '') : '') ?>>
                         <?= $stats->status_name ?>
                    </option>
               <?php endforeach; ?>
          </select>
          <?php if (isset($validation) && $validation->hasError('status')): ?>
               <div class="text-danger">
                    <?= $validation->getError('status') ?>
               </div>
          <?php endif; ?>
     </div>

     <div class="mt-3">
          <hr>
          <a href="<?= route_to('home')  ?>" class="btn btn-secondary">Back</a>
          <button type="submit" class="btn btn-primary"><?= $product != null ? 'Update' : 'Save' ?></button>
     </div>
</form>

<?= $this->endSection() ?>