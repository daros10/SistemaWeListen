<?php

if(isset($_POST['submit'])){
$path = "music/"; //file to place within the server
$valid_formats1 = array("mp3", "ogg", "flac"); //list of file extention to be accepted
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){

        $file1 = $_FILES['file1']['name']; //input file name in this code is file1
        $size = $_FILES['file1']['size'];


                $fileInfo=pathinfo($file1);
                $ext=$fileInfo['extension'];

                    if(in_array($ext,$valid_formats1)){
                        $actual_image_name = uniqid().".".$ext;
                        $tmp = $_FILES['file1']['tmp_name'];
                        if(move_uploaded_file($tmp, $path.$actual_image_name)){

                          try {
                            require_once "database.php";
							
                            $name= $_POST["titulo"];
                            $artista = $_POST["autor"];
							$user= $_POST["id2"]; 
							
                            $sql = "INSERT INTO cancion (name, artista, song, user) VALUES ('$name','$artista','music/$actual_image_name', '$user')";
                            $conn->exec($sql);


                            echo '<script language="javascript">alert("Cancion agregada");</script>';


                            $query = "SELECT * FROM cancion";

                            $stmt = $conn->prepare($query);
                            $stmt->execute();

                            $userData = array();

                            while($row=$stmt->fetch(PDO::FETCH_ASSOC)){

                                  $userData['songs'][] = $row;

                            }

                              $json_string = json_encode($userData, JSON_NUMERIC_CHECK);
                              $file = 'js/app.json';
                              file_put_contents($file, $json_string);


                            #echo ($path.$actual_image_name);

                          } catch (\Exception $e) {
                            echo $sql . "<br>" . $e->getMessage();
                          }

                            echo '<script type="text/javascript">window.location="http://localhost/welisten16-02/sistemawelisten/addMusic.php";</";</script>';


                            }
                        else
                            echo '<script language="javascript">alert("Error");</script>';
                            echo '<script type="text/javascript">window.location="http://localhost/welisten16-02/sistemawelisten/addMusic.php";</";</script>';

                    }else{
                        echo '<script language="javascript">alert("Archivo no soportado");</script>';
                        echo '<script type="text/javascript">window.location="http://localhost/welisten16-02/sistemawelisten/addMusic.php";</script>';
                    }

    }
}

?>
