/*
 Highcharts JS v6.0.7 (2018-02-16)

 3D features for Highcharts JS

 @license: www.highcharts.com/license
*/
(function(C){"object"===typeof module&&module.exports?module.exports=C:C(Highcharts)})(function(C){(function(d){var w=d.deg2rad,y=d.pick;d.perspective=function(A,z,q){var B=z.options.chart.options3d,k=q?z.inverted:!1,v=z.plotWidth/2,n=z.plotHeight/2,u=B.depth/2,c=y(B.depth,1)*y(B.viewDistance,0),a=z.scale3d||1,h=w*B.beta*(k?-1:1),B=w*B.alpha*(k?-1:1),e=Math.cos(B),g=Math.cos(-h),b=Math.sin(B),t=Math.sin(-h);q||(v+=z.plotLeft,n+=z.plotTop);return d.map(A,function(d){var l,h;h=(k?d.y:d.x)-v;var p=(k?
d.x:d.y)-n,x=(d.z||0)-u;l=g*h-t*x;d=-b*t*h+e*p-g*b*x;h=e*t*h+b*p+e*g*x;p=0<c&&c<Number.POSITIVE_INFINITY?c/(h+u+c):1;l=l*p*a+v;d=d*p*a+n;return{x:k?d:l,y:k?l:d,z:h*a+u}})};d.pointCameraDistance=function(d,z){var q=z.options.chart.options3d,B=z.plotWidth/2;z=z.plotHeight/2;q=y(q.depth,1)*y(q.viewDistance,0)+q.depth;return Math.sqrt(Math.pow(B-d.plotX,2)+Math.pow(z-d.plotY,2)+Math.pow(q-d.plotZ,2))};d.shapeArea=function(d){var y=0,q,B;for(q=0;q<d.length;q++)B=(q+1)%d.length,y+=d[q].x*d[B].y-d[B].x*
d[q].y;return y/2};d.shapeArea3d=function(y,w,q){return d.shapeArea(d.perspective(y,w,q))}})(C);(function(d){function w(b,a,f,g,c,d,e,l){var p=[],x=d-c;return d>c&&d-c>Math.PI/2+.0001?(p=p.concat(w(b,a,f,g,c,c+Math.PI/2,e,l)),p=p.concat(w(b,a,f,g,c+Math.PI/2,d,e,l))):d<c&&c-d>Math.PI/2+.0001?(p=p.concat(w(b,a,f,g,c,c-Math.PI/2,e,l)),p=p.concat(w(b,a,f,g,c-Math.PI/2,d,e,l))):["C",b+f*Math.cos(c)-f*r*x*Math.sin(c)+e,a+g*Math.sin(c)+g*r*x*Math.cos(c)+l,b+f*Math.cos(d)+f*r*x*Math.sin(d)+e,a+g*Math.sin(d)-
g*r*x*Math.cos(d)+l,b+f*Math.cos(d)+e,a+g*Math.sin(d)+l]}var y=Math.cos,A=Math.PI,z=Math.sin,q=d.animObject,B=d.charts,k=d.color,v=d.defined,n=d.deg2rad,u=d.each,c=d.extend,a=d.inArray,h=d.map,e=d.merge,g=d.perspective,b=d.pick,t=d.SVGElement,l=d.SVGRenderer,m=d.wrap,r=4*(Math.sqrt(2)-1)/3/(A/2);m(l.prototype,"init",function(b){b.apply(this,[].slice.call(arguments,1));u([{name:"darker",slope:.6},{name:"brighter",slope:1.4}],function(b){this.definition({tagName:"filter",id:"highcharts-"+b.name,children:[{tagName:"feComponentTransfer",
children:[{tagName:"feFuncR",type:"linear",slope:b.slope},{tagName:"feFuncG",type:"linear",slope:b.slope},{tagName:"feFuncB",type:"linear",slope:b.slope}]}]})},this)});l.prototype.toLinePath=function(b,a){var f=[];u(b,function(b){f.push("L",b.x,b.y)});b.length&&(f[0]="M",a&&f.push("Z"));return f};l.prototype.toLineSegments=function(b){var a=[],f=!0;u(b,function(b){a.push(f?"M":"L",b.x,b.y);f=!f});return a};l.prototype.face3d=function(a){var c=this,f=this.createElement("path");f.vertexes=[];f.insidePlotArea=
!1;f.enabled=!0;m(f,"attr",function(a,f){if("object"===typeof f&&(v(f.enabled)||v(f.vertexes)||v(f.insidePlotArea))){this.enabled=b(f.enabled,this.enabled);this.vertexes=b(f.vertexes,this.vertexes);this.insidePlotArea=b(f.insidePlotArea,this.insidePlotArea);delete f.enabled;delete f.vertexes;delete f.insidePlotArea;var e=g(this.vertexes,B[c.chartIndex],this.insidePlotArea),l=c.toLinePath(e,!0),e=d.shapeArea(e),e=this.enabled&&0<e?"visible":"hidden";f.d=l;f.visibility=e}return a.apply(this,[].slice.call(arguments,
1))});m(f,"animate",function(a,f){if("object"===typeof f&&(v(f.enabled)||v(f.vertexes)||v(f.insidePlotArea))){this.enabled=b(f.enabled,this.enabled);this.vertexes=b(f.vertexes,this.vertexes);this.insidePlotArea=b(f.insidePlotArea,this.insidePlotArea);delete f.enabled;delete f.vertexes;delete f.insidePlotArea;var e=g(this.vertexes,B[c.chartIndex],this.insidePlotArea),l=c.toLinePath(e,!0),e=d.shapeArea(e),e=this.enabled&&0<e?"visible":"hidden";f.d=l;this.attr("visibility",e)}return a.apply(this,[].slice.call(arguments,
1))});return f.attr(a)};l.prototype.polyhedron=function(b){var a=this,f=this.g(),c=f.destroy;f.faces=[];f.destroy=function(){for(var b=0;b<f.faces.length;b++)f.faces[b].destroy();return c.call(this)};m(f,"attr",function(b,c,g,d,e){if("object"===typeof c&&v(c.faces)){for(;f.faces.length>c.faces.length;)f.faces.pop().destroy();for(;f.faces.length<c.faces.length;)f.faces.push(a.face3d().add(f));for(var l=0;l<c.faces.length;l++)f.faces[l].attr(c.faces[l],null,d,e);delete c.faces}return b.apply(this,[].slice.call(arguments,
1))});m(f,"animate",function(b,c,g,d){if(c&&c.faces){for(;f.faces.length>c.faces.length;)f.faces.pop().destroy();for(;f.faces.length<c.faces.length;)f.faces.push(a.face3d().add(f));for(var e=0;e<c.faces.length;e++)f.faces[e].animate(c.faces[e],g,d);delete c.faces}return b.apply(this,[].slice.call(arguments,1))});return f.attr(b)};l.prototype.cuboid=function(b){var a=this.g(),f=a.destroy;b=this.cuboidPath(b);a.front=this.path(b[0]).attr({"class":"highcharts-3d-front"}).add(a);a.top=this.path(b[1]).attr({"class":"highcharts-3d-top"}).add(a);
a.side=this.path(b[2]).attr({"class":"highcharts-3d-side"}).add(a);a.fillSetter=function(b){this.front.attr({fill:b});this.top.attr({fill:k(b).brighten(.1).get()});this.side.attr({fill:k(b).brighten(-.1).get()});this.color=b;a.fill=b;return this};a.opacitySetter=function(b){this.front.attr({opacity:b});this.top.attr({opacity:b});this.side.attr({opacity:b});return this};a.attr=function(b,a,f,c){if("string"===typeof b&&"undefined"!==typeof a){var e=b;b={};b[e]=a}if(b.shapeArgs||v(b.x))b=this.renderer.cuboidPath(b.shapeArgs||
b),this.front.attr({d:b[0]}),this.top.attr({d:b[1]}),this.side.attr({d:b[2]});else return t.prototype.attr.call(this,b,void 0,f,c);return this};a.animate=function(b,a,f){v(b.x)&&v(b.y)?(b=this.renderer.cuboidPath(b),this.front.animate({d:b[0]},a,f),this.top.animate({d:b[1]},a,f),this.side.animate({d:b[2]},a,f),this.attr({zIndex:-b[3]})):b.opacity?(this.front.animate(b,a,f),this.top.animate(b,a,f),this.side.animate(b,a,f)):t.prototype.animate.call(this,b,a,f);return this};a.destroy=function(){this.front.destroy();
this.top.destroy();this.side.destroy();return f.call(this)};a.attr({zIndex:-b[3]});return a};d.SVGRenderer.prototype.cuboidPath=function(b){function a(b){return q[b]}var f=b.x,c=b.y,e=b.z,l=b.height,p=b.width,n=b.depth,t=B[this.chartIndex],m,u,r=t.options.chart.options3d.alpha,k=0,q=[{x:f,y:c,z:e},{x:f+p,y:c,z:e},{x:f+p,y:c+l,z:e},{x:f,y:c+l,z:e},{x:f,y:c+l,z:e+n},{x:f+p,y:c+l,z:e+n},{x:f+p,y:c,z:e+n},{x:f,y:c,z:e+n}],q=g(q,t,b.insidePlotArea);u=function(b,f){var c=[[],-1];b=h(b,a);f=h(f,a);0>d.shapeArea(b)?
c=[b,0]:0>d.shapeArea(f)&&(c=[f,1]);return c};m=u([3,2,1,0],[7,6,5,4]);b=m[0];p=m[1];m=u([1,6,7,0],[4,5,2,3]);l=m[0];n=m[1];m=u([1,2,5,6],[0,7,4,3]);u=m[0];m=m[1];1===m?k+=1E4*(1E3-f):m||(k+=1E4*f);k+=10*(!n||0<=r&&180>=r||360>r&&357.5<r?t.plotHeight-c:10+c);1===p?k+=100*e:p||(k+=100*(1E3-e));k=-Math.round(k);return[this.toLinePath(b,!0),this.toLinePath(l,!0),this.toLinePath(u,!0),k]};d.SVGRenderer.prototype.arc3d=function(g){function d(b){var f=!1,c={};b=e(b);for(var g in b)-1!==a(g,h)&&(c[g]=b[g],
delete b[g],f=!0);return f?c:!1}var f=this.g(),l=f.renderer,h="x y r innerR start end".split(" ");g=e(g);g.alpha*=n;g.beta*=n;f.top=l.path();f.side1=l.path();f.side2=l.path();f.inn=l.path();f.out=l.path();f.onAdd=function(){var b=f.parentGroup,a=f.attr("class");f.top.add(f);u(["out","inn","side1","side2"],function(c){f[c].attr({"class":a+" highcharts-3d-side"}).add(b)})};u(["addClass","removeClass"],function(b){f[b]=function(){var a=arguments;u(["top","out","inn","side1","side2"],function(c){f[c][b].apply(f[c],
a)})}});f.setPaths=function(b){var a=f.renderer.arc3dPath(b),c=100*a.zTop;f.attribs=b;f.top.attr({d:a.top,zIndex:a.zTop});f.inn.attr({d:a.inn,zIndex:a.zInn});f.out.attr({d:a.out,zIndex:a.zOut});f.side1.attr({d:a.side1,zIndex:a.zSide1});f.side2.attr({d:a.side2,zIndex:a.zSide2});f.zIndex=c;f.attr({zIndex:c});b.center&&(f.top.setRadialReference(b.center),delete b.center)};f.setPaths(g);f.fillSetter=function(b){var a=k(b).brighten(-.1).get();this.fill=b;this.side1.attr({fill:a});this.side2.attr({fill:a});
this.inn.attr({fill:a});this.out.attr({fill:a});this.top.attr({fill:b});return this};u(["opacity","translateX","translateY","visibility"],function(b){f[b+"Setter"]=function(b,a){f[a]=b;u(["out","inn","side1","side2","top"],function(c){f[c].attr(a,b)})}});m(f,"attr",function(b,a){var e;"object"===typeof a&&(e=d(a))&&(c(f.attribs,e),f.setPaths(f.attribs));return b.apply(this,[].slice.call(arguments,1))});m(f,"animate",function(a,c,g,l){var h,m=this.attribs,n;delete c.center;delete c.z;delete c.depth;
delete c.alpha;delete c.beta;n=q(b(g,this.renderer.globalAnimation));n.duration&&(h=d(c),c.dummy=f.dummy++,h&&(n.step=function(a,c){function f(a){return m[a]+(b(h[a],m[a])-m[a])*c.pos}"dummy"===c.prop&&c.elem.setPaths(e(m,{x:f("x"),y:f("y"),r:f("r"),innerR:f("innerR"),start:f("start"),end:f("end")}))}),g=n);return a.call(this,c,g,l)});f.dummy=0;f.destroy=function(){this.top.destroy();this.out.destroy();this.inn.destroy();this.side1.destroy();this.side2.destroy();t.prototype.destroy.call(this)};f.hide=
function(){this.top.hide();this.out.hide();this.inn.hide();this.side1.hide();this.side2.hide()};f.show=function(){this.top.show();this.out.show();this.inn.show();this.side1.show();this.side2.show()};return f};l.prototype.arc3dPath=function(b){function a(b){b%=2*Math.PI;b>Math.PI&&(b=2*Math.PI-b);return b}var f=b.x,c=b.y,g=b.start,e=b.end-.00001,d=b.r,l=b.innerR,h=b.depth,m=b.alpha,n=b.beta,t=Math.cos(g),u=Math.sin(g);b=Math.cos(e);var p=Math.sin(e),r=d*Math.cos(n),d=d*Math.cos(m),k=l*Math.cos(n),
q=l*Math.cos(m),l=h*Math.sin(n),B=h*Math.sin(m),h=["M",f+r*t,c+d*u],h=h.concat(w(f,c,r,d,g,e,0,0)),h=h.concat(["L",f+k*b,c+q*p]),h=h.concat(w(f,c,k,q,e,g,0,0)),h=h.concat(["Z"]),v=0<n?Math.PI/2:0,n=0<m?0:Math.PI/2,v=g>-v?g:e>-v?-v:g,D=e<A-n?e:g<A-n?A-n:e,C=2*A-n,m=["M",f+r*y(v),c+d*z(v)],m=m.concat(w(f,c,r,d,v,D,0,0));e>C&&g<C?(m=m.concat(["L",f+r*y(D)+l,c+d*z(D)+B]),m=m.concat(w(f,c,r,d,D,C,l,B)),m=m.concat(["L",f+r*y(C),c+d*z(C)]),m=m.concat(w(f,c,r,d,C,e,0,0)),m=m.concat(["L",f+r*y(e)+l,c+d*z(e)+
B]),m=m.concat(w(f,c,r,d,e,C,l,B)),m=m.concat(["L",f+r*y(C),c+d*z(C)]),m=m.concat(w(f,c,r,d,C,D,0,0))):e>A-n&&g<A-n&&(m=m.concat(["L",f+r*Math.cos(D)+l,c+d*Math.sin(D)+B]),m=m.concat(w(f,c,r,d,D,e,l,B)),m=m.concat(["L",f+r*Math.cos(e),c+d*Math.sin(e)]),m=m.concat(w(f,c,r,d,e,D,0,0)));m=m.concat(["L",f+r*Math.cos(D)+l,c+d*Math.sin(D)+B]);m=m.concat(w(f,c,r,d,D,v,l,B));m=m.concat(["Z"]);n=["M",f+k*t,c+q*u];n=n.concat(w(f,c,k,q,g,e,0,0));n=n.concat(["L",f+k*Math.cos(e)+l,c+q*Math.sin(e)+B]);n=n.concat(w(f,
c,k,q,e,g,l,B));n=n.concat(["Z"]);t=["M",f+r*t,c+d*u,"L",f+r*t+l,c+d*u+B,"L",f+k*t+l,c+q*u+B,"L",f+k*t,c+q*u,"Z"];f=["M",f+r*b,c+d*p,"L",f+r*b+l,c+d*p+B,"L",f+k*b+l,c+q*p+B,"L",f+k*b,c+q*p,"Z"];p=Math.atan2(B,-l);c=Math.abs(e+p);b=Math.abs(g+p);g=Math.abs((g+e)/2+p);c=a(c);b=a(b);g=a(g);g*=1E5;e=1E5*b;c*=1E5;return{top:h,zTop:1E5*Math.PI+1,out:m,zOut:Math.max(g,e,c),inn:n,zInn:Math.max(g,e,c),side1:t,zSide1:.99*c,side2:f,zSide2:.99*e}}})(C);(function(d){function w(d,u){var c=d.plotLeft,a=d.plotWidth+
c,h=d.plotTop,e=d.plotHeight+h,g=c+d.plotWidth/2,b=h+d.plotHeight/2,n=Number.MAX_VALUE,l=-Number.MAX_VALUE,m=Number.MAX_VALUE,r=-Number.MAX_VALUE,p,x=1;p=[{x:c,y:h,z:0},{x:c,y:h,z:u}];A([0,1],function(b){p.push({x:a,y:p[b].y,z:p[b].z})});A([0,1,2,3],function(b){p.push({x:p[b].x,y:e,z:p[b].z})});p=q(p,d,!1);A(p,function(b){n=Math.min(n,b.x);l=Math.max(l,b.x);m=Math.min(m,b.y);r=Math.max(r,b.y)});c>n&&(x=Math.min(x,1-Math.abs((c+g)/(n+g))%1));a<l&&(x=Math.min(x,(a-g)/(l-g)));h>m&&(x=0>m?Math.min(x,
(h+b)/(-m+h+b)):Math.min(x,1-(h+b)/(m+b)%1));e<r&&(x=Math.min(x,Math.abs((e-b)/(r-b))));return x}var y=d.Chart,A=d.each,z=d.merge,q=d.perspective,B=d.pick,k=d.wrap;y.prototype.is3d=function(){return this.options.chart.options3d&&this.options.chart.options3d.enabled};y.prototype.propsRequireDirtyBox.push("chart.options3d");y.prototype.propsRequireUpdateSeries.push("chart.options3d");k(y.prototype,"initSeries",function(d,u){var c=u.type||this.options.chart.type||this.options.chart.defaultSeriesType;
this.is3d()&&"scatter"===c&&(u.type="scatter3d");return d.call(this,u)});d.wrap(d.Chart.prototype,"isInsidePlot",function(d){return this.is3d()||d.apply(this,[].slice.call(arguments,1))});var v=d.getOptions();z(!0,v,{chart:{options3d:{enabled:!1,alpha:0,beta:0,depth:100,fitToPlot:!0,viewDistance:25,axisLabelPosition:"default",frame:{visible:"default",size:1,bottom:{},top:{},left:{},right:{},back:{},front:{}}}}});k(y.prototype,"getContainer",function(d){d.apply(this,[].slice.call(arguments,1));this.renderer.definition({tagName:"style",
textContent:".highcharts-3d-top{filter: url(#highcharts-brighter)}\n.highcharts-3d-side{filter: url(#highcharts-darker)}\n"})});k(y.prototype,"setClassName",function(d){d.apply(this,[].slice.call(arguments,1));this.is3d()&&(this.container.className+=" highcharts-3d-chart")});d.wrap(d.Chart.prototype,"setChartSize",function(d){var n=this.options.chart.options3d;d.apply(this,[].slice.call(arguments,1));if(this.is3d()){var c=this.inverted,a=this.clipBox,h=this.margin;a[c?"y":"x"]=-(h[3]||0);a[c?"x":
"y"]=-(h[0]||0);a[c?"height":"width"]=this.chartWidth+(h[3]||0)+(h[1]||0);a[c?"width":"height"]=this.chartHeight+(h[0]||0)+(h[2]||0);this.scale3d=1;!0===n.fitToPlot&&(this.scale3d=w(this,n.depth))}});k(y.prototype,"redraw",function(d){this.is3d()&&(this.isDirtyBox=!0,this.frame3d=this.get3dFrame());d.apply(this,[].slice.call(arguments,1))});k(y.prototype,"render",function(d){this.is3d()&&(this.frame3d=this.get3dFrame());d.apply(this,[].slice.call(arguments,1))});k(y.prototype,"renderSeries",function(d){var n=
this.series.length;if(this.is3d())for(;n--;)d=this.series[n],d.translate(),d.render();else d.call(this)});k(y.prototype,"drawChartBox",function(n){if(this.is3d()){var u=this.renderer,c=this.options.chart.options3d,a=this.get3dFrame(),h=this.plotLeft,e=this.plotLeft+this.plotWidth,g=this.plotTop,b=this.plotTop+this.plotHeight,c=c.depth,t=h-(a.left.visible?a.left.size:0),l=e+(a.right.visible?a.right.size:0),m=g-(a.top.visible?a.top.size:0),r=b+(a.bottom.visible?a.bottom.size:0),p=0-(a.front.visible?
a.front.size:0),x=c+(a.back.visible?a.back.size:0),f=this.hasRendered?"animate":"attr";this.frame3d=a;this.frameShapes||(this.frameShapes={bottom:u.polyhedron().add(),top:u.polyhedron().add(),left:u.polyhedron().add(),right:u.polyhedron().add(),back:u.polyhedron().add(),front:u.polyhedron().add()});this.frameShapes.bottom[f]({"class":"highcharts-3d-frame highcharts-3d-frame-bottom",zIndex:a.bottom.frontFacing?-1E3:1E3,faces:[{fill:d.color(a.bottom.color).brighten(.1).get(),vertexes:[{x:t,y:r,z:p},
{x:l,y:r,z:p},{x:l,y:r,z:x},{x:t,y:r,z:x}],enabled:a.bottom.visible},{fill:d.color(a.bottom.color).brighten(.1).get(),vertexes:[{x:h,y:b,z:c},{x:e,y:b,z:c},{x:e,y:b,z:0},{x:h,y:b,z:0}],enabled:a.bottom.visible},{fill:d.color(a.bottom.color).brighten(-.1).get(),vertexes:[{x:t,y:r,z:p},{x:t,y:r,z:x},{x:h,y:b,z:c},{x:h,y:b,z:0}],enabled:a.bottom.visible&&!a.left.visible},{fill:d.color(a.bottom.color).brighten(-.1).get(),vertexes:[{x:l,y:r,z:x},{x:l,y:r,z:p},{x:e,y:b,z:0},{x:e,y:b,z:c}],enabled:a.bottom.visible&&
!a.right.visible},{fill:d.color(a.bottom.color).get(),vertexes:[{x:l,y:r,z:p},{x:t,y:r,z:p},{x:h,y:b,z:0},{x:e,y:b,z:0}],enabled:a.bottom.visible&&!a.front.visible},{fill:d.color(a.bottom.color).get(),vertexes:[{x:t,y:r,z:x},{x:l,y:r,z:x},{x:e,y:b,z:c},{x:h,y:b,z:c}],enabled:a.bottom.visible&&!a.back.visible}]});this.frameShapes.top[f]({"class":"highcharts-3d-frame highcharts-3d-frame-top",zIndex:a.top.frontFacing?-1E3:1E3,faces:[{fill:d.color(a.top.color).brighten(.1).get(),vertexes:[{x:t,y:m,z:x},
{x:l,y:m,z:x},{x:l,y:m,z:p},{x:t,y:m,z:p}],enabled:a.top.visible},{fill:d.color(a.top.color).brighten(.1).get(),vertexes:[{x:h,y:g,z:0},{x:e,y:g,z:0},{x:e,y:g,z:c},{x:h,y:g,z:c}],enabled:a.top.visible},{fill:d.color(a.top.color).brighten(-.1).get(),vertexes:[{x:t,y:m,z:x},{x:t,y:m,z:p},{x:h,y:g,z:0},{x:h,y:g,z:c}],enabled:a.top.visible&&!a.left.visible},{fill:d.color(a.top.color).brighten(-.1).get(),vertexes:[{x:l,y:m,z:p},{x:l,y:m,z:x},{x:e,y:g,z:c},{x:e,y:g,z:0}],enabled:a.top.visible&&!a.right.visible},
{fill:d.color(a.top.color).get(),vertexes:[{x:t,y:m,z:p},{x:l,y:m,z:p},{x:e,y:g,z:0},{x:h,y:g,z:0}],enabled:a.top.visible&&!a.front.visible},{fill:d.color(a.top.color).get(),vertexes:[{x:l,y:m,z:x},{x:t,y:m,z:x},{x:h,y:g,z:c},{x:e,y:g,z:c}],enabled:a.top.visible&&!a.back.visible}]});this.frameShapes.left[f]({"class":"highcharts-3d-frame highcharts-3d-frame-left",zIndex:a.left.frontFacing?-1E3:1E3,faces:[{fill:d.color(a.left.color).brighten(.1).get(),vertexes:[{x:t,y:r,z:p},{x:h,y:b,z:0},{x:h,y:b,
z:c},{x:t,y:r,z:x}],enabled:a.left.visible&&!a.bottom.visible},{fill:d.color(a.left.color).brighten(.1).get(),vertexes:[{x:t,y:m,z:x},{x:h,y:g,z:c},{x:h,y:g,z:0},{x:t,y:m,z:p}],enabled:a.left.visible&&!a.top.visible},{fill:d.color(a.left.color).brighten(-.1).get(),vertexes:[{x:t,y:r,z:x},{x:t,y:m,z:x},{x:t,y:m,z:p},{x:t,y:r,z:p}],enabled:a.left.visible},{fill:d.color(a.left.color).brighten(-.1).get(),vertexes:[{x:h,y:g,z:c},{x:h,y:b,z:c},{x:h,y:b,z:0},{x:h,y:g,z:0}],enabled:a.left.visible},{fill:d.color(a.left.color).get(),
vertexes:[{x:t,y:r,z:p},{x:t,y:m,z:p},{x:h,y:g,z:0},{x:h,y:b,z:0}],enabled:a.left.visible&&!a.front.visible},{fill:d.color(a.left.color).get(),vertexes:[{x:t,y:m,z:x},{x:t,y:r,z:x},{x:h,y:b,z:c},{x:h,y:g,z:c}],enabled:a.left.visible&&!a.back.visible}]});this.frameShapes.right[f]({"class":"highcharts-3d-frame highcharts-3d-frame-right",zIndex:a.right.frontFacing?-1E3:1E3,faces:[{fill:d.color(a.right.color).brighten(.1).get(),vertexes:[{x:l,y:r,z:x},{x:e,y:b,z:c},{x:e,y:b,z:0},{x:l,y:r,z:p}],enabled:a.right.visible&&
!a.bottom.visible},{fill:d.color(a.right.color).brighten(.1).get(),vertexes:[{x:l,y:m,z:p},{x:e,y:g,z:0},{x:e,y:g,z:c},{x:l,y:m,z:x}],enabled:a.right.visible&&!a.top.visible},{fill:d.color(a.right.color).brighten(-.1).get(),vertexes:[{x:e,y:g,z:0},{x:e,y:b,z:0},{x:e,y:b,z:c},{x:e,y:g,z:c}],enabled:a.right.visible},{fill:d.color(a.right.color).brighten(-.1).get(),vertexes:[{x:l,y:r,z:p},{x:l,y:m,z:p},{x:l,y:m,z:x},{x:l,y:r,z:x}],enabled:a.right.visible},{fill:d.color(a.right.color).get(),vertexes:[{x:l,
y:m,z:p},{x:l,y:r,z:p},{x:e,y:b,z:0},{x:e,y:g,z:0}],enabled:a.right.visible&&!a.front.visible},{fill:d.color(a.right.color).get(),vertexes:[{x:l,y:r,z:x},{x:l,y:m,z:x},{x:e,y:g,z:c},{x:e,y:b,z:c}],enabled:a.right.visible&&!a.back.visible}]});this.frameShapes.back[f]({"class":"highcharts-3d-frame highcharts-3d-frame-back",zIndex:a.back.frontFacing?-1E3:1E3,faces:[{fill:d.color(a.back.color).brighten(.1).get(),vertexes:[{x:l,y:r,z:x},{x:t,y:r,z:x},{x:h,y:b,z:c},{x:e,y:b,z:c}],enabled:a.back.visible&&
!a.bottom.visible},{fill:d.color(a.back.color).brighten(.1).get(),vertexes:[{x:t,y:m,z:x},{x:l,y:m,z:x},{x:e,y:g,z:c},{x:h,y:g,z:c}],enabled:a.back.visible&&!a.top.visible},{fill:d.color(a.back.color).brighten(-.1).get(),vertexes:[{x:t,y:r,z:x},{x:t,y:m,z:x},{x:h,y:g,z:c},{x:h,y:b,z:c}],enabled:a.back.visible&&!a.left.visible},{fill:d.color(a.back.color).brighten(-.1).get(),vertexes:[{x:l,y:m,z:x},{x:l,y:r,z:x},{x:e,y:b,z:c},{x:e,y:g,z:c}],enabled:a.back.visible&&!a.right.visible},{fill:d.color(a.back.color).get(),
vertexes:[{x:h,y:g,z:c},{x:e,y:g,z:c},{x:e,y:b,z:c},{x:h,y:b,z:c}],enabled:a.back.visible},{fill:d.color(a.back.color).get(),vertexes:[{x:t,y:r,z:x},{x:l,y:r,z:x},{x:l,y:m,z:x},{x:t,y:m,z:x}],enabled:a.back.visible}]});this.frameShapes.front[f]({"class":"highcharts-3d-frame highcharts-3d-frame-front",zIndex:a.front.frontFacing?-1E3:1E3,faces:[{fill:d.color(a.front.color).brighten(.1).get(),vertexes:[{x:t,y:r,z:p},{x:l,y:r,z:p},{x:e,y:b,z:0},{x:h,y:b,z:0}],enabled:a.front.visible&&!a.bottom.visible},
{fill:d.color(a.front.color).brighten(.1).get(),vertexes:[{x:l,y:m,z:p},{x:t,y:m,z:p},{x:h,y:g,z:0},{x:e,y:g,z:0}],enabled:a.front.visible&&!a.top.visible},{fill:d.color(a.front.color).brighten(-.1).get(),vertexes:[{x:t,y:m,z:p},{x:t,y:r,z:p},{x:h,y:b,z:0},{x:h,y:g,z:0}],enabled:a.front.visible&&!a.left.visible},{fill:d.color(a.front.color).brighten(-.1).get(),vertexes:[{x:l,y:r,z:p},{x:l,y:m,z:p},{x:e,y:g,z:0},{x:e,y:b,z:0}],enabled:a.front.visible&&!a.right.visible},{fill:d.color(a.front.color).get(),
vertexes:[{x:e,y:g,z:0},{x:h,y:g,z:0},{x:h,y:b,z:0},{x:e,y:b,z:0}],enabled:a.front.visible},{fill:d.color(a.front.color).get(),vertexes:[{x:l,y:r,z:p},{x:t,y:r,z:p},{x:t,y:m,z:p},{x:l,y:m,z:p}],enabled:a.front.visible}]})}return n.apply(this,[].slice.call(arguments,1))});y.prototype.retrieveStacks=function(d){var n=this.series,c={},a,h=1;A(this.series,function(e){a=B(e.options.stack,d?0:n.length-1-e.index);c[a]?c[a].series.push(e):(c[a]={series:[e],position:h},h++)});c.totalStacks=h+1;return c};y.prototype.get3dFrame=
function(){var n=this,u=n.options.chart.options3d,c=u.frame,a=n.plotLeft,h=n.plotLeft+n.plotWidth,e=n.plotTop,g=n.plotTop+n.plotHeight,b=u.depth,t=function(b){b=d.shapeArea3d(b,n);return.5<b?1:-.5>b?-1:0},l=t([{x:a,y:g,z:b},{x:h,y:g,z:b},{x:h,y:g,z:0},{x:a,y:g,z:0}]),m=t([{x:a,y:e,z:0},{x:h,y:e,z:0},{x:h,y:e,z:b},{x:a,y:e,z:b}]),r=t([{x:a,y:e,z:0},{x:a,y:e,z:b},{x:a,y:g,z:b},{x:a,y:g,z:0}]),p=t([{x:h,y:e,z:b},{x:h,y:e,z:0},{x:h,y:g,z:0},{x:h,y:g,z:b}]),x=t([{x:a,y:g,z:0},{x:h,y:g,z:0},{x:h,y:e,z:0},
{x:a,y:e,z:0}]),t=t([{x:a,y:e,z:b},{x:h,y:e,z:b},{x:h,y:g,z:b},{x:a,y:g,z:b}]),f=!1,k=!1,v=!1,y=!1;A([].concat(n.xAxis,n.yAxis,n.zAxis),function(b){b&&(b.horiz?b.opposite?k=!0:f=!0:b.opposite?y=!0:v=!0)});var w=function(b,a,c){for(var f=["size","color","visible"],d={},e=0;e<f.length;e++)for(var g=f[e],l=0;l<b.length;l++)if("object"===typeof b[l]){var m=b[l][g];if(void 0!==m&&null!==m){d[g]=m;break}}b=c;!0===d.visible||!1===d.visible?b=d.visible:"auto"===d.visible&&(b=0<a);return{size:B(d.size,1),
color:B(d.color,"none"),frontFacing:0<a,visible:b}},c={bottom:w([c.bottom,c.top,c],l,f),top:w([c.top,c.bottom,c],m,k),left:w([c.left,c.right,c.side,c],r,v),right:w([c.right,c.left,c.side,c],p,y),back:w([c.back,c.front,c],t,!0),front:w([c.front,c.back,c],x,!1)};"auto"===u.axisLabelPosition?(p=function(b,a){return b.visible!==a.visible||b.visible&&a.visible&&b.frontFacing!==a.frontFacing},u=[],p(c.left,c.front)&&u.push({y:(e+g)/2,x:a,z:0,xDir:{x:1,y:0,z:0}}),p(c.left,c.back)&&u.push({y:(e+g)/2,x:a,
z:b,xDir:{x:0,y:0,z:-1}}),p(c.right,c.front)&&u.push({y:(e+g)/2,x:h,z:0,xDir:{x:0,y:0,z:1}}),p(c.right,c.back)&&u.push({y:(e+g)/2,x:h,z:b,xDir:{x:-1,y:0,z:0}}),l=[],p(c.bottom,c.front)&&l.push({x:(a+h)/2,y:g,z:0,xDir:{x:1,y:0,z:0}}),p(c.bottom,c.back)&&l.push({x:(a+h)/2,y:g,z:b,xDir:{x:-1,y:0,z:0}}),m=[],p(c.top,c.front)&&m.push({x:(a+h)/2,y:e,z:0,xDir:{x:1,y:0,z:0}}),p(c.top,c.back)&&m.push({x:(a+h)/2,y:e,z:b,xDir:{x:-1,y:0,z:0}}),r=[],p(c.bottom,c.left)&&r.push({z:(0+b)/2,y:g,x:a,xDir:{x:0,y:0,
z:-1}}),p(c.bottom,c.right)&&r.push({z:(0+b)/2,y:g,x:h,xDir:{x:0,y:0,z:1}}),g=[],p(c.top,c.left)&&g.push({z:(0+b)/2,y:e,x:a,xDir:{x:0,y:0,z:-1}}),p(c.top,c.right)&&g.push({z:(0+b)/2,y:e,x:h,xDir:{x:0,y:0,z:1}}),a=function(b,a,c){if(0===b.length)return null;if(1===b.length)return b[0];for(var d=0,f=q(b,n,!1),e=1;e<f.length;e++)c*f[e][a]>c*f[d][a]?d=e:c*f[e][a]===c*f[d][a]&&f[e].z<f[d].z&&(d=e);return b[d]},c.axes={y:{left:a(u,"x",-1),right:a(u,"x",1)},x:{top:a(m,"y",-1),bottom:a(l,"y",1)},z:{top:a(g,
"y",-1),bottom:a(r,"y",1)}}):c.axes={y:{left:{x:a,z:0,xDir:{x:1,y:0,z:0}},right:{x:h,z:0,xDir:{x:0,y:0,z:1}}},x:{top:{y:e,z:0,xDir:{x:1,y:0,z:0}},bottom:{y:g,z:0,xDir:{x:1,y:0,z:0}}},z:{top:{x:v?h:a,y:e,xDir:v?{x:0,y:0,z:1}:{x:0,y:0,z:-1}},bottom:{x:v?h:a,y:g,xDir:v?{x:0,y:0,z:1}:{x:0,y:0,z:-1}}}};return c};d.Fx.prototype.matrixSetter=function(){var n;if(1>this.pos&&(d.isArray(this.start)||d.isArray(this.end))){var u=this.start||[1,0,0,1,0,0],c=this.end||[1,0,0,1,0,0];n=[];for(var a=0;6>a;a++)n.push(this.pos*
c[a]+(1-this.pos)*u[a])}else n=this.end;this.elem.attr(this.prop,n,null,!0)}})(C);(function(d){function w(a,b,d){if(!a.chart.is3d()||"colorAxis"===a.coll)return b;var e=a.chart,g=q*e.options.chart.options3d.alpha,h=q*e.options.chart.options3d.beta,t=u(d&&a.options.title.position3d,a.options.labels.position3d);d=u(d&&a.options.title.skew3d,a.options.labels.skew3d);var k=e.frame3d,f=e.plotLeft,B=e.plotWidth+f,v=e.plotTop,y=e.plotHeight+v,e=!1,w=0,A=0,z={x:0,y:1,z:0};b=a.swapZ({x:b.x,y:b.y,z:0});if(a.isZAxis)if(a.opposite){if(null===
k.axes.z.top)return{};A=b.y-v;b.x=k.axes.z.top.x;b.y=k.axes.z.top.y;f=k.axes.z.top.xDir;e=!k.top.frontFacing}else{if(null===k.axes.z.bottom)return{};A=b.y-y;b.x=k.axes.z.bottom.x;b.y=k.axes.z.bottom.y;f=k.axes.z.bottom.xDir;e=!k.bottom.frontFacing}else if(a.horiz)if(a.opposite){if(null===k.axes.x.top)return{};A=b.y-v;b.y=k.axes.x.top.y;b.z=k.axes.x.top.z;f=k.axes.x.top.xDir;e=!k.top.frontFacing}else{if(null===k.axes.x.bottom)return{};A=b.y-y;b.y=k.axes.x.bottom.y;b.z=k.axes.x.bottom.z;f=k.axes.x.bottom.xDir;
e=!k.bottom.frontFacing}else if(a.opposite){if(null===k.axes.y.right)return{};w=b.x-B;b.x=k.axes.y.right.x;b.z=k.axes.y.right.z;f=k.axes.y.right.xDir;f={x:f.z,y:f.y,z:-f.x}}else{if(null===k.axes.y.left)return{};w=b.x-f;b.x=k.axes.y.left.x;b.z=k.axes.y.left.z;f=k.axes.y.left.xDir}"chart"!==t&&("flap"===t?a.horiz?(h=Math.sin(g),g=Math.cos(g),a.opposite&&(h=-h),e&&(h=-h),z={x:f.z*h,y:g,z:-f.x*h}):f={x:Math.cos(h),y:0,z:Math.sin(h)}:"ortho"===t?a.horiz?(z=Math.cos(g),t=Math.sin(h)*z,g=-Math.sin(g),h=
-z*Math.cos(h),z={x:f.y*h-f.z*g,y:f.z*t-f.x*h,z:f.x*g-f.y*t},g=1/Math.sqrt(z.x*z.x+z.y*z.y+z.z*z.z),e&&(g=-g),z={x:g*z.x,y:g*z.y,z:g*z.z}):f={x:Math.cos(h),y:0,z:Math.sin(h)}:a.horiz?z={x:Math.sin(h)*Math.sin(g),y:Math.cos(g),z:-Math.cos(h)*Math.sin(g)}:f={x:Math.cos(h),y:0,z:Math.sin(h)});b.x+=w*f.x+A*z.x;b.y+=w*f.y+A*z.y;b.z+=w*f.z+A*z.z;e=n([b],a.chart)[0];d?(0>c(n([b,{x:b.x+f.x,y:b.y+f.y,z:b.z+f.z},{x:b.x+z.x,y:b.y+z.y,z:b.z+z.z}],a.chart))&&(f={x:-f.x,y:-f.y,z:-f.z}),a=n([{x:b.x,y:b.y,z:b.z},
{x:b.x+f.x,y:b.y+f.y,z:b.z+f.z},{x:b.x+z.x,y:b.y+z.y,z:b.z+z.z}],a.chart),e.matrix=[a[1].x-a[0].x,a[1].y-a[0].y,a[2].x-a[0].x,a[2].y-a[0].y,e.x,e.y],e.matrix[4]-=e.x*e.matrix[0]+e.y*e.matrix[2],e.matrix[5]-=e.x*e.matrix[1]+e.y*e.matrix[3]):e.matrix=null;return e}var y,A=d.Axis,z=d.Chart,q=d.deg2rad,B=d.each,k=d.extend,v=d.merge,n=d.perspective,u=d.pick,c=d.shapeArea,a=d.splat,h=d.Tick,e=d.wrap;v(!0,A.prototype.defaultOptions,{labels:{position3d:"offset",skew3d:!1},title:{position3d:null,skew3d:null}});
e(A.prototype,"setOptions",function(a,b){a.call(this,b);this.chart.is3d&&this.chart.is3d()&&"colorAxis"!==this.coll&&(a=this.options,a.tickWidth=u(a.tickWidth,0),a.gridLineWidth=u(a.gridLineWidth,1))});e(A.prototype,"getPlotLinePath",function(a){var b=a.apply(this,[].slice.call(arguments,1));if(!this.chart.is3d()||"colorAxis"===this.coll||null===b)return b;var c=this.chart,e=c.options.chart.options3d,e=this.isZAxis?c.plotWidth:e.depth,c=c.frame3d,b=[this.swapZ({x:b[1],y:b[2],z:0}),this.swapZ({x:b[1],
y:b[2],z:e}),this.swapZ({x:b[4],y:b[5],z:0}),this.swapZ({x:b[4],y:b[5],z:e})],e=[];this.horiz?(this.isZAxis?(c.left.visible&&e.push(b[0],b[2]),c.right.visible&&e.push(b[1],b[3])):(c.front.visible&&e.push(b[0],b[2]),c.back.visible&&e.push(b[1],b[3])),c.top.visible&&e.push(b[0],b[1]),c.bottom.visible&&e.push(b[2],b[3])):(c.front.visible&&e.push(b[0],b[2]),c.back.visible&&e.push(b[1],b[3]),c.left.visible&&e.push(b[0],b[1]),c.right.visible&&e.push(b[2],b[3]));e=n(e,this.chart,!1);return this.chart.renderer.toLineSegments(e)});
e(A.prototype,"getLinePath",function(a){return this.chart.is3d()&&"colorAxis"!==this.coll?[]:a.apply(this,[].slice.call(arguments,1))});e(A.prototype,"getPlotBandPath",function(a){if(!this.chart.is3d()||"colorAxis"===this.coll)return a.apply(this,[].slice.call(arguments,1));var b=arguments,c=b[2],e=[],b=this.getPlotLinePath(b[1]),c=this.getPlotLinePath(c);if(b&&c)for(var d=0;d<b.length;d+=6)e.push("M",b[d+1],b[d+2],"L",b[d+4],b[d+5],"L",c[d+4],c[d+5],"L",c[d+1],c[d+2],"Z");return e});e(h.prototype,
"getMarkPath",function(a){var b=a.apply(this,[].slice.call(arguments,1)),b=[w(this.axis,{x:b[1],y:b[2],z:0}),w(this.axis,{x:b[4],y:b[5],z:0})];return this.axis.chart.renderer.toLineSegments(b)});e(h.prototype,"getLabelPosition",function(a){var b=a.apply(this,[].slice.call(arguments,1));return w(this.axis,b)});e(A.prototype,"getTitlePosition",function(a){var b=a.apply(this,[].slice.call(arguments,1));return w(this,b,!0)});e(A.prototype,"drawCrosshair",function(a){var b=arguments;this.chart.is3d()&&
"colorAxis"!==this.coll&&b[2]&&(b[2]={plotX:b[2].plotXold||b[2].plotX,plotY:b[2].plotYold||b[2].plotY});a.apply(this,[].slice.call(b,1))});e(A.prototype,"destroy",function(a){B(["backFrame","bottomFrame","sideFrame"],function(b){this[b]&&(this[b]=this[b].destroy())},this);a.apply(this,[].slice.call(arguments,1))});A.prototype.swapZ=function(a,b){return this.isZAxis?(b=b?0:this.chart.plotLeft,{x:b+a.z,y:a.y,z:a.x-b}):a};y=d.ZAxis=function(){this.init.apply(this,arguments)};k(y.prototype,A.prototype);
k(y.prototype,{isZAxis:!0,setOptions:function(a){a=v({offset:0,lineWidth:0},a);A.prototype.setOptions.call(this,a);this.coll="zAxis"},setAxisSize:function(){A.prototype.setAxisSize.call(this);this.width=this.len=this.chart.options.chart.options3d.depth;this.right=this.chart.chartWidth-this.width-this.left},getSeriesExtremes:function(){var a=this,b=a.chart;a.hasVisibleSeries=!1;a.dataMin=a.dataMax=a.ignoreMinPadding=a.ignoreMaxPadding=null;a.buildStacks&&a.buildStacks();B(a.series,function(c){if(c.visible||
!b.options.chart.ignoreHiddenSeries)a.hasVisibleSeries=!0,c=c.zData,c.length&&(a.dataMin=Math.min(u(a.dataMin,c[0]),Math.min.apply(null,c)),a.dataMax=Math.max(u(a.dataMax,c[0]),Math.max.apply(null,c)))})}});e(z.prototype,"getAxes",function(c){var b=this,e=this.options,e=e.zAxis=a(e.zAxis||{});c.call(this);b.is3d()&&(this.zAxis=[],B(e,function(a,c){a.index=c;a.isX=!0;(new y(b,a)).setScale()}))})})(C);(function(d){var w=d.perspective,y=d.pick,A=d.wrap;A(d.Series.prototype,"translate",function(d){d.apply(this,
[].slice.call(arguments,1));this.chart.is3d()&&this.translate3dPoints()});d.Series.prototype.translate3dPoints=function(){var d=this.chart,q=y(this.zAxis,d.options.zAxis[0]),B=[],k,v,n;for(n=0;n<this.data.length;n++)k=this.data[n],q&&q.translate?(v=q.isLog&&q.val2lin?q.val2lin(k.z):k.z,k.plotZ=q.translate(v),k.isInside=k.isInside?v>=q.min&&v<=q.max:!1):k.plotZ=0,B.push({x:y(k.plotXold,k.plotX),y:y(k.plotYold,k.plotY),z:y(k.plotZold,k.plotZ)});d=w(B,d,!0);for(n=0;n<this.data.length;n++)k=this.data[n],
q=d[n],k.plotXold=k.plotX,k.plotYold=k.plotY,k.plotZold=k.plotZ,k.plotX=q.x,k.plotY=q.y,k.plotZ=q.z}})(C);(function(d){var w=d.each,y=d.perspective,A=d.pick,z=d.Series,q=d.seriesTypes,B=d.inArray,k=d.svg,v=d.wrap;v(q.column.prototype,"translate",function(d){d.apply(this,[].slice.call(arguments,1));this.chart.is3d()&&this.translate3dShapes()});q.column.prototype.translate3dPoints=function(){};q.column.prototype.translate3dShapes=function(){var d=this,k=d.chart,c=d.options,a=c.depth||25,h=(c.stacking?
c.stack||0:d.index)*(a+(c.groupZPadding||1)),e=d.borderWidth%2?.5:0;k.inverted&&!d.yAxis.reversed&&(e*=-1);!1!==c.grouping&&(h=0);h+=c.groupZPadding||1;w(d.data,function(c){if(null!==c.y){var b=c.shapeArgs,g=c.tooltipPos,l;w([["x","width"],["y","height"]],function(a){l=b[a[0]]-e;0>l&&(b[a[1]]+=b[a[0]]+e,b[a[0]]=-e,l=0);l+b[a[1]]>d[a[0]+"Axis"].len&&0!==b[a[1]]&&(b[a[1]]=d[a[0]+"Axis"].len-b[a[0]]);if(0!==b[a[1]]&&(b[a[0]]>=d[a[0]+"Axis"].len||b[a[0]]+b[a[1]]<=e))for(var c in b)b[c]=0});c.shapeType=
"cuboid";b.z=h;b.depth=a;b.insidePlotArea=!0;g=y([{x:g[0],y:g[1],z:h}],k,!0)[0];c.tooltipPos=[g.x,g.y]}});d.z=h};v(q.column.prototype,"animate",function(d){if(this.chart.is3d()){var n=arguments[1],c=this.yAxis,a=this,h=this.yAxis.reversed;k&&(n?w(a.data,function(a){null!==a.y&&(a.height=a.shapeArgs.height,a.shapey=a.shapeArgs.y,a.shapeArgs.height=1,h||(a.shapeArgs.y=a.stackY?a.plotY+c.translate(a.stackY):a.plotY+(a.negative?-a.height:a.height)))}):(w(a.data,function(c){null!==c.y&&(c.shapeArgs.height=
c.height,c.shapeArgs.y=c.shapey,c.graphic&&c.graphic.animate(c.shapeArgs,a.options.animation))}),this.drawDataLabels(),a.animate=null))}else d.apply(this,[].slice.call(arguments,1))});v(q.column.prototype,"plotGroup",function(d,k,c,a,h,e){this.chart.is3d()&&e&&!this[k]&&(this.chart.columnGroup||(this.chart.columnGroup=this.chart.renderer.g("columnGroup").add(e)),this[k]=this.chart.columnGroup,this.chart.columnGroup.attr(this.getPlotBox()),this[k].survive=!0);return d.apply(this,Array.prototype.slice.call(arguments,
1))});v(q.column.prototype,"setVisible",function(d,k){var c=this,a;c.chart.is3d()&&w(c.data,function(d){a=(d.visible=d.options.visible=k=void 0===k?!d.visible:k)?"visible":"hidden";c.options.data[B(d,c.data)]=d.options;d.graphic&&d.graphic.attr({visibility:a})});d.apply(this,Array.prototype.slice.call(arguments,1))});v(q.column.prototype,"init",function(d){d.apply(this,[].slice.call(arguments,1));if(this.chart.is3d()){var k=this.options,c=k.grouping,a=k.stacking,h=A(this.yAxis.options.reversedStacks,
!0),e=0;if(void 0===c||c){c=this.chart.retrieveStacks(a);e=k.stack||0;for(a=0;a<c[e].series.length&&c[e].series[a]!==this;a++);e=10*(c.totalStacks-c[e].position)+(h?a:-a);this.xAxis.reversed||(e=10*c.totalStacks-e)}k.zIndex=e}});v(z.prototype,"alignDataLabel",function(d){if(this.chart.is3d()&&("column"===this.type||"columnrange"===this.type)){var k=arguments[4],c={x:k.x,y:k.y,z:this.z},c=y([c],this.chart,!0)[0];k.x=c.x;k.y=c.y}d.apply(this,[].slice.call(arguments,1))});v(d.StackItem.prototype,"getStackBox",
function(k,q){var c=k.apply(this,[].slice.call(arguments,1));if(q.is3d()){var a={x:c.x,y:c.y,z:0},a=d.perspective([a],q,!0)[0];c.x=a.x;c.y=a.y}return c})})(C);(function(d){var w=d.deg2rad,y=d.each,A=d.seriesTypes,z=d.svg;d=d.wrap;d(A.pie.prototype,"translate",function(d){d.apply(this,[].slice.call(arguments,1));if(this.chart.is3d()){var q=this,k=q.options,v=k.depth||0,n=q.chart.options.chart.options3d,u=n.alpha,c=n.beta,a=k.stacking?(k.stack||0)*v:q._i*v,a=a+v/2;!1!==k.grouping&&(a=0);y(q.data,function(d){var e=
d.shapeArgs;d.shapeType="arc3d";e.z=a;e.depth=.75*v;e.alpha=u;e.beta=c;e.center=q.center;e=(e.end+e.start)/2;d.slicedTranslation={translateX:Math.round(Math.cos(e)*k.slicedOffset*Math.cos(u*w)),translateY:Math.round(Math.sin(e)*k.slicedOffset*Math.cos(u*w))}})}});d(A.pie.prototype.pointClass.prototype,"haloPath",function(d){var q=arguments;return this.series.chart.is3d()?[]:d.call(this,q[1])});d(A.pie.prototype,"drawPoints",function(d){d.apply(this,[].slice.call(arguments,1));this.chart.is3d()&&y(this.points,
function(d){var k=d.graphic;if(k)k[d.y&&d.visible?"show":"hide"]()})});d(A.pie.prototype,"drawDataLabels",function(d){if(this.chart.is3d()){var q=this.chart.options.chart.options3d;y(this.data,function(d){var k=d.shapeArgs,n=k.r,u=(k.start+k.end)/2,c=d.labelPos,a=-n*(1-Math.cos((k.alpha||q.alpha)*w))*Math.sin(u),h=n*(Math.cos((k.beta||q.beta)*w)-1)*Math.cos(u);y([0,2,4],function(d){c[d]+=h;c[d+1]+=a})})}d.apply(this,[].slice.call(arguments,1))});d(A.pie.prototype,"addPoint",function(d){d.apply(this,
[].slice.call(arguments,1));this.chart.is3d()&&this.update(this.userOptions,!0)});d(A.pie.prototype,"animate",function(d){if(this.chart.is3d()){var q=arguments[1],k=this.options.animation,v=this.center,n=this.group,u=this.markerGroup;z&&(!0===k&&(k={}),q?(n.oldtranslateX=n.translateX,n.oldtranslateY=n.translateY,q={translateX:v[0],translateY:v[1],scaleX:.001,scaleY:.001},n.attr(q),u&&(u.attrSetters=n.attrSetters,u.attr(q))):(q={translateX:n.oldtranslateX,translateY:n.oldtranslateY,scaleX:1,scaleY:1},
n.animate(q,k),u&&u.animate(q,k),this.animate=null))}else d.apply(this,[].slice.call(arguments,1))})})(C);(function(d){var w=d.Point,y=d.seriesType,A=d.seriesTypes;y("scatter3d","scatter",{tooltip:{pointFormat:"x: \x3cb\x3e{point.x}\x3c/b\x3e\x3cbr/\x3ey: \x3cb\x3e{point.y}\x3c/b\x3e\x3cbr/\x3ez: \x3cb\x3e{point.z}\x3c/b\x3e\x3cbr/\x3e"}},{pointAttribs:function(w){var q=A.scatter.prototype.pointAttribs.apply(this,arguments);this.chart.is3d()&&w&&(q.zIndex=d.pointCameraDistance(w,this.chart));return q},
axisTypes:["xAxis","yAxis","zAxis"],pointArrayMap:["x","y","z"],parallelArrays:["x","y","z"],directTouch:!0},{applyOptions:function(){w.prototype.applyOptions.apply(this,arguments);void 0===this.z&&(this.z=0);return this}})})(C)});
