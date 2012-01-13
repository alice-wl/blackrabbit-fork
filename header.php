<?php 
    $t = plugin_load( 'action', 'templatefnordhelper_templateaction' );

if( !function_exists( 'tpl_youarehere_lv' )) {
// you are here less verbose 
function tpl_youarehere_lv($sep=' &raquo; '){/*{{{*/
  global $conf;
  global $ID;
  global $lang;

  // check if enabled
  #if(!$conf['youarehere']) return false;

  $parts = explode(':', $ID);
  $count = count($parts);

  #echo '<span class="bchead">'.$lang['youarehere'].'</span>&nbsp;';
  echo '<span class="bchead">&nbsp;</span>&nbsp;';
  if( $count > 1 ) {                                                                                                                                  
     
     // always print the startpage
      $title = useHeading('navigation') ? p_get_first_heading($conf['start']) : $conf['start'];
      if(!$title) $title = $conf['start'];
      #tpl_link(wl($conf['start']),hsc($title),'title="'.$conf['start'].'"');

      // print intermediate namespace links
      $part = '';
      for($i=0; $i<$count - 1; $i++){
        $part .= $parts[$i].':';
        $page = $part;
        resolve_pageid('',$page,$exists);
        if ($page == $conf['start']) continue; // Skip startpage

        // output
        echo "<div><nobr>";
        echo $sep;
        if($exists){
          #$title = useHeading('navigation') ? p_get_first_heading($page) : $parts[$i];
          $title = $parts[$i];
          tpl_link(wl($page),hsc($title),'title="'.$page.'"');
        }else{
          tpl_link(wl($page),$parts[$i],'title="'.$page.'" class="wikilink2" rel="nofollow"');
        }
        echo "</nobr></div>";

      }
      // print current page, skipping start page, skipping for namespace index
      if(isset($page) && $page==$part.$parts[$i]) return;
      $page = $part.$parts[$i];
      if($page == $conf['start']) return;
      echo "<div class='active'><nobr>";
      echo $sep;                                              
      if(page_exists($page)){
        #$title = useHeading('navigation') ? p_get_first_heading($page) : $parts[$i];
        $title = $parts[$i];
        tpl_link(wl($page),hsc($title),'title="'.$page.'"');
      }else{
        tpl_link(wl($page),$parts[$i],'title="'.$page.'" class="wikilink2" rel="nofollow"');
      }
      echo "</nobr></div>";
  }

  return true;
}/*}}}*/
}
if( !function_exists( 'tpl_sidebar_lv' )) {
// you are here less verbose 
function tpl_sidebar_lv( ){/*{{{*/
  echo '';
}/*}}}*/
}

if( !function_exists( 'tpl_footer_lv' )) {
// you are here less verbose 
function tpl_footer_lv( ){/*{{{*/
  echo '<div class="actions">';
  tpl_button('edit');
  tpl_button('history');
  #tpl_button('media');
  tpl_button('backlink');
  tpl_button('recent');
  tpl_button('index');
  echo '</div>';
}/*}}}*/
}
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
