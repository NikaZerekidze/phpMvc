<?php 
$controller = new Controller();


?>
<?php if(!empty($this->data['errors'])): ?>
        <div class="alert alert-danger">
            <?php foreach ($this->data['errors'] as $error): ?>
                <div><?php echo $error ?></div>
            <?php endforeach ;?>
            
        </div>
<?php endif; ?>

<div class="container" style="padding-top: 50px;">
<form action="<?php  htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" enctype="multipart/form-data">

                
    <div class="mb-3">
        <input type="text"   name="title" class="form-control" value="<?php echo $this->data['product'][0]['title'] ?? null ?>">
    </div>

    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Product description</label>
        <textarea type="text"  name="description" class="form-control"  ><?php echo $this->data['product'][0]['description']  ?? null ?></textarea>
    </div>

    <div class="mb-3 ">
        <label for="exampleInputEmail1" class="form-label">Product price</label>
        <input type="number"  step='0.01' name="price" class="form-control" value="<?php echo $this->data['product'][0]['price'] ?? null ?>">
    </div>

    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Product image</label>
        <input type="file"  name="image" class="form-control" value="<?php echo  $this->data['product'][0]['image']?>" >
    </div>

    <button type="submit" class="btn btn-primary" >Submit</button>
    <a href="/" class="btn btn-primary" >Go to products</a>

</form>
</div>