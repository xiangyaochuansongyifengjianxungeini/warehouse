<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

//根据域名访问指定数据库
$server_name = $_SERVER['SERVER_NAME'];
switch ($server_name){
    default:
        $database = [
//          'hostname'        => 'demo.xiaoyuanbangong.com',
//          // 数据库名
//          'database'        => 'demo',
//          // 用户名
//          'username'        => 'demo',
//          // 密码
//          'password'        => 'Demo2018',

            //   'hostname'        => 'peixun.xiaoyuanbangong.com',
            //   // 数据库名
            //   'database'        => 'peixun',
            //   // 用户名
            //   'username'        => 'peixun',
            //   // 密码
            //   'password'        => 'Peixun2019',


//            'hostname'        => 'tianwai.xiaoyuanbangong.com',
//            // 数据库名
//            'database'        => 'tianwai',
//            // 用户名
//            'username'        => 'tianwai',
//            // 密码
//            'password'        => 'Tianwai-2019',

//            'hostname'        => 'baihua.xiaoyuanbangong.com',
//            // 数据库名
//            'database'        => 'baihua',
//            // 用户名
//            'username'        => 'baihua',
//            // 密码
//            'password'        => 'Baihua2018',


//            'hostname'        => 'duanzhou.xiaoyuanbangong.com',
//            // 数据库名
//            'database'        => 'duanzhou',
//            // 用户名
//            'username'        => 'duanzhou',
//            // 密码
//            'password'        => 'Duanzhou2018',

        //   'hostname'        => 'gz4z.xiaoyuanbangong.com',
        //   // 数据库名
        //   'database'        => 'gz4z',
        //   // 用户名
        //   'username'        => 'gz4z',
        //   // 密码
        //   'password'        => 'Gz4z2018',

        //    'hostname'        => 'hs2f.xiaoyuanbangong.com',
        //    // 数据库名
        //    'database'        => 'hs2f',
        //    // 用户名
        //    'username'        => 'hs2f',
        //    // 密码
        //    'password'        => 'Hs2f2018',

//            'hostname'        => 'huaqiao.xiaoyuanbangong.com',
//            // 数据库名
//            'database'        => 'huaqiao',
//            // 用户名
//            'username'        => 'huaqiao',
//            // 密码
//            'password'        => 'Huaqiao2018',
//
//             'hostname'        => 'huaying.xiaoyuanbangong.com',
//             // 数据库名
//             'database'        => 'huaying',
//             // 用户名
//             'username'        => 'huaying',
//             // 密码
//             'password'        => 'Huaying2018',

        //    'hostname'        => 'kuangzhong.xiaoyuanbangong.com',
        //    // 数据库名
        //    'database'        => 'kuangzhong',
        //    // 用户名
        //    'username'        => 'kuangzhong',
        //    // 密码
        //    'password'        => 'Kuangzhong2018',

        //    'hostname'        => 'user.xiaoyuanbangong.com',
        //    // 数据库名
        //    'database'        => 'user',
        //    // 用户名
        //    'username'        => 'user',
        //    // 密码
        //    'password'        => 'User2018',



//            'hostname'        => 'xhhq.xiaoyuanbangong.com',
//            // 数据库名
//            'database'        => 'xhhq',
//            // 用户名
//            'username'        => 'xhhq',
//            // 密码
//            'password'        => 'Xhhq2018',


//            'hostname'        => 'xinya.xiaoyuanbangong.com',
//            // 数据库名
//            'database'        => 'xinya',
//            // 用户名
//            'username'        => 'xinya',
//            // 密码
//            'password'        => 'Xinya2018',

//            'hostname'        => 'xiwai.xiaoyuanbangong.com',
//            // 数据库名
//            'database'        => 'xiwai',
//            // 用户名
//            'username'        => 'xiwai',
//            // 密码
//            'password'        => 'Xiwai2019',


//            'hostname'        => 'peixun1.xiaoyuanbangong.com',
//            // 数据库名
//            'database'        => 'peixun1',
//            // 用户名
//            'username'        => 'peixun1',
//            // 密码
//            'password'        => 'Peixun2019',



//            'hostname'        => 'peixun2.xiaoyuanbangong.com',
//            // 数据库名
//            'database'        => 'peixun2',
//            // 用户名
//            'username'        => 'peixun2',
//            // 密码
//            'password'        => 'Peixun2019',


//            'hostname'        => 'peixun3.xiaoyuanbangong.com',
//            // 数据库名
//            'database'        => 'peixun3',
//            // 用户名
//            'username'        => 'peixun3',
//            // 密码
//            'password'        => 'Peixun2019',

//              'hostname'        => 'tieyi.xiaoyuanbangong.com',
//              // 数据库名
//              'database'        => 'tieyi',
//              // 用户名
//              'username'        => 'tieyi',
//              // 密码
//              'password'        => 'Tieyi2019',

//
//              'hostname'        => 'tieyi.xiaoyuanbangong.com',
//              // 数据库名
//              'database'        => 'tieyi',
//              // 用户名
//              'username'        => 'tieyi',
//              // 密码
//              'password'        => 'Tieyi2019',


//            'hostname'        => 'huadi.xiaoyuanbangong.com',
//            // 数据库名
//            'database'        => 'huadi',
//            // 用户名
//            'username'        => 'huadi',
//            // 密码
//            'password'        => 'Huadi-2019',

//            'hostname'        => 'install.xiaoyuanbangong.com',
//            // 数据库名
//            'database'        => 'install',
//            // 用户名
//            'username'        => 'install',
//            // 密码
//            'password'        => 'Install2018',

//
//            'hostname'        => 'tingyinhu.xiaoyuanbangong.com',
//            // 数据库名
//            'database'        => 'tingyinhu',
//            // 用户名
//            'username'        => 'tingyinhu',
//            // 密码
//            'password'        => 'Tingyinhu2019',

//            'hostname'        => 'longsheng.xiaoyuanbangong.com',
//            // 数据库名
//            'database'        => 'longsheng',
//            // 用户名
//            'username'        => 'longsheng',
//            // 密码
//            'password'        => 'Longsheng2019',

//            'hostname'        => 'boai.xiaoyuanbangong.com',
//            // 数据库名
//            'database'        => 'boai',
//            // 用户名
//            'username'        => 'boai',
//            // 密码
//            'password'        => 'boai.xiaoyuanbangong.com',

        //    'hostname'        => 'hdsy.xiaoyuanbangong.com',
        //    // 数据库名
        //    'database'        => 'hdsy',
        //    // 用户名
        //    'username'        => 'hdsy',
        //    // 密码
        //    'password'        => 'Hdsy2019',

//            'hostname'        => 'beijiang.xiaoyuanbangong.com',
//            // 数据库名
//            'database'        => 'beijiang',
//            // 用户名
//            'username'        => 'beijiang',
//            // 密码
//            'password'        => 'Beijiang2019',

           'hostname'        => 'ssyx.xiaoyuanbangong.com',
           // 数据库名
           'database'        => 'shengshi',
           // 用户名
           'username'        => 'shengshi',
           // 密码
           'password'        => 'Shengshi2019',

//            'hostname'        => 'sdfrxx.xiaoyuanbangong.com',
//            // 数据库名
//            'database'        => 'sdfrxx',
//            // 用户名
//            'username'        => 'sdfrxx',
//            // 密码
//            'password'        => 'Sdfrxx2019',

//            'hostname'        => '123.xiaoyuanbangong.com',
//            // 数据库名
//            'database'        => 'yiersan',
//            // 用户名
//            'username'        => 'yiersan',
//            // 密码
//            'password'        => 'Yiersan2019',

        //   'hostname'        => 'zzj.xiaoyuanbangong.com',
        //   // 数据库名
        //   'database'        => 'zzj',
        //   // 用户名
        //   'username'        => 'zzj',
        //   // 密码
        //   'password'        => 'Zzj2019',

//            'hostname'        => 'jnwgy.xiaoyuanbangong.com',
//            // 数据库名
//            'database'        => 'jnwgy',
//            // 用户名
//            'username'        => 'jnwgy',
//            // 密码
//            'password'        => 'Jnwgy2019',

//            'hostname'        => 'nanhai.xiaoyuanbangong.com',
//            // 数据库名
//            'database'        => 'nanhai',
//            // 用户名
//            'username'        => 'nanhai',
//            // 密码
//            'password'        => 'Nanhai2019',

        //    'hostname'        => 'xipei.xiaoyuanbangong.com',
        //    // 数据库名
        //    'database'        => 'xipei',
        //    // 用户名
        //    'username'        => 'xipei',
        //    // 密码
        //    'password'        => 'Xipei2019',

//            'hostname'        => 'lunjiao.xiaoyuanbangong.com',
//            // 数据库名
//            'database'        => 'lunjiao',
//            // 用户名
//            'username'        => 'lunjiao',
//            // 密码
//            'password'        => 'Lunjiao2019',


//
//            'hostname'        => '16.xiaoyuanbangong.com',
//            // 数据库名
//            'database'        => 'gz16',
//            // 用户名
//            'username'        => 'gz16',
//            // 密码
//            'password'        => 'Gz162019',

//            'hostname'        => 'tianwai.xiaoyuanbangong.com',
//            // 数据库名
//            'database'        => 'tianwai',
//            // 用户名
//            'username'        => 'tianwai',
//            // 密码
//            'password'        => 'Tianwai-2019',

//            'hostname'        => 'zhenguang.xiaoyuanbangong.com',
//            // 数据库名
//            'database'        => 'zhenguang',
//            // 用户名
//            'username'        => 'zhenguang',
//            // 密码
//            'password'        => 'Zhenguang2019',


            // 'hostname'        => '16.xiaoyuanbangong.com',
            // // 数据库名
            // 'database'        => 'gz16',
            // // 用户名
            // 'username'        => 'gz16',
            // // 密码
            // 'password'        => 'Gz162019',


//            'hostname'        => 'licheng.xiaoyuanbangong.com',
//            // 数据库名
//            'database'        => 'licheng',
//            // 用户名
//            'username'        => 'licheng',
//            // 密码
//            'password'        => 'Licheng2019',

        //   'hostname'        => 'yucai.xiaoyuanbangong.com',
        //   // 数据库名
        //   'database'        => 'yucai',
        //   // 用户名
        //   'username'        => 'yucai',
        //   // 密码
        //   'password'        => 'Yucai2019',

//            'hostname'        => 'dongchong.xiaoyuanbangong.com',
//            // 数据库名
//            'database'        => 'dongchong',
//            // 用户名
//            'username'        => 'dongchong',
//            // 密码
//            'password'        => 'Dongchong2019',

//            'hostname'        => 'jindao.xiaoyuanbangong.com',
//            // 数据库名
//            'database'        => 'jindao',
//            // 用户名
//            'username'        => 'jindao',
//            // 密码
//            'password'        => 'Jindao2019',

//            'hostname'        => '24.xiaoyuanbangong.com',
//            // 数据库名
//            'database'        => '24zhong',
//            // 用户名
//            'username'        => '24zhong',
//            // 密码
//            'password'        => '24Zhong2019',

//            'hostname'        => 'fengcheng.xiaoyuanbangong.com',
//            // 数据库名
//            'database'        => 'fengcheng',
//            // 用户名
//            'username'        => 'fengcheng',
//            // 密码
//            'password'        => 'Fengcheng2019',

//            'hostname'        => 'gyxx.xiaoyuanbangong.com',
//            // 数据库名
//            'database'        => 'gyxx',
//            // 用户名
//            'username'        => 'gyxx',
//            // 密码
//            'password'        => 'Gyxx2019',

//            'hostname'        => 'xiuwai.xiaoyuanbangong.com',
//            // 数据库名
//            'database'        => 'xiuwai',
//            // 用户名
//            'username'        => 'xiuwai',
//            // 密码
//            'password'        => 'Xiuwai-2019',

//            'hostname'        => 'xqzx.xiaoyuanbangong.com',
//            // 数据库名
//            'database'        => 'xqzx',
//            // 用户名
//            'username'        => 'xqzx',
//            // 密码
//            'password'        => 'Xqzx-2019',

//            'hostname'        => 'ljyx.xiaoyuanbangong.com',
//            // 数据库名
//            'database'        => 'ljyx',
//            // 用户名
//            'username'        => 'ljyx',
//            // 密码
//            'password'        => 'Ljyx-2019',

//            'hostname'        => 'ljex.xiaoyuanbangong.com',
//            // 数据库名
//            'database'        => 'ljex',
//            // 用户名
//            'username'        => 'ljex',
//            // 密码
//            'password'        => 'Ljex-2019',

//            'hostname'        => 'ljwx.xiaoyuanbangong.com',
//            // 数据库名
//            'database'        => 'ljwx',
//            // 用户名
//            'username'        => 'ljwx',
//            // 密码
//            'password'        => 'Ljwx-2019',

//            'hostname'        => 'ljlx.xiaoyuanbangong.com',
//            // 数据库名
//            'database'        => 'ljlx',
//            // 用户名
//            'username'        => 'ljlx',
//            // 密码
//            'password'        => 'Ljlx-2019',

//            'hostname'        => 'zj21z.xiaoyuanbangong.com',
//            // 数据库名
//            'database'        => 'zj21z',
//            // 用户名
//            'username'        => 'zj21z',
//            // 密码
//            'password'        => 'Zj21z-2019',

//            'hostname'        => 'kfqwgy.xiaoyuanbangong.com',
//            // 数据库名
//            'database'        => 'kfqwgy',
//            // 用户名
//            'username'        => 'kfqwgy',
//            // 密码
//            'password'        => 'Kfqwgy-2019',

//            'hostname'        => 'yzxx.xiaoyuanbangong.com',
//            // 数据库名
//            'database'        => 'yzxx',
//            // 用户名
//            'username'        => 'yzxx',
//            // 密码
//            'password'        => 'Yzxx-2019',

        ];
        break;
    case 'demo.xiaoyuanbangong.com':
        $database = [
            'hostname'        => 'demo.xiaoyuanbangong.com',
            // 数据库名
            'database'        => 'demo',
            // 用户名
            'username'        => 'demo',
            // 密码
            'password'        => 'Demo2018',
        ];
        break;
    case 'baihua.xiaoyuanbangong.com':
        $database = [
            'hostname'        => 'baihua.xiaoyuanbangong.com',
            // 数据库名
            'database'        => 'baihua',
            // 用户名
            'username'        => 'baihua',
            // 密码
            'password'        => 'Baihua2018',
        ];
        break;
    case 'duanzhou.xiaoyuanbangong.com':
        $database = [
            'hostname'        => 'duanzhou.xiaoyuanbangong.com',
            // 数据库名
            'database'        => 'duanzhou',
            // 用户名
            'username'        => 'duanzhou',
            // 密码
            'password'        => 'Duanzhou2018',
        ];
        break;
    case 'gz4z.xiaoyuanbangong.com':
        $database = [
            'hostname'        => 'gz4z.xiaoyuanbangong.com',
            // 数据库名
            'database'        => 'gz4z',
            // 用户名
            'username'        => 'gz4z',
            // 密码
            'password'        => 'Gz4z2018',
        ];
        break;
    case 'hs2f.xiaoyuanbangong.com':
        $database = [
            'hostname'        => 'hs2f.xiaoyuanbangong.com',
            // 数据库名
            'database'        => 'hs2f',
            // 用户名
            'username'        => 'hs2f',
            // 密码
            'password'        => 'Hs2f2018',
        ];
        break;
    case 'huaqiao.xiaoyuanbangong.com':
        $database = [
            'hostname'        => 'huaqiao.xiaoyuanbangong.com',
            // 数据库名
            'database'        => 'huaqiao',
            // 用户名
            'username'        => 'huaqiao',
            // 密码
            'password'        => 'Huaqiao2018',
        ];
        break;
    case 'huaying.xiaoyuanbangong.com':
        $database = [
            'hostname'        => 'huaying.xiaoyuanbangong.com',
            // 数据库名
            'database'        => 'huaying',
            // 用户名
            'username'        => 'huaying',
            // 密码
            'password'        => 'Huaying2018',
        ];
        break;
    case 'kuangzhong.xiaoyuanbangong.com':
        $database = [
            'hostname'        => 'kuangzhong.xiaoyuanbangong.com',
            // 数据库名
            'database'        => 'kuangzhong',
            // 用户名
            'username'        => 'kuangzhong',
            // 密码
            'password'        => 'Kuangzhong2018',
        ];
        break;
    case 'user.xiaoyuanbangong.com':
        $database = [
            'hostname'        => 'user.xiaoyuanbangong.com',
            // 数据库名
            'database'        => 'user',
            // 用户名
            'username'        => 'user',
            // 密码
            'password'        => 'User2018',
        ];
        break;
    case 'xhhq.xiaoyuanbangong.com':
        $database = [
            'hostname'        => 'xhhq.xiaoyuanbangong.com',
            // 数据库名
            'database'        => 'xhhq',
            // 用户名
            'username'        => 'xhhq',
            // 密码
            'password'        => 'Xhhq2018',
        ];
        break;
    case 'xinya.xiaoyuanbangong.com':
        $database = [
            'hostname'        => 'xinya.xiaoyuanbangong.com',
            // 数据库名
            'database'        => 'xinya',
            // 用户名
            'username'        => 'xinya',
            // 密码
            'password'        => 'Xinya2018',
        ];
        break;
    case 'xiwai.xiaoyuanbangong.com':
        $database = [
            'hostname'        => 'xiwai.xiaoyuanbangong.com',
            // 数据库名
            'database'        => 'xiwai',
            // 用户名
            'username'        => 'xiwai',
            // 密码
            'password'        => 'Xiwai2019',
        ];
        break;
    case 'peixun.xiaoyuanbangong.com':
        $database = [
            'hostname'        => 'peixun.xiaoyuanbangong.com',
            // 数据库名
            'database'        => 'peixun',
            // 用户名
            'username'        => 'peixun',
            // 密码
            'password'        => 'Peixun2019',
        ];
        break;
    case 'peixun1.xiaoyuanbangong.com':
        $database = [
            'hostname'        => 'peixun1.xiaoyuanbangong.com',
            // 数据库名
            'database'        => 'peixun1',
            // 用户名
            'username'        => 'peixun1',
            // 密码
            'password'        => 'Peixun2019',
        ];
        break;
    case 'peixun2.xiaoyuanbangong.com':
        $database = [
            'hostname'        => 'peixun2.xiaoyuanbangong.com',
            // 数据库名
            'database'        => 'peixun2',
            // 用户名
            'username'        => 'peixun2',
            // 密码
            'password'        => 'Peixun2019',
        ];
        break;
    case 'peixun3.xiaoyuanbangong.com':
        $database = [
            'hostname'        => 'peixun3.xiaoyuanbangong.com',
            // 数据库名
            'database'        => 'peixun3',
            // 用户名
            'username'        => 'peixun3',
            // 密码
            'password'        => 'Peixun2019',
        ];
        break;
    case 'tieyi.xiaoyuanbangong.com':
        $database = [
            'hostname'        => 'tieyi.xiaoyuanbangong.com',
            // 数据库名
            'database'        => 'tieyi',
            // 用户名
            'username'        => 'tieyi',
            // 密码
            'password'        => 'Tieyi2019',
        ];
        break;
    case 'huadi.xiaoyuanbangong.com':
        $database = [
            'hostname'        => 'huadi.xiaoyuanbangong.com',
            // 数据库名
            'database'        => 'huadi',
            // 用户名
            'username'        => 'huadi',
            // 密码
            'password'        => 'Huadi-2019',
        ];
        break;
    case 'tingyinhu.xiaoyuanbangong.com':
        $database = [
            'hostname'        => 'tingyinhu.xiaoyuanbangong.com',
            // 数据库名
            'database'        => 'tingyinhu',
            // 用户名
            'username'        => 'tingyinhu',
            // 密码
            'password'        => 'Tingyinhu2019',
        ];
        break;
    case 'longsheng.xiaoyuanbangong.com':
        $database = [
            'hostname'        => 'longsheng.xiaoyuanbangong.com',
            // 数据库名
            'database'        => 'longsheng',
            // 用户名
            'username'        => 'longsheng',
            // 密码
            'password'        => 'Longsheng2019',
        ];
        break;
    case 'boai.xiaoyuanbangong.com':
        $database = [
            'hostname'        => 'boai.xiaoyuanbangong.com',
            // 数据库名
            'database'        => 'boai',
            // 用户名
            'username'        => 'boai',
            // 密码
            'password'        => 'Boai2019',
        ];
        break;
    case 'hdsy.xiaoyuanbangong.com':
        $database = [
            'hostname'        => 'hdsy.xiaoyuanbangong.com',
            // 数据库名
            'database'        => 'hdsy',
            // 用户名
            'username'        => 'hdsy',
            // 密码
            'password'        => 'Hdsy2019',
        ];
        break;
    case 'beijiang.xiaoyuanbangong.com':
        $database = [
            'hostname'        => 'beijiang.xiaoyuanbangong.com',
            // 数据库名
            'database'        => 'beijiang',
            // 用户名
            'username'        => 'beijiang',
            // 密码
            'password'        => 'Beijiang2019',
        ];
        break;
    case 'ssyx.xiaoyuanbangong.com':
        $database = [
            'hostname'        => 'ssyx.xiaoyuanbangong.com',
            // 数据库名
            'database'        => 'shengshi',
            // 用户名
            'username'        => 'shengshi',
            // 密码
            'password'        => 'Shengshi2019',
        ];
        break;
    case 'sdfrxx.xiaoyuanbangong.com':
    $database = [
        'hostname'        => 'sdfrxx.xiaoyuanbangong.com',
        // 数据库名
        'database'        => 'sdfrxx',
        // 用户名
        'username'        => 'sdfrxx',
        // 密码
        'password'        => 'Sdfrxx2019',
    ];
    break;
    case '123.xiaoyuanbangong.com':
        $database = [
            'hostname'        => '123.xiaoyuanbangong.com',
            // 数据库名
            'database'        => 'yiersan',
            // 用户名
            'username'        => 'yiersan',
            // 密码
            'password'        => 'Yiersan2019',
        ];
        break;
    case 'zzj.xiaoyuanbangong.com':
        $database = [
            'hostname'        => 'zzj.xiaoyuanbangong.com',
            // 数据库名
            'database'        => 'zzj',
            // 用户名
            'username'        => 'zzj',
            // 密码
            'password'        => 'Zzj2019',
        ];
        break;
    case 'jnwgy.xiaoyuanbangong.com':
        $database = [
            'hostname'        => 'jnwgy.xiaoyuanbangong.com',
            // 数据库名
            'database'        => 'jnwgy',
            // 用户名
            'username'        => 'jnwgy',
            // 密码
            'password'        => 'Jnwgy2019',
        ];
        break;
    case 'nanhai.xiaoyuanbangong.com':
        $database = [
            'hostname'        => 'nanhai.xiaoyuanbangong.com',
            // 数据库名
            'database'        => 'nanhai',
            // 用户名
            'username'        => 'nanhai',
            // 密码
            'password'        => 'Nanhai2019',
        ];
        break;
    case 'xipei.xiaoyuanbangong.com':
        $database = [
            'hostname'        => 'xipei.xiaoyuanbangong.com',
            // 数据库名
            'database'        => 'xipei',
            // 用户名
            'username'        => 'xipei',
            // 密码
            'password'        => 'Xipei2019',
        ];
        break;
    case 'lunjiao.xiaoyuanbangong.com':
        $database = [
            'hostname'        => 'lunjiao.xiaoyuanbangong.com',
            // 数据库名
            'database'        => 'lunjiao',
            // 用户名
            'username'        => 'lunjiao',
            // 密码
            'password'        => 'Lunjiao2019',
        ];
        break;
   //广州市天河外国语学校
    case 'tianwai.xiaoyuanbangong.com':
        $database = [
            'hostname'        => 'tianwai.xiaoyuanbangong.com',
            // 数据库名
            'database'        => 'tianwai',
            // 用户名
            'username'        => 'tianwai',
            // 密码
            'password'        => 'Tianwai-2019',
        ];
        break;
    //广州市真光中学
    case 'zhenguang.xiaoyuanbangong.com':
    $database = [
        'hostname'        => 'zhenguang.xiaoyuanbangong.com',
        // 数据库名
        'database'        => 'zhenguang',
        // 用户名
        'username'        => 'zhenguang',
        // 密码
        'password'        => 'Zhenguang2019',
    ];
    break;
    //广州市第十六学校
    case '16.xiaoyuanbangong.com':
        $database = [
            'hostname'        => '16.xiaoyuanbangong.com',
            // 数据库名
            'database'        => 'gz16',
            // 用户名
            'username'        => 'gz16',
            // 密码
            'password'        => 'Gz162019',
        ];
    break;
    //增城市荔城中学
    case 'licheng.xiaoyuanbangong.com':
        $database = [
            'hostname'        => 'licheng.xiaoyuanbangong.com',
            // 数据库名
            'database'        => 'licheng',
            // 用户名
            'username'        => 'licheng',
            // 密码
            'password'        => 'Licheng2019',
        ];
    break;
    //广州市育才中学
    case 'yucai.xiaoyuanbangong.com':
        $database = [
            'hostname'        => 'yucai.xiaoyuanbangong.com',
            // 数据库名
            'database'        => 'yucai',
            // 用户名
            'username'        => 'yucai',
            // 密码
            'password'        => 'Yucai2019',
        ];
    break;
    //广州市南沙东涌中学
    case 'dongchong.xiaoyuanbangong.com':
        $database = [
            'hostname'        => 'dongchong.xiaoyuanbangong.com',
            // 数据库名
            'database'        => 'dongchong',
            // 用户名
            'username'        => 'dongchong',
            // 密码
            'password'        => 'Dongchong2019',
        ];
    break;
    //广州市金道中学
    case 'jindao.xiaoyuanbangong.com':
        $database = [
            'hostname'        => 'jindao.xiaoyuanbangong.com',
            // 数据库名
            'database'        => 'jindao',
            // 用户名
            'username'        => 'jindao',
            // 密码
            'password'        => 'Jindao2019',
        ];
     break;
    //广州市第二十四中学
    case '24.xiaoyuanbangong.com':
        $database = [
            'hostname'        => '24.xiaoyuanbangong.com',
            // 数据库名
            'database'        => '24zhong',
            // 用户名
            'username'        => '24zhong',
            // 密码
            'password'        => '24Zhong2019',
        ];
    break;
    //佛山凤城实验中学
    case 'fengcheng.xiaoyuanbangong.com':
        $database = [
            'hostname'        => 'fengcheng.xiaoyuanbangong.com',
            // 数据库名
            'database'        => 'fengcheng',
            // 用户名
            'username'        => 'fengcheng',
            // 密码
            'password'        => 'Fengcheng2019',
        ];
    break;
    //广雅小学
    case 'gyxx.xiaoyuanbangong.com':
        $database = [
            'hostname'        => 'gyxx.xiaoyuanbangong.com',
            // 数据库名
            'database'        => 'gyxx',
            // 用户名
            'username'        => 'gyxx',
            // 密码
            'password'        => 'Gyxx2019',
        ];
        break;
    //花都区秀全外国语学院
    case 'xiuwai.xiaoyuanbangong.com':
    $database = [
        'hostname'        => 'xiuwai.xiaoyuanbangong.com',
        // 数据库名
        'database'        => 'xiuwai',
        // 用户名
        'username'        => 'xiuwai',
        // 密码
        'password'        => 'Xiuwai-2019',
    ];
    break;
    //广州市花都区秀全中学
    case 'xqzx.xiaoyuanbangong.com':
        $database = [
            'hostname'        => 'xqzx.xiaoyuanbangong.com',
            // 数据库名
            'database'        => 'xqzx',
            // 用户名
            'username'        => 'xqzx',
            // 密码
            'password'        => 'Xqzx-2019',
        ];
    break;
        //湛江市廉江第一小学
        case 'ljyx.xiaoyuanbangong.com':
            $database = [
                'hostname'        => 'ljyx.xiaoyuanbangong.com',
                // 数据库名
                'database'        => 'ljyx',
                // 用户名
                'username'        => 'ljyx',
                // 密码
                'password'        => 'Ljyx-2019',
            ];
        break;
            //湛江市廉江第二小学
    case 'ljex.xiaoyuanbangong.com':
        $database = [
            'hostname'        => 'ljex.xiaoyuanbangong.com',
            // 数据库名
            'database'        => 'ljex',
            // 用户名
            'username'        => 'ljex',
            // 密码
            'password'        => 'Ljex-2019',
        ];
    break;
        //湛江市廉江第五小学
        case 'ljwx.xiaoyuanbangong.com':
            $database = [
                'hostname'        => 'ljwx.xiaoyuanbangong.com',
                // 数据库名
                'database'        => 'ljwx',
                // 用户名
                'username'        => 'ljwx',
                // 密码
                'password'        => 'Ljwx-2019',
            ];
        break;
            //湛江市廉江第六小学
    case 'ljlx.xiaoyuanbangong.com':
        $database = [
            'hostname'        => 'ljlx.xiaoyuanbangong.com',
            // 数据库名
            'database'        => 'ljlx',
            // 用户名
            'username'        => 'ljlx',
            // 密码
            'password'        => 'Ljlx-2019',
        ];
    break;
        //湛江市第二十一中学
        case 'zj21z.xiaoyuanbangong.com':
            $database = [
                'hostname'        => 'zj21z.xiaoyuanbangong.com',
                // 数据库名
                'database'        => 'zj21z',
                // 用户名
                'username'        => 'zj21z',
                // 密码
                'password'        => 'Zj21z-2019',
            ];
        break;
         //黄埔开发区外国语学校
         case 'kfqwgy.xiaoyuanbangong.com':
            $database = [
                'hostname'        => 'kfqwgy.xiaoyuanbangong.com',
                // 数据库名
                'database'        => 'kfqwgy',
                // 用户名
                'username'        => 'kfqwgy',
                // 密码
                'password'        => 'Kfqwgy-2019',
            ];
        break;
        //中山市烟洲小学
        case 'yzxx.xiaoyuanbangong.com':
        $database = [
            'hostname'        => 'yzxx.xiaoyuanbangong.com',
            // 数据库名
            'database'        => 'yzxx',
            // 用户名
            'username'        => 'yzxx',
            // 密码
            'password'        => 'Yzxx-2019',
        ];
    break;
}
$peizhi = [
    'type'            => 'mysql',
    // 端口
    'hostport'        => '',
    // 连接dsn
    'dsn'             => '',
    // 数据库连接参数
    'params'          => [],
    // 数据库编码默认采用utf8
    'charset'         => 'utf8',
    // 数据库表前缀
    'prefix'          => '',
    // 数据库调试模式
    'debug'           => true,
    // 数据库部署方式:0 集中式(单一服务器),1 分布式(主从服务器)
    'deploy'          => 0,
    // 数据库读写是否分离 主从式有效
    'rw_separate'     => false,
    // 读写分离后 主服务器数量
    'master_num'      => 1,
    // 指定从服务器序号
    'slave_no'        => '',
    // 是否严格检查字段是否存在
    'fields_strict'   => true,
    // 数据集返回类型
    'resultset_type'  => 'array',
    // 自动写入时间戳字段
    'auto_timestamp'  => false,
    // 时间字段取出后的默认时间格式
    'datetime_format' => 'Y-m-d H:i:s',
    // 是否需要进行SQL性能分析
    'sql_explain'     => false,
];

return array_merge($database,$peizhi);
