<div id="wrapper">

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                        <?php
                         
                           /*
                            $show = Users::show_all_users(); 
                            $values = mysqli_fetch_assoc($show);
                            echo  $values['password'];*/
                          /* 
                           $row =  Users::show_users_by_id(1);
                           $user = Users::instantiation($row);
                           
                            echo $user->id;
                            */
                           /*$row =  Users::show_all_users();
                           print_r($row);
                           foreach ($row as $key ) {
                               echo  $key->id;
                           }*/
                           $users = Users::show_all();
                           foreach($users as $user){
                                echo  $user->id;
                           }



                        ?>
                            Dashboard <small> Statistics Overview</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Dashboard
                            </li>
                        </ol>
                    </div>
                </div>
                       </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
</div>
    <!-- /#wrapper -->
