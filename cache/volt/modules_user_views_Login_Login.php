<?= $this->getContent() ?>
<style>
    .login-form {
        width: 350px;
        height: auto;
        top: 50%;
        margin-top: -160px;
    }

    .ani-swoopInTop {
        animation-name: swoopInTop;
        animation-duration: 0.5s;
    }

    .ani-swoopOutTop {
        animation-name: swoopOutTop;
        animation-duration: 0.5s;
    }

    @keyframes swoopInTop {
        0% {
            opacity: 0;
            animation-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);
            transform: scaleY(1.5) translate3d(0, -400px, 0);
        }
        40% {
            opacity: 1;
            animation-timing-function: cubic-bezier(0.42, 0, 0.58, 1);
            transform: scaleY(1.2) translate3d(0, 0, 0);
        }
        65% {
            transform: scaleY(1) translate3d(0, 20px, 0);
        }
        100% {
            animation-timing-function: cubic-bezier(0.42, 0, 0.58, 1);
            transform: scaleY(1) translate3d(0, 0, 0);
        }
    }

    @keyframes swoopOutTop {
        0% {
            animation-timing-function: cubic-bezier(0.42, 0, 0.58, 1);
            transform: scaleY(1) translate3d(0, 0, 0);
        }
        40% {
            opacity: 1;
            transform: scaleY(1) translate3d(0, 20px, 0);
        }
        60% {
            animation-timing-function: cubic-bezier(0.42, 0, 0.58, 1);
            transform: scaleY(1.2) translate3d(0, 0, 0);
        }
        100% {
            opacity: 0;
            animation-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);
            transform: scaleY(1.5) translate3d(0, -400px, 0);
        }
    }

    .ani-rollInLeft {
        animation-name: rollInLeft;
        animation-duration: .5s;
    }

    @keyframes rollInLeft {
        0% {
            animation-timing-function: cubic-bezier(0.25, 0.46, 0.45, 0.94);
            transform: translateX(-400px) rotate(445deg);
            opacity: 0;
        }
        30% {
            opacity: 1;
        }
        50% {
            transform: translateX(20px) rotate(20deg);
        }
        100% {
            animation-timing-function: cubic-bezier(0.455, 0.03, 0.515, 0.955);
            transform: translateX(0) rotate(0deg);
        }
    }

    .ani-rollOutRight {
        animation-name: rollOutRight;
        animation-duration: .5s;
    }

    @keyframes rollOutRight {
        0% {
            opacity: 1;
            animation-timing-function: cubic-bezier(0.455, 0.03, 0.515, 0.955);
            transform: translateX(0) rotate(0deg);
        }
        40% {
            opacity: 1;
            transform: translateX(-20px) rotate(20deg);
        }
        100% {
            opacity: 0;
            animation-timing-function: cubic-bezier(0.25, 0.46, 0.45, 0.94);
            transform: translateX(400px) rotate(445deg);
        }
    }
</style>
<div class="h-vh-100">
    <?= $this->tag->form(['class' => 'login-form p-6 mx-auto border bd-default win-shadow']) ?>
    <span class="mif-vpn-lock mif-4x place-right" style="margin-top: -10px;"></span>
    <h2 class="text-light">Login to service</h2>
    <hr class="thin mt-4 mb-4 bg-white">
    <div class="form-group">
        <?= $form->render('email', ['data-role' => 'input', ' data-validate' => 'required', 'data-prepend' => '<span class="mif-envelop">', 'required placeholder' => 'enter your email...']) ?>
    </div>
    <div class="form-group">
        <?= $form->render('password', ['data-role' => 'input', ' data-validate' => 'required minlength=6', 'data-prepend' => '<span class="mif-key">', 'required placeholder' => 'enter your password...']) ?>
    </div>
    <!-- Security for form-->
        <?= $form->render('csrf', ['value' => $this->security->getToken()]) ?>

    <div class="form-group mt-10">
        <input type="checkbox" data-role="checkbox" data-caption="Remember me" class="place-right">
        <button type="submit" class="image-button icon-right">
            <span class="mif-enter icon"></span>
            <span class="caption">Enter</span>
        </button>
    </div>
    
    <br />
    <?= $this->tag->linkTo(['user/lostPwd', 'Forgot my password']) ?>
 </form>
</div>