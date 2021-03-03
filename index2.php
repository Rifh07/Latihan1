<?php 
    // $a = 20;
    // $b = 10;
    // $d = 2;
    // $c = ($a+$b)/$d;
    // echo "variable $a tambah $b dibagi variable $d hasilnya $c";

    // for($i = 0; $i < 10; $i++){
    //     echo "<h2>Ini perulangan ke-$i</h2>";
    // }

    // $ulangi = 0;
    // while($ulangi < 10){
    //     echo "<p>Ini adalah perulangan ke-$ulangi</p>";
    //     $ulangi++;
    // }

    $numbers = array( 1, 2, 3, 4, 5);
    // echo "array 4 = ".$numbers[4];
    // foreach( $numbers as $value ) {
    //     echo "Value is $value <br />";
    //  }

    // $value = $numbers.length;
    // for($i = 0; $i < count($numbers); $i++){
    //     echo "Ini perulangan ke-".$numbers[$i]."<br>";
    // }

    $i = 0;
    while ($i < count($numbers)) {
        echo "Ini perulangan ke-".$numbers[$i]."<br>";
        $i++;
    }
?>