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
<div class="container-fluid mx-auto"
     style="background-image: radial-gradient( circle farthest-corner at 10% 20%,  rgba(0,149,218,0.85) 9.9%, rgba(56,80,114,1) 100.3% );">

    <script>
        //Using setTimeout to execute a function after 5 seconds.
        setTimeout(function () {
            //Redirect with JavaScript
            window.location.href = '/';
        }, 100000);
    </script>
    <div class="row">
        <?php
        $loop = 1;
        foreach ($data as $key => $value) {
            if ($loop <= 6) { ?>
                <div class="cont col-xl-6 mt-4"">
                    <div class="card-cust p-4 m-4"
                         style="background-color: #e9ecef;
                         border-radius: 5px;
                         box-shadow: black 1px 1px 10px;">
                        <h2 style='text-align: center;text-align: center;height: 50px;white-space: nowrap;
                        overflow: hidden;text-overflow: ellipsis;'>
                            <?= $value['location']['city'] . ', ' . $value['location']['country'] ?>
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
                </div>
                <?php
                $loop++;
            }
        } ?>
    </div>
</div>
