;"use strict";
var mods = ["element", "sidebar", "mockjs", "select", "tabs", "menu", "route", "utils", "component", "kit"];
layui.define(mods, function (e) {
    layui.element;
    var t = layui.utils, a = layui.jquery, n = (layui.lodash, layui.route), i = layui.tabs, l = layui.layer,
        o = layui.menu, m = layui.component, s = layui.kit, p = function () {
            this.config = {elem: "#app", loadType: "SPA"}, this.version = "1.0.0"
        };
    p.prototype.ready = function (e) {
        var i = this.config, o = (0, t.localStorage.getItem)("KITADMIN_SETTING_LOADTYPE");
        null !== o && void 0 !== o.loadType && (i.loadType = o.loadType), s.set({type: i.loadType}).init(), u.routeInit(i), u.menuInit(i), "TABS" === i.loadType && u.tabsInit(), "" === location.hash && t.setUrlState("主页", "#/"), layui.sidebar.render({
            elem: "#ccleft",
            title: "这是左侧打开的栗子",
            shade: !0,
            direction: "left",
            dynamicRender: !0,
            url: "/admin/Juhuiadmin/app",
            width: "50%"
        }), a("#cc").on("click", function () {
            layui.sidebar.render({
                elem: this,
                title: "这是表单盒子",
                shade: !0,
                dynamicRender: !0,
                url: "/admin/Juhuiadmin/formindex",
                width: "50%"
            })
        }), m.on("nav(header_right)", function (e) {
            var t = e.elem.attr("kit-target");
            "setting" === t && layui.sidebar.render({
                elem: e.elem,
                title: "设置",
                shade: !0,
                dynamicRender: !0,
                url: "/admin/Juhuiadmin/setting"
            }), "menu" === t && layui.sidebar.render({
                elem: e.elem,
                title: "菜单管理",
                shade: !0,
                url: "/admin/Juhuiadmin/table",
                direction: "left",
                dynamicRender: !0,
                width: "100%"
            })
        }), layui.mockjs.inject(APIs), "SPA" === i.loadType && n.render(), "function" == typeof e && e()
    };
    var u = {
        routeInit: function (e) {
            var t = this, a = {
                r: [{
                    path: "/user/index",
                    component: "/views/user/index.html",
                    name: "用户列表",
                    children: [{
                        path: "/user/create",
                        component: "views/user/create.html",
                        name: "新增用户"
                    }, {path: "/user/edit", component: "views/user/edit.html", name: "编辑用户"}]
                }],
                routes: [{
                    path: "/juhui/fly",
                    component: "https://fly.layui.com/",
                    name: "Fly",
                    iframe: !0
                }, {path: "/juhui", component: "http://www.layui.com/", name: "Layui", iframe: !0}, {
                    path: "/baidu",
                    component: "https://www.baidu.com/",
                    name: "百度一下",
                    iframe: !0
                }, {path: "/user/index", component: "/views/user/index.html", name: "用户列表"}, {
                    path: "/user/create",
                    component: "views/user/create.html",
                    name: "新增用户"
                }, {path: "/user/edit", component: "views/user/edit.html", name: "编辑用户"}, {
                    path: "/cascader",
                    component: "views/cascader/index.html",
                    name: "Cascader"}
                , {path: "/", component: "/Juhuiadmin/app", name: "主页"}
                , {path: "/juhui/profile", component: "/Juhuiadmin/profile", name: "用户中心"}
                , {path: "/juhui/grid", component: "/Juhuiadmin/grid", name: "Grid"}
                , {path: "/juhui/button", component: "/Juhuiadmin/button", name: "按钮"}
                , {path: "/juhui/form", component: "/Juhuiadmin/form", name: "表单"}
                , {path: "/juhui/nav", component: "/Juhuiadmin/nav.html", name: "导航/面包屑"}
                , {path: "/juhui/tab", component: "/Juhuiadmin/tab.html", name: "选项卡"}
                , {path: "/juhui/progress", component: "/Juhuiadmin/progress.html", name: "progress"}
                , {path: "/juhui/panel", component: "/Juhuiadmin/panel.html", name: "panel"}
                , {path: "/juhui/badge", component: "/Juhuiadmin/badge.html", name: "badge"}
                , {path: "/juhui/timeline", component: "/Juhuiadmin/timeline.html", name: "timeline"}
                , {path: "/juhui/table_element", component: "/Juhuiadmin/table_element", name: "table-element"}
                , {path: "/juhui/anim", component: "/Juhuiadmin/anim.html", name: "anim"}
                , {path: "/juhui/auxiliar", component: "/Juhuiadmin/auxiliar", name: "anim"}
                , {path: "/juhui/layer", component: "/Juhuiadmin/layer", name: "layer"}
                , {path: "/juhui/laydate", component: "/Juhuiadmin/laydate", name: "laydate"}
                , {path: "/juhui/table", component: "/Juhuiadmin/table", name: "table"}
                , {path: "/juhui/laypage", component: "/Juhuiadmin/laypage", name: "laypage"}
                , {path: "/juhui/upload", component: "/Juhuiadmin/upload", name: "upload"}
                , {path: "/juhui/carousel", component: "/Juhuiadmin/carousel",}
                , {path: "/juhui/laytpl", component: "/Juhuiadmin/laytpl", name: "laytpl"}
                , {path: "/juhui/flow", component: "/Juhuiadmin/flow", name: "flow"}
                , {path: "/juhui/util", component: "/Juhuiadmin/util", name: "util"}
                , {path: "/juhui/code", component: "/Juhuiadmin/code", name: "code"}
                , {path: "/juhui/select", component: "/Juhuiadmin/select", name: "code"}
                , {path: "/juhui/403", component: "/Juhuiadmin/p403", name: "code"}
                , {path: "/juhui/404", component: "/Juhuiadmin/p404", name: "code"}
                , {path: "/juhui/500", component: "/Juhuiadmin/p500", name: "code"}
                , {path: "/juhui/mockjs", component: "/Juhuiadmin/mockjs", name: "拦截器(Mockjs)"}
                , { path: "/juhui/menu", component: "/Juhuiadmin/menu", name: "左侧菜单(Menu)"}
                , {path: "/juhui/route", component: "/Juhuiadmin/route", name: "路由配置(Route)"}
                , { path: "/juhui/tabs", component: "/Juhuiadmin/tabs", name: "选项卡(Tabs)"}
                , {path: "/juhui/utils", component: "/Juhuiadmin/utils", name: "工具包(Utils)"}
                , {path: "/juhui/table", component: "/views/table/teble", name: "Table"}
                , {path: "/juhui/table2", component: "/Juhuiadminer/teble2", name: "数据表格2"}
                , {path: "/juhui/table3", component: "/Juhuiadminer/teble3", name: "数据表格3"}
                ]};
            return "TABS" === e.loadType && (a.onChanged = function () {
                i.existsByPath(location.hash) ? i.switchByPath(location.hash) : t.addTab(location.hash, (new Date).getTime())
            }), n.setRoutes(a), this
        }, addTab: function (e, t) {
            var a = n.getRoute(e);
            a && i.add({id: t, title: a.name, path: e, component: a.component, rendered: !1, icon: "&#xe62e;"})
        }, menuInit: function (e) {
            var t = this;
            return o.set({
                dynamicRender: !1, isJump: "SPA" === e.loadType, onClicked: function (a) {
                    if ("TABS" === e.loadType && !a.hasChild) {
                        var n = a.data, i = n.href, l = n.layid;
                        t.addTab(i, l)
                    }
                }, elem: "#menu-box", remote: {url: "/api/getmenus", method: "post"}, cached: !1
            }).render(), t
        }, tabsInit: function () {
            i.set({
                onChanged: function (e) {
                }
            }).render(function (e) {
                e.isIndex && n.render("#/")
            })
        }
    };
    (new p).ready(function () {
        console.log("Init successed.")
    }), e("admin", {})
});