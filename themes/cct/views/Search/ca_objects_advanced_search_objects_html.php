<div class="container">
	<div class="row">
		<div class="col-sm-8 cct_result_div_bkg ">
			<h1>Objects Advanced Search</h1>

<?php
	print "<p>Enter your search terms in the fields below.</p>";
?>

{{{form}}}

    <div style="float: right; margin-left: 20px;">{{{reset%label=Reset}}}</div>
    <div style="float: right;">{{{submit%label=Search}}}</div>
    <br style="clear: both;"/>

	<div class='advancedContainer'>
		<div class="row">
			<div class="col-sm-12 advancedSearchField">
				Free Text:<br/>
				{{{_fulltext%width=100%&height=50px&placeholder='Type word or phrase and click Search'}}}
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
            Title:<br/>
            {{{multi_label_search%width=100%}}}
        </div>
		</div>
        <div class="row">
            <div class="col-sm-12">
                IDNO(Temp):<br/>
                {{{ca_objects.idno%width=100%}}}
            </div>
        </div>		
		<div class="row">
        <div class="col-sm-4 advancedSearchField">
            Source:<br/>
            {{{ca_objects.marc900a%width=220px}}}
        </div>
        <div class="col-sm-4 advancedSearchField">
            Authors (all):<br/>
            {{{ca_entities.preferred_labels%restrictToRelationshipTypes=aut,clb,com,ctb,edt,edc,imp,oth,ppf,trl,nio&width=100%}}}
        </div>
        <div class="col-sm-4 advancedSearchField">
            Category:<br/>
            {{{ca_objects.marc690%width=240px}}}
        </div>
		</div>
		<div class="row">
        <div class="col-sm-4 advancedSearchField">
            Document Type:<br/>
            {{{ca_objects.marc655a%width=220px}}}
        </div>
        <div class="col-sm-4 advancedSearchField">
            Translations:<br/>
            {{{ca_objects_x_objects.link_translation_lkrr%excludeRelationshipTypes=r77301,r77302,r77300,r77301,r77500,r77501&width=220px}}}
        </div>
        <div class="col-sm-4 advancedSearchField">
            Year From - To: (e.g. 1970-1979)<br/>
            {{{print_year_sort%width=240px&height=40px}}}
        </div>
		</div>
		<div class="row">
        <div class="col-sm-4 advancedSearchField">
            Series:<br/>
            {{{ca_objects_x_objects.preferred_labels%restrictToRelationshipTypes=partOfSeries&width=100%}}}
        </div>
        <div class="col-sm-4 advancedSearchField">
            Periodical:<br/>
            {{{ca_objects.marc773.marc773a%width=220px&height=42px}}}
        </div>
        <div class="col-sm-4 advancedSearchField">
            Impressum - Place of Printing:<br/>
            {{{multi_printing_place_search%&width=240px&height=42px}}}
        </div>
		</div>
		<div class="row">
        <div class="col-sm-4 advancedSearchField">
            Impressum - Printer:<br/>
            {{{ca_entities.preferred_labels%restrictToRelationshipTypes=printer&width=100%}}}
        </div>
        <div class="col-sm-4 advancedSearchField">
            Impressum - Date of Printing:<br/>
            {{{multi_impressum-date_search%width=220px&height=42px}}}
        </div>
        <div class="col-sm-4 advancedSearchField">
            Description based on Title:<br/>
            {{{ca_objects_x_objects.preferred_labels%restrictToRelationshipTypes=descriptionTitle&width=100%}}}
        </div>
		</div>
		<div class="row">
        <div class="col-sm-4 advancedSearchField">
            Contents:<br/>
            {{{ca_objects.marc520a_cont%width=220px&height=42px}}}
        </div>
        <div class="col-sm-4 advancedSearchField">
            Adaptations from West:<br/>
            {{{ca_objects.marc795.marc795a%width=220px&height=42px}}}
        </div>
        <div class="col-sm-4 advancedSearchField">
            Facsimile editions:<br/>
            {{{ca_objects_x_objects.preferred_labels%restrictToRelationshipTypes=facsimile&width=100%}}}
        </div>
			</div>
			<div class="row">
        <div class="col-sm-4 advancedSearchField">
            Reprints in Series:<br/>
            {{{ca_objects_x_objects.preferred_labels%restrictToRelationshipTypes=reprintSeries&width=100%}}}
        </div>
        <div class="col-sm-4 advancedSearchField">
            Reprints - Place of Printing:<br/>
            {{{ca_objects_x_places.preferred_labels%restrictToRelationshipTypes=printedIn&width=100%}}}
        </div>
        <div class="col-sm-4 advancedSearchField">
            Ancients Translations:<br/>
            {{{ca_objects_x_objects.link_translation_lkrr%excludeRelationshipTypes=r77301,r77302,r77300,r77301,r77500,r77501&width=220px}}}
        </div>
			</div>
			<div class="row">
        <div class="col-sm-4 advancedSearchField">
            Library Copy:<br/>
            {{{ca_entities.preferred_labels%restrictToRelationshipTypes=libraryCopy&width=100%}}}
        </div>
        <div class="col-sm-4 advancedSearchField">
            Ancient List:<br/>
            {{{ca_objects_x_objects.preferred_labels%restrictToRelationshipTypes=ancientList&width=100%}}}
        </div>
        <div class="col-sm-4 advancedSearchField">
            Modern List:<br/>
            {{{ca_objects_x_objects.preferred_labels%restrictToRelationshipTypes=modernList&width=100%}}}
        </div>
			</div>
			<div class="row">
        <div class="col-sm-4 advancedSearchField">
            Reviews:<br/>
            {{{ca_entities.preferred_labels%restrictToRelationshipTypes=reviewer&width=100%}}}
        </div>

        <div class="col-sm-4 advancedSearchField">
            Notes:<br/>
            {{{ca_objects.marc529a%width=220px&height=42px}}}
        </div>
			</div>
	</div>

	<br style="clear: both;"/>

	<div style="float: left ;margin-right: 20px;">{{{reset%label=Reset}}}</div>
	<div style="float: left;">{{{submit%label=Search}}}</div>
{{{/form}}}

		</div>
		<div class="col-sm-4" style='border-left:1px solid #ddd;'>
			<h1>Helpful Links</h1>
			<p>Include some helpful info for your users here.</p>
		</div><!-- end col -->
	</div><!-- end row -->
</div><!-- end container -->
