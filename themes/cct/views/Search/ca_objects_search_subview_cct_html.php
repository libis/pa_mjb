<?php
/* ----------------------------------------------------------------------
 * themes/default/views/Search/ca_objects_search_subview_html.php :
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

	$qr_results 		= $this->getVar('result');
    $va_block_info 		= $this->getVar('blockInfo');
    $vs_search 			= (string)$this->getVar('search');
    $vn_hits_per_block 	= (int)$this->getVar('itemsPerPage');

	if ($qr_results->numHits() > 0) {

        $qr_results->seek($vn_start);
        $vn_col_span = 12;
        $vn_col_span_sm = 12;
        $vn_col_span_xs = 12;
        $vs_table = "ca_objects";
        $vs_pk = "object_id";

        $vn_count = 0;
        ?>
        <H3><?php print $va_block_info['displayName'] . " (" . $qr_results->numHits() . ")"; ?></H3>
        <small class="pull-right">
            <span class='multisearchFullResults'><?php print caNavLink($this->request, '<span class="glyphicon glyphicon-list"></span> ' . _t('Full results'), '', '', 'Search', '{{{block}}}', array('search' => $vs_search)); ?></span>
        </small>
        <br>
        <?php
        while ($qr_results->nextHit() && ($vn_count < $vn_hits_per_block)) {
            ?>
            <?php

            $vn_id = $qr_results->get("{$vs_table}.{$vs_pk}");

            $vs_idno_detail_link = caDetailLink($this->request, $qr_results->get("{$vs_table}.idno"), '', $vs_table, $vn_id);
            $vs_label_detail_link = caDetailLink($this->request, $qr_results->get("{$vs_table}.preferred_labels"), '', $vs_table, $vn_id);

            $vs_source_type = $qr_results->get("{$vs_table}.marc900a", array('convertCodesToDisplayText' => true));
            $vs_printing_year = $qr_results->get("{$vs_table}.yearOfPrinting_sort");

            $vs_alternative_title = $qr_results->get("{$vs_table}.marc242a");

            $author_types = "aut";
            $vs_author_template = "<unit relativeTo=\"ca_entities\" restrictToRelationshipTypes=\"$author_types\" delimiter=\" / \">^ca_entities.preferred_labels.displayname</unit>";
            $vs_authors = $qr_results->getWithTemplate($vs_author_template);

            print "
	<div class='bResultListItem' >
			<div class='bSetsSelectMultiple'><input type='checkbox' name='object_ids[]' value='{$vn_id}'></div>
			<div class='bResultListItemContent'>
				<div class='bResultListItemText'>
					<div class='idno'>{$vs_idno_detail_link}</div>
					<div class='idno'>{$vs_authors}</div>
					<div class='label_link'>{$vs_label_detail_link}</div>
					<div class='idno'>{$vs_printing_year}</div>
					<div class='idno'>{$vs_source_type}</div>
					<div class='add_link'>{$vs_expanded_info}{$vs_add_to_set_link}</div>
				</div><!-- end bResultListItemText -->
			</div><!-- end bResultListItemContent -->
			<div class='bResultListItemExpandedInfo' id='bResultListItemExpandedInfo{$vn_id}'>
			
			</div><!-- bResultListItemExpandedInfo -->
		</div><!-- end bResultListItem -->";


            $vn_count++;

        }
    }
?>
