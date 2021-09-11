<!DOCTYPE.html>
<html lang="en">
  <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-wdth, initial-scale=1">
     <link rel="stylesheet" href="">
     <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
     <style>
         
         body{
            background-image: url('../images/blood drop.jpg');
	        background-repeat: no-repeat,repeat;
	        background-position: center;
	        background-size: cover;

         }
         h1{
             text-align: center;
             text-decoration: underline;
             color: black;
         }
         #name{
             width: 80%;
             padding: 5px;
             border-radius: 5%;
             outline: 0;
             border: 1px solid lightgray;
         }
         table{
             color: black;
             background: rgba(211,211,211,0.7);
             border-collapse: collapse;
             font-size: 20px;
             font-family:  Helvetica;             
             padding: 5px;
             
             text-align: -webkit-center;
         }

        
     </style>
  </head>

<body>
    <h1> Donor Dettails</h1>
    
    <table align="center" cellpadding="10">
        <tr>
            <td>Name :</td>
            <td><input type="text" id="name" name="name" placeholder="Enter your name" required></td>
        </tr>
        <tr>
            <td>Gender :</td>
            <td><input type="radio" name="male">Male<input type="radio" name="male">Female<input type="radio" name="male">Others</td>
        </tr>
        <tr>
            <td>Date of Birth :</td>
            <td><input type="date" id="name" name="DOB" ></td>
        </tr>
        <tr>
            <td>Mobile Number :</td>
            <td><input type="number" id="name" name="MNUM" placeholder="Enter your number" ></td>
        </tr>
        <tr>
            <td>Address :</td>
            <td><textarea row="5 cols="10" placeholder="Enter your address" ></textarea> </td>
        </tr>
        <tr>
            <td>State :</td>
            <td><input type="text" id="name" name="state" placeholder="Enter your State" ></td>
        </tr>
        <tr>
            <td>District/City :</td>
            <td><input type="text" id="name" name="city" placeholder="Enter your city" ></td>
        </tr>
        <tr>
            <td>Blood Bank Name :</td>
            <td><input type="text" id="name" name="BBN" placeholder="Enter " ></td>
        </tr>
        <tr>
            <td>Blood Group :</td>
            <td><select>
                <option></option> <option value="O+ve">Male</option> <option value="Female">Female</option> <option value="Other">Other</option>
            </select></td>
        </tr>
        <tr>
            <td>
            <div>
            <button type="submit" class="btn btn-info">Save</button>
            </div>
        </td>
        </tr>
    </table>
   

</body>
</html>