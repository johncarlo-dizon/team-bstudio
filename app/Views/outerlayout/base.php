<!DOCTYPE html>
<html lang="en">
<head>
  <title>Codecanvas</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" class="rounded-5" type="image/png" sizes="32x32" href="<?=base_url()?>/uploads/bstudio.webp">
  <link rel="icon" class="rounded-5" type="image/png" sizes="16x16" href="<?=base_url()?>/uploads/bstudio.webp">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
 
  <style>
    html, body {
      height: 100%;
      margin: 0;
      display: flex;
      flex-direction: column;
    }

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

    .content-container {
      flex: 1;
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

    .footer {
      background-color: #3D3D3D;
      color: white;
      font-size:12px;
      padding: 12px 0;
      text-align: center;
      width: 100%;
      position: absolute;
      bottom: 0;
    }

    .name-container {
      transition: opacity 1s ease-in-out;
    }

    .fade-out {
      opacity: 0;
    }
  </style>
</head>
<body>

<!-- Section: Design Block -->
<section class="content-container">
  <div class="px-4 py-5 text-center text-md-start" style="background-color: hsl(0, 0%, 96%)">
    <div class="container">
      <div class="row">
        <div class="col-12 d-block d-md-none">
        <h1 class="display-4 fw-bold">Code Canvas <br> <span class="text-success">by</span>
          <span class="text-success name-container"  id="nameDisplay">Code Bros</span>
        </h1>

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

<!-- Footer -->
<footer class="footer">
  <div class="container">
    <p class="mb-0">&copy; 2025 Codecanvas by Code Bros. All rights reserved.</p>
  </div>
</footer>
<!-- Footer -->






<script>
  const names = ["John Carlo", "Aaron Jireh", "Joseph Lee", "Joel","Jomel","Code Bros"];
  let index = 0;
  const nameElement = document.getElementById("nameDisplay");

  function changeName() {
    nameElement.classList.add("fade-out");

    setTimeout(() => {
      nameElement.textContent = names[index];
      nameElement.classList.remove("fade-out");

    
      setTimeout(() => {
        nameElement.style.transition = "opacity 1s ease-in-out";  
      }, 50);   

      index = (index + 1) % names.length;
    }, 1000);  
  }

  setInterval(changeName, 2000);
</script>

</body>
</html>
