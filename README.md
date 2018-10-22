**Application Scope: Things I have Improved**

This script is not production ready it could be enhanced.

Following are enhancements:

•	Separate out UI and backend: like PHP code and view (UI) code must be moved to separate files. 
* I did this in my sample code and moved all UI in views directory.


•	Singleton database connection: There must be a single point of database connection instead of doing this on every file of code. 
* Like I am doing in getConnection method in QueryExecutor class


•	Use of PDO or Query Builder: Using raw query is not at all secure enough to prevent from many SQL injection and other issues we must use PDO for executing queries.
* Everywhere in code e.g. in QueryExecutor Library and in all Models I am using PDO only.


•	UI side validation: At present there is no UI side validation for (zip, card no., card code, add expiration)
* Added UI side validation for zip, card no., card code and card expiration.


•	UI side dropdown: For Month, Year there must me proper drop down instead of raw text to prevent typo mistakes.
* Added drop down for card expiration Month and Year.


•	Backend Validation: Although we will add Frontside validation but backend validation (for zip, card no, card code, year and moth of expiration, city, state) as required to be added with proper error message to be delivered back to Frontend so showcase and highlight mistakes did by end user.
* add a validate method in cc_payment controller as of now its validating amount integer or not only can be extended a lot


•	Database tables restructuring: 
* We are storing card code too in databases which should not be done in any case.
* We are not maintaining payment status (e.g. paid, in-progress, failed etc.), so payment status table needs to be to be introduced. I am keep status as in-progress by default 


•	Trim post data: We must add trim() in htmlencode() for all post data that we are receiving from global variable $_POST.
* Add a library PostData to get clean POST data.

•	Follow PSR: It seems this script not following any PHP coding standards as suggested under PSR-1 to PSR-7  


**Future Enhancements: Things can be improved**

•	UI side dropdown: For City, State there must me proper drop down instead of raw text to prevent typo mistakes.
* Added drop down for card expiration City and State.


•	Database tables restructuring: 
* As I can see in payments table we are storing city, state as string which is wrong practice as data of will be repeated we must add new tables called cities and states and map only cities.id id with billing information.
* Even keeping everything in payments table only is not a good idea we must add new table called user_addresses and map all these with respective payment.
* We are storing card code too in databases which should not be done in any case.
* We are not maintaining payment status (e.g. paid, in-progress, failed etc.), so payment status table needs to be to be introduced.

•	Backend Validation: 
o	add a validate need to enhanced a lot. 



**How to use**

* System Requirement: Apache2, PHP (5.x or higher), MySQL (5.x or higher)
* unzip code and copy extracted data to you www/htdocs folder of apache
* create an empty database named `payment_process` and import database.sql in it.
* update connection settings in getConnection() method of QueryExecutor class
* now hit the url in browser (e.g. http://localhost/payment_process/ or http://localhost:8080/)
* you can see payment and billing details form here and after filling it 
* you will be re-directed to Order Summary Page (I am skipping Payment Gateway redirection)