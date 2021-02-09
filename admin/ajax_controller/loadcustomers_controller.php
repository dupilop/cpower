<?php
require "../../db/connect.php";  //include the DB config file

echo '<label for="validationCustom3">Customer Name*</label>
<select class="form-control select2" id="scid" name="s_c_id">
    <option>Select one</option>
    <optgroup label="Customers">';
$abc = $pdo->prepare("SELECT * FROM customers");
$abc->execute();
$aa = $abc->fetchAll();
foreach ($aa as $aaa) {
    echo '<option value="' . $aaa['c_id'] . '">' . $aaa['c_name'] . '</option>';
}



echo '</optgroup>
</select>';
?>
<script>
    $('.select2').select2({
        theme: 'bootstrap4',
    });
</script>