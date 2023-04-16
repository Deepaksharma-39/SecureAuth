<html>
    <body>
        <h2>my first PHP webpage</h2>
       
        <form action="<?php $_PHP_Self ?>" method="POST">
    Name: <input type="text" name="name" />
    Age: <input type="text" name="age"/>
    <input type="submit" />
    
    </form>
            
    </body>
</html>

<?php 
            if(isset($_POST["name"]) || isset($_POST["age"])){
                if(preg_match("/[^A-za-z'-]/",$_POST["name"])){
                    die("invalid name, Name should be a alphabet");
                }
                echo "Hello". $_POST['name'] ."<br/>";
                echo "your age is " . $_POST['age'] . "<br/>";

                exit();
            }
            ?>