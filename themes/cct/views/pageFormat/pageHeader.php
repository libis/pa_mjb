<?php
/* ----------------------------------------------------------------------
 * views/pageFormat/pageHeader.php :
 * ----------------------------------------------------------------------
 * CollectiveAccess
 * Open-source collections management software
 * ----------------------------------------------------------------------
 *
 * Software by Whirl-i-Gig (http://www.whirl-i-gig.com)
 * Copyright 2014 Whirl-i-Gig
 *
 * For more information visit http://www.CollectiveAccess.org
 *
 * This program is free software; you may redistribute it and/or modify it under
 * the terms of the provided license as published by Whirl-i-Gig
 *
 * CollectiveAccess is distributed in the hope that it will be useful, but
 * WITHOUT ANY WARRANTIES whatsoever, including any implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * This source code is free and modifiable under the terms of
 * GNU General Public License. (http://www.gnu.org/copyleft/gpl.html). See
 * the "license.txt" file for details, or visit the CollectiveAccess web site at
 * http://www.CollectiveAccess.org
 *
 * ----------------------------------------------------------------------
 */
    $va_lightboxDisplayName = caGetLightboxDisplayName();
    $vs_lightbox_sectionHeading = ucfirst($va_lightboxDisplayName['section_heading']);
    $va_classroomDisplayName = caGetClassroomDisplayName();
    $vs_classroom_sectionHeading = ucfirst($va_classroomDisplayName['section_heading']);

    // Collect the user links: they are output twice, once for toggle menu and once for nav
    $va_user_links = array();
    if ($this->request->isLoggedIn()) {
        $va_user_links[] = '<li role="presentation" class="dropdown-header">'.trim($this->request->user->get('fname').' '.$this->request->user->get('lname')).', '.$this->request->user->get('email').'</li>';
        $va_user_links[] = '<li class="divider nav-divider"></li>';
        if (caDisplayLightbox($this->request)) {
            $va_user_links[] = '<li>'.caNavLink($this->request, $vs_lightbox_sectionHeading, '', '', 'Lightbox', 'Index', array()).'</li>';
        }
        if (caDisplayClassroom($this->request)) {
            $va_user_links[] = '<li>'.caNavLink($this->request, $vs_classroom_sectionHeading, '', '', 'Classroom', 'Index', array()).'</li>';
        }
        $va_user_links[] = '<li>'.caNavLink($this->request, _t('User Profile'), '', '', 'LoginReg', 'profileForm', array()).'</li>';
        $va_user_links[] = '<li>'.caNavLink($this->request, _t('Logout'), '', '', 'LoginReg', 'Logout', array()).'</li>';
    } else {
        if (!$this->request->config->get('dont_allow_registration_and_login') || $this->request->config->get('pawtucket_requires_login')) {
            $va_user_links[] = "<li><a href='#' onclick='caMediaPanel.showPanel(\"".caNavUrl($this->request, '', 'LoginReg', 'LoginForm', array())."\"); return false;' >"._t('Login').'</a></li>';
        }
        if (!$this->request->config->get('dont_allow_registration_and_login')) {
            $va_user_links[] = "<li><a href='#' onclick='caMediaPanel.showPanel(\"".caNavUrl($this->request, '', 'LoginReg', 'RegisterForm', array())."\"); return false;' >"._t('Register').'</a></li>';
        }
    }
    $vb_has_user_links = (sizeof($va_user_links) > 0);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0"/>
    <?php echo MetaTagManager::getHTML(); ?>
    <?php echo AssetLoadManager::getLoadHTML($this->request); ?>


		<link rel="stylesheet" type="text/css" media="all" href="https://stijl.kuleuven.be/2016/release/latest/css/wms.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title><?php echo (MetaTagManager::getWindowTitle()) ? MetaTagManager::getWindowTitle() : $this->request->config->get('app_display_name'); ?></title>

    <script type="text/javascript">
       jQuery(document).ready(function() {
          jQuery('#browse-menu').on('click mouseover mouseout mousemove mouseenter',function(e) { e.stopPropagation(); });
       });
    </script>
    <?php
    if (Debug::isEnabled()) {
        // Pull in JS and CSS for debug bar
        $o_debugbar_renderer = Debug::$bar->getJavascriptRenderer();
        $o_debugbar_renderer->setBaseUrl(__CA_URL_ROOT__.$o_debugbar_renderer->getBaseUrl());
        echo $o_debugbar_renderer->renderHead();
    }
    ?>
</head>
<body>
  <div class="l-page">
    <nav class="global-header noindex hidden-print">
      <div class="container">
        <a class="navbar-brand" href="http://www.kuleuven.be/"><img class="logo" src="https://stijl.kuleuven.be/2016/img/svg/logo.svg" height="56" width="157"></a>
      </div>
    </nav>

    <nav class="local-header">
        <div class="container container-relative">
            <h2>
              <?php
                 echo caNavLink($this->request, "Chinese Christian Texts Database", '', '', '', '');
              ?>
            </h2>
            <div class="nav-user2 pull-xs-right">
              <div class="controls collapse navbar-collapse" id="bs-main-navbar-collapse-1">
              <?php
                    if ($vb_has_user_links) {
                        ?>
                      <ul class="nav navbar-nav navbar-right" id="user-navbar">
                        <li class="dropdown" style="position:relative;">
                          <a href="#" class="dropdown-toggle icon" data-toggle="dropdown"><i class="material-icons" aria-hidden="true">person_outline</i></a>
                          <ul class="dropdown-menu"><?php echo implode("\n", $va_user_links); ?></ul>
                        </li>
                      </ul>
              <?php
                  }
              ?>
                <form class="form-search navbar-right" role="search" action="<?php echo caNavUrl($this->request, '', 'MultiSearch', 'Index'); ?>">
                    <input type="text" class="form-control" placeholder="Search the collection" name="search">
                    <button class="btn btn-primary" type="submit"><i class="material-icons">search</i>
                                </button>
                </form>

                <!--libis_start-->
                <!--Font increase decrease functionality-->
                <?php
                    $va_tmp = explode('/', str_replace('\\', '/', $_SERVER['SCRIPT_NAME']));
                    array_pop($va_tmp);
                    $vs_path = implode('/', $va_tmp);
                ?>

                <div class="font-size-button navbar-right">
                  <span id="plustext" onclick="resizeText(1)" alt="Increase text size"><span class="small">A</span>A</span>
                  <span id="minustext" onclick="resizeText(-1)" alt="Decrease text size">A<span class="small">A</span></span>
                  <!--<img id="plustext" alt="Increase text size" src="<?php echo $vs_path ?>/themes/cct/assets/pawtucket/graphics/font_increase.png"  />
                  <img id="minustext" alt="Decrease text size" src="<?php echo $vs_path ?>/themes/cct/assets/pawtucket/graphics/font_decrease.png" onclick="resizeText(-1)" />-->
                </div>
                <!--libis_end-->

              </div><!-- /.navbar-collapse -->
            </div>
            <a href="#" class="btn-toggle hidden-lg-up" role="button" aria-expanded="false" data-toggle="collapse" data-target="#local-header" aria-controls="local-header">Menu <span class="lines"></span></a>

            <nav class="nav-tabs nav-more collapse pull-lg-left" id="local-header">
                <ul>
									<li <?php echo ($this->request->getController() == 'About') ? 'class="active"' : ''; ?>><?php echo caNavLink($this->request, _t('About'), '', '', 'About', 'Index'); ?></li>
									<li <?php echo (($this->request->getController() == 'Search') && ($this->request->getAction() == 'advanced')) ? 'class="active"' : ''; ?>><?php echo caNavLink($this->request, _t('Basic Search'), '', '', 'Search', 'advanced/ccts'); ?></li>
									<li <?php echo (($this->request->getController() == 'Search') && ($this->request->getAction() == 'advanced')) ? 'class="active"' : ''; ?>><?php echo caNavLink($this->request, _t('Advanced Search'), '', '', 'Search', 'advanced/objects'); ?></li>
									<?php echo $this->render('pageFormat/browseMenu.php'); ?>
									<li <?php echo ($this->request->getController() == 'Contact') ? 'class="active"' : ''; ?>><?php echo caNavLink($this->request, _t('Contact'), '', '', 'Contact', 'Form'); ?></li>
									<li <?php echo ($this->request->getController() == 'Categories') ? 'class="active"' : ''; ?>><?php echo caNavLink($this->request, _t('Categories'), '', '', 'Categories', 'Categories'); ?></li>
								</ul>
					  </nav>


        </div>
    </nav>
	<div role="main">
	<div class="container"><div class="row"><div class="col-xs-12">
		<div id="pageArea" <?php echo caGetPageCSSClasses(); ?>>

	<!--libis_start-->
	<!--javascript for font increase decrease-->
	<script type="text/javascript">
		function resizeText(multiplier) {
			if (document.body.style.fontSize == "") {
				document.body.style.fontSize = "1.0em";
			}
			document.body.style.fontSize = parseFloat(document.body.style.fontSize) + (multiplier * 0.2) + "em";
		}
	</script>
	<!--libis_end-->
