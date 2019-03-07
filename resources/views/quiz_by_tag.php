<?php require_once __DIR__.'/layout/header.tpl.php' ; ?>
            <div>
                <h2><?= $tag->name ?></h2>
            </div>

<?php foreach ($quizzes as $currentQuiz) : ?>

                <a href="<?= route('quizGet', ['id' => $currentQuiz->id]); ?>">
                    <div class="col">
                        <h3><?= $currentQuiz->title ?></h3>
                        <h5><?= $currentQuiz->description ?></h5>
                        <p>by <?= $authors[$currentQuiz->id]->first_name ?> <?= $authors[$currentQuiz->id]->last_name ?></p>
                    </div>
                </a>
                
<?php endforeach ; ?>
            </div>
        </main> 

<?php require_once __DIR__.'/layout/footer.tpl.php'?>