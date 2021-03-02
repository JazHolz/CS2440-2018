<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
        if (isset($_POST['Name']))
            $name = $_POST['Name'];
        if (isset ($_POST['EMail']))
            $email = $_POST['EMail'];
        if (isset ($_POST['Zip']))
            $zip = $_POST['Zip'];
        if (isset ($_POST['Country']))
            $country = $_POST['Country'];

        
        echo "<div><h1>An Example Form</h1></div>";
                
              
            echo "Form data sucessfully validated:<br>".$name."<br>".$email."<br>".$zip."<br>".$country;
            
        ?>
    </body>
</html>
