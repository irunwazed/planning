(window.webpackJsonp=window.webpackJsonp||[]).push([[9],{264:function(e,a,t){"use strict";function s(){var e=this.constructor.getDerivedStateFromProps(this.props,this.state);null!==e&&void 0!==e&&this.setState(e)}function l(e){this.setState(function(a){var t=this.constructor.getDerivedStateFromProps(e,a);return null!==t&&void 0!==t?t:null}.bind(this))}function c(e,a){try{var t=this.props,s=this.state;this.props=e,this.state=a,this.__reactInternalSnapshotFlag=!0,this.__reactInternalSnapshot=this.getSnapshotBeforeUpdate(t,s)}finally{this.props=t,this.state=s}}function r(e){var a=e.prototype;if(!a||!a.isReactComponent)throw new Error("Can only polyfill class components");if("function"!==typeof e.getDerivedStateFromProps&&"function"!==typeof a.getSnapshotBeforeUpdate)return e;var t=null,r=null,m=null;if("function"===typeof a.componentWillMount?t="componentWillMount":"function"===typeof a.UNSAFE_componentWillMount&&(t="UNSAFE_componentWillMount"),"function"===typeof a.componentWillReceiveProps?r="componentWillReceiveProps":"function"===typeof a.UNSAFE_componentWillReceiveProps&&(r="UNSAFE_componentWillReceiveProps"),"function"===typeof a.componentWillUpdate?m="componentWillUpdate":"function"===typeof a.UNSAFE_componentWillUpdate&&(m="UNSAFE_componentWillUpdate"),null!==t||null!==r||null!==m){var n=e.displayName||e.name,i="function"===typeof e.getDerivedStateFromProps?"getDerivedStateFromProps()":"getSnapshotBeforeUpdate()";throw Error("Unsafe legacy lifecycles will not be called for components using new component APIs.\n\n"+n+" uses "+i+" but also contains the following legacy lifecycles:"+(null!==t?"\n  "+t:"")+(null!==r?"\n  "+r:"")+(null!==m?"\n  "+m:"")+"\n\nThe above lifecycles should be removed. Learn more about this warning here:\nhttps://fb.me/react-async-component-lifecycle-hooks")}if("function"===typeof e.getDerivedStateFromProps&&(a.componentWillMount=s,a.componentWillReceiveProps=l),"function"===typeof a.getSnapshotBeforeUpdate){if("function"!==typeof a.componentDidUpdate)throw new Error("Cannot polyfill getSnapshotBeforeUpdate() for components that do not define componentDidUpdate() on the prototype");a.componentWillUpdate=c;var o=a.componentDidUpdate;a.componentDidUpdate=function(e,a,t){var s=this.__reactInternalSnapshotFlag?this.__reactInternalSnapshot:t;o.call(this,e,a,s)}}return e}t.r(a),t.d(a,"polyfill",function(){return r}),s.__suppressDeprecationWarning=!0,l.__suppressDeprecationWarning=!0,c.__suppressDeprecationWarning=!0},272:function(e,a,t){"use strict";function s(e,a){if(null==e)return{};var t,s,l=function(e,a){if(null==e)return{};var t,s,l={},c=Object.keys(e);for(s=0;s<c.length;s++)t=c[s],a.indexOf(t)>=0||(l[t]=e[t]);return l}(e,a);if(Object.getOwnPropertySymbols){var c=Object.getOwnPropertySymbols(e);for(s=0;s<c.length;s++)t=c[s],a.indexOf(t)>=0||Object.prototype.propertyIsEnumerable.call(e,t)&&(l[t]=e[t])}return l}t.d(a,"a",function(){return s})},315:function(e,a){var t=NaN,s="[object Symbol]",l=/^\s+|\s+$/g,c=/^[-+]0x[0-9a-f]+$/i,r=/^0b[01]+$/i,m=/^0o[0-7]+$/i,n=parseInt,i=Object.prototype.toString;function o(e){var a=typeof e;return!!e&&("object"==a||"function"==a)}e.exports=function(e){if("number"==typeof e)return e;if(function(e){return"symbol"==typeof e||function(e){return!!e&&"object"==typeof e}(e)&&i.call(e)==s}(e))return t;if(o(e)){var a="function"==typeof e.valueOf?e.valueOf():e;e=o(a)?a+"":a}if("string"!=typeof e)return 0===e?e:+e;e=e.replace(l,"");var u=r.test(e);return u||m.test(e)?n(e.slice(2),u?2:8):c.test(e)?t:+e}},354:function(e,a,t){"use strict";t.r(a);var s=t(272),l=t(94),c=t(95),r=t(97),m=t(96),n=t(98),i=t(100),o=t(1),u=t.n(o),d=t(331),p=t(328),v=t(329),g=t(41),E=t(42),b=t(255),N=t(256),f=t(0),h=t.n(f),x=t(253),y=t.n(x),j=t(254),O={tag:j.m,flush:h.a.bool,className:h.a.string,cssModule:h.a.object},S=function(e){var a=e.className,t=e.cssModule,s=e.tag,l=e.flush,c=Object(N.a)(e,["className","cssModule","tag","flush"]),r=Object(j.i)(y()(a,"list-group",!!l&&"list-group-flush"),t);return u.a.createElement(s,Object(b.a)({},c,{className:r}))};S.propTypes=O,S.defaultProps={tag:"ul"};var T=S,w={tag:j.m,active:h.a.bool,disabled:h.a.bool,color:h.a.string,action:h.a.bool,className:h.a.any,cssModule:h.a.object},P=function(e){e.preventDefault()},M=function(e){var a=e.className,t=e.cssModule,s=e.tag,l=e.active,c=e.disabled,r=e.action,m=e.color,n=Object(N.a)(e,["className","cssModule","tag","active","disabled","action","color"]),i=Object(j.i)(y()(a,!!l&&"active",!!c&&"disabled",!!r&&"list-group-item-action",!!m&&"list-group-item-"+m,"list-group-item"),t);return c&&(n.onClick=P),u.a.createElement(s,Object(b.a)({},n,{className:i}))};M.propTypes=w,M.defaultProps={tag:"li"};var k=M,U=t(315),C=t.n(U),L={children:h.a.node,bar:h.a.bool,multi:h.a.bool,tag:j.m,value:h.a.oneOfType([h.a.string,h.a.number]),max:h.a.oneOfType([h.a.string,h.a.number]),animated:h.a.bool,striped:h.a.bool,color:h.a.string,className:h.a.string,barClassName:h.a.string,cssModule:h.a.object},_=function(e){var a=e.children,t=e.className,s=e.barClassName,l=e.cssModule,c=e.value,r=e.max,m=e.animated,n=e.striped,i=e.color,o=e.bar,d=e.multi,p=e.tag,v=Object(N.a)(e,["children","className","barClassName","cssModule","value","max","animated","striped","color","bar","multi","tag"]),g=C()(c)/C()(r)*100,E=Object(j.i)(y()(t,"progress"),l),f=Object(j.i)(y()("progress-bar",o&&t||s,m?"progress-bar-animated":null,i?"bg-"+i:null,n||m?"progress-bar-striped":null),l),h=d?a:u.a.createElement("div",{className:f,style:{width:g+"%"},role:"progressbar","aria-valuenow":c,"aria-valuemin":"0","aria-valuemax":r,children:a});return o?h:u.a.createElement(p,Object(b.a)({},v,{className:E,children:h}))};_.propTypes=L,_.defaultProps={tag:"div",value:0,max:100};var I=_,W=t(275),D=function(e){function a(e){var t;return Object(l.a)(this,a),(t=Object(r.a)(this,Object(m.a)(a).call(this,e))).toggle=t.toggle.bind(Object(i.a)(Object(i.a)(t))),t.state={activeTab:"1"},t}return Object(n.a)(a,e),Object(c.a)(a,[{key:"toggle",value:function(e){this.state.activeTab!==e&&this.setState({activeTab:e})}},{key:"render",value:function(){var e=this,a=this.props;a.children,Object(s.a)(a,["children"]);return u.a.createElement(u.a.Fragment,null,u.a.createElement(d.a,{tabs:!0},u.a.createElement(p.a,null,u.a.createElement(v.a,{className:y()({active:"1"===this.state.activeTab}),onClick:function(){e.toggle("1")}},u.a.createElement("i",{className:"icon-list"}))),u.a.createElement(p.a,null,u.a.createElement(v.a,{className:y()({active:"2"===this.state.activeTab}),onClick:function(){e.toggle("2")}},u.a.createElement("i",{className:"icon-speech"}))),u.a.createElement(p.a,null,u.a.createElement(v.a,{className:y()({active:"3"===this.state.activeTab}),onClick:function(){e.toggle("3")}},u.a.createElement("i",{className:"icon-settings"})))),u.a.createElement(g.a,{activeTab:this.state.activeTab},u.a.createElement(E.a,{tabId:"1"},u.a.createElement(T,{className:"list-group-accent",tag:"div"},u.a.createElement(k,{className:"list-group-item-accent-secondary bg-light text-center font-weight-bold text-muted text-uppercase small"},"Today"),u.a.createElement(k,{action:!0,tag:"a",href:"#",className:"list-group-item-accent-warning list-group-item-divider"},u.a.createElement("div",{className:"avatar float-right"},u.a.createElement("img",{className:"img-avatar",src:"assets/img/avatars/7.jpg",alt:"admin@bootstrapmaster.com"})),u.a.createElement("div",null,"Meeting with ",u.a.createElement("strong",null,"Lucas")," "),u.a.createElement("small",{className:"text-muted mr-3"},u.a.createElement("i",{className:"icon-calendar"}),"\xa0 1 - 3pm"),u.a.createElement("small",{className:"text-muted"},u.a.createElement("i",{className:"icon-location-pin"})," Palo Alto, CA")),u.a.createElement(k,{action:!0,tag:"a",href:"#",className:"list-group-item-accent-info list-group-item-divider"},u.a.createElement("div",{className:"avatar float-right"},u.a.createElement("img",{className:"img-avatar",src:"assets/img/avatars/4.jpg",alt:"admin@bootstrapmaster.com"})),u.a.createElement("div",null,"Skype with ",u.a.createElement("strong",null,"Megan")),u.a.createElement("small",{className:"text-muted mr-3"},u.a.createElement("i",{className:"icon-calendar"}),"\xa0 4 - 5pm"),u.a.createElement("small",{className:"text-muted"},u.a.createElement("i",{className:"icon-social-skype"})," On-line")),u.a.createElement(k,{className:"list-group-item-accent-secondary bg-light text-center font-weight-bold text-muted text-uppercase small"},"Tomorrow"),u.a.createElement(k,{action:!0,tag:"a",href:"#",className:"list-group-item-accent-danger list-group-item-divider"},u.a.createElement("div",null,"New UI Project - ",u.a.createElement("strong",null,"deadline")),u.a.createElement("small",{className:"text-muted mr-3"},u.a.createElement("i",{className:"icon-calendar"}),"\xa0 10 - 11pm"),u.a.createElement("small",{className:"text-muted"},u.a.createElement("i",{className:"icon-home"}),"\xa0 creativeLabs HQ"),u.a.createElement("div",{className:"avatars-stack mt-2"},u.a.createElement("div",{className:"avatar avatar-xs"},u.a.createElement("img",{src:"assets/img/avatars/2.jpg",className:"img-avatar",alt:"admin@bootstrapmaster.com"})),u.a.createElement("div",{className:"avatar avatar-xs"},u.a.createElement("img",{src:"assets/img/avatars/3.jpg",className:"img-avatar",alt:"admin@bootstrapmaster.com"})),u.a.createElement("div",{className:"avatar avatar-xs"},u.a.createElement("img",{src:"assets/img/avatars/4.jpg",className:"img-avatar",alt:"admin@bootstrapmaster.com"})),u.a.createElement("div",{className:"avatar avatar-xs"},u.a.createElement("img",{src:"assets/img/avatars/5.jpg",className:"img-avatar",alt:"admin@bootstrapmaster.com"})),u.a.createElement("div",{className:"avatar avatar-xs"},u.a.createElement("img",{src:"assets/img/avatars/6.jpg",className:"img-avatar",alt:"admin@bootstrapmaster.com"})))),u.a.createElement(k,{action:!0,tag:"a",href:"#",className:"list-group-item-accent-success list-group-item-divider"},u.a.createElement("div",null,u.a.createElement("strong",null,"#10 Startups.Garden")," Meetup"),u.a.createElement("small",{className:"text-muted mr-3"},u.a.createElement("i",{className:"icon-calendar"}),"\xa0 1 - 3pm"),u.a.createElement("small",{className:"text-muted"},u.a.createElement("i",{className:"icon-location-pin"}),"\xa0 Palo Alto, CA")),u.a.createElement(k,{action:!0,tag:"a",href:"#",className:"list-group-item-accent-primary list-group-item-divider"},u.a.createElement("div",null,u.a.createElement("strong",null,"Team meeting")),u.a.createElement("small",{className:"text-muted mr-3"},u.a.createElement("i",{className:"icon-calendar"}),"\xa0 4 - 6pm"),u.a.createElement("small",{className:"text-muted"},u.a.createElement("i",{className:"icon-home"}),"\xa0 creativeLabs HQ"),u.a.createElement("div",{className:"avatars-stack mt-2"},u.a.createElement("div",{className:"avatar avatar-xs"},u.a.createElement("img",{src:"assets/img/avatars/2.jpg",className:"img-avatar",alt:"admin@bootstrapmaster.com"})),u.a.createElement("div",{className:"avatar avatar-xs"},u.a.createElement("img",{src:"assets/img/avatars/3.jpg",className:"img-avatar",alt:"admin@bootstrapmaster.com"})),u.a.createElement("div",{className:"avatar avatar-xs"},u.a.createElement("img",{src:"assets/img/avatars/4.jpg",className:"img-avatar",alt:"admin@bootstrapmaster.com"})),u.a.createElement("div",{className:"avatar avatar-xs"},u.a.createElement("img",{src:"assets/img/avatars/5.jpg",className:"img-avatar",alt:"admin@bootstrapmaster.com"})),u.a.createElement("div",{className:"avatar avatar-xs"},u.a.createElement("img",{src:"assets/img/avatars/6.jpg",className:"img-avatar",alt:"admin@bootstrapmaster.com"})),u.a.createElement("div",{className:"avatar avatar-xs"},u.a.createElement("img",{src:"assets/img/avatars/7.jpg",className:"img-avatar",alt:"admin@bootstrapmaster.com"})),u.a.createElement("div",{className:"avatar avatar-xs"},u.a.createElement("img",{src:"assets/img/avatars/8.jpg",className:"img-avatar",alt:"admin@bootstrapmaster.com"})))))),u.a.createElement(E.a,{tabId:"2",className:"p-3"},u.a.createElement("div",{className:"message"},u.a.createElement("div",{className:"py-3 pb-5 mr-3 float-left"},u.a.createElement("div",{className:"avatar"},u.a.createElement("img",{src:"assets/img/avatars/7.jpg",className:"img-avatar",alt:"admin@bootstrapmaster.com"}),u.a.createElement("span",{className:"avatar-status badge-success"}))),u.a.createElement("div",null,u.a.createElement("small",{className:"text-muted"},"Lukasz Holeczek"),u.a.createElement("small",{className:"text-muted float-right mt-1"},"1:52 PM")),u.a.createElement("div",{className:"text-truncate font-weight-bold"},"Lorem ipsum dolor sit amet"),u.a.createElement("small",{className:"text-muted"},"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt...")),u.a.createElement("hr",null),u.a.createElement("div",{className:"message"},u.a.createElement("div",{className:"py-3 pb-5 mr-3 float-left"},u.a.createElement("div",{className:"avatar"},u.a.createElement("img",{src:"assets/img/avatars/7.jpg",className:"img-avatar",alt:"admin@bootstrapmaster.com"}),u.a.createElement("span",{className:"avatar-status badge-success"}))),u.a.createElement("div",null,u.a.createElement("small",{className:"text-muted"},"Lukasz Holeczek"),u.a.createElement("small",{className:"text-muted float-right mt-1"},"1:52 PM")),u.a.createElement("div",{className:"text-truncate font-weight-bold"},"Lorem ipsum dolor sit amet"),u.a.createElement("small",{className:"text-muted"},"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt...")),u.a.createElement("hr",null),u.a.createElement("div",{className:"message"},u.a.createElement("div",{className:"py-3 pb-5 mr-3 float-left"},u.a.createElement("div",{className:"avatar"},u.a.createElement("img",{src:"assets/img/avatars/7.jpg",className:"img-avatar",alt:"admin@bootstrapmaster.com"}),u.a.createElement("span",{className:"avatar-status badge-success"}))),u.a.createElement("div",null,u.a.createElement("small",{className:"text-muted"},"Lukasz Holeczek"),u.a.createElement("small",{className:"text-muted float-right mt-1"},"1:52 PM")),u.a.createElement("div",{className:"text-truncate font-weight-bold"},"Lorem ipsum dolor sit amet"),u.a.createElement("small",{className:"text-muted"},"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt...")),u.a.createElement("hr",null),u.a.createElement("div",{className:"message"},u.a.createElement("div",{className:"py-3 pb-5 mr-3 float-left"},u.a.createElement("div",{className:"avatar"},u.a.createElement("img",{src:"assets/img/avatars/7.jpg",className:"img-avatar",alt:"admin@bootstrapmaster.com"}),u.a.createElement("span",{className:"avatar-status badge-success"}))),u.a.createElement("div",null,u.a.createElement("small",{className:"text-muted"},"Lukasz Holeczek"),u.a.createElement("small",{className:"text-muted float-right mt-1"},"1:52 PM")),u.a.createElement("div",{className:"text-truncate font-weight-bold"},"Lorem ipsum dolor sit amet"),u.a.createElement("small",{className:"text-muted"},"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt...")),u.a.createElement("hr",null),u.a.createElement("div",{className:"message"},u.a.createElement("div",{className:"py-3 pb-5 mr-3 float-left"},u.a.createElement("div",{className:"avatar"},u.a.createElement("img",{src:"assets/img/avatars/7.jpg",className:"img-avatar",alt:"admin@bootstrapmaster.com"}),u.a.createElement("span",{className:"avatar-status badge-success"}))),u.a.createElement("div",null,u.a.createElement("small",{className:"text-muted"},"Lukasz Holeczek"),u.a.createElement("small",{className:"text-muted float-right mt-1"},"1:52 PM")),u.a.createElement("div",{className:"text-truncate font-weight-bold"},"Lorem ipsum dolor sit amet"),u.a.createElement("small",{className:"text-muted"},"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt..."))),u.a.createElement(E.a,{tabId:"3",className:"p-3"},u.a.createElement("h6",null,"Settings"),u.a.createElement("div",{className:"aside-options"},u.a.createElement("div",{className:"clearfix mt-4"},u.a.createElement("small",null,u.a.createElement("b",null,"Option 1")),u.a.createElement(W.m,{className:"float-right",variant:"pill",label:!0,color:"success",defaultChecked:!0,size:"sm"})),u.a.createElement("div",null,u.a.createElement("small",{className:"text-muted"},"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua."))),u.a.createElement("div",{className:"aside-options"},u.a.createElement("div",{className:"clearfix mt-3"},u.a.createElement("small",null,u.a.createElement("b",null,"Option 2")),u.a.createElement(W.m,{className:"float-right",variant:"pill",label:!0,color:"success",size:"sm"})),u.a.createElement("div",null,u.a.createElement("small",{className:"text-muted"},"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua."))),u.a.createElement("div",{className:"aside-options"},u.a.createElement("div",{className:"clearfix mt-3"},u.a.createElement("small",null,u.a.createElement("b",null,"Option 3")),u.a.createElement(W.m,{className:"float-right",variant:"pill",label:!0,color:"success",defaultChecked:!0,size:"sm",disabled:!0}),u.a.createElement("div",null,u.a.createElement("small",{className:"text-muted"},"Option disabled.")))),u.a.createElement("div",{className:"aside-options"},u.a.createElement("div",{className:"clearfix mt-3"},u.a.createElement("small",null,u.a.createElement("b",null,"Option 4")),u.a.createElement(W.m,{className:"float-right",variant:"pill",label:!0,color:"success",defaultChecked:!0,size:"sm"}))),u.a.createElement("hr",null),u.a.createElement("h6",null,"System Utilization"),u.a.createElement("div",{className:"text-uppercase mb-1 mt-4"},u.a.createElement("small",null,u.a.createElement("b",null,"CPU Usage"))),u.a.createElement(I,{className:"progress-xs",color:"info",value:"25"}),u.a.createElement("small",{className:"text-muted"},"348 Processes. 1/4 Cores."),u.a.createElement("div",{className:"text-uppercase mb-1 mt-2"},u.a.createElement("small",null,u.a.createElement("b",null,"Memory Usage"))),u.a.createElement(I,{className:"progress-xs",color:"warning",value:"70"}),u.a.createElement("small",{className:"text-muted"},"11444GB/16384MB"),u.a.createElement("div",{className:"text-uppercase mb-1 mt-2"},u.a.createElement("small",null,u.a.createElement("b",null,"SSD 1 Usage"))),u.a.createElement(I,{className:"progress-xs",color:"danger",value:"95"}),u.a.createElement("small",{className:"text-muted"},"243GB/256GB"),u.a.createElement("div",{className:"text-uppercase mb-1 mt-2"},u.a.createElement("small",null,u.a.createElement("b",null,"SSD 2 Usage"))),u.a.createElement(I,{className:"progress-xs",color:"success",value:"10"}),u.a.createElement("small",{className:"text-muted"},"25GB/256GB"))))}}]),a}(o.Component);D.defaultProps={};a.default=D},41:function(e,a,t){"use strict";var s=t(255),l=t(257),c=t(1),r=t.n(c),m=t(264),n=t(0),i=t.n(n),o=t(253),u=t.n(o),d=t(254),p={tag:d.m,activeTab:i.a.any,className:i.a.string,cssModule:i.a.object},v={activeTabId:i.a.any},g=function(e){function a(a){var t;return(t=e.call(this,a)||this).state={activeTab:t.props.activeTab},t}Object(l.a)(a,e),a.getDerivedStateFromProps=function(e,a){return a.activeTab!==e.activeTab?{activeTab:e.activeTab}:null};var t=a.prototype;return t.getChildContext=function(){return{activeTabId:this.state.activeTab}},t.render=function(){var e=this.props,a=e.className,t=e.cssModule,l=e.tag,c=Object(d.j)(this.props,Object.keys(p)),m=Object(d.i)(u()("tab-content",a),t);return r.a.createElement(l,Object(s.a)({},c,{className:m}))},a}(c.Component);Object(m.polyfill)(g),a.a=g,g.propTypes=p,g.defaultProps={tag:"div"},g.childContextTypes=v},42:function(e,a,t){"use strict";t.d(a,"a",function(){return v});var s=t(255),l=t(256),c=t(1),r=t.n(c),m=t(0),n=t.n(m),i=t(253),o=t.n(i),u=t(254),d={tag:u.m,className:n.a.string,cssModule:n.a.object,tabId:n.a.any},p={activeTabId:n.a.any};function v(e,a){var t=e.className,c=e.cssModule,m=e.tabId,n=e.tag,i=Object(l.a)(e,["className","cssModule","tabId","tag"]),d=Object(u.i)(o()("tab-pane",t,{active:m===a.activeTabId}),c);return r.a.createElement(n,Object(s.a)({},i,{className:d}))}v.propTypes=d,v.defaultProps={tag:"div"},v.contextTypes=p}}]);
//# sourceMappingURL=9.5df4f757.chunk.js.map