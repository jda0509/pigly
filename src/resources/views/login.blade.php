<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PiGLy</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/login.css') }}" />
</head>
<body>
    <div class="outer-wrapper">
    <div class="login">
        <div class="login__header">
            <h2 class="login__header-title">PiGLy</h2>
            <div class="login__header-login">ログイン</div>
        </div>
        <div class="login__detail">
        <form class="login__member" action="/login" method="post">
            @csrf
            <div class="login__content">
                <div class="login__content-mail">
                    <div class="login__content-mail-title">メールアドレス</div>
                    <input class="login__content-mail-main" type="email" name="email" placeholder="メールアドレスを入力" value="" />
                </div>
                <div class="login__error">
                    @error('email')
                    {{ $message }}
                    @enderror
                </div>
                <div class="login__content-pass">
                    <div class="login__content-pass-title">パスワード</div>
                    <input class="login__content-pass-main" type="password" name="password" placeholder="パスワードを入力" value="" />
                </div>
                <div class="login__error">
                    @error('password')
                    {{ $message }}
                    @enderror
                </div>
                <div class="login__content-button">
                    <button class="login__content-button-main" type="submit">ログイン</button>
                </div>
            </div>
        </form>
        <div class="login__not-member">
            <a class="login__not-member-link" href="/register/step1">アカウント作成はこちら</a>
        </div>
    </div>
    </div>
</body>
</html>