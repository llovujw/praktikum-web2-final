<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="<?= base_url('/style.css'); ?>">
    <style>
        body {
            background-color: #f2f4f8;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        #login-wrapper {
            background: #ffffff;
            padding: 2.5rem;
            border-radius: 10px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
            width: 100%;
            max-width: 400px;
        }

        #login-wrapper h1 {
            text-align: center;
            margin-bottom: 1.5rem;
            font-size: 1.8rem;
            color: #3152d6;
        }

        .mb-3 {
            margin-bottom: 1.2rem;
        }

        label {
            display: block;
            margin-bottom: 0.4rem;
            font-weight: 600;
            color: #333;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #ccc;
            border-radius: 6px;
            box-sizing: border-box;
            transition: border-color 0.3s;
        }

        input[type="email"]:focus,
        input[type="password"]:focus {
            border-color: #3152d6;
            outline: none;
        }

        .btn {
            width: 100%;
            padding: 0.75rem;
            background-color: #3152d6;
            color: #fff;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
            font-size: 1rem;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #273d9c;
        }

        .alert {
            background-color: #ffe6e6;
            border-left: 5px solid #ff4d4d;
            padding: 0.75rem;
            margin-bottom: 1.2rem;
            color: #990000;
            border-radius: 6px;
            font-size: 0.95rem;
        }
    </style>
</head>
<body>
    <div id="login-wrapper">
        <h1>🔐 Sign In</h1>

        <?php if(session()->getFlashdata('flash_msg')): ?>
            <div class="alert"><?= session()->getFlashdata('flash_msg') ?></div>
        <?php endif; ?>

        <form action="" method="post">
            <div class="mb-3">
                <label for="InputForEmail">Email</label>
                <input type="email" name="email" id="InputForEmail" value="<?= set_value('email') ?>" required>
            </div>
            <div class="mb-3">
                <label for="InputForPassword">Password</label>
                <input type="password" name="password" id="InputForPassword" required>
            </div>
            <button type="submit" class="btn">Login</button>
        </form>
    </div>
</body>
</html>