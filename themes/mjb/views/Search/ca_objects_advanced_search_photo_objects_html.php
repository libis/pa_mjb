<div class="container">
	<div class="row">
		<div class="col-sm-8 ">
			<h1>Photography Collection Search</h1>

<?php
	print "<p>Enter your search terms in the fields below.</p>";
?>

{{{form}}}
	<div class="row">	
        <div class='advancedContainer'>
             <div class="advancedSearchField">
                Free Text Search:<br/>
                {{{_fulltext%restrictToTypes=Photo&width=220px&height=25px}}}
             </div>
             <div class="advancedSearchField">
                    Auteur:<br/>
                    {{{ca_objects.auteur.auteurNom%restrictToTypes=Photo&width=220px&height=28px}}}
              </div>
        </div>
	</div>
<br>
    <div class="row">
        <div class='advancedContainer'>
            <div class="advancedSearchField">
                Provenance Géographique:<br/>
                {{{ca_objects.provenanceGeographique%restrictToTypes=Photo&width=220px&height=28px}}}
            </div>
            <div class="advancedSearchField">
                Description de la Représentation:<br/>
                {{{ca_objects.descriptionRepresentation%restrictToTypes=Photo&width=220px&height=28px}}}
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
