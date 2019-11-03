<?php
/**
 * Templates render the content of your pages.
 * They contain the markup together with some control structures like loops or if-statements.
 * The `$page` variable always refers to the currently active page.
 * To fetch the content from each field we call the field name as a method on the `$page` object, e.g. `$page->title()`.
 * This home template renders content from others pages, the children of the `photography` page to display a nice gallery grid.
 * Snippets like the header and footer contain markup used in multiple templates. They also help to keep templates clean.
 * More about templates: https://getkirby.com/docs/guide/templates/basics
 */
?>

<?php snippet('header') ?>

<main>

<h1><?= $page->headline() ?></h1>
<p><?= $page->text() ?></p>
<?= $page->image()->html() ?>

Tesrt
  <?php
  // we always use an if-statement to check if a page exists to prevent errors
  // in case the page was deleted or renamed before we call a method like `children()` in this case
  if ($projectsPage = page('projects')): ?>
  <ul>
    <?php foreach ($projectsPage->children()->listed()->paginate(3) as $project): ?>
    <li>
      <a href="<?= $project->url() ?>">
        <figure>
          <?php
          // the `cover()` method defined in the `album.php` page model can be used
          // everywhere across the site for this type of page
          if ($cover = $project->cover()): ?>
          <?= $cover->resize(1024, 1024) ?>
          <?php endif ?>
          <figcaption>
            <span>
              <span class="example-name"><?= $project->title() ?></span>
            </span>
          </figcaption>
        </figure>
      </a>
    </li>
    <?php endforeach ?>
  </ul>
  <?php endif ?>

</main>

<?php snippet('footer') ?>
