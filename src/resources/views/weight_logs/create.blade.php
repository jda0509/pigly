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
    <div class="weight_logs_add">
        <div class="weight_logs_add-header">
            <h2 class="weight_logs_add-header-title">
                Weight Logを追加
            </h2>
        </div>
        <div class="weight_logs_add-content">
            <form class="add" action="{{ route('weight_logs.store') }}" method="post" >
            @csrf
                <div class="weight_logs_add-date">
                    <div class="weight_logs_add-date-title">日付</div>
                    <div class="weight_logs_add-required">必須</div>
                    <input class="weight_logs_add-date-main" type="date" name="date" value="{{ date('Y-m-d') }}" />
                </div>
                <div class="weight_logs_error">
                    @error('date')
                    {{ $message }}
                    @enderror
                </div>
                <div class="weight_logs-add-weight">
                    <div class="weight_logs_add-weight-title">体重</div>
                    <div class="weight_logs_add-required">必須</div>
                    <input class="weight_logs_add-weight-main" type="number" name="weight" step="0.1" placeholder="50.0" value="{{ old('weight') }}"/>
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
                    <input class="weight_logs_add-calories-main" type="number" name="calories" placeholder="1200" value="{{ old('calories') }}" />
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
                    <input class="weight_logs_add-exercise-main" type="time" name="exercise_time" placeholder="00:00" value="{{ old('exercise_time','00:00') }}" />
                </div>
                <div class="weight_logs_error">
                    @error('exercise_time')
                    {{ $message }}
                    @enderror
                </div>
                <div class="weight_logs_add-content">
                    <div class="weight_logs_add-content-title">運動内容</div>
                    <textarea class="weight_logs_add-content-main" name="exercise_content" placeholder="運動内容を追加">{{ old('exercise_content') }}</textarea>
                </div>
                <div class="weight_logs_error">
                    @error('exercise_content')
                    {{ $message }}
                    @enderror
                </div>
                <div class="weight_logs_add-button">
                    <a href="/weight_logs" class="weight_logs_add-buck">戻る</a>
                    <button class="weight_logs_add-button-main" type="submit">登録</button>
                </div>
            </form>
        </div>
    </div>
</body>