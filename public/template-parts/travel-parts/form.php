<?php
$webcam = new App\WebcamApi();
$countries = $webcam->getCountries();

$categories = $webcam->getCategories();


asort($categories);
asort($countries);


?>
    <form method="post" >
        <div class="form-group ">
            <label for="exampleFormControlSelect2">Select a category
                <select name="category"  class="form-control" id="">
                    <option>Select your category </option>
                    <?php foreach($categories as $key => $val ){ ?>
                        <option value="<?= $key ?>"><?= $val ?></option>
                    <?php } ?>
                </select></label>
        </div>

        <div class="form-group ">
            <label for="">Select a country
                <select name="key"  class="form-control" id="">
                    <option>Select your country </option>
                    <?php foreach($countries as $key => $val ){ ?>
                        <option value="<?= $key ?>"><?= $val ?></option>
                    <?php } ?>
                </select> </label>
        </div>
        <input type="submit" value="Send">
    </form>
<?php

if(!empty($_POST['category']) || $_POST['key']) {
    //$data = new App\WebcamApi();
    $data = $webcam->sexyData(array(
        'category' => $_POST['category'],
        'country' => $_POST['key'],
        'limit' => '1',
        'order_by' => 'popularity',
        )
    );
}
if ($data == NULL) {
    echo "<br>";
    echo "Votre recherche ne peut aboutir";
}
else  {
     ?>
    <iframe id="inlineFrameExample"
    title="Inline Frame Example"
    width="300"
    height="200"
    src="<?= $data[0]['player']['month']['embed'] ?>">
</iframe>
<?php } ?>







