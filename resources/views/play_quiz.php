<?php require_once __DIR__.'/layout/header.tpl.php' ; ?>
            <div>
                <h2> Le chocolat - I 
                    <span>xx questions</span>
                </h2>
            </div>

            <div>
                <h4> 
                    Lorem ipsum dolor sit amet, consetetur sadipscing elitr.
                </h4>
            </div>

            <div>
                <p><?php // ?></p>
            </div>
            
            <form action="" method="">

                <div class="row">
<?php foreach ($questions as $currentQuestion) : ?>

                    <div class="col question">

                        <span class="level level--beginner"><?= $currentQuestion->id_level ?></span>

                        <div class="question__question">
                        <?= $currentQuestion->question ?>
                        </div>

                        <div class="question__choices">
    <?php foreach ($questions-> as $currentAnswer) : ?>
                            <div>
                                <input type="radio" name="exampleRadios" id="exampleRadios1" value="option1">
                                <label for="exampleRadios1">
                                    <?= $currentAnswer->description ?>
                                </label> 
                            </div>
    <?php endforeach ; ?>
<?php endforeach ; ?>
                        </div>
                    </div>
                    
                </div>
                <div>
                    <input class="btn" type="submit" value="OK"/>
                </div>
            </form>
        </main>

<?php require_once __DIR__.'/layout/footer.tpl.php'?>