<!DOCTYPE html>
<html lang="en">
<head>
  <title>Codecanvas</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" class="rounded-5" type="image/png/jpeg" sizes="32x32" href="<?=base_url()?>/uploads/CB.png">
  <link rel="icon"  class="rounded-5" type="image/png/jpeg" sizes="16x16" href="<?=base_url()?>/uploads/CB.png">
 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />


  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <style>
  
  </style>
</head>
<body>




<div id="customNotificationModal" class="custom-modal">
    <div class="custom-modal-header">
        Notification
        <button class="close-btn" onclick="closeModal()">×</button>
    </div>
    <div class="custom-modal-body">
        <?php 
            $message = session()->getTempdata('message');
            if (is_array($message)) {
                echo implode('<br>', $message);
            } else {
                echo $message;
            }
        ?>
    </div>
    <div class="custom-modal-footer">
        <button onclick="closeModal()" class="btn btn-secondary">Close</button>
    </div>
</div>


    <script>
        function showModal() {
            const modal = document.getElementById('customNotificationModal');
            modal.style.display = 'block';
            modal.classList.add('fade-in');
        }

        function closeModal() {
            const modal = document.getElementById('customNotificationModal');
            modal.style.display = 'none';
        }

        <?php if (session()->getTempdata('message')) : ?>
            window.onload = function() {
                showModal();
            };
        <?php endif; ?>
    </script>


  <div class="row g-0">



   <!-- FIRST COLUMN START -->
    <div class="col-lg-10 col-md-10 outer  main-content text-light"  >


    <nav class="navbar navbar-expand-md navbar-light   sticky-top inner">
    <div class="container-fluid d-flex align-items-center">
        <li class="nav-item dropdown align-items-center d-flex me-2 my-2">
            <a class="nav-link dropdown-toggle no-caret" href="#" role="button" data-bs-toggle="dropdown">
                <?php if ($userdata->profile_pic == null): ?>
                    <img src="<?=base_url()?>/uploads/male.jfif" alt="Avatar" style="width:40px;" class="rounded-pill">
                <?php else: ?>
                    <img src="<?=base_url()."/uploads/".$userdata->profile_pic?>" style="width:40px;" class="rounded-pill">
                <?php endif; ?>
            </a>
            <ul class="dropdown-menu  ms-3">
                <?=$this->renderSection("navprofile")?>
                <hr>
                <li><a class="dropdown-item fw-bold" style="background-color:transparent !important; cursor:pointer" id="darkModeToggle" style="font-size:12px">Dark Mode</a></li>
                <li><a class="dropdown-item fw-bold" style="background-color:transparent !important;" href="<?=base_url()?>/logout" style="font-size:12px">Sign out</a></li>



                <script>
  const darkModeToggle = document.getElementById('darkModeToggle');

  darkModeToggle.addEventListener('click', () => {
    document.body.classList.toggle('dark-mode');
    if (document.body.classList.contains('dark-mode')) {
      localStorage.setItem('darkMode', 'enabled');
      darkModeToggle.textContent = 'Light Mode';
    } else {
      localStorage.setItem('darkMode', 'disabled');
      darkModeToggle.textContent = 'Dark Mode';
    }
  });
  if (localStorage.getItem('darkMode') === 'enabled') {
    document.body.classList.add('dark-mode');
    darkModeToggle.textContent = 'Light Mode';
  }
</script>


            </ul>
        </li>
        
  
        <div class="d-flex align-items-center flex-grow-1">
        <a class="navbar-brand brand  me-3" href="#" style="font-family: 'Roboto', sans-serif; font-weight: 700; font-size: 1.2rem; text-transform: uppercase; transition: color 0.3s ease;">
  CodeCanvas
</a>

            
       
            <div class="d-md-none dropdown">
                <button class="btn btn-light dropdown-toggle no-caret" type="button" id="smallScreenDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa-solid fa-circle-chevron-down"></i>
                </button>

                <div class="dropdown-menu" aria-labelledby="smallScreenDropdown">
                <ul class="nav-pills nav   screen-nav"    id="pills-tab" role="tablist">
   
                    <li><a class="dropdown-item rounded-0 screen-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile">User</a></li>
                    <li><a class="dropdown-item rounded-0 screen-link" id="pills-monitor-tab" data-bs-toggle="pill" data-bs-target="#pills-monitor">Screen</a></li>
                    <li><a class="dropdown-item rounded-0 screen-link" id="pills-code-tab" data-bs-toggle="pill" data-bs-target="#pills-code">Code</a></li>

                </ul>
                </div>
            </div>
            
     
            <ul class="navbar-nav nav-pills nav d-none d-md-flex  screen-nav"  id="pills-tab" role="tablist">
                <li class="nav-item"><a class="nav-link rounded-0 screen-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile">User</a></li>
                <li class="nav-item"><a class="nav-link rounded-0 screen-link" id="pills-monitor-tab" data-bs-toggle="pill" data-bs-target="#pills-monitor">Screen</a></li>
                <li class="nav-item"><a class="nav-link rounded-0 screen-link" id="pills-code-tab" data-bs-toggle="pill" data-bs-target="#pills-code">Code</a></li>
            </ul>
        </div>
        
     
        <div class="d-flex align-items-center">
            <button class="btn btn-action btn-sm me-2" style="font-size:10px;" onclick="copyOutput()">
                <i class="fa-solid fa-copy"></i> Copy Code
            </button>
            <a href="<?= base_url('undo') ?>" class="btn btn-action btn-sm me-2" style="font-size:10px;">
                <i class="fa-solid fa-rotate-left"></i> Content
            </a>
            <a href="<?= base_url('undoLastRow') ?>" class="btn btn-action btn-sm me-3" style="font-size:10px;">
                <i class="fa-solid fa-rotate-left"></i> Row
            </a>
        </div>
    </div>
</nav>











 

          

        <div class="tab-content" id="pills-tabContent">
          <div class="tab-pane fade show active" id="pills-monitor" role="tabpanel" aria-labelledby="pills-monitor-tab">
            <div class="monitor-screen border-1 border text-dark m-2  p-0" style="height:88vh;  overflow: scroll; ">
                        <div id="output">
                            <?=$this->renderSection("monitor")?>
                        </div> 
            </div> 
          </div>

          <div class="tab-pane fade" id="pills-code" role="tabpanel" aria-labelledby="pills-home-tab">
            <div class="monitor-screen border-1 border text-dark  m-2   bg-dark p-0" style="height:88vh;  overflow: scroll; ">
                <span>
        
            
                    <div id="codeContent" class="codescreen"></div>
                </span>


            </div> 
          </div>


          <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
          <div class="monitor-screen border-1 border text-dark  m-2 p-0   bg-light p-0" style="height:88vh; overflow: scroll; ">
                   <?=$this->renderSection("userprofile")?>
            </div> 
          </div>

        </div>
     
    
     
    
    
 
  






    </div>
<!-- FIRST COLUMN END -->





 











<!-- SECOND COLUMN START -->
    <div class="col-lg-2 col-md-2   sidebar-content inner  p-3"  >

        <!-- COLUMNS S-->
        <div class="d-flex flex-column sticky-top">
  
        <h6 class="fw-bold p-2   border-1  border-bottom" style="font-size:10px;">Columns</h6> 
      <div class="p-2 outer" style="border-radius:3px">
        <form class="p-2 rounded-2 form-item" action="<?= base_url('/generateColumns') ?>" method="post" >
          <label class="mb-2" for="columnCount" style="font-size:10px;">Number of Columns:</label><br>
          <input class="form-control" type="number" placeholder="..." id="columnCount" name="columnCount" min="1" max="20" required><br>
          <button class="btn btn-light w-100 text-dark btn-sm" type="submit"><i class="fa-solid fa-plus"></i></button>
        </form>

        </div>
       </div>
       <!-- COLUMNS E-->



    <br><br> 



 
      <!-- CONTENTS S-->
      <div class="d-flex flex-column " >
         

        <ul class="nav nav-tabs ">
          <li class="nav-item dropdown w-100  custom-dropdown">
            <a class="fw-bold btn border-0 brand dropdown-toggle rounded-0 p-2 text-dark w-100 text-start" data-bs-toggle="dropdown" href="#" style="font-size:10px;">Components</a>
            <?=$this->include("others/container")?>
     
          </li>
        </ul>
 

 <div class=" p-2 mt-2 outer" style="border-radius:3px">
        <div class="list-group  " style="height:30vh !important; overflow-y:scroll">
              <?=$this->renderSection("componentlist")?>
        </div>
        </div>
      </div>
      <!-- CONTENTS E-->


      
    <br><br> 



 
<!-- CONTENTS S-->
<div class="d-flex flex-column " >
   

  <ul class="nav nav-tabs ">
    <li class="nav-item dropdown w-100  custom-dropdown">
      <a class="fw-bold btn border-0 brand dropdown-toggle rounded-0 p-2 text-dark w-100 text-start" data-bs-toggle="dropdown" href="#content" style="font-size:10px;">Content and Forms</a>
      <?=$this->include("others/contents")?>

    </li>
  </ul>


<div class=" p-2 mt-2 outer" style="border-radius:3px">
  <div class="list-group  " style="height:30vh !important; overflow-y:scroll">
        <?=$this->renderSection("content")?>
  </div>
  </div>
</div>
<!-- CONTENTS E-->
  








    </div>
    <!-- SECOND COLUMN END -->

  </div>

 

 

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>


</body>
</html>

  

<script>
    const outputContent = document.getElementById("output").innerHTML;
    function escapeHtml(text) {
        var element = document.createElement('div');
        if (text) {
            element.innerText = text;
            element.textContent = text;
        }
        return element.innerHTML;
    }


    const codeContent = document.getElementById("codeContent");
    codeContent.innerHTML = `<pre><code>${escapeHtml(outputContent)}</code></pre>`; 

    function copyOutput() {
        navigator.clipboard.writeText(outputContent).then(function() {
            const copyModal = new bootstrap.Modal(document.getElementById('copyModal'));
            copyModal.show();

            setTimeout(() => {
                copyModal.hide();
            }, 3000);
        }).catch(function(error) {
            console.error("Failed to copy text: ", error);
        });
    }
</script>


    <div class="modal fade border-0" id="copyModal" tabindex="-1" aria-labelledby="copyModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered w-50 border-0">
            <div class="modal-content w-75  border-0">
        
                <div class="modal-body p-3"  style="font-size:12px">
                    Codes copied to clipboard!
                </div>
                <div class="modal-footer p-0">
                    <button type="button" class="btn btn-action2 p-2 text-light" style="font-size:10px" data-bs-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>


  


