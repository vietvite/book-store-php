<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
<body>
    <form method="post" action="" enctype="multipart/form-data">
        <input type="file" name="avatar"/>
        <input type="submit" name="uploadclick" value="Upload"/>
    </form>
    <?php // Xử Lý Upload
  
    // Nếu người dùng click Upload
    if (isset($_POST['uploadclick']))
    {
        // Nếu người dùng có chọn file để upload
        if (isset($_FILES['avatar']))
        {
            // Nếu file upload không bị lỗi,
            // Tức là thuộc tính error > 0
            if ($_FILES['avatar']['error'] > 0)
            {
                echo 'File Upload Bị Lỗi';
            }
            else{
                // Upload file
                $fileClient = $_FILES['avatar']['tmp_name'];
                $fileServer = './upload/'.$_FILES['avatar']['name'];
                $isOk = move_uploaded_file($fileClient, $fileServer);
                var_dump($fileClient . ' --- ' . $fileServer);
                echo 'File Uploaded ' . $isOk . ' =))';
            }
        }
        else{
            echo 'Bạn chưa chọn file upload';
        }
    }
?>
</body>
</html>