# laravel-mns
阿里云消息服务（即MNS PHP SDK封装成laravel适配的mns）

##install
    composer require chichoyi/laravel-mns
    
##config
Add following service providers into your providers array in config/app.php
   
    Chichoyi\LaravelMNS\LaravelMNSServiceProvider::class

Edit your config/queue.php, add mns connection

    'mns'        => [
    	'driver'       => 'mns',
    	'key'          => env('QUEUE_MNS_ACCESS_KEY'),
    	'secret'       => env('QUEUE_MNS_SECRET_KEY'),
    	'endpoint'     => env('QUEUE_MNS_ENDPOINT'),
    	'queue'        => env('QUEUE_NAME'),
    	'wait_seconds' => 30,
    ]
    
Edit your .env file

    QUEUE_DRIVER=mns
    QUEUE_NAME=foobar-local
    QUEUE_MNS_ACCESS_KEY=your_acccess_key
    QUEUE_MNS_SECRET_KEY=your_secret_key
    QUEUE_MNS_ENDPOINT=http://12345678910.mns.cn-hangzhou.aliyuncs.com/
    
###Desciption

the aliyun-mns-sdk version is 1.3.5 (latest version)