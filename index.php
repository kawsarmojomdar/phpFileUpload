<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Uploading</title>
    <style>
        *{
            background: #661152;
            color: #fff;
            box-sizing: border-box;
        }
        .conatiner{
            width: 50%;
            margin: auto;
            padding: 20px;
            background: #241726;
        }
        .submit{
            padding: 10px;
            background-color: #3483eb;
            border-radius: 5px;
            border: none;
            margin: 20px auto;
            display: block;
            color: #fff;

        }
        .submit:hover{
            background-color: lightgreen;
            color: #4a4147;
        }
        h2, h4{
            text-align: center;
            background-color: #7ba0e0;
            color: #fff;
        }
        img{
            width: 50%;
            margin: 10px auto;
            display: block;
        }
    </style>
</head>
<body>
    <div class="conatiner">
        <h2>Single Photo Uploading</h2>
        
    <?php
        if (isset($_FILES['photo'])) {
    $allowed = ['image/png', 'image/jpg', 'image/jpeg'];

            if (!in_array($_FILES['photo']['type'], $allowed)) {
                echo "only jpg allowed";
                exit;
            }
            if ($_FILES['photo']['size'] > 1024*1024) {
            echo "only 1mb";
            exit;
            }
            // print_r($_FILES['photo']['tmp_name']);
            move_uploaded_file($_FILES['photo']['tmp_name'], 'uploads/'. $_FILES['photo']['name']);

            $file_name = $_FILES['photo']['name'];
        $uploadsDirectory = 'uploads/';
         $file_path = $uploadsDirectory . $file_name;
?>
<img src="<?php echo $file_path ?>"  ></iframe>
<?php
        }
    ?>

        <form 
            action="#" 
            method="post" 
            enctype="multipart/form-data">
            <div>
            <input type="file" name="photo">
            </div>
            <div >
            <input 
            class="submit"
            type="submit" 
            name="submit" 
            id="submit" 
            value="submit">
            </div>
        </form>

        <h2>Multiple Photo Uploading</h2>
        <?php
if (isset($_FILES['picture'])) {

    foreach ($_FILES['picture']['tmp_name'] as $key => $tmp_name) {
        $mfile_name = $_FILES['picture']['name'][$key];
        $mfile_type = $_FILES['picture']['type'][$key];
        $mfile_path = $_FILES['picture']['full_path'][$key];
        $mfile_tmp = $_FILES['picture']['tmp_name'][$key];
        $msize = $_FILES['picture']['size'][$key];

    move_uploaded_file($mfile_tmp, "uploads/" . $mfile_name);

    $muploadsDirectory = 'uploads/';
    $mfile_path = $muploadsDirectory . $mfile_name;
?>
<img  src="<?php echo  $mfile_path ?>" alt="img">
<?php
        

    }
}
?>

        <form 
            action="#" 
            method="post" 
            enctype="multipart/form-data">
            <div>
            <input type="file" name="picture[]" multiple>
            </div>
            
            <div >
            <input 
            class="submit"
            type="submit" 
            name="submit" 
            id="submit" 
            value="submit">
            </div>
        </form>
        <h4>Created by Kawsar Ahmad</h4>
    </div>


    
    
</body>
</html>