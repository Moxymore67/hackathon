<?php

?>
<body>

<button onclick='getCountries();' type='button' class='btn btn-primary'>Primary</button>
<?php
if ((!empty($_POST['countries'])) && !empty(($_POST['categories'])))
{
    $decodeCountries = json_decode($_POST['countries'], 1);
    $decodeCat = json_decode($_POST['categories'], 1);
//var_dump($decodeCountries);
//var_dump($decodeCat);
    echo "<ul>";
    foreach ($decodeCountries as $key)
    {
        echo "<li>$key[id] $key[name]</li>";
    }
    echo "</ul>";
}else{
    echo "<h1>Aucune requête</h1>";
}


?>
<div class="container">
    <div class="row">
        <div class="col-6">
            gjoifdsgiodfjig
        </div>
        <div class="col-6">
            gfjldfjgdf
        </div>
    </div>
</div>
<div class="container" id="testing"><?php echo $_POST['user'] ?> </div>
<?php
//var_dump($countries);
//var_dump($categories);
?>
</body>
</html>