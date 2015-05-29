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
                width:280px;
            }
            li{
/*                display:none;*/
                padding:10px 10px;
            }
            span
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
            
            #shopping-cart{
                background-color:#ffffff;
                position:fixed;
                bottom:0;
                left:50%;
                margin-left:315px;
            }
            #cart-items-list{
                /*display:none;*/
            }
            .items-list-name{
                color:#333333;
                font-weight:600;
                font-size:18px;
            }
            .small-font{
                padding:3px 0px 15px;
                font-size:15px;
            }
            .items-list-size{
                font-style:italic;
                position:absolute;
                left:75px;
            }
            .items-list-quantity{
                position:absolute;
                left:133px;
                display:inline-block;
            }
            .substract,.add{
                float:left;
                display:inline-block;
                text-align:center;
                width:13px;
                height:13px;
                line-height:13px;
                border:1px solid #aaaaaa;
                color:#aaaaaa;
                cursor:pointer;

            }
            .item-cart-num{
                height:13px;
                line-height:13px;
                float:left;
                display:inline-block;
                padding:0 5px;
            }
            .cart-item{
                border-bottom:1px solid #bbbbbb; 
            }
            .top-line{
                border-top:2px solid #fe4d3d;
            }
            .items-list-price{
                color:#fe4d3d;
                position:absolute;
                left:211px;
            }
            #checkout-box{
                background-color:#333333;
                width:280px;
                height:45px;
            }
            .price-count{
                position:absolute;
                left:42px;
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
            
            var cart_json = {"food":[]};
            
            var shopCart = new function(){
                    this.cart_show = 0;
                    
                    this.total = 0;
                    
                    this.add = function(o){
                        var json_exit = false;
                        for(var i=0;i<cart_json.food.length;i++)
                        {
                            if(cart_json.food[i].id==o.id){
                                if(o.size){
                                    if(cart_json.food[i].size==o.size){
                                    cart_json.food[i].num=(parseInt(cart_json.food[i].num)+1).toString();
                                    json_exit = true;
                                    }
                                }
                                else{
                                    cart_json.food[i].num=(parseInt(cart_json.food[i].num)+1).toString();
                                    json_exit = true;
                                }
                            }
                        }
                        if(json_exit == false){
                            if(o.size){
                            item_json = { "id":o.id,"size":o.size, "num":1};
                            cart_json.food.push(item_json);
                                                        
                            }
                            else{
                            item_json = { "id":o.id, "num":1};
                            cart_json.food.push(item_json);
                            }
                                
                        }
                        var cart_value_str = JSON.stringify(cart_json);
                        var cart_value = document.getElementById("items-list-checkout");
                        cart_value.setAttribute("value",cart_value_str);
                        
                        this.cart_show+=1;
                        this.total = (parseFloat(this.total)+parseFloat(o.price)).toFixed(2);
                        
                        var total_cost = document.getElementById("total");
                        total_cost.innerHTML = "$"+this.total;
                        
                        var items_list = document.getElementById("cart-items-list");
                        
                        /*if(this.cart_show>0){
                            items_list.style.display = "block";
                        }*/
                        
                        
                        if(o.size){
                            var id = o.id+((o.size=="small")?"A":"B");
                            var items_num = document.getElementById("id_cart_num_"+id);
                            var items_price = document.getElementById("id-cart-price-"+id);
                        }
                        else{
                            var items_num = document.getElementById("id_cart_num_"+o.id);
                            var items_price = document.getElementById("id-cart-price-"+o.id);
                        }
                        
                        if(items_num){
                            
                                var price = (o.price*(parseInt(items_num.innerHTML)+1)).toFixed(2);
                                items_num.innerHTML=parseInt(items_num.innerHTML)+1;
                                items_price.innerHTML="$"+price;
                                
                        }
                        else{
                            var cart_item = document.createElement("li");
                            cart_item.className="cart-item";
                            if(o.size){
                                var size = (o.size=="small")?"Sm":"Lg";
                                var id = o.id+((o.size=="small")?"A":"B");
                                cart_item.id = "id_cart_item_"+id;
                                var detail = "{id:'"+o.id+"',item:'"+o.item+"',size:'"+o.size+"',price:'"+o.price+"'}";
                                cart_item.innerHTML = '<div class="items-list-name">'+o.item+'</div><div class="small-font"><span class="items-list-size">'+size+'</span><div class="items-list-quantity"><span class="substract" onClick="shopCart.remove('+detail+')">-</span><span class="item-cart-num" id="id_cart_num_'+id+'">1</span><span class="add" onClick="shopCart.add('+detail+')">+</span></div><span class="items-list-price" id="id-cart-price-'+id+'">$'+o.price+'</span></div>';
                                items_list.appendChild(cart_item);
                            }
                            else{
                                cart_item.id = "id_cart_item_"+o.id;
                                var detail = "{id:'"+o.id+"',item:'"+o.item+"',price:'"+o.price+"'}";
                                cart_item.innerHTML = '<div class="items-list-name">'+o.item+'</div><div class="small-font"><div class="items-list-quantity"><span class="substract" onClick="shopCart.remove('+detail+')">-</span><span class="item-cart-num" id="id_cart_num_'+o.id+'">1</span><span class="add" onClick="shopCart.add('+detail+')">+</span></div><span class="items-list-price" id="id-cart-price-'+o.id+'">$'+o.price+'</span></div>';
                                items_list.appendChild(cart_item);
                            }
                        }
                    }
                
                    this.remove = function(o){
                        
                        var json_exit = false;
                        for(var i=0;i<cart_json.food.length;i++)
                        {
                            if(cart_json.food[i].id==o.id){
                                
                                if(cart_json.food[i].id==o.id){
                                    if(o.size){
                                        if(cart_json.food[i].size==o.size){
                                            if((parseInt(cart_json.food[i].num)-1)==0){
                                                cart_json.food.splice(i,1);
                                            }
                                            else{
                                            cart_json.food[i].num=(parseInt(cart_json.food[i].num)-1).toString();
                                            }
                                        }
                                    }
                                    else{
                                        if((parseInt(cart_json.food[i].num)-1)==0){
                                            cart_json.food.splice(i,1);
                                        }
                                        else{
                                        cart_json.food[i].num=(parseInt(cart_json.food[i].num)-1).toString();
                                        }
                                    }
                                }
                             
                            }
                        }
                        var cart_value_str = JSON.stringify(cart_json);
                        var cart_value = document.getElementById("items-list-checkout");
                        cart_value.setAttribute("value",cart_value_str);
                        
                    
                        
                        this.cart_show-=1;
                        this.total = (parseFloat(this.total)-parseFloat(o.price)).toFixed(2);
                    
                        var total_cost = document.getElementById("total");
                        total_cost.innerHTML = "$"+this.total;
                        
                        var items_list = document.getElementById("cart-items-list");
                        
                        /*if(this.cart_show<=0){
                            items_list.style.display = "none";    
                        }*/
                        
                        if(o.size){
                            var id = o.id+((o.size=="small")?"A":"B");
                            var items_num = document.getElementById("id_cart_num_"+id);
                            var items_price = document.getElementById("id-cart-price-"+id);
                        }
                        else{
                            var id = o.id;
                            var items_num = document.getElementById("id_cart_num_"+id);
                            var items_price = document.getElementById("id-cart-price-"+id);
                        }
                        
                        if(((parseInt(items_num.innerHTML))>1)){
                            
                                var price = (o.price*(parseInt(items_num.innerHTML)-1)).toFixed(2);
                                items_num.innerHTML=parseInt(items_num.innerHTML)-1;
                                items_price.innerHTML="$"+price;
                                    
                        }
                        else{
                            var cart_item = document.getElementById("id_cart_item_"+id);
                            items_list.removeChild(cart_item);
                       }
                        
                    }
            }
            
            function getCookie(c_name)
            {
                if (document.cookie.length>0)
                {
                    c_start=document.cookie.indexOf(c_name + "=");
                    if (c_start!=-1)
                    { 
                        c_start=c_start + c_name.length+1 ;
                        c_end=document.cookie.indexOf(";",c_start);
                        if (c_end==-1)
                        {
                            c_end=document.cookie.length;
                        }
                        return unescape(document.cookie.substring(c_start,c_end));
                    } 
                  }
                return "";
            }
           
            //cookie cart
            function cookieItems() 
            { 
                var cookie_str = getCookie("food");
                var cookie = JSON.parse(cookie_str);
                for (var i=0;i<cookie.length;i++)
                {
                    var j = cookie[i].num;
                    for (var k=0; k<j; k++)
                    {
                        var cookie_item_name = cookie[i].name[0].replace(/\+/g," ");
                        if(cookie[i].size!=undefined)
                        var cookie_item ={ id:cookie[i].id["0"], item:cookie_item_name, size:cookie[i].size["0"], price:cookie[i].price["0"] };
                        else var cookie_item ={ id:cookie[i].id["0"], item:cookie_item_name, price:cookie[i].price["0"] };
                        shopCart.add(cookie_item);
                    }
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
                                        $item_detail="{id:'$item[id]',item:'$item[name]',price:'$size->price'}";
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
        
        <div id="shopping-cart">
            <div>
                <ul class="top-line" id="cart-items-list">
 
                </ul>
            </div>
            <div id="checkout-box">
                <div class="price-count">
                    <span id="total">$0</span>
                </div>
                <form method="post" action="checkout.php">
                    <input class="go-pay" type="submit" value="Checkout"/>
                    <input id="items-list-checkout" type="hidden" name="items-list" value="ee"/>
                </form>
            </div>
        </div>
        <script type="text/javascript">
            cookieItems();
        </script>
    </body>
</html>
