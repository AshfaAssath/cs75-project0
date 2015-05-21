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
                color:white;
                text-decoration:none;
                
            }
            /*设置背景颜色*/
            .wrapper{
                background-color:#f5f5f5;
                    }
        
            /*水平居中*/
            .inner-wrapper{
                width:780px;
                margin:auto;
                /*background:white;*/
            }
            
            .categories{
                border:1px solid #ebebeb;
                border-bottom:none;
                margin-top:60px;
            }
            
            .header{
                background:#f5f5f5;
                margin:50px;
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
        </style>
    </head>
    
    <body>
        
        <div class="header">
            <h1 style="text-align: center">Menu</h1>
        </div>

        <div class="wrapper">
            <div class="inner-wrapper"> 
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
                                            print "<a href=\"#\" class=\"add-icon\">+</a>";
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
                                        print "<a href=\"#\" class=\"add-icon\">+</a>";
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
    </body>
</html>
