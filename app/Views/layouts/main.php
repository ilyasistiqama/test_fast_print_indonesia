<!doctype html>
<html lang="en">

<head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <title>Test Fast Print</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
     <!-- Link CDN Font Awesome -->
     <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
     <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.2/dist/sweetalert2.min.css" rel="stylesheet">
     <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.2/dist/sweetalert2.all.min.js"></script>

</head>

<body style="background-color: #f5f5f5;">
     <?php if (session()->getFlashdata('success')): ?>
          <script>
               Swal.fire({
                    title: 'Success',
                    text: '<?= session()->getFlashdata('success') ?>',
                    icon: 'success',
                    confirmButtonText: 'OK'
               });
          </script>
     <?php endif; ?>

     <?php if (session()->getFlashdata('error')): ?>
          <script>
               Swal.fire({
                    title: 'Error',
                    text: '<?= session()->getFlashdata('error') ?>',
                    icon: 'error',
                    confirmButtonText: 'OK'
               });
          </script>
     <?php endif; ?>

     <div class="d-flex justify-content-center">
          <div class="card mt-5 mb-5" style="width: 80%;">
               <div class="card-body">
                    <div class="logo d-flex justify-content-center">
                         <img src="<?= base_url('logo.jpg') ?>" alt="Logo Image" style="max-width: 130px;max-height 130px;" class="border border-3">
                    </div>
                    <?= $this->renderSection('content') ?>
               </div>
          </div>
     </div>

     <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>