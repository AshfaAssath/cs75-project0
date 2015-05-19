<!-- Home Page -->


<!DOCTYPE html>
<html>
    <head>
        <title>Three Aces</title>
        <meta charset="utf-8">
    </head>
    
    <body>
        <h1 style="text-align: center">Menu</h1>
        <br />
        <br />
        
        <ul>
            <?
                $dom = simplexml_load_file("menu.xml");
                
                //print the categories
                foreach ($dom->categories->category as $category)
                {
                    print "<li>";
                    print $category["name"];
                    print "<ul>";
                    
                    //print the items
                    foreach ($category->items->item as $item)
                    {
                        print "<li>";
                        print $item[name];
                        
                        //print the items with different sizes
                        if ($item->sizes)
                        {
                            print "<ul>";
                            foreach ($item->sizes->size as $size)
                            {
                                print "<li>";
                                print $size[size];
                                print "\t"."{$size->price}";
                                print "</li>";
                            }
                            print "</ul>";
                        }
                        
                        //print the items without different sizes
                        else
                            {
                                print "<ul>";
                                print "<li>";
                                print "\t"."{$size->price}";
                                print "</li>";
                                print "</ul>";
                            }
                            
                        if ($item->description)
                        {
                            print $item->description;
                        }
                        print "</li>";
                        
                        print "<br />";
                        print "<br />";
                    }
                    print "</ul>";
                    print "</li>";
                    
                    print "<br />";
                    print "<br />";
                }
            ?>
        </ul>
    </body>
</html>