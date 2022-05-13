<?php 
if(isset($_GET['id'])){
    
    $id = $_GET['id'];
     $editId[] = explode(';', $id);
    $service = $editId[0][0];
    $price = $editId[0][1];
    
    
    
    
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Szerkesztés</title>
    </head>
    <body>
        <div>
            <form method="post" id="editform">
                <div class="form-group">

                    <input type="text" class="form-control" 
                           id="service" name="service"  
                           placeholder="<?php print($service); ?>"
                           size="100">
                </div>
                <div class="form-group">

                    <input type="number" class="form-control"
                           placeholder=" <?php print($price);?>" 
                           id="price" name="price" >

                </div>
                <div class="form_group">
                    <button type="submit" id="submit" name="submit" 
                            class="btn btn-primary">Szerkeszt</button>
                </div>
            </form>
        </div>
        <?php
       if(isset($_POST['submit'])){
        require_once '../classes/Crud_class.php';
        
        $newprice = $_POST['price'];
        $newservice = $_POST['service'];
        $edit = new Crud_class();
        $edit ->update($price, $service, $newprice, $newservice);
        header('location:../index.php');
       }
       
        ?>
    </body>
</html>
