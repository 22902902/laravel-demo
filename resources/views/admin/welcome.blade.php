@extends('layouts.admin')

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>欢迎页面-X-admin2.0</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
    <link rel="shortcut icon" href="{{ asset('/favicon.ico') }}" type="image/x-icon" />
    @include('admin.public.styles')
    <link rel="stylesheet" href="{{ asset('./css/s_style.css') }}">
    @include('admin.public.script')
    <script type="text/javascript" src="{{ asset('./js/echarts.js') }}"></script>
    <!-- 让IE8/9支持媒体查询，从而兼容栅格 -->
    <!--[if lt IE 9]>
    <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
    <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<div class="x-body layui-anim layui-anim-up">
    <blockquote class="layui-elem-quote s_color1">欢迎管理员：
        <span class="">test</span>！当前时间:2018-04-25 20:50:53
        <i class="icon iconfont close_all">&#xe69a;</i>
    </blockquote>
    <div class="layui-row gaid_con">
        <div class="layui-col-md12">
            <div class="gaid_pad">
                <fieldset class="layui-elem-field">
                    <h1><span>数据统计</span></h1>
                    <div class="layui-field-box">
                        <div class="layui-col-md12">
                            <div class="layui-card">
                                <div class="layui-card-body">
                                    <div class="layui-carousel x-admin-carousel x-admin-backlog" lay-anim="" lay-indicator="inside" lay-arrow="none" style="width: 100%; height: 90px;">
                                        <div carousel-item="">
                                            <ul class="layui-row layui-col-space10 layui-this">
                                                <li class="layui-col-xs2">
                                                    <a href="javascript:;" class="x-admin-backlog-body">
                                                        <h3>文章数</h3>
                                                        <p>
                                                            <cite>66</cite></p>
                                                    </a>
                                                </li>
                                                <li class="layui-col-xs2">
                                                    <a href="javascript:;" class="x-admin-backlog-body">
                                                        <h3>会员数</h3>
                                                        <p>
                                                            <cite>12</cite></p>
                                                    </a>
                                                </li>
                                                <li class="layui-col-xs2">
                                                    <a href="javascript:;" class="x-admin-backlog-body">
                                                        <h3>回复数</h3>
                                                        <p>
                                                            <cite>99</cite></p>
                                                    </a>
                                                </li>
                                                <li class="layui-col-xs2">
                                                    <a href="javascript:;" class="x-admin-backlog-body">
                                                        <h3>商品数</h3>
                                                        <p>
                                                            <cite>67</cite></p>
                                                    </a>
                                                </li>
                                                <li class="layui-col-xs2">
                                                    <a href="javascript:;" class="x-admin-backlog-body">
                                                        <h3>文章数</h3>
                                                        <p>
                                                            <cite>67</cite></p>
                                                    </a>
                                                </li>
                                                <li class="layui-col-xs2">
                                                    <a href="javascript:;" class="x-admin-backlog-body">
                                                        <h3>文章数</h3>
                                                        <p>
                                                            <cite>6766</cite></p>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </div>
        </div>
    </div>
    <div class="layui-row gaid_con">
        <div class="layui-col-md12">
            <div class="gaid_pad">
                <fieldset class="layui-elem-field">
                    <h1><span>系统通知</span></h1>
                    <div class="layui-field-box">
                        <table class="layui-table" lay-skin="line">
                            <tbody>
                            <tr>
                                <td>
                                    <a class="x-a" href="/" target="_blank">新版x-admin 2.0上线了</a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <a class="x-a" href="https://www.layui.com/doc/" target="_blank">系统基于layui修改，详情可参考layui开发文档 <span style="color: #b98860;">https://www.layui.com/doc/</span></a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </fieldset>
            </div>
        </div>
    </div>
    <div class="layui-row gaid_con">
        <div class="layui-col-md6">
            <div class="gaid_pad">
                <fieldset class="layui-elem-field">
                    <h1><span>柱状图</span></h1>
                    <div class="layui-field-box">
                        <div class="tubiao">
                            <div class="pie_bg_m">
                                <i class="i-bg"></i>
                                <div id="EC-1" style="width:100%;height:320px;">
                                </div>
                                <script type="text/javascript">
                                    // 基于准备好的dom，初始化echarts实例
                                    var myChart1 = echarts.init(document.getElementById('EC-1'));

                                    // 指定图表的配置项和数据

                                    var option = {
                                        title: {
                                            text: '监控时间：2018年12月07日 ',
                                            textStyle: {
                                                color: '#666',
                                                fontSize: 12,
                                                fontWeight: '100',
                                            },
                                            top: 10,
                                            left: 5
                                        },
                                        tooltip: {
                                            show: true,
                                            trigger: 'item',
                                        },
                                        grid: {
                                            left: 80,
                                            right: 35,
                                            bottom: 25
                                        },
                                        xAxis: {
                                            type: 'value',
                                            axisLabel: {
                                                interval: 0,
                                                color: ['#666'],
                                                formatter: '{value}ms'
                                            },
                                            axisLine: {
                                                lineStyle: {
                                                    color: '#0785fd',
                                                },
                                            },
                                            axisTick: {
                                                show: false
                                            },
                                            splitArea: {
                                                show: true,
                                                areaStyle: {
                                                    color: ['#f5fcff', '#fff']
                                                }
                                            },
                                            splitLine: {
                                                lineStyle: {
                                                    color: ['#c4e7fd'],
                                                }
                                            },
                                            splitNumber: 8,
                                        },
                                        yAxis: {
                                            type: 'category',
                                            axisLabel: {
                                                interval: 0,
                                                color: ['#666']
                                            },
                                            axisLine: {
                                                lineStyle: {
                                                    color: '#0785fd',
                                                },
                                            },
                                            axisTick: {
                                                show: false
                                            },
                                            data: ['公文搜索', '发布公文', '系统首页', '公文搜索', '系统登录页']
                                        },
                                        series: [{
                                            data: [130, 190, 154, 66, 78],
                                            type: 'bar',
                                            barWidth: 18,
                                            itemStyle: {
                                                normal: {
                                                    //barBorderRadius: 15,
                                                    color: '#70ceff'
                                                }
                                            }
                                        }]
                                    };

                                    // 使用刚指定的配置项和数据显示图表。
                                    myChart1.setOption(option);

                                </script>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </div>
        </div>
        <div class="layui-col-md6">
            <div class="gaid_pad">
                <fieldset class="layui-elem-field">
                    <h1><span>折线图</span></h1>
                    <div class="layui-field-box">
                        <div class="tubiao">
                            <div class="pie_bg_m">
                                <i class="i-bg"></i>
                                <div id="EC-2" style="width:100%;height:320px;">
                                </div>
                                <script type="text/javascript">
                                    // 基于准备好的dom，初始化echarts实例
                                    var myChart2 = echarts.init(document.getElementById('EC-2'));

                                    // 指定图表的配置项和数据

                                    var option = {
                                        color: ['#aec1ef', '#34a4ff'],
                                        tooltip: {
                                            show: true,
                                            trigger: 'axis',
                                            showContent: false,
                                        },
                                        grid: {
                                            left: 50,
                                            right: 35,
                                            bottom: 25
                                        },
                                        legend: {
                                            left: 20,
                                            top: 20,
                                            align: 'right',
                                            itemGap: 20,
                                            itemWidth: 10,
                                            data: [{
                                                name: 'pc端',
                                                icon: 'circle',
                                            }, {
                                                name: '移动端',
                                                icon: 'circle',
                                            }]
                                        },
                                        calculable: true,
                                        xAxis: [{
                                            type: 'category',
                                            boundaryGap: false,
                                            axisLabel: {
                                                interval: 0,
                                                color: ['#666']
                                            },
                                            axisLine: {
                                                lineStyle: {
                                                    color: '#0785fd',
                                                },
                                            },
                                            axisTick: {
                                                show: false
                                            },
                                            data: ['1:00', '11:30', '12:00', '12:30', '13:00', '13:30', '14:00', '14:30', '15:00', '15:30', '16:00', '16:30', '17:00', '17:30', '18:00']
                                        }],
                                        yAxis: {
                                            type: 'value',
                                            axisLabel: {
                                                interval: 0,
                                                color: ['#666']
                                            },
                                            axisLine: {
                                                lineStyle: {
                                                    color: '#0785fd',
                                                },
                                            },
                                            axisTick: {
                                                show: false
                                            },
                                            splitArea: {
                                                show: true,
                                                areaStyle: {
                                                    color: ['#f5fcff', '#fff']
                                                }
                                            },
                                            splitLine: {
                                                lineStyle: {
                                                    color: ['#c4e7fd'],
                                                }
                                            },
                                        },
                                        series: [{
                                            name: '移动端',
                                            type: 'line',
                                            symbolSize: 0,
                                            areaStyle: {
                                                normal: {
                                                    type: 'default',
                                                    color: '#c2d2fc',
                                                    opacity: 1,
                                                }
                                            },
                                            symbol: 'pin',
                                            symbolSize: 90,
                                            symbolOffset: [0, 0],
                                            showSymbol: false,
                                            smooth: true,
                                            lineStyle: {
                                                color: '#b8cbfb',
                                                width: 0,
                                            },
                                            label: {
                                                show: true,
                                                color: '#fff',
                                                color: '#fff',
                                                formatter: '移动端\n{c}人',
                                                position: 'top',
                                                distance: -40,
                                            },
                                            data: [610, 412, 421, 654, 810, 630, 510, 721, 554, 560, 830, 510, 560, 830, 510]
                                        }, {
                                            name: 'pc端',
                                            type: 'line',
                                            symbolSize: 0,
                                            areaStyle: {
                                                normal: {
                                                    type: 'default',
                                                    color: '#5bc0ff',
                                                    opacity: 1,
                                                }
                                            },
                                            smooth: true,
                                            lineStyle: {
                                                color: '#5bc0ff',
                                                width: 0,
                                            },
                                            symbol: 'pin',
                                            symbolSize: 91,
                                            symbolOffset: [0, 0],
                                            showSymbol: false,
                                            smooth: true,
                                            lineStyle: {
                                                color: '#b8cbfb',
                                                width: 0,
                                            },
                                            label: {
                                                show: true,
                                                color: '#fff',
                                                formatter: '移动端\n{c}人',
                                                position: 'top',
                                                distance: -40,
                                            },
                                            data: [236, 375, 380, 449, 214, 267, 442, 318, 357, 193, 421, 391, 235, 546, 256]
                                        }, ]
                                    };

                                    // 使用刚指定的配置项和数据显示图表。
                                    myChart2.setOption(option);

                                </script>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </div>
        </div>
    </div>
    <div class="layui-row gaid_con">
        <div class="layui-col-md12">
            <div class="gaid_pad">
                <fieldset class="layui-elem-field">
                    <div class="layui-tab news_tab">
                        <ul class="layui-tab-title">
                            <li class="layui-this">行边框表格</li>
                            <li>列边框表格</li>
                            <li>无边框表格</li>
                            <li>全边框表格</li>
                            <li>无隔行背景</li>
                            <li>表单</li>
                        </ul>
                        <div class="layui-tab-content">
                            <div class="layui-tab-item layui-show">
                                <table class="layui-table" lay-even="" lay-skin="line">
                                    <thead>
                                    <tr>
                                        <th>
                                            <div class="layui-unselect header layui-form-checkbox" lay-skin="primary"><i class="layui-icon"></i></div>
                                        </th>
                                        <th>ID</th>
                                        <th>用户名</th>
                                        <th>性别</th>
                                        <th>手机</th>
                                        <th>邮箱</th>
                                        <th>地址</th>
                                        <th>加入时间</th>
                                        <th>状态</th>
                                        <th>操作</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>
                                            <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id="2"><i class="layui-icon"></i></div>
                                        </td>
                                        <td>1</td>
                                        <td>小明</td>
                                        <td>男</td>
                                        <td>13000000000</td>
                                        <td>admin@mail.com</td>
                                        <td>北京市 海淀区</td>
                                        <td>2017-01-01 11:11:42</td>
                                        <td class="td-status">
                                            <span class="layui-btn layui-btn-normal layui-btn-mini">已启用</span></td>
                                        <td class="td-manage">
                                            <a class="layui-btn s_color1" onclick="member_stop(this,'10001')" href="javascript:;" title="启用">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color2" title="编辑" onclick="x_admin_show('编辑','member-edit.html',600,400)" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color3" onclick="x_admin_show('修改密码','member-password.html',600,400)" title="修改密码" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color4" title="删除" onclick="member_del(this,'要删除的id')" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id="2"><i class="layui-icon"></i></div>
                                        </td>
                                        <td>1</td>
                                        <td>小明</td>
                                        <td>男</td>
                                        <td>13000000000</td>
                                        <td>admin@mail.com</td>
                                        <td>北京市 海淀区</td>
                                        <td>2017-01-01 11:11:42</td>
                                        <td class="td-status">
                                            <span class="layui-btn layui-btn-normal layui-btn-mini">已启用</span></td>
                                        <td class="td-manage">
                                            <a class="layui-btn s_color1" onclick="member_stop(this,'10001')" href="javascript:;" title="启用">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color2" title="编辑" onclick="x_admin_show('编辑','member-edit.html',600,400)" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color3" onclick="x_admin_show('修改密码','member-password.html',600,400)" title="修改密码" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color4" title="删除" onclick="member_del(this,'要删除的id')" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id="2"><i class="layui-icon"></i></div>
                                        </td>
                                        <td>1</td>
                                        <td>小明</td>
                                        <td>男</td>
                                        <td>13000000000</td>
                                        <td>admin@mail.com</td>
                                        <td>北京市 海淀区</td>
                                        <td>2017-01-01 11:11:42</td>
                                        <td class="td-status">
                                            <span class="layui-btn layui-btn-normal layui-btn-mini">已启用</span></td>
                                        <td class="td-manage">
                                            <a class="layui-btn s_color1" onclick="member_stop(this,'10001')" href="javascript:;" title="启用">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color2" title="编辑" onclick="x_admin_show('编辑','member-edit.html',600,400)" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color3" onclick="x_admin_show('修改密码','member-password.html',600,400)" title="修改密码" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color4" title="删除" onclick="member_del(this,'要删除的id')" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id="2"><i class="layui-icon"></i></div>
                                        </td>
                                        <td>1</td>
                                        <td>小明</td>
                                        <td>男</td>
                                        <td>13000000000</td>
                                        <td>admin@mail.com</td>
                                        <td>北京市 海淀区</td>
                                        <td>2017-01-01 11:11:42</td>
                                        <td class="td-status">
                                            <span class="layui-btn layui-btn-normal layui-btn-mini">已启用</span></td>
                                        <td class="td-manage">
                                            <a class="layui-btn s_color1" onclick="member_stop(this,'10001')" href="javascript:;" title="启用">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color2" title="编辑" onclick="x_admin_show('编辑','member-edit.html',600,400)" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color3" onclick="x_admin_show('修改密码','member-password.html',600,400)" title="修改密码" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color4" title="删除" onclick="member_del(this,'要删除的id')" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id="2"><i class="layui-icon"></i></div>
                                        </td>
                                        <td>1</td>
                                        <td>小明</td>
                                        <td>男</td>
                                        <td>13000000000</td>
                                        <td>admin@mail.com</td>
                                        <td>北京市 海淀区</td>
                                        <td>2017-01-01 11:11:42</td>
                                        <td class="td-status">
                                            <span class="layui-btn layui-btn-normal layui-btn-mini">已启用</span></td>
                                        <td class="td-manage">
                                            <a class="layui-btn s_color1" onclick="member_stop(this,'10001')" href="javascript:;" title="启用">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color2" title="编辑" onclick="x_admin_show('编辑','member-edit.html',600,400)" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color3" onclick="x_admin_show('修改密码','member-password.html',600,400)" title="修改密码" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color4" title="删除" onclick="member_del(this,'要删除的id')" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id="2"><i class="layui-icon"></i></div>
                                        </td>
                                        <td>1</td>
                                        <td>小明</td>
                                        <td>男</td>
                                        <td>13000000000</td>
                                        <td>admin@mail.com</td>
                                        <td>北京市 海淀区</td>
                                        <td>2017-01-01 11:11:42</td>
                                        <td class="td-status">
                                            <span class="layui-btn layui-btn-normal layui-btn-mini">已启用</span></td>
                                        <td class="td-manage">
                                            <a class="layui-btn s_color1" onclick="member_stop(this,'10001')" href="javascript:;" title="启用">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color2" title="编辑" onclick="x_admin_show('编辑','member-edit.html',600,400)" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color3" onclick="x_admin_show('修改密码','member-password.html',600,400)" title="修改密码" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color4" title="删除" onclick="member_del(this,'要删除的id')" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id="2"><i class="layui-icon"></i></div>
                                        </td>
                                        <td>1</td>
                                        <td>小明</td>
                                        <td>男</td>
                                        <td>13000000000</td>
                                        <td>admin@mail.com</td>
                                        <td>北京市 海淀区</td>
                                        <td>2017-01-01 11:11:42</td>
                                        <td class="td-status">
                                            <span class="layui-btn layui-btn-normal layui-btn-mini">已启用</span></td>
                                        <td class="td-manage">
                                            <a class="layui-btn s_color1" onclick="member_stop(this,'10001')" href="javascript:;" title="启用">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color2" title="编辑" onclick="x_admin_show('编辑','member-edit.html',600,400)" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color3" onclick="x_admin_show('修改密码','member-password.html',600,400)" title="修改密码" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color4" title="删除" onclick="member_del(this,'要删除的id')" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id="2"><i class="layui-icon"></i></div>
                                        </td>
                                        <td>1</td>
                                        <td>小明</td>
                                        <td>男</td>
                                        <td>13000000000</td>
                                        <td>admin@mail.com</td>
                                        <td>北京市 海淀区</td>
                                        <td>2017-01-01 11:11:42</td>
                                        <td class="td-status">
                                            <span class="layui-btn layui-btn-normal layui-btn-mini">已启用</span></td>
                                        <td class="td-manage">
                                            <a class="layui-btn s_color1" onclick="member_stop(this,'10001')" href="javascript:;" title="启用">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color2" title="编辑" onclick="x_admin_show('编辑','member-edit.html',600,400)" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color3" onclick="x_admin_show('修改密码','member-password.html',600,400)" title="修改密码" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color4" title="删除" onclick="member_del(this,'要删除的id')" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id="2"><i class="layui-icon"></i></div>
                                        </td>
                                        <td>1</td>
                                        <td>小明</td>
                                        <td>男</td>
                                        <td>13000000000</td>
                                        <td>admin@mail.com</td>
                                        <td>北京市 海淀区</td>
                                        <td>2017-01-01 11:11:42</td>
                                        <td class="td-status">
                                            <span class="layui-btn layui-btn-normal layui-btn-mini">已启用</span></td>
                                        <td class="td-manage">
                                            <a class="layui-btn s_color1" onclick="member_stop(this,'10001')" href="javascript:;" title="启用">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color2" title="编辑" onclick="x_admin_show('编辑','member-edit.html',600,400)" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color3" onclick="x_admin_show('修改密码','member-password.html',600,400)" title="修改密码" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color4" title="删除" onclick="member_del(this,'要删除的id')" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id="2"><i class="layui-icon"></i></div>
                                        </td>
                                        <td>1</td>
                                        <td>小明</td>
                                        <td>男</td>
                                        <td>13000000000</td>
                                        <td>admin@mail.com</td>
                                        <td>北京市 海淀区</td>
                                        <td>2017-01-01 11:11:42</td>
                                        <td class="td-status">
                                            <span class="layui-btn layui-btn-normal layui-btn-mini">已启用</span></td>
                                        <td class="td-manage">
                                            <a class="layui-btn s_color1" onclick="member_stop(this,'10001')" href="javascript:;" title="启用">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color2" title="编辑" onclick="x_admin_show('编辑','member-edit.html',600,400)" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color3" onclick="x_admin_show('修改密码','member-password.html',600,400)" title="修改密码" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color4" title="删除" onclick="member_del(this,'要删除的id')" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <div class="page" style="padding-right: 10px;">
                                    <div>
                                        <a class="prev" href="">&lt;&lt;</a>
                                        <a class="num" href="">1</a>
                                        <span class="current">2</span>
                                        <a class="num" href="">3</a>
                                        <a class="num" href="">489</a>
                                        <a class="next" href="">&gt;&gt;</a>
                                    </div>
                                </div>
                            </div>
                            <div class="layui-tab-item">
                                <table class="layui-table" lay-even="" lay-skin="row">
                                    <thead>
                                    <tr>
                                        <th>
                                            <div class="layui-unselect header layui-form-checkbox" lay-skin="primary"><i class="layui-icon"></i></div>
                                        </th>
                                        <th>ID</th>
                                        <th>用户名</th>
                                        <th>性别</th>
                                        <th>手机</th>
                                        <th>邮箱</th>
                                        <th>地址</th>
                                        <th>加入时间</th>
                                        <th>状态</th>
                                        <th>操作</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>
                                            <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id="2"><i class="layui-icon"></i></div>
                                        </td>
                                        <td>1</td>
                                        <td>小明</td>
                                        <td>男</td>
                                        <td>13000000000</td>
                                        <td>admin@mail.com</td>
                                        <td>北京市 海淀区</td>
                                        <td>2017-01-01 11:11:42</td>
                                        <td class="td-status">
                                            <span class="layui-btn layui-btn-normal layui-btn-mini">已启用</span></td>
                                        <td class="td-manage">
                                            <a class="layui-btn s_color1" onclick="member_stop(this,'10001')" href="javascript:;" title="启用">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color2" title="编辑" onclick="x_admin_show('编辑','member-edit.html',600,400)" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color3" onclick="x_admin_show('修改密码','member-password.html',600,400)" title="修改密码" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color4" title="删除" onclick="member_del(this,'要删除的id')" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id="2"><i class="layui-icon"></i></div>
                                        </td>
                                        <td>1</td>
                                        <td>小明</td>
                                        <td>男</td>
                                        <td>13000000000</td>
                                        <td>admin@mail.com</td>
                                        <td>北京市 海淀区</td>
                                        <td>2017-01-01 11:11:42</td>
                                        <td class="td-status">
                                            <span class="layui-btn layui-btn-normal layui-btn-mini">已启用</span></td>
                                        <td class="td-manage">
                                            <a class="layui-btn s_color1" onclick="member_stop(this,'10001')" href="javascript:;" title="启用">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color2" title="编辑" onclick="x_admin_show('编辑','member-edit.html',600,400)" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color3" onclick="x_admin_show('修改密码','member-password.html',600,400)" title="修改密码" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color4" title="删除" onclick="member_del(this,'要删除的id')" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id="2"><i class="layui-icon"></i></div>
                                        </td>
                                        <td>1</td>
                                        <td>小明</td>
                                        <td>男</td>
                                        <td>13000000000</td>
                                        <td>admin@mail.com</td>
                                        <td>北京市 海淀区</td>
                                        <td>2017-01-01 11:11:42</td>
                                        <td class="td-status">
                                            <span class="layui-btn layui-btn-normal layui-btn-mini">已启用</span></td>
                                        <td class="td-manage">
                                            <a class="layui-btn s_color1" onclick="member_stop(this,'10001')" href="javascript:;" title="启用">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color2" title="编辑" onclick="x_admin_show('编辑','member-edit.html',600,400)" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color3" onclick="x_admin_show('修改密码','member-password.html',600,400)" title="修改密码" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color4" title="删除" onclick="member_del(this,'要删除的id')" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id="2"><i class="layui-icon"></i></div>
                                        </td>
                                        <td>1</td>
                                        <td>小明</td>
                                        <td>男</td>
                                        <td>13000000000</td>
                                        <td>admin@mail.com</td>
                                        <td>北京市 海淀区</td>
                                        <td>2017-01-01 11:11:42</td>
                                        <td class="td-status">
                                            <span class="layui-btn layui-btn-normal layui-btn-mini">已启用</span></td>
                                        <td class="td-manage">
                                            <a class="layui-btn s_color1" onclick="member_stop(this,'10001')" href="javascript:;" title="启用">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color2" title="编辑" onclick="x_admin_show('编辑','member-edit.html',600,400)" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color3" onclick="x_admin_show('修改密码','member-password.html',600,400)" title="修改密码" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color4" title="删除" onclick="member_del(this,'要删除的id')" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id="2"><i class="layui-icon"></i></div>
                                        </td>
                                        <td>1</td>
                                        <td>小明</td>
                                        <td>男</td>
                                        <td>13000000000</td>
                                        <td>admin@mail.com</td>
                                        <td>北京市 海淀区</td>
                                        <td>2017-01-01 11:11:42</td>
                                        <td class="td-status">
                                            <span class="layui-btn layui-btn-normal layui-btn-mini">已启用</span></td>
                                        <td class="td-manage">
                                            <a class="layui-btn s_color1" onclick="member_stop(this,'10001')" href="javascript:;" title="启用">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color2" title="编辑" onclick="x_admin_show('编辑','member-edit.html',600,400)" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color3" onclick="x_admin_show('修改密码','member-password.html',600,400)" title="修改密码" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color4" title="删除" onclick="member_del(this,'要删除的id')" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id="2"><i class="layui-icon"></i></div>
                                        </td>
                                        <td>1</td>
                                        <td>小明</td>
                                        <td>男</td>
                                        <td>13000000000</td>
                                        <td>admin@mail.com</td>
                                        <td>北京市 海淀区</td>
                                        <td>2017-01-01 11:11:42</td>
                                        <td class="td-status">
                                            <span class="layui-btn layui-btn-normal layui-btn-mini">已启用</span></td>
                                        <td class="td-manage">
                                            <a class="layui-btn s_color1" onclick="member_stop(this,'10001')" href="javascript:;" title="启用">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color2" title="编辑" onclick="x_admin_show('编辑','member-edit.html',600,400)" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color3" onclick="x_admin_show('修改密码','member-password.html',600,400)" title="修改密码" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color4" title="删除" onclick="member_del(this,'要删除的id')" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id="2"><i class="layui-icon"></i></div>
                                        </td>
                                        <td>1</td>
                                        <td>小明</td>
                                        <td>男</td>
                                        <td>13000000000</td>
                                        <td>admin@mail.com</td>
                                        <td>北京市 海淀区</td>
                                        <td>2017-01-01 11:11:42</td>
                                        <td class="td-status">
                                            <span class="layui-btn layui-btn-normal layui-btn-mini">已启用</span></td>
                                        <td class="td-manage">
                                            <a class="layui-btn s_color1" onclick="member_stop(this,'10001')" href="javascript:;" title="启用">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color2" title="编辑" onclick="x_admin_show('编辑','member-edit.html',600,400)" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color3" onclick="x_admin_show('修改密码','member-password.html',600,400)" title="修改密码" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color4" title="删除" onclick="member_del(this,'要删除的id')" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id="2"><i class="layui-icon"></i></div>
                                        </td>
                                        <td>1</td>
                                        <td>小明</td>
                                        <td>男</td>
                                        <td>13000000000</td>
                                        <td>admin@mail.com</td>
                                        <td>北京市 海淀区</td>
                                        <td>2017-01-01 11:11:42</td>
                                        <td class="td-status">
                                            <span class="layui-btn layui-btn-normal layui-btn-mini">已启用</span></td>
                                        <td class="td-manage">
                                            <a class="layui-btn s_color1" onclick="member_stop(this,'10001')" href="javascript:;" title="启用">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color2" title="编辑" onclick="x_admin_show('编辑','member-edit.html',600,400)" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color3" onclick="x_admin_show('修改密码','member-password.html',600,400)" title="修改密码" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color4" title="删除" onclick="member_del(this,'要删除的id')" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id="2"><i class="layui-icon"></i></div>
                                        </td>
                                        <td>1</td>
                                        <td>小明</td>
                                        <td>男</td>
                                        <td>13000000000</td>
                                        <td>admin@mail.com</td>
                                        <td>北京市 海淀区</td>
                                        <td>2017-01-01 11:11:42</td>
                                        <td class="td-status">
                                            <span class="layui-btn layui-btn-normal layui-btn-mini">已启用</span></td>
                                        <td class="td-manage">
                                            <a class="layui-btn s_color1" onclick="member_stop(this,'10001')" href="javascript:;" title="启用">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color2" title="编辑" onclick="x_admin_show('编辑','member-edit.html',600,400)" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color3" onclick="x_admin_show('修改密码','member-password.html',600,400)" title="修改密码" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color4" title="删除" onclick="member_del(this,'要删除的id')" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id="2"><i class="layui-icon"></i></div>
                                        </td>
                                        <td>1</td>
                                        <td>小明</td>
                                        <td>男</td>
                                        <td>13000000000</td>
                                        <td>admin@mail.com</td>
                                        <td>北京市 海淀区</td>
                                        <td>2017-01-01 11:11:42</td>
                                        <td class="td-status">
                                            <span class="layui-btn layui-btn-normal layui-btn-mini">已启用</span></td>
                                        <td class="td-manage">
                                            <a class="layui-btn s_color1" onclick="member_stop(this,'10001')" href="javascript:;" title="启用">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color2" title="编辑" onclick="x_admin_show('编辑','member-edit.html',600,400)" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color3" onclick="x_admin_show('修改密码','member-password.html',600,400)" title="修改密码" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color4" title="删除" onclick="member_del(this,'要删除的id')" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="layui-tab-item">
                                <table class="layui-table" lay-even="" lay-skin="nob">
                                    <thead>
                                    <tr>
                                        <th>
                                            <div class="layui-unselect header layui-form-checkbox" lay-skin="primary"><i class="layui-icon"></i></div>
                                        </th>
                                        <th>ID</th>
                                        <th>用户名</th>
                                        <th>性别</th>
                                        <th>手机</th>
                                        <th>邮箱</th>
                                        <th>地址</th>
                                        <th>加入时间</th>
                                        <th>状态</th>
                                        <th>操作</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>
                                            <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id="2"><i class="layui-icon"></i></div>
                                        </td>
                                        <td>1</td>
                                        <td>小明</td>
                                        <td>男</td>
                                        <td>13000000000</td>
                                        <td>admin@mail.com</td>
                                        <td>北京市 海淀区</td>
                                        <td>2017-01-01 11:11:42</td>
                                        <td class="td-status">
                                            <span class="layui-btn layui-btn-normal layui-btn-mini">已启用</span></td>
                                        <td class="td-manage">
                                            <a class="layui-btn s_color1" onclick="member_stop(this,'10001')" href="javascript:;" title="启用">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color2" title="编辑" onclick="x_admin_show('编辑','member-edit.html',600,400)" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color3" onclick="x_admin_show('修改密码','member-password.html',600,400)" title="修改密码" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color4" title="删除" onclick="member_del(this,'要删除的id')" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id="2"><i class="layui-icon"></i></div>
                                        </td>
                                        <td>1</td>
                                        <td>小明</td>
                                        <td>男</td>
                                        <td>13000000000</td>
                                        <td>admin@mail.com</td>
                                        <td>北京市 海淀区</td>
                                        <td>2017-01-01 11:11:42</td>
                                        <td class="td-status">
                                            <span class="layui-btn layui-btn-normal layui-btn-mini">已启用</span></td>
                                        <td class="td-manage">
                                            <a class="layui-btn s_color1" onclick="member_stop(this,'10001')" href="javascript:;" title="启用">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color2" title="编辑" onclick="x_admin_show('编辑','member-edit.html',600,400)" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color3" onclick="x_admin_show('修改密码','member-password.html',600,400)" title="修改密码" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color4" title="删除" onclick="member_del(this,'要删除的id')" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id="2"><i class="layui-icon"></i></div>
                                        </td>
                                        <td>1</td>
                                        <td>小明</td>
                                        <td>男</td>
                                        <td>13000000000</td>
                                        <td>admin@mail.com</td>
                                        <td>北京市 海淀区</td>
                                        <td>2017-01-01 11:11:42</td>
                                        <td class="td-status">
                                            <span class="layui-btn layui-btn-normal layui-btn-mini">已启用</span></td>
                                        <td class="td-manage">
                                            <a class="layui-btn s_color1" onclick="member_stop(this,'10001')" href="javascript:;" title="启用">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color2" title="编辑" onclick="x_admin_show('编辑','member-edit.html',600,400)" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color3" onclick="x_admin_show('修改密码','member-password.html',600,400)" title="修改密码" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color4" title="删除" onclick="member_del(this,'要删除的id')" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id="2"><i class="layui-icon"></i></div>
                                        </td>
                                        <td>1</td>
                                        <td>小明</td>
                                        <td>男</td>
                                        <td>13000000000</td>
                                        <td>admin@mail.com</td>
                                        <td>北京市 海淀区</td>
                                        <td>2017-01-01 11:11:42</td>
                                        <td class="td-status">
                                            <span class="layui-btn layui-btn-normal layui-btn-mini">已启用</span></td>
                                        <td class="td-manage">
                                            <a class="layui-btn s_color1" onclick="member_stop(this,'10001')" href="javascript:;" title="启用">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color2" title="编辑" onclick="x_admin_show('编辑','member-edit.html',600,400)" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color3" onclick="x_admin_show('修改密码','member-password.html',600,400)" title="修改密码" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color4" title="删除" onclick="member_del(this,'要删除的id')" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id="2"><i class="layui-icon"></i></div>
                                        </td>
                                        <td>1</td>
                                        <td>小明</td>
                                        <td>男</td>
                                        <td>13000000000</td>
                                        <td>admin@mail.com</td>
                                        <td>北京市 海淀区</td>
                                        <td>2017-01-01 11:11:42</td>
                                        <td class="td-status">
                                            <span class="layui-btn layui-btn-normal layui-btn-mini">已启用</span></td>
                                        <td class="td-manage">
                                            <a class="layui-btn s_color1" onclick="member_stop(this,'10001')" href="javascript:;" title="启用">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color2" title="编辑" onclick="x_admin_show('编辑','member-edit.html',600,400)" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color3" onclick="x_admin_show('修改密码','member-password.html',600,400)" title="修改密码" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color4" title="删除" onclick="member_del(this,'要删除的id')" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id="2"><i class="layui-icon"></i></div>
                                        </td>
                                        <td>1</td>
                                        <td>小明</td>
                                        <td>男</td>
                                        <td>13000000000</td>
                                        <td>admin@mail.com</td>
                                        <td>北京市 海淀区</td>
                                        <td>2017-01-01 11:11:42</td>
                                        <td class="td-status">
                                            <span class="layui-btn layui-btn-normal layui-btn-mini">已启用</span></td>
                                        <td class="td-manage">
                                            <a class="layui-btn s_color1" onclick="member_stop(this,'10001')" href="javascript:;" title="启用">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color2" title="编辑" onclick="x_admin_show('编辑','member-edit.html',600,400)" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color3" onclick="x_admin_show('修改密码','member-password.html',600,400)" title="修改密码" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color4" title="删除" onclick="member_del(this,'要删除的id')" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id="2"><i class="layui-icon"></i></div>
                                        </td>
                                        <td>1</td>
                                        <td>小明</td>
                                        <td>男</td>
                                        <td>13000000000</td>
                                        <td>admin@mail.com</td>
                                        <td>北京市 海淀区</td>
                                        <td>2017-01-01 11:11:42</td>
                                        <td class="td-status">
                                            <span class="layui-btn layui-btn-normal layui-btn-mini">已启用</span></td>
                                        <td class="td-manage">
                                            <a class="layui-btn s_color1" onclick="member_stop(this,'10001')" href="javascript:;" title="启用">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color2" title="编辑" onclick="x_admin_show('编辑','member-edit.html',600,400)" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color3" onclick="x_admin_show('修改密码','member-password.html',600,400)" title="修改密码" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color4" title="删除" onclick="member_del(this,'要删除的id')" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id="2"><i class="layui-icon"></i></div>
                                        </td>
                                        <td>1</td>
                                        <td>小明</td>
                                        <td>男</td>
                                        <td>13000000000</td>
                                        <td>admin@mail.com</td>
                                        <td>北京市 海淀区</td>
                                        <td>2017-01-01 11:11:42</td>
                                        <td class="td-status">
                                            <span class="layui-btn layui-btn-normal layui-btn-mini">已启用</span></td>
                                        <td class="td-manage">
                                            <a class="layui-btn s_color1" onclick="member_stop(this,'10001')" href="javascript:;" title="启用">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color2" title="编辑" onclick="x_admin_show('编辑','member-edit.html',600,400)" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color3" onclick="x_admin_show('修改密码','member-password.html',600,400)" title="修改密码" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color4" title="删除" onclick="member_del(this,'要删除的id')" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id="2"><i class="layui-icon"></i></div>
                                        </td>
                                        <td>1</td>
                                        <td>小明</td>
                                        <td>男</td>
                                        <td>13000000000</td>
                                        <td>admin@mail.com</td>
                                        <td>北京市 海淀区</td>
                                        <td>2017-01-01 11:11:42</td>
                                        <td class="td-status">
                                            <span class="layui-btn layui-btn-normal layui-btn-mini">已启用</span></td>
                                        <td class="td-manage">
                                            <a class="layui-btn s_color1" onclick="member_stop(this,'10001')" href="javascript:;" title="启用">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color2" title="编辑" onclick="x_admin_show('编辑','member-edit.html',600,400)" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color3" onclick="x_admin_show('修改密码','member-password.html',600,400)" title="修改密码" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color4" title="删除" onclick="member_del(this,'要删除的id')" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id="2"><i class="layui-icon"></i></div>
                                        </td>
                                        <td>1</td>
                                        <td>小明</td>
                                        <td>男</td>
                                        <td>13000000000</td>
                                        <td>admin@mail.com</td>
                                        <td>北京市 海淀区</td>
                                        <td>2017-01-01 11:11:42</td>
                                        <td class="td-status">
                                            <span class="layui-btn layui-btn-normal layui-btn-mini">已启用</span></td>
                                        <td class="td-manage">
                                            <a class="layui-btn s_color1" onclick="member_stop(this,'10001')" href="javascript:;" title="启用">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color2" title="编辑" onclick="x_admin_show('编辑','member-edit.html',600,400)" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color3" onclick="x_admin_show('修改密码','member-password.html',600,400)" title="修改密码" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color4" title="删除" onclick="member_del(this,'要删除的id')" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="layui-tab-item">
                                <table class="layui-table" lay-even="" lay-skin="">
                                    <thead>
                                    <tr>
                                        <th>
                                            <div class="layui-unselect header layui-form-checkbox" lay-skin="primary"><i class="layui-icon"></i></div>
                                        </th>
                                        <th>ID</th>
                                        <th>用户名</th>
                                        <th>性别</th>
                                        <th>手机</th>
                                        <th>邮箱</th>
                                        <th>地址</th>
                                        <th>加入时间</th>
                                        <th>状态</th>
                                        <th>操作</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>
                                            <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id="2"><i class="layui-icon"></i></div>
                                        </td>
                                        <td>1</td>
                                        <td>小明</td>
                                        <td>男</td>
                                        <td>13000000000</td>
                                        <td>admin@mail.com</td>
                                        <td>北京市 海淀区</td>
                                        <td>2017-01-01 11:11:42</td>
                                        <td class="td-status">
                                            <span class="layui-btn layui-btn-normal layui-btn-mini">已启用</span></td>
                                        <td class="td-manage">
                                            <a class="layui-btn s_color1" onclick="member_stop(this,'10001')" href="javascript:;" title="启用">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color2" title="编辑" onclick="x_admin_show('编辑','member-edit.html',600,400)" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color3" onclick="x_admin_show('修改密码','member-password.html',600,400)" title="修改密码" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color4" title="删除" onclick="member_del(this,'要删除的id')" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id="2"><i class="layui-icon"></i></div>
                                        </td>
                                        <td>1</td>
                                        <td>小明</td>
                                        <td>男</td>
                                        <td>13000000000</td>
                                        <td>admin@mail.com</td>
                                        <td>北京市 海淀区</td>
                                        <td>2017-01-01 11:11:42</td>
                                        <td class="td-status">
                                            <span class="layui-btn layui-btn-normal layui-btn-mini">已启用</span></td>
                                        <td class="td-manage">
                                            <a class="layui-btn s_color1" onclick="member_stop(this,'10001')" href="javascript:;" title="启用">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color2" title="编辑" onclick="x_admin_show('编辑','member-edit.html',600,400)" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color3" onclick="x_admin_show('修改密码','member-password.html',600,400)" title="修改密码" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color4" title="删除" onclick="member_del(this,'要删除的id')" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id="2"><i class="layui-icon"></i></div>
                                        </td>
                                        <td>1</td>
                                        <td>小明</td>
                                        <td>男</td>
                                        <td>13000000000</td>
                                        <td>admin@mail.com</td>
                                        <td>北京市 海淀区</td>
                                        <td>2017-01-01 11:11:42</td>
                                        <td class="td-status">
                                            <span class="layui-btn layui-btn-normal layui-btn-mini">已启用</span></td>
                                        <td class="td-manage">
                                            <a class="layui-btn s_color1" onclick="member_stop(this,'10001')" href="javascript:;" title="启用">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color2" title="编辑" onclick="x_admin_show('编辑','member-edit.html',600,400)" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color3" onclick="x_admin_show('修改密码','member-password.html',600,400)" title="修改密码" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color4" title="删除" onclick="member_del(this,'要删除的id')" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id="2"><i class="layui-icon"></i></div>
                                        </td>
                                        <td>1</td>
                                        <td>小明</td>
                                        <td>男</td>
                                        <td>13000000000</td>
                                        <td>admin@mail.com</td>
                                        <td>北京市 海淀区</td>
                                        <td>2017-01-01 11:11:42</td>
                                        <td class="td-status">
                                            <span class="layui-btn layui-btn-normal layui-btn-mini">已启用</span></td>
                                        <td class="td-manage">
                                            <a class="layui-btn s_color1" onclick="member_stop(this,'10001')" href="javascript:;" title="启用">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color2" title="编辑" onclick="x_admin_show('编辑','member-edit.html',600,400)" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color3" onclick="x_admin_show('修改密码','member-password.html',600,400)" title="修改密码" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color4" title="删除" onclick="member_del(this,'要删除的id')" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id="2"><i class="layui-icon"></i></div>
                                        </td>
                                        <td>1</td>
                                        <td>小明</td>
                                        <td>男</td>
                                        <td>13000000000</td>
                                        <td>admin@mail.com</td>
                                        <td>北京市 海淀区</td>
                                        <td>2017-01-01 11:11:42</td>
                                        <td class="td-status">
                                            <span class="layui-btn layui-btn-normal layui-btn-mini">已启用</span></td>
                                        <td class="td-manage">
                                            <a class="layui-btn s_color1" onclick="member_stop(this,'10001')" href="javascript:;" title="启用">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color2" title="编辑" onclick="x_admin_show('编辑','member-edit.html',600,400)" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color3" onclick="x_admin_show('修改密码','member-password.html',600,400)" title="修改密码" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color4" title="删除" onclick="member_del(this,'要删除的id')" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id="2"><i class="layui-icon"></i></div>
                                        </td>
                                        <td>1</td>
                                        <td>小明</td>
                                        <td>男</td>
                                        <td>13000000000</td>
                                        <td>admin@mail.com</td>
                                        <td>北京市 海淀区</td>
                                        <td>2017-01-01 11:11:42</td>
                                        <td class="td-status">
                                            <span class="layui-btn layui-btn-normal layui-btn-mini">已启用</span></td>
                                        <td class="td-manage">
                                            <a class="layui-btn s_color1" onclick="member_stop(this,'10001')" href="javascript:;" title="启用">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color2" title="编辑" onclick="x_admin_show('编辑','member-edit.html',600,400)" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color3" onclick="x_admin_show('修改密码','member-password.html',600,400)" title="修改密码" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color4" title="删除" onclick="member_del(this,'要删除的id')" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id="2"><i class="layui-icon"></i></div>
                                        </td>
                                        <td>1</td>
                                        <td>小明</td>
                                        <td>男</td>
                                        <td>13000000000</td>
                                        <td>admin@mail.com</td>
                                        <td>北京市 海淀区</td>
                                        <td>2017-01-01 11:11:42</td>
                                        <td class="td-status">
                                            <span class="layui-btn layui-btn-normal layui-btn-mini">已启用</span></td>
                                        <td class="td-manage">
                                            <a class="layui-btn s_color1" onclick="member_stop(this,'10001')" href="javascript:;" title="启用">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color2" title="编辑" onclick="x_admin_show('编辑','member-edit.html',600,400)" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color3" onclick="x_admin_show('修改密码','member-password.html',600,400)" title="修改密码" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color4" title="删除" onclick="member_del(this,'要删除的id')" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id="2"><i class="layui-icon"></i></div>
                                        </td>
                                        <td>1</td>
                                        <td>小明</td>
                                        <td>男</td>
                                        <td>13000000000</td>
                                        <td>admin@mail.com</td>
                                        <td>北京市 海淀区</td>
                                        <td>2017-01-01 11:11:42</td>
                                        <td class="td-status">
                                            <span class="layui-btn layui-btn-normal layui-btn-mini">已启用</span></td>
                                        <td class="td-manage">
                                            <a class="layui-btn s_color1" onclick="member_stop(this,'10001')" href="javascript:;" title="启用">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color2" title="编辑" onclick="x_admin_show('编辑','member-edit.html',600,400)" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color3" onclick="x_admin_show('修改密码','member-password.html',600,400)" title="修改密码" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color4" title="删除" onclick="member_del(this,'要删除的id')" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id="2"><i class="layui-icon"></i></div>
                                        </td>
                                        <td>1</td>
                                        <td>小明</td>
                                        <td>男</td>
                                        <td>13000000000</td>
                                        <td>admin@mail.com</td>
                                        <td>北京市 海淀区</td>
                                        <td>2017-01-01 11:11:42</td>
                                        <td class="td-status">
                                            <span class="layui-btn layui-btn-normal layui-btn-mini">已启用</span></td>
                                        <td class="td-manage">
                                            <a class="layui-btn s_color1" onclick="member_stop(this,'10001')" href="javascript:;" title="启用">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color2" title="编辑" onclick="x_admin_show('编辑','member-edit.html',600,400)" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color3" onclick="x_admin_show('修改密码','member-password.html',600,400)" title="修改密码" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color4" title="删除" onclick="member_del(this,'要删除的id')" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id="2"><i class="layui-icon"></i></div>
                                        </td>
                                        <td>1</td>
                                        <td>小明</td>
                                        <td>男</td>
                                        <td>13000000000</td>
                                        <td>admin@mail.com</td>
                                        <td>北京市 海淀区</td>
                                        <td>2017-01-01 11:11:42</td>
                                        <td class="td-status">
                                            <span class="layui-btn layui-btn-normal layui-btn-mini">已启用</span></td>
                                        <td class="td-manage">
                                            <a class="layui-btn s_color1" onclick="member_stop(this,'10001')" href="javascript:;" title="启用">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color2" title="编辑" onclick="x_admin_show('编辑','member-edit.html',600,400)" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color3" onclick="x_admin_show('修改密码','member-password.html',600,400)" title="修改密码" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color4" title="删除" onclick="member_del(this,'要删除的id')" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="layui-tab-item">
                                <table class="layui-table">
                                    <thead>
                                    <tr>
                                        <th>
                                            <div class="layui-unselect header layui-form-checkbox" lay-skin="primary"><i class="layui-icon"></i></div>
                                        </th>
                                        <th>ID</th>
                                        <th>用户名</th>
                                        <th>性别</th>
                                        <th>手机</th>
                                        <th>邮箱</th>
                                        <th>地址</th>
                                        <th>加入时间</th>
                                        <th>状态</th>
                                        <th>操作</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>
                                            <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id="2"><i class="layui-icon"></i></div>
                                        </td>
                                        <td>1</td>
                                        <td>小明</td>
                                        <td>男</td>
                                        <td>13000000000</td>
                                        <td>admin@mail.com</td>
                                        <td>北京市 海淀区</td>
                                        <td>2017-01-01 11:11:42</td>
                                        <td class="td-status">
                                            <span class="layui-btn layui-btn-normal layui-btn-mini">已启用</span></td>
                                        <td class="td-manage">
                                            <a class="layui-btn s_color1" onclick="member_stop(this,'10001')" href="javascript:;" title="启用">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color2" title="编辑" onclick="x_admin_show('编辑','member-edit.html',600,400)" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color3" onclick="x_admin_show('修改密码','member-password.html',600,400)" title="修改密码" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color4" title="删除" onclick="member_del(this,'要删除的id')" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id="2"><i class="layui-icon"></i></div>
                                        </td>
                                        <td>1</td>
                                        <td>小明</td>
                                        <td>男</td>
                                        <td>13000000000</td>
                                        <td>admin@mail.com</td>
                                        <td>北京市 海淀区</td>
                                        <td>2017-01-01 11:11:42</td>
                                        <td class="td-status">
                                            <span class="layui-btn layui-btn-normal layui-btn-mini">已启用</span></td>
                                        <td class="td-manage">
                                            <a class="layui-btn s_color1" onclick="member_stop(this,'10001')" href="javascript:;" title="启用">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color2" title="编辑" onclick="x_admin_show('编辑','member-edit.html',600,400)" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color3" onclick="x_admin_show('修改密码','member-password.html',600,400)" title="修改密码" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color4" title="删除" onclick="member_del(this,'要删除的id')" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id="2"><i class="layui-icon"></i></div>
                                        </td>
                                        <td>1</td>
                                        <td>小明</td>
                                        <td>男</td>
                                        <td>13000000000</td>
                                        <td>admin@mail.com</td>
                                        <td>北京市 海淀区</td>
                                        <td>2017-01-01 11:11:42</td>
                                        <td class="td-status">
                                            <span class="layui-btn layui-btn-normal layui-btn-mini">已启用</span></td>
                                        <td class="td-manage">
                                            <a class="layui-btn s_color1" onclick="member_stop(this,'10001')" href="javascript:;" title="启用">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color2" title="编辑" onclick="x_admin_show('编辑','member-edit.html',600,400)" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color3" onclick="x_admin_show('修改密码','member-password.html',600,400)" title="修改密码" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color4" title="删除" onclick="member_del(this,'要删除的id')" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id="2"><i class="layui-icon"></i></div>
                                        </td>
                                        <td>1</td>
                                        <td>小明</td>
                                        <td>男</td>
                                        <td>13000000000</td>
                                        <td>admin@mail.com</td>
                                        <td>北京市 海淀区</td>
                                        <td>2017-01-01 11:11:42</td>
                                        <td class="td-status">
                                            <span class="layui-btn layui-btn-normal layui-btn-mini">已启用</span></td>
                                        <td class="td-manage">
                                            <a class="layui-btn s_color1" onclick="member_stop(this,'10001')" href="javascript:;" title="启用">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color2" title="编辑" onclick="x_admin_show('编辑','member-edit.html',600,400)" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color3" onclick="x_admin_show('修改密码','member-password.html',600,400)" title="修改密码" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color4" title="删除" onclick="member_del(this,'要删除的id')" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id="2"><i class="layui-icon"></i></div>
                                        </td>
                                        <td>1</td>
                                        <td>小明</td>
                                        <td>男</td>
                                        <td>13000000000</td>
                                        <td>admin@mail.com</td>
                                        <td>北京市 海淀区</td>
                                        <td>2017-01-01 11:11:42</td>
                                        <td class="td-status">
                                            <span class="layui-btn layui-btn-normal layui-btn-mini">已启用</span></td>
                                        <td class="td-manage">
                                            <a class="layui-btn s_color1" onclick="member_stop(this,'10001')" href="javascript:;" title="启用">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color2" title="编辑" onclick="x_admin_show('编辑','member-edit.html',600,400)" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color3" onclick="x_admin_show('修改密码','member-password.html',600,400)" title="修改密码" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color4" title="删除" onclick="member_del(this,'要删除的id')" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id="2"><i class="layui-icon"></i></div>
                                        </td>
                                        <td>1</td>
                                        <td>小明</td>
                                        <td>男</td>
                                        <td>13000000000</td>
                                        <td>admin@mail.com</td>
                                        <td>北京市 海淀区</td>
                                        <td>2017-01-01 11:11:42</td>
                                        <td class="td-status">
                                            <span class="layui-btn layui-btn-normal layui-btn-mini">已启用</span></td>
                                        <td class="td-manage">
                                            <a class="layui-btn s_color1" onclick="member_stop(this,'10001')" href="javascript:;" title="启用">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color2" title="编辑" onclick="x_admin_show('编辑','member-edit.html',600,400)" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color3" onclick="x_admin_show('修改密码','member-password.html',600,400)" title="修改密码" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color4" title="删除" onclick="member_del(this,'要删除的id')" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id="2"><i class="layui-icon"></i></div>
                                        </td>
                                        <td>1</td>
                                        <td>小明</td>
                                        <td>男</td>
                                        <td>13000000000</td>
                                        <td>admin@mail.com</td>
                                        <td>北京市 海淀区</td>
                                        <td>2017-01-01 11:11:42</td>
                                        <td class="td-status">
                                            <span class="layui-btn layui-btn-normal layui-btn-mini">已启用</span></td>
                                        <td class="td-manage">
                                            <a class="layui-btn s_color1" onclick="member_stop(this,'10001')" href="javascript:;" title="启用">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color2" title="编辑" onclick="x_admin_show('编辑','member-edit.html',600,400)" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color3" onclick="x_admin_show('修改密码','member-password.html',600,400)" title="修改密码" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color4" title="删除" onclick="member_del(this,'要删除的id')" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id="2"><i class="layui-icon"></i></div>
                                        </td>
                                        <td>1</td>
                                        <td>小明</td>
                                        <td>男</td>
                                        <td>13000000000</td>
                                        <td>admin@mail.com</td>
                                        <td>北京市 海淀区</td>
                                        <td>2017-01-01 11:11:42</td>
                                        <td class="td-status">
                                            <span class="layui-btn layui-btn-normal layui-btn-mini">已启用</span></td>
                                        <td class="td-manage">
                                            <a class="layui-btn s_color1" onclick="member_stop(this,'10001')" href="javascript:;" title="启用">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color2" title="编辑" onclick="x_admin_show('编辑','member-edit.html',600,400)" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color3" onclick="x_admin_show('修改密码','member-password.html',600,400)" title="修改密码" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color4" title="删除" onclick="member_del(this,'要删除的id')" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id="2"><i class="layui-icon"></i></div>
                                        </td>
                                        <td>1</td>
                                        <td>小明</td>
                                        <td>男</td>
                                        <td>13000000000</td>
                                        <td>admin@mail.com</td>
                                        <td>北京市 海淀区</td>
                                        <td>2017-01-01 11:11:42</td>
                                        <td class="td-status">
                                            <span class="layui-btn layui-btn-normal layui-btn-mini">已启用</span></td>
                                        <td class="td-manage">
                                            <a class="layui-btn s_color1" onclick="member_stop(this,'10001')" href="javascript:;" title="启用">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color2" title="编辑" onclick="x_admin_show('编辑','member-edit.html',600,400)" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color3" onclick="x_admin_show('修改密码','member-password.html',600,400)" title="修改密码" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color4" title="删除" onclick="member_del(this,'要删除的id')" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id="2"><i class="layui-icon"></i></div>
                                        </td>
                                        <td>1</td>
                                        <td>小明</td>
                                        <td>男</td>
                                        <td>13000000000</td>
                                        <td>admin@mail.com</td>
                                        <td>北京市 海淀区</td>
                                        <td>2017-01-01 11:11:42</td>
                                        <td class="td-status">
                                            <span class="layui-btn layui-btn-normal layui-btn-mini">已启用</span></td>
                                        <td class="td-manage">
                                            <a class="layui-btn s_color1" onclick="member_stop(this,'10001')" href="javascript:;" title="启用">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color2" title="编辑" onclick="x_admin_show('编辑','member-edit.html',600,400)" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color3" onclick="x_admin_show('修改密码','member-password.html',600,400)" title="修改密码" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                            <a class="layui-btn s_color4" title="删除" onclick="member_del(this,'要删除的id')" href="javascript:;">
                                                <i class="layui-icon"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="layui-tab-item">
                                <form class="layui-form">
                                    <div class="layui-form-item">
                                        <label for="username" class="layui-form-label">
                                            <span class="x-red">*</span>登录名
                                        </label>
                                        <div class="layui-input-inline">
                                            <input type="text" id="username" name="username" required="" lay-verify="required" autocomplete="off" class="layui-input">
                                        </div>
                                        <div class="layui-form-mid layui-word-aux">
                                            <span class="x-red">*</span>将会成为您唯一的登入名
                                        </div>
                                    </div>
                                    <div class="layui-form-item">
                                        <label for="phone" class="layui-form-label">
                                            <span class="x-red">*</span>手机
                                        </label>
                                        <div class="layui-input-inline">
                                            <input type="text" id="phone" name="phone" required="" lay-verify="phone" autocomplete="off" class="layui-input">
                                        </div>
                                        <div class="layui-form-mid layui-word-aux">
                                            <span class="x-red">*</span>将会成为您唯一的登入名
                                        </div>
                                    </div>
                                    <div class="layui-form-item">
                                        <label for="L_email" class="layui-form-label">
                                            <span class="x-red">*</span>邮箱
                                        </label>
                                        <div class="layui-input-inline">
                                            <input type="text" id="L_email" name="email" required="" lay-verify="email" autocomplete="off" class="layui-input">
                                        </div>
                                        <div class="layui-form-mid layui-word-aux">
                                            <span class="x-red">*</span>
                                        </div>
                                    </div>
                                    <div class="layui-form-item">
                                        <label class="layui-form-label"><span class="x-red">*</span>角色</label>
                                        <div class="layui-input-block">
                                            <input type="checkbox" name="like1[write]" lay-skin="primary" title="超级管理员" checked="">
                                            <div class="layui-unselect layui-form-checkbox layui-form-checked" lay-skin="primary"><span>超级管理员</span><i class="layui-icon"></i></div>
                                            <input type="checkbox" name="like1[read]" lay-skin="primary" title="编辑人员">
                                            <div class="layui-unselect layui-form-checkbox" lay-skin="primary"><span>编辑人员</span><i class="layui-icon"></i></div>
                                            <input type="checkbox" name="like1[write]" lay-skin="primary" title="宣传人员" checked="">
                                            <div class="layui-unselect layui-form-checkbox layui-form-checked" lay-skin="primary"><span>宣传人员</span><i class="layui-icon"></i></div>
                                        </div>
                                    </div>
                                    <div class="layui-form-item">
                                        <label for="L_pass" class="layui-form-label">
                                            <span class="x-red">*</span>密码
                                        </label>
                                        <div class="layui-input-inline">
                                            <input type="password" id="L_pass" name="pass" required="" lay-verify="pass" autocomplete="off" class="layui-input">
                                        </div>
                                        <div class="layui-form-mid layui-word-aux">
                                            6到16个字符
                                        </div>
                                    </div>
                                    <div class="layui-form-item">
                                        <label for="L_repass" class="layui-form-label">
                                            <span class="x-red">*</span>确认密码
                                        </label>
                                        <div class="layui-input-inline">
                                            <input type="password" id="L_repass" name="repass" required="" lay-verify="repass" autocomplete="off" class="layui-input">
                                        </div>
                                    </div>
                                    <div class="layui-form-item">
                                        <label for="L_repass" class="layui-form-label">
                                        </label>
                                        <button class="layui-btn" lay-filter="add" lay-submit="">
                                            增加
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </div>
        </div>
    </div>
    <div class="layui-row gaid_con">
        <div class="layui-col-md12">
            <div class="gaid_pad">
                <fieldset class="layui-elem-field">
                    <h1><span>系统信息</span></h1>
                    <div class="layui-field-box">
                        <table class="layui-table">
                            <tbody>
                            <tr>
                                <th>xxx版本</th>
                                <td>1.0.180420</td>
                            </tr>
                            <tr>
                                <th>服务器地址</th>
                                <td>x.xuebingsi.com</td>
                            </tr>
                            <tr>
                                <th>操作系统</th>
                                <td>WINNT</td>
                            </tr>
                            <tr>
                                <th>运行环境</th>
                                <td>Apache/2.4.23 (Win32) OpenSSL/1.0.2j mod_fcgid/2.3.9</td>
                            </tr>
                            <tr>
                                <th>PHP版本</th>
                                <td>5.6.27</td>
                            </tr>
                            <tr>
                                <th>PHP运行方式</th>
                                <td>cgi-fcgi</td>
                            </tr>
                            <tr>
                                <th>MYSQL版本</th>
                                <td>5.5.53</td>
                            </tr>
                            <tr>
                                <th>ThinkPHP</th>
                                <td>5.0.18</td>
                            </tr>
                            <tr>
                                <th>上传附件限制</th>
                                <td>2M</td>
                            </tr>
                            <tr>
                                <th>执行时间限制</th>
                                <td>30s</td>
                            </tr>
                            <tr>
                                <th>剩余空间</th>
                                <td>86015.2M</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </fieldset>
            </div>
        </div>
    </div>
    <blockquote class="layui-elem-quote layui-quote-nm">本系统基于layui框架制作。</blockquote>
</div>
</body>

<script>
    //图表重载，地图高度
    $(function() {
        window.onresize = function() {
            myChart1.resize();
            myChart2.resize();
        }
    })

</script>

</html>

