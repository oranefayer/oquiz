<?php require_once __DIR__.'/layout/header.tpl.php';?>

            <div>
                <h2><?= $quiz->title ?>
                    <span><?= count($questions) ?> questions</span>
                </h2>
            </div>

<?php foreach ($tags as $currentTag) : ?>
                <h3><?= $currentTag->name ?></h3>
<?php endforeach ; ?>

            <div>
                <h4> 
                    <?= $quiz->description ?>
                </h4>
            </div>

            <div>
                <p>by <?= $author->first_name ?> <?= $author->last_name ?></p>
            </div>

            <div>

<?php foreach ($questions as $currentQuestion) : ?>

                <div >

                    <span ><?=  $levels[$currentQuestion->id]->name ?></span>

                    <div >
                    <?=  $currentQuestion->question ?>
                    </div>

                    <div>
                        <ul>

    <?php foreach ($answers[$currentQuestion->id] as $currentAnswer) : ?>

                            <li><?= $currentAnswer->description ?></li>

    <?php endforeach ; ?>

                        </ul> 
                    </div>
                </div> 

<?php  endforeach ; ?>              
                
            </div>
        </main>

<?php require_once __DIR__.'/layout/footer.tpl.php'; ?>