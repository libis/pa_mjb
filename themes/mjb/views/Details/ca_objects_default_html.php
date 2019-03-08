<?php
/* ----------------------------------------------------------------------
 * themes/default/views/bundles/ca_objects_default_html.php : 
 * ----------------------------------------------------------------------
 * CollectiveAccess
 * Open-source collections management software
 * ----------------------------------------------------------------------
 *
 * Software by Whirl-i-Gig (http://www.whirl-i-gig.com)
 * Copyright 2013-2015 Whirl-i-Gig
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
 
	$t_object = 			$this->getVar("item");
	$va_comments = 			$this->getVar("comments");
	$vn_comments_enabled = 	$this->getVar("commentsEnabled");
	$vn_share_enabled = 	$this->getVar("shareEnabled");
    $va_browse_info = $this->getVar("browseInfo");

    $obj_type = $t_object->getTypeCode(); //objetMusee,biblio,photo

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
		<div class="container"><div class="row">
			<div class='col-sm-6 col-md-6 col-lg-5 col-lg-offset-1'>
				{{{representationViewer}}}
				

				<div id="detailAnnotations"></div>
				
				<?php print caObjectRepresentationThumbnails($this->request, $this->getVar("representation_id"), $t_object, array("returnAs" => "bsCols", "linkTo" => "carousel", "bsColClasses" => "smallpadding col-sm-3 col-md-3 col-xs-4")); ?>
				
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
			<?php if($obj_type === "objetMusee") { ?>
			<div class='col-sm-6 col-md-6 col-lg-5'>
				<H4>{{{<unit relativeTo="ca_collections" delimiter="<br/>"><l>^ca_collections.preferred_labels.name</l></unit><ifcount min="1" code="ca_collections"> ➔ </ifcount>}}}{{{ca_objects.preferred_labels.name}}}</H4>
				<H6>{{{<unit>^ca_objects.type_id</unit>}}}</H6>
				<HR>

				{{{<ifdef code="ca_objects.idno"><H6>N° Inventaire:</H6>^ca_objects.idno<br/></ifdef>}}}

                {{{<ifcount code="ca_objects.denominationControleeMusee" min="1"><H6>Dénomination contrôlée</H6></ifcount>}}}
                {{{<unit relativeTo="ca_objects.denominationControleeMusee" delimiter="<br/>">^ca_objects.denominationControleeMusee</unit>}}}

                {{{<ifdef code="ca_objects.designationObjet" min="1"><H6>Désignation de l'objet</H6></ifdef>}}}
                {{{<unit relativeTo="ca_objects.designationObjet" delimiter="<br/>">^ca_objects.designationObjet</unit>}}}

                {{{<ifdef code="ca_objects.auteur" min="1"><H6>Auteur</H6></ifdef>}}}
                {{{<unit relativeTo="ca_objects" delimiter="<br/>">
                    <b>^ca_objects.auteur.auteurNom</b> <ifdef code="ca_objects.auteur.fonction">(^ca_objects.auteur.fonction)</ifdef>
                </unit>}}}

                {{{<ifdef code="ca_objects.date" min="1"><H6>Date de production</H6></ifdef>}}}
                {{{<unit relativeTo="ca_objects" delimiter="<br/>">
                     <ifdef code="ca_objects.date.dateDebut">^ca_objects.date.dateDebut</ifdef>
                     <ifdef code="ca_objects.date.datefin">- ^ca_objects.date.datefin</ifdef>
                </unit>}}}

                {{{<ifdef code="ca_objects.datationPeriode" min="1"><H6>Datation période</H6></ifdef>}}}
                {{{<unit relativeTo="ca_objects.datationPeriode" delimiter="<br/>">^ca_objects.datationPeriode</unit>}}}				
				
                {{{<ifdef code="ca_objects.provenanceGeographique" min="1"><H6>Provenance géographique</H6></ifdef>}}}
                {{{<unit relativeTo="ca_objects.provenanceGeographique" delimiter="<br/>">^ca_objects.provenanceGeographique</unit>}}}

                {{{<ifdef code="ca_objects.dimensions" min="1"><H6>Dimensions</H6></ifdef>}}}
                {{{<unit relativeTo="ca_objects" delimiter="<br/>">
                     <ifdef code="ca_objects.dimensions.dimensions_hauteur">Hauteur:^ca_objects.dimensions.dimensions_hauteur;</ifdef>
                     <ifdef code="ca_objects.dimensions.dimensions_largeur"> Largeur:^ca_objects.dimensions.dimensions_largeur;</ifdef>
                     <ifdef code="ca_objects.dimensions.dimensions_epaisseur"> Epaisseur:^ca_objects.dimensions.dimensions_epaisseur;</ifdef>
                     <ifdef code="ca_objects.dimensions.dimensions_diametre"> Diametre:^ca_objects.dimensions.dimensions_diametre</ifdef>
                     <ifdef code="ca_objects.dimensions.dimensionsPartie">(^ca_objects.dimensions.dimensionsPartie)</ifdef>
                     <ifdef code="ca_objects.dimensions.dimensionRemarque">(^ca_objects.dimensions.dimensionRemarque)</ifdef>
                </unit>}}}

                {{{<ifdef code="ca_objects.materiaux" min="1"><H6>Matériaux</H6></ifdef>}}}
                {{{<unit relativeTo="ca_objects.materiaux" delimiter="; ">^ca_objects.materiaux</unit>}}}
				
                {{{<ifdef code="ca_objects.techniques" min="1"><H6>Techniques</H6></ifdef>}}}
                {{{<unit relativeTo="ca_objects.techniques" delimiter="; ">^ca_objects.techniques</unit>}}}

				<hr></hr>
			</div><!-- end col -->
                <?php } ?>
                <?php if($obj_type === "biblio") { ?>
                <div class='col-sm-6 col-md-6 col-lg-5'>
                    <H4>{{{<unit relativeTo="ca_collections" delimiter="<br/>"><l>^ca_collections.preferred_labels.name</l></unit><ifcount min="1" code="ca_collections"> ➔ </ifcount>}}}{{{ca_objects.preferred_labels.name}}}</H4>
                    <H6>{{{<unit>^ca_objects.type_id</unit>}}}</H6>
                    <HR>
                    {{{<ifdef code="ca_objects.idno"><H6>N° Inventaire:</H6>^ca_objects.idno<br/></ifdef>}}}
                    {{{<ifdef code="ca_objects.codeBiblio" min="1"><H6>Code</H6></ifdef>}}}
                    {{{<unit relativeTo="ca_objects" delimiter="<br/>">
                        <ifdef code="ca_objects.codeBiblio.sujet">^ca_objects.codeBiblio.sujet</ifdef>
                        <ifdef code="ca_objects.codeBiblio.nom1">- ^ca_objects.codeBiblio.nom1</ifdef>
                        <ifdef code="ca_objects.codeBiblio.titre1">- ^ca_objects.codeBiblio.titre1</ifdef>
                    </unit>}}}
                    {{{<ifcount code="ca_objects.denominationControleeBiblio" min="1"><H6>Dénomination contrôlée</H6></ifcount>}}}
                    {{{<unit relativeTo="ca_objects.denominationControleeBiblio" delimiter="<br/>">^ca_objects.denominationControleeBiblio</unit>}}}
                    {{{<ifdef code="ca_objects.preferred_labels.name"><H6>Titre:</H6>^ca_objects.preferred_labels.name<br/></ifdef>}}}
                    {{{<ifdef code="ca_objects.auteurBiblio" min="1"><H6>Auteur</H6></ifdef>}}}
                    {{{<unit relativeTo="ca_objects" delimiter="<br/>">
                        <b>^ca_objects.auteurBiblio.auteurNomBiblio</b> <ifdef code="ca_objects.auteurBiblio.auteurNomBiblio">(^ca_objects.auteurBiblio.fonctionBiblio)</ifdef>
                    </unit>}}}
                    {{{<ifcount code="ca_objects.dateEdition" min="1"><H6>Date d'édition</H6></ifcount>}}}
                    {{{<unit relativeTo="ca_objects.dateEdition" delimiter="<br/>">^ca_objects.dateEdition</unit>}}}
                    {{{<ifcount code="ca_objects.lieuEdition" min="1"><H6>Lieu d'Edition</H6></ifcount>}}}
                    {{{<unit relativeTo="ca_objects.lieuEdition" delimiter="<br/>">^ca_objects.lieuEdition</unit>}}}
                    {{{<ifcount code="ca_objects.langues" min="1"><H6>Langue</H6></ifcount>}}}
                    {{{<unit relativeTo="ca_objects.langues" delimiter="<br/>">^ca_objects.langues</unit>}}}
                    {{{<ifdef code="ca_objects.dimensions" min="1"><H6>Dimensions?????</H6></ifdef>}}}

                    {{{<unit relativeTo="ca_objects" delimiter="<br/>">
                        <ifdef code="ca_objects.dimensions.dimensions_hauteur">Hauteur:^ca_objects.dimensions.dimensions_hauteur;</ifdef>
                        <ifdef code="ca_objects.dimensions.dimensions_largeur"> Largeur:^ca_objects.dimensions.dimensions_largeur;</ifdef>
                        <ifdef code="ca_objects.dimensions.dimensions_epaisseur"> Epaisseur:^ca_objects.dimensions.dimensions_epaisseur;</ifdef>
                        <ifdef code="ca_objects.dimensions.dimensions_diametre"> Diametre:^ca_objects.dimensions.dimensions_diametre</ifdef>
                        <ifdef code="ca_objects.dimensions.dimensionsPartie">(^ca_objects.dimensions.dimensionsPartie)</ifdef>
                        <ifdef code="ca_objects.dimensions.dimensionRemarque">(^ca_objects.dimensions.dimensionRemarque)</ifdef>
                    </unit>}}}
                    {{{<ifcount code="ca_objects.nomEditeur" min="1"><H6>Nom éditeur</H6></ifcount>}}}
                    {{{<unit relativeTo="ca_objects.nomEditeur" delimiter="<br/>">^ca_objects.nomEditeur</unit>}}}					
                </div><!-- end col -->
                <?php } ?>
                <?php if($obj_type === "photo") { ?>
                    <div class='col-sm-6 col-md-6 col-lg-5'>
                        <H4>{{{<unit relativeTo="ca_collections" delimiter="<br/>"><l>^ca_collections.preferred_labels.name</l></unit><ifcount min="1" code="ca_collections"> ➔ </ifcount>}}}{{{ca_objects.preferred_labels.name}}}</H4>
                        <H6>{{{<unit>^ca_objects.type_id</unit>}}}</H6>
                        <HR>
                        {{{<ifdef code="ca_objects.idno"><H6>N° Inventaire:</H6>^ca_objects.idno<br/></ifdef>}}}
                        {{{<ifdef code="ca_objects.preferred_labels.name"><H6>Titre:</H6>^ca_objects.preferred_labels.name<br/></ifdef>}}}

                        {{{<ifcount code="ca_objects.descriptionRepresentation" min="1"><H6>Description de la Représentation</H6></ifcount>}}}
                        {{{<unit relativeTo="ca_objects.descriptionRepresentation" delimiter="<br/>">^ca_objects.descriptionRepresentation</unit>}}}
                        {{{<ifcount code="ca_objects.denominationControleePhoto" min="1"><H6>Dénomination contrôlée</H6></ifcount>}}}
                        {{{<unit relativeTo="ca_objects.denominationControleePhoto" delimiter="<br/>">^ca_objects.denominationControleePhoto</unit>}}}
                        {{{<ifcount code="ca_objects.descriptionContenu" min="1"><H6>Description du contenu</H6></ifcount>}}}
                        {{{<unit relativeTo="ca_objects.descriptionContenu" delimiter="<br/>">^ca_objects.descriptionContenu</unit>}}}
                        {{{<ifdef code="ca_objects.auteur" min="1"><H6>Auteur</H6></ifdef>}}}
                        {{{<unit relativeTo="ca_objects" delimiter="<br/>"><b>^ca_objects.auteur.auteurNom</b>
                            <ifdef code="ca_objects.auteur.fonction">(^ca_objects.auteur.fonction)</ifdef>
                        </unit>}}}
                        {{{<ifcount code="ca_objects.dateExacte" min="1"><H6>Date Exacte</H6></ifcount>}}}
                        {{{<unit relativeTo="ca_objects.dateExacte" delimiter="<br/>">^ca_objects.dateExacte</unit>}}}
                        {{{<ifcount code="ca_objects.provenanceGeographique" min="1"><H6>Provenance Géographique</H6></ifcount>}}}
                        {{{<unit relativeTo="ca_objects.provenanceGeographique" delimiter="<br/>">^ca_objects.provenanceGeographique</unit>}}}
                        {{{<ifcount code="ca_objects.techniques" min="1"><H6>Techniques</H6></ifcount>}}}
                        {{{<unit relativeTo="ca_objects.techniques" delimiter="<br/>">^ca_objects.techniques</unit>}}}


                        {{{<ifdef code="ca_objects.dimensions" min="1"><H6>Dimensions</H6></ifdef>}}}
                        {{{<unit relativeTo="ca_objects" delimiter="<br/>">
                            <ifdef code="ca_objects.dimensions.dimensions_hauteur">Hauteur:^ca_objects.dimensions.dimensions_hauteur;</ifdef>
                            <ifdef code="ca_objects.dimensions.dimensions_largeur"> Largeur:^ca_objects.dimensions.dimensions_largeur;</ifdef>
                            <ifdef code="ca_objects.dimensions.dimensions_epaisseur"> Epaisseur:^ca_objects.dimensions.dimensions_epaisseur;</ifdef>
                            <ifdef code="ca_objects.dimensions.dimensions_diametre"> Diametre:^ca_objects.dimensions.dimensions_diametre</ifdef>
                            <ifdef code="ca_objects.dimensions.dimensionsPartie">(^ca_objects.dimensions.dimensionsPartie)</ifdef>
                            <ifdef code="ca_objects.dimensions.dimensionRemarque">(^ca_objects.dimensions.dimensionRemarque)</ifdef>
                        </unit>}}}					
                    </div><!-- end col -->
                <?php } ?>
		</div><!-- end row --></div><!-- end container -->
	</div><!-- end col -->
	<div class='navLeftRight col-xs-1 col-sm-1 col-md-1 col-lg-1'>
		<div class="detailNavBgRight">
			{{{nextLink}}}
		</div><!-- end detailNavBgLeft -->
	</div><!-- end col -->
</div><!-- end row -->

<script type='text/javascript'>
	jQuery(document).ready(function() {
		$('.trimText').readmore({
		  speed: 75,
		  maxHeight: 120
		});
	});
</script>
