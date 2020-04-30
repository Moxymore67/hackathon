<?php
session_start();
$webcam = new App\WebcamApi();
if ((!isset($_SESSION['countries'])) && (!isset($_SESSION['categories'])))
{
    echo "<body onload='getCountries();'>";
} else
{
    echo "<body>";
}

if ((!empty($_POST['countries'])) && !empty(($_POST['categories'])))
{
    $decodeCountries = json_decode($_POST['countries'], 1);
    $decodeCat = json_decode($_POST['categories'], 1);

    asort($decodeCountries);
    asort($decodeCat);

    if ((!isset($_SESSION['countries'])) && (!isset($_SESSION['categories'])))
    {
        $_SESSION['countries'] = $decodeCountries;
        $_SESSION['categories'] = $decodeCat;
    }
}

//var_dump($decodeCountries);
//var_dump($decodeCat);
if ((isset($_SESSION['countries'])) && (isset($_SESSION['categories'])))
{
    ?>
    <div style="background-image: url("www.voyageavecnous
         .fr/wp-content/uploads/2015/01/plage-paradisiaque-seychelles.jpg";>
    <div  class="d-flex justify-content-center " >
        <div class="row">
            <form method="post" class="m-4">

                <div class="form-group  flex">
                    <label for="exampleFormControlSelect2">
                        <select name="category" class="form-control " id="">
                            <option>Select your category</option>
                            <?php foreach ($_SESSION['categories'] as $key => $val) { ?>

                                <option value="<?= $val['id'] ?>"><?= $val['name'] ?></option>
                            <?php } ?>
                        </select></label>
                </div>
                <div class="form-group ">
                    <label for="">
                        <select name="key" class="form-control " id="">
                            <option>Select your country</option>
                            <?php foreach ($_SESSION['countries'] as $key => $val) { ?>
                                <option value="<?= $val['id'] ?>"><?= $val['name'] ?></option>
                            <?php } ?>
                        </select> </label>
                </div>
                <input type="submit" value="Send" class=" flex">

            </form> </div></div>
    <br>
    <br>
    <?php
    $data=[];
    if (!empty($_POST['category']) && (!empty($_POST['key'])))
    {
        $data = $webcam->sexyData(
            array(
                'category' => $_POST['category'],
                'country' => $_POST['key'],
                'limit' => '4',
                'order_by' => 'popularity',
            )
        );
    }
    if ($data == NULL )
    {

        echo "<p style='color:red;font-weight: bolder;font-size: 1.25rem;'>Votre recherche ne peut aboutir</p>";
    } else
    {

//        var_dump($data[0]);

        ?>
        <div class="container-fluid mx-auto">
            <div class="row">
                <?php
                foreach ($data as $key => $value)
                {
                    ?>

                    <div class="col-6">
                        <h2 style='text-align: center;'> <?= $value['location']['city'] . ', ' . $value['location']['country'] ?>
                            <?php if (!empty($value['location']['wikipedia']))
                            {
                                echo "<a href='" . $value['location']['wikipedia'] . "'>Voir sur wiki</a></h2>";
                            }
                            ?>
                            <iframe id="inlineFrameExample"
                                    title="Inline Frame Example"
                                    width="100%"
                                    height="500px"
                                    src="<?= $value['player']['month']['embed'] ?>">
                            </iframe>
                    </div>

                <?php } ?>
            </div>
        </div>
        <?php
    }
}
?>

</body>
</html>
