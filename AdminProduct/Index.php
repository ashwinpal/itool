<?php
    include '../Application/Class/IncludeClass.php';
    LayoutClass::includeHeader();
?>   

        <?php
            LayoutClass::includeHomeNav();
        ?>

<html>
    <head></head>
    <body>
        <div id="product_heading">
             <h1>Product</h1>
        </div>
        <hr/>
        
        <div id="product_nav">
            <ul>
                <li><a href="#">Add Product</a></li>
                <li><a href="#">View Product</a></li>
                <li><a href="#">Delete Product</a></li>
            </ul>
        </div>
        
        <div id="add_product">
            <h3>Add New Products</h3>
            <form>
                <label>Product Id:</label>  <input type="text" name="name" id="name" /><br/>
                <label>Product Name:</label>  <input type="text" name="name" id="name" /><br/>
                <label>Product Description:</label>  <textarea rows="3" cols="19" name="desc"></textarea><br/>
                <label>Category Id:</label> 
                <select name="P_category">  
                    <option name="1" value="1">1</option>
                    <option name="1" value="1">1</option>
                    <option name="1" value="1">1</option>
                </select><br/>
                <label>Buying Price</label> <input type="text" name="price" id="price" /><br/>
                <label>Image:</label> <input type="file" name="image" id="image" /><br/>
                <input type="submit" name="submit" id="submit" value="Add Product" />
            </form>
        </div>
        <div id="view_product">
            <h3>View Products</h3>
            <form>
                <table border="1">
                    <tr>
                        <th>Product Id</th>
                        <th>Product Name</th>
                        <th>Product Description</th>
                        <th>Product Category</th>
                        <th>Buying Price</th>
                    </tr>
                    <tr>
                        <td>abc</td>
                        <td>abc</td>
                        <td>abc</td>
                        <td>abc</td>
                        <td>abc</td>
                    </tr>
                </table>
            </form>           
        </div>
        <div id="update_product">
            <h3>Update Product</h3>
            <form>
                <label>Product Id:</label>  <input type="text" name="name" id="name" /><br/>
                <label>Product Name:</label>  <input type="text" name="name" id="name" /><br/>
                <label>Product Description:</label>  <textarea rows="3" cols="19" name="desc"></textarea><br/>
                <label>Category Id:</label> 
                <select name="U_category">  
                    <option name="1" value="1">1</option>
                    <option name="1" value="1">1</option>
                    <option name="1" value="1">1</option>
                </select><br/>
                <label>Buying Price</label> <input type="text" name="price" id="price" /><br/>
                <label>Image:</label> <input type="file" name="image" id="image" /><br/>
                <input type="submit" name="submit" id="submit" value="Update Product" />
            </form>
        </div>
    </body>
</html>


<?php
    LayoutClass::includeFooter();