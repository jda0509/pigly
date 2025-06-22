<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PiGLy</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/step2.css') }}" />
</head>
<body>
    <div class="outer-wrapper">
    <div class="login">
        <div class="login__header">
            <h2 class="login__header-title">PiGLy</h2>
            <div class="login__header-new">新規会員登録</div>
        </div>
        <div class="login__detail">
            <div class="login__detail-step2">STEP2 体重データの入力</div>
        </div>
        <form class="step2" action="{{ route('register.storeStep2') }}" method="post">
            @csrf
            <div class="step2__content">
                <div class="step2__content-weight">
                    <div class="step2__content-title">現在の体重</div>
                    <input class="step2__content-main" type="number" name="weight" step="0.1" min="10" max="999.9" placeholder="現在の体重を入力" value="" />
                    kg
                </div>
                <div class="step2__error">
                    @foreach ($errors->get('weight') as $message)
                    <div class="error_message">{{ $message }}</div>
                    @endforeach
                </div>
                <div class="step2__content-target_weight">
                    <div class="step2__content-title">目標の体重</div>
                    <input class="step2__content-main" type="number" name="target_weight" step="0.1" min="10" max="999.9" placeholder="目標の体重を入力" value="" />
                    kg
                </div>
                <div class="step2__error">
                    @if ($errors->has('target_weight'))
                        @foreach ($errors->get('target_weight') as $message)
                            <div class="error_message">{{ $message }}</div>
                        @endforeach
                    @endif
                </div>
                <div class="step2__button">
                    <button class="step2__button-main" type="submit">アカウント作成</button>
                </div>
            </div>
        </form>
    </div>
    </div>
</body>
</html>