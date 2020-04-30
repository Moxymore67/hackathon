<div class="container">
    <div class="row">
        <div class="col-6">
            <h2>Welcome traveller !</h2>
            <p>To start the game, just select an environment and press <strong>start</strong>.</p>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <form action="./../minigame.php" method="post">
                <div class="form-group">
                    <select name="category-choice" class="form-control">
                        <option>-- Select Environment --</option>
                        <?php
                        foreach ($categories as $key => $category) { ?>
                            <option><?= $key; ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
                <button type="submit" value="category-submit" class="btn btn-primary">START</button>
            </form>
        </div>
    </div>
</div>

