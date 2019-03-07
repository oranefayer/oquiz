<?php require_once __DIR__.'/layout/header.tpl.php' ; ?>

            <div>
                <h2><?= $quiz->title ?>
                    <span><?= count($questions) ?> questions</span>
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

                    <div class="question__question">
                    <?=  $currentQuestion->question ?>
                    </div>

                    <div class="question__choices">

    <?php foreach ($answers[$currentQuestion->id] as $currentAnswer) : ?>

                        <div>
                            <input type="radio" name="exampleRadios" id="exampleRadios1" value="option1">
                            <label for="exampleRadios1">
                                <?= $currentAnswer->description ?>
                            </label> 
                        </div>

    <?php endforeach ; ?>

                    </div>
                </div>  

<?php  endforeach ; ?>               
                
                    <input class="btn" type="submit" value="OK"/>
                </div>
            </form>
        </main>

<?php require_once __DIR__.'/layout/footer.tpl.php'?>