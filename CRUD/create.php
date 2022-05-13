<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Hozzáadás</title>
    </head>
    <body>
        <div>
        <form method="get" id="editform">
                <div class="form-group">

                    <input type="text" class="form-control" 
                           id="service" name="service"  
                           placeholder="Szolgáltatás"
                           size="100">
                </div>
                <div class="form-group">

                    <input type="number" class="form-control"
                           placeholder="Ár" 
                           id="price" name="price" >

                </div>
                <div class="form_group">
                    <button type="submit" id="submit" name="submit" 
                            class="btn btn-primary">Szerkeszt</button>
                </div>
            </form>
        </div>
        <?php
        if (isset($_GET['submit'])){
            $price=$_GET['price'];
            $service=$_GET['service'];
            require_once '../classes/Crud_class.php';
            $add=new Crud_class();
            $add->add($price, $service);
            header('location:../index.php');
        }
        ?>
    </body>
</html>
