<?php $__env->startSection('content'); ?>
    <?php
    $login = getContent('login.content', true);
    ?>

       <style>
        

@media (min-width: 1024px) {
   
    /* bouncing effect */
    .bounce {
        animation: bounce 2s infinite alternate;
        -webkit-animation: bounce 2s infinite alternate;
    }
    @keyframes  bounce {
        from {
            transform: translateY(0px);
        }
        to {
            transform: translateY(-35px);
        }
    }
    @-webkit-keyframes bounce {
        from {
            transform: translateY(0px);
        }
        to {
            transform: translateY(-35px);
        }
    }
   
}
    </style>
    
    
    
    
  <div class="section login-section" style="background-image: url(<?php echo e(getImage($activeTemplateTrue . 'images/bck.jpg')); ?>)">
        <div class="container">
            <div class="row g-4 g-lg-0 justify-content-between align-items-center">
                
                  <div class="d-none d-lg-block col-lg-6 col-xl-6 p-5">
                <div class="row vh-100 p-5">
                    <div class="col align-self-center p-5 text-center">
                        <img src="<?php echo e(getImage('assets/images/img/cap-removebg-preview.png')); ?>" class="bounce" alt=""> 
                    </div>
                </div>
            </div>
            
                
            
                
                
                
                <div class="col-lg-5">
                    <div class="login__right bg--light">
                        <form action="<?php echo e(route('user.login')); ?>" class="login__form row verify-gcaptcha" autocomplete="off" method="POST">
                            <?php echo csrf_field(); ?>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="username" class="form-label sm-text t-heading-font heading-clr fw-md"> <?php echo app('translator')->get('Username or Email'); ?></label>
                                    <input type="text" id="userEmail" name="username" value="<?php echo e(old('username')); ?>" class="form-control form--control" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="userPass" class="form-label sm-text t-heading-font heading-clr fw-md">
                                        <?php echo app('translator')->get('Password'); ?></label>
                                    <div class="input-group">
                                        <input id="userPass" type="password" name="password"
                                               class="form-control form--control border-end-0" />
                                        <span class="input-group-text pass-toggle border-start-0">
                                            <i class="las la-eye-slash"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <?php if (isset($component)) { $__componentOriginalc0af13564821b3ac3d38dfa77d6cac9157db8243 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Captcha::class, ['class' => 'form-label sm-text t-heading-font heading-clr fw-md'] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('captcha'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(App\View\Components\Captcha::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc0af13564821b3ac3d38dfa77d6cac9157db8243)): ?>
<?php $component = $__componentOriginalc0af13564821b3ac3d38dfa77d6cac9157db8243; ?>
<?php unset($__componentOriginalc0af13564821b3ac3d38dfa77d6cac9157db8243); ?>
<?php endif; ?>

                            <div class="col-12 mb-3">
                                <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
                                    <div class="form-check flex-shrink-0">
                                        <input class="form-check-input custom--check" type="checkbox" name="remember" <?php echo e(old('remember') ? 'checked' : ''); ?> id="rememberMe" />
                                        <label class="form-check-label sm-text t-heading-font heading-clr fw-md" for="rememberMe"> <?php echo app('translator')->get('Remember Me'); ?> </label>
                                    </div>
                                    <a href="<?php echo e(route('user.password.request')); ?>"
                                       class="d-block text-md-end t-link--base heading-clr sm-text flex-shrink-0"> <?php echo app('translator')->get('Forgot Password?'); ?>
                                    </a>
                                </div>
                            </div>

                            <div class="col-12">
                                <button class="btn btn--xl btn--base w-100 btn--xl"> <?php echo app('translator')->get('LOGIN ACCOUNT'); ?> </button>
                            </div>

                            <div class="col-12 mt-3">
                                <div class="d-flex justify-content-center align-items-center gap-2">
                                    <span class="d-inline-block">
                                        <?php echo app('translator')->get('Don\'t have account?'); ?>
                                    </span>
                                    <a href="<?php echo e(route('user.register')); ?>"
                                       class="t-link d-inline-block text-end t-link--base base-clr sm-text lh-1 text-center"> <?php echo app('translator')->get('Create an Account'); ?>
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
      <script type="text/javascript">
          
          const signUp = document.querySelector("#signUp");
const signIn = document.querySelector("#signIn");
const passwordIcon = document.querySelectorAll('.password__icon')
const authPassword = document.querySelectorAll('.auth__password')

// when click sign up button
signUp.addEventListener('click', () => {
    document.querySelector('.login__form').classList.remove('active')
    document.querySelector('.register__form').classList.add('active')
    document.querySelector('.ball').classList.add('register')
    document.querySelector('.ball').classList.remove('login')
});

// when click sign in button
signIn.addEventListener('click', () => {
    document.querySelector('.login__form').classList.add('active')
    document.querySelector('.register__form').classList.remove('active')
    document.querySelector('.ball').classList.add('login')
    document.querySelector('.ball').classList.remove('register')
});

// change hidden password to visible password
for (var i = 0; i < passwordIcon.length; ++i) {
    passwordIcon[i].addEventListener('click', (i) => {
        const lastArray = i.target.classList.length - 1
        if (i.target.classList[lastArray] == 'bi-eye-slash') {
            i.target.classList.remove('bi-eye-slash')
            i.target.classList.add('bi-eye')
            i.currentTarget.parentNode.querySelector('input').type = 'text'
        } else {
            i.target.classList.add('bi-eye-slash')
            i.target.classList.remove('bi-eye')
            i.currentTarget.parentNode.querySelector('input').type = 'password'
        }
    });
}
          
          
          
          
      </script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    
    
<?php $__env->stopSection(); ?>

<?php echo $__env->make($activeTemplate . 'layouts.frontend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u595814445/domains/linc.cd/public_html/pay/core/resources/views/templates/basic/user/auth/login.blade.php ENDPATH**/ ?>