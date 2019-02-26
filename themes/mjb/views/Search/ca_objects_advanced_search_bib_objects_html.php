<div class="container">
	<div class="row">
		<div class="col-sm-8 ">
			<h1>Library Collection Search</h1>

<?php
	print "<p>Enter your search terms in the fields below.</p>";
?>

{{{form}}}
	<div class="row">	
        <div class='advancedContainer'>
            <div class="advancedSearchField">
                Auteur:<br/>
                {{{ca_objects.auteurBiblio.auteurNomBiblio%restrictToTypes=Bibliothèque&width=220px&height=28px}}}
            </div>
         <div class="advancedSearchField">
                Titre:<br/>
                {{{ca_objects.preferred_labels.name%width=220px}}}
         </div>
        </div>
	</div>
<br>
    <div class="row">
        <div class='advancedContainer'>
            <div class="advancedSearchField">
                Année d’Edition:<br/>
                {{{ca_objects.dateEdition%restrictToTypes=Bibliothèque&width=220px&height=25px}}}
            </div>
            <div class="advancedSearchField">
                Lieu d’Edition:<br/>
                {{{ca_objects.lieuEdition%restrictToTypes=Bibliothèque&width=220px&height=25px}}}
            </div>
        </div>
    </div>
    <br>

	<br style="clear: both;"/>
	
	<div style="float: right; margin-left: 20px;">{{{reset%label=Reset}}}</div>
	<div style="float: right;">{{{submit%label=Search}}}</div>
{{{/form}}}

		</div>
	</div><!-- end row -->
</div><!-- end container -->
