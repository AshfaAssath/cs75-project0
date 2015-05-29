<?php
    
    session_start();
    
    
    if (isset($_POST["items-list"]))
    {
        
        $order_items_list = json_decode($_POST["items-list"]);
        $order_items_list_2 = array();
        
        if(count($order_items_list->food)>0)
        {
            $dom = simplexml_load_file("menu.xml");
            foreach ($order_items_list->food as $order_items)
            {
                foreach ($dom->categories->category as $category)
                {
                    foreach ($category->items->item as $item)
                    {
                        if ($item["id"] == $order_items->id)
                        {
                            $order_items_2["id"] = $item["id"];
                            $order_items_2["name"] = $item["name"];
                            $order_items_2["num"] = $order_items->num;
                            if ($order_items->size)
                            {
                                foreach($item->sizes->size as $size)
                                {
                                    if($size["size"] == $order_items->size)
                                    {
                                        $order_items_2["size"] = $size["size"];
                                        $order_items_2["price"] = $size->price;                     
                                    }
                                }
                            }
                            else
                            {
                                $order_items_2["price"] = $item->price;
                            }
                            $order_items_list_2[] = $order_items_2;
                        }
                    }
                }
            }
        }
        
        $order_items_list_2_str = json_encode($order_items_list_2);
        setcookie("food", $order_items_list_2_str, time() + 24 * 60 * 60);
        
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Checkout</title>
        <style type="text/css">
            table{
                background:#ffffff;
                float:left;
                padding:0;
                width:470px;
                border:1px solid #aaaaaa;
                border-bottom:none;
                border-spacing:0;
                border-collapse:collapse;
            }
           
            tr{
               /* display:block;*/
                margin:0;
                padding:0;
                width:470px;
                height:50px;
                border-bottom:1px dotted #bbbbbb;
            }
            td{
                padding:0 20px; 
              
            }
            hr{
                margin:0;
                padding:0;
                border:2px solid #fe4d3d;
                position:relative;
                top:200px;
            }
            form{
                background:#ffffff;
                border:1px solid #aaaaaa;
                width:370px;
                height:400px;
                float:right;
            }
            .right{
                float:right;
            }
            .header{
                height:200px;
                background:#f5f5f5;
            
            }
            .footer{
                height:500px;
                background:#f5f5f5;
            
            }
            .wrap{
                background:#f5f5f5;
            }
            .inner-wrap{
                width:1000px;
                margin:0 auto;
            }
            .total{
                font-weight:bold;
                width:470px;
                border-bottom:1px solid #aaaaaa;
            }
          
            .row{
                margin-bottom:30px;
                padding:20px;
            }
            .submit{
                margin-top:50px;
                text-align:center;
            }
            .clear{
                clear:both;
            }
            .textarea{
                margin:0;
                padding:0;
                width:169px;
                height:50px;
            }
            .buttom{
                bolder:none;
                font:20px/1.5em "宋体",sans-serif;
            }
        </style>
    </head>
    
    <body>
        <div class="header">
            
        </div>
        <div class="wrap">
            <div class="inner-wrap">
                <table>
                    <tbody>
                            <tr>
                                <th>Items</th>
                                <th>Size</th>
                                <th>Quantity</th>
                                <th>Price</th>
                            </tr>
                        <? for ($i = 0; $i < count($order_items_list_2); $i++){ ?>
                            <tr>
                                <td><?= $order_items_list_2[$i]["name"] ?></td>
                                <td><?= $order_items_list_2[$i]["size"] ?></td>
                                <td><?= $order_items_list_2[$i]["num"] ?>*</td>
                                <td>$<?= $order_items_list_2[$i]["price"] ?></td>
                            </tr>
                        <? $total += intval($order_items_list_2[$i]["num"])*floatval($order_items_list_2[$i]["price"]); } ?>
                            <tr  class="total">
                                <td>
                                    <div>total</div>
                                </td>
                                <td></td>
                                <td></td>
                                <td><div class="total-price">$<?= $total ?></div></td>
                            </tr>
                    </tbody>
        </table> 
                <form method="post" action="#">
                    <div class="row">
                    <label for="address">Address:</label>
                    <textarea class="right textarea" type="textarea" name="address" value=""/>
                    </textarea>
                    </div>
                    <div class="row">
                    <label for="name">Name:</label>
                    <input class="right" type="text" name="name" value=""/>
                    </div>
                    <div class="row">
                    <label for="telphone">Telphone:</label>
                    <input class="right" type="text" name="telphone" value=""/>
                    </div>
                    <div class="clear"></div>
                    <div class="submit">
                    <input class="buttom" type="submit" value="Go to Pay"/>
                    </div>
                </form>
                <div class="clear">
                    
                </div>
            </div>
        </div>
        <div class="footer">
            <hr />
        </div>
    </body>
</html>