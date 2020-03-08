<?php
 
return [
    /**
     * 事件相关
     */
    'event' => [
        /**
         * 监听者
         */
        'listeners' => [
            /**
             * 默认的记录事件
             */
            'App\EventsDefaultLoggable' => [
                'App\Listeners\DefaultLogger',
            ],
        ],
 
        /**
         * 模型观察者.
         * 以下添加的模型都被ModelObserver监听和观察
         * 后续添加
         */
        'observers' => [
            \App\Models\User::class,
            \App\Models\Product::class,
            \App\Models\Order::class,
            \App\Models\Warehouse::class,
            \App\Models\Supplier::class,
            \App\Models\System::class,
            \App\Models\AgentRank::class,
        ],

        
        'subscribers' => [

        ],
    ],
];
