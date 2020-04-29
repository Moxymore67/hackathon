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
                                <option value="<?= $key; ?>"><?= $country; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <button type="submit" value="guessed" class="btn btn-primary">Send</button>
                </form>
            </div>
            <div>
                <a href="minigame.php" class="btn btn-warning">Try another one</a>
            </div>
        </div>

    </div>
</div>
