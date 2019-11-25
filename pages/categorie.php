<?php

use App\App;
use App\Table\Article;
use App\Table\Categorie;

$categorie = Categorie::find($_GET['id']);
if ($categorie === false){
    App::notFound();
}
$article = Article::LastByCategory($_GET['id']);
$categories = Categorie::all();

?>

<div class="row">
    <div class="col-sm-8">
    <?php


        foreach ($article as $post):

        ?>

        
            <h1><?= $categorie->titre ?></h1>

            <h2><a href="<?= $post->url; ?>"><?= $post->titre; ?></a> </h2>

            <p><em><?= $post->categorie; ?></em></p>

            <p><?= $post->extrait; ?></p>


        <?php 

        endforeach; 

        ?>
    </div>

    <div class="col-sm-4">
        <ul>
            <?php foreach(\App\Table\Categorie::all() as $categorie): ?>
                <li><a href="<?= $categorie->url; ?>"><?= $categorie->titre; ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>