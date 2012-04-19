<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
       <!-- <title>MVC - Modelo, Vista, Controlador - Jourmoly</title>
        <script type="text/javascript" src="statico/js/valida.js"></script>
        <link rel="stylesheet" type="text/css" href="statico/css/estilo.css" />-->
    </head>
    <body>
        <h1>Prueba</h1>



        <?php
        /*
         * 
         * Prueba BaseDeDatos
         */


        require 'core/BaseDeDatos.php';
        $db = new BaseDeDatos();
        $db->connect();


        $result1 = $db->select('widghdfgshers', '*');

        //insert
        $db->insert('wishers', array('null', 'userdump' . date("ms"), 'blablabla'));


        $result2 = $db->select('wishers', '*');

        //update
        $db->update('wishers', array('name' => 'changed!', 'password' => 'changed!'), array('id' => 64));


        $result4 = $db->select('wishers', '*');

        //delete
        $db->delete('wishers', 'name like "userdump%"');


        $result5 = $db->select('wishers', '*');
        ?>

        <?php
        if (!empty($result1)) {
            foreach ($result1 as $row) {
                echo $row['id'] . ' - ';
                echo $row['name'] . ' - ';
                echo $row['password'] . '<br/>';
            }
        }

        echo '*****************************<br/>';
        if (!empty($result2)) {
            foreach ($result2 as $row) {
                echo $row['id'] . ' - ';
                echo $row['name'] . ' - ';
                echo $row['password'] . '<br/>';
            }
        }

        echo '*****************************<br/>';
        if (!empty($result4)) {
            foreach ($result4 as $row) {
                echo $row['id'] . ' - ';
                echo $row['name'] . ' - ';
                echo $row['password'] . '<br/>';
            }
        }

        echo '*****************************<br/>';
        if (!empty($result5)) {
            foreach ($result5 as $row) {
                echo $row['id'] . ' - ';
                echo $row['name'] . ' - ';
                echo $row['password'] . '<br/>';
            }
        }
        ?>
    </body>
</html>

