<?= $this->getContent() ?>


<h1 class="text-light">Your Profile Page</h1>
<hr class="thin">
<?= $user->name ?>
<?= $user->group->name ?>
<?= $user->id ?>
<?= $this->tag->linkTo(['user/edit', 'Edit your profile']) ?>
 
