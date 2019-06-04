<?php require_once __DIR__.'/layout/header.tpl.php' ; ?>


        <div>
            <h2><?= $quiz->title ?>
                <span class="score<?= $scoreclass = $score >= (count($questions)/2) ? ' good' : ' bad' ; ?>"><?= $score ?>/<?= count($questions) ?></span>
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
            <div class="question-wrapper">
                <span class="question-level"><?=  $levels[$currentQuestion->id]->name ?></span>
                <p class="question-text">
                    <?=  $currentQuestion->question ?>
                </p>

                <div class="question-choices">
                    <ul>
    <?php foreach ($answers[$currentQuestion->id] as $currentAnswer) : ?>
    <?php $classAnswer = ''; ?>
        <?php if ($currentAnswer->id == $currentQuestion->id_answer) {$classAnswer = 'right';} ?>
        <?php if (array_key_exists($currentQuestion->id, $badAnswers) && $currentAnswer->id == $badAnswers[$currentQuestion->id]) { $classAnswer = 'wrong' ;} ?>  
                        <li class="<?= $classAnswer ?>"><?= $currentAnswer->description ?></li>                
    <?php endforeach ; ?>
                    </ul>
                </div>
                <p class="question-anecdote">
                    <?=  $currentQuestion->anecdote ?>
                </p>
            </div>
<?php  endforeach ; ?>
            <div>
                <button type="submit">GO<img src="<?= route('home') ?> /pictures/drink_carrousel.gif"/></button>
            </div>
        </form>

<?php require_once __DIR__.'/layout/footer.tpl.php'?>