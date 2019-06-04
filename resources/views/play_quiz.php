<?php require_once __DIR__.'/layout/header.tpl.php' ; ?>

        <div>
            <h2><?= $quiz->title ?>
                <h3><?= count($questions) ?> questions</h3>
            </h2>
        </div>
        <div>

<?php foreach ($tags as $currentTag) : ?>
            <h3><?= $currentTag->name ?></h3>
<?php endforeach ; ?>

        </div>

        <div>
            <h4> 
                <?= $quiz->description ?>
            </h4>
        </div>

        <div>
            <p>by <?= $author->first_name ?> <?= $author->last_name ?></p>
        </div>
        
        <form action="<?php route('quizPost') ?>" method="post">
<?php foreach ($questions as $currentQuestion) : ?>
            <div class="col question">
                <span class="level level--beginner"><?=  $levels[$currentQuestion->id]->name ?></span>
                <p class="question__question">
                    <?=  $currentQuestion->question ?>
                </p>

                <ul class="question__choices">
    <?php foreach ($answers[$currentQuestion->id] as $currentAnswer) : ?>
                    <li>
                        <input type="radio" name="<?= $currentQuestion->id?>" id="<?= $currentQuestion->id ?>-<?= $currentAnswer->id ?>" value="<?= $currentAnswer->id ?>">
                        <label for="<?= $currentQuestion->id ?>-<?= $currentAnswer->id ?>">
                            <?= $currentAnswer->description ?>
                        </label> 
                    </li>
    <?php endforeach ; ?>
                </ul>
            </div>
            <i class="fas fa-caret-left"></i><i class="fas fa-caret-right"></i>
<?php  endforeach ; ?>
            <div>
                <button type="submit">GO<img src="<?= route('home') ?> /pictures/drink_carrousel.gif"/></button>
            </div>
        </form>

<?php require_once __DIR__.'/layout/footer.tpl.php'?>