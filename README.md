Project Setup Instructions:
Files Included in the ZIP
•	setup.php: Script to automatically create the database, tables, and sample data.
•	sneakers_db.sql: Backup SQL file for manual database import.

   Steps to Run the Project
1. Extract the Files
•	Unzip the provided project folder (sneakers_project.zip) into your local server's root directory:
•	For XAMPP, place it in C:/xampp/htdocs/sneakers_project/.

2. Start the Server
•	Launch XAMPP and start:
•	Apache (for PHP).
•	MySQL (for the database).

3. 
Option A: Use setup.php to Create the Database (Preferred)
•	Open a web browser and navigate to:
•	http://localhost/sneakers_project/setup.php
•	This script will:
•	Create a database named sneakersDB.
•	Create the required Sneakers table.
•	Insert initial sample records.
•	After running, you’ll see confirmation messages about database and table creation.
4. 
Option B: Manually Import sneakers_db.sql
•	If setup.php cannot be used:
•	Open phpMyAdmin:
•	Navigate to http://localhost/phpmyadmin/ in your browser.
•	Create a new database:
•	Name it sneakersDB.
•	Import the backup file:
•	Select the Import tab and choose sneakers_db.sql from the extracted folder.
•	Click "Go" to import the data.
Accessing the Application
•	Navigate to ‘/php/config.php’ to update credentials that are accessible throughout the base.
•	Navigate to the project in your browser:
•	http://localhost/sneakers_project/sneakerObjects.html
•	You’ll see the sneaker project interface, including the following functionalities:
•	View sneakers: Navigate through the sneaker collection.
•	Insert sneaker: Add a new sneaker to the database.
•	Edit sneaker: Modify an existing sneaker's details.
•	Delete sneaker: Remove a sneaker from the database.
•	Sort sneakers: View sneakers sorted by price, model, or release status.

Optional: Reset the Database
•	If you need to reset the database:
•	Run setup.php again:
•	It will recreate the database and reset sample records.
•	Alternatively, manually re-import sneakers_db.sql using phpMyAdmin.

