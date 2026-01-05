<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title>Admin Login | <?php echo e($generalsetting->name); ?></title>

    <!-- Google Fontssss -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo e(asset('public/backEnd/')); ?>/assets_login/css/vendors.css">
    <link rel="stylesheet" href="<?php echo e(asset('public/backEnd/')); ?>/assets_login/css/aiz-core.css">

    <style>
        /* Background Gradient 3 colors + Animation */
        body {
            font-family: 'Poppins', sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #6a11cb, #2575fc, #00c6ff);
            background-size: 400% 400%;
            animation: gradientBG 5s ease infinite;
        }

        @keyframes gradientBG {
            0% {background-position: 0% 50%;}
            50% {background-position: 100% 50%;}
            100% {background-position: 0% 50%;}
        }

        /* Login Card */
        .login-card {
            width: 100%;
            max-width: 420px;
            padding: 50px 35px;
            border-radius: 20px;
            background: #ffffff;
            box-shadow: 0 20px 50px rgba(0,0,0,0.25);
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .login-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 25px 60px rgba(0,0,0,0.3);
        }

        .login-card img {
            max-height: 50px;
            margin-bottom: 20px;
        }
        .login-card h1 {
            font-weight: 700;
            color: #2575fc;
            margin-bottom: 8px;
        }
        .login-card p {
            color: #555;
            margin-bottom: 30px;
            font-size: 14px;
        }

        /* Input fields */
        .form-control {
            border-radius: 12px;
            padding: 14px 16px;
            font-size: 15px;
            border: 1px solid #ddd;
        }
        .form-control:focus {
            border-color: #2575fc;
            box-shadow: 0 0 12px rgba(37,117,252,0.25);
        }

        /* Login Button */
        .btn-primary {
            border-radius: 12px;
            padding: 14px 0;
            font-size: 16px;
            font-weight: 600;
            background: #2575fc;
            border: none;
            transition: 0.3s;
        }
        .btn-primary:hover {
            background: #6a11cb;
        }

        .forgot-password {
            font-size: 13px;
            color: #2575fc;
            text-decoration: none;
        }
        .forgot-password:hover {
            text-decoration: underline;
        }

        /* Responsive */
        @media (max-width: 575px) {
            .login-card {
                padding: 35px 20px;
            }
        }
    </style>
</head>
<body>

<div class="login-card text-center">
    <img src="<?php echo e(asset($generalsetting->dark_logo)); ?>" alt="<?php echo e($generalsetting->name); ?>">
    <h1>Welcome to <?php echo e($generalsetting->name); ?></h1>
    <p>Login to your account</p>

    <form method="POST" action="<?php echo e(route('login')); ?>">
        <?php echo csrf_field(); ?>
        <div class="mb-3 text-left">
            <input id="email" type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                   name="email" value="<?php echo e(old('email')); ?>" required autofocus placeholder="Email">
            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <span class="invalid-feedback" role="alert">
                <strong><?php echo e($message); ?></strong>
            </span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div class="mb-3 text-left">
            <input id="password" type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                   name="password" required placeholder="Password">
            <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <span class="invalid-feedback" role="alert">
                <strong><?php echo e($message); ?></strong>
            </span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <label class="aiz-checkbox">
                    <input type="checkbox" name="remember" value="1">
                    <span>Remember Me</span>
                    <span class="aiz-square-check"></span>
                </label>
            </div>
            <div>
                <a href="#" class="forgot-password">Forgot password?</a>
            </div>
        </div>

        <button type="submit" class="btn btn-primary w-100">
            Login
        </button>
    </form>
</div>

<script src="<?php echo e(asset('public/backEnd/')); ?>/assets_login/js/vendors.js"></script>
<script src="<?php echo e(asset('public/backEnd/')); ?>/assets_login/js/aiz-core.js"></script>
</body>
</html>
<?php /**PATH /home/filekinb/borbix.incomekori.com/resources/views/backEnd/auth/login.blade.php ENDPATH**/ ?>