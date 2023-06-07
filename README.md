******************************************************************
# Read me for 221 PA5 Group 13
******************************************************************
## Description:
Our task was to create a web app that allowed tourists who are visiting South Africa\
to explore the rich and vast wine landscapes that this country has to offer.\
More on the functional requirements below.

## Group Contributors:
- Ms Zandile Modise - u21508322
- Ms Asakundwi Siphuma - u21556416
- Mr Aidan Govender - u22520458
- Ms Itumeleng Moshokoa - u21785742
- Mr Phuti Sebashe - 
- Mr Sibisi Mathebe- u22506889
- Mr Hlokomani Khondlo - u21488593

*****************************************************************
## Funcitonal Capabilities:
                Get access to home page:
                
To access the web app, you will need to clone the repository onto your
local machine and run it from a web-server of your choice. This is because
we are not required to host the web app.
Upon opening it on your localhost, you will be greeted with a home page that
shows a catalog of all the current wines on display. A user is able to sort
and filter the wines to find exactly what they are looking for.

                Signing up:

A user can simply browse the sight unregistered, but in order to interact and
use the features they must be logged in. In order to log in, a user must create an
account. To do this, they can click on the "Sign Up" page in the navigation bar.
They will  be greeted with a page that prompts them to enter their information.
Near the end of the form, there are three radio buttons. You can either register as a user,
a critic, or a wine manager.
These critic's reviews are valued higher than the reviews of regular users, due to
their high expertise in the wine industry, hence the need to differentiate.
In order for a critic to be approved as critics, we would contact them and ask them to
provide their CV and other documentation to back up their status as a critic. A decision
is made internally and they are then able to submit critic reviews on the sight.
For the purposes of this demo, let us assume that this proccess is followed.
A wine manager has a special set of functions. They have the ability to manage wines
for specific wineries. They would also need to go through a verification process, but
for the purposes of this practical assignment let us assume this process is followed.

                Logging in:
                        
Once registered, a user must then log in using the details they used when registering their account.
They will be prompted to enter their email and their password. Once logged in, they have the
capability of leaving a review on a wine.
If a user is not registered, an error will be displayed.
Default login details: email:hello@gmail.com
                       password:helloWorld123@


                Viewing a wine;
                
This is a core mechanic of our web application. Right from the home page, users can browse and sort wines
to find exactly what they are looking for. Once found, they can click on a wine and they will be redirected to
a page that shows them more information about the wine. Information such as: year, region, sweetness, tannin,
winery name, variety of grape and the food that pairs best with that wine. They will also be shown an image
of the wine so that they can find it with ease at a wine store.


                Reviewing a wine:
                        
If a user would like to review a wine, they can click on the wine they'd like to review from the
home page. Then there will be a textbox together with a button underneath it to submit the review.
If you are logged in and submit the review, a success message will be shown and you can 
continue browsing thereafter.

                Reading reviews:
To view reviews on a wine, you can click on the wine you'd like to view from the home page. Reviews from users and critics
will be right below the information about the wine. Critic reviews appear first because they inform users
better. 

A wine's average ratings are also shown for each wine. There are two reviews shown. An average
critic rating and then an average user/customer rating. Some wines might not have critic ratings and reviews.

                Wine management:
Our web-app allows users who are registered as managers for wineries, add wines that belong to their
winery. Once they log in, a new page will appear on the header titled "Manage". They can go to this page
and add all the wine information they need. The web-app will then add the appropriate wine to that
winery on the database.
*****************************************************************
## The database

Our database is hosted on MyPHPAdmin. A dump of the database has been made available on this repository.
You can download it and import it to your own machine, using MariaDB or any DBMS of your choice.

FOLLOW THESE INSTRUCTIONS TO IMPORT DATABASE USING MARIADB:

1. Download the sql file, remember the path where you downloaded it.

2. Log into MariaDB from CMD using your own user privileges.

3. CREATE a new database and name it.

3. Exit MariaDB

4. Type this command: 
	$ mysql -u (username) -p (new database name) < (dump file name.sql)

	Where $ is your filepath for mysql.exe
5. Enter your password

If ran succesfully, there will be no output. To check, you can use your new database and show the tables.
