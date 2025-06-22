<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PiGLy</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/goal_setting.css') }}" />
</head>
<body>
    <header class="pigly_header">
        <h2 class="pigly_title">PiGLy</h2>
        <nav class="pigly_link">
            <ul>
                <li class="target_weight_menu">
                    <a class="target_weight-link" href="/weight_logs/goal_setting">
                    <img class="target_weight_img" src="" alt="歯車のアイコン">
                    </a>
                </li>
                <li class="logout_menu">
                    <form class="logout_menu-main" action="{{ route('logout') }}" method="post" >
                        @csrf
                        <button class="logout-button" type="submit">
                            <img src="" alt="扉のアイコン" class="logout_menu_img">
                            ログアウト
                        </button>
                    </form>
                </li>
            </ul>
        </nav>
    </header>

    <main>
        <div class="goal-content">
            <div class="goal-content-header">
                <div class="goal-title">目標体重設定</div>
            </div>
            <form action="{{ route('goal_setting.update') }}" class="goal-content-main" method="post">
                @csrf
                @method('PUT')
                <div class="goal-content-weight">
                    <input class="goal-weight" type="number" name="target_weight" step="0.1" value="{{ $target_weight->target_weight }}" />
                </div>
                <div class="goal-error">
                    @error('target_weight')
                    {{ $message }}
                    @enderror
                </div>
                <div class="goal-content-button">
                    <a href="/weight_logs" class="goal-content-buck">戻る</a>
                    <button class="goal-content-button-update" type="submit">更新</button>
                </div>
            </form>
        </div>
    </main>
</body>