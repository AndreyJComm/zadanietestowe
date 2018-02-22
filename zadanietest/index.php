<?php
require_once 'engine/bootstrap.php';

use Controller\regController;

$reg_controller = new regController($di);

$scal = $reg_controller->getScalImg();
$logger = $reg_controller->getLogger();


if(isset($_POST["submit"])) {

    $valid = $scal->validImg($_FILES["fileToUpload"]);

    if($valid['valid']){
        $scal->Scal($_FILES["fileToUpload"], $_POST['height'], $_POST['width'], $logger );
    } else {
        echo $valid['msg'];
    }
}
?>
<html>
<head>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
            <div class="form-group row">
                <form action="<?=$_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data">

                    Select image to upload:<br>
                    <input class="form-control" type="file" name="fileToUpload" id="fileToUpload">
                    <input class="form-control" type="number" name="height" placeholder="height"><br>
                    <input class="form-control" type="number" name="width" placeholder="width"><br>
                    <input class="btn btn-success" type="submit" value="Upload Image" name="submit">
                </form>
            </div>
        </div>
    </div>
</div>

<?php
if(isset($_POST["submit"])) {
    $src = 'uploads/'.$_FILES["fileToUpload"]["name"];
?>
    <img src="<?php echo $src ?>">
<?php } ?>

</body>
</html>