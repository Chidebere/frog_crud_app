<?php
if(isset($_POST["id"])) {
    include_once 'classes/FrogController.php';
    $frogcontroller = new FrogController();
    $result = $frogcontroller->edit($_POST);
    print_r(json_encode("Records edited successfully"));
}
?>