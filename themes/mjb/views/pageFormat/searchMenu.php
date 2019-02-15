<?php
/* ----------------------------------------------------------------------
 * views/pageFormat/browseMenu.php : 
 * ----------------------------------------------------------------------
 * CollectiveAccess
 * Open-source collections management software
 * ----------------------------------------------------------------------
 *
 * Software by Whirl-i-Gig (http://www.whirl-i-gig.com)
 * Copyright 2014-2015 Whirl-i-Gig
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

    $o_search_config = caGetSearchConfig();

    $va_search_types = $o_search_config->getAssoc('advancedSearchTypes');

    if (isset($va_search_types) && sizeof($va_search_types) > 1) {

        ?>
        <li class="dropdown<?php print ($this->request->getController() == "Search") ? ' active' : ''; ?>" style="position:relative;"><a href="#" class="dropdown-toggle mainhead top" data-toggle="dropdown"><?php print _t("Search"); ?></a>
            <ul class="dropdown-menu">
                <?php
                foreach($va_search_types as $type => $value){
                    print "<li>".caNavLink($this->request, caUcFirstUTF8Safe($value['displayName']), '', '', 'Search', 'advanced/'.$type, '')."</li>";
                }
                ?>
            </ul>
        </li>
        <?php
    }
    else{
        ?>
        <li <?php print (($this->request->getController() == "Search") && ($this->request->getAction() == "advanced")) ? 'class="active"' : ''; ?>><?php print caNavLink($this->request, _t("Search"), "", "", "Search", "advanced/objects"); ?></li>
        <?php
    }


	


?>

