CSE 3241 Final Project

Jaden Jaros, Trent Jackson, Vishu Singh, Amin Mohammed

# Requirements:
Implement a web application using MySQL and PHP for CityParking to manage parking
reservations for special events such as hockey games, concerts, etc., for the City of Wonderville.
All parking spaces are grouped into zones in Wonderville city. Each zone has a certain number
of spots designated for special events and their rates from zone to zone and from event to
event. You are designing this web application to provide an application easy to use by
customers, and easy to manage the reservable spaces by Wonderville City, which includes
determining the number of spots for the special events, monitoring the vacancies and
generating revenu reports for the mayor.
Functionalities required by the Wonderville city are listed below:
1. An administrator (with an ‘admin’ login and password ‘admin123’) can see a listing of all
zones, their total number of designated spots, rates and the spots taken by selecting the
date or a range of dates. Note that reservable spots are only for the dates with special
events.
2. An administrator can add or remove a zone, increase or decrease the number of spots
allocated for reservation and the rate as long as it doesn’t affect the current
reservations already made.
3. Reservation must be made at least a day ahead1. There should be at least two ways to
search for a spot to reserve:
a. Display all zones that still have available spots2, the number of available spots,
and their rates for the date entered by the user.
1 A day ahead is not the same as 24-hours ahead.
2 Your application should not display any zone that has no spots left that can be reserved.
b. Display the distance between each available zone and the venue selected with
the same information above.
c. Only one spot can be reserved per transaction.
Your application must design a way for the user to choose the zone with available spots
on a selected date to reserve.
4. Basic information of a reservation should include the user’s name, a cellphone number,
zone number, date, fee and the confirmation #.
5. A user can look up all his/her reservations (including the ones in the past) by his/her
cellphone number or the confirmation #.
6. A reservation can be cancelled if it is 3 days in advance. For example, to cancel one
reserved for 10/25/2023, the cancelation must be entered on or before 10/22/2023.
When a reservation is cancelled, it will be shown ‘cancelled’ under that user’s
reservation history.
7. Finally, the administrator can run a report, which includes the number of designated
spots, the number of reservations made, reservation fee, and total revenue for each
zone on a selected date (which can be in the past or in future.)
# Deliverables:
1. Develop the web application and demo it.
2. Package the application in a way that it can be installed on another PC3. You must
provide an installation script that creates the schema in the MySQL database, a script to
load the test data and a readme file to explain how to run those scripts. Be careful with
where the PHP files are stored, use relative directory paths wherever possible.
3. (Optional) A reflection paper (no more than one page) to describe the issues
encountered and how they were resolved or not resolved.
# Rubrics:
This assignment is worth 20% of your grade. Since this is a group project, work should be
divided among group members evenly. Members not contributing to the group project will get
lower scores.
* Meeting Requirements 65%
* User Friendliness 10%
* Creativity 10%
* Installable 15%
