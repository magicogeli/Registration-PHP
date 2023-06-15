<html>
 <head>
    <script>
        function validateForm() 
        {
            let fname = document.forms["myForm"]["fname"].value;
            let lname = document.forms["myForm"]["lname"].value;
            let email = document.forms["myForm"]["email"].value;
            let tel = document.forms["myForm"]["tel"].value;
            let dob = document.forms["myForm"]["dob"].value;
            let gender = document.forms["myForm"]["gender"].value;

            let regexnameformat = /^[\.a-zA-Z,]*$/;
            let fnameresult = regexnameformat.test(fname);
            let lnameresult = regexnameformat.test(lname);

            let regexemailformat = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|.(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            let emailresult = regexemailformat.test(email);

            let regextelformat = /^(09|\+639)\d{9}$/;
            let telresult = regextelformat.test(tel);

            if((fname == '') || (lname == '') || (email == '') || (tel == '') || (dob == '') || (gender == ''))
            {
                alert("Please fill up the form properly.");
                return false;
            }

            if ((fname == "")||(lname == "")) {
                alert("Name must be filled out!");
                return false;
            }

            if((fnameresult == false)||(lnameresult == false))
            {
                alert('Please enter a valid name format!');
                return false;
            }

            if (emailresult == false)
            {
                alert('Please enter a valid email format!');
                return false;
            }

            if (telresult == false)
            {
                alert('Please enter a valid tel PH format!');
                return false;
            }
        }
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
 </head>
 <body>
    
<h2>User Registration Form</h2>

    <form name="myForm" method="POST" action="form.php" onsubmit="return validateForm()"> <!--      -->
        <div class="form-group row">
            <label for="fname" class="col-sm-2 col-form-label">First Name</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" name="fname" id="fname">
            </div>
        </div>

        <div class="form-group row">
            <label for="lname" class="col-sm-2 col-form-label">Last Name</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" name="lname" id="lname">
            </div>
        </div>

        <div class="form-group row">
            <label for="email" class="col-sm-2 col-form-label">Email Address</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" name="email" id="email">
            </div>
        </div>

        <div class="form-group row">
            <label for="tel" class="col-sm-2 col-form-label">Mobile Number</label>
            <div class="col-sm-10">
                <input class="form-control" type="tel" name="tel" id="tel">
            </div>
        </div>

        <div class="form-group row">
            <label for="dob" class="col-sm-2 col-form-label">Date of Birth</label>
            <div class="col-sm-10">
                <input class="form-control" type="date" name="dob" id="dob" max="<?php echo date("Y-m-d");?>" onkeydown="return false" onchange="computeAge()">
            </div>
        </div>

        <div class="form-group row">
            <label for="age" class="col-sm-2 col-form-label">Age</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" name="age" id="age" readonly>
            </div>
        </div>

        <div class="form-group row">
            <label for="gender" class="col-sm-2 col-form-label">Gender</label>
            <div class="col-sm-10">
                <select name="gender">
                    <option value="">Select...</option>
                    <option value="M">Male</option>
                    <option value="F">Female</option>
                </select>
            </div>
        </div>

            <input class="btn btn-primary" type="submit" name="submit" id="submit" value="Submit">
        </div>
    </form>

    <script>
        function computeAge() 
        {
            var dob = new Date(document.getElementById("dob").value);
            var monthcount = Date.now() - dob;
            var age = new Date(monthcount);
            var year = age.getUTCFullYear();
            var agee = Math.abs(year - 1970);

            var x = document.getElementById("age");
            x.value = agee;
        }
    </script>
 </body>
</html>