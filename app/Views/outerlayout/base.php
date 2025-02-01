<!DOCTYPE html>
<html lang="en">
<head>
  <title>Codecanvas</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" class="rounded-5" type="image/png/jpeg" sizes="32x32" href="<?=base_url()?>/uploads/bstudio.webp">
  <link rel="icon" class="rounded-5" type="image/png/jpeg" sizes="16x16" href="<?=base_url()?>/uploads/bstudio.webp">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
 
  <style>
    .form-label {
      font-weight: bold;
      color: #495057;
      text-transform: uppercase;
      font-size: 0.9rem;
      letter-spacing: 0.05rem;
      margin-bottom: 5px;
    }

    .form-control {
      border-radius: 8px;
      padding: 0.75rem 1rem;
      box-shadow: rgba(9, 30, 66, 0.25) 0px 1px 1px, rgba(9, 30, 66, 0.13) 0px 0px 1px 1px;
      border: 1px solid #ced4da;
    }

    .card {
      border: none;
      border-radius: 12px;
      box-shadow: rgba(9, 30, 66, 0.25) 0px 1px 1px, rgba(9, 30, 66, 0.13) 0px 0px 1px 1px !important;
      padding: 2rem;
    }

    @media (min-width: 992px) {
      .content-container {
        margin-top: 80px; 
      }
    }


    .btn-primary{
    background-color: #3D3D3D !important;
    color:white !important;
    border: 0px;
    }

    .text-decoration-none{
      color:#3D3D3D !important;
    }


    @media (max-width: 768px) {
      .hide-mobile {
        display: none !important;
      }
      .display-4 {
        font-size: 2rem;
        text-align: center;
      }
      .card {
        padding: 1.5rem;
      }
    }
    
  </style>
</head>
<body>

<!-- Section: Design Block -->
<section>
  <div class="px-4 py-5 text-center text-md-start" style="background-color: hsl(0, 0%, 96%)">
    <div class="container content-container">
      
    
      <div class="row">
        <div class="col-12 d-block d-md-none">
          <h1 class="display-4 fw-bold">Code Canvas <br> <span class="text-success">by Code Bros</span></h1>
        </div>
      </div>

      <div class="row gx-lg-5 align-items-center">

  
        <div class="col-lg-6 d-none d-md-block">
          <h1 class="display-4 fw-bold">Code Canvas <br> <span class="text-success">by Code Bros</span></h1>
          <p class="text-muted">
            Enter your interactive Bootstrap 5 design environment. Start adding components and build layouts with a simple click, bringing your ideas to life.
          </p>
        </div>

   
        <div class="col-lg-6">
          <div class="card shadow">
            <div class="card-body px-md-5">
              <?=$this->renderSection("form");?>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</section>
<!-- Section: Design Block -->

</body>
</html>
