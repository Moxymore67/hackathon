<div class="container">
    <div class="row">
        <div class="col-6">
            <h2>Guess the country !</h2>
            <h3 class="bg-warning"><?= $_SESSION['message']; ?></h3>
            <div>
                <iframe width="100%"
                        height="400px"
                        src="<?= $_SESSION['player']; ?>"
                >
                </iframe>
                <p><em>Continent : <?= $_SESSION['continent']; ?></em></p>
            </div>
            <div>
                <form action="./../minigame.php" method="post">
                    <div class="form-group">
                        <select name="guess" id="guess" class="form-control">
                            <option value="none">-- Select a country --</option>
                            <?php
                            foreach ($countries as $key => $country) { ?>
                                <option value="<?= $key; ?>"><?= $country; ?> - <?= $key; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <button type="submit" value="guessed" class="btn btn-primary">Send</button>
                </form>
            </div>
            <div>
                <a href="minigame.php" class="btn btn-warning">Change Landscape</a>
            </div>
        </div>
    </div>
</div>
