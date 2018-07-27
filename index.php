<?php
    //引入头部,并开启session
    require_once 'template/head.php';
    require_once 'config.php';
    session_start();
?>
<style>
    .fakeimg {
        height: 200px;
        serverTime
    }
    .about{
        /*color:#00CC99;*/
        /*background-color:#CC9933;*/
        /*border-color:#0000FF;*/
        border: 1px solid #ddd8d8;
    }
    /*.head{*/
        /*background-color:#CC9933;*/
        /*!*border: 1px solid ;*!*/
        /*margin-bottom:10px;*/
    /*}*/
</style>
</head>
<body>
<nav class="navbar navbar-default" role="navigation" style="margin-bottom:0">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target="#example-navbar-collapse">
                <span class="sr-only">切换导航</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div>
            <p class="navbar-text">
                <?php
                if(isset($_SESSION['user']))
                    echo $_SESSION['user'];
                else
                    echo '亲,请登录';
                ?>
            </p>
        </div>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="app/controllers/home/register.php"><span class="glyphicon glyphicon-user"></span>注册</a></li>
            <li><a href="app/controllers/home/login.php"><span class="glyphicon glyphicon-log-in"></span>登录</a></li>
        </ul>
        <div class="collapse navbar-collapse" id="example-navbar-collapse">
            <ul class="nav navbar-nav">
                <li onmouseover="addActiveClass(this);" onmouseout="removeActiveClass(this)"><a href="#">iOS</a></li>
                <li onmouseover="addActiveClass(this);" onmouseout="removeActiveClass(this)"><a href="#">SVN</a></li>
                <li onmouseover="addActiveClass(this);" onmouseout="removeActiveClass(this)"><a href="#">GIT</a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="header" style="background-image: url(http://image.youzhan.org/d/dd/2de797545de56274f03a5920eb3a1.jpg);height:288px;margin-bottom:10px;">
    <div class="container">
        <div class="row clearfix">
            <div class="col-md-12 column">
                <div style="height:50px;">

                </div>
                <h2>
                    Hello,world!
                </h2>
                <h4 class="glyphicon-facetime-video">
                </h4>
                <p>
                </p>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-4 about">
            <h2>About</h2>
            <div class="fakeimg">
                <img style="width:150px;height:auto" src="static/img/sujianhui.jpg" class="img-rounded">
            </div>
            <p>人生是一座富矿，有待于自身去开采。</p>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;____suyin</p>
            <h3>文章列表</h3>
            <p>描述文本。</p>
            <ul class="nav nav-pills nav-stacked">
                <li class="active"><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
            </ul>
            <hr class="hidden-sm hidden-md hidden-lg">
        </div>
        <div class="col-md-8">
            <h2>致自己</h2>
            <h5></h5>
            <div><img style="align-content: center" src="static/img/20180627.gif"></div>
            <p>2018-06-27 21:40:00</p>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;毕业两年了,有人说：“时间，犹如白驹过隙。一眨眼，一年，还是一瞬间?
                时间又好像烤箱里的面包，时间长了，面包就会融化，这也就是时间的痕迹”。一眨眼，说得真好；如今长大了，时间不再像小学寒假那会盼望
                着新年一天如一年。
            </p>
            <p>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;这两年来自己收获了一块腹肌、吸了深圳大城市的气息、看了几本书、
                零零碎碎记了一些似乎存在的技能笔记……我喜欢深圳这座充满着活力的城市，每次下班下地铁我都会在地铁站天桥逗留看看车水马龙的龙岗大道，
                这就是冯翼才人说的：“择一城终老，遇一人白首”。选择了程序员这一行业，好比选择了当公务员一样，除了自己所有人都羡慕的职业，
                也没有网友那三年不开张，开张吃三年好活（多希望那老铁能带我飞）。现实是很残酷的，和大多数一样来自农村孩子很不容易。坚持努力奋斗，让
                每天都过得充实^_^。
            </p>
            <p>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;其实代码敲起来也没有感觉头冷，沉浸于写代码也是一种乐趣，制造BUG修改BUG再制造BUG再修改BUG……
                不觉不知天就黑了。既然选择了就要坚持走下去，毕竟PHP是世界上最好的语言。
            </p>
            <br>
            <h2>标题</h2>
            <h5>副标题</h5>
<!--            <div class="fakeimg">图像</div>-->
            <p>一些文本..</p>
            <p>学的不仅是技术，更是梦想！！！学的不仅是技术，更是梦想！！！学的不仅是技术，更是梦想！！！</p>
        </div>
    </div>
</div>
<?php
    //引入底部
    require_once 'template/foot.php';
?>
<script>
    $(function(){
        //获取服务器的时间
        let serverTime =
            <?php
                function getMillisecond() {
                    list($t1,$t2) = explode(' ', microtime());
                    return (float)sprintf('%.0f',(floatval($t1)+floatval($t2))*1000);
            }
                echo getMillisecond();
            ?>;
        //每秒执行一次addTime函数,实现页面的时间每秒走动
        window.setInterval(function(){
            serverTime+=1000;
            let d = new Date(serverTime);
            let separate = '-';
            $('.glyphicon-facetime-video').text(d.getFullYear()+separate+(d.getMonth()+1)+separate+d.getDate()+' '+d.getHours()+':'+d.getMinutes()+':'+d.getSeconds());
        },1000);
    });
</script>