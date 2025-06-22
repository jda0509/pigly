<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PiGLy</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/create.css') }}" />
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

    <div class="weight_logs_add">
        <div class="weight_logs_add-header">
            <h2 class="weight_logs_add-header-title">
                Weight Log
            </h2>
        </div>
        <div class="weight_logs_add-content">
            <form class="add" action="{{ route('weight_logs.update',['id' => $weight_log->id]) }}" method="post" >
            @csrf
            @method('PUT')
                <div class="weight_logs_add-date">
                    <div class="weight_logs_add-date-title">日付</div>
                    <div class="weight_logs_add-required">必須</div>
                    <input class="weight_logs_add-date-main" type="date" name="date" value="{{ $weight_log->date }}" />
                </div>
                <div class="weight_logs_error">
                    @error('date')
                    {{ $message }}
                    @enderror
                </div>
                <div class="weight_logs-add-weight">
                    <div class="weight_logs_add-weight-title">体重</div>
                    <div class="weight_logs_add-required">必須</div>
                    <input class="weight_logs_add-weight-main" type="number" name="weight" step="0.1" value="{{ $weight_log->weight }}"/>
                    <p class="unit">kg</p>
                </div>
                <div class="weight_logs_error">
                    @error('weight')
                    {{ $message }}
                    @enderror
                </div>
                <div class="weight_logs_add-calories">
                    <div class="weight_logs_add-calories-title">摂取カロリー</div>
                    <div class="weight_logs_add-required">必須</div>
                    <input class="weight_logs_add-calories-main" type="number" name="calories" value="{{ $weight_log->calories }}" />
                    <p class="unit">cal</p>
                </div>
                <div class="weight_logs_error">
                    @error('calories')
                    {{ $message }}
                    @enderror
                </div>
                <div class="weight_logs_add-exercise">
                    <div class="weight_logs_add-exercise-title">運動時間</div>
                    <div class="weight_logs_add-required">必須</div>
                    <input class="weight_logs_add-exercise-main" type="time" name="exercise_time" placeholder="00:00" value="{{ $weight_log->exercise_time }}" />
                </div>
                <div class="weight_logs_error">
                    @error('exercise_time')
                    {{ $message }}
                    @enderror
                </div>
                <div class="weight_logs_add-content">
                    <div class="weight_logs_add-content-title">運動内容</div>
                    <textarea class="weight_logs_add-content-main" name="exercise_content" >{{ $weight_log->exercise_content }}</textarea>
                </div>
                <div class="weight_logs_error">
                    @error('exercise_content')
                    {{ $message }}
                    @enderror
                </div>
                <div class="weight_logs_add-button">
                    <a href="/weight_logs" class="weight_logs_add-buck">戻る</a>
                    <button class="weight_logs_add-button-main" type="submit">更新</button>
                </div>
            </form>
            <form class="weight_logs_delete" action="{{ route('weight_logs.delete',['id' => $weight_log->id] )}}" method="post" >
                @method('DELETE')
                @csrf
            <div class="weight_logs_delete-button">
                <input type="hidden" name="id" value="{{ $weight_log['id'] }}">
                <button class="weight_logs_delete-button-main" type="submit">
                    <img src="" alt="ゴミ箱" class="weight_logs_delete_icon">
                    削除
                </button>
            </div>
            </form>
        </div>
    </div>
</body>