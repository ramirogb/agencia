<?php
require 'class.eyedatagrid.inc.php';
?>
<html>
<head>
<title>EyeDataGrid Example 1</title>
<link href="table.css" rel="stylesheet" type="text/css">
</head>
<body>
<h1>Basic Datagrid WITH AJAX</h1>
<p>This is a basic example of the datagrid using AJAX calling ex1.php</p>
<p>Notice how when you order by a column you don't reload the whole page? Only the datagrid will change. The page persists along with any data. Fill in the txt box, it will stay the same:  <input type="text" name="test" size="5"></p>
<?php
// Just call one function and your table is now totally Ajax enabled!
EyeDataGrid::useAjaxTable('ex1.php');
?>
</body>
</html>