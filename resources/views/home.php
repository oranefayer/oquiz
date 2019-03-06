<?php require_once __DIR__.'/layout/header.tpl.php' ; ?>
            <div>
                <h2> Bienvenue sur O'Quiz </h2>
                <p>

                Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
                
                </p>
            </div>
<?php foreach ($quizzes as $currentQuiz) : ?>
                <a href="<?= route('quizPost', $currentQuiz->id) ?>">
                    <div class="col">
                        <h3><?= $currentQuiz->title ?></h3>
                        <h5><?= $currentQuiz->description ?></h5>
                        <p><?= $currentQuiz->id_author ?></p>
                    </div>
                </a>
<?php endforeach ; ?>
            </div>
        </main> 

<?php require_once __DIR__.'/layout/footer.tpl.php'?>