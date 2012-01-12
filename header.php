<?php 
    $t = plugin_load( 'action', 'templatefnordhelper_templateaction' );
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $conf['lang']?>" lang="<?php echo $conf['lang']?>" dir="<?php echo $lang['direction']?>">
<head>
    <?php tpl_metaheaders();?>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <meta http-equiv="content-language" content="en"/>
    <title><?php tpl_pagetitle();?> [<?php echo hsc($conf['title']);?>]</title>
</head>
<body class='<?php echo $t->get_user( 'theme' ) ?>'>
<?php html_msgarea();?>
<div class="dokuwiki">

<div class="header">
    <div>
	<div class="user">
	    <?php tpl_userinfo();?>
	    <?php tpl_actionlink('subscription');?>
	    <?php tpl_actionlink('profile');?>
	    <?php tpl_actionlink('admin');?>
	    <?php tpl_actionlink('login');?>
	</div>

<div class='hlogo-wrapper'>
<a href='/'><nobr>
<div class='hlogo-l'>&nbsp;</div>
<div class='hlogo <?php $r = floor( substr( time() * 5 , -2  ) / 5 ); echo 'hlogo-rand-'.$r ?>'>&nbsp;</div>
<div class='hlogo-r'>&nbsp;</div>
</nobr></a>
<p class='r'><?php echo $r." - ".time( )?></p>
</div>

    </div>
    <div>
	<div class="search"><?php tpl_searchform();?></div>
	<div>
<!--
<div class='theme-switch'>
<?
$prefix = $_SERVER['REQUEST_URI'].( strpos( $_SERVER['REQUEST_URI'], '?' ) !== false ? '&' : '?' );
$themes = array( 'ccc-white', 'black-yellow', 'green-black', 'green-white' );
foreach( $themes as $th ) { echo "<a class='$th' href='".$prefix."utpl_theme=$th'>$th</a>"; }
?>
</div>
-->
	    <div class="title"><?php #min_links(tpl_getConf('header-line'));?></div>
	</div>
    </div>
</div>

<div class="wrapper">
