<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
  <meta name="apple-mobile-web-app-capable" content="yes" />
	<!--<meta http-equiv="content-type" content="text/html; charset=utf-8" />-->
	<base href="<?php echo base_url();?>" />
	<title><?php echo $this->config->item('company').' -- '.$this->lang->line('common_powered_by').' OS Point Of Sale' ?></title>


  <script type='text/javascript' src='//code.jquery.com/jquery-1.9.1.js'></script>
  
  
  
  
  <link rel="stylesheet" type="text/css" href="/css/result-light.css">
  
    
      <script type='text/javascript' src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    
  
  <style type='text/css'>
    
  </style>

	<link rel="stylesheet" type="text/css" href="css/ospos.css"/>
	<link rel="stylesheet" type="text/css" href="css/ospos_print.css" media="print" />
	<?php if ($this->input->cookie('debug') == "true" || $this->input->get("debug") == "true") : ?>
	<!-- start js template tags -->
	<script type="text/javascript" src="js/jquery-1.8.3.js" language="javascript"></script>
	<script type="text/javascript" src="js/jquery.ajax_queue.js" language="javascript"></script>
	<script type="text/javascript" src="js/jquery.autocomplete.js" language="javascript"></script>
	<script type="text/javascript" src="js/jquery.bgiframe.min.js" language="javascript"></script>
	<script type="text/javascript" src="js/jquery.color.js" language="javascript"></script>
	<script type="text/javascript" src="js/jquery.form-3.51.js" language="javascript"></script>
	<script type="text/javascript" src="js/jquery.jkey-1.1.js" language="javascript"></script>
	<script type="text/javascript" src="js/jquery.metadata.js" language="javascript"></script>
	<script type="text/javascript" src="js/jquery.tablesorter.min.js" language="javascript"></script>
	<script type="text/javascript" src="js/jquery.validate-1.13.1-min.js" language="javascript"></script>
	<script type="text/javascript" src="js/common.js" language="javascript"></script>
	<script type="text/javascript" src="js/date.js" language="javascript"></script>
	<script type="text/javascript" src="js/datepicker.js" language="javascript"></script>
	<script type="text/javascript" src="js/imgpreview.full.jquery.js" language="javascript"></script>
	<script type="text/javascript" src="js/manage_tables.js" language="javascript"></script>
	<script type="text/javascript" src="js/nominatim.autocomplete.js" language="javascript"></script>
	<script type="text/javascript" src="js/swfobject.js" language="javascript"></script>
	<script type="text/javascript" src="js/tabcontent.js" language="javascript"></script>
	<script type="text/javascript" src="js/thickbox.js" language="javascript"></script>
	<!-- end js template tags -->
    <?php else : ?>
    <!-- start minjs template tags -->
    <script type="text/javascript" src="dist/opensourcepos.min.js" language="javascript"></script>
    <!-- end minjs template tags -->       
    <?php endif; ?>
	<script type="text/javascript">
		function logout(logout)
		{
			logout = logout && <?php echo $backup_allowed;?>;
			if (logout && confirm("<?php echo $this->lang->line('config_logout'); ?>"))
			{
				window.location = "<?php echo site_url('config/backup_db'); ?>";
			}
			else
			{
				window.location = "<?php echo site_url('home/logout'); ?>";
			}
		}
	</script>	
<style type="text/css">
html {
    overflow: auto;
}
</style>

<script type='text/javascript'>//<![CDATA[ 
$(window).load(function(){
var themes = {
    "default": "//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css",
    "amelia" : "//bootswatch.com/amelia/bootstrap.min.css",
    "cerulean" : "//bootswatch.com/cerulean/bootstrap.min.css",
    "cosmo" : "//bootswatch.com/cosmo/bootstrap.min.css",
    "cyborg" : "//bootswatch.com/cyborg/bootstrap.min.css",
    "flatly" : "//bootswatch.com/flatly/bootstrap.min.css",
    "journal" : "//bootswatch.com/journal/bootstrap.min.css",
    "readable" : "//bootswatch.com/readable/bootstrap.min.css",
    "simplex" : "//bootswatch.com/simplex/bootstrap.min.css",
    "slate" : "//bootswatch.com/slate/bootstrap.min.css",
    "spacelab" : "//bootswatch.com/spacelab/bootstrap.min.css",
    "united" : "//bootswatch.com/united/bootstrap.min.css"
}
$(function(){
   var themesheet = $('<link href="'+themes['united']+'" rel="stylesheet" />');
    themesheet.appendTo('head');
    $('.theme-link').click(function(){
       var themeurl = themes[$(this).attr('data-theme')]; 
        themesheet.attr('href',themeurl);
    });
});
});//]]>  

</script>

</head>
<body>
<!--
<div id="menubar">
	<div id="menubar_container">
		<div id="menubar_company_info">
		<span id="company_title"><?php echo $this->config->item('company'); ?></span><br />
		<span style='font-size:8pt;'><?php echo $this->lang->line('common_powered_by').' STAR Point Of Sale'; ?></span>
	</div>

		<div id="menubar_navigation">
			<?php
			foreach($allowed_modules->result() as $module)
			{
			?>
			<div class="menu_item">
				<a href="<?php echo site_url("$module->module_id");?>">
				<img src="<?php echo base_url().'images/menubar/'.$module->module_id.'.png';?>" border="0" alt="Menubar Image"></a><br>
				<a href="<?php echo site_url("$module->module_id");?>"><?php echo $this->lang->line("module_".$module->module_id) ?></a>
			</div>
			<?php
			}
			?>
		</div>
		
		<div id="menubar_footer">
		    <?php echo $this->lang->line('common_welcome')." $user_info->first_name $user_info->last_name! | "; ?>
		    <a href="javascript:logout(true);"><?php echo $this->lang->line("common_logout"); ?></a> 
		</div>
		
		<div id="menubar_date">
		    <?php echo date('F d, Y h:i a') ?>
		</div>

	</div>
</div>

-->
 <!-- Fixed navbar -->
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">StarPOS</a>
        </div>
        <div class="navbar-collapse collapse">
        	<ul class="nav navbar-nav">
        	<?php
			foreach($allowed_modules->result() as $module)
			{
			?>				
			<li><a href="<?php echo site_url("$module->module_id");?>"><?php echo $this->lang->line("module_".$module->module_id) ?></a>
			</li>
			<?php
			}
			?>
        	<!--
              <li><a href="#">Customers</a></li>
              <li><a href="#about">About</a></li>
              <li><a href="#contact">Contact</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li class="divider"></li>
                  <li class="dropdown-header">Nav header</li>
                  <li><a href="#">Separated link</a></li>
                  <li><a href="#">One more separated link</a></li>
                </ul>
              </li>
              -->
           </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Themes <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#" data-theme="default" class="theme-link">Default</a></li>
                <li><a href="#" data-theme="amelia" class="theme-link">Amelia</a></li>
                <li><a href="#" data-theme="cerulean" class="theme-link">Cerulean</a></li>
                <li><a href="#" data-theme="cosmo" class="theme-link">Cosmo</a></li>
                <li><a href="#" data-theme="cyborg" class="theme-link">Cyborg</a></li>
                <li><a href="#" data-theme="flatly" class="theme-link">Flatly</a></li>
                <li><a href="#" data-theme="journal" class="theme-link">Journal</a></li>
                <li><a href="#" data-theme="readable" class="theme-link">Readable</a></li>
                <li><a href="#" data-theme="simplex" class="theme-link">Simplex</a></li>
                 <li><a href="#" data-theme="slate" class="theme-link">Slate</a></li>
                  <li><a href="#" data-theme="spacelab" class="theme-link">Spacelab</a></li>
                  <li><a href="#" data-theme="united" class="theme-link">United</a></li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
 </br></br>
<div id="content_area_wrapper">
<div id="content_area">