<html lang = "zh-TW">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial=scale=1" />
        <title>HouseHub</title>
	    <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css">
	    <script src="http://cdn.bootcss.com/jquery/2.1.1/jquery.min.js"></script>
	    <script src="http://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        
        <style>
            body {
                background-color: black;
            }
            h1{
                color: white;
            }
            .hub{
                display: block;
                font-family: sans-serif;
                font-weight: bold;
                font-size: 35px;
                position: absolute;
                color: white;
                padding-top: 20px;
                padding-left: 20px;
            }
            .hub span:nth-child(2) {
                background: #FF9900;
                color: #000000;
                border-radius: 4px;
                padding: 0 0.2vw 0.2vw 0.2vw;
                display: inline-block;
            }    
            
            #navbar{
               padding-right:1%;
            }
            #navbar  ul li{
               width:auto;
               height:5px;
               position:relative;
                padding-top:10%;
            }
            

            ul{
               padding-top:34px;
	           display:block;
	           float:right;
	           position: absolute;
               left:80%;
               width:20%;
               z-index:10;
            }

            a{
                background: #FF9900;
                text-align:center;
                color:#FFFFFF;
                font-size:1.6rem;
                height:100%;
            }
            #indeximg{
                height:80%;
                width:70%;
                padding-left:2%;
            }
            .hotsearch{
               color:#FFFFFF;
               padding-top: 10px;
               padding-left: 2%; 
            }
			#info{
				color:#FFFFFF;
			}
            #photobox{
	           float:left;
	           width:30%;
               height:30%;
	           text-align:center;
            }
            #photobox img{
                max-height: 100%;
                max-width: 100%;
            }
            #menuIcon{
                display:none;
            }
            #webheader{
                width:100%;
            }
            #searchbar{
                position: relative;
                padding-top:34px;
                padding-left:243px;
                padding-right:38%;
            }
            #myCarousel{
                position: absolute;
                top: 12%;
                left: 70%;
                z-index:10;
                width: 25%;
            }
			#photobox{
				height:80%;
                width:70%;
			}
            .textbox{
                width:80%;
                height:80%;
            }
            @media screen and (max-width:900px){
                #navbar ul{
                   display:none;
	               float:none;
	               padding:10px;
	               margin-bottom:30px;
                   width:30%;
                   left:70%;
                   text-align:left;
                }
                #searchbar{
                    padding-top:70px;
                    padding-left:11%;
                    padding-right:18%;
                    text-align:center;
                }
                #myCarousel{
                    position: absolute;
                    top: 130%;
                    width:80%;
                    left:10%;
                    text-align:center;
                }
                .hotsearch{
                    color:#FFFFFF;
                    padding-top: 2%;
                    padding-left: 2%; 
                }
                #menuIcon{

	               display:block;
	               float:right;
	               margin:30px 20px 0px 0px;
	               cursor:pointer;
                }
                .textbox{
                    width:100%;
                    height:80%;
                }
                #indeximg{
                    height:80%;
                    width:100%;
                    padding-left:8%;
                    padding-right:8%;
                }
                .housephoto img{
                    max-height: 100%;
                    max-width: 100%;
                    padding-left:1%;
                }

                ul{
                    position:absolute;
                    top:10%;
                    display:block;  
                }
            }
            .cle{
	           clear:both;
            }
        </style>
        <script>
                $(document).ready(function(){
                    $(document).height($(document).width()*0.426);
		            $("#menuIcon,#navbar ul li").click(function() {
                        if ($("#menuIcon").is(":visible")) { 
                            $("#navbar ul").toggle(200);
                        };
                    });
                });
                $(window).resize(function() {
	                $(document).height($(document).height());
	                if (!$("#navbar ul").is(":visible")) {
                        $('#navbar ul').attr('style', function(i, style){
                            return style.replace(/display[^;]+;?/g, '');
                        });
                    };
                });
         </script>  
    </head>
    
    <body>
        
        <div id="webheader">
            <div class="hub" onclick="location.href='index.html'" style="min-width:20px;min-height:20px;overflow:hidden;">
                <span contenteditable="true" >House</span>
                <span contenteditable="true">hub</span>
            </div>
            <div id='navbar'>
                <div id ="menuIcon"><img src="menuIcon.png"></div>
                    <ul>
                       <a href="index.html">主頁</a>
        	           <a href="help.html">幫助</a>
                    </ul>
                <div class="cle"></div>
            </div>
            
            
            <div id="searchbar">  
                <form action="search.php" method='get'>
                    <p>
                        <input type="text" name="searchtext" placeholder="搜尋關鍵詞 例如：台中 西屯 住宅" style="width:90%;"/>
                        <input type="submit" name="Submit" value=" 搜尋 " style="position: absolute;"/>
                    </p>
                </form>    
                    
            </div>  
           
        </div>
            
        <div class="hotsearch">
                <h2>房屋資訊</h2>
        </div>

        <div>
            
        <div id="indeximg">
            <?php
                $id = $_GET['sqlid'];
                $servername = "localhost";
                $username = "username";
                $password = "password";
                $database = "homework";
                $conn = mysqli_connect($servername, $username, $password, $database);
                if ($conn->connect_error) {
                  die("Connection Failed: " . $conn->connect_error);
                }
                $sql = "SELECT * FROM `table 1` WHERE `COL 1` = $id";
                $query = mysqli_query($conn,$sql);
                $rs = mysqli_fetch_array($query);
                $showid = $id%8;
                if($showid==0){
                  $showid=1;
                }
                if($id == 226){
                    $showid = 1;
                }
                else if($id == 178) {
                    $showid = 6;
                }
                else if($id == 104) {
                    $showid = 4;
                }
                else if($id == 9) {
                    $showid = 5;
                }
                else if($id == 600) {
                    $showid = 2;
                }
                else if($id == 603) {
                    $showid = 3;
                }
            ?>
            <div id="photobox">
                <img src="inner_images/house<?php
                    echo $showid;
                ?>_1.jpg">
                <img src="inner_images/house<?php
                echo $showid;
                ?>_2.jpg">
                <img src="inner_images/house<?php
                echo $showid;
                ?>_3.jpg">
            </div>
			<div id="info">
				<?php
					echo "地址：";
						echo $rs['COL 5'];
						echo '<br>';
						echo "建物型態："; echo $rs['COL 14'];echo "&nbsp;&nbsp;&nbsp;";
						echo "棟數：";echo $rs['COL 11'];echo "&nbsp;&nbsp;&nbsp;";
						echo "出售層次：";echo $rs['COL 12'];echo "&nbsp;&nbsp;&nbsp;";
						echo "總面積：";echo $rs['COL 18'];echo "&nbsp;&nbsp;&nbsp;";
						echo "房：";echo $rs['COL 19'];echo "&nbsp;&nbsp;";
						echo "廳：";echo $rs['COL 20'];echo "&nbsp;&nbsp;";
						echo "衛：";echo $rs['COL 21'];echo "&nbsp;&nbsp;";
						echo '<br>';
						echo "管理組織：";echo $rs['COL 23'];echo "&nbsp;&nbsp;&nbsp;";
						echo "附傢俱：";echo $rs['COL 24'];echo "&nbsp;&nbsp;&nbsp;";
						echo "隔間：";echo $rs['COL 22'];echo "&nbsp;&nbsp;&nbsp;";
						echo "車位面積：";echo $rs['COL 28'];echo "&nbsp;&nbsp;&nbsp;";
						echo "車位總額：";echo $rs['COL 29'];echo "&nbsp;&nbsp;&nbsp;";
						echo '<br>';
						echo "建築完成年月：";echo $rs['COL 17'];echo "&nbsp;&nbsp;&nbsp;";
						echo "主要建材：";echo $rs['COL 16'];echo "&nbsp;&nbsp;&nbsp;";
						echo '<br>';
						echo "價格：";echo $rs['COL 25'];echo "00&nbsp;&nbsp;&nbsp;";
						echo '<br>';echo '<br>';echo '<br>';
				?>
			</div>

        </div>

        
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
	<!-- 轮播（Carousel）指标 -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0"class="active"></li>
		        <li data-target="#myCarousel" data-slide-to="1"></li>
		        <li data-target="#myCarousel" data-slide-to="2"></li>
                <li data-target="#myCarousel" data-slide-to="3"></li>
                <li data-target="#myCarousel" data-slide-to="4"></li>
	        </ol>   
	<!-- 轮播（Carousel）项目 -->
	       <div class="carousel-inner">
               <div class="item active">
                   <img src="adbox/ad0.jpg">
               </div>
		       <div class="item">
                   <a href="search.php?sqlid="><img src="adbox/ad1.jpg"></a>
		       </div>
		       <div class="item">
			      <a href="houseshow.php?sqlid=600"><img src="adbox/ad2.jpg"></a>
               </div>
		       <div class="item">
                   <a href="houseshow.php?sqlid=226"><img src="adbox/ad3.jpg"></a>
		       </div>
               <div class="item">
                   <a href="houseshow.php?sqlid=178"><img src="adbox/ad4.jpg"></a>
		       </div>
	       </div>
            
        </div> 
        </div>
         
    </body>
</html>