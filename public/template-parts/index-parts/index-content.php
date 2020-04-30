<?php
session_start();
$webcam = new App\WebcamApi();

if ((!isset($_SESSION['countries'])) && (!isset($_SESSION['categories'])))
{
    echo "<body onload='getAllParameters();'>";
}

if ((!isset($_SESSION['webcams'])))
{
    echo "<body onload='sexyData();'>";
} else
{
    echo "<body>";
}


if ((!empty($_POST['countries'])) && !empty(($_POST['categories'])))
{
    $decodeCountries = json_decode($_POST['countries'], 1);
    $decodeCategories = json_decode($_POST['categories'], 1);

    asort($decodeCountries);
    asort($decodeCat);

    if ((!isset($_SESSION['countries'])) && (!isset($_SESSION['categories'])))
    {
        $_SESSION['countries'] = $decodeCountries;
        $_SESSION['categories'] = $decodeCategories;
    }
}

if (!empty($_POST['webcams']))
{
    $decodedWebcams = json_decode($_POST['webcams'], 1);

    if (!isset($_SESSION['webcams']))
    {
        $_SESSION['webcams'] = $decodedWebcams;
    }
}

if (isset($_SESSION['webcams']))
{

    $data = $_SESSION['webcams'];

//Randomize the array
    shuffle($data);
    ?>
    <div class="container-fluid mx-auto">
        <button class="btn btn-primary" onclick="refresh()">Rafraîchir la page</button>
        <div class="row">
            <?php
            $loop = 1;
            foreach ($data as $key => $value)
            {
                if ($loop <= 6)
                { ?>
                    <div class="col-6 card">
                        <h2 style='text-align: center;'> <?= $value['location']['city'] . ', ' . $value['location']['country'] ?>
                            <?php if (!empty($value['location']['wikipedia']))
                            {
                                echo "<a href='" . $value[location][wikipedia] . "'>Voir sur wiki</a></h2>";
                            }
                            ?>
                            <iframe id="inlineFrameExample"
                                    title="Inline Frame Example"
                                    width="100%"
                                    height="500px"
                                    src="<?= $value['player']['month']['embed'] ?>">
                            </iframe>
                    </div>

                    <?php
                    $loop++;
                }
            } ?>
        </div>
    </div>
    <?php
}
