This is Robert Booth's Final Project for CS350.

Currently unfinished, some of the buttons do not work, however many of the
features that you can see do work including account creation and login.

To login Please use Username: Admin
                    Password: 12345

At the link: http://cpsc.roanoke.edu/~rgbooth/cs470/DragonBaseQueries/rgbooth470website/index.php

Explanation of Files:
index.php - main home screen for the website that anyone can see,
            used to navigate to Login or Create Account Pages.

Login.php - main login screen for the website that anyone can see,
            used to login and send the user to hidden pages to set
            session variables.

includes/Login.inc.php - checks the input that the user gives for
                        login info. if input is good, send user to
                        setSession.inc.php

includes/setSession.inc.php - sets the rest of the session variables
                              for a user, which are used on other pages.

SignUpPage.php - main screen for a user to request an account creation.

includes/SignUp.inc.php - page that checks to ensure that the username
                          that is being requested for a new account is
                          not already in use. If not, send to
                          UserRequestSuccessPage.php.

UserRequestSuccessPage.php - screen showing that a user has successfully
                              made a request for a new account on the site.

HomePage.php - first screen shown when logged in. has buttons that can
                navigate to the tables showing student data, or
                a navigation bar to move to other pages of the website

StudentIDDataTable.php - a page only accessible from HomePage.php,
                        it shows the data from the StudentIDData table.

editData/editStudentIDTableData.inc.php - a page that allows the user
                        to edit data in the StudentIDData Table.

editData/confirmEditStudentIDData.inc.php - this page runs the query from the
                        previous page to update the StudentIDData table.

CourseHoursTable.php - a page only accessible from HomePage.php,
                        it shows the data from the CourseHours table.

editData/editCourseHoursTableData.inc.php - a page that allows the user
                        to edit data in the CourseHours Table.

editData/confirmEditCourseHoursTableData.inc.php - this page runs the query
                        from the previous page to update the CourseHours
                         table.

StudentAddressesTable.php - a page only accessible from HomePage.php,
                        it shows the data from the StudentAddresses table.

editData/editStudentAddressesTableData.inc.php - a page that allows the user
                        to edit data in the StudentAddresses Table.

editData/confirmEditStudentAddressesTableData.inc.php - this page runs the query
                        from the previous page to update the StudentAddresses
                         table.

StudentGradesTable.php - a page only accessible from HomePage.php,
                        it shows the data from the StudentGrades table.

editData/editStudentGradesTableData.inc.php - a page that allows the user
                        to edit data in the StudentGrades Table.

PreferencesPage.php - page shows the current user's selected preference,
                      with a form to change it.

includes/Preferences.inc.php - this hidden page makes the query to
                              update a user's preference

ViewQueriesPage.php - page has 4 buttons on it, one for each query

fixedQueries/Q1AvgAdvisees.php - this page shows the first
                                fixed query output.

fixedQueries/Q2PercentSAT.php - this page shows the second
                                fixed query output.

fixedQueries/Q3SemesterGPA.php - this page shows the third
                                fixed query output.

fixedQueries/Q4GPAByMajor.php - this page shows the fourth
                                fixed query output.

ManageUsersPage.php - This page for Admins, does the following:
                    - Accept new user requests.
                    - Deny new user requests.
                    - change the roles of other users.
                    - create new roles, and give those roles
                      other permissions(unfinished)
                    - View all new user Requests.
                    - View all Users.
                    If you are a non Admin user, it only
                    is a form to request a new role, but
                    this form is unfinished.

includes/AcceptUserRequest.inc.php - this hidden page makes the
                      Queries to turn a request into an actual
                      User.

includes/DenyUserRequest.inc.php - this hidden page makes the
                      Queries to deny a request.

includes/CreateRole.inc.php - this hidden page makes the query
                        to create a new role.

includes/SelectRole.inc.php - this hidden page makes the query
                      to give a user a different role.

includes/Header.inc.php - this creates the Navigation Bar
                        that is visible on most pages to move
                        to other pages.

includes/Logout.inc.php - this hidden page just drops
                          all session variables when it is run.

includes/DBConnection - This file is hidden, never reachable by
                      the user, to hide password info and to
                      have one place where a connection can be
                      made with the database.

MYSQL FILES
populate.sql - creates the tables and some data for the users
                of the website.

create-student-tables.sql - creates the tables for the Student
                            Data of the webiste. Does not populate.

populate-student-tables.sql - populates the tables with data from
                      StudentData.RawData.

drop-student-tables.sql - drops the 4 tables that are created
                      from create-student-tables.sql
