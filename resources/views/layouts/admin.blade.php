<?php 
use Illuminate\Support\Facades\URL;
?>
<!-- templatemo 385 floral shop -->
<!-- 
Floral Shop Template 
http://www.templatemo.com/preview/templatemo_385_floral_shop 
-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Floral HTML CSS Template</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<!--<link href="/css/bootstrap.css" rel="stylesheet" type="text/css" />-->

<link href="/templatemo_style.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" href="/css/orman.css" type="text/css" media="screen" />
<link rel="stylesheet" href="/css/nivo-slider.css" type="text/css" media="screen" />

<link rel="stylesheet" type="text/css" href="/css/ddsmoothmenu.css" />
<link rel="stylesheet" type="text/css" href="/css/mystyle.css" />
<script type="text/javascript" src="/js/jquery.min.js"></script>
<script type="text/javascript" src="/js/ddsmoothmenu.js">

/***********************************************
* Smooth Navigational Menu- (c) Dynamic Drive DHTML code library (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit Dynamic Drive at http://www.dynamicdrive.com/ for full source code
***********************************************/

</script>

<script type="text/javascript">

ddsmoothmenu.init({
	mainmenuid: "templatemo_menu", //menu DIV id
	orientation: 'h', //Horizontal or vertical menu: Set to "h" or "v"
	classname: 'ddsmoothmenu', //class added to menu's outer DIV
	//customtheme: ["#1c5a80", "#18374a"],
	contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
})

function clearText(field)
{
    if (field.defaultValue == field.value) field.value = '';
    else if (field.value == '') field.value = field.defaultValue;
}

</script>

<link rel="stylesheet" href="/css/slimbox2.css" type="text/css" media="screen" /> 
<script type="text/JavaScript" src="/js/slimbox2.js"></script> 


</head>

<body>

<div id="templatemo_wrapper_h">
<div id="templatemo_header_wh">
	<div id="templatemo_header" class="header_home">
    	<div id="site_title"><a href="/">Админка</a></div>
        <div id="templatemo_menu" class="ddsmoothmenu">
            <ul>
                <li><a href="/" class=" selected">Главная</a></li>
                
                <li><a href="/products/admin">Продукты</a>
                    <ul>
                        <li><a href="/products/create">Добавить</a></li>
                  	</ul>
                </li>
                <li><a href="/categories">Категории</a>
                <ul>
                        <li><a href="/categories/create">Добавить</a></li>
                        <li><a href="/categories">Редактировать</a></li>
                </ul></li>
                
            </ul>
            
            <br style="clear: left" />
        </div> <!-- end of templatemo_menu -->

        
		<script type="text/javascript" src="/js/jquery-1.6.1.min.js"></script>
        <script type="text/javascript" src="/js/jquery.nivo.slider.pack.js"></script>
        <script type="text/javascript">
        $(window).load(function() {
            $('#slider').nivoSlider({
				controlNav:false
			});
        });
        </script>
    </div> <!-- END of header -->
</div> <!-- END of header wrapper -->
<div id="templatemo_main_wrapper">
<div id="templatemo_main">
	
	
	
	@yield('content')
	
	
	
	
        <div style="margin: auto;">
        	<a href="#"><img src="/images/free_shipping.jpg" alt="Free Shipping"/></a>
        </div>    
    </div>
    <div class="cleaner"></div>
</div> <!-- END of main -->
</div> <!-- END of main wrapper -->

<div id="templatemo_footer_wrapper">
<div id="templatemo_footer">
	<div class="footer_left">
    	<a href="#"><img src="/images/1311260370_paypal-straight.png" alt="Paypal" /></a>
        <a href="#"><img src="/images/1311260374_mastercard-straight.png" alt="Master" /></a>
        <a href="#"><img src="/images/1311260374_visa-straight.png" alt="Visa" /></a>
    </div>
	<div class="footer_right">
		<p><a href="/">Главная</a> | <a href="">Продукты</a> | <a href="">О нас</a> | <a href="">Скидки</a> | <a href="">Контакты</a> </p>
        <p><?php echo date('Y');?>  <a href="http://gardens.biz.ua/conact">Связаться с автором</a></p>
	</div>
    <div class="cleaner"></div>
</div> <!-- END of footer -->
</div> <!-- END of footer wrapper -->
</div>

</body>
</html>