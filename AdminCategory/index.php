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
        <div id="category_heading">
             <h1>Product</h1>
        </div>
        <hr/>
        
        <div id="category_nav">
            <ul>
                <li><a href="#">Add Category</a></li>
                <li><a href="#">View Category</a></li>
                <li><a href="#">Delete Category</a></li>
            </ul>
        </div>
        
        <div id="add_category">
            <h3>Add New Category</h3>
            <form>
                <label>Category Id:</label>  <input type="text" name="name" id="name" /><br/>
                <label>Category Name:</label>  <input type="text" name="name" id="name" /><br/>
                <input type="submit" name="submit" id="submit" value="Add Category" />
            </form>
        </div>
        <div id="view_category">
            <h3>View Category</h3>
            <form>
                <table border="1">
                    <tr>
                        <th>Category Id</th>
                        <th>Category Name</th>
                    </tr>
                    <tr>                       
                        <td>abc</td>
                        <td>abc</td>
                    </tr>
                </table>
            </form>           
        </div>
        <div id="update_category">
            <h3>Update Category</h3>
            <form>
                <label>Category Id:</label>  <input type="text" name="name" id="name" /><br/>
                <label>Category Name:</label>  <input type="text" name="name" id="name" /><br/>              
                <input type="submit" name="submit" id="submit" value="Update Category" />
            </form>
        </div>
    </body>
</html>



<?php
    LayoutClass::includeFooter();
