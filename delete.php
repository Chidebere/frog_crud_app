<?php
if(isset($_POST["id"])) {
    include_once 'classes/FrogController.php';
    $frogcontroller = new FrogController();
    $result = $frogcontroller->delete($_POST["id"]);
    print_r(json_encode("Records deleted successfully"));
}
?>