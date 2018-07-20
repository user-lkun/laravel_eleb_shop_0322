<div class="btn-group-vertical" role="group" aria-label="Vertical button group">
            <div class="btn-group" role="group">
                <button id="btnGroupVerticalDrop3" type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    个人管理
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop3">
                    <li><a href="{{route('membercenters.show',[auth()->user()->id])}}">个人详情</a></li>
                    <li><a href="{{route('membercenters.edit',[auth()->user()->id])}}">修改个人信息</a></li>
                </ul>
            </div>
            <div class="btn-group" role="group">
                <button id="btnGroupVerticalDrop3" type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    菜品分类管理
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop3">
                    <li><a href="{{ route('menucategories.index') }}">分类列表</a></li>
                    <li><a href="{{ route('menucategories.create') }}">添加分类</a></li>
                </ul>
            </div>
            <div class="btn-group" role="group">
                <button id="btnGroupVerticalDrop3" type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    菜品管理
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop3">
                    <li><a href="{{ route('menus.index') }}">菜品列表</a></li>
                    <li><a href="{{ route('menus.create') }}">添加菜品</a></li>
                </ul>
            </div>

            <div class="btn-group" role="group">
                <button id="btnGroupVerticalDrop3" type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    ------管理
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop3">
                    <li><a href="#">Dropdown link</a></li>
                    <li><a href="#">Dropdown link</a></li>
                </ul>
            </div>
            <button type="button" class="btn btn-default">单个</button>

</div>