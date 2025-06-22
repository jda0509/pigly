<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PiGLy</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/weight_logs.css') }}" />
</head>
<body>
    <header class="pigly_header">
        <h2 class="pigly_title">PiGLy</h2>
        <nav class="pigly_link">
            <ul class="pigly_link_menu">
                <li class="target_weight_menu">
                    <a class="target_weight-link" href="/weight_logs/goal_setting">
                    <img class="target_weight_img" src="" alt="歯車のアイコン">
                    目標体重設定
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
        <div class="weight_main">
            <div class="weight_detail">
                <div class="weight_detail_target">
                    <div class="weight_detail_target-title">目標体重</div>
                    <div class="weight_detail_target-wrapper">
                        <span class="weight_detail_target-weight">{{ ($target_weight->target_weight) }}</span>
                        <span class="weight_detail_unit">kg</span>
                    </div>
                </div>
                <div class="weight_detail_diff">
                    @if(!is_null($diff))
                    <div class="weight_detail_diff-title">目標体重まで</div>
                    <div class="weight_detail_diff-wrapper">
                        <span class="weight_detail_diff-weight">{{ number_format($diff,1) }}</span>
                        <span class="weight_detail_unit">kg</span>
                    </div>
                    @else
                    <div class="weight_detail_diff-error">目標体重か現在体重が未登録です</div>
                    @endif
                </div>
                <div class="weight_detail_current">
                    <div class="weight_detail_current-title">最新体重</div>
                        <div class="weight_detail_current-wrapper">
                            <span class="weight_detail_current-weight">
                            @if ($current_weight) {{ $current_weight }}</span>
                                <span class="weight_detail_unit">kg</span>
                            @else
                                <p>まだ体重が登録されていません</p>
                            @endif
                        </div>
                </div>
            </div>

            <div class="weight_log">
                <div class="weight_log_box">
                    <form action="/weight_logs/search" class="search-form" method="get">
                        @csrf
                        <div class="search-form__row">
                            <div class="search-form__item">
                                <input class="search-form__item-input-start" type="date" name="start_date" />
                                <div class="search-form__item-text">〜</div>
                                <input class="search-form__item-input-end" type="date" name="end_date" />
                            </div>
                            <div class="search-form__button">
                                <button class="search-form__button-submit">検索</button>
                            </div>
                        </div>
                    </form>
                    <div class="weight_log-add">
                        <a href="/weight_logs/create" class="weight_log-add-link">データ追加</a>
                    </div>
                </div>

                <table class="weight_table">
                    <tr class="weight_row">
                        <th class="weight_label">日付</th>
                        <th class="weight_label">体重</th>
                        <th class="weight_label">食事摂取カロリー</th>
                        <th class="weight_label">運動時間</th>
                        <th class="weight_label"></th>
                    </tr>
                    @foreach( $weight_logs as $weight_log )
                    <tr class="weight_row">
                        <td class="weight_logs-detail">{{ $weight_log->date }}</td>
                        <td class="weight_logs-detail">{{ $weight_log->weight }}kg</td>
                        <td class="weight_logs-detail">{{ $weight_log->calories }}cal</td>
                        <td class="weight_logs-detail">{{ $weight_log->exercise_time }}</td>
                        <td class="weight_logs-detail">
                            <a href="{{ route('weight_logs.show',['id' => $weight_log->id]) }}" class="weight_logs-detail-link">
                                <img class="weight_logs-detail-link_icon" src="" alt="編集">
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </table>
                <div class="pagination-content">
                    {{ $weight_logs->appends(request()->query())->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </main>
</body>
</html>