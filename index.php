<?php
include_once 'classes/FrogController.php';
$frogcontroller = new FrogController();
$result = $frogcontroller->readData();
?>

<?php
if (isset($_POST["add"])) {
    include_once 'classes/FrogController.php';
    $frogcontroller = new FrogController();
    $result = $frogcontroller->add($_POST);
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Frog management system</title>
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
	<script src="assets/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="assets/css/styles.css">
    <script src="assets/js/customEvent.js"></script>




    
</head>
<body>
<div class="container">
	<div style="height:80px;"></div>
	<div class="well" style="margin-left:auto; margin-right:auto; padding:auto; width:100%;">
		<span style="font-size:25px; color:blue"><strong>FROG MANAGER</strong></span>	
		<span class="pull-right">

        <a href="#" style="cursor:pointer;" class="btn btn-primary btn-lg bn-home">
        <span class="glyphicon glyphicon-plus"></span> Add New Record</a></span>

		<div style="height:15px;"></div>
		<div id="table"></div>
		<div id="alert" class="alert alert-success" style="display:none;">
			<center><span id="alerttext"></span></center>
		</div>
        
        <div class="row" id="container">
        <?php require_once "list.php" ?>
        </div>


	</div>

</div>



<!--Edit Modal -->
<div class="modal fade" id="edit-modal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <span style="font-size:1.5em;">Edit Record</span>
                    <button type="button" class="close"
                        data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="frmEdit">
                        <div class="form-group">
                            <div class="row">
                                <label>Specie Name *</label> <input type="text"
                                    name="specie_name" id="specie_name"
                                    class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <label>Gender *</label>
                            <select name="gender" id="gender" class="form-control" required>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <label>Color *</label> 
                                <select name="color" id="color" class="form-control" required>
                                <option value="Green">Green</option>
                                <option value="Black">Black</option>
                                <option value="Gray">Gray</option>
                                <option value="Blue">Blue</option>
                                <option value="Yellow">Yellow</option>
                                <option value="White">White</option>
                            </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <label>Weight</label> <input
                                    type="text" name="weight"
                                    id="weight"
                                    class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <input type="hidden" name="id"
                                    id="id" class="form-control"
                                    hidden="true">
                            </div>
                        </div>


                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                        data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary"
                        id="update">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal ends here -->




<!--Home Modal -->
<div class="modal fade" id="home-modal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
               <span style="font-size:1.5em;">Add New Record</span>
                    <button type="button" class="close"
                        data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form method="POST">
                <div class="form-group">
                    <div class="row">
                        <label>Specie Name *</label> <input type="text"
                            name="specie_name" id="specie_name" class="form-control"
                            required>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label>Gender *</label>
                            <select name="gender" id="gender" class="form-control" required>
                            <option selected value="">---Select---</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label>Color *</label> 
                        <select name="color" id="color" class="form-control" required>
                                <option selected value="">---Select---</option>
                                <option value="Green">Green</option>
                                <option value="Black">Black</option>
                                <option value="Gray">Gray</option>
                                <option value="Blue">Blue</option>
                                <option value="Yellow">Yellow</option>
                                <option value="White">White</option>
                            </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label>Weight</label> <input type="text"
                            name="weight" id="weight"
                            class="form-control">
                    </div>
                </div>


                <div class="form-group">
                    <div class="row">
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                        data-dismiss="modal">Close</button>
                        <button class="btn btn-primary" name="add">Submit</button>
                        </div>
                    </div>
                </div>

            </form>
                </div>
                
            </div>
        </div>
    </div>
    <!-- Modal ends here -->


    <!-- Modal for message-->
    <div class="modal fade" id="messageModal" tabindex="-1"
        role="dialog" data-backdrop="static"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Message</h5>
                    <button type="button" class="close"
                        data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h4 class="text-center" id="msg"></h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                        data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal ends here -->


</body>
</html>