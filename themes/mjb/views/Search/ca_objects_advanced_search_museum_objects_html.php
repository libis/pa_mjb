<div class="container">
	<div class="row">
		<div class="col-sm-8 ">
			<h1>Museum Collection Search</h1>

<?php
	print "<p>Enter your search terms in the fields below.</p>";
?>

{{{form}}}
	<div class="row">	
	<div class='advancedContainer'>
         <div class="advancedSearchField">
            Free Text Search:<br/>
            {{{_fulltext%width=220px&height=25px}}}
         </div>
 	 <div class="advancedSearchField">
			Titre:<br/>
			{{{ca_objects.preferred_labels.name%width=220px}}}
	 </div>
         <div class="advancedSearchField">
                Auteur:<br/>
                {{{ca_objects.auteur.auteurNom%width=220px&height=28px}}}
          </div>
	</div>	
	</div>
<br>
    <div class="row">
        <div class='advancedContainer'>
            <div class="advancedSearchField">
                Date de Début:<br/>
                {{{ca_objects.date.dateDebut%width=220px&height=25px}}}
            </div>
            <div class="advancedSearchField">
                Date de Fin:<br/>
                {{{ca_objects.date.datefin%width=220px&height=25px}}}
            </div>
            <div class="advancedSearchField">
                Provenance Géographique:<br/>
                {{{ca_objects.provenanceGeographique%width=220px&height=25px}}}
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class='advancedContainer'>
            <div class="advancedSearchField">
                Dénomination Contrôlée:<br/>
                {{{ca_objects.denominationControleeMusee%width=220px&height=28px}}}
            </div>
            <div class="advancedSearchField">
                Evénements en Rapport:<br/>
                {{{ca_objects.evenementsRapport%width=220px&height=28px}}}
            </div>
            <div class="advancedSearchField">
                Organisation en rapport:<br/>
                {{{ca_objects.organisationRapport%width=220px&height=28px}}}
            </div>
        </div>
    </div>
	<br style="clear: both;"/>
	
	<div style="float: right; margin-left: 20px;">{{{reset%label=Reset}}}</div>
	<div style="float: right;">{{{submit%label=Search}}}</div>
{{{/form}}}

		</div>
	</div><!-- end row -->
</div><!-- end container -->
