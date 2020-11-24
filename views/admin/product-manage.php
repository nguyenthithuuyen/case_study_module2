<?php
include_once 'views/front-end/core/navbar.php'
?>
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

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/product-page.css">

</head>
<style>
    a{
        text-decoration: none;
    }
</style>
<body>
<button style="width: 200px; padding: 10px; color: white; margin: 20px" type="button" class="btn btn-success"><a style="color: white" href="index.php?page=add-product">ADD NEW PRODUCT</a></button>

<table border="1px" class="table">
    <thead class="thead-dark">
    <tr>

        <th>Id</th>
        <th>Name</th>
        <th>Image</th>
        <th>Price</th>
        <th>Price_old</th>
        <th colspan="2">Action</th>
    </tr>
    </thead>

    <?php foreach ($products as $key => $product): ?>
        <tr>
            <td><?php echo $product['id'] ?></td>
            <td><?php echo $product['name'] ?></td>
            <td><img style="width: 10%" src=<?php echo $product['image'] ?>  ></td>
            <td><?php echo $product['price'] ?></td>
            <td><?php echo $product['price_old'] ?></td>
            <td><a href="index.php?page=update-product&id-product=<?php echo $product['id'] ?>">Update</a>
            <td><a onclick="return confirm('DO YOU REALLY WANT TO DELETE???') "
                   href="index.php?page=delete-product&id-product=<?php echo $product['id'] ?>">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>

</table>
</body>
</html>

