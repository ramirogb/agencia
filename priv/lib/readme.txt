=======================
EyeDataGrid Class

Version: 1.0
Date: 05/11/2008 10:17:44 AM
Author: Mike Frank <mike@eyesis.ca>
Homepage: http://www.eyesis.ca/
=======================

About
-----
Their are plenty of PHP data grid controls out there, but none that could satisfy me. I use data grids on every web site I develop. They're great for displaying all kinds of data. I developed this datagrid to suit all my needs and more.


Features
--------
	# Filtering and searching capabilities
	# Ability to change column headers
	# Capable of displaying images
	# Automatic row paging
	# Row selection
	# Supports MySQL database
	# Hide columns
	# Sort columns
	# Customizable look and feel through CSS
	# Can handle large data sets
	# Ability to add controls
	# Checkbox support
	# Specify column format types (such as percent, dollars, etc)
	# Much more...


Files
-----
class.eyedatagrid.inc.php
	-The main datagrid class
class.eyemysqladap.inc.php
	-My mysql wrapper class used in most of my projects
ex*.php
	-Example datagrid
ex*.png
	-Image of the example
sample data.sql
	-Sample data for playing around with (from examples)
table.css
	-The style layout for the datagrid table


Placeholder Variables
---------------------
What is a placeholder in the datagrid control? 
	A placeholder is a just the same as a variable. It is a name and references a column in a particular row.
	For exampe; lets say you had a Pets table with PetName, PetAge and PetComment columns.
	You can reference other columns in the PetComment by placing percent symbols (%) around the column name you are specifying.
	If the primary key is set during the setQuery method, you can use %_P% as a placeholder for the table's primary key.
Where can I use this?
	This can be on the database or scripted.
	This can be used in column types criteria and criteria_2 param. Look below on TYPE_IMAGE and TYPE_CUSTOM for more examples.


Column Types and Usage
----------------------
A quick overview of the available column types. I learn best by examples so I've included plenty for you.

TYPE_ONCLICK
	-Sets a "onclick" call on a cell value
	-e.g: $db->setColumnType('FirstName', EyeDataGrid::TYPE_ONCLICK, "alert('Hello?')");

TYPE_HREF
	-Sets a href link on a cell value
	-e.g: $db->setColumnType('FirstName', EyeDataGrid::TYPE_HREF, "http://www.google.com");

TYPE_DATE
	-Format a date
	-e.g: $db->setColumnType('Birthday', EyeDataGrid::TYPE_DATE, "M d, Y", true); // Converts to a timestamp and then to the formatted date
	-e.g: $db->setColumnType('Birthday', EyeDataGrid::TYPE_DATE, "M d, Y"); // Converts formatted date from a timestamp

TYPE_IMAGE
	-Changes a column's values to a image
	-e.g: $db->setColumnType('Photo', EyeDataGrid::TYPE_IMAGE, "/images/photos/%LastName%.png");

TYPE_ARRAY
	-Maps a value to a key in an array
	-e.g: $db->setColumnType('Gender', EyeDataGrid::TYPE_ARRAY, array('f' => 'Female', 'm' => 'Male'));

TYPE_CHECK
	-Converts a cell to a checkmark when the value is "1", "true", "yes" or value matches 3rd passed value
	-e.g: $db->setColumnType('Single?', EyeDataGrid::TYPE_CHECK);
	-e.g: $db->setColumnType('Single?', EyeDataGrid::TYPE_CHECK, 'legs');

TYPE_PERCENT
	-Converts a value to a percent as a whole number
	-e.g: $db->setColumnType('Score', EyeDataGrid::TYPE_PERCENT); // Value is already in percent
	-e.g: $db->setColumnType('Score', EyeDataGrid::TYPE_PERCENT, true); // Value is converted from decimal format when 3rd param is true
	-e.g: $db->setColumnType('Score', EyeDataGrid::TYPE_PERCENT, true, array('Back' => 'red', 'Fore' => 'black')); // Adds bars whose width represents the percent, colors are specified as 'Back' and 'Fore'

TYPE_DOLLAR
	-Converts a value to the a currency. Always rounded to 2 decimal places
	-e.g: $db->setColumnType('Price', EyeDataGrid::TYPE_DOLLAR);

TYPE_CUSTOM
	-Convert value to a custom value
	-e.g: $db->setColumnType('School', EyeDataGrid::TYPE_CUSTOM, 'I go to %CollegeName% in %City%, %Province%'); // Converts a cell to "I go to..". Placeholders are replaced with the value in that row's column

TYPE_FUNCTION
	-Sends a value (or values) to a user specified function
	-e.g: $db->setColumnType('Password', EyeDataGrid::TYPE_FUNCTION, 'md5', '%Password%'); // Value is sent to the md5 function and return is printed in the cell
	-e.g: $db->setColumnType('Password', EyeDataGrid::TYPE_FUNCTION, 'make_hash', '%Password%'); // Value is sent to the make_hash user function and return is printed in the cell
	-e.g: $db->setColumnType('Password', EyeDataGrid::TYPE_FUNCTION, 'generate_key', array('%Username%', '%Password%')); // To pass multiple params to the user function use an array