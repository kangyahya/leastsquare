<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php 
foreach($css_files as $file): ?>
	<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>
</head>
<body>
	<div class="wrap">
		<div class="page-header">
			<div class="leftside-header">
				<div class="logo">

				</div>
				<div id="menu-toggle" class="visible-xs toggle-left-sidebar" data-toggle-class="left-sidebar-open" data-target="html">
					<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
				</div>
			</div>
		</div>
		<div class="page-body">
			<div class="left-sidebar">
				<!-- left sidebar HEADER -->
				<div class="left-sidebar-header">
					<div class="left-sidebar-title">Navigation</div>
					<div class="left-sidebar-toggle c-hamburger c-hamburger--htla hidden-xs" data-toggle-class="left-sidebar-collapsed" data-target="html">
						<span></span>
					</div>
				</div>
				<div id="left-nav" class="nano">
					<div class="nano-content">
						<nav>
							<ul class="nav" id="main-nav">
								<li><a href='<?php echo site_url('welcome/welcome')?>'>Customers</a></li>
							</ul>
						</nav>
					</div>
				</div>
			</div>
			<?php echo $output; ?>
		</div>
	</div>
    <?php foreach($js_files as $file): ?>
        <script src="<?php echo $file; ?>"></script>
    <?php endforeach; ?>
</body>
</html>
