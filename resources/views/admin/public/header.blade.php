<div class="top_man bw_head">
    <span class="title">后台管理系统</span>
    <ul class="layui-nav layui-layout-right dang_la_out" lay-filter="nepadmin-header">
        <li class="layui-nav-item layui-hide-xs" lay-unselect>
            <a class="label">
                <input type="text" class="input-s" placeholder="请输入关键字" />
                <button class="but_s"></button>
            </a>
        </li>
        <li class="layui-nav-item layui-hide-xs" lay-unselect>
            <a href="#" nepadmin-event="fullscreen">
                <i class="layui-icon user"></i>
                <span class="text">管理员</span>
            </a>
        </li>
        <li class="layui-nav-item layui-hide-xs" lay-unselect>
            <a>
                <i class="layui-icon mess"><b class="mess_num">8</b></i>
            </a>
        </li>
        <li class="layui-nav-item" lay-unselect>
            <a href="#" nepadmin-event="message" title="消息提醒">
                <i class="layui-icon shezhi"></i>
            </a>
        </li>
        <li class="layui-nav-item" lay-unselect>
            <a class="layui-hide-xs" href="{{ url('admin/logout') }}">
                <i class="layui-icon exit"></i>
            </a>
        </li>
    </ul>
</div>
