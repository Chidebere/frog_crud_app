<?php
include_once 'Database.php';

class FrogController
{

    /* Fetch All */
    public function readData()
    {
        try {
            
            $dao = new Database();
            
            $conn = $dao->openConnection();
            
            $sql = "SELECT id,specie_name,gender, color, weight FROM `tb_member` ORDER BY id DESC";
            
            $resource = $conn->query($sql);
            
            $result = $resource->fetchAll(PDO::FETCH_ASSOC);
            
            $dao->closeConnection();
        } catch (PDOException $e) {
            
            echo "There is some problem in connection: " . $e->getMessage();
        }
        if (! empty($result)) {
            return $result;
        }
    }

    /* Fetch Single Record by Id */
    public function readSingle($id)
    {
        try {
            
            $dao = new Database();
            
            $conn = $dao->openConnection();
            
            $sql = "SELECT id,specie_name,gender, color, weight FROM `tb_member` WHERE id=" . $id . " ORDER BY id DESC";
            
            $resource = $conn->query($sql);
            
            $result = $resource->fetchAll(PDO::FETCH_ASSOC);
            
            $dao->closeConnection();
        } catch (PDOException $e) {
            
            echo "There is some problem in connection: " . $e->getMessage();
        }
        if (! empty($result)) {
            return $result;
        }
    }

    /* Add New Record */
    public function add($formArray)
    {
        $specie_name = $_POST['specie_name'];
        $gender = $_POST['gender'];
        $color = $_POST['color'];
        $weight = $_POST['weight'];
        
        $dao = new Database();
        
        $conn = $dao->openConnection();
        
        $sql = "INSERT INTO `tb_member`(`specie_name`, `gender`, `color`, `weight`) VALUES ('" . $specie_name . "','" . $gender . "','" . $color . "','" . $weight . "')";
        $conn->query($sql);
        $dao->closeConnection();
    }

    /* Edit a Record */
    public function edit($formArray)
    {
        $id = $_POST['id'];
        $specie_name = $_POST['specie_name'];
        $gender = $_POST['gender'];
        $color = $_POST['color'];
        $weight = $_POST['weight'];
        
        $dao = new Database();
        
        $conn = $dao->openConnection();
        
        $sql = "UPDATE tb_member SET specie_name = '" . $specie_name . "' , gender='" . $gender . "', color='" . $color . "', weight='" . $weight . "' WHERE id=" . $id;
        
        $conn->query($sql);
        $dao->closeConnection();
    }

    /* Delete a Record */
    public function delete($id)
    {
        $dao = new Database();
        
        $conn = $dao->openConnection();
        
        $sql = "DELETE FROM `tb_member` where id='$id'";
        
        $conn->query($sql);
        $dao->closeConnection();
    }
}

?>