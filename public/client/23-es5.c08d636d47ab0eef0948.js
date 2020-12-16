function _toConsumableArray(t){return _arrayWithoutHoles(t)||_iterableToArray(t)||_unsupportedIterableToArray(t)||_nonIterableSpread()}function _nonIterableSpread(){throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}function _unsupportedIterableToArray(t,n){if(t){if("string"==typeof t)return _arrayLikeToArray(t,n);var e=Object.prototype.toString.call(t).slice(8,-1);return"Object"===e&&t.constructor&&(e=t.constructor.name),"Map"===e||"Set"===e?Array.from(t):"Arguments"===e||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(e)?_arrayLikeToArray(t,n):void 0}}function _iterableToArray(t){if("undefined"!=typeof Symbol&&Symbol.iterator in Object(t))return Array.from(t)}function _arrayWithoutHoles(t){if(Array.isArray(t))return _arrayLikeToArray(t)}function _arrayLikeToArray(t,n){(null==n||n>t.length)&&(n=t.length);for(var e=0,i=new Array(n);e<n;e++)i[e]=t[e];return i}function _classCallCheck(t,n){if(!(t instanceof n))throw new TypeError("Cannot call a class as a function")}function _defineProperties(t,n){for(var e=0;e<n.length;e++){var i=n[e];i.enumerable=i.enumerable||!1,i.configurable=!0,"value"in i&&(i.writable=!0),Object.defineProperty(t,i.key,i)}}function _createClass(t,n,e){return n&&_defineProperties(t.prototype,n),e&&_defineProperties(t,e),t}(window.webpackJsonp=window.webpackJsonp||[]).push([[23],{cPR9:function(t,n,e){"use strict";e.r(n),e.d(n,"NotificationsModule",(function(){return Q}));var i,a=e("ofXK"),o=e("tyNb"),r=e("2Vo4"),c=e("nYR2"),s=e("3E0/"),l=e("0EQZ"),u=e("fXoL"),b=e("LRXf"),d=((i=function(){function t(n){_classCallCheck(this,t),this.http=n}return _createClass(t,[{key:"getAll",value:function(t){return this.http.get("notifications/".concat(t,"/subscriptions"))}},{key:"updateUserSubscriptions",value:function(t,n){return this.http.put("notifications/".concat(t,"/subscriptions"),{selections:n})}}]),t}()).\u0275fac=function(t){return new(t||i)(u.Yb(b.a))},i.\u0275prov=u.Kb({token:i,factory:i.\u0275fac,providedIn:"root"}),i),f=e("twBr"),g=e("i2dy"),p=e("kmQS"),h=e("N2vX"),m=e("3Pt+"),v=e("bTqV"),y=e("bSwM");function k(t,n){if(1&t){var e=u.Vb();u.Ub(0,"div",11),u.Ub(1,"div",12),u.Kc(2),u.Tb(),u.Ub(3,"mat-checkbox",13),u.bc("change",(function(t){u.zc(e);var i=n.$implicit,a=u.fc(3);return t?a.toggleAllRowsFor(i):null})),u.Tb(),u.Tb()}if(2&t){var i=n.$implicit,a=u.fc(3);u.Bb(2),u.Lc(i),u.Bb(1),u.nc("checked",a.allRowsSelectedFor(i))("indeterminate",a.selections[i].hasValue()&&!a.allRowsSelectedFor(i))("disabled","browser"===i&&!a.supportsBrowserNotifications)}}function P(t,n){if(1&t&&(u.Sb(0),u.Ic(1,k,4,4,"div",10),u.Rb()),2&t){var e=u.fc(2);u.Bb(1),u.nc("ngForOf",e.availableChannels)}}function C(t,n){if(1&t){var e=u.Vb();u.Ub(0,"div",11),u.Ub(1,"mat-checkbox",16),u.bc("click",(function(t){return u.zc(e),t.stopPropagation()}))("change",(function(t){u.zc(e);var i=n.$implicit,a=u.fc().$implicit,o=u.fc(2);return t?o.selections[i].toggle(a.notif_id):null})),u.Tb(),u.Tb()}if(2&t){var i=n.$implicit,a=u.fc().$implicit,o=u.fc(2);u.Bb(1),u.nc("checked",o.selections[i].isSelected(a.notif_id))("disabled","browser"===i&&!o.supportsBrowserNotifications)}}function _(t,n){if(1&t&&(u.Ub(0,"div",14),u.Ub(1,"div",15),u.Kc(2),u.Tb(),u.Ic(3,C,2,2,"div",10),u.Tb()),2&t){var e=n.$implicit,i=n.last,a=u.fc(2);u.Fb("no-border",i),u.Bb(2),u.Lc(e.name),u.Bb(1),u.nc("ngForOf",a.availableChannels)}}function w(t,n){if(1&t&&(u.Ub(0,"div",5),u.Ub(1,"div",6),u.Ub(2,"div",7),u.Kc(3),u.Tb(),u.Ic(4,P,2,1,"ng-container",8),u.Tb(),u.Ic(5,_,4,4,"div",9),u.Tb()),2&t){var e=n.$implicit,i=n.first;u.Bb(3),u.Lc(e.group_name),u.Bb(1),u.nc("ngIf",i),u.Bb(1),u.nc("ngForOf",e.subscriptions)}}var O,x,T=((O=function(){function t(n,e,i,a,o,c){_classCallCheck(this,t),this.route=n,this.api=e,this.currentUser=i,this.toast=a,this.cd=o,this.settings=c,this.loading$=new r.a(!1),this.supportsBrowserNotifications="Notification"in window,this.availableChannels=[],this.selections={},this.allNotifIds=[]}return _createClass(t,[{key:"ngOnInit",value:function(){var t=this;this.route.data.subscribe((function(n){t.subscriptions=n.api.subscriptions,t.availableChannels=n.api.available_channels,t.allNotifIds=n.api.all_notif_ids,t.availableChannels.forEach((function(e){t.selections[e]=new l.b(!0,n.api.selections[e])}))})),"granted"!==Notification.permission&&this.bindToBrowserNotifSubscription()}},{key:"toggleAllRowsFor",value:function(t){var n;this.allRowsSelectedFor(t)?this.selections[t].clear():(n=this.selections[t]).select.apply(n,_toConsumableArray(this.allNotifIds))}},{key:"allRowsSelectedFor",value:function(t){return this.selections[t].selected.length===this.allNotifIds.length}},{key:"saveSettings",value:function(){var t=this;this.loading$.next(!0);var n=this.getPayload();this.api.updateUserSubscriptions(this.currentUser.get("id"),n).pipe(Object(c.a)((function(){return t.loading$.next(!1)}))).subscribe((function(){t.toast.open("Notification settings updated.")}))}},{key:"getPayload",value:function(){var t=this,n={};return Object.keys(this.selections).forEach((function(e){n[e]=t.selections[e].selected})),n}},{key:"bindToBrowserNotifSubscription",value:function(){var t=this;this.selections.browser.changed.pipe(Object(s.a)(1)).subscribe((function(n){n.added.length&&!n.removed.length&&("denied"===Notification.permission?(t.toast.open("Notifications blocked. Please enable them for this site from browser settings."),t.selections.browser.clear(),t.cd.markForCheck()):Notification.requestPermission().then((function(n){"granted"!==n&&(t.selections.browser.clear(),t.cd.markForCheck())})))}))}}]),t}()).\u0275fac=function(t){return new(t||O)(u.Ob(o.a),u.Ob(d),u.Ob(f.a),u.Ob(g.b),u.Ob(u.h),u.Ob(p.a))},O.\u0275cmp=u.Ib({type:O,selectors:[["notification-subscriptions"]],decls:7,vars:5,consts:[[1,"box-shadow",3,"menuPosition"],[1,"be-container"],[1,"table","material-panel",3,"ngSubmit"],["class","setting-group",4,"ngFor","ngForOf"],["mat-raised-button","","color","accent","trans","",1,"submit-button",3,"disabled"],[1,"setting-group"],[1,"row"],["trans","",1,"name-column","strong"],[4,"ngIf"],["class","row indent",3,"no-border",4,"ngFor","ngForOf"],["class","channel-column",4,"ngFor","ngForOf"],[1,"channel-column"],["trans","",1,"channel-name"],[3,"checked","indeterminate","disabled","change"],[1,"row","indent"],["trans","",1,"name-column"],[3,"checked","disabled","click","change"]],template:function(t,n){1&t&&(u.Pb(0,"material-navbar",0),u.Ub(1,"div",1),u.Ub(2,"form",2),u.bc("ngSubmit",(function(){return n.saveSettings()})),u.Ic(3,w,6,3,"div",3),u.Ub(4,"button",4),u.gc(5,"async"),u.Kc(6,"Save Settings"),u.Tb(),u.Tb(),u.Tb()),2&t&&(u.nc("menuPosition",n.settings.get("vebto.navbar.defaultPosition")),u.Bb(3),u.nc("ngForOf",n.subscriptions),u.Bb(1),u.nc("disabled",u.hc(5,3,n.loading$)))},directives:[h.a,m.K,m.v,m.w,a.s,v.b,a.t,y.a],pipes:[a.b],styles:["[_nghost-%COMP%]{display:block;background-color:var(--be-background-alternative);min-height:100vh}.be-container[_ngcontent-%COMP%]{padding-top:35px;padding-bottom:35px}.table[_ngcontent-%COMP%]{border-radius:4px}.setting-group[_ngcontent-%COMP%]{margin-bottom:10px}.row[_ngcontent-%COMP%]{display:flex;align-items:center;border-bottom:1px solid var(--be-divider-default);padding:10px}.row.no-border[_ngcontent-%COMP%]{border-bottom:none}.row.indent[_ngcontent-%COMP%]{padding-left:20px}.name-column[_ngcontent-%COMP%]{flex:1 1 auto}.strong[_ngcontent-%COMP%]{font-weight:500;font-size:1.5rem;align-self:flex-end}.channel-name[_ngcontent-%COMP%]{margin-bottom:10px}.channel-column[_ngcontent-%COMP%]{width:75px;text-align:center;text-transform:capitalize}.submit-button[_ngcontent-%COMP%]{margin-top:15px}"],changeDetection:0}),O),U=e("JIr8"),M=e("5+tZ"),I=e("EY2u"),A=e("LRne"),B=((x=function(){function t(n,e,i){_classCallCheck(this,t),this.router=n,this.subscriptions=e,this.currentUser=i}return _createClass(t,[{key:"resolve",value:function(t,n){var e=this;return this.subscriptions.getAll(+this.currentUser.get("id")).pipe(Object(U.a)((function(){return e.router.navigate(["/account/settings"]),I.a})),Object(M.a)((function(t){return t?Object(A.a)(t):(e.router.navigate(["/account/settings"]),I.a)})))}}]),t}()).\u0275fac=function(t){return new(t||x)(u.Yb(o.f),u.Yb(d),u.Yb(f.a))},x.\u0275prov=u.Kb({token:x,factory:x.\u0275fac,providedIn:"root"}),x),F=e("f+iI"),S=e("OnlV"),$=e("WWJw"),N=e("Rd8u");function j(t,n){if(1&t){var e=u.Vb();u.Ub(0,"li"),u.Ub(1,"button",4),u.bc("click",(function(){u.zc(e);var t=n.$implicit;return u.fc().selectPage(t)})),u.Kc(2),u.Tb(),u.Tb()}if(2&t){var i=n.$implicit,a=u.fc();u.Bb(1),u.Fb("active",a.currentPage===i),u.nc("disabled",a.disabled),u.Bb(1),u.Lc(i)}}var R,L,K,E,V,z=((R=function(){function t(n){_classCallCheck(this,t),this.router=n,this.pageChanged=new u.n,this.disabled=!0}return _createClass(t,[{key:"selectPage",value:function(t){this.currentPage!==t&&(this.currentPage=t,this.pageChanged.next(t),this.router.navigate([],{queryParams:{page:t},replaceUrl:!0}))}},{key:"nextPage",value:function(){var t=this.currentPage+1;this.selectPage(t<=this.numberOfPages?t:this.currentPage)}},{key:"prevPage",value:function(){var t=this.currentPage-1;this.selectPage(t>=1?t:this.currentPage)}},{key:"shouldHide",get:function(){return this.numberOfPages<2}},{key:"pagination",set:function(t){t&&(this.numberOfPages=t.last_page>10?10:t.last_page,this.numberOfPages>1&&(this.iterator=Array.from(Array(this.numberOfPages).keys()).map((function(t){return t+1})),this.currentPage=t.current_page))}}]),t}()).\u0275fac=function(t){return new(t||R)(u.Ob(o.f))},R.\u0275cmp=u.Ib({type:R,selectors:[["pagination-widget"]],hostVars:2,hostBindings:function(t,n){2&t&&u.Fb("hidden",n.shouldHide)},inputs:{disabled:"disabled",pagination:"pagination"},outputs:{pageChanged:"pageChanged"},decls:8,vars:3,consts:[[1,"page-numbers","unstyled-list"],["type","button","mat-button","","trans","",1,"prev",3,"disabled","click"],[4,"ngFor","ngForOf"],["type","button","mat-button","","trans","",1,"next",3,"disabled","click"],["type","button","mat-flat-button","","color","gray",1,"page-number-button",3,"disabled","click"]],template:function(t,n){1&t&&(u.Ub(0,"ul",0),u.Ub(1,"li"),u.Ub(2,"button",1),u.bc("click",(function(){return n.prevPage()})),u.Kc(3,"Previous"),u.Tb(),u.Tb(),u.Ic(4,j,3,4,"li",2),u.Ub(5,"li"),u.Ub(6,"button",3),u.bc("click",(function(){return n.nextPage()})),u.Kc(7,"Next"),u.Tb(),u.Tb(),u.Tb()),2&t&&(u.Bb(2),u.nc("disabled",n.disabled),u.Bb(2),u.nc("ngForOf",n.iterator),u.Bb(2),u.nc("disabled",n.disabled))},directives:[v.b,N.a,a.s],styles:["[_nghost-%COMP%]{display:block}ul[_ngcontent-%COMP%]{display:flex;align-items:center;justify-content:center;flex-wrap:wrap;width:100%}li[_ngcontent-%COMP%]{margin:0 3px 6px}.page-number-button[_ngcontent-%COMP%]{width:40px;height:40px;min-width:40px;line-height:40px;padding:0}.active[_ngcontent-%COMP%]{background-color:var(--be-accent-default);color:var(--be-accent-contrast)}.next[_ngcontent-%COMP%], .prev[_ngcontent-%COMP%]{color:var(--be-accent-default)}"],changeDetection:0}),R),Y=[{path:"",component:(L=function(){function t(n,e,i,a){_classCallCheck(this,t),this.settings=n,this.notifications=e,this.breakpoints=i,this.route=a,this.pagination$=new r.a(null)}return _createClass(t,[{key:"ngOnInit",value:function(){this.loadPage(this.route.snapshot.queryParams.page||1)}},{key:"loadPage",value:function(t){var n=this;this.notifications.load({page:t,perPage:25}).subscribe((function(t){n.pagination$.next(t.pagination)}))}},{key:"markAsRead",value:function(t){this.pagination$.value.data.find((function(n){return n.id===t.id})).read_at=t.read_at}}]),t}(),L.\u0275fac=function(t){return new(t||L)(u.Ob(p.a),u.Ob(F.a),u.Ob(S.a),u.Ob(o.a))},L.\u0275cmp=u.Ib({type:L,selectors:[["notification-page"]],decls:8,vars:13,consts:[[3,"menuPosition"],[1,"be-container"],[3,"notifications","compact","markedAsRead"],[3,"pagination","disabled","pageChanged"]],template:function(t,n){if(1&t&&(u.Pb(0,"material-navbar",0),u.Ub(1,"div",1),u.Ub(2,"notification-list",2),u.bc("markedAsRead",(function(t){return n.markAsRead(t)})),u.gc(3,"async"),u.gc(4,"async"),u.Tb(),u.Ub(5,"pagination-widget",3),u.bc("pageChanged",(function(t){return n.loadPage(t)})),u.gc(6,"async"),u.gc(7,"async"),u.Tb(),u.Tb()),2&t){var e,i=null==(e=u.hc(3,5,n.pagination$))?null:e.data;u.nc("menuPosition",n.settings.get("vebto.navbar.defaultPosition")),u.Bb(2),u.nc("notifications",i)("compact",u.hc(4,7,n.breakpoints.isMobile$)),u.Bb(3),u.nc("pagination",u.hc(6,9,n.pagination$))("disabled",u.hc(7,11,n.notifications.loading$))}},directives:[h.a,$.a,z],pipes:[a.b],styles:["[_nghost-%COMP%]{display:block;min-height:100vh;background-color:var(--be-background-alternative)}.be-container[_ngcontent-%COMP%]{padding-top:25px;padding-bottom:25px}pagination-widget[_ngcontent-%COMP%]{margin-top:35px}"],changeDetection:0}),L)},{path:"settings",component:T,resolve:{api:B},data:{permissions:["notification.subscribe"]}}],W=((K=function t(){_classCallCheck(this,t)}).\u0275mod=u.Mb({type:K}),K.\u0275inj=u.Lb({factory:function(t){return new(t||K)},imports:[[o.j.forChild(Y)],o.j]}),K),X=e("MKyN"),q=e("CXWK"),H=e("gFpt"),J=e("6rvT"),D=((V=function t(){_classCallCheck(this,t)}).\u0275mod=u.Mb({type:V}),V.\u0275inj=u.Lb({factory:function(t){return new(t||V)},imports:[[a.c,v.c,J.a]]}),V),Q=((E=function t(){_classCallCheck(this,t)}).\u0275mod=u.Mb({type:E}),E.\u0275inj=u.Lb({factory:function(t){return new(t||E)},imports:[[a.c,m.o,m.E,W,H.a,X.a,q.a,D,y.b,v.c]]}),E)}}]);