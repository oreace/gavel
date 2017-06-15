 <div class="container">
        <div class="main">
            <div class="row">
                <div class="col-md-6 box-a">
                    <div class="activity">
                            <div class="row usr-search">
                            <div class="col-md-1 col-sm-1 col-xs-1 user-icon">
                            <?php
                            $img = NULL;
                            if (isset($_SESSION['email'])){  
                            $user = mysqli_fetch_array(mysqli_query($db, "select * from g_users where email='".$_SESSION['email']."'"));
                            $img = $user['img'];
                            $name = $user['first_name']. " ". $user['last_name'];
                            $prof = $user['profession']; 
                            }
                            if ($img == NULL){
                            ?>
                            <i class="fa fa-user-circle"></i>
                            <?php }else{ ?>
                            <img src="<?php echo URL; ?>public/img/avatar/<?php echo $img; ?>" alt="">
                            <?php } ?>
                            </div>
                            <form method="post" action="<?php echo URL; ?>forum/post" enctype="multipart/form-data">
                            <div class="col-md-11 col-sm-11 col-xs-11">
                                <div id="imaginary_container">
                                    <div class="input-group stylish-input-group">
                                        <input type="text" name="post_text" class="form-control" placeholder="What's Happening" required>
                                        <span class="input-group-addon">
                                        <label class="glyphicon glyphicon-camera">
                                        <input name="post_content" type="file" accept="image/*" style="display: none">
                                        </label>
                                       </span>
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>
                        <div class="row">
                            <!--<div class="col-sm-2 col-md-2"></div>-->
                            <div id="slideshow" class="col-sm-8 col-md-12">
                                <div id="slideshowWindow" class="champions">
                                    <!--Slideshow-->
                                    <div id="slidesHolder">
                                        <!--slide one-->
                                     <?php 
                                     $get = mysqli_query($db, "select * from g_forum_post order by id desc LIMIT 50");
                                     while ($row = mysqli_fetch_array($get)){
                                     $id = $row['id'];
                                     $user_id = $row['user_id'];
                                     $post_text = $row['post_text'];
                                     $post_content = $row['post_content'];
                                     $timeposted  = $row['timeposted'];

                                     $getname = mysqli_fetch_array(mysqli_query($db, "select * from g_users where email='$user_id'"));
                                     $name = $getname['first_name']." ".$getname['last_name'];
                                     $img = $getname['img'];  
                                     //=====time//
    $cur_time = time() - (60 * 60);
    $time_post = strtotime("$timeposted");
    $diff = abs($cur_time-$time_post);	
    
    //======================time ish
    $MINUTE = 60;
    $HOUR = 60 * 60;
    $DAY = 60 * 60 * 24;
    $MONTH = 60 * 60 * 24 * 30;
    
    if($diff < 2 * $MINUTE){
       $time = "about a minute ago";
    }else if($diff < 45 * $MINUTE){
       $time = floor($diff/$MINUTE) ." minutes ago";
        
    }else if($diff < 90 * $MINUTE){
          $time = "1 hour ago";
    }else if($diff < 24 * $HOUR){
          $time = floor($diff/$HOUR) ." hours ago";
    }else if($diff < 48 * $HOUR){
           $time = "yesterday"; 
    }else if($diff < 30 * $DAY){
        $time = floor($diff/$DAY) ." days ago";
    }else if($diff < 12 * $MONTH){
        $months = floor($diff/$DAY/30);
         if ($months<=1){
             $time = "1 month ago";
             
         }else{
             $time = $months." months ago";
             
         }
         
        
    }else{
        $years = floor($diff/$DAY/365);
         if ($years<=1){
             $time = "1 year ago";
             
         }else{
             $time = $years." years ago";
             
         }
        
    }
                                $facebook_count = mysqli_num_rows(mysqli_query($db, "select * from g_forum_poll where forum_id='$id' and type='facebook'"));
                                $twitter_count = mysqli_num_rows(mysqli_query($db, "select * from g_forum_poll where forum_id='$id' and type='twitter'"));
                                $likes_count = mysqli_num_rows(mysqli_query($db, "select * from g_forum_poll where forum_id='$id' and type='like'"));
                               
       
                                     ?>
                                         <a href="#" class="post-link" data-toggle="modal" data-target="#postFeed<?php echo $id; ?>">
                                    
                                        <div class="slide">
                                            <div class="post">
                                                <?php if($post_content != NULL){ ?>
                                                <div class="post-img-content">
                                                    <img src="<?php echo URL; ?>public/img/forum/<?php echo $post_content; ?>" class="img-responsive" />
                                                </div>
                                                <?php } ?>
                                                <div class="content">
                                                    <div class="info-n-header">
                                                        <div class="first-line">
                                                            <div class="usr-img">
                                                            <?php 
                                                            if ($img == NULL){
                                                            echo '<i class="fa fa-user-circle fa-3x"></i>';
                                                            }else{ 
                                                            ?>
                                                            <img src="<?php echo URL; ?>public/img/avatar/<?php echo $img; ?>" alt="">
                                                           <?php } ?>
                                                            </div>
                                                            <p class="head"><?php echo $name; ?><br>
                                                            </p>
                                                            <span class="author">
                                                                <time datetime="2014-01-20"><?php echo $time; ?></time>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="info-post">
                                
                                                        <p><?php echo substr($post_text, 0, 60)?>...</p>
                                <span class=" pull-left share"><a href="<?php echo URL; ?>forum/like/<?php echo $id ?>"> <i class="fa fa-heart"></i></a><span class="num"><?php echo $likes_count; ?></span>
                                </span>
                                <span class=" pull-left share"><a href="#" class="sharefacebook"> <i class="fa fa-facebook"></i></a><span class="num"><?php echo $facebook_count; ?></span>
                                </span>
                                <span class=" pull-left share"><a href="#"> <i class="fa fa-twitter"></i></a><span class="num"><?php echo $twitter_count; ?></span></span>
                         </div>
                                                </div>
                                            </div>
                                        </div>
                                        </a>
                                         <div id="postFeed<?php echo $id; ?>" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="post">
                         <?php if($post_content != NULL){ ?>
                                                <div class="post-img-content">
                                                    <img src="<?php echo URL; ?>public/img/forum/<?php echo $post_content; ?>" class="img-responsive" />
                                                </div>
                                                <?php } ?>
                             <div class="content">
                            <div class="info-n-header">
                                <div class="first-line">
                                         <div class="usr-img">
                                                            <?php 
                                                            if ($img == NULL){
                                                            echo '<i class="fa fa-user-circle fa-3x"></i>';
                                                            }else{ 
                                                            ?>
                                                            <img src="<?php echo URL; ?>public/img/avatar/<?php echo $img; ?>" alt="">
                                                           <?php } ?>
                                                            </div>
                                                            <p class="head"><?php echo $name; ?><br>
                                                            </p>
                                                            <span class="author">
                                                                <time datetime="2014-01-20"><?php echo $time; ?></time>
                                                            </span>
                                                        </div>
                                                    </div>
                            <div class="info-post">
                                <p><?php echo $post_text; ?></p>
                                <span class=" pull-left share"><a href="<?php echo URL; ?>forum/like/<?php echo $id ?>"> <i class="fa fa-heart"></i></a><span class="num"><?php echo $likes_count; ?></span>
                                </span>
                                <span class=" pull-left share"><a href="#" class="sharefacebook"> <i class="fa fa-facebook"></i></a><span class="num"><?php echo $facebook_count; ?></span>
                                </span>
                                <span class=" pull-left share"><a href="#"> <i class="fa fa-twitter"></i></a><span class="num"><?php echo $twitter_count; ?></span></span>                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
                                       <?php } ?> 
                                       
                                        <!--end of Slide-->
                                    </div>

                                </div>
                            </div>
                            <!--<div class="col-sm-2 col-md-offset-1"></div>-->
                        </div>
                    </div>
                </div>
                 <div class="col-md-6 margin">
                    <div class="login">
                        <div class="row log">
                            <div class="col-md-12 div">
                                <?php 
                                if (isset($_SESSION['loggedIn']) || isset($_SESSION['email'])){
                                ?> 
                                  <div class="logged-in">
                                    <div class="row">
                                        <div class="col-md-4 col-sm-4 col-xs-4">
                                            <div class="col-md-12">
                                                 <div class="profile-image">
                                                      <?php 
                                                       if ($img == NULL){
                                                       ?>
                                                     <i class="fa fa-user-circle fa-5x"></i>
                                                     <?php }else{ ?>
                                                     <img src="<?php echo URL; ?>public/img/avatar/<?php echo $img; ?>" alt="">
                                                     <?php } ?>
                                               
                                                </div>
                                            </div>

                                        </div>
                                        <div class=" col-md-8 col-xs-8 col-sm-8 rm-pad-left">
                                            <div class="col-md-12 rm-pad-left">
                                                <span class="title"><h3>My Profile</h3></span><br>
                                                <p class="infoz nm"><?php echo $name; ?> <br> <?php echo $prof; ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class=" col-md-12 col-xs-12 col-sm-12">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="col-md-3 lg-out">
                                                    <a href="<?php echo URL; ?>login/logout" class="btn btn-primary">Log Out</a>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="user-post">
                                                        <p class="infoz"><span class="num">3</span></p>
                                                        <p class="infoz"><span class="title">Post</span></p>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="user-mentor">
                                                        <p class="infoz"><span class="num">5</span></p>
                                                        <p class="infoz"><span class="title">Mentor</span></p>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="user-mentees">
                                                        <p class="infoz"><span class="num">6</span></p>
                                                        <p class="infoz"><span class="title">Mentees</span></p>
                                                    </div>
                                                </div>
                                                <div class="edit-post pull-right">
                                                    <a href="#" style="outline:none; text-decoration:none; color:#fff;"><i class="fa fa-edit fa-2x"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                             
                             
                              <?php }else{ ?>
                                <div class="login-area">
                                    <h2>LOG IN</h2>
                                    <form method="post" action="<?php echo URL; ?>login/run">
                                        <div class="group">
                                           <?php 
                                           if (isset($_SESSION['error'])){
                                               $err= $_SESSION['error'];
                                           echo "<p class='err'><span class='label'> $err </span></p>";
                                           $_SESSION['error'] = NULL;
                                           }
                                           ?>
                                            <input type="email" name="email" class="used" placeholder="Email">
                                            <input type="password" name="password" placeholder="Password">
                                            <p>
                                                <input type="submit" name="login" value="Log In">
                                            </p>
                                            <p> Don't have an account? <a href="#" data-toggle="modal" data-target="#login">Sign up</a></p>
                                        </div>
                                    </form>
                                
                                
                                </div>

                                        <?php } ?>
                        
                            </div>
                        </div>
                    </div>
                      <div class="row">
                        <div class="cee">
                            <div class="col-xs-6 col-sm-6 col-md-6 margin bg-c">
                                <h1 class="c">C</h1>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6 margin bg-gavel">
                                <img src="<?php URL; ?>public/img/gavel.png" width="140px" height="140px" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="extra">
                    <a class="ex-link" href="#" data-toggle="modal" data-target="#crtList">
                        <div class="col-xs-6 col-sm-3 col-md-3 margin extra-box gav">
                            <h3> <span> Court</span> <br><span> Listing</span> </h3>
                        </div>
                    </a>
                    <div class="col-xs-6 col-sm-3 col-md-3 margin extra-box lawyer"></div>
                    <div class="col-xs-6 col-sm-3 col-md-3 margin extra-box bg-orange"></div>
                    <div class="col-xs-6 col-sm-3 col-md-3 margin extra-box bg-green"></div>
                </div>
            </div>

        </div>
    </div>
    <!-- Modal -->

    <div id="crtList" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                           <!-- <div class="input-group">
                                <div class="input-group-btn">
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                       <select class="sel-crt-type"><span class="caret"></span>
                                    <ul class="dropdown-menu">
                                        <option>
                                            <li><a href="#">Court</a></li>
                                        </option>
                                        <option>
                                            <li><a href="#">Date</a></li>
                                        </option>
                                        <option>
                                            <li><a href="#">Location</a></li>
                                        </option>
                                    </ul>
                                    </select>
                                    </button>
                                </div>
                                <!-- /btn-group -->
                                <input type="text" class="form-control" name="cause" placeholder="Search Court list">

                          <!--  </div>
                            <!-- /input-group -->
                            <ul class="list-group-item">
                            <?php 
                            $get = mysqli_query($db, "select * from g_cause_listing where casetime > NOW()");
                            while ($row = mysqli_fetch_array($get)){
                            $title = $row['cause_title'];
                            $name = $row['court_name'];
                            $suit = $row['suit_no'];
                            $location = $row['location'];
                            $casetime = strtotime($row['casetime']);
                            $day= date('d', $casetime);

                            $month= date('m', $casetime);
                            $year = date('Y', $casetime);
                            $time = date('h:i:s A', $casetime);

                            
                            ?>
                                <li class="list-group c-list">
                                    <div class="row">
                                        <div class="col-md-2 col-sm-2 col-xs-2 date">
                                            <p>
                                                <span class="month"><?php echo $month; ?></span><br>
                                                <span class="day"><?php echo $day; ?></span><br>
                                                <span class="year"><?php echo $year; ?></span>
                                            </p>
                                        </div>
                                        <div class="col-md-8 col-xs-8 col-sm-8 info">
                                            <p>
                                                <span class="vs"><?php echo $title;  ?></span><br>
                                                <span class="place"><?php echo $name."<br>".$location; ?></span><br>
                                                <span class="time"><?php echo $time; ?></span>
                                            </p>
                                        </div>
                                    </div>
                                </li>
                           <?php  } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div id="login" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-body">
                    <legend>Sign Up</legend>
                    <form class="form" method="post" action="<?php echo URL; ?>member/createMember">
                    <?php 
                    if (isset($_SESSION['errorreg'])){
                             $err = $_SESSION['errorreg'];
                             echo "<h4>$err</h4>";
                     }
                    ?>

                        <div class="control-group">
                            <label class="control-label" for="inputName">Full Name</label>
                            <div class="controls">
                                <input type="text" placeholder="First Name" name="fname" required>
                                <input type="text" placeholder="Last Name" name="lname" required>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="inputEmail">Email</label>
                            <div class="controls">
                                <input type="text" placeholder="Email" name="email" required>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="inputName">Password</label>
                            <div class="controls">
                                <input type="password" placeholder="Password" name="password" required>
                                <input type="password" placeholder="Confirm Password" name="cpassword" required>
                            </div>
                        </div>
                        <div class="control-group" id="prof">
                            <label class="control-label" for="inputName">Select Profession</label>
                            <div class="controls">
                                <select class="selectProf" name="prof">
                                    <option value="1">Lawyer</option>
                                    <option value="2">Other</option>
                                </select>
                            </div>
                            <div class="controls">
                                <input class="prof-type hidden" type="text" name="prof2" placeholder="Type Profession">
                            </div>
                        </div>

                        <div class="control-group">
                            <div class="controls">
                                <button type="submit" class="btn">Sign Up</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
