<?php
/* ----------------------------------------------------------------------
 * views/pageFormat/pageFooter.php :
 * ----------------------------------------------------------------------
 * CollectiveAccess
 * Open-source collections management software
 * ----------------------------------------------------------------------
 *
 * Software by Whirl-i-Gig (http://www.whirl-i-gig.com)
 * Copyright 2015 Whirl-i-Gig
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
?>

	</div><!-- end pageArea --></div><!-- end col --></div><!-- end row --></div><!-- end container -->



    <footer class="local-footer">
        <div class="footer-navbar">
            <div class="container">
                <div id="subnav" class="row">
										<nav class="noindex navigation col-sml-4"><h4><a href="https://www.arts.kuleuven.be/sinologie/english/cct" class="tile">Navigation</a></h4>
											<ul>
													<li <?php echo ($this->request->getController() == 'Acknowledgements') ? 'class="active"' : ''; ?>><?php echo caNavLink($this->request, _t('Acknowledgements'), '', '', 'Acknowledgements', 'Acknowledgements'); ?></li>

													<li <?php echo ($this->request->getController() == 'Authors') ? 'class="active"' : ''; ?>><?php echo caNavLink($this->request, _t('Authors'), '', '', 'Authors', 'Authors'); ?></li>												
													
													<li <?php echo ($this->request->getController() == 'Abbreviations') ? 'class="active"' : ''; ?>><?php echo caNavLink($this->request, _t('Abbreviations'), '', '', 'Abbreviations', 'Abbreviations'); ?></li>

													<li <?php echo ($this->request->getController() == 'Links') ? 'class="active"' : ''; ?>><?php echo caNavLink($this->request, _t('Links'), '', '', 'Links', 'Links'); ?></li>
        								</ul>
											</nav>

											<nav class="noindex static noborder col-sml-4"><h2><a href="https://www.arts.kuleuven.be/sinologie/english">Sinology Research Unit</a></h2>&#13;
												<ul>
													<li><a href="https://www.arts.kuleuven.be/sinologie/english/history">History</a></li>&#13;
													<li><a href="https://www.arts.kuleuven.be/sinologie/english/research">Research</a></li>&#13;
													<li><a href="https://www.arts.kuleuven.be/sinologie/english/staff">Staff</a></li>&#13;
													<li><a href="https://www.arts.kuleuven.be/sinologie/english/publications">Publications</a></li>&#13;
													<li><a href="https://www.arts.kuleuven.be/sinologie/english/library">Library</a></li>&#13;
													<li><a href="https://www.arts.kuleuven.be/sinologie/english/links">Links</a></li>&#13;
													<li><a href="https://www.arts.kuleuven.be/sinologie/contacteer-ons">Contact us</a></li>&#13;
													<li><a href="https://www.arts.kuleuven.be/sinologie">Nederlands</a></li>&#13;
												</ul>
											</nav>
											<nav class="noindex static col-sml-4">
												<h4>Faculty of Arts</h4>
									        <ul>
														<li><a href="http://www.arts.kuleuven.be/english">Faculty of Arts</a></li>
													</ul>
									    </nav>
									</div>

                	<div class="reactionfull">
									  <span>Comments on this page:</span>
									  <a class="reaction" href="https://www.arts.kuleuven.be"> Faculteit Letteren - KU Leuven</a>
									</div>
	            </div><!-- end container -->
	        </div><!-- end footer-navbar -->
    </footer><!-- end local-footer -->
  </div><!-- end main -->

  <a href="#top" class="scroll-to-top"><i class="material-icons">keyboard_arrow_up</i></a>



	<div style="clear:both; height:1px;"><!-- empty --></div>
	<!--<div id="footer">
		<!--<ul class="list-inline pull-right social">
			<li><i class="fa fa-twitter"></i></li>
			<li><i class="fa fa-facebook-square"></i></li>
			<li><i class="fa fa-youtube-play"></i></li>
		</ul>-->
		<!--<div style="text-align: center; text-justify: inter-word;">
			When quoting this database, refer to it as follows:
			Ad Dudink & Nicolas Standaert, Chinese Christian Texts Database (CCT-Database) (<a href="http://www.arts.kuleuven.be/sinology/cct" target="_blank">http://www.arts.kuleuven.be/sinology/cct</a>)
			<br>
			COPY © 2016 CCT
		</div>-->
		<!--<div><div><small>powered by <a href="http://www.collectiveaccess.org">CollectiveAccess 2015</a></small></div></div>-->
	<!--</div> end footer -->
<?php
//
// Output HTML for debug bar
//
if(Debug::isEnabled()) {
	print Debug::$bar->getJavascriptRenderer()->render();
}
?>

		<?php print TooltipManager::getLoadHTML(); ?>
		<div id="caMediaPanel">
			<div id="caMediaPanelContentArea">

			</div>
		</div>
		<script type="text/javascript">
			/*
				Set up the "caMediaPanel" panel that will be triggered by links in object detail
				Note that the actual <div>'s implementing the panel are located here in views/pageFormat/pageFooter.php
			*/
			var caMediaPanel;
			jQuery(document).ready(function() {
				if (caUI.initPanel) {
					caMediaPanel = caUI.initPanel({
						panelID: 'caMediaPanel',										/* DOM ID of the <div> enclosing the panel */
						panelContentID: 'caMediaPanelContentArea',		/* DOM ID of the content area <div> in the panel */
						exposeBackgroundColor: '#FFFFFF',						/* color (in hex notation) of background masking out page content; include the leading '#' in the color spec */
						exposeBackgroundOpacity: 0.7,							/* opacity of background color masking out page content; 1.0 is opaque */
						panelTransitionSpeed: 400, 									/* time it takes the panel to fade in/out in milliseconds */
						allowMobileSafariZooming: true,
						mobileSafariViewportTagID: '_msafari_viewport',
						closeButtonSelector: '.close'					/* anything with the CSS classname "close" will trigger the panel to close */
					});
				}
			});
			/*(function(e,d,b){var a=0;var f=null;var c={x:0,y:0};e("[data-toggle]").closest("li").on("mouseenter",function(g){if(f){f.removeClass("open")}d.clearTimeout(a);f=e(this);a=d.setTimeout(function(){f.addClass("open")},b)}).on("mousemove",function(g){if(Math.abs(c.x-g.ScreenX)>4||Math.abs(c.y-g.ScreenY)>4){c.x=g.ScreenX;c.y=g.ScreenY;return}if(f.hasClass("open")){return}d.clearTimeout(a);a=d.setTimeout(function(){f.addClass("open")},b)}).on("mouseleave",function(g){d.clearTimeout(a);f=e(this);a=d.setTimeout(function(){f.removeClass("open")},b)})})(jQuery,window,200);*/
		</script>

	</body>
</html>
