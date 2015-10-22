
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?php echo base_url()?>favicon.ico">

    <title>1bid</title>

    <!-- end: Meta -->
    <script src="<?php echo base_url()?>assets/js/jquery-1.11.1.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="<?php echo base_url()?>assets/js/bootstrapv3.2.0.js"></script>
    <script src="<?php echo base_url()?>assets/datatables/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/alertify/js/alertify.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/raphael-min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/morris.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/moment.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/holder.js"></script>
  
    <!-- Custom -->
    <script src="<?php echo base_url(); ?>assets/js/onebid.js"></script>
  
    <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/datatables/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/frontpage.css" >
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/js/alertify/css/alertify.core.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/js/alertify/css/alertify.default.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/font-awesome.min.css" />

    <style>
    </style>
</head>

<body>

<div class="header clearfix">
    <div class="container" style="padding-top:5px;padding-bottom:5px;">
        <a href="<?php echo base_url()?>"><img class="img-responsive pull-left" style="height:30px;margin-top:5px;" src="<?php echo base_url()?>assets/images/logo/1bid_logo.png"/></a>
        <nav class="pull-right" >
             <ul class="nav nav-pills pull-right">
                 <?php if($this->session->userdata['user_account']['user_id'] == ""): ?>
                     <li><a class="signin" href="<?php echo base_url()?>signin"><?php echo $this->lang->line('sign_in');?></a></li>
                     <li class="active"><a href="<?php echo base_url()?>signup" class="signup" style="border-radius: 25px;"><?php echo $this->lang->line('sign_up_now');?></a></li>
                 <?php else:?>
                     <li><a class="email"><?php echo $this->session->userdata['user_account']['user_email'] ?></a></li>
                     <li class="active"><a class="signin"  href="<?php echo base_url()?>signout" style="border-radius: 25px;padding:5px 20px;margin-top:5px;"><?php echo $this->lang->line('log_out');?></a></li>

                 <?php endif?>

                <!--Hide Language Selection-->
                <li style="margin-top:7px;margin-left:15px; display: none;">
                  <select id="language" onchange="changeLanguage()">
                       <?php if($this->session->userdata['setting']['language'] == "chinese"):?>
                           <option value="english">English</option>
                           <option value="chinese" selected>Chinese</option>
                           <option value="malay">Malay</option>
                       <?php elseif($this->session->userdata['setting']['language'] == "malay"):?>
                           <option value="english">English</option>
                           <option value="chinese">Chinese</option>
                           <option value="malay" selected>Malay</option>
                       <?php else:?>
                           <option value="english" selected>English</option>
                           <option value="chinese">Chinese</option>
                           <option value="malay">Malay</option>
                       <?php endif?>
                  </select>
                </li>
                <!--End - Hide Language Selection-->

             </ul>
        </nav>
    </div>
</div>
<?php if($this->session->userdata['user_account']['user_id'] != ""): ?>

    <!-- Docs master nav -->
    <header class="navbar navbar-static-top bs-docs-nav" id="top" role="banner">
        <div class="navSecondaryContainer">
        <div class="container">
            <div class="navbar-header">
                <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#bs-navbar" aria-controls="bs-navbar" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="fa fa-reorder"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <nav id="bs-navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav navSecondary">
                    <li><a class="<?php if(isset($navMyAccount)){echo $navMyAccount;} ?>" href="<?php echo base_url() .'myaccount' ?>"><?php echo $this->lang->line('my_account');?></a></li>
                    <li><a class="<?php if(isset($navMyBids)){echo $navMyBids;} ?>" href="<?php echo base_url() .'mybids' ?>"><?php echo $this->lang->line('my_bids');?></a></li>
                    <li><a class="<?php if(isset($navMyPurchases)){echo $navMyPurchases;}?>" href="<?php echo base_url() .'mypurchases' ?>"><?php echo $this->lang->line('my_purchases_and_status');?></a></li>
                    <li><a class="<?php if(isset($navLuckyDraw)){echo $navLuckyDraw;} ?>" href="<?php echo base_url() .'myaccount/luckydraw' ?>"><?php echo $this->lang->line('lucky_draw');?></a></li>
                    <li><a class="<?php if(isset($navHowItWorks)){echo $navHowItWorks;} ?>" href="<?php echo base_url() .'howitworks' ?>"><?php echo $this->lang->line('how_it_works');?></a></li>
                    <li><a class="<?php if(isset($navClosedAuction)){echo $navClosedAuction;} ?>" href="<?php echo base_url() .'closedauction' ?>"><?php echo $this->lang->line('closed_auction');?></a></li>

                </ul>
                <ul class="nav navbar-nav navbar-right navSecondary">
                    <li><a href="<?php echo base_url()?>upcoming" class="<?php if(isset($navUpcoming)){echo $navUpcoming;} ?>"><?php echo $this->lang->line('upcoming');?></a></li>
                    <li><a href="<?php echo base_url()?>" class="<?php if(isset($navToday)){echo $navToday;}?>"><?php echo $this->lang->line('today');?></a></li>

                </ul>
            </nav>
        </div>
            </div>
    </header>



<?php endif?>
<div style="clear:both"></div>
<div>
<?php echo $output ?>
</div>
<div style="clear:both"></div>
<footer class="footer" style="margin-top:0;">
    <div class="container">
        <div class="row">
            <div class="col-lg-1 col-sm-1">
                <img class="img-responsive pull-left" src="<?php echo base_url()?>assets/images/logo/1bid_logo.png"/>
            </div>
            <div class="col-lg-3 col-sm-3">
                <ul>
                    <li><a href="<?php echo base_url() .'myaccount' ?>"><?php echo $this->lang->line('my_account');?></a></li>
                    <li><a href="<?php echo base_url() .'mybids' ?>"><?php echo $this->lang->line('my_bids');?></a></li>
                    <li><a href="<?php echo base_url() .'mypurchases' ?>"><?php echo $this->lang->line('my_purchases_and_status');?></a></li>
                </ul>
            </div>
            <div class="col-lg-2 col-sm-2">
                <ul>
                    <li><a href="<?php echo base_url() .'luckydraw' ?>"><?php echo $this->lang->line('lucky_draw');?></a></li>
                    <li><a href="<?php echo base_url() .'howitworks' ?>"><?php echo $this->lang->line('how_it_works');?></a></li>
                    <li><a href="<?php echo base_url() .'closedauction' ?>"><?php echo $this->lang->line('closed_auction');?></a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-sm-3">
                <ul>
                  <li><a href="<?php echo base_url() .'pages/privacypolicy' ?>"><?php echo $this->lang->line('privacy_policy');?></a></li>
                  <li><a href="<?php echo base_url() .'pages/terms' ?>"><?php echo $this->lang->line('terms_and_condition');?></a></li>
                    <li><a href="<?php echo base_url() .'pages/faq' ?>"><?php echo $this->lang->line('faq');?></a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-sm-3">
                <ul class="nav nav-pills pull-right" style="margin-top:0;">
                    <?php if($this->session->userdata['user_account']['user_id'] == ""): ?>
                    <li><a class="signin" href="<?php echo base_url()?>signin"><?php echo $this->lang->line('sign_in');?></a></li>
                    <li class="active"><a href="<?php echo base_url()?>signup" class="signup" style="border-radius: 25px;"><?php echo $this->lang->line('sign_up_now');?></a></li>
                    <?php endif?>
                </ul>
            </div>

        </div>

        <div class="row">
            <div class="col-lg-12 col-sm-12" style="text-align: center;">
                <?php if($this->session->userdata['user_account']['user_id'] == ""): ?>
                <img src="<?php echo base_url() .'assets/images/footer_separator.png'?>"/>
                <?php endif?>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-sm-12 footerAffiliate" style="text-align: center;">
                <img src="<?php echo base_url() .'assets/images/logo/magiclab_logo.png'?>"/>
                <img src="<?php echo base_url() .'assets/images/logo/kl_city.png'?>"/>
                <img src="<?php echo base_url() .'assets/images/logo/1deal_logo.png'?>"/>
                <img src="<?php echo base_url() .'assets/images/logo/1sale_logo.png'?>"/>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-sm-12" style="text-align: center;">
                <img src="<?php echo base_url() .'assets/images/footer_separator.png'?>"/>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-sm-12" style="text-align: center;">
                <p>&copy;2015 - MagicLabs (M) Sdn. Bhd.</p>
            </div>
        </div>
    </div>
</footer>


<!-- Modal -->
<div class="modal fade" id="notificationModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="notificationModalTitle"><?php echo $this->lang->line('notification');?></h4>
            </div>
            <div class="modal-body">
                <div id="notificationModalBody"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<input type="hidden" id="baseUrl" name="baseUrl" value="<?php echo base_url()?>"/>
<script>
    var global =
    {
      base_url:$("#baseUrl").val()
    }
    function changeLanguage()
    {
      var language = $("#language").val();
      $.ajax({
        type: 'GET',
        url: global.base_url + 'redirect/change_language/' + language,
        data: {
        },
        success: function (response) {
            location.reload();
        },
        error: function (err) {
          console.log(err);
          $("#notificationModalBody").html('<div class="alert alert-danger">Unable to connect to server. Please try again later</div>');
          $("#notificationModal").modal('show');
        }
      });
    }
    function showNotificationModal(typeClass,message)
    {
        $("#notificationModalBody").html('<div class="alert ' + typeClass + '">' + message + '</div>');
        $("#notificationModal").modal('show');
    }
</script>

<?php
foreach($js as $file){
    echo "\n\t\t"; ?><script src="<?php echo $file; ?>"></script>
<?php } echo "\n\t";
?>

</body>
</html>