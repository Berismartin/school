<?php include 'includes/header.php'; ?>

<?php
  if (isset($_GET['page']) && $_GET['page']=='teachers') {
    include_once 'teachers.php';

  }elseif (isset($_GET['page']) && $_GET['page']=='subjects') {
    include_once 'subjects.php';

  }elseif (isset($_GET['page']) && $_GET['page']=='years') {
    include_once 'years.php';

  }elseif (isset($_GET['page']) && $_GET['page']=='classes') {
    include_once 'classes.php';

  }elseif (isset($_GET['page']) && $_GET['page']=='results') {
    include_once 'results.php';

  }elseif (isset($_GET['page']) && $_GET['page']=='streams') {
    include_once 'streams.php';

  }elseif (isset($_GET['page']) && $_GET['page']=='terms') {
    include_once 'terms.php';

  }elseif (isset($_GET['page']) && $_GET['page']=='combinations') {
    include_once 'combinations.php';

  }elseif (isset($_GET['page']) && $_GET['page']=='students') {
    include_once 'students.php';

  }else{

 ?>
 <div class="mt-5">
   <div class="container">
     <div class="title-head bg-white">
       <div>
         <i class="fa fa-home"></i>
         <h5>Statistics</h5>
       </div>
       <p>2022 Term 1</p>
       <p>Date: 08-12-2022</p>
     </div>
     <div class="cards">
       <div class="row">
         <div class="col col-6 col-md-4">
           <div class="view ">
             <div class="view-body">
               <div class="icon">
                 <img src="icons/users.svg" alt="">
               </div>
               <div class="card-data">
                 <p>S1 students</p>
                 <p>8</p>
               </div>
             </div>
             <span class="lead"> <i class="fa fa-angle-double-right"></i>View</span>
           </div>
         </div>
         <div class="col col-6 col-md-4">
           <div class="view ">
             <div class="view-body">
               <div class="icon">
                 <img src="icons/users.svg" alt="">
               </div>
               <div class="card-data">
                 <p>S2 students</p>
                 <p>8</p>
               </div>
             </div>
             <span class="lead"> <i class="fa fa-angle-double-right"></i>View</span>
           </div>
         </div>
         <div class="col col-6 col-md-4">
           <div class="view one">
             <div class="view-body">
               <div class="icon">
                 <img src="icons/users.svg" alt="">
               </div>
               <div class="card-data">
                 <p>Students</p>
                 <p>8</p>
               </div>
             </div>
             <span class="lead"> <i class="fa fa-angle-double-right"></i>View</span>
           </div>
         </div>
         <div class="col col-6 col-md-4">
           <div class="view ">
             <div class="view-body">
               <div class="icon">
                 <img src="icons/users.svg" alt="">
               </div>
               <div class="card-data">
                 <p>S1 students</p>
                 <p>8</p>
               </div>
             </div>
             <span class="lead"> <i class="fa fa-angle-double-right"></i>View</span>
           </div>
         </div>
         <div class="col col-6 col-md-4">
           <div class="view ">
             <div class="view-body">
               <div class="icon">
                 <img src="icons/users.svg" alt="">
               </div>
               <div class="card-data">
                 <p>S2 students</p>
                 <p>8</p>
               </div>
             </div>
             <span class="lead"> <i class="fa fa-angle-double-right"></i>View</span>
           </div>
         </div>
         <div class="col col-6 col-md-4">
           <div class="view ">
             <div class="view-body">
               <div class="icon">
                 <img src="icons/users.svg" alt="">
               </div>
               <div class="card-data">
                 <p>Students</p>
                 <p>8</p>
               </div>
             </div>
             <span class="lead"> <i class="fa fa-angle-double-right"></i>View</span>
           </div>
         </div>
         <div class="col col-6 col-md-4">
           <div class="view ">
             <div class="view-body">
               <div class="icon">
                 <img src="icons/users.svg" alt="">
               </div>
               <div class="card-data">
                 <p>S1 students</p>
                 <p>8</p>
               </div>
             </div>
             <span class="lead"> <i class="fa fa-angle-double-right"></i>View</span>
           </div>
         </div>
         <div class="col col-6 col-md-4">
           <div class="view ">
             <div class="view-body">
               <div class="icon">
                 <img src="icons/users.svg" alt="">
               </div>
               <div class="card-data">
                 <p>S2 students</p>
                 <p>8</p>
               </div>
             </div>
             <span class="lead"> <i class="fa fa-angle-double-right"></i>View</span>
           </div>
         </div>
         <div class="col col-6 col-md-4">
           <div class="view ">
             <div class="view-body">
               <div class="icon">
                 <img src="icons/users.svg" alt="">
               </div>
               <div class="card-data">
                 <p>Students</p>
                 <p>8</p>
               </div>
             </div>
             <span class="lead"> <i class="fa fa-angle-double-right"></i>View</span>
           </div>
         </div>
       </div>

     </div>
   </div>
 </div>


<?php } ?>
<?php include 'includes/footer.php'; ?>
