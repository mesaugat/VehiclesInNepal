VehiclesInNepal
===============

Vehicles In Nepal(VIN) is an open-data project. It is a website containing information and statistics on roads, vehicles and accidents in Nepal.

### Authors

* Saugat Acharya (acharya_saugat@hotmail.com)
* Tribhuvan Raj Pokharel (trpansh1989@gmail.com)

### Requirements

* Apache2 (http & php) Server

### How to

* Download the zip and copy the contents of the folder inside the www in Wamp or htdocs in Xampp for Windows. In Linux, the www or htdocs is located in /srv or /var. Refer to the distro manual if confused.
* Import the sql file "db/vehicles_db.sql" using phpMyAdmin or MySQL. If the import fails: first make a database "vehicles_db" then import the sql file.
* If you have set your MySQL password then make sure to update your MySQL password in VehiclesInNepal/application/config/database.php
* Lastly, enable ModRewrite on your apache server.