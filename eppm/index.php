<?php

    // Get dynamically the path to the current script
    $path = rtrim(realpath(dirname(__FILE__)), '/');

    require_once $path.'/config.php';
    require_once $path.'/sso.php';

    // Need to check whether a user is already logged in
    $userId = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
    $action = isset($_GET['action']) ? trim($_GET['action']) : null;

    $userData = SSO::checkResponse();
    if ($userData !== false) {
        $userId = $userData['oracle_guid'];

        $_SESSION['user_id'] = $userId;
    }
?>
<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]> <html class="no-js" lang="en">           <![endif]-->
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Oracle Enterprise Project Portfolio Management</title>
        <meta name="author" content="">
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="viewport" content="width=device-width,initial-scale=1">

        <link href="<?=SUBFOLDER;?>images/favicon.ico" rel="shortcut icon" />

        <!-- Import CSS -->
        <link href="<?=SUBFOLDER;?>css/style.css" rel="stylesheet" />
        <link href="<?=SUBFOLDER;?>css/fancybox.css" rel="stylesheet" />

        <style>
            /*! CW21 */
            .cw21hidden{position:fixed;top:0;bottom:0;left:0;right:0;z-index:19}.cw21,.cw21 *{font-size:16px;line-height:1.1em}.cw21slideout h4{font-size:18px;line-height:1.1em;font-weight:bold;color:#4e4e4e}.cw21 h4,.cw21 p{margin:0 0 .6em}.cw21 li{line-height:19px}.cw21{position:fixed;margin:0;right:-262px;top:50%;z-index:20}.cw21w1{padding:20px}.cw21slideout{width:260px;margin:0 -2px 0 4px;z-index:10;padding:0;box-shadow:0 0 3px 0 rgba(20,20,20,.6);-webkit-box-shadow:0 0 3px 0 rgba(20,20,20,.6);-moz-box-shadow:0 0 3px 0 rgba(20,20,20,.6);background-color:#fff;background:-moz-linear-gradient(left,#fff 0,#fff 51%,#eee 100%);background:-webkit-gradient(linear,left top,right top,color-stop(0%,#fff),color-stop(51%,#fff),color-stop(100%,#eee));background:-webkit-linear-gradient(left,#fff 0,#fff 51%,#eee 100%);background:-o-linear-gradient(left,#fff 0,#fff 51%,#eee 100%);background:-ms-linear-gradient(left,#fff 0,#fff 51%,#eee 100%);background:linear-gradient(to right,#fff 0,#fff 51%,#eee 100%);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffffff',endColorstr='#eeeeee',GradientType=1)}.cw21w2{display:none}.cw21:after{content:".";display:block;clear:both;visibility:hidden;line-height:0}.cw21handle,.cw21opened .cw21handle:hover{left:-59px;position:absolute}.cw21handle:hover{left:-62px}.cw21navigation{padding:0;float:left;width:62px;box-shadow:0 0 3px 0 rgba(20,20,20,.6);-webkit-box-shadow:0 0 3px 0 rgba(20,20,20,.6);-moz-box-shadow:0 0 3px 0 rgba(20,20,20,.6);background:#d7d7d7}.cw21navigation li{clear:left;width:100%;margin:0;background-color:#d7d7d7;border-right:1px solid #d7d7d7;border-top:1px solid #d7d7d7;background:-moz-linear-gradient(left,#ddd 0,#fff 100%);background:-webkit-gradient(linear,left top,right top,color-stop(0%,#ddd),color-stop(100%,#fff));background:-webkit-linear-gradient(left,#ddd 0,#fff 100%);background:-o-linear-gradient(left,#ddd 0,#fff 100%);background:-ms-linear-gradient(left,#ddd 0,#fff 100%);background:linear-gradient(to right,#ddd 0,#fff 100%);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#dddddd',endColorstr='#ffffff',GradientType=1)}.cw21navigation li a{display:block;color:#4e4e4e;overflow:hidden;text-align:center;position:relative;border:1px solid #FFF;padding:35px 0 6px;width:60px}.cw21navigation li.cw21selected{border-right:3px solid #fff;background:#fff}.cw21navigation li:hover{background:#fff}.cw21navigation>li.cw21firstli{border-top-width:0}.cw21help a b,.cw21chat a b,.cw21try a b,.cw21demo a b,.cw21social a b{background:url('//www.oracleimg.com/us/assets/cw21-sprite.png') -2px 0 no-repeat;display:block;height:26px;width:28px;position:absolute;top:6px;left:50%;margin-left:-14px}.cw21chat a b{background-position:0 -30px}.cw21try a b{background-position:-1px -59px}.cw21demo a b{background-position:0 -89px;margin-left:-15px}.cw21social a b{background-position:0 -216px;margin-left:-15px}.cw21 *:focus{outline:0}.cw21w1 li a{color:#000}.cw21w1 li{background:url('//www.oracleimg.com/us/assets/cw21-sprite.png') -57px -29px no-repeat;padding:5px 0 5px 23px;margin:10px 0;font-weight:bold}.cw21w1 li.cw21phone{background-position:-81px 4px}.cw21w1 li.cw21global{background-position:-32px -60px}.cw21w1 li.cw21exp{background-position:-79px -121px}.cw21w1 li.cw21demoitem{background-position:-52px -147px}.cw21w1 li.cw21tour{background-position:-23px -175px}ul.cw21-iconfont{clear:both;overflow:hidden;margin:0 0 10px 0}ul.cw21-iconfont li{background:0;padding:0;margin:0 5px 10px 0;font-weight:normal;float:left}ul.cw21-iconfont li a{color:#1f4f82;text-decoration:none}ul.cw21-iconfont li a:hover{color:#7f7f7f}ul.cw21-iconfont li a i{font-size:24px}ul.cw21-iconfont li a i:before{content:"";display:inline-block;background:url('//www.oracleimg.com/us/assets/cw21-shareicons.png') 0 0 no-repeat;width:24px;height:24px}ul.cw21-iconfont li a i.icnf-facebook:before{background-position:0 0}ul.cw21-iconfont li a i.icnf-twitter:before{background-position:-26px 0}ul.cw21-iconfont li a i.icnf-linkedin:before{background-position:-52px 0}ul.cw21-iconfont li a i.icnf-gplus2:before{background-position:-155px 0}ul.cw21-iconfont li a i.icnf-youtube:before{background-position:-77px 0}ul.cw21-iconfont li a i.icnf-blog:before{background-position:-206px 0}ul.cw21-iconfont li a i.icnf-weibo:before{background-position:-103px 0}ul.cw21-iconfont li a i.icnf-youku:before{background-position:-129px 0}ul.cw21-iconfont li a i.icnf-cast:before{background-position:-309px 0}ul.cw21-iconfont li a i.icnf-video2:before{background-position:-180px 0}ul.cw21-iconfont li a i.icnf-delicious:before{background-position:-232px 0}ul.cw21-iconfont li a i.icnf-pinterest:before{background-position:-257px 0}ul.cw21-iconfont li a:hover i.icnf-facebook:before{background-position:0 -26px}ul.cw21-iconfont li a:hover i.icnf-twitter:before{background-position:-26px -26px}ul.cw21-iconfont li a:hover i.icnf-linkedin:before{background-position:-52px -26px}ul.cw21-iconfont li a:hover i.icnf-gplus2:before{background-position:-155px -26px}ul.cw21-iconfont li a:hover i.icnf-youtube:before{background-position:-77px -26px}ul.cw21-iconfont li a:hover i.icnf-blog:before{background-position:-206px -26px}ul.cw21-iconfont li a:hover i.icnf-weibo:before{background-position:-103px -26px}ul.cw21-iconfont li a:hover i.icnf-youku:before{background-position:-129px -26px}ul.cw21-iconfont li a:hover i.icnf-cast:before{background-position:-309px -26px}ul.cw21-iconfont li a:hover i.icnf-video2:before{background-position:-180px -26px}ul.cw21-iconfont li a:hover i.icnf-delicious:before{background-position:-232px -26px}ul.cw21-iconfont li a:hover i.icnf-pinterest:before{background-position:-257px -26px}@media(max-width:770px){.cw21{right:-222px;top:30%}.cw21slideout{width:220px}.cw21handle{left:-47px!important;width:50px!important}.cw21navigation{width:50px}.cw21navigation li a{width:48px;height:0;text-indent:-2000px}.cw21,.cw21 *{font-size:13px}.cw21slideout h4{font-size:15px}.cw21 li{line-height:16px}}@media(max-width:600px){.cw21demo a b{margin-left:-14px}.f11w1{padding-bottom:80px}.cw21{bottom:0;width:100%;left:0;right:auto;top:auto}.cw21handle{left:0!important;width:100%!important;height:43px}.cw21navigation li a{width:48px;height:0;text-indent:-2000px}.cw21navigation li{float:left;clear:none;width:auto}.cw21,.cw21 *{font-size:13px}.cw21slideout h4{font-size:15px}.cw21 li{line-height:16px}.cw21slideout{width:100%!important;margin:0;height:43px}.cw21navigation{width:100%!important;height:43px;background:#d1d1d1;background:-moz-linear-gradient(top,rgba(209,209,209,1) 0,rgba(166,166,166,1) 100%);background:-webkit-gradient(linear,left top,left bottom,color-stop(0%,rgba(209,209,209,1)),color-stop(100%,rgba(166,166,166,1)));background:-webkit-linear-gradient(top,rgba(209,209,209,1) 0,rgba(166,166,166,1) 100%);background:-o-linear-gradient(top,rgba(209,209,209,1) 0,rgba(166,166,166,1) 100%);background:-ms-linear-gradient(top,rgba(209,209,209,1) 0,rgba(166,166,166,1) 100%);background:linear-gradient(to bottom,rgba(209,209,209,1) 0,rgba(166,166,166,1) 100%)}.cw21opened .cw21slideout{height:auto}.cw21opened .cw21handle{margin-top:-30px}.cw21navigation li.cw21selected{border-right:0;border-bottom:3px #fff solid!Important}.cw21navigation>li.cw21firstli{border-top-width:1px}.cw21w1{padding-top:30px}}
        </style>

        <!-- Import JS -->
        <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>

        <script src="<?=SUBFOLDER;?>js/fancybox.min.js"></script>
        <!--[if lt IE 9]>
            <script src="<?=SUBFOLDER;?>js/html5shiv.js"></script>
        <![endif]-->

        <script src="<?=SUBFOLDER;?>build/mediaelement-and-player.min.js"></script>
        <link rel="stylesheet" href="<?=SUBFOLDER;?>build/mediaelementplayer.css">

        <script type="text/javascript">
            $(document).ready(function($){
                $(".video").on("click", function(){
                    $.fancybox({
                        href:      this.href,
                        type:      $(this).data("type"),
                        fitToView: false,
                        width:     763,
                        height:    440,
                        autoSize:  false
                    });

                    return false;
                });

            });

            /*! ORACLELIB.CALLME  */
            function startCallback(j,e){var g="http://www.oracle.com/us/assets/";var a=440;var f=260;var b=new Array();b[0]=["Oracle.com","0i2wzK12842","321884","0","0","1","netcallocomlauncher.html","netcallocomthankyou.html","netcallocomerror.html","5:00am - 5:00pm PST"];b[1]=["Oracle Education","2WcKOh12631","322065","0","0","1","launcher.html","thankyou.html","error.html","5:00am - 5:00pm PST"];b[2]=["Oracle Brazil","QoEOxb13081","344401","0","0","55","launcher-br.html","thankyou-br.html","error-br.html","9h00 - 18h00"];b[3]=["Oracle Consulting","invalid","379366","0","0","1","launcher.html","thankyou.html","error.html"," "];b[4]=["Oracle Netherlands","8StUfs2022","365383","0","0","31","launcher.html","thankyou.html","error.html"," "];b[5]=["Oracle UK","EIKzPM13381","365383","0","0","44","launcher.html","thankyou.html","error.html","9:00am - 6:00pm"];b[6]=["Oracle France","Osyzdu3268","365383","0","0","33","launcher-fr.html","thankyou-fr.html","error-fr.html","9h ? 18h CET"];b[7]=["Oracle Portugal","okWd3e3309","365383","0","0","351","launcher.html","thankyou.html","error.html","9:00am - 6:00pm"];b[8]=["Oracle Spain","1M4DJm3310","365383","0","0","34","launcher.html","thankyou.html","error.html"," "];for(var d=0;d<b.length;d++){if(j==b[d][1]){var c=g+b[d][6]+"?memberid="+b[d][2]+"&country="+b[d][5]+"&responseurl="+g+b[d][7]+"&errorurl="+g+b[d][8]+"&timezone="+escape(b[d][9]);width=((b[d][3]==0)?a:b[d][3]);height=((b[d][4]==0)?f:b[d][4]);win=window.open(c,"netcall","width="+width+",height="+height+",scrollbars=yes,resizable=yes,menubar=no,location=no");win.opener=self;break;}}}function startNewCallback(j,e){var g="http://"+location.hostname+"/ocom/groups/public/@ocompublic/documents/webcontent/";var a=565;var f=515;var b=new Array();b[0]=["Oracle.com","0i2wzK12842","321884","0","0","1","netcallcrmodlauncher.html","netcallcrmodthankyou.html","netcallnhthankyou.html","netcallcrmoderror.html","5:00 - 17:00 PST"];b[1]=["Oracle Education","2WcKOh12631","322065","0","0","1","launcher.html","thankyou.html","nhthankyou.html","error.html","5:00am - 5:00pm PST"];b[2]=["Oracle Brazil","QoEOxb13081","344401","0","0","55","launcher-br.html","thankyou-br.html","nhthankyou.html","error-br.html","9h00 - 18h00"];b[3]=["Oracle Consulting","invalid","379366","0","0","1","launcher.html","thankyou.html","nhthankyou.html","error.html"," "];b[4]=["Oracle Netherlands","8StUfs2022","365383","0","0","31","launcher.html","thankyou.html","nhthankyou.html","error.html"," "];b[5]=["Oracle UK","EIKzPM13381","365383","0","0","44","launcher.html","thankyou.html","nhthankyou.html","error.html","9:00am - 6:00pm"];b[6]=["Oracle France","Osyzdu3268","365383","0","0","33","launcher-fr.html","thankyou-fr.html","nhthankyou.html","error-fr.html","9h ? 18h CET"];b[7]=["Oracle Portugal","okWd3e3309","365383","0","0","351","launcher.html","thankyou.html","nhthankyou.html","error.html","9:00am - 6:00pm"];b[8]=["Oracle Spain","1M4DJm3310","365383","0","0","34","launcher.html","thankyou.html","nhthankyou.html","error.html"," "];for(var d=0;d<b.length;d++){if(j==b[d][1]){var c=g+b[d][6]+"?memberid="+b[d][2]+"&country="+b[d][5]+"&responseurl="+g+b[d][7]+"&errorurl="+g+b[d][9]+"&timezone="+escape(b[d][10])+"&ichannel="+escape(b[d][1])+"&nhresponseurl1="+g+b[d][8];width=((b[d][3]==0)?a:b[d][3]);height=((b[d][4]==0)?f:b[d][4]);win=window.open(c,"netcall","width="+width+",height="+height+",scrollbars=yes,resizable=yes,menubar=no,location=no");win.opener=self;break;}}}
            window.Modernizr=function(ap,ao,an){function aa(b){ag.cssText=b;}function Y(d,c){return aa(ad.join(d+";")+(c||""));}function W(d,c){return typeof d===c;}function U(d,c){return !!~(""+d).indexOf(c);}function S(f,c){for(var h in f){var g=f[h];if(!U(g,"-")&&ag[g]!==an){return c=="pfx"?g:!0;}}return !1;}function Q(g,c,j){for(var i in g){var h=c[g[i]];if(h!==an){return j===!1?g[i]:W(h,"function")?h.bind(j||c):h;}}return !1;}function O(g,f,j){var i=g.charAt(0).toUpperCase()+g.slice(1),h=(g+" "+ab.join(i+" ")+i).split(" ");return W(f,"string")||W(f,"undefined")?S(h,f):(h=(g+" "+Z.join(i+" ")+i).split(" "),Q(h,f,j));}var am="2.7.1",al={},ak=!0,aj=ao.documentElement,ai="modernizr",ah=ao.createElement(ai),ag=ah.style,af,ae={}.toString,ad=" -webkit- -moz- -o- -ms- ".split(" "),ac="Webkit Moz O ms",ab=ac.split(" "),Z=ac.toLowerCase().split(" "),X={},V={},T={},R=[],P=R.slice,N,M=function(v,u,t,s){var r,q,p,o,h=ao.createElement("div"),g=ao.body,b=g||ao.createElement("body");if(parseInt(t,10)){while(t--){p=ao.createElement("div"),p.id=s?s[t]:ai+(t+1),h.appendChild(p);}}return r=["&#173;",'<style id="s',ai,'">',v,"</style>"].join(""),h.id=ai,(g?h:b).innerHTML+=r,b.appendChild(h),g||(b.style.background="",b.style.overflow="hidden",o=aj.style.overflow,aj.style.overflow="hidden",aj.appendChild(b)),q=u(h,v),g?h.parentNode.removeChild(h):(b.parentNode.removeChild(b),aj.style.overflow=o),!!q;},K=function(){function c(h,g){g=g||ao.createElement(b[h]||"div"),h="on"+h;var a=h in g;return a||(g.setAttribute||(g=ao.createElement("div")),g.setAttribute&&g.removeAttribute&&(g.setAttribute(h,""),a=W(g[h],"function"),W(g[h],"undefined")||(g[h]=an),g.removeAttribute(h))),g=null,a;}var b={select:"input",change:"input",submit:"form",reset:"form",error:"img",load:"img",abort:"img"};return c;}(),J={}.hasOwnProperty,I;!W(J,"undefined")&&!W(J.call,"undefined")?I=function(d,c){return J.call(d,c);}:I=function(d,c){return c in d&&W(d.constructor.prototype[c],"undefined");},Function.prototype.bind||(Function.prototype.bind=function(a){var h=this;if(typeof h!="function"){throw new TypeError;}var g=P.call(arguments,1),f=function(){if(this instanceof f){var b=function(){};b.prototype=h.prototype;var d=new b,c=h.apply(d,g.concat(P.call(arguments)));return Object(c)===c?c:d;}return h.apply(a,g.concat(P.call(arguments)));};return f;}),X.touch=function(){var a;return"ontouchstart" in ap||ap.DocumentTouch&&ao instanceof DocumentTouch?a=!0:M(["@media (",ad.join("touch-enabled),("),ai,")","{#modernizr{top:9px;position:absolute}}"].join(""),function(b){a=b.offsetTop===9;}),a;},X.hashchange=function(){return K("hashchange",ap)&&(ao.documentMode===an||ao.documentMode>7);},X.history=function(){return !!ap.history&&!!history.pushState;},X.rgba=function(){return aa("background-color:rgba(150,255,150,.5)"),U(ag.backgroundColor,"rgba");},X.boxshadow=function(){return O("boxShadow");},X.cssgradients=function(){var e="background-image:",d="gradient(linear,left top,right bottom,from(#9f9),to(white));",f="linear-gradient(left top,#9f9, white);";return aa((e+"-webkit- ".split(" ").join(d+e)+ad.join(f+e)).slice(0,-e.length)),U(ag.backgroundImage,"gradient");};for(var L in X){I(X,L)&&(N=L.toLowerCase(),al[N]=X[L](),R.push((al[N]?"":"no-")+N));}return al.addTest=function(e,c){if(typeof e=="object"){for(var f in e){I(e,f)&&al.addTest(f,e[f]);}}else{e=e.toLowerCase();if(al[e]!==an){return al;}c=typeof c=="function"?c():c,typeof ak!="undefined"&&ak&&(aj.className+=" "+(c?"":"no-")+e),al[e]=c;}return al;},aa(""),ah=af=null,al._version=am,al._prefixes=ad,al._domPrefixes=Z,al._cssomPrefixes=ab,al.hasEvent=K,al.testProp=function(b){return S([b]);},al.testAllProps=O,al.testStyles=M,aj.className=aj.className.replace(/(^|\s)no-js(\s|$)/,"$1$2")+(ak?" js "+R.join(" "):""),al;}(this,this.document);
            jQuery(document).ready(function(a){(function(b){b(document).keydown(function(c){if(c.which==27){b("li.cw21selected").removeClass("cw21selected");b("div.cw21opened").css("right","");b("div.cw21opened").removeClass("cw21opened");b("div.cw21hidden").remove();}});})(jQuery);a("div.cw21").each(function(){a(this).find("ul.cw21navigation li").first().addClass("cw21firstli");a(this).find("ul.cw21navigation li a").append("<b></b>");});a("ul.cw21navigation").on("click","a",function(f){var c=a(this).closest(".cw21");var b=c.outerWidth(true);var d=a(this).attr("href").split("#")[1];if((typeof d!=="undefined")){c.find("div.cw21w1").css("min-height",((a("ul.cw21navigation li").length*55)+0)+"px");if(!c.hasClass("cw21opened")){c.addClass("cw21opened");a(this).parent().addClass("cw21selected");a(this).closest("body").append('<div class="cw21hidden"></div>');c.animate({right:"0px"},400);c.find("div.cw21w2").hide();a("#"+d).show();}else{if(c.hasClass("cw21opened")&&!a(this).parent().hasClass("cw21selected")){c.find("div.cw21w2").hide();a("#"+d).show();a("li.cw21selected").removeClass("cw21selected");a(this).parent().addClass("cw21selected");}else{a("div.cw21hidden").remove();c.find("div.cw21w2").hide();c.removeClass("cw21opened");c.animate({right:(b*-1)+"px"},400,function(){a("li.cw21selected").removeClass("cw21selected");a(this).css("right","");});}}f.preventDefault();}});a(document).on("click","div.cw21hidden",function(e){var c=a("div.cw21");var b=c.outerWidth(true);var d=a("div.cw21hidden");if(!c.is(e.target)&&c.has(e.target).length===0&&c.hasClass("cw21opened")){c.find("div.cw21w2").hide();c.removeClass("cw21opened");c.animate({right:(b*-1)+"px"},400,function(){a("li.cw21selected").removeClass("cw21selected");a(this).css("right","");});d.remove();}});});
            $(document).ready(function($){
                $('#atgchat-flyout a').click(function(e){
                    e.preventDefault();
//                    if(window.console) console.log(this.href);
                    var w = window.open(this.href,'Oracle',"width=410,height=597,resizable=0,scrollbars=0,menubar=0,toolbar=0,location=0,directories=0,status=0");
                    w.focus();

                });
            });
        </script>
    </head>

    <body>

        <header id="header">
            <div class="top">
                <div class="container">
                    <img src="<?=SUBFOLDER;?>img/logo.png" alt="Oracle" />
                </div>
            </div>
            <div id="banner">
                <img class="bgd" src="<?=SUBFOLDER;?>img/banner.bgd.jpg">
                <div class="container">
                    <h1>The Changing Face of Enterprise
                        <br>Project Portfolio Management
                    </h1>
                </div>
            </div>
        </header>

        <div class="main">
            <div class="container">
                <p class="large">Enterprise Project Portfolio Management (EPPM) is changing, with the greatest shifts being seen in the role of the Project Management Office (PMO) and the increasing reach of mobile technology. Oracle has brought EPPM thought leaders together to discuss how these changes were impacting the way they manage their project portfolios. Explore the resources below to find out what they had to say.</p>

                <div class="cols">
                    <div class="col-1">
                        <img class="featured" src="<?=SUBFOLDER;?>img/pdf.jpg" alt="" />
                    </div>
                    <div class="col-2">
                        <h2><span class="red">EPPM Board Report:</span> The Changing Face of Enterprise Project Portfolio Management</h2>
                        <p>Take an in-depth look at the forces, factors, and behaviors that are altering the way many multinational organizations manage complex project portfolios in the latest report from The EPPM Board.</p>
                        <br>
                        <a class="btn readmore download" href="<?=SUBFOLDER;?>download.php" class="download" title="Read more">Download</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="main grey">
            <div class="container">
                <h2>Insightful videos into EPPM and PMO’s</h2>

                <div class="cols">
                    <div class="col-1">
                        <a class="video" data-type="iframe" href="<?=SUBFOLDER;?>v.php?file=video-1"><img src="<?=SUBFOLDER;?>img/video-1.jpg" alt="" /></a>
                        <h3 class="vid-header">Increasing Strategic Efficiency with Enterprise Project Portfolio Management</h3>
                        <p class="vid-text">Even the most well planned strategies can fail if they are not communicated to project teams properly. Listen to how senior executives across the globe are using EPPM to align strategy development and delivery.</p>
                        <div class="button">
                            <a class="video" data-type="iframe" href="<?=SUBFOLDER;?>v.php?file=video-1">Watch Now</a>
                        </div>
                    </div>
                    <div class="col-1 multi">
                        <a class="video" data-type="iframe" href="<?=SUBFOLDER;?>v.php?file=video-2"><img src="<?=SUBFOLDER;?>img/video-2.jpg" alt="" /></a>
                        <h3 class="vid-header">Issues Facing the Modern PMO</h3>
                        <p class="vid-text">Much like any other part of a modern business, a PMO needs to be agile and able to react to unforeseen changes at a moment’s notice. Explore the biggest challenges that our experts are facing in their own PMOs.</p>
                        <div class="button">
                            <a class="video" data-type="iframe" href="<?=SUBFOLDER;?>v.php?file=video-2">Watch Now</a>
                        </div>
                    </div>
                    <div class="col-1 multi">
                        <a class="video" data-type="iframe" href="<?=SUBFOLDER;?>v.php?file=video-3"><img src="<?=SUBFOLDER;?>img/video-3.jpg" alt="" /></a>
                        <h3 class="vid-header">The Impact of Mobile Technology on Enterprise Project Portfolio Management</h3>
                        <p class="vid-text">Mobile technology has transformed the way many organizations do business, but how can it be used to help manage increasingly complex project portfolios? Discover what our executive panel had to say.</p>
                        <div class="button">
                            <a class="video" data-type="iframe" href="<?=SUBFOLDER;?>v.php?file=video-3">Watch Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <footer id="footer">
            <div class="grey">
                <div class="container">
                    <div class="float-l">
                        <a href="http://www.oracle.com/us/corporate/index.html" target="_blank"><img src="<?=SUBFOLDER;?>img/hardware_software.png" alt="" /></a>
                    </div>
                    <div class="float-r">
                        <a class="social facebook" href="http://www.facebook.com/OraclePrimavera" target="_blank"></a>
                        <a class="social linkedin" href="http://www.linkedin.com/groups?mostPopular=&gid=3305048" target="_blank"></a>
                        <a class="social twitter" href="http://twitter.com/OracleEPPM" target="_blank"></a>
                        <a class="social blog" href="https://blogs.oracle.com/eppm/" target="_blank"></a>
<!--                        <a class="social google" href="http://www.youtube.com/oracleprimavera" target="_blank"></a>-->
<!--                        <a class="social youtube" href="#" target="_blank"></a>-->
<!--                        <a class="social rss" href="#" target="_blank"></a>-->
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="menu">
                    <a href="http://www.oracle.com/us/corporate/contact/index.html" target="_blank">Contact Us</a>
                    <a href="http://www.oracle.com/us/legal/index.html" target="_blank">Legal Notices</a>
                    <a href="http://www.oracle.com/us/legal/terms/index.html" target="_blank">Terms of Use</a>
                    <a href="http://www.oracle.com/us/legal/privacy/index.html" target="_blank">Privacy</a>
                    <a href="http://www.oracle.com/us/legal/privacy/privacy-policy/index.html#cookies" target="_blank">Cookie Preferences</a>
                </div>
            </div>
        </footer>



        <!-- CW21v0 -->
        <div class="cw21 cw21v0">
            <div class="cw21slideout">

                <div class="cw21handle">
                    <ul class="cw21navigation">
                        <li class="cw21help"><a href="#cw21-calltab">Call</a></li>
                        <li class="cw21chat"><div data-lbl="chat-widget" id="atgchat-flyout"><a target="_blank" href="https://apps.instantservice.com/OracleChat/?wvurl=https%3A%2F%2Fc-603.estara.com%2FUI%2Fgui.php&wvpost=YToxOntzOjEzOiJvcHRpb25hbGRhdGE1IjtzOjY0OiJQcmltYXZlcmEgRW50ZXJwcmlzZSBQcm9qZWN0IFBvcnRmb2xpbyBNYW5hZ2VtZW50IChQUE0pIHwgT3JhY2xlIjt9&wvsplashurl=https%3A%2F%2Fapps.instantservice.com%2FOracleChat%2F">Chat<b></b></a><!--— spacer —--></div></li>

                    </ul>
                </div>

                <div class="cw21w1">

                    <div class="cw21w2" id="cw21-calltab">
                        <h4>We're here to help</h4>
                        <p>Engage a Sales Expert</>
                        <ul>
                            <li class="cw21phone">Sales<br />1-800-423-0245</li>
                            <li class="cw21phone">UK<br />+44 -0-870-8-768711</li>
                            <li><a href="javascript:startCallback('0i2wzK12842','customer data')">Have Oracle Call You</a></li>
                            <li class="cw21global"><a target="_blank" href="http://www.oracle.com/us/corporate/contact/global-070511.html">Global Contacts</a></li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
        <!-- /CW21v0 -->


        <!-- END: oWidget_C/_Raw-Text/Display -->

        <?php
        if ($action == 'download' && !isset($_SESSION['loaded'])) {
            unset($_SESSION['loaded']);
        ?>

            <script>
                jQuery(document).ready(function($){
                    setTimeout(function() { $('.download')[0].click(); }, 500);
                });
            </script>

        <?php
        }
        ?>

    </body>
</html>