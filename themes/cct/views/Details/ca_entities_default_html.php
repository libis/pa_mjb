<?php
	$t_item = $this->getVar("item");
	$va_comments = $this->getVar("comments");
	$vn_comments_enabled = 	$this->getVar("commentsEnabled");
	$vn_share_enabled = 	$this->getVar("shareEnabled");
?>
<div class="row">
	<div class='col-xs-12 navTop'><!--- only shown at small screen size -->
		{{{previousLink}}}{{{resultsLink}}}{{{nextLink}}}
	</div><!-- end detailTop -->
	<div class='navLeftRight col-xs-1 col-sm-1 col-md-1 col-lg-1'>
		<div class="detailNavBgLeft">
			{{{previousLink}}}{{{resultsLink}}}
		</div><!-- end detailNavBgLeft -->
	</div><!-- end col -->
	<div class='col-xs-12 col-sm-10 col-md-10 col-lg-10'>
		<div class="container">
			<div class="row">
				<div class='col-md-12 col-lg-12 detail-metadata'>
                    <H3>{{{^ca_entities.preferred_labels.displayname
                        <ifdef code="ca_entities.preferred_labels.suffix">[^ca_entities.preferred_labels.suffix]</ifdef>
                        ^ca_entities.preferred_labels.prefix
                        }}}
                    </H3>

                    <div class="detail_field">
											{{{<ifdef code="ca_entities.nonpreferred_labels.displayname">
												<H6>Alternative Name: </H6>
											</ifdef>}}}
											<p>
	                    	{{{<unit relativeTo="ca_entities" delimiter="<br>">
	                        <ifdef code="ca_entities.nonpreferred_labels.displayname">^ca_entities.nonpreferred_labels.displayname</ifdef>
	                        <ifdef code="ca_entities.nonpreferred_labels.suffix">[^ca_entities.nonpreferred_labels.suffix]</ifdef>
	                        ^ca_entities.nonpreferred_labels.prefix
	                    </unit>}}}
											</p>
										</div>
										<div class="detail_field">
                    {{{<ifdef code="ca_entities.marc700d"><H6>Birth and Death Date: </H6></ifdef>}}}
                    <p>{{{<unit relativeTo="ca_entities" delimiter="<br>">^ca_entities.marc700d</unit>}}}</p>
										</div>
				</div><!-- end col -->
			</div><!-- end row -->
			<div class="row">
				<div class='col-md-12 col-lg-12 detail-metadata'>
					<div class="detail_field">
						{{{<ifcount code="ca_objects" min="1">
							<H6>Related sources: </H6>
              <p>
								<unit relativeTo="ca_objects" delimiter="<br>">
                  <l>^ca_objects.preferred_labels.name</l>
                  <ifdef code="ca_objects.nonpreferred_labels">(^ca_objects.nonpreferred_labels%delimiter=_-_ )</ifdef>
                </unit>
            </ifcount>}}}
					</div>
<?php
				# Comment and Share Tools
				if ($vn_comments_enabled | $vn_share_enabled) {

					print '<div id="detailTools">';
					if ($vn_comments_enabled) {
?>
						<div class="detailTool"><a href='#' onclick='jQuery("#detailComments").slideToggle(); return false;'><span class="glyphicon glyphicon-comment"></span>Comments (<?php print sizeof($va_comments); ?>)</a></div><!-- end detailTool -->
						<div id='detailComments'><?php print $this->getVar("itemComments");?></div><!-- end itemComments -->
<?php
					}
					if ($vn_share_enabled) {
						print '<div class="detailTool"><span class="glyphicon glyphicon-share-alt"></span>'.$this->getVar("shareLink").'</div><!-- end detailTool -->';
					}
					print '</div><!-- end detailTools -->';
				}
?>

				</div><!-- end col -->
				<div class='col-md-6 col-lg-6'>
				</div><!-- end col -->
			</div><!-- end row -->
		</div><!-- end container -->
	</div><!-- end col -->
	<div class='navLeftRight col-xs-1 col-sm-1 col-md-1 col-lg-1'>
		<div class="detailNavBgRight">
			{{{nextLink}}}
		</div><!-- end detailNavBgLeft -->
	</div><!-- end col -->
</div><!-- end row -->
