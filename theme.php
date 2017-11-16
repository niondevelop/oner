<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title><?=wCMS::get('config','siteTitle')?> - <?=wCMS::page('title')?></title>
	<meta name="description" content="<?=wCMS::page('description')?>">
	<meta name="keywords" content="<?=wCMS::page('keywords')?>">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?=wCMS::asset('css/style.css')?>">
	<link rel="stylesheet" href="<?=wCMS::asset('css/additional.css')?>">
	<?=wCMS::css()?>

</head>
<body>
	<?=wCMS::alerts()?>
	<?=wCMS::settings()?>

<?php if( wCMS::$loggedIn ) : ?>
    <div class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-ex-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?=wCMS::url()?>"><span><?=wCMS::get('config','siteTitle')?></span></a>
        </div>
        <div class="collapse navbar-collapse" id="navbar-ex-collapse">
          <ul class="nav navbar-nav navbar-right">
		<?=wCMS::menu()?>
          </ul>
        </div>
      </div>
    </div>
<?php else : ?>
    <div class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-ex-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?=wCMS::url()?>"><span><?=wCMS::get('config','siteTitle')?></span></a>
        </div>
        <div class="collapse navbar-collapse" id="navbar-ex-collapse">
          <ul class="nav navbar-nav navbar-right">
		<?php foreach ( wCMS::db()->pages as $pageName => $page ): ?> <!-- loop though all pages -->
	
                      <li>
              <a href="#<?=$page->title; ?>"><?=$page->title; ?></a>
            </li>
<?php endforeach; ?>


          </ul>
        </div>
      </div>
    </div>
<?php endif; ?>



<?php if( wCMS::$loggedIn ) : ?>
<div class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">

				<?=wCMS::page('content')?>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <hr>
          </div>
        </div>
      </div>
    </div>

<?php else : ?>
<?php
	$class = "";
	if  ( wCMS::$loggedIn ) {
        $class = "editText editable";
	}
	?>
    <div class="cover">
      <div class="background-image-fixed cover-image" style="background-image: url('<?=wCMS::asset('img/header.jpeg')?>')"></div>
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <h1 class="text-inverse"><?=wCMS::get('config','siteTitle')?></h1>
            <p class="text-inverse"><?php echo wCMS::page('description'); ?></p>
            <br>
          </div>
        </div>
      </div>
    </div>
	<?php foreach ( wCMS::db()->pages as $pageName => $page ): ?> <!-- loop though all pages -->
    	<div class="container" id="<?=$page->title; ?>">
    		<div class="row">
    			<div class="col-md-12 padding40">
            <h1 class="text-primary text-center"><?=$page->title; ?></h1><hr class="style-two">
            <p class="text-muted"><?=$page->content; ?></p>
    				 </div>
        </div>
                	  <?php
                		for ($i=1; $i!=10; $i++) {
                		    $numberOfContent = "addition_content_".$i;
                		    $fetch = $page->$numberOfContent;
                	        $addition_content = $fetch;
            			    if (empty($addition_content)) {
            			        // do something if the additional content doesn't exist, maybe don't
                			} else { ?>
                    			<div class="col-md-12" data-target="pages" class="<?php print $class; ?>" id="<?php print $numberOfContent; ?>"><?=$fetch;?></div>
                		    <?php
                			}
                		}
                	?>
 <div class="row">
          <div class="col-md-12">
            <hr class="style-one">
          </div>
        </div>
      </div>
    </div>

	<?php endforeach; ?>
<?php endif; ?>


	 <footer class="section section-primary" style="background-image: url('<?=wCMS::asset('img/footer.jpeg')?>')">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="col-md-6">
              <p><?=wCMS::block('subside')?></p>
            </div>
            <div class="col-md-6"></div>
          </div>
        </div>
      </div>
    </footer>
    <footer class="section section-primary">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <p class="text-center"><?=wCMS::footer()?><br><button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">Login</button></p>
          </div>
        </div>
      </div>
    </footer>
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Login</h4>
      </div>
      <div class="modal-body">
<form action="http://develop.nion.ch/login" method="post"><div class="input-group"><input type="password" class="form-control" id="password" name="password"><span class="input-group-btn"><button type="submit" class="btn btn-info">Login</button></span></div></form>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>



    	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/todc-bootstrap/3.3.7-3.3.13/js/bootstrap.min.js"></script>
	<?=wCMS::js()?>

<?php if( wCMS::$loggedIn ) : ?>
 
<?php else : ?>
<script language="javascript" type="text/javascript">
$('a[href*="#"]:not([href="#"]):not([href="#show"]):not([href="#hide"])').click(function() {
		if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
			var target = $(this.hash);
			target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
			if (target.length) {
				$('html,body').animate({
					scrollTop: target.offset().top
				}, 1000);
				return false;
			}
		}
	});
</script> 
<?php endif; ?>


</body>
</html>
