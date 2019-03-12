<?php require_once __DIR__.'/layout/header.tpl.php' ; ?>

        <div>
            <h3>Les thèmes</h3>
<?php foreach ($tags as $currentTag) : ?>
            <a href="<?= route('quizzesByTag', ['id' => $currentTag->id]); ?>">
                <h4><?= $currentTag->name ?></h4>
            </a>
<?php endforeach ; ?>
        </div>

        <section class="quiz-list">
<?php foreach ($quizzes as $currentQuiz) : ?>	
                <a href="<?= route('quizGet', ['id' => $currentQuiz->id]) ?>">
                    <div>
                        <h3><?= $currentQuiz->title ?></h3>
                        <h5><?= $currentQuiz->description ?></h5>
                        <p>by <?= $authors[$currentQuiz->id]->first_name ?> <?= $authors[$currentQuiz->id]->last_name ?></p>
                    </div>
                </a>	
<?php endforeach ; ?>	            
        </section>


<?php require_once __DIR__.'/layout/footer.tpl.php'?>