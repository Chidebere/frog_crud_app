<?php
    include_once 'classes/FrogController.php';
    $frogcontroller = new FrogController();
    switch($_POST["type"]) {
    
        case "single":
            
            if(isset($_POST["id"])) {
                $result = $frogcontroller->readSingle($_POST["id"]);
                if(!empty($result)) {
                    $responseArray["specie_name"] = $result[0]["specie_name"];
                    $responseArray["gender"] = $result[0]["gender"];
                    $responseArray["color"] = $result[0]["color"];
                    $responseArray["weight"] = $result[0]["weight"];
                    echo json_encode($responseArray);
                }
            }
            break;
        case "all":
            $result = $frogcontroller->readData();
            require_once "list.php";
            break;
            
        default:
            break;
    }

?>