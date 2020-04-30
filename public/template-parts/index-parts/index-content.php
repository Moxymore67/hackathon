<?php
session_start();
$webcam = new App\WebcamApi();
$data = $webcam->sexyData(array(
  'category' => 'beach',
  'country' => 'FR',
  'limit' => 50,
  'order_by' => 'popularity',
));

// Randomize the array
shuffle($data);
?>
<div class="container-fluid mx-auto">

    <script>
        //Using setTimeout to execute a function after 5 seconds.
        setTimeout(function () {
            //Redirect with JavaScript
            window.location.href = '/';
        }, 5000);
    </script>
    <div class="row">
        <?php
        $loop = 1;
        foreach ($data as $key => $value) {
            if ($loop <= 6) { ?>
                <div class="col-6 card">
                    <h2 style='text-align: center;'> <?= $value['location']['city'] . ', ' . $value['location']['country'] ?>
                        <?php if (!empty($value['location']['wikipedia'])) {
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
