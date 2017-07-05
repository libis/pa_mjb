<?php
	MetaTagManager::setWindowTitle($this->request->config->get("app_display_name").": Categories");

    $o_data = new Db();
    $sql_labels = "SELECT lb.name_singular, lb.item_id, it.item_id,it.list_id FROM ca_list_item_labels AS lb INNER JOIN ca_list_items AS it ON it.item_id = lb.item_id WHERE it.list_id=48 AND it.parent_id IS NOT NULL";
    $qr_result = $o_data->query($sql_labels);
    $labels = array();
    while($qr_result->nextRow()) {
        $labels[] = $qr_result->get('name_singular');
    }
    $base_search_url =  basename(__CA_BASE_DIR__)."/index.php/Search/objects?search=ca_objects.marc690";
?>
<H1><?php print _t("Categories"); ?></H1>

<div class="row" style="text-align: justify; text-justify: inter-word;">
    <div class="col-sm-8">
        <div class="" id="parent-fieldname-text-6e25d7c040c2428c8cd2b81223a8a35b">
            <table border="1" cellpadding="0" cellspacing="0">
                <tbody>
                <?php foreach ($labels as $label) {
                    if (strpos($label, ':') === false){
                        echo "<tr style='height: 50px'><td colspan='2'></td></tr>";
                        echo "<tr style='font-weight: bold;'>";
                    }
                    else
                        echo "<tr>";

                            $values = explode(" ", $label, 2);
                            $category_number = rtrim(trim($values[0]),".");
                            echo "<td valign='top' style='white-space: nowrap; padding-right: 150px'> $category_number </td>";
                            if(isset($values[1])){
                                $category_text = trim($values[1]);
                                echo "<td valign='top' style='white-space: nowrap'> <a href='/$base_search_url : \"$category_text\"' style='text-decoration: none'>$category_text</a> </td>";
                            }

                }
                    echo "</tr>";
                 ?>
                </tbody>
            </table>
        </div>
    </div>
</div>