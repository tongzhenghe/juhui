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
            url: "juhuiadmin.php/app",
            width: "50%"
        }), a("#cc").on("click", function () {
            layui.sidebar.render({
                elem: this,
                title: "这是表单盒子",
                shade: !0,
                dynamicRender: !0,
                url: "juhuiadmin.php/formindex",
                width: "50%"
            })
        }), m.on("nav(header_right)", function (e) {
            var t = e.elem.attr("kit-target");
            "setting" === t && layui.sidebar.render({
                elem: e.elem,
                title: "设置",
                shade: !0,
                dynamicRender: !0,
                url: "juhuiadmin.php/setting"
            })
             /*   , "menu" === t && layui.sidebar.render({
                elem: e.elem,
                title: "菜单管理",
                shade: !0,
                url: "menu",
                direction: "left",
                dynamicRender: !0,
                width: "100%"
            })*/
        }), layui.mockjs.inject(APIs), "SPA" === i.loadType && n.render(), "function" == typeof e && e()
    };
    var u = {
        routeInit: function (e) {
            var t = this, a = {
                r: [{
                    path: "/user/index",
                    component: "views/user/index",
                    name: "用户列表",
                    children: [{
                        path: "/user/create",
                        component: "views/user/create",
                        name: "新增用户"
                    }, {path: "/user/edit", component: "views/user/edit", name: "编辑用户"}]
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
                }, {path: "/user/index", component: "/views/user/index", name: "用户列表"}, {
                    path: "/user/create",
                    component: "views/user/create",
                    name: "新增用户"
                }, {path: "/user/edit", component: "views/user/edit", name: "编辑用户"}, {
                    path: "/cascader",
                    component: "views/cascader/index",
                    name: "Cascader"}
                , {path: "/", component: "juhuiadmin.php/app", name: "主页"}
                , {path: "/juhui/app", component: "juhuiadmin.php/app", name: "主页"}
                , {path: "/juhui/profile", component: "juhuiadmin.php/profile", name: "用户中心"}
                , {path: "/juhui/grid", component: "juhuiadmin.php/grid", name: "Grid"}
                , {path: "/juhui/button", component: "juhuiadmin.php/button", name: "按钮"}
                , {path: "/juhui/form", component: "juhuiadmin.php/form", name: "表单"}
                , {path: "/juhui/nav", component: "juhuiadmin.php/nav", name: "导航/面包屑"}
                , {path: "/juhui/tab", component: "juhuiadmin.php/tab", name: "选项卡"}
                , {path: "/juhui/progress", component: "juhuiadmin.php/progress", name: "progress"}
                , {path: "/juhui/panel", component: "juhuiadmin.php/panel", name: "panel"}
                , {path: "/juhui/badge", component: "juhuiadmin.php/badge", name: "badge"}
                , {path: "/juhui/timeline", component: "juhuiadmin.php/timeline", name: "timeline"}
                , {path: "/juhui/table_element", component: "juhuiadmin.php/table_element", name: "table-element"}
                , {path: "/juhui/anim", component: "juhuiadmin.php/anim", name: "anim"}
                , {path: "/juhui/auxiliar", component: "juhuiadmin.php/auxiliar", name: "anim"}
                , {path: "/juhui/layer", component: "juhuiadmin.php/layer", name: "layer"}
                , {path: "/juhui/laydate", component: "juhuiadmin.php/laydate", name: "laydate"}
                , {path: "/juhui/table", component: "juhuiadmin.php/table", name: "table"}
                , {path: "/juhui/laypage", component: "juhuiadmin.php/laypage", name: "laypage"}
                , {path: "/juhui/upload", component: "juhuiadmin.php/upload", name: "upload"}
                , {path: "/juhui/carousel", component: "juhuiadmin.php/carousel",}
                , {path: "/juhui/laytpl", component: "juhuiadmin.php/laytpl", name: "laytpl"}
                , {path: "/juhui/flow", component: "juhuiadmin.php/flow", name: "flow"}
                , {path: "/juhui/util", component: "juhuiadmin.php/util", name: "util"}
                , {path: "/juhui/code", component: "juhuiadmin.php/code", name: "code"}
                , {path: "/juhui/select", component: "juhuiadmin.php/select", name: "code"}
                , {path: "/juhui/403", component: "juhuiadmin.php/p403", name: "code"}
                , {path: "/juhui/404", component: "juhuiadmin.php/p404", name: "code"}
                , {path: "/juhui/500", component: "juhuiadmin.php/p500", name: "code"}
                , {path: "/juhui/mockjs", component: "juhuiadmin.php/mockjs", name: "拦截器(Mockjs)"}
                , { path: "/juhui/menu", component: "/juhuiadmin.php/menu", name: "左侧菜单(Menu)"}
                , { path: "/juhui/addmenu", component: "juhuiadmin.php/addmenu", name: "add(Menu)"}
                , { path: "/juhui/umenu", component: "juhuiadmin.php/umenu", name: "前台菜单(umenu)"}
                , { path: "/juhui/addumenu", component: "juhuiadmin.php/addumenu", name: "add(Menu)"}
                , { path: "/juhui/menu", component: "juhuiadmin.php/menu", name: "左侧菜单(Menu)"}
                , {path: "/juhui/route", component: "juhuiadmin.php/route", name: "路由配置(Route)"}
                , { path: "/juhui/tabs", component: "juhuiadmin.php/tabs", name: "选项卡(Tabs)"}
                , {path: "/juhui/utils", component: "juhuiadmin.php/utils", name: "工具包(Utils)"}
                , {path: "/juhui/us", component: "juhuiadmin.php/us", name: "关于我们(us)"}
                , {path: "/juhui/news", component: "juhuiadmin.php/news", name: "news"}
                , {path: "/juhui/addnews", component: "juhuiadmin.php/addnews", name: "addnews"}
                , {path: "/juhui/article", component: "juhuiadmin.php/article", name: "article"}
                , {path: "/juhui/addarticle", component: "juhuiadmin.php/addarticle", name: "addarticle"}
                , {path: "/juhui/goods", component: "juhuiadmin.php/goods", name: "goods"}
                , {path: "/juhui/addgoods", component: "juhuiadmin.php/addgoods", name: "addgoods"}
                , {path: "/juhui/goodscate", component: "juhuiadmin.php/goodscate", name: "goodscate"}
                , {path: "/juhui/addgoodscate", component: "juhuiadmin.php/addgoodscate", name: "addgoodscate"}
                , {path: "/juhui/recruit", component: "juhuiadmin.php/recruit", name: "recruit"}
                , {path: "/juhui/addrecruit", component: "juhuiadmin.php/addrecruit", name: "addrecruit"}
                , {path: "/juhui/friendly", component: "juhuiadmin.php/friendly", name: "friendly"}
                , {path: "/juhui/addfriendly", component: "juhuiadmin.php/addfriendly", name: "addfriendly"}
                , {path: "/juhui/banner", component: "juhuiadmin.php/banner", name: "banner"}
                , {path: "/juhui/addbanner", component: "juhuiadmin.php/addbanner", name: "addbanner"}
                , {path: "/juhui/data_backups", component: "juhuiadmin.php/data_backups", name: "data_backups"}
                , {path: "/juhui/fileManage", component: "juhuiadmin.php/fileManage", name: "fileManage"}
                , {path: "/juhui/addfiles", component: "juhuiadmin.php/addfiles", name: "addfiles"}
                , {path: "/juhui/webset", component: "juhuiadmin.php/webset", name: "webset"}


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
    }), e("admin", {})
});