<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Brand</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="#">Link</a></li>
                @auth
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">商家管理 <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{route('stopcategory.index')}}">商家分类列表</a></li>
                        <li><a href="{{route('stopcategory.create')}}">添加分类</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="{{route('shop.index')}}">商家列表</a></li>
                        <li><a href="{{route('merchant.index')}}">商家用户列表</a></li>
                        <li><a href="{{route('shop.create')}}">添加商家</a></li>
                        <li><a href="{{route('shop.show',[1])}}">代审核商家</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">活动管理 <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{route('activity.index')}}">活动列表</a></li>
                        <li><a href="{{route('activity.create')}}">添加活动分类</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">用户管理 <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{route('member.index')}}">用户列表</a></li>
                        <li><a href="{{route('member.bidden')}}">被禁用用户列表</a></li>
                    </ul>
                </li>
                @endauth
            </ul>
            <ul class="nav navbar-nav navbar-right">
                @guest
                {{--<li><img src=""></li>--}}
                <li><a href="{{route('user.door')}}">登录</a></li>
                <li><a href="{{route('user.register')}}">注册</a></li>
                @endguest
                @auth
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <span class="glyphicon glyphicon-user"></span> <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{route('user.index')}}">用户中心</a></li>
                        <li><a href="{{route('user.edit')}}">修改密码</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="{{route('user.destroy')}}">退出</a></li>
                    </ul>
                </li>
                @endauth
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>