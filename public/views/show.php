
<?php


// require_once '../errors.php';




?>

 
<!DOCTYPE html>
<html lang="en">
<?php include_once 'header.php' ?>

<link rel="stylesheet"  type="text/css"  href="../styles/style.css">




<body>

    <div class="wrapper">

        <div class="info">
        <a href="/" class="btn btn-primary">Go to products</a>

    <div>
            <!-- <img src="<?php echo $this->data['product'] ?>" > -->
        </div>
        <div>
            <h3>Title</h1>
            <p><?php  echo $this->data['showProduct'][0]['title'] ?></p>
        </div> 
        <div>
            <h3>Description</h3>
            <p><?php echo $this->data['showProduct'][0]['description']  ?></p>
        </div>
        <div>
            <h3>Price</h3>
            <p><?php echo $this->data['showProduct'][0]['price']  ?></p>
        </div>
        <div>
            <h3>Create date</h3>
            <p><?php echo $this->data['showProduct'][0]['create_date']  ?></p>
        </div>


    <form method="POST" class="mt-4" action="/products/comment?id=<?php echo  $this->data['showProduct'][0]['id'] ?>">
        <h3>comments</h3>
        <input type="hidden" name="id" value="<?php $this->data['showProduct'][0]['id'] ?>"/> 
        <textarea class="form-control" name="comment" >
            
        </textarea>
        <button class="btn btn-primary">Add Comment</button>
    </form>





    </div>
    </div>

    <div class='comments'>
    <table>

        <?php foreach($this->data['showProduct'] as $i=>$comment):?>

            <tr>
                <th scope="row"> <?php $i+1 ?> </th>
                <td>
                <!-- <?php echo $i ?> -->
                    <?php echo $this->data['showProduct'][$i]['comment']  ?>

                </td>
                <td>
                    <?php echo $this->data['showProduct'][$i]['comment_date']   ?>
                </td>
            </tr>
           
        <?php endforeach; ?>
    </table>
    </div>
  
</body>
</html>


