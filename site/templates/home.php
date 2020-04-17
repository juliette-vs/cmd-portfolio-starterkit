<?php snippet('header') ?>

<main>
  <div class="row align-items-center">
    <div class="col-12 col-lg-6">
      <h1><?= $page->introductiontitle() ?></h1>
      <p class="lead"><?= $page->introductiontext() ?></p>
      <a href="<?= $site->page('projects') ?>" class="btn btn-primary" role="button" aria-pressed="true">View my work</a>
      <a href="<?= $site->page('about') ?>" class="btn btn-outline-primary" role="button" aria-pressed="true">More about me</a>
    </div>
    <div class="col-12 col-lg-6">
      <img src="<?= $page->image()->url(); ?>" class="img-fluid" alt="<?= $page->image()->title(); ?>" />
    </div>
  </div>
  <?php
  if ($projectsPage = page('projects')): ?>
  <div class="row border-top">
    <div class="col-12">
      <h2 class="float-left">My work</h2>
      <a class="float-right" href="<?= $site->page('projects') ?>">View all projects &#8594;</a>
    </div>
    <?php foreach ($projectsPage->children()->listed()->paginate(2) as $project): ?>
    <div class="col-12 col-lg-6">
      <div class="card h-100">
      <img src="<?= $project->images()->findBy("template", "thumbnail")->url(); ?>" class="card-img-top" alt="thumbnail" />
      <div class="card-body">
        <h4 class="card-title"><a href="<?= $project->url() ?>"><?= $project->title() ?></a></h4>
        <p class="card-text"><?= $project->roles() ?></p>
        <a href="<?= $project->url() ?>">Read more &#8594;</a>
      </div>
    </div>
    </div>
    <?php endforeach ?>
  </div>
  <?php endif ?>
</main>

<?php snippet('footer') ?>