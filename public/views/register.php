<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<style>

.form
{
    margin-top: 100px;
}

.form-content
{
    padding: 5%;
    border: 1px solid #ced4da;
    margin-bottom: 2%;
}
.form-control{
    border-radius:1.5rem;
}
.btnSubmit
{
    border:none;
    border-radius:1.5rem;
    padding: 1%;
    width: 20%;
    cursor: pointer;
    background: #0062cc;
    color: #fff;
}
</style>

<?php if(!empty($this->data['errors'])): ?>
        <div class="alert alert-danger">
            <?php foreach ($this->data['errors'] as $error): ?>
                <div><?php echo $error ?></div>
            <?php endforeach ;?>
            
        </div>
<?php endif; ?>

<head>
    <title>registration</title>

</head>
<div class="container register-form">
            <div class="form">

                <form class="form-content" method="POST" action="<?php  htmlspecialchars($_SERVER["PHP_SELF"])?>">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input  name='name' type="text" class="form-control" placeholder="Your Name *" value=""/>
                            </div>
                            <div class="form-group">
                                <input  name='email' type="text" class="form-control" placeholder="Your Email *" value=""/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input name='password' type="text" class="form-control" placeholder="Your Password *" value=""/>
                            </div>
                            <div class="form-group">
                                <input name='confPassword' type="text" class="form-control" placeholder="Confirm Password *" value=""/>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btnSubmit">Submit</button>
                    <a type="button" href="/" class='btnSubmit'>Go back to products</a>

                  
                </form>

            </div>
        </div>