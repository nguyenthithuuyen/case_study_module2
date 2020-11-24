<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/home-page.css">
</head>
<body>
<form action="" method="post">
    <fieldset>
        <legend>Update Category</legend>
        <div class="form-group">
            <input type="text" placeholder="Id" name="id-category" value="<?php echo $category['id']?>" >
            <input type="text" placeholder="Name" name="category-name" value="<?php echo $category['name']?>">
            <input type="text" placeholder="Image" name="category-image" value="<?php echo $category['image']?>">
            <input type="datetime-local" placeholder="Created at" name="category-created-at" value="<?php echo $category['created_at']?>">
            <input type="datetime-local" placeholder="Update at" name="category-update-at" value="<?php echo $category['update_at']?>">

        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </fieldset>
</form>
</body>
</html>

