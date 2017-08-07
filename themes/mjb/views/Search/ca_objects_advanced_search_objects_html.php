<div class="container">
	<div class="row">
		<div class="col-sm-8 ">
			<h1>Objects Advanced Search</h1>

<?php			
	print "<p>Enter your search terms in the fields below.</p>";
?>

{{{form}}}
	
	<div class='advancedContainer'>
        <div class="advancedSearchField">
            Free Text Search:<br/>
            {{{_fulltext%width=200px&height=25px}}}
        </div>
		<div class="advancedSearchField">
			Title:<br/>
			{{{ca_objects.preferred_labels.name%width=220px}}}
		</div>
		<div class="advancedSearchField">
			Type:<br/>
			{{{ca_objects.type_id}}}
		</div>
	</div>	
	
	<br style="clear: both;"/>
	
	<div style="float: right; margin-left: 20px;">{{{reset%label=Reset}}}</div>
	<div style="float: right;">{{{submit%label=Search}}}</div>
{{{/form}}}

		</div>
	</div><!-- end row -->
</div><!-- end container -->