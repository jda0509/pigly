<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PiGLy</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/step1.css') }}" />
</head>
<body>
    <div class="outer-wrapper">
    <div class="login">
        <div class="login__header">
            <h2 class="login__header-title">PiGLy</h2>
            <div class="login__header-new">新規会員登録</div>
        </div>
        <div class="login__detail">
            <div class="login__detail-step1">STEP1 アカウント情報の登録</div>
        </div>
        <form class="new-member" action="{{ route('register.storeStep1') }}" method="post">
            @csrf
            <div class="new-member__content">
                <div class="new-member__content-name">
                    <div class="new-member__content-title">お名前</div>
                    <input class="new-member__content-main" type="name" name="name" placeholder="名前を入力" value="{{ old('name') }}" />
                </div>
                <div class="new-member__error">
                    @error('name')
                    {{ $message }}
                    @enderror
                </div>
                <div class="new-member__content-mail">
                    <div class="new-member__content-title">メールアドレス</div>
                    <input class="new-member__content-main" type="email" name="email" placeholder="メールアドレスを入力" value="{{ old('email') }}" />
                </div>
                <div class="new-member__error">
                    @error('email')
                    {{ $message }}
                    @enderror
                </div>
                <div class="new-member__content-password">
                    <div class="new-member__content-title">パスワード</div>
                    <input class="new-member__content-main" type="password" name="password" placeholder="パスワードを入力" value="" />
                </div>
                <div class="new-member__error">
                    @error('password')
                    {{ $message }}
                    @enderror
                </div>
                <div class="new-member__button">
                    <button class="new-member__button-main" type="submit">次に進む</button>
                </div>
            </div>
        </form>
        <div class="authpage">
            <a href="/login" class="authpage-link">ログインはこちら</a>
        </div>
    </div>
    </div>
</body>
</html>