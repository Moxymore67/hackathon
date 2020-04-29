<div class="container">
    <div class="row">
        <div class="col-6">
            <h1>Guess the country !</h1>
            <div>
                <form action="./../minigame.php" method="post">
                    <div class="form-group">
                        <select name="guess" id="guess" class="form-control">
                            <option>-- Select a country --</option>
                            <?php
                            foreach ($countries as $key => $country) { ?>
                                <option><?= $country; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </form>
            </div>
            <div>
                <a href="minigame.php" class="btn btn-primary">Try another one</a>
            </div>
        </div>

    </div>
</div>
