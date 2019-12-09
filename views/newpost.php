<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../public/vendor/bootstrap-4.3.1/css/bootstrap.min.css">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <script src="http://cdn.ckeditor.com/4.6.2/standard-all/ckeditor.js"></script>
    <script src="/book-store-php/upload.php"></script>
    <link rel="stylesheet" href="../public/vendor/fontawesome-5.11.2/css/all.css" />
</head>

<?php
  include_once('../models/category.php');
  $categories = Category::getAllCategories();
//   var_dump($categories);
?>

<body>
    <div class="container">
        <div class="sticky-top">
        <?php
            include_once('components/header.php');
        ?>
        </div>
        <div class="mx-3 mt-5">
            <!-- <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link text-dark active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Book manager</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Edit</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Contact</a>
                </li>
            </ul> -->
            
            <!-- <div class="tab-content" id="myTabContent"> -->

                <!-- <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <h2 class="mt-5 font-weight-light">List</h2>
                    <hr>
                    <div>

                    </div>
                </div> -->

                <!-- <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab"> -->
                    <h2 class="mt-5 font-weight-light">Thêm sách</h2>
                    <hr>
                    <form class="my-3" action="/book-store-php/controllers/newpost.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="bookName">Tên sách</label>
                            <input type="text" class="form-control" name="bookName" id="bookName" placeholder="Tên sách">
                        </div>
                        <div class="form-group">
                            <label for="author">Tác giả</label>
                            <input type="text" class="form-control" name="author" id="author" placeholder="Tác giả">
                        </div>
                        <div class="form-group">
                            <label for="coverPrice">Giá bìa</label>
                            <input type="number" class="form-control" name="coverPrice" id="coverPrice" placeholder="Giá bìa">
                        </div>
                        <div class="form-group">
                            <label for="discount">Mức giảm giá (%)</label>
                            <input type="number" class="form-control" name="discount" id="discount" placeholder="Mức giảm giá">
                        </div>
                        <div class="form-group">
                            <label for="inventory">Số lượng kho</label>
                            <input type="number" class="form-control" name="inventory" id="inventory" placeholder="Số lượng kho">
                        </div>
                        <div class="form-group">
                            <label for="categoryId">Thể loại</label>
                            <select class="form-control" name="categoryId" id="categoryId">
                            <?php foreach ($categories as $key => $value) { ?>
                                <option value="<?php echo $value->categoryId ?>"><?php echo $value->categoryName ?></option>
                            <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="description">Mô tả</label>
                            <textarea name="description" id="editor">
                                This is some sample content.
                            </textarea>
                        </div>
                        <div class="form-group">
                            <label for="uploadFile">Book image</label>
                            <input type="file" name="uploadFile" class="form-control-file" id="uploadFile">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                <!-- </div> -->
                <!-- <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">Contact</div> -->
            <!-- </div> -->

            
        </div>
    </div>

    <script>
    CKEDITOR.replace( 'editor', {
        height: 300,
        filebrowserUploadUrl: "/book-store-php/upload.php"
    });
    </script>
</body>

</html>