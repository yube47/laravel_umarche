<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LifeCycleTestController extends Controller
{
    //
    public function showServiceContainerTest(){
        app()->bind('lifeCycleTest', function(){
            return 'ライフサイクルテスト';
        });

        $test = app()->make('lifeCycleTest');

        // サービスコンテナなし
        // $message = new Message();
        // $sample = new Sample($message);
        // $sample->run();

        // サービスコンテナあり（Messageクラスのインスタンスなしに依存関係を解決してくれる）
        //appに紐づけ
        app()->bind('sample', Sample::class);
        //appから取り出す
        $sample = app()->make('sample');
        $sample->run();
        dd($test,app());

    }
}

class Sample{
    public $message;
    // 引数にClassを入れるとインスタンスしてくれる
    public function  __construct(Message $message){
        $this->message = $message;
    }
    public function run(){
        $this->message->send();
    }
}
class Message{
    public function send()
    {
        echo('メッセージ表示');
    }
}
