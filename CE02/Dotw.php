<html>
    <body>
        <?php 
        
        $d= date("D");
        
        if ($d=="Fri")
        {
            $message = "Have a nice weekend!";
        }
        elseif ($d=="Sun")
        {
            $message = "Have a nice Sunday!";
        }
        else
        {
            $message = "Have a nice day!";
        }
        echo $message;
        
        ?>
        
        <?php
        
        switch ($d) 
        {
            case "Mon":
                echo "Today is Marathon Monday";
                break;
            case "Tue":
                echo "Today is Tipsy Tuesday";
                break;
            case "Wed":
                echo "Today is Wasted Wednesday";
                break;
            case "Thu":
                echo "Today is Thirsty Thursday";
                break;
            case "Fri":
                echo "Today is Freaky Friday";
                break;
            case "Sat":
                echo "Today is Slammed Saturday";
                break;
            case "Sun":
                echo "Today is Sunday Funday";
                break;
            default:
                echo "How I wonder which day is this?";
        }
            ?>
        
        <?php
        
        $a = 0;
        $b = 0;
        
        for($i=0;$i<5;$i ++)
        {
            $a += 10;
            $b += 5;
        }
            echo("At the end of the loop a=$a and b=$b");
            
        $i - 0;
        $num = 50;
        
        while( $i < 10)
        {
            $num--;
            $i++;
        }
            echo ("Loop stopped at i = $i and num = $num");
            
        ?>
    </body>
</html>