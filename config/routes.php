<?php
/**
 * Auth: sjh
 * Created: 2018/7/26 14:04
 */
use NoahBuscher\Macaw\Macaw;

Macaw::get('index', 'IndexController@index');
Macaw::get('login', 'IndexController@login');

Macaw::get('(:all)', function($fu) {
    echo '未匹配到路由<br>'.$fu;
});

Macaw::dispatch();