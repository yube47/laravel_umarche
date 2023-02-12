@props([
    <!-- 連想配列。1つ設定したらすべて必要 -->
        'title' => '',
        'message' => '初期値です',
        'content' => '初期値だよ',
])

<div class="border-2 shadow-md w-1/4 p-2">
    <div>{{ $title }}</div>
    <div>画像</div>
    <div>{{ $content }}</div>
    <div>{{ $message }}</div>
</div>
