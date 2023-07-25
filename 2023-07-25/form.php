<!DOCTYPE html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        </head>
    <body>
        <h1>Rent a bike</h1>
        <form action = "bike_formular.php" method = "post"> 

        <p>CUSTOMER:</p>
        <label for = "customerID"> ID:</label><br>
        <input type = "text" name = "customerID"><br><br>

        <label for = "first_name"> first name:</label><br>
        <input type = "text" name = "first_name"><br><br>

        <label for = "last_name"> last name:</label><br>
        <input type = "text" name = "last_name"><br><br>

        <label for = "address"> address:</label><br>
        <input type = "text" name = "address"><br><br>

        <label for = "phone"> phone:</label><br>
        <input type = "text" name = "phone"><br><br>

        <label for = "email"> E-Mail:</label><br>
        <input type = "text" name = "email"><br><br>

        <input type="reset">
        <input type="submit"><br><br>

            <?php
                $host = "localhost"
                $user = "root"
                $password = "blabla.bumbum"
                $database = "bikerental"

                // Create Connection
                $connection = @new mysqli("localhost", "root", "blabla.bumbum", "bikerental");
                // Check Connection
                    if($connection->connect_error)
                    exit("connection error");
                
                // Get data from form
                $firstname = $_POST['first_name'];
                $lastname = $_POST['last_name'];
                $phone = $_POST['phone'];
                $email = $_POST['email'];

                // Prepare & Bind -> customerID autoincrement nachtragen
                $sqlinsert = $connection->prepare("INSERT INTO customer (CustomerID, first_name, last_name, phone, email) VALUES (?, ?, ?, ?, ?)");
                $sqlinsert->bind_param("issss", $customerid, $firstname, $lastname, $phone, $email);
                // $sql =  "INSERT INTO customer (customerID, first_name, last_name, phone, email) VALUES(?, ?, ?, ?, ?)";

                //"SELECT * FROM customer";
                if($result = $connection-> query($sqlinsert))

                /* {
                    if($result->num_rows == 0)
                    echo "no result";

                    while ($dsatz = $result -> fetch_assoc())
                    echo $dsatz["customerID"] . ","
                    . $dsatz["first_name"] . ","
                    . $dsatz["last_name"] . ","
                    . $dsatz["address"] . ","
                    . $dsatz["phone"] . ","
                    . $dsatz["email"] . "<br>";

                    $result -> close();
                }
                */
                
                else
                exit("query error");
                $connection -> close();
            ?>
        </form>
    </body>
</html>