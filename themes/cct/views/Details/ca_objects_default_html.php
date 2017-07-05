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

			<div class='col-sm-12 col-md-12 col-lg-12 detail-metadata'>
				<H3>{{{<unit relativeTo="ca_collections" delimiter="<br>"><l>^ca_collections.preferred_labels.name</l></unit>
                    <ifcount min="1" code="ca_collections"> ➔ </ifcount>}}}{{{ca_objects.preferred_labels.name}}}</H3>
				<HR>

			<div class="detail_field">{{{<ifdef code="ca_objects.idno"><H6>Identifer: </H6>^ca_objects.idno</ifdef>}}}</div>

            <div class="detail_field">{{{<ifcount code="ca_entities" restrictToRelationshipTypes="aut" min="1"><H6>Author</H6></ifcount>}}}
                <p>{{{<unit relativeTo="ca_objects_x_entities" restrictToRelationshipTypes="aut" delimiter="<br>">
                        <a href="/<?php echo basename(__CA_BASE_DIR__); ?>/index.php/Detail/entities/^ca_entities.entity_id" target="_blank" >^ca_entities.preferred_labels.displayname</a>
                        <ifdef code="ca_entities.preferred_labels.prefix">[^ca_entities.preferred_labels.prefix]</ifdef>
                        ^ca_entities.preferred_labels.suffix
                        <case>
                            <ifcount code="ca_entities.nonpreferred_labels" min="1" max="1">^ca_entities.nonpreferred_labels.displayname</ifcount>
                            <ifcount code="ca_entities.nonpreferred_labels" min="2">(^ca_entities.nonpreferred_labels.displayname%delimiter=_-_ )</ifcount>
                        </case>
                        <ifdef code="ca_entities.marc700d">(^ca_entities.marc700d)</ifdef>
                        <unit relativeTo="ca_objects_x_entities">
                            <ifdef code="ca_objects_x_entities.marc700.marc7009">(^ca_objects_x_entities.marc700.marc7009)</ifdef>
                        </unit>
                    </unit>}}}</p>
            </div>

            <div class="detail_field">{{{<ifcount code="ca_entities" restrictToRelationshipTypes="clb" min="1"><H6>Collaborator: </H6></ifcount>}}}
				<p>{{{
                    <unit relativeTo="ca_objects_x_entities" restrictToRelationshipTypes="clb" delimiter="<br>">
						<a href="/<?php echo basename(__CA_BASE_DIR__); ?>/index.php/Detail/entities/^ca_entities.entity_id" target="_blank" >^ca_entities.preferred_labels.displayname</a>						
                        <ifdef code="ca_entities.preferred_labels.suffix">[^ca_entities.preferred_labels.suffix]</ifdef>
                        ^ca_entities.preferred_labels.prefix
                        <case>
                            <ifcount code="ca_entities.nonpreferred_labels" min="1" max="1">^ca_entities.nonpreferred_labels.displayname</ifcount>
                            <ifcount code="ca_entities.nonpreferred_labels" min="2">(^ca_entities.nonpreferred_labels.displayname%delimiter=_-_ )</ifcount>
                        </case>
                        <ifdef code="ca_entities.marc700d">(^ca_entities.marc700d)</ifdef>
                        <unit relativeTo="ca_objects_x_entities">
                        <ifdef code="ca_objects_x_entities.marc700.marc7009">(^ca_objects_x_entities.marc700.marc7009)</ifdef>
                        </unit>
                    </unit>
                    }}}</p>
            </div>

            <div class="detail_field">{{{<ifcount code="ca_entities" restrictToRelationshipTypes="trl" min="1"><H6>Translator: </H6></ifcount>}}}
                <p>{{{
                    <unit relativeTo="ca_objects_x_entities" restrictToRelationshipTypes="trl" delimiter="<br>">
                        <a href="/<?php echo basename(__CA_BASE_DIR__); ?>/index.php/Detail/entities/^ca_entities.entity_id" target="_blank" >^ca_entities.preferred_labels.displayname</a>
                        <ifdef code="ca_entities.preferred_labels.suffix">[^ca_entities.preferred_labels.suffix]</ifdef>
                        ^ca_entities.preferred_labels.prefix
                        <case>
                            <ifcount code="ca_entities.nonpreferred_labels" min="1" max="1">^ca_entities.nonpreferred_labels.displayname</ifcount>
                            <ifcount code="ca_entities.nonpreferred_labels" min="2">(^ca_entities.nonpreferred_labels.displayname%delimiter=_-_ )</ifcount>
                        </case>
                        <ifdef code="ca_entities.marc700d">(^ca_entities.marc700d)</ifdef>
                        <unit relativeTo="ca_objects_x_entities">
                        <ifdef code="ca_objects_x_entities.marc700.marc7009">(^ca_objects_x_entities.marc700.marc7009)</ifdef>
                        </unit>
                    </unit>
                    }}}</p>
            </div>			
		
            <div class="detail_field">{{{<ifcount code="ca_entities" restrictToRelationshipTypes="edc" min="1"><H6>Editor in chief</H6></ifcount>}}}
                <p>{{{<unit relativeTo="ca_objects_x_entities" restrictToRelationshipTypes="edc" delimiter="<br>">
                        <a href="/<?php echo basename(__CA_BASE_DIR__); ?>/index.php/Detail/entities/^ca_entities.entity_id" target="_blank" >^ca_entities.preferred_labels.displayname</a>
                        <ifdef code="ca_entities.preferred_labels.prefix">[^ca_entities.preferred_labels.prefix]</ifdef>
                        ^ca_entities.preferred_labels.suffix
                        <case>
                            <ifcount code="ca_entities.nonpreferred_labels" min="1" max="1">^ca_entities.nonpreferred_labels.displayname</ifcount>
                            <ifcount code="ca_entities.nonpreferred_labels" min="2">(^ca_entities.nonpreferred_labels.displayname%delimiter=_-_ )</ifcount>
                        </case>
                        <ifdef code="ca_entities.marc700d">(^ca_entities.marc700d)</ifdef>
                        <unit relativeTo="ca_objects_x_entities">
                            <ifdef code="ca_objects_x_entities.marc700.marc7009">(^ca_objects_x_entities.marc700.marc7009)</ifdef>
                        </unit>
                    </unit>}}}</p>
            </div>

            <div class="detail_field">{{{<ifcount code="ca_entities" restrictToRelationshipTypes="edt" min="1"><H6>Editor</H6></ifcount>}}}
                <p>{{{<unit relativeTo="ca_objects_x_entities" restrictToRelationshipTypes="edt" delimiter="<br>">
                        <a href="/<?php echo basename(__CA_BASE_DIR__); ?>/index.php/Detail/entities/^ca_entities.entity_id" target="_blank" >^ca_entities.preferred_labels.displayname</a>
                        <ifdef code="ca_entities.preferred_labels.prefix">[^ca_entities.preferred_labels.prefix]</ifdef>
                        ^ca_entities.preferred_labels.suffix
                        <case>
                            <ifcount code="ca_entities.nonpreferred_labels" min="1" max="1">^ca_entities.nonpreferred_labels.displayname</ifcount>
                            <ifcount code="ca_entities.nonpreferred_labels" min="2">(^ca_entities.nonpreferred_labels.displayname%delimiter=_-_ )</ifcount>
                        </case>
                        <ifdef code="ca_entities.marc700d">(^ca_entities.marc700d)</ifdef>
                        <unit relativeTo="ca_objects_x_entities">
                            <ifdef code="ca_objects_x_entities.marc700.marc7009">(^ca_objects_x_entities.marc700.marc7009)</ifdef>
                        </unit>
                    </unit>}}}</p>
            </div>			
			
            <div class="detail_field">{{{<ifcount code="ca_entities" restrictToRelationshipTypes="com" min="1"><H6>Compiler</H6></ifcount>}}}
                <p>{{{<unit relativeTo="ca_objects_x_entities" restrictToRelationshipTypes="com" delimiter="<br>">
                        <a href="/<?php echo basename(__CA_BASE_DIR__); ?>/index.php/Detail/entities/^ca_entities.entity_id" target="_blank" >^ca_entities.preferred_labels.displayname</a>
                        <ifdef code="ca_entities.preferred_labels.prefix">[^ca_entities.preferred_labels.prefix]</ifdef>
                        ^ca_entities.preferred_labels.suffix
                        <case>
                            <ifcount code="ca_entities.nonpreferred_labels" min="1" max="1">^ca_entities.nonpreferred_labels.displayname</ifcount>
                            <ifcount code="ca_entities.nonpreferred_labels" min="2">(^ca_entities.nonpreferred_labels.displayname%delimiter=_-_ )</ifcount>
                        </case>
                        <ifdef code="ca_entities.marc700d">(^ca_entities.marc700d)</ifdef>
                        <unit relativeTo="ca_objects_x_entities">
                            <ifdef code="ca_objects_x_entities.marc700.marc7009">(^ca_objects_x_entities.marc700.marc7009)</ifdef>
                        </unit>
                    </unit>}}}</p>
            </div>			
			
            <div class="detail_field">{{{<ifdef code="ca_objects.marc242a"><H6>Pinyin Title: </H6></ifdef>}}}
                <p>{{{<unit delimiter="<br>">^ca_objects.marc242a</unit>}}}</p>
            </div>

            <div class="detail_field">{{{<ifdef code="ca_objects.marc246"><H6>Alternative Form of Title: </H6></ifdef>}}}
                <p>{{{<unit delimiter="<br>">^ca_objects.marc246</unit>}}}</p>
            </div>

            <div class="detail_field">{{{<ifdef code="ca_objects.marc210a"><H6>Abbreviated Title: </H6></ifdef>}}}
                <p>{{{<unit delimiter="<br>">^ca_objects.marc210a</unit>}}}</p>
            </div>			
			
            <div class="detail_field">
                <?php
                $base_search_url =  basename(__CA_BASE_DIR__)."/index.php/Detail/objects";
                $slist_types_list = array("partOfSeries");
                $slist = $t_object->getRelatedItems("ca_objects", array(
                    'returnAsArray' => true,
                    'restrictToRelationshipTypes' => $slist_types_list
                ));
                $counter = 1;
                foreach ($slist as $list){
                    if(isset($related_interstitial))
                        unset($related_interstitial);
                    /* Skipp 'has part of series', which is rtol in CA/Pawtucket */
                    if(!isset($list['direction']) || $list['direction'] === 'rtol')
                        continue;
                    if($counter === 1){
                        echo "<H6>Series: </H6>";
                        echo "<p>";
                    }
                    $counter++;
                    $related_interstitial = new ca_objects_x_objects($list['relation_id']);
                    $ml_interstitial_data = $related_interstitial->get('ca_objects_x_objects.marc440', array(
                        'returnWithStructure' => true,
                        'convertCodesToDisplayText'=>true
                    ));

                    $strArray = array();
                    if(isset($ml_interstitial_data[$list['relation_id']])){
                        $data = $ml_interstitial_data[$list['relation_id']];
                        foreach ($data as $item){
                            $str = "";
                            if(isset($item['marc440b']) && strlen($item['marc440b']) > 0)
                                $str .= " (".$item['marc440b'].") ";
                            if(isset($item['marc440v']) && strlen($item['marc440v']) > 0)
                                $str .= $item['marc440v']." ";


                            if(strlen($str) > strlen(""))
                                $strArray[] = $str;
                        }
                    }
                    $s_obj_id = $list['object_id'];
                    $s_obj_label = $list['label'];
                    $obj_rel_name = $list['relationship_typename'];//TBR if type is not to be shown
                    echo "<a href='/$base_search_url/$s_obj_id' style='text-decoration: none' target='_blank'>$s_obj_label</a>";
                    if(sizeof($strArray) > 0){
                        echo " ".implode($strArray);
                    }

                    echo "<br>";
                    if($counter > sizeof($slist))
                        echo "</p>";
                }
                ?>
            </div>			

            <div class="detail_field">{{{<ifdef code="ca_objects.marc773"><H6>Periodical: </H6></ifdef>}}}
                <p>{{{<unit delimiter="<br>">
                        <ifdef code="ca_objects.marc773.marc773a"><b>In:</b> ^ca_objects.marc773.marc773a </ifdef>
                        <ifdef code="ca_objects.marc773.marc773g"> ^ca_objects.marc773.marc773g</ifdef>
                    </unit>}}}</p>
            </div>			
			
            <div class="detail_field">{{{<ifdef code="ca_objects.marc260.marc260c"><H6>Date: </H6></ifdef>}}}
                <p>{{{<unit delimiter="<br>">
                        ^ca_objects.marc260.marc260c<ifdef code="ca_objects.marc260.marc2609"> [ ^ca_objects.marc260.marc2609 ] </ifdef>
                    </unit>}}}</p>
            </div>

            <div class="detail_field">
                {{{<ifdef code="ca_objects.marc2609a"><H6>Impressum - Place: </H6></ifdef>}}}
                <p>{{{<ifdef code="ca_objects.marc260p.marc260p9a">^ca_objects.marc260p.marc260p9a </ifdef>
                    <ifdef code="ca_objects.marc260p.marc260p_9a">(^ca_objects.marc260p.marc260p_9a)</ifdef>
                    }}}</p>
            </div>

            <div class="detail_field">
                {{{<ifcount code="ca_entities.preferred_labels" restrictToRelationshipTypes="printer" min = "1"><H6>Impressum - Printer: </H6></ifcount>}}}
                <p>{{{<unit relativeTo="ca_entities" restrictToRelationshipTypes="printer" delimiter="<br>">
                        <l>^ca_entities.preferred_labels</l> <ifdef code="ca_entities.nonpreferred_labels"> (^ca_entities.nonpreferred_labels)</ifdef>
                    </unit>}}}</p>
            </div>			
			
            <!--Descr. Based on Library Copies-->
            <div class="detail_field">
                <?php
                $base_detail_url =  basename(__CA_BASE_DIR__)."/index.php/Detail/entities";
                $desclibcopy_types_list = array("libraryx");
                $desclibcopylist = $t_object->getRelatedItems("ca_entities", array(
                    'returnAsArray' => true,
                    'restrictToRelationshipTypes' => $desclibcopy_types_list
                ));
                $counter = 1;
                $is_field_label = true;
                foreach ($desclibcopylist as $list){
                    $counter++;
                    if(isset($related_interstitial))
                        unset($related_interstitial);
                    /* Skipp 'Library copy(libraryx)', which is rtol in CA/Pawtucket */
                    if(!isset($list['direction']) || $list['direction'] === 'rtol')
                        continue;

                    if($is_field_label === true){
                        echo "<H6>Descr. based on: </H6>";
                        echo "<p>";
                        $is_field_label = false;
                    }
                    $related_interstitial = new ca_objects_x_entities($list['relation_id']);
                    $desclibcopy_interstitial_data = $related_interstitial->get('ca_objects_x_entities.marc250', array(
                        'returnWithStructure' => true,
                        'convertCodesToDisplayText'=>true
                    ));

                    $strArray = array();
                    if(isset($desclibcopy_interstitial_data[$list['relation_id']])){
                        $data = $desclibcopy_interstitial_data[$list['relation_id']];
                        foreach ($data as $item){
                            $str = " - ";
                            if(isset($item['marc250x']) && strlen($item['marc250x']) > 0)
                                $str .= "<b>Shelf:</b> ".$item['marc250x'].",";
                            if(isset($item['marc250y']) && strlen($item['marc250y']) > 0)
                                $str .= " ".$item['marc250y']." ";
                            if(strlen($str) > strlen(" - "))
                                $strArray[] = $str."<br>";
                        }
                    }
                    $desclibcopy_entity_id = $list['entity_id'];
                    $desclibcopy_entity_label = $list['label'];
                    echo "<a href='/$base_detail_url/$desclibcopy_entity_id' style='text-decoration: none' target='_blank'>$desclibcopy_entity_label</a>";
                    if(sizeof($strArray) > 0){
                        echo "<br>".implode($strArray);
                    }
                    if($counter > sizeof($desclibcopylist))
                        echo "</p>";
                }
                ?>
            </div>

            <!--Descr. based on Title-->
            <div class="detail_field">
                <?php
                $base_search_url =  basename(__CA_BASE_DIR__)."/index.php/Detail/objects";
                $dtlist_types_list = array("descriptionTitle");
                $dtlist = $t_object->getRelatedItems("ca_objects", array(
                    'returnAsArray' => true,
                    'restrictToRelationshipTypes' => $dtlist_types_list
                ));
                $counter = 1;
                $is_field_label = true;
                foreach ($dtlist as $list){
                    $counter++;
                    if(isset($related_interstitial))
                        unset($related_interstitial);
                    /* Skipp 'has description based on title', which is rtol in CA/Pawtucket */
                    if(!isset($list['direction']) || $list['direction'] === 'rtol')
                        continue;

                    if($is_field_label === true){
                        echo "<H6> Descr. based on Title </H6>";
                        echo "<p>";
                        $is_field_label = false;
                    }
                    $related_interstitial = new ca_objects_x_objects($list['relation_id']);
                    $dt_interstitial_data = $related_interstitial->get('ca_objects_x_objects.marc250Title', array(
                        'returnWithStructure' => true,
                        'convertCodesToDisplayText'=>true
                    ));

                    $strArray = array();
                    if(isset($dt_interstitial_data[$list['relation_id']])){
                        $data = $dt_interstitial_data[$list['relation_id']];
                        foreach ($data as $item){
                            $str = " - ";
                            if(isset($item['marc2509']) && strlen($item['marc2509']) > 0)
                                $str .= $item['marc2509']." ";
                            if(isset($item['marc250z']) && strlen($item['marc250z']) > 0)
                                $str .= "(".$item['marc250z'].") ";

                            if(strlen($str) > strlen(" - "))
                                $strArray[] = $str;
                        }
                    }
                    $dt_obj_id = $list['object_id'];
                    $dt_obj_label = $list['label'];
                    echo "<a href='/$base_search_url/$dt_obj_id' style='text-decoration: none' target='_blank'>$dt_obj_label</a>";
                    if(sizeof($strArray) > 0){
                        echo "<br>".implode($strArray);
                    }
                    echo "<br>";
                    if($counter > sizeof($dtlist))
                        echo "</p>";
                }
                ?>
            </div>			
			
            <div class="detail_field">{{{<ifcount code="ca_objects.marc300" min = "1"><H6>Physical Description: </H6></ifcount>}}}
                <p>{{{<unit delimiter="<br>">^ca_objects.marc300.marc300a</unit>}}}</p>
            </div>

            <div class="detail_field">{{{<ifcount code="ca_entities" restrictToRelationshipTypes="nio" min="1"><H6>Nihil Obstat: </H6></ifcount>}}}
                <p>{{{<unit relativeTo="ca_objects_x_entities" restrictToRelationshipTypes="nio" delimiter="<br>">
                        <a href="/<?php echo basename(__CA_BASE_DIR__); ?>/index.php/Detail/entities/^ca_entities.entity_id" target="_blank" >^ca_entities.preferred_labels.displayname</a>
                        <ifdef code="ca_entities.preferred_labels.prefix">[^ca_entities.preferred_labels.prefix]</ifdef>
                        ^ca_entities.preferred_labels.suffix
                        <case>
                            <ifcount code="ca_entities.nonpreferred_labels" min="1" max="1">(^ca_entities.nonpreferred_labels.displayname) </ifcount>
                            <ifcount code="ca_entities.nonpreferred_labels" min="2">(^ca_entities.nonpreferred_labels.displayname%delimiter=_-_ ) </ifcount>
                        </case>
                        <ifdef code="ca_entities.marc700d">(^ca_entities.marc700d)</ifdef>
                    </unit>
                    }}}</p>
            </div>

            <div class="detail_field">{{{<ifcount code="ca_entities" restrictToRelationshipTypes="imp" min="1"><H6>Imprimatur: </H6></ifcount>}}}
                <p>{{{<unit relativeTo="ca_objects_x_entities" restrictToRelationshipTypes="imp" delimiter="<br>">
                        <a href="/<?php echo basename(__CA_BASE_DIR__); ?>/index.php/Detail/entities/^ca_entities.entity_id" target="_blank" >^ca_entities.preferred_labels.displayname</a>						
                        <ifdef code="ca_entities.preferred_labels.prefix">[^ca_entities.preferred_labels.prefix]</ifdef>
                        ^ca_entities.preferred_labels.suffix
                        <case>
                            <ifcount code="ca_entities.nonpreferred_labels" min="1" max="1">(^ca_entities.nonpreferred_labels.displayname) </ifcount>
                            <ifcount code="ca_entities.nonpreferred_labels" min="2">(^ca_entities.nonpreferred_labels.displayname%delimiter=_-_ )  </ifcount>
                        </case>
                        <ifdef code="ca_entities.marc700d">(^ca_entities.marc700d)</ifdef>
                        <unit relativeTo="ca_objects_x_entities" restrictToRelationshipTypes="imp" delimiter=" ">
                            <ifdef code="ca_objects_x_entities.marc700.marc7009">(^ca_objects_x_entities.marc700.marc7009)</ifdef>
                        </unit>
                    </unit>
                    }}}</p>
            </div>

            <div class="detail_field">{{{<ifcount code="ca_entities" restrictToRelationshipTypes="ppf" min="1"><H6>Pre/Post Faces: </H6></ifcount>}}}
                <p>{{{<unit relativeTo="ca_objects_x_entities" restrictToRelationshipTypes="ppf" delimiter="<br>">
                        <a href="/<?php echo basename(__CA_BASE_DIR__); ?>/index.php/Detail/entities/^ca_entities.entity_id" target="_blank" >^ca_entities.preferred_labels.displayname</a>						
                        <ifdef code="ca_entities.preferred_labels.prefix">[^ca_entities.preferred_labels.prefix]</ifdef>
                        ^ca_entities.preferred_labels.suffix
                        <case>
                            <ifcount code="ca_entities.nonpreferred_labels" min="1" max="1">(^ca_entities.nonpreferred_labels.displayname) </ifcount>
                            <ifcount code="ca_entities.nonpreferred_labels" min="2">(^ca_entities.nonpreferred_labels.displayname%delimiter=__-__ )  </ifcount>
                        </case>
                        <ifdef code="ca_entities.marc700d">(^ca_entities.marc700d)</ifdef>
                        <unit relativeTo="ca_objects_x_entities" restrictToRelationshipTypes="ppf" delimiter=" ">
                            <ifdef code="ca_objects_x_entities.marc700.marc7009">(^ca_objects_x_entities.marc700.marc7009)</ifdef>
                            <ifdef code="ca_objects_x_entities.marc700.marc700e">[^ca_objects_x_entities.marc700.marc700e]</ifdef>
                            ^ca_objects_x_entities.marc700.marc700f
                            <ifdef code="ca_objects_x_entities.marc700.marc700t">[^ca_objects_x_entities.marc700.marc700t]</ifdef>
                        </unit>
                    </unit>
                    }}}</p>
            </div>

            <div class="detail_field">{{{<ifcount code="ca_objects.marc520a_cont"  min = "1"><H6>Contents: </H6></ifcount>}}}
                <p>{{{<unit delimiter="<br>">^ca_objects.marc520a_cont</unit>}}}</p>
            </div>

            <!--Facsimile Editions-->
            <div class="detail_field">
                <?php
                $base_search_url =  basename(__CA_BASE_DIR__)."/index.php/Detail/objects";
                $facslist_types_list = array("facsimile");
                $facslist = $t_object->getRelatedItems("ca_objects", array(
                    'returnAsArray' => true,
                    'restrictToRelationshipTypes' => $facslist_types_list
                ));
                $counter = 1;
                foreach ($facslist as $list){
                    if(isset($related_interstitial))
                        unset($related_interstitial);
                    /* Skipp 'has facsimile list', which is rtol in CA/Pawtucket */
                    if(!isset($list['direction']) || $list['direction'] === 'rtol')
                        continue;

                    if($counter === 1){
                        echo "<H6>Facsimile Editions: </H6>";
                        echo "<p>";
                    }
                    $counter++;
                    $related_interstitial = new ca_objects_x_objects($list['relation_id']);
                    $al_interstitial_data = $related_interstitial->get('ca_objects_x_objects.marc793', array(
                        'returnWithStructure' => true,
                        'convertCodesToDisplayText'=>true
                    ));

                    $strArray = array();
                    if(isset($al_interstitial_data[$list['relation_id']])){
                        $data = $al_interstitial_data[$list['relation_id']];
                        foreach ($data as $item){
                            $str = " - ";
                            if(isset($item['marc793b']) && strlen($item['marc793b']) > 0)
                                $str .= $item['marc793b']." ";
                            if(isset($item['marc7939']) && strlen($item['marc7939']) > 0)
                                $str .= " (".$item['marc7939'].") ";
                            if(isset($item['marc793w']) && strlen($item['marc793w']) > 0){
                                $related_entity_label = "[".$item['marc793w'].", "; //TOBE A LINK
                                $entity_search_url =  basename(__CA_BASE_DIR__)."/index.php/Search/entities/search/\"".$item['marc793w']."\"";
                                $str .= "<a href='/$entity_search_url' style='text-decoration: none' target='_blank'>$related_entity_label</a>";
                            }

                            if(isset($item['marc793x']) && strlen($item['marc793x']) > 0)
                                $str .= "shelf: ".$item['marc793x'].", ";
                            if(isset($item['marc793y']) && strlen($item['marc793y']) > 0)
                                $str .= $item['marc793y']."] ";

                            if(strlen($str) > strlen(" - "))
                                $strArray[] = $str;
                        }
                    }
                    $f_obj_id = $list['object_id'];
                    $f_obj_label = $list['label'];
                    echo "<a href='/$base_search_url/$f_obj_id' style='text-decoration: none' target='_blank'>$f_obj_label</a>";
                    if(sizeof($strArray) > 0){
                        echo "<br>".implode($strArray);
                    }
                    echo "<br>";
                    if($counter > sizeof($facslist))
                        echo "</p>";
                }
                ?>
            </div>
<!-- Temporarily hidden
            <div class="detail_field">{{{<ifcount code="ca_entities.preferred_labels" restrictToRelationshipTypes="printerReprint" min = "1"><H6>Reprints: </H6></ifcount>}}}
                <p>{{{<unit relativeTo="ca_entities" restrictToRelationshipTypes="printerReprint" delimiter="<br>">
                        <ifdef code="ca_objects_x_entities.marc790.marc790c">^ca_objects_x_entities.marc790.marc790c :</ifdef>
                        <ifdef code="ca_objects_x_entities.marc790.marc790a">^ca_objects_x_entities.marc790.marc790a :</ifdef>
                        <l>^ca_entities.preferred_labels</l>
                        <ifdef code="ca_objects_x_entities.marc790.marc7909">(^ca_objects_x_entities.marc790.marc7909)</ifdef>
                    </unit>
                    }}}</p>
            </div>
-->
            <!--Reprints in series-->
            <div class="detail_field">
                <?php
                $base_search_url =  basename(__CA_BASE_DIR__)."/index.php/Detail/objects";
                $rs_types_list = array("reprintSeries");
                $rslist = $t_object->getRelatedItems("ca_objects", array(
                    'returnAsArray' => true,
                    'restrictToRelationshipTypes' => $rs_types_list
                ));
                $counter = 1;
                $is_field_label = true;
                foreach ($rslist as $list){
                    $counter++;
                    if(isset($related_interstitial))
                        unset($related_interstitial);
                    /* Skipp 'has reprint', which is rtol in CA/Pawtucket */
                    if(!isset($list['direction']) || $list['direction'] === 'rtol')
                        continue;

                    if($is_field_label === true){
                        echo "<H6> Reprints in series: </H6>";
                        echo "<p>";
                        $is_field_label = false;
                    }
                    $related_interstitial = new ca_objects_x_objects($list['relation_id']);
                    $rs_interstitial_data = $related_interstitial->get('ca_objects_x_objects.marc791', array(
                        'returnWithStructure' => true,
                        'convertCodesToDisplayText'=>true
                    ));

                    $strArray = array();
                    if(isset($rs_interstitial_data[$list['relation_id']])){
                        $data = $rs_interstitial_data[$list['relation_id']];
                        foreach ($data as $item){
                            $str = " - ";
                            if(isset($item['marc791b']) && strlen($item['marc791b']) > 0)
                                $str .= $item['marc791b']." ";
                            if(isset($item['marc7919']) && strlen($item['marc7919']) > 0)
                                $str .= " (".$item['marc7919'].") ";
                            if(isset($item['marc791t']) && strlen($item['marc791t']) > 0){
                                $related_entity_label = $item['marc791t'].", "; //TOBE A LINK
                                $entity_search_url =  basename(__CA_BASE_DIR__)."/index.php/Search/objects/search/\"".$item['marc791t']."\"";
                                $str .= "<a href='/$entity_search_url' style='text-decoration: none' target='_blank'>$related_entity_label</a>";
                            }

                            if(isset($item['marc791w']) && strlen($item['marc791w']) > 0){
                                $related_entity_label = "[".$item['marc791w'].", "; //TOBE A LINK
                                $entity_search_url =  basename(__CA_BASE_DIR__)."/index.php/Search/entities/search/\"".$item['marc791w']."\"";
                                $str .= "<a href='/$entity_search_url' style='text-decoration: none' target='_blank'>$related_entity_label</a>";
                            }
                            if(isset($item['marc791x']) && strlen($item['marc791x']) > 0)
                                $str .= "shelf: ".$item['marc793x'].", ";
                            if(isset($item['marc791y']) && strlen($item['marc791y']) > 0)
                                $str .= $item['marc791y']."] ";

                            if(strlen($str) > strlen(" - "))
                                $strArray[] = $str;
                        }
                    }
                    $rs_obj_id = $list['object_id'];
                    $rs_obj_label = $list['label'];
                    echo "<a href='/$base_search_url/$rs_obj_id' style='text-decoration: none' target='_blank'>$rs_obj_label</a>";
                    if(sizeof($strArray) > 0){
                        echo "<br>".implode($strArray);
                    }
                    echo "<br>";
                    if($counter > sizeof($rslist))
                        echo "</p>";
                }
                ?>
            </div>

            <div class="detail_field">{{{<ifcount code="ca_objects.marc792a"  min = "1"><H6>Reprints (Other): </H6></ifcount>}}}
                <p>{{{<unit delimiter="<br>">^ca_objects.marc792a</unit>}}}</p>
            </div>
			
            <!--Anc. translations-->
            <div class="detail_field">
                <?php
                $base_search_url =  basename(__CA_BASE_DIR__)."/index.php/Detail/objects";
                $atrlist = $t_object->get("ca_objects.marc794", array('returnWithStructure' => true));
                $is_field_label = true;
                foreach ($atrlist as $list){
                    $strArray = array();
                    foreach($list as $item){
                        $str = "";
                        if(isset($item['marc794a']) && strlen($item['marc794a']) > 0)
                            $str .= " Into ". $item['marc794a']." ";
                        if(isset($item['marc794b']) && strlen($item['marc794b']) > 0)
                            $str .= $item['marc794b'].", ";
                        if(isset($item['marc794c']) && strlen($item['marc794c']) > 0){
                            $object_label = $item['marc794c']." ";
                            $object_label_decoded = htmlspecialchars($item['marc794c'], ENT_QUOTES);
                            $object_search_query_url =  basename(__CA_BASE_DIR__)."/index.php/Search/objects/search/\"".$object_label_decoded."\"";
                            $str .= "[<a href='/$object_search_query_url' style='text-decoration: none' target='_blank'>$object_label</a>";
                        }
                        if(isset($item['marc794d']) && strlen($item['marc794d']) > 0)
                            $str .= $item['marc794d']."] ";
                        if(isset($item['marc7949']) && strlen($item['marc7949']) > 0)
                            $str .= "(".$item['marc7949'].") ";
                        if(isset($item['marc794t']) && strlen($item['marc794t']) > 0){
                            $object_label = $item['marc794t'];
                            $object_label_decoded = htmlspecialchars($item['marc794t'], ENT_QUOTES);
                            $object_search_query_url =  basename(__CA_BASE_DIR__)."/index.php/Search/objects/search/\"".$object_label_decoded."\"";
                            $str .= "[<a href='/$object_search_query_url' style='text-decoration: none' target='_blank'>$object_label</a>, ";
                        }
                        if(isset($item['marc794w']) && strlen($item['marc794w']) > 0){
                            $entity_label .= $item['marc794w'];
                            $entity_label_decoded = htmlspecialchars($item['marc794w'], ENT_QUOTES);
                            $entity_search_query_url =  basename(__CA_BASE_DIR__)."/index.php/Search/entities/search/\"".$entity_label_decoded."\"";
                            $str .= "<a href='/$entity_search_query_url' style='text-decoration: none' target='_blank'>$entity_label</a>, ";
                        }


                        if(isset($item['marc794x']) && strlen($item['marc794x']) > 0)
                            $str .= "shelf: ".$item['marc794x']." ";
                        if(isset($item['marc794y']) && strlen($item['marc794y']) > 0)
                            $str .= $item['marc794y']."]";

                        if(strlen($str) > strlen(""))
                            $strArray[] = $str."<br>";
                    }
                }
                if(sizeof($atrlist) > 0 && sizeof($strArray) > 0){
                    echo "<H6>Anc. translations: </H6>";
                    echo "<p>";
                    echo implode($strArray);
                    echo "</p>";
                    $strArray=null;
                }
                ?>
            </div>

            <!--Library Copies-->
            <div class="detail_field">
                <?php
                $base_detail_url =  basename(__CA_BASE_DIR__)."/index.php/Detail/entities";
                $libcopy_types_list = array("libraryCopy");
                $libcopylist = $t_object->getRelatedItems("ca_entities", array(
                    'returnAsArray' => true,
                    'restrictToRelationshipTypes' => $libcopy_types_list
                ));
                $counter = 1;
                $is_field_label = true;
                foreach ($libcopylist as $list){
                    $counter++;
                    if(isset($related_interstitial))
                        unset($related_interstitial);
                    /* Skipp 'Library copy', which is rtol in CA/Pawtucket */
                    if(!isset($list['direction']) || $list['direction'] === 'rtol')
                        continue;

                    if($is_field_label === true){
                        echo "<H6>Library Copies: </H6>";
                        echo "<p>";
                        $is_field_label = false;
                    }
                    $related_interstitial = new ca_objects_x_entities($list['relation_id']);
                    $libcopy_interstitial_data = $related_interstitial->get('ca_objects_x_entities.marc852', array(
                        'returnWithStructure' => true,
                        'convertCodesToDisplayText'=>true
                    ));

                    $strArray = array();
                    if(isset($libcopy_interstitial_data[$list['relation_id']])){
                        $data = $libcopy_interstitial_data[$list['relation_id']];
                        foreach ($data as $item){
                            $str = " - ";
                            if(isset($item['marc852h']) && strlen($item['marc852h']) > 0)
                                $str .= "<b>Shelf:</b> ".$item['marc852h'].",";
                            if(isset($item['marc852l']) && strlen($item['marc852l']) > 0)
                                $str .= " ".$item['marc852l']." ";
                            if(isset($item['marc8529']) && strlen($item['marc8529']) > 0)
                                $str .= " (".$item['marc8529'].") ";

                            if(isset($item['marc852t']) && strlen($item['marc852t']) > 0){
                                $related_object_label = $item['marc852t'].", ";
                                $object_search_url =  basename(__CA_BASE_DIR__)."/index.php/Search/objects/search/\"".$item['marc852t']."\"";
                                $str .= "<a href='/$object_search_url' style='text-decoration: none' target='_blank'>$related_object_label</a>";
                            }
                            if(isset($item['marc852y']) && strlen($item['marc852y']) > 0)
                                $str .= " ".$item['marc852y']." ";

                            if(strlen($str) > strlen(" - "))
                                $strArray[] = $str."<br>";
                        }
                    }
                    $libcopy_entity_id = $list['entity_id'];
                    $libcopy_entity_label = $list['label'];
                    echo "<a href='/$base_detail_url/$libcopy_entity_id' style='text-decoration: none' target='_blank'>$libcopy_entity_label</a>";
                    if(sizeof($strArray) > 0){
                        echo "<br>".implode($strArray);
                    }
                    if($counter > sizeof($libcopylist))
                        echo "</p>";
                }
                ?>
            </div>

            <div class="detail_field">
                <?php
                $base_search_url =  basename(__CA_BASE_DIR__)."/index.php/Detail/objects";
                $alist_types_list = array("ancientList");
                $alist = $t_object->getRelatedItems("ca_objects", array(
                    'returnAsArray' => true,
                    'restrictToRelationshipTypes' => $alist_types_list
                ));
                $counter = 1;
                foreach ($alist as $list){
                    if(isset($related_interstitial))
                        unset($related_interstitial);
                    /* Skipp 'has ancient list', which is rtol in CA/Pawtucket */
                    if(!isset($list['direction']) || $list['direction'] === 'rtol')
                        continue;

                    if($counter === 1){
                        echo "<H6>Ancient Lists: </H6>";
                        echo "<p>";
                    }

                    $counter++;
                    $related_interstitial = new ca_objects_x_objects($list['relation_id']);
                    $al_interstitial_data = $related_interstitial->get('ca_objects_x_objects.marc532_al', array(
                        'returnWithStructure' => true,
                        'convertCodesToDisplayText'=>true
                    ));

                    $strArray = array();
                    if(isset($al_interstitial_data[$list['relation_id']])){
                        $data = $al_interstitial_data[$list['relation_id']];
                        foreach ($data as $item){
                            $str = " - ";
                            if(isset($item['marc532a_al']) && strlen($item['marc532a_al']) > 0)
                                $str .= $item['marc532a_al'].", ";
                            if(isset($item['marc532c_al']) && strlen($item['marc532c_al']) > 0)
                                $str .= $item['marc532c_al'].", ";
                            if(isset($item['marc5329_al']) && strlen($item['marc5329_al']) > 0)
                                $str .= $item['marc5329_al'];
                            if(isset($item['marc532z_al']) && strlen($item['marc532z_al']) > 0)
                                $str .= "(".$item['marc532z_al'].")";

                            if(strlen($str) > strlen(" - "))
                                $strArray[] = $str. "<br>";
                        }
                    }
                    $al_obj_id = $list['object_id'];
                    $al_obj_label = $list['label'];
                    echo "<a href='/$base_search_url/$al_obj_id' style='text-decoration: none' target='_blank'>$al_obj_label</a>";
                    if(sizeof($strArray) > 0){
                        echo "<br>".implode($strArray);
                    }                  
                    if($counter > sizeof($alist))
                        echo "</p>";
                }
                ?>
            </div>			
			
            <div class="detail_field">
                <?php
                $base_search_url =  basename(__CA_BASE_DIR__)."/index.php/Detail/objects";
                $mlist_types_list = array("modernList");
                $mlist = $t_object->getRelatedItems("ca_objects", array(
                    'returnAsArray' => true,
                    'restrictToRelationshipTypes' => $mlist_types_list
                ));
                $counter = 1;
                foreach ($mlist as $list){
                    if(isset($related_interstitial))
                        unset($related_interstitial);
                    /* Skipp 'has modern list', which is rtol in CA/Pawtucket */
                    if(!isset($list['direction']) || $list['direction'] === 'rtol')
                        continue;

                    if($counter === 1){
                        echo "<H6>Modern Lists: </H6>";
                        echo "<p>";
                    }

                    $counter++;
                    $related_interstitial = new ca_objects_x_objects($list['relation_id']);
                    $ml_related_label = $related_interstitial->get('ca_objects.related.marc210a', array('returnAsArray' => true));
                    $ml_interstitial_data = $related_interstitial->get('ca_objects_x_objects.marc532_ml', array(
                        'returnWithStructure' => true,
                        'convertCodesToDisplayText'=>true
                    ));

                    $strArray = array();
                    if(isset($ml_interstitial_data[$list['relation_id']])){
                        $data = $ml_interstitial_data[$list['relation_id']];
                        foreach ($data as $item){
                            $str = " - ";
                            if(isset($item['marc532b_ml']) && strlen($item['marc532b_ml']) > 0)
                                $str .= $item['marc532b_ml'];
                            if(isset($item['marc532c_ml']) && strlen($item['marc532c_ml']) > 0)
                                $str .= " (".$item['marc532c_ml'].") ";

                            if(strlen($str) > strlen(" - "))
                                $strArray[] = $str;
                        }
                    }
                    $ml_obj_id = $list['object_id'];
                    $ml_obj_label = $list['label'];
                    $obj_rel_name = $list['relationship_typename'];//TBR if type is not to be shown
                    echo "<a href='/$base_search_url/$ml_obj_id' style='text-decoration: none' target='_blank'>$ml_obj_label</a>";
                    if(sizeof($strArray) > 0){
                        echo "<br>".implode($strArray);
                    }
                    echo "<br>";
                    if($counter > sizeof($mlist))
                        echo "</p>";
                }
                ?>
            </div>

			<!--Reviews-->
			<div class="detail_field">
				<?php
				$base_detail_url =  basename(__CA_BASE_DIR__)."/index.php/Detail/entities";
				$rev_types_list = array("reviewer");
				$rvlist = $t_object->getRelatedItems("ca_entities", array(
					'returnAsArray' => true,
					'restrictToRelationshipTypes' => $rev_types_list
				));
				$counter = 1;
				$is_field_label = true;
				foreach ($rvlist as $list){
					$counter++;
					if(isset($related_interstitial))
						unset($related_interstitial);
					/* Skipp 'has description based on title', which is rtol in CA/Pawtucket */
					if(!isset($list['direction']) || $list['direction'] === 'rtol')
						continue;

					if($is_field_label === true){
						echo "<H6>Reviews: </H6>";
						echo "<p>";
						$is_field_label = false;
					}
					$related_interstitial = new ca_objects_x_entities($list['relation_id']);
					$rv_interstitial_data = $related_interstitial->get('ca_objects_x_entities.marc520', array(
						'returnWithStructure' => true,
						'convertCodesToDisplayText'=>true
					));

					$strArray = array();
					if(isset($rv_interstitial_data[$list['relation_id']])){
						$data = $rv_interstitial_data[$list['relation_id']];
						foreach ($data as $item){
							$str = " - ";
							if(isset($item['marc520a']) && strlen($item['marc520a']) > 0){
								$related_object_label = $item['marc520a'].", ";
								$object_search_url =  basename(__CA_BASE_DIR__)."/index.php/Search/objects/search/\"".$item['marc520a']."\"";
								$str .= "<a href='/$object_search_url' style='text-decoration: none' target='_blank'>$related_object_label</a>";
							}
							if(isset($item['marc520a_freetext']) && strlen($item['marc520a_freetext']) > 0)
								$str .= $item['marc520a_freetext'].", ";
							if(isset($item['marc5209']) && strlen($item['marc5209']) > 0)
								$str .= "<b>In:</b> ".$item['marc5209'];

							if(strlen($str) > strlen(" - "))
								$strArray[] = $str."<br>";
						}
					}
					$rv_entity_id = $list['entity_id'];
					$rv_entity_label = $list['label'];
					echo "<a href='/$base_detail_url/$rv_entity_id' style='text-decoration: none' target='_blank'>$rv_entity_label</a>";
					$entity_info = new ca_entities($rv_entity_id);
					if(isset($entity_info)){
						$ent_alt_label = $entity_info->get("ca_entities.nonpreferred_labels");
						if(isset($ent_alt_label))
							echo " ($ent_alt_label)";
					}
					if(sizeof($strArray) > 0){
						echo "<br>".implode($strArray);
					}
					if($counter > sizeof($rvlist))
						echo "</p>";
				}
				?>
			</div>			
			
            <!--Link Translations-->
            <div class="detail_field">
                <?php
                $base_search_url =  basename(__CA_BASE_DIR__)."/index.php/Detail/objects";
                $linktrans_types_list = array("r78505","r78500","r78501","r78502","r78503","r78508","r78511","r78512","r78510","r78513","r78506","r78507","r78509","r78516","r78504","r78514","r78515");
                $linktranslist = $t_object->getRelatedItems("ca_objects", array(
                    'returnAsArray' => true,
                    'restrictToRelationshipTypes' => $linktrans_types_list
                ));
                $counter = 1;
                $is_field_label = true;
                foreach ($linktranslist as $list){
                    $counter++;
                    if(isset($related_interstitial))
                        unset($related_interstitial);

                    $related_interstitial = new ca_objects_x_objects($list['relation_id']);
                    $linktrans_interstitial_data = $related_interstitial->get('ca_objects_x_objects.link_translation', array(
                        'returnWithStructure' => true,
                        'convertCodesToDisplayText'=>true
                    ));

                    $strArray = array();
                    if(isset($linktrans_interstitial_data[$list['relation_id']])){
                        $data = $linktrans_interstitial_data[$list['relation_id']];
                        foreach ($data as $item){
                            $str = "";
                            $str .= "<b>".$list['relationship_typename']. "</b>: " ;

                            $link_field = "";
                            if($list['direction'] === 'rtol')
                                $link_field = 'link_translation_llrm';
                            elseif($list['direction'] === 'ltor')
                                $link_field = 'link_translation_llrn';

                            if(isset($item[$link_field]) && strlen($item[$link_field]) > 0){
                                $related_object_label = $item[$link_field];
                                $link_object_id = $list['object_id'];
                                $str .= "<a href='/$base_search_url/$link_object_id' style='text-decoration: none' target='_blank'>$related_object_label</a> ";
                            }

                            if(strlen($str) > strlen(""))
                                $strArray[] = $str;
                        }
                    }
                    if(sizeof($strArray) > 0){
                        if($is_field_label === true){
                            echo "<H6>Translation: </H6>";
                            echo "<p>";
                            $is_field_label = false;
                        }
                        echo implode($strArray);
                        echo "<br>";
                    }
                    if($counter > sizeof($linktranslist))
                        echo "</p>";
                }
                ?>
            </div>
			
            <div class="detail_field">{{{<ifcount code="ca_objects.marc530a"  min = "1"><H6>Notes on text History: </H6></ifcount>}}}
                <p>{{{<unit delimiter="<br>">^ca_objects.marc530a</unit>}}}</p>
            </div>

            <div class="detail_field">{{{<ifcount code="ca_objects.marc500a"  min = "1"><H6>General Note: </H6></ifcount>}}}
                <p>{{{<unit delimiter="<br>">^ca_objects.marc500a</unit>}}}</p>
            </div>			
			
            <div class="detail_field">{{{<ifdef code="ca_objects.marc690"><H6>Category: </H6></ifdef>}}}
                <p>
                <?php
                    $base_search_url =  basename(__CA_BASE_DIR__)."/index.php/Search/objects?search=ca_objects.marc690";
                    $categories = $t_object->get("ca_objects.marc690", array('returnAsArray' => true, 'convertCodesToDisplayText'=>true));
                    foreach ($categories as $cat)
                        echo "<a href='/$base_search_url : \"$cat\"' style='text-decoration: none'>$cat</a> <br>";
                ?>
                </p>
            </div>

            <!--Link Others-->
            <div class="detail_field">
                <?php
                $base_search_url =  basename(__CA_BASE_DIR__)."/index.php/Detail/objects";
                $linkother_types_list = array("r77300","r77301","r77302","r77501","r77500","r77501");
                $linkotherlist = $t_object->getRelatedItems("ca_objects", array(
                    'returnAsArray' => true,
                    'restrictToRelationshipTypes' => $linkother_types_list
                ));
                $counter = 1;
                $is_field_label = true;
                foreach ($linkotherlist as $list){
                    $counter++;
                    if(isset($related_interstitial))
                        unset($related_interstitial);


                    $related_interstitial = new ca_objects_x_objects($list['relation_id']);
                    $linkother_interstitial_data = $related_interstitial->get('ca_objects_x_objects.link_part_of', array(
                        'returnWithStructure' => true,
                        'convertCodesToDisplayText'=>true
                    ));

                    $strArray = array();
                    if(isset($linkother_interstitial_data[$list['relation_id']])){
                        $data = $linkother_interstitial_data[$list['relation_id']];
                        foreach ($data as $item){
                            $str = "";
                            $str .= "<b>".$list['relationship_typename']. "</b>: " ;

                            $link_field = "";
                            if($list['direction'] === 'rtol')
                                $link_field = 'link_partOf_llrn';
                            elseif($list['direction'] === 'ltor')
                                $link_field = 'link_partOf_llrm';

                            if(isset($item[$link_field]) && strlen($item[$link_field]) > 0){
                                $related_object_label = $item[$link_field];
                                $link_object_id = $list['object_id'];
                                $str .= "<a href='/$base_search_url/$link_object_id' style='text-decoration: none' target='_blank'>$related_object_label</a> ";
                            }

                            if(strlen($str) > strlen(""))
                                $strArray[] = $str;
                        }
                    }
                    if(sizeof($strArray) > 0){
                        if($is_field_label === true){
                            echo "<H6>Link Other: </H6>";
                            echo "<p>";
                            $is_field_label = false;
                        }
                        echo implode($strArray);
                        echo "<br>";
                    }
                    if($counter > sizeof($linkotherlist))
                        echo "</p>";
                }
                ?>
            </div>

            <div class="detail_field">
                {{{<ifcount code="ca_objects.marc856" min="1"><H6>URL-link: </H6></ifcount>}}}
                <p>{{{<unit delimiter="<br>">
                        <ifdef code="ca_objects.marc856.marc856u,ca_objects.marc856.marc856y"><a href="^ca_objects.marc856.marc856u" target="_blank">^ca_objects.marc856.marc856y</a></ifdef>

                        <ifdef code="ca_objects.marc856.marc856z">^ca_objects.marc856.marc856z</ifdef>
                    </unit>}}}</p>
            </div>

            <div class="detail_field">{{{<ifdef code="ca_objects.marc020a"><H6>ISBN: </H6></ifdef>}}}
                <p>{{{<unit delimiter="<br>">^ca_objects.marc020a</unit>}}}</p>
            </div>

            <div class="detail_field">{{{<ifdef code="ca_objects.marc022a"><H6>ISSN: </H6></ifdef>}}}
                <p>{{{<unit delimiter=";">^ca_objects.marc022a</unit>}}}</p>
            </div>
			
            <div class="detail_field">{{{<ifdef code="ca_objects.marc655a"><H6>Document Type: </H6>^ca_objects.marc655a</ifdef>}}}</div>

            <div class="detail_field">{{{<ifdef code="ca_objects.marc900a"><H6>Source Type: </H6>^ca_objects.marc900a</ifdef>}}}</div>

				<hr></hr>
					<div class="row">
						<div class="col-sm-6">
							<?php
							# Comment and Share Tools
							if ($vn_comments_enabled || $vn_share_enabled) {

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
					</div><!-- end row -->
			</div><!-- end col -->
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
