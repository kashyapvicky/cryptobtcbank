<?php
// function getusers($sponser_id,$pos)
// {

//   $this->db->select('name,user_name,mobile_number,sponser_id,position,join_date,activation_date,status');
//   $this->db->where('sponser_id',$username);
//   $query = $this->db->get('users');
//   $row = $query->row_array();
//                   // print_r($row); die;
//   if(!empty($row['user_name']))
//   { 
//     echo"
//     <td>".$row['name']."</td>
//     <td>".$row['mobile_number']."</td>
//     <td>".$row['sponser_id']."</td>
//     <td>".$row['position']."</td>
//     <td>".$row['join_date']."</td>
//     <td>".$row['activation_date']."</td>
//     <td>".$row['status']."</td>
//     ";
//     $pos = "Left";
//     getusers($row['user_name'],$pos);
//   }
  
// }
// function getusers($snode,$pos)
// {
//   global $s_dbid,$pid,$cnt,$sno,$records_ref;
  
//     $sql  = "SELECT id,name,user_name,email,mobile_number,sponser_id,position,join_date,activation_date,status' FROM `users` WHERE `sponser_id` = '$snode' order by position";
//          $result = mysqli_query($sql);
//     // $query = $this->db->query($sql);
//       if(mysqli_num_rows($result)>0){
//       while(list($mid,$name,$username,$email,$phone,$sponsor,$position,$jdate,$act_date,$status_join)  = @mysqli_fetch_row($result))
//       {
//         $ruser = $username;
//         $cnt=1;
//         $sno++;
       
        
        
        
//         echo"
//           <td>".$row['name']."</td>
//           <td>".$row['mobile_number']."</td>
//           <td>".$row['sponser_id']."</td>
//           <td>".$row['position']."</td>
//           <td>".$row['join_date']."</td>
//           <td>".$row['activation_date']."</td>
//           <td>".$row['status']."</td>
//           ";
// //     $pos = "Left";
// //     getusers($row['user_name'],$pos);
    
//         getusers($ruser,$pos);
      
//     }
//   }
// }

?>
<!-- ########## START: RIGHT PANEL ########## -->
<div class="sl-sideright">
  <ul class="nav nav-tabs nav-fill sidebar-tabs" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" data-toggle="tab" role="tab" href="#messages">Messages (2)</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" role="tab" href="#notifications">Notifications (8)</a>
    </li>
  </ul><!-- sidebar-tabs -->

  <!-- Tab panes -->
  <div class="tab-content">
    <div class="tab-pane pos-absolute a-0 mg-t-60 active" id="messages" role="tabpanel">
      <div class="media-list">
        <!-- loop starts here -->
        <a href="" class="media-list-link">
          <div class="media">
            <img src="../img/img3.jpg" class="wd-40 rounded-circle" alt="">
            <div class="media-body">
              <p class="mg-b-0 tx-medium tx-gray-800 tx-13">Donna Seay</p>
              <span class="d-block tx-11 tx-gray-500">2 minutes ago</span>
              <p class="tx-13 mg-t-10 mg-b-0">A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring.</p>
            </div>
          </div><!-- media -->
        </a>
        <!-- loop ends here -->
        <a href="" class="media-list-link">
          <div class="media">
            <img src="../img/img4.jpg" class="wd-40 rounded-circle" alt="">
            <div class="media-body">
              <p class="mg-b-0 tx-medium tx-gray-800 tx-13">Samantha Francis</p>
              <span class="d-block tx-11 tx-gray-500">3 hours ago</span>
              <p class="tx-13 mg-t-10 mg-b-0">My entire soul, like these sweet mornings of spring.</p>
            </div>
          </div><!-- media -->
        </a>
        <a href="" class="media-list-link">
          <div class="media">
            <img src="../img/img7.jpg" class="wd-40 rounded-circle" alt="">
            <div class="media-body">
              <p class="mg-b-0 tx-medium tx-gray-800 tx-13">Robert Walker</p>
              <span class="d-block tx-11 tx-gray-500">5 hours ago</span>
              <p class="tx-13 mg-t-10 mg-b-0">I should be incapable of drawing a single stroke at the present moment...</p>
            </div>
          </div><!-- media -->
        </a>
        <a href="" class="media-list-link">
          <div class="media">
            <img src="../img/img5.jpg" class="wd-40 rounded-circle" alt="">
            <div class="media-body">
              <p class="mg-b-0 tx-medium tx-gray-800 tx-13">Larry Smith</p>
              <span class="d-block tx-11 tx-gray-500">Yesterday, 8:34pm</span>

              <p class="tx-13 mg-t-10 mg-b-0">When, while the lovely valley teems with vapour around me, and the meridian sun strikes...</p>
            </div>
          </div><!-- media -->
        </a>
        <a href="" class="media-list-link">
          <div class="media">
            <img src="../img/img3.jpg" class="wd-40 rounded-circle" alt="">
            <div class="media-body">
              <p class="mg-b-0 tx-medium tx-gray-800 tx-13">Donna Seay</p>
              <span class="d-block tx-11 tx-gray-500">Jan 23, 2:32am</span>
              <p class="tx-13 mg-t-10 mg-b-0">A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring.</p>
            </div>
          </div><!-- media -->
        </a>
      </div><!-- media-list -->
      <div class="pd-15">
        <a href="" class="btn btn-secondary btn-block bd-0 rounded-0 tx-10 tx-uppercase tx-mont tx-medium tx-spacing-2">View More Messages</a>
      </div>
    </div><!-- #messages -->

    <div class="tab-pane pos-absolute a-0 mg-t-60 overflow-y-auto" id="notifications" role="tabpanel">
      <div class="media-list">
        <!-- loop starts here -->
        <a href="" class="media-list-link read">
          <div class="media pd-x-20 pd-y-15">
            <img src="../img/img8.jpg" class="wd-40 rounded-circle" alt="">
            <div class="media-body">
              <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Suzzeth Bungaos</strong> tagged you and 18 others in a post.</p>
              <span class="tx-12">October 03, 2017 8:45am</span>
            </div>
          </div><!-- media -->
        </a>
        <!-- loop ends here -->
        <a href="" class="media-list-link read">
          <div class="media pd-x-20 pd-y-15">
            <img src="../img/img9.jpg" class="wd-40 rounded-circle" alt="">
            <div class="media-body">
              <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Mellisa Brown</strong> appreciated your work <strong class="tx-medium tx-gray-800">The Social Network</strong></p>
              <span class="tx-12">October 02, 2017 12:44am</span>
            </div>
          </div><!-- media -->
        </a>
        <a href="" class="media-list-link read">
          <div class="media pd-x-20 pd-y-15">
            <img src="../img/img10.jpg" class="wd-40 rounded-circle" alt="">
            <div class="media-body">
              <p class="tx-13 mg-b-0 tx-gray-700">20+ new items added are for sale in your <strong class="tx-medium tx-gray-800">Sale Group</strong></p>
              <span class="tx-12">October 01, 2017 10:20pm</span>
            </div>
          </div><!-- media -->
        </a>
        <a href="" class="media-list-link read">
          <div class="media pd-x-20 pd-y-15">
            <img src="../img/img5.jpg" class="wd-40 rounded-circle" alt="">
            <div class="media-body">
              <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Julius Erving</strong> wants to connect with you on your conversation with <strong class="tx-medium tx-gray-800">Ronnie Mara</strong></p>
              <span class="tx-12">October 01, 2017 6:08pm</span>
            </div>
          </div><!-- media -->
        </a>
        <a href="" class="media-list-link read">
          <div class="media pd-x-20 pd-y-15">
            <img src="../img/img8.jpg" class="wd-40 rounded-circle" alt="">
            <div class="media-body">
              <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Suzzeth Bungaos</strong> tagged you and 12 others in a post.</p>
              <span class="tx-12">September 27, 2017 6:45am</span>
            </div>
          </div><!-- media -->
        </a>
        <a href="" class="media-list-link read">
          <div class="media pd-x-20 pd-y-15">
            <img src="../img/img10.jpg" class="wd-40 rounded-circle" alt="">
            <div class="media-body">
              <p class="tx-13 mg-b-0 tx-gray-700">10+ new items added are for sale in your <strong class="tx-medium tx-gray-800">Sale Group</strong></p>
              <span class="tx-12">September 28, 2017 11:30pm</span>
            </div>
          </div><!-- media -->
        </a>
        <a href="" class="media-list-link read">
          <div class="media pd-x-20 pd-y-15">
            <img src="../img/img9.jpg" class="wd-40 rounded-circle" alt="">
            <div class="media-body">
              <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Mellisa Brown</strong> appreciated your work <strong class="tx-medium tx-gray-800">The Great Pyramid</strong></p>
              <span class="tx-12">September 26, 2017 11:01am</span>
            </div>
          </div><!-- media -->
        </a>
        <a href="" class="media-list-link read">
          <div class="media pd-x-20 pd-y-15">
            <img src="../img/img5.jpg" class="wd-40 rounded-circle" alt="">
            <div class="media-body">
              <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Julius Erving</strong> wants to connect with you on your conversation with <strong class="tx-medium tx-gray-800">Ronnie Mara</strong></p>
              <span class="tx-12">September 23, 2017 9:19pm</span>
            </div>
          </div><!-- media -->
        </a>
      </div><!-- media-list -->
    </div><!-- #notifications -->

  </div><!-- tab-content -->
</div><!-- sl-sideright -->
    <!-- ########## END: RIGHT PANEL ########## --->

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Starlight</a>
        <a class="breadcrumb-item" href="index.html">Tables</a>
        <span class="breadcrumb-item active">Data Table</span>
      </nav>

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Data Table</h5>
          <p>DataTables is a plug-in for the jQuery Javascript library.</p>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Direct Downline</h6>
          <p class="mg-b-20 mg-sm-b-30">Searching, ordering and paging goodness will be immediately added to the table, as shown in this example.</p>

          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-10p">Name</th>
                  <th class="wd-15p">Phone Number</th>
                  <th class="wd-15p">Sponser</th>
                  <th class="wd-10p">Position</th>
                  <th class="wd-15p">Joining Date</th>
                  <th class="wd-15p">Activation Date</th>
                  <th class="wd-10p">Status</th>

                </tr>
              </thead>
              <tbody>
               <?php
                if(!empty($td_left))
                {
                  foreach ($td_left as $key => $row) 
                  {
                    echo"
                    <tr>
                      <td>".$row['name']."</td>
                      <td>".$row['mobile_number']."</td>
                      <td>".$row['sponser_id']."</td>
                      <td>".$row['position']."</td>
                      <td>".$row['join_date']."</td>
                      <td>".$row['activation_date']."</td>
                      <td>".$row['status']."</td>
                      </tr>
                      ";
                      $this->user_panel_model->get_rest_child($row['user_name']);
                  }
                }

                if(!empty($td_right))
                {
                  foreach ($td_right as $key => $row) 
                  {
                    echo"
                    <tr>
                      <td>".$row['name']."</td>
                      <td>".$row['mobile_number']."</td>
                      <td>".$row['sponser_id']."</td>
                      <td>".$row['position']."</td>
                      <td>".$row['join_date']."</td>
                      <td>".$row['activation_date']."</td>
                      <td>".$row['status']."</td>
                      </tr>
                      ";
                      $this->user_panel_model->get_rest_child($row['user_name']);
                  }
                }

               ?>
              </tbody>
            </table>
          </div><!-- table-wrapper -->
        </div><!-- card -->
    </div><!-- sl-pagebody -->
    <script>
      $(function(){
        'use strict';

        $('#datatable1').DataTable({
          responsive: true,
          language: {
            searchPlaceholder: 'Search...',
            sSearch: '',
            lengthMenu: '_MENU_ items/page',
          }
        });

        $('#datatable2').DataTable({
          bLengthChange: false,
          searching: false,
          responsive: true
        });

        // Select2
        $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });

      });
    </script>


