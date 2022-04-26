<!DOCTYPE html>
<html lang="eng">
    <head>
        <meta charset="8">
        <meta name="viewport" content="width= device-width", initial-scale = 1.0>
        <title>Registration form</title>
    </head>
    <h1>Registration form</h1>
    <body bgcolor="FFFF00">
        <form action="PHP0017server.php" method="POST">
            <label for="user">Name</label><br>
            <input type= "text" name = "name" id = "name" required><br><br>

            <label for="email">Email</label><br>
            <input type= "email" name = "email" id = "email" required><br><br>

            <label for="Phone">Phone no.</label><br>
            <input type= "text" name = "Phone" id = "Phone" required><br><br>

            <label for="bgroup">Blood Group</label><br>
            <input type= "text" name = "bgroup" id = "bgroup" required><br><br>

            <input type = "submit" name = "submit" id  ="submit">
         </form>
    </body>
</html>