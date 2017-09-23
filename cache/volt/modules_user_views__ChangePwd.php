<?= $this->getContent() ?>

<div align="center">
    <h1 class="text-light">Change your password</h1>
    <hr class="thin">
  
	<?= $this->tag->form([]) ?>
           
           <div class="input-control modern password iconic" data-role="input">
                <?= $form->render('currentPassword') ?>
                <span class="label">You Current password</span>
                <span class="informer">Please enter your current password</span>
                <span class="placeholder">Current password</span>
                <span class="icon mif-lock"></span>
                <button class="button helper-button reveal"><span class="mif-looks"></span></button>
           </div>
           <br /> 
           <div class="input-control modern password iconic" data-role="input">
                <?= $form->render('password') ?>
                <span class="label">You password</span>
                <span class="informer">Please enter you password</span>
                <span class="placeholder">Input new password</span>
                <span class="icon mif-lock"></span>
                <button class="button helper-button reveal"><span class="mif-looks"></span></button>
           </div>
           <br />
           <div class="input-control modern password iconic" data-role="input">
                <?= $form->render('confirmPassword') ?>
                <span class="label">You password</span>
                <span class="informer">Please enter you password</span>
                <span class="placeholder">Input new password</span>
                <span class="icon mif-lock"></span>
                <button class="button helper-button reveal"><span class="mif-looks"></span></button>
            </div>	
            <br />            	
		
			<button type="submit" class="image-button icon-right" value="Enter">
            Change!<span class="icon mif-enter"></span>
            </button>
		     
	</form>

</div>