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
    *{
      font-size: 12px;
    }


    .btn-action{
      color: var(--text-color);
      font-size: 10px !important;
    }
    .btn-action2{
      background-color: #3D3D3D !important;
      color: white;
    }
    .btn-action:hover{
      color: var(--text-color);
      font-weight:bold;
    }

    .customize-list{
      margin-top: 5px;
      border-radius: 3px !important;
      font-size: 10px !important;
      background-color: #D4F6FF;
    }
    body, html {
      height: 100%;
      margin: 0;
    }
    .navbar {
      min-height: 10%;
    }
    .main-content {
      min-height: 100vh;
      overflow: hidden;
    }
    .sidebar-content {
      min-height: 100vh;
      overflow-y: auto;
      box-shadow: rgba(0, 0, 0, 0.1) 0px 1px 3px 0px, rgba(0, 0, 0, 0.06) 0px 1px 2px 0px;
    }
    .monitor-screen{
      box-shadow: rgba(0, 0, 0, 0.1) 0px 1px 3px 0px, rgba(0, 0, 0, 0.06) 0px 1px 2px 0px;
    }


    .monitor-screen .scrollable::-webkit-scrollbar {
      display: none;  
    }
    .monitor-screen::-webkit-scrollbar {
      display: none;  
    }




    .codescreen pre {
      padding: 15px;
      border-radius: 0px;
      font-family: 'Courier New', Courier, monospace;
      font-size: 12px;
      color: #333;
      overflow-x: auto;
      white-space: pre-wrap;
      color: white;
    }

    .codescreen code {
      display: block;
      line-height: 1.5;
    }


  


    .custom-dropdown .dropdown-item:hover {
      background-color: #6c757d !important;
      color: #fff !important;               
    }
 
    .custom-dropdown .dropdown-item.active {
      background-color: #6c757d !important; 
      color: #fff !important;               
    }
    .custom-dropdown .dropdown-item{
      background-color: #bae8e8 !important; 
      color: #6c757d !important;               
    }
    .custom-dropdown .dropdown-menu{
      padding: 0px;
      height: 100px;
      overflow-y: scroll;
      box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;
    }
    .custom-dropdown .dropdown-item {
      border-radius: 0px;
      color: gray; 
      width: 100%;
      font-size: 10px !important;
    }
    .no-caret::after {
      display: none;
    }



    ::-webkit-scrollbar {
        width: 4px; 
        height: 4px; 
    }

    ::-webkit-scrollbar-track {
        background-color: #bae8e8;
        border-radius: 8px;
    }

    ::-webkit-scrollbar-thumb {
        background-color: #578E7E; 
        border-radius: 2px; 
    }
    ::-webkit-scrollbar-thumb:hover {
        background-color: #555; 
    }
    ::-webkit-scrollbar-corner {
        background-color: #f1f1f1;
    }


    .profile-avatar {
      width: 120px;
      height: 120px;
      border-radius: 50%;
      object-fit: cover;
      cursor: pointer;
    }

   
    @media (max-width: 767.98px) {
      .main-content, .sidebar-content {
        height: auto;
        overflow: visible;
      }
    }
    .custom-modal {
            position: fixed;
            bottom: 20px;
            left: 20px;
            width: 400px;
            background-color: snow;
            color: black;
            border-radius: 10px;
            padding: 15px;
            display: none; 
            box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 2px 6px 2px;
            z-index: 9999; 
        }

        .custom-modal-header {
            font-size: 18px;
            font-weight: bold;
        }

        .custom-modal-body {
            margin-top: 10px;
            font-size: 16px;
        }

        .custom-modal-footer {
            margin-top: 15px;
            text-align: right;
        }

        .custom-modal .close-btn {
            background-color: transparent;
            border: none;
            color: #fff;
            font-size: 20px;
            cursor: pointer;
            padding: 0;
        }

        .custom-modal.fade-in {
            animation: fadeIn 0.3s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }




        :root {
          --outer-background-color: #bae8e8;
          --inner-background-color: #ffffff;
          --text-color: #000;
          --footer-background: #f4f4f4;
          --screenlink-color: gray ; 
          --cardcategory-color:  #4A90E2  ; 
          --cardlist-color:  #ffffff  ; 
          --form-color:  #4A90E2  ; 
          --cardlisttext-color:  #3D3D3D ; 
          --codesc-background-color: #233142 ;
          --border-color:  lightgray   1px solid  ;
          --rowdark-color:  gray solid 1px  ;
          --rowbg-color: #1E1E1E  ;
        }
        


        body.dark-mode {
          --outer-background-color: #1E1E1E ;
          --inner-background-color: #121212 ;
          --codesc-background-color: #292929 ;
          --text-color: white ;
          --footer-background: #333;
          --screenlink-color: white ; 
          --cardcategory-color:  #121212 ; 
          --form-color:  #121212 ; 
          --cardlist-color:  #292929     ; 
          --cardlisttext-color:  #B3B3B3 ; 
          --border-color:  #121212     ;
          --rowbg-color: #B3B3B3  ;
          --rowdark-color:  #121212 solid 1px  ;
        }

        .rowcss{
          background-color: var(--rowbg-color);
          border : var(--rowdark-color) !important;
        }
 
        .outer {
          background-color: var(--outer-background-color);
          color: var(--text-color);
        }

        .inner {
          background-color: var(--inner-background-color);
          color: var(--text-color);
        }

        .code-sc{
          background-color: var(--codesc-background-color) !important;
        }


        .card-category h4{
        font-size: 10px !important;
        color: white !important;
        margin: 0px;
        background-color: var(--cardcategory-color);
        padding: 10px;
        }
        .card-category .list-group-item{
          background-color: var(--cardlist-color);
          color: var(--cardlisttext-color);
          font-size: 10px !important;
        }




        .form-item{
        background-color:var(--form-color);
        color: white;
        }




        .brand {
          color: var(--text-color) !important;
        }

        .screen-link{
          color: var(--text-color) !important;
        }

        #list-tab .list-group-item.active {
          font-weight: bold;
        }

        #list-tab .list-group-item {
          background-color: var(--inner-background-color); 
          font-size: 10px !important;
          color: var(--text-color) !important;
        }

        .screen-nav .screen-link.active {
          background-color: transparent !important;
          font-weight: bolder;
          border-radius: 5px !important;
        
        }
        .screen-nav .screen-link:hover {
          background-color: transparent !important;
          font-weight: bolder;  
          border-radius: 5px !important;
        }

        .screen-nav .screen-link {
          font-size: 12px;
          color:  var(--screenlink-color);  
          margin-left: 5px;
          margin-right: 5px;
          cursor: pointer;  
        }

        input {
          background-color: var(--cardlist-color) !important;
          color: var(--cardlisttext-color) !important;
          border:var(--border-color) !important ;
        }
 
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
            <button type="button" class="btn btn-action btn-sm me-2" data-bs-toggle="modal" data-bs-target="#tempform">
                <i class="fa-solid fa-floppy-disk"></i> Save 
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
            <div class="monitor-screen border-0 border text-dark m-2 inner p-0" style="height:88vh;  overflow: scroll; ">
                        <div id="output">
                            <?=$this->renderSection("monitor")?>
                        </div> 
            </div> 
          </div>

          <div class="tab-pane fade " id="pills-code" role="tabpanel" aria-labelledby="pills-home-tab">
            <div class="monitor-screen border-0 border text-dark code-sc  m-2   bg-dark p-0" style="height:88vh;  overflow: scroll; ">
                <span>
        
            
                    <div id="codeContent" class="codescreen"></div>
                </span>


            </div> 
          </div>


          <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
          <div class="monitor-screen border-0 border text-dark  m-2 p-0   inner p-0" style="height:88vh;  ">
                   <?=$this->renderSection("userprofile")?>
            </div> 
          </div>

        </div>
     
    
     
    
    
 
  






    </div>
<!-- FIRST COLUMN END -->




<!-- SECOND COLUMN START -->
    <div class="col-lg-2 col-md-2   sidebar-content   p-3 inner"  >

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
            <a class="fw-bold btn border-0 dropdown-toggle rounded-0 p-2 brand w-100 text-start" data-bs-toggle="dropdown" href="#" style="font-size:10px;">Components</a>
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
      <a class="fw-bold btn border-0 dropdown-toggle rounded-0 p-2 brand w-100 text-start" data-bs-toggle="dropdown" href="#content" style="font-size:10px;">Content and Forms</a>
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





    
    <div class="modal fade" id="tempform" tabindex="-1" aria-labelledby="modallabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="modallabel">Default Modal</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
              <?= form_open(base_url().'savecode', ['id' => 'codeForm']) ?> 
                <input type="hidden" name="tempemail" value="<?= ucfirst($userdata->email) ?>">
                <input type="text" class="form-control" name="tempname" placeholder="Project Name">
                <textarea id="hiddenInput" name="codeContent" style="display: none;"></textarea>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit">Submit</button>
                <?= form_close() ?>
              </div>
            </div>
          </div>
        </div>

  


        <script>
            document.getElementById('codeForm').addEventListener('submit', function(event) {
                let codeContent = document.getElementById('codeContent').innerHTML;
                document.getElementById('hiddenInput').value = codeContent;
            });
            </script>