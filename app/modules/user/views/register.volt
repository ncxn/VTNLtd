{{ content() }}

<div align="center">
    <h1 class="text-light">Sign up</h1>
    <hr class="thin">
	{{ form() }}
           <div class="input-control modern text iconic" data-role="input">
               {{ form.render('name') }}
               <span class="label">Your name</span>
               <span class="informer">Please enter your name</span>
               <span class="placeholder" style="display: block;">Input name</span>
               <span class="icon mif-user"></span>
           </div>
           <div class="input-control modern text iconic" data-role="input">
               {{ form.render('email') }}
               <span class="label">Your email</span>
               <span class="informer">Please enter your email</span>
               <span class="placeholder" style="display: block;">Input email</span>
               <span class="icon mif-envelop"></span>
           </div>
           <br />            
           <div class="input-control modern password iconic" data-role="input">
                {{ form.render('password') }}
                <span class="label">You password</span>
                <span class="informer">Please enter you password</span>
                <span class="placeholder">Input password</span>
                <span class="icon mif-lock"></span>
                <button class="button helper-button reveal"><span class="mif-looks"></span></button>
            </div>
           <div class="input-control modern password iconic" data-role="input">
                {{ form.render('confirmPassword') }}
                <span class="label">You password</span>
                <span class="informer">Please enter you password</span>
                <span class="placeholder">Input password</span>
                <span class="icon mif-lock"></span>
                <button class="button helper-button reveal"><span class="mif-looks"></span></button>
            </div>	
            <br />            	
            <label class="input-control checkbox">
                {{ form.render('terms') }}
                <span class="check"></span>
                <span class="caption">{{ form.label('terms') }}</span>
            </label>
		
			<button type="submit" class="image-button icon-right" value="Enter">
            Sign up<span class="icon mif-enter"></span>
            </button>
		          {{ form.render('csrf', ['value': security.getToken()]) }}
	</form>

</div>