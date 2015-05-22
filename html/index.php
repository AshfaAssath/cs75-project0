<!-- Home Page -->


<!DOCTYPE html>
<html>
    <head>
        <title>Three Aces</title>
        <meta charset="utf-8">
        <style type="text/css">

            body{
                background-color:#f5f5f5;
            }
            
            div{
                display:block;
            }
            h3{
                margin:0px;
            }
            a{
                cursor:pointer;
                color:white;
                text-decoration:none;
                
            }
            
            ul{
                margin-top:0;
                list-style-type:none;
                padding:0;
                margin:0;
            }
            li{
/*                display:none;*/
                padding:10px 10px;
            }
            /*设置背景颜色*/
            .wrapper{
                background-color:#f5f5f5;
                    }
        
            /*水平居中*/
            .inner-wrapper{
                width:780px;
                margin:auto;
                padding-right:150px;
                /*background:white;*/
            }
            
            .categories{
                border:1px solid #ebebeb;
                border-bottom:none;
                margin-top:60px;
            }
            
            .header{
                background:#f5f5f5;
                margin:70px 0 130px;
            }
            
            .category{
                background:#fafafa;
               
            }
            
            .cate-name{
                border-bottom:1px solid #ebebeb;
             /*   height:30px;*/
                padding:15px;
            }
            
            .items{
                /*background:blue;*/
            }
            
            .item{
                background:white;
                border-bottom:1px solid #ebebeb;
                padding-left:30px;
                height:70px;
                position:relative;
               
            }
            
            .item-name{
                /*margin:21px;*/
                line-height:70px;
                float:left;
            }
            
            .item-left{
                width:220px;
                float:right;
                height:70px;
                position:relative;
            }
            .item-left2{
                
            
                line-height:70px;
            }
            .sizes{
                    
            }
            .size{
                padding:1.2px;
                font-size:10px;
                line-height:2.5em;
            }
            .price{
                position:absolute;
                left:60px;
                font-size:15px;
                width:140px;
                /*font:15px Arial,Helvetica,sans-serif;*/
               
            }
            
            .icon{
                display:inline-block;
                position:absolute;
                left:80px;
                top:21%;
                background-color:#fe4d3d;
                float:right;
                margin-right:50px;
                /*margin-top:10px;*/
                height:17px;
                width:17px;
                /*border:1px solid black;*/
                line-height:17px;
                text-align:center;
            }
            
            .icon2{
                display:inline-block;
                position:absolute;
                left:80px;
                top:37%;
                background-color:#fe4d3d;
                float:right;
                margin-right:50px;
                /*margin-top:10px;*/
                height:17px;
                width:17px;
                /*border:1px solid black;*/
                line-height:17px;
                text-align:center;
            }

           
            .description{
                
                font-size:10px;
                font-style:italic;
                position:absolute;
                left:50px;
                bottom:3px;
            }
            
            .shopping-cart{
                background-color:#ffffff;
                position:fixed;
                bottom:0;
                left:50%;
                margin-left:315px;
            }
            .items-list-name{
                color:#333333;
                font-weight:600;
                font-size:18px;
            }
            .small-font{
                padding:3px 0px;
                font-size:15px;
            }
            .items-list-size{
                font-style:italic;
                margin-left:105px;
            }
            .items-list-quantity{
                margin-left:17px;
                display:inline-block;
            }
            #substract,#add{
                display:inline-block;
                text-align:center;
                width:13px;
                height:13px;
                line-height:13px;
                border:1px solid #aaaaaa;
                color:#aaaaaa;
                cursor:pointer;

            }
            .border-line{
                border-bottom:1px solid #bbbbbb; 
            }
            .top-line{
                border-top:2px solid #fe4d3d;
            }
            .items-list-price{
                color:#fe4d3d;
                margin-left:15px;
            }
            .checkout-box{
                background-color:#333333;
                width:280px;
                height:45px;
            }
            .price-count{
                position:absolute;
                left:32px;
                bottom:7px;
                font-size:20px;
                font-size:26px;
                color:#ffffff;
            }
            
            .go-pay{
                background-color:#8FC31F;
                border:0;
                border-radius:2px;
                color:#ffffff;
                padding:0 20px;
                margin-top:7px;
                margin-right:13px;
                cursor:pointer;
                height:31px;
                line-height:31px;
                text-align:center;
                float:right;
                font-size:16px;
            }
        </style>
        <script type="text/javascript" >
            var shopCart = new function(){
                    
                    
                    this.add = function(o){
                    
                }
            }
        </script>
    </head>
    
    <body>
        
        <div class="header">
            <h1 style="text-align: center">Three Aces</h1>
            
        </div>

        <div class="wrapper">
            <div class="inner-wrapper">
            <!--    <h2 style="text-align: center">Menu</h2> -->
                <div class="categories">
                  
                        <?
                            $dom= simplexml_load_file("menu.xml");
                            
                            //print the categories
                            foreach ($dom->categories->category as $category)
                            {
                                print "<div class=\"category\">";
                                print "<h3 class=\"cate-name\">";
                                print $category["name"];
                                print "</h3>";
                                print "<div class=\"items\">";
                  
                                
                                //print the items
                                foreach ($category->items->item as $item)
                                {
                                    print "<div class=\"item\">";
                                    print "<div class=\"item-name\">";
                                    print $item[name];
                                    print "</div>";
                                    
                                    print "<div class=\"item-left\">";
                                    //print the items with different sizes
                                    if ($item->sizes)
                                    {
                                        print "<div class=\"item-left1\">";
                                        print "<div class=\"sizes\">";
                  
                                        foreach ($item->sizes->size as $size)
                                        {
                                            print "<div class=\"size\">";
                 
                                            print $size[size];
                                            print "<span class=\"price\">";
                                            print "$"."{$size->price}";
                                            print "<div class=\"icon\">";
                                            $item_detail="{id:'$item[id]',item:'$item[name]',size:'$size[size]',price:'$size->price'}";
                                            print "<a onClick=\"shopCart.add($item_detail);\" class=\"add-icon\">+</a>";
                                            print "</div>";
                                            print "<span>";
                                            

                                            print "</div>";
                                        }
                                        print "</div>";
                                        print "</div>";
                                    }
                                    
                                    //print the items without different sizes
                                    else
                                    {
                 
                                        print "<div class=\"item-left2\">";
                                        print "<span class=\"price\">";
                                        print "$"."{$size->price}";
                                        print "<div class=\"icon2\">";
                                        $item_detail="id:\'$item[id]',item:'$item[name]',price:'$size->price'}";
                                        print "<a onClick=\"shopCart.add($item_detail)\" class=\"add-icon\">+</a>";
                                        print "</div>";
                                        print "</span>";
                        
                                        print "</div>";
                                    }
                                    print "</div>";  
                                    //print the description of item if have    
                                    if ($item->description)
                                    { 
                                        print "<div class=\"description\">";
                                        print $item->description;
                                        print "</div>";
                                    }
                 
                                    print "</div>";
                                    
                 
                 
                                }
                 
                                print "</div>";
                 
                                print "</div>";
                                
                 
                 
                            }
                        ?>

                </div>
            </div>
        </div>
        
        <div class="shopping-cart">
            <div class="items-list">
                <ul class="top-line">
                    <li class="border-line">
                        <div class="items-list-name">3 Piece Chicken Dinner</div>
                        <div class="small-font">
                            <span class="items-list-size">Sm</span>
                            <div class="items-list-quantity">
                                <span id="substract">-</span>
                                <span id="number">2</span>
                                <span id="add">+</span>
                            </div>
                            <span class="items-list-price">$10.00</span>
                        </div>
                    </li>
                    <li class="border-line">
                        <div class="items-list-name">Tomato & Cheese</div>
                        <div class="small-font">
                            <span class="items-list-size">Lg</span>
                            <div class="items-list-quantity">
                                <span id="substract">-</span>
                                <span id="number">1</span>
                                <span id="add">+</span>
                            </div>
                            <span class="items-list-price">7.50</span>
                        </div>
                    </li>
                    <li class="border-line">
                        <div class="items-list-name">Chicken Wing Dinner</div>
                        <div class="small-font">
                            <span class="items-list-size">Sm</span>
                            <div class="items-list-quantity">
                                <span id="substract">-</span>
                                <span id="number">2</span>
                                <span id="add">+</span>
                            </div>
                            <span class="items-list-price">$18.00</span>
                        </div>
                    </li>
                    
                    
                </ul>
            </div>
            <div class="checkout-box">
                <div class="price-count">
                    <span id="price-count">$13.00</span>
                </div>
                <form method=post action="checkout.php">
                    <input class="go-pay" type="submit" value="Checkout"/>
                    <input id="items-list" type="hidden" name="items-list"/>
                </form>
            </div>
        </div>
    </body>
</html>
