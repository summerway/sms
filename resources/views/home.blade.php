<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <meta name="description" content="sms" />
    <meta name="keywords" content="sms" />
    <meta name="author" content="maple.xia" />
    {!! HTML::style('css/home/default.css') !!}
    {!! HTML::style('css/home/component.css') !!}
    <style>

        #menu ul li{
            width:25%;
        }
    </style>

    {!! HTML::script('js/home/modernizr.custom.js') !!}
</head>
<body>
<div class="container">
    <header>
        <h1>短信分发平台 <span>精彩每一天</span></h1>
    </header>
    <div class="main clearfix">
        <nav id="menu" class="nav">
            <ul>
                <li>
                    <a href="#">
								<span class="icon">
									<i aria-hidden="true" class="icon-home"></i>
								</span>
                        <span>首页</span>
                    </a>
                </li>
                {{--<li>
                    <a href="#">
								<span class="icon">
									<i aria-hidden="true" class="icon-services"></i>
								</span>
                        <span>Services</span>
                    </a>
                </li>--}}
                <li>
                    <a href="/company">
								<span class="icon">
									<i aria-hidden="true" class="icon-portfolio"></i>
								</span>
                        <span>保险公司</span>
                    </a>
                </li>
                <li>
                    <a href="/serivceList">
								<span class="icon">
									<i aria-hidden="true" class="icon-blog"></i>
								</span>
                        <span>服务商</span>
                    </a>
                </li>
       {{--         <li>
                    <a href="#">
								<span class="icon">
									<i aria-hidden="true" class="icon-team"></i>
								</span>
                        <span>The team</span>
                    </a>
                </li>--}}
                <li>
                    <a href="/smsList">
								<span class="icon">
									<i aria-hidden="true" class="icon-contact"></i>
								</span>
                        <span>短信记录</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div><!-- /container -->
<script>
    //  The function to change the class
    var changeClass = function (r,className1,className2) {
        var regex = new RegExp("(?:^|\\s+)" + className1 + "(?:\\s+|$)");
        if( regex.test(r.className) ) {
            r.className = r.className.replace(regex,' '+className2+' ');
        }
        else{
            r.className = r.className.replace(new RegExp("(?:^|\\s+)" + className2 + "(?:\\s+|$)"),' '+className1+' ');
        }
        return r.className;
    };

    //  Creating our button in JS for smaller screens
    var menuElements = document.getElementById('menu');
    menuElements.insertAdjacentHTML('afterBegin','<button type="button" id="menutoggle" class="navtoogle" aria-hidden="true"><i aria-hidden="true" class="icon-menu"> </i> Menu</button>');

    //  Toggle the class on click to show / hide the menu
    document.getElementById('menutoggle').onclick = function() {
        changeClass(this, 'navtoogle active', 'navtoogle');
    }

    // http://tympanus.net/codrops/2013/05/08/responsive-retina-ready-menu/comment-page-2/#comment-438918
    document.onclick = function(e) {
        var mobileButton = document.getElementById('menutoggle'),
            buttonStyle =  mobileButton.currentStyle ? mobileButton.currentStyle.display : getComputedStyle(mobileButton, null).display;

        if(buttonStyle === 'block' && e.target !== mobileButton && new RegExp(' ' + 'active' + ' ').test(' ' + mobileButton.className + ' ')) {
            changeClass(mobileButton, 'navtoogle active', 'navtoogle');
        }
    }
</script>
</body>
</html>