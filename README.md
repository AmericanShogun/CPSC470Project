## CPSC470Project
### Robert Booth

Dynamically Constructed Prepare Statements Project

- The included files are all of the .php and sql files required to run my website.
- The database is currently in the CPSC server used for cs350 classes, the database name is: rgbooth_db.

- The majority of the data used is from the Dragon Research Collaborative, which I already had access to through my internship.
 -This data is constructed by running the file dragonBaseQuery.sql. This query will delete all tables that it will attempt to create before creating them, effectively reseting the database, wiping all data that has been inserted through the website queries.
- I did create an additional table called test, and it is constructed identically to the DragonBase tables by running the file preptest.sql
- All the files not in inner directories are used for managing the user login or user signup pages, or are navigated to and from using the navigation bar, so I kept those files in the main directory.
- All files in the /tables directory are individual files for showing all the data of the tables in the website. Each table has its own individual page.
- The /includes files are used for many account creation, login, signup, and session variables pages that the user cannot see or interact with.
- The /addData files are, for each table, a file that allows the user to enter data into textboxes and submit it to the database through the query. These queries are all not Prepare statement queries, but regular Insert queries.
- The /addData/includes files are, for each table, a file that takes the user input from the corresponding /addData page, and generates a query and runs it into the database.
- The /addBigData files are, for 4 of the tables, a file each that allows the user to enter inputs into textboxes and submit it to the database through a Prepare Statement query. These files all have an Add Row button that can be used an unlimited number of times and can therefore insert an unlimited amount of data into the database in a single Query.
- The /addBigData/includes files are for each of the 4 files in its parent directory, it has a file that takes the data submitted by the dynamic forms on the page, and through string concatenation generates a prepare statement query to insert all of the data the user entered in a single query.
