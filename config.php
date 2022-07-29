
<?php

try {
    $dbb = new PDO('mysql:host=localhost;dbname=CRUD; charset=utf8', 'root' , '');
}
 catch ( Exception $e) 
 {
    die( 'kjkjkjkj' .$e -> getmessage());
}

?>