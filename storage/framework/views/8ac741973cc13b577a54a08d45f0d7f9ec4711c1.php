<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Flarepoint CRM</title>
        
    <link href="<?php echo e(URL::asset('css/bootstrap.min.css')); ?>" rel="stylesheet" type="text/css" >

  <link href="<?php echo e(URL::asset('css/jasny-bootstrap.css')); ?>" rel="stylesheet" type="text/css" >

    <link href='https://fonts.googleapis.com/css?family=Lato:400,700, 300' rel='stylesheet' type='text/css'>
      <script type="text/javascript" src="<?php echo e(URL::asset('js/vue.min.js')); ?>"></script>
       <!--- <script src="http://cdnjs.cloudflare.com/ajax/libs/vue/1.0.15/vue.min.js"></script> -->
          <script type="text/javascript" src="<?php echo e(URL::asset('js/jquery-2.2.3.min.js')); ?>"></script>
          

        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
     <link rel="stylesheet" type="text/css" href="<?php echo e(URL::asset('css/semantic.css')); ?>">

         <link href="<?php echo e(URL::asset('css/font-awesome.min.css')); ?>" rel="stylesheet" type="text/css" >
        <!---    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css"> -->

     <script type="text/javascript" src="<?php echo e(URL::asset('js/bootstrap-paginator.js')); ?>"></script>

     <link href="<?php echo e(URL::asset('css/jquery.dataTables.min.css')); ?>" rel="stylesheet" type="text/css" >
     <!---   <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css"> -->
<link href="<?php echo e(URL::asset('css/dropzone.css')); ?>" rel="stylesheet" type="text/css" >

        <link rel="stylesheet" href="<?php echo e(asset(elixir('css/app.css'))); ?>">
       <!-- <script type="text/javascript" src="https://js.stripe.com/v2/"></script>-->
              <!---  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/i18n/jquery-ui-i18n.min.js"> -->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
<script src="//js.pusher.com/3.0/pusher.min.js"></script> 
 <script type="text/javascript" src="<?php echo e(URL::asset('js/Chart.min.js')); ?>"></script>
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.1.1/Chart.min.js"></script>-->
 <script type="text/javascript" src="<?php echo e(URL::asset('js/jquery-2.2.3.min.js')); ?>"></script>





</head>
<body>

<div id="wrapper">
<div class="navbar navbar-default navbar-top">
<!--NOTIFICATIONS START-->
<div class="dropdown">
  <a id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="/page.html">
    <i class="glyphicon glyphicon-bell"><span id="notifycount"></span></i>
  </a>
  
  <ul class="dropdown-menu notify-drop  notifications" role="menu" aria-labelledby="dLabel">
    
    <div class="notification-heading"><h4 class="menu-title">Notifications</h4><h4 class="menu-title pull-right"><a href="notifications/markall">Mark all as read</a><i class="glyphicon glyphicon-circle-arrow-right"></i></h4>
    </div>
    <li class="divider"></li>
   <div class="notifications-wrapper">
     
     <span id="notification-item"></span>

<script>
function postRead(id) {

   $.ajax({
        type: 'post',
        url: 'notifications/markread',
        data: {Id : id}
    });


}
$(function(){


 $.get('<?php echo e(url('/notifications/getall')); ?>', function(notifications){
      var obj = $.parseJSON(notifications);
      var notifyItem = document.getElementById('notification-item');
      var bell = document.getElementById('notifycount');
      var msg = "";
      var count = 0;
      $.each(obj, function(index, notification)
      {
        count++;
        var id = notification['id'];
        var url = notification['url'];
        
        msg += `<div> 
        <a class="content" onclick="postRead(`+id+`)" href="`+url+`">
        ` 
        + notification['text'] + 
        ` </a></div> 
        <hr class="notify-line"/>`;
         notifyItem.innerHTML = msg;
     });
        bell.innerHTML = count;
    })

});
    

</script>

   </div>
    
  </ul>
  </a>
</div>
<!--NOTIFICATIONS END-->
  <button type="button" class="navbar-toggle" data-toggle="offcanvas" data-target="#myNavmenu" >
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
  </button>
</div>

<!-- /#sidebar-wrapper 
    <!-- Sidebar menu -->

<nav id="myNavmenu" class="navmenu navmenu-default navmenu-fixed-left offcanvas-sm" role="navigation">

        <div class="list-group panel">
        
            <p class=" list-group-item" title=""><img src="<?php echo e(url('images/flarepoint_logo.png')); ?>" alt=""></p>

        
  <a href="<?php echo e(route('dashboard', \Auth::id())); ?>" class=" list-group-item"  data-parent="#MainMenu"><i class="glyphicon glyphicon-dashboard"></i> <?php echo e(trans('main.Dashboard')); ?> </a>
  <a href="<?php echo e(route('users.show', \Auth::id())); ?>" class=" list-group-item"  data-parent="#MainMenu"><i class="glyphicon glyphicon-user"></i> <?php echo e(trans('main.Profile')); ?> </a>


            
                <a href="#clients" class=" list-group-item" data-toggle="collapse" data-parent="#MainMenu"><i class="glyphicon glyphicon-tag"></i> <?php echo e(trans('main.Clients')); ?> </i></a>
            <div class="collapse" id="clients">
                <a href="<?php echo e(route('clients.index')); ?>" class="list-group-item childlist"><?php echo e(trans('main.All Clients')); ?></a>
                 <?php if(Auth::check() && Auth::user()->canDo('client.create')): ?>   
                <a href="<?php echo e(route('clients.create')); ?>" class="list-group-item childlist" ><?php echo e(trans('main.New Client')); ?></a>
                <?php endif; ?>
            </div>

            <a href="#tasks" class=" list-group-item" data-toggle="collapse" data-parent="#MainMenu"><i class="glyphicon glyphicon-tasks"></i> <?php echo e(trans('main.Tasks')); ?> </a>
            <div class="collapse" id="tasks">
                <a href="<?php echo e(route('tasks.index')); ?>" class="list-group-item childlist"><?php echo e(trans('main.All Tasks')); ?> </a>
             <?php if(Auth::check() && Auth::user()->canDo('task.create')): ?>   
                <a href="<?php echo e(route('tasks.create')); ?>" class="list-group-item childlist" ><?php echo e(trans('main.New Task')); ?></a>
                <?php endif; ?>
            </div>
            
               <a href="#user" class=" list-group-item" data-toggle="collapse" data-parent="#MainMenu"><i class="fa fa-users"></i> <?php echo e(trans('main.Users')); ?> </i></a>
            <div class="collapse" id="user">
                <a href="<?php echo e(route('users.index')); ?>" class="list-group-item childlist"><?php echo e(trans('main.All Users')); ?></a>
      <?php if(Auth::check() && Auth::user()->canDo('user.create')): ?>        
                <a href="<?php echo e(route('users.create')); ?>" class="list-group-item childlist" ><?php echo e(trans('main.New User')); ?> </i></a>
              <?php endif; ?>
            </div>

           <a href="#leads" class=" list-group-item" data-toggle="collapse" data-parent="#MainMenu"><i class="glyphicon glyphicon-hourglass"></i> <?php echo e(trans('main.Leads')); ?> </i></a>
            <div class="collapse" id="leads">
                <a href="<?php echo e(route('leads.index')); ?>" class="list-group-item childlist"><?php echo e(trans('main.All Leads')); ?> </a>
                 <?php if(Auth::check() && Auth::user()->canDo('lead.create')): ?>   
                <a href="<?php echo e(route('leads.create')); ?>" class="list-group-item childlist" ><?php echo e(trans('main.New Lead')); ?> </i></a>
                <?php endif; ?>
            </div>
            <a href="#departments" class=" list-group-item" data-toggle="collapse" data-parent="#MainMenu"><i class="fa fa-object-group"></i> <?php echo e(trans('main.Departments')); ?> </i></a>
            <div class="collapse" id="departments">
            <a href="<?php echo e(route('departments.index')); ?>" class="list-group-item childlist"><?php echo e(trans('main.All Departments')); ?> </a>
          <?php if(Auth::check() && Auth::user()->hasRole('administrator')): ?>  
            <a href="<?php echo e(route('departments.create')); ?>" class="list-group-item childlist" ><?php echo e(trans('main.New Department')); ?> </i></a>
            <?php endif; ?>
            </div>

<?php if(Auth::check() && Auth::user()->hasRole('administrator')): ?>
            <a href="#settings" class=" list-group-item" data-toggle="collapse" data-parent="#MainMenu"><i class="glyphicon glyphicon-cog"></i> <?php echo e(trans('main.Settings')); ?> </i></a>
            <div class="collapse" id="settings">
            <a href="<?php echo e(route('settings.index')); ?>" class="list-group-item childlist"><?php echo e(trans('main.Overall Settings')); ?> </a>
        
            <a href="<?php echo e(route('roles.index')); ?>" class="list-group-item childlist" ><?php echo e(trans('main.Role Managment')); ?> </i></a>
             <a href="<?php echo e(route('integrations.index')); ?>" class="list-group-item childlist" ><?php echo e(trans('main.Integrations')); ?></i></a>
            </div>


  <?php endif; ?>
    <a href="<?php echo e(url('/logout')); ?>" class=" list-group-item impmenu"  data-parent="#MainMenu"><i class="glyphicon glyphicon-log-out"></i> <?php echo e(trans('main.Sign out')); ?> </i></a>
            
            </div>






</nav>




        <!-- Page Content -->
        <div id="page-content-wrapper">


            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1><?php echo $__env->yieldContent('heading'); ?></h1>
                        <?php echo $__env->yieldContent('content'); ?>

                 
                </div>

            </div>
<?php if($errors->any()): ?>
    <div class="alert alert-danger">
        <?php foreach($errors->all() as $error): ?>
            <p><?php echo e($error); ?></p>
        <?php endforeach; ?>
    </div>

<?php endif; ?>
<?php if(Session::has('flash_message_warning')): ?>
        <div class="notification-warning navbar-fixed-bottom ">
        <div class="notification-icon ion-close-circled"></div>
        <div class="notification-text">
        <span><?php echo e(Session::get('flash_message_warning')); ?> </span></div>
        </div>
         <?php endif; ?>
            <?php if(Session::has('flash_message')): ?>
         <div class="notification-success navbar-fixed-bottom ">
        <div class="notification-icon ion-checkmark-round"></div>
        <div class="notification-text">
        <span><?php echo e(Session::get('flash_message')); ?> </span></div>
        </div>
        <?php endif; ?>
           
        </div>
        </div>
        
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Bootstrap Core JavaScript -->

    
  <script type="text/javascript" src="<?php echo e(URL::asset('js/dropzone.js')); ?>"></script> 
    <script type="text/javascript" src="<?php echo e(URL::asset('js/bootstrap.min.js')); ?>"></script> 
<!-- Bootstrap Core JavaScript -->
    <script src="<?php echo e(URL::asset('js/semantic.min.js')); ?>"></script>



      <script type="text/javascript" src="<?php echo e(URL::asset('js/custom.js')); ?>"></script>
          <script type="text/javascript" src="<?php echo e(URL::asset('js/sorttable.js')); ?>"></script>
           <script type="text/javascript" src="<?php echo e(URL::asset('js/jquery.dataTables.min.js')); ?>"></script>
           <script type="text/javascript" src="<?php echo e(URL::asset('js/jasny-bootstrap.min.js')); ?>"></script>
           
           <?php echo $__env->yieldPushContent('scripts'); ?>
</body>

</html>
  