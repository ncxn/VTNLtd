<?= $this->getContent() ?>

<div align="center" class="login-form padding20 block-shadow" style="opacity: 1; transform: scale(1); transition: 0.5s;">
<h1 class="text-light">Login to service</h1>
<hr class="thin">

 <?= $this->tag->form([]) ?>
    <div class="input-control modern text iconic">
    <?= $form->render('email') ?>
    <span class="label">You login</span>
    <span class="informer">Please enter you login or email</span>
    <span class="placeholder">Input login</span>
    <span class="icon mif-user"></span>
    </div>
    <div class="input-control modern password iconic" data-role="input">
    <?= $form->render('password') ?>
    <span class="label">You password</span>
    <span class="informer">Please enter you password</span>
    <span class="placeholder">Input password</span>
    <span class="icon mif-lock"></span>
    <button class="button helper-button reveal"><span class="mif-looks"></span></button>
    </div>
    <br />
    <label class="input-control checkbox">
    <?= $form->render('remember') ?>
    <span class="check"></span>
    <span class="caption"><?= $form->label('remember') ?></span>
    </label>
    
    
    <?= $form->render('csrf', ['value' => $this->security->getToken()]) ?>
    <br />
    
    <button type="submit"class="image-button icon-right">
    <!--<?= $form->render('go') ?>--> Enter
    <span class="icon mif-enter"></span>
    </button>
    <br />
    <?= $this->tag->linkTo(['user/forgotPassword', 'Forgot my password']) ?>
 </form>
</div>
<!-- Success notify -->
<?php $output = $this->flash->output(); ?>
<?php if ($this->length($output)) { ?>
    <script type="text/javascript">
         $.Notify({
            caption: 'Notify title',
            content: '<?= $output ?>',
            type: 'success'
        });
     </script>
 <?php } ?>
