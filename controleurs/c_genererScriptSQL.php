<?php

/**
 * Contrôleur de Géneration du Script SQL du projet WifiSIO
 *
 * PHP Version 7
 *
 * @category  SLAM5
 * @package   WifiSIO
 * @author    Dylan "DyRize" LE FLOUR <dylan.leflour25@gmail.com>
 * @author    Tom "Tomu" TARDIVON <tomtardivon@hotmail.fr>
 * @author    Perrine "PeRazk" Rasca <perrine.rasca24@gmail.com>
 * @copyright 2018 TeamSLAM
 */
$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);

switch ($action) {
    case 'afficherGenererScriptSQL':
        include 'vues/v_genererScriptSQL.php';
        break;
    case 'sauvegardeGenererScriptSQL':
        $connection = mysqli_connect('localhost', 'root', '', 'lycbonapmut');
        $tables = array();
        $result = mysqli_query($connection, "SHOW TABLES");
        while ($row = mysqli_fetch_row($result)) {
            $tables[] = $row[0];
        }
        $return = '';
        foreach ($tables as $table) {
            $result = mysqli_query($connection, "SELECT * FROM " . $table);
            $num_fields = mysqli_num_fields($result);

            $return .= 'DROP TABLE ' . $table . ';';
            $row2 = mysqli_fetch_row(mysqli_query($connection, "SHOW CREATE TABLE " . $table));
            $return .= "\n\n" . $row2[1] . ";\n\n";

            for ($i = 0; $i < $num_fields; $i++) {
                while ($row = mysqli_fetch_row($result)) {
                    $return .= "INSERT INTO " . $table . " VALUES(";
                    for ($j = 0; $j < $num_fields; $j++) {
                        $row[$j] = addslashes($row[$j]);
                        if (isset($row[$j])) {
                            $return .= '"' . $row[$j] . '"';
                        } else {
                            $return .= '""';
                        }
                        if ($j < $num_fields - 1) {
                            $return .= ',';
                        }
                    }
                    $return .= ");\n";
                }
            }
            $return .= "\n\n\n";
        }
//save file
        $handle = fopen("backup.sql", "w+");
        fwrite($handle, $return);
        fclose($handle);
        echo "Successfully backed up";
        include 'vues/v_genererScriptSQL.php';
        break;

    case 'restaurationScriptSQL':
        $connection = mysqli_connect('localhost', 'root', '', 'lycbonapmut');
        $filename = 'backup.sql';
        $handle = fopen($filename, "r+");
        $contents = fread($handle, filesize($filename));
        $sql = explode(';', $contents);
        foreach ($sql as $query) {
            $result = mysqli_query($connection, $query);
            if ($result) {
                echo '<tr><td><br></td></tr>';
                echo '<tr><td>' . $query . ' <b>SUCCESS</b></td></tr>';
                echo '<tr><td><br></td></tr>';
            }
        }
        fclose($handle);
        echo 'Successfully imported';

        include 'vues/v_genererScriptSQL.php';
        break;
}