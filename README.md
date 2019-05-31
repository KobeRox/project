Zhiwei Xu web dev 


# project web dev 
this is a website which can book taxi and assign taxi.
To develop simple web-based taxi booking system called CabsOnline.
CabsOnline allows passengers to book taxi services from any of their internet connected
computers or mobile phones. The techniques you are going to use include the Ajax techniques
(JavaScript/HTML, XMLHttpRequest, CSS, and DOM), MySQL and PHP. For client-server
communication, you must use XMLHttpRequest object. 


Two components (booking and admin) of such an online service that must be completed for this
assignment are specified in the following two sub-sections. Other components such as querying
service for drivers, monitoring services for customers, payment processing, detailed processing
for assigning taxi are not required in this assignment but you are free to extend for your fun later. 

booking page(booking.html)
This component is used to allow a passenger to put in a taxi booking request in Auckland and
surrounding areas. The inputs for such a request include customer name, contact phone, pick-up
address (unit number if applicable, street number, street name, and suburb), destination suburb,
and pick-up date/time. Some other details such as number of passengers, car type, building type
etc. may not be required for this assignment. Once you get these inputs, you need to generate a
unique booking reference number, booking date/time (i.e., the date/time the booking is made) and
status with initial value “unassigned” for the request, add the request in a MySQL database on the
server side. The specific functions of this component include 

Admin page(admin.html)
This component allows administrative people of CabsOnline to view those taxi booking requests
that need to be assigned as soon as possible and to assign taxi for a particular booking request.
Note authentication is not required though it is necessary in the real application. If you provide this
function, you must provide the password and explain it in the readme document. The specific
functions of this component include 




files: admin.html, assign.php, booking.html. check.php, db.php, get.php, pickup.php, request.js, searchName.php, xhr.js

use: go to booking.html type all the information then you can book a cab, all the information will be validated so form is important, then in admin.html use search name to get data connect to name, get all the user click check all user, pick up request to check the requsest that can pickup in two hours, finally can assign a booking number to assign change the status  

