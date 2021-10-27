<?php  

require_once './Controllers/RegisterController.php';
?>
 <!DOCTYPE html>
<html lang="en">
<?php include_once 'header.php' ?>
<body>
<div class="container">

<form action="" method="GET">  
            <div  class="input-group input-group-lg">
                <input name="search" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" placeholder="searach" >
                <button class="btn btn-primary"  type="submit">searach</button>
            </div>
 </form>


<table class="table">
        <thead>
            <tr>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col">Title</th>
            <th scope="col">Price</th>
            <th scope="col">Date</th>
            </tr>
        </thead>
        <tbody>
    

    <?php foreach($this->data as $i=>$product):?>
        <tr>
              <th scope="row"> <?php $i+1 ?> </th>
              <td> <img class='indexImage' src="<?php echo $product['image'] ?>" /> </td>
              <td> <?php echo $product['title'] ?> </td>
              <td> <?php echo $product['price'] ?> </td>
              <td> <?php echo $product['create_date'] ?> </td>
            <?php if($_SESSION['login']==true) :  ?>
              <td>
              <a href="/products/update?id=<?php echo $product["id"] ?>" type="button" class="btn btn-primary">Edit</a>
              <form style="display: inline-block" method='POST' action="/products/delete">
                <input type="hidden" name='id' value='<?php echo $product["id"] ?>' >
                <button type="submit" class="btn btn-danger">Delete</button>  
              </form>
              <a href="/products/show?id=<?php echo $product["id"] ?>" type="button" class="btn btn-primary">Show</a>

          </td>
          <?php endif; ?>
          </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<p>
    <?php if($_SESSION['login']==true) :  ?>
      <a  href="/products/create" type="button" class="btn btn-success">Create</a>
      <a  href="/logout" type="button" class="btn btn-dark">Logout</a>

    <?php  endif; ?>
    <a  href="/register" type="button" class="btn btn-dark">Register</a>
    <a  href="/login" type="button" class="btn btn-dark">Login</a>



  </p>
</div>

</body>
</html>