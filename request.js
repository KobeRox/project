// file search.js
var xhr = createRequest();

//validate function with parameter Cname, number, unitNum,streetNum,streetName,suburb,pickupTime,pickupDate,suburbD
function validate( Cname, number, unitNum,streetNum,streetName,suburb,pickupTime,pickupDate,suburbD) {
    var state = false;
    //check if the argument with regular expression
    for(var i =0; i < arguments.length;i++){
        var nameReg = /^[a-zA-Z -]+$/i;
        var numbers = /^[0-9]+$/;
        var specialChar = /[!@#$%^&*()?"{}|<>]/;

        //check if it is empty input except second
        if(arguments[i].trim()!==""||i===2){
//filter out special charactors
            if(!arguments[i].match(specialChar)){
                if(!Cname.match(nameReg)){
                    alert("Name input incorrect");
                    return false;
                }
                //phone number should be number
                if(!number.match(numbers)){
                    alert("Phone number input wrong");
                    return false;
                }
                if(suburb.match(numbers)){
                    alert(("suburb should not contain numbers"));
                    return false;
                }
                //suburb should not be number
                if(suburbD.match(numbers)){
                    alert(("suburb should not contain numbers"));
                    return false;
                }
                state = true;
            }else{
                alert("No special character should be used! ");
            }


        }
        else {
            alert("Null input are not allowed !");
            return false;
        }
    }
    return state;
}


//function send date with arguments dataSource, divID, Cname, number, unitNum,streetNum,streetName,suburb,pickupTime,pickupDate,suburbD
function sendData(dataSource, divID, Cname, number, unitNum,streetNum,streetName,suburb,pickupTime,pickupDate,suburbD)  {
    var place = document.getElementById(divID);
    //validate if all the input are valid
    if(validate(Cname, number, unitNum,streetNum,streetName,suburb,pickupTime,pickupDate,suburbD)){
        if(xhr) {
            //getting all the content data into request body
            var requestbody ="name="+encodeURIComponent(Cname)+"&phone="+encodeURIComponent(number)+"&unitNumP="+encodeURIComponent(unitNum)+
                "&streetNumP="+encodeURIComponent(streetNum)+"&streetNameP="+encodeURIComponent(streetName)+"&suburbP="+ encodeURIComponent(suburb)+
                "&timeP="+encodeURIComponent(pickupTime)+"&dateP="+encodeURIComponent(pickupDate)+"&suburbD="+encodeURIComponent(suburbD);
            //using xhr open with post method to request the server
            xhr.open("POST", dataSource, true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    place.innerHTML = xhr.responseText;

                } // end if
            } // end anonymous call-back function
            xhr.send(requestbody);
        } // end if
    }else{
        alert("Please try again ! ");
    }


} // end function getData()


//function assignData with arguments dataSource, divID, bookingNum
function assignData(dataSource, divID, bookingNum)
{
    //check if booking number is empty
    if(bookingNum.trim() === ''){
        alert("assign input is null");
    }else{
        if(isNaN("bookingNum")){
            if(xhr) {
                //getting content data with request body , xhr object using post open method
                var obj = document.getElementById(divID);
                var requestbody ="bookingNum="+encodeURIComponent(bookingNum);
                xhr.open("POST", dataSource, true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhr.onreadystatechange = function()
                {
                    // alert(xhr.readyState); // to let us see the state of the computation
                    if (xhr.readyState == 4 && xhr.status == 200)
                    {
                        obj.innerHTML = xhr.responseText;
                    } // end if
                } // end anonymous call-back function

                xhr.send(requestbody);
            } // end if
        }else{
            alert("Please enter a number");
        }
    }
} // end function getData() )


//function get data has arguments dataSource, divID
function getData(dataSource, divID)
{
    if(xhr) {
        //getting content data with request body , xhr object using post open method
        var obj = document.getElementById(divID);
        xhr.open("POST", dataSource, true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function()
        {
            if (xhr.readyState == 4 && xhr.status == 200)
            {
                obj.innerHTML = xhr.responseText;
            } // end if
        } // end anonymous call-back function

        xhr.send();
    } // end if
} // end function getData() )

//function searchName dataSource, divID, nameSearch
function searchName(dataSource, divID, nameSearch){
    if(xhr) {
        //getting content data with request body , xhr object using post open method
        var obj = document.getElementById(divID);
        var requestbody ="name="+encodeURIComponent(nameSearch);
        xhr.open("POST", dataSource, true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function()
        {
            // alert(xhr.readyState); // to let us see the state of the computation
            if (xhr.readyState == 4 && xhr.status == 200)
            {
                obj.innerHTML = xhr.responseText;
            } // end if
        } // end anonymous call-back function

        xhr.send(requestbody);
    } // end if
}

//pickupData has two dataSource, divID
function pickupData(dataSource, divID)
{
    if(xhr) {
        //getting content data with request body , xhr object using post open method
        var obj = document.getElementById(divID);
        xhr.open("POST", dataSource, true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function()
        {
            // alert(xhr.readyState); // to let us see the state of the computation
            if (xhr.readyState == 4 && xhr.status == 200)
            {
                obj.innerHTML = xhr.responseText;
            } // end if
        } // end anonymous call-back function

        xhr.send();
    } // end if
} // end function getData() )

