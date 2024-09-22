<?php
session_start();
ob_start();
if(isset($_SESSION['userid'])){
    echo('login status Green');
}
else{
    header("Location:../frontend_authentication/Login.php");
    exit();
}
ob_end_clean();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Property Form</title>
    <link rel=stylesheet href="../css_upload/upload.css">
    <style>
        body{
            padding-top:65px;
        }
        .Pg-container{
            display: none;
        }
        .Full-House-Container{
            display:block;
        }
        .checklist-style-container{
            display:flex;
            justify-content:space-between;
            align-items:center;
            margin-bottom:20px;
            border: 1px solid #ced4da;
            padding:10px;
            box-sizing: border-box;
            width:100%;
        }
        .checklist-style-container-food{
            border: 1px solid #ced4da;
            padding:10px;
            box-sizing: border-box;
            display:grid;
            grid-template-columns:1fr 1fr;
        }
        .checklist-style{
            margin-right:15px;
            display:flex;
            justify-content: space-between;
            


        }
        .Flate-Mates-container{
            display:none;
        }

        /* css for start of header*/ 
   .header-main-container{
    display:flex;
    align-items:center;
    justify-content: space-between;
    height:62px;
    width:100%;
    background-color:black;
    color:white;
    font-family:arial,sans-serif;
    position:fixed;
    top:0;
    right:0;
    left:0;
  } 
  .logo-container{
  display: flex;
  align-items:center;
  justify-content:start;
  cursor:pointer;
  }
  .image-containersos{
    height:60px;
    width:60px;
  }
  .logo-img-stylesos{
    height:100%;
    width:100%;
    background-color:transparent;
  }
  .text-container{
    font-size:20px;
  }
  .filter-option{
    height:auto;
    font-size:20px;
    cursor:pointer;
  }
  .option-container{
    height:30px;
    width:30px;
    padding-right:10px;
    position:relative;
  }
  .menu-icon-style{
    height:100%;
    width:100%;
    background-color: transparent;
  }
  /* this is option container*/
  .option-main-container{
    height:auto;
    width:130px;
    border:1px solid black;
    border-radius:4px;
    padding:5px;
    font-family:arial;
    font-size:1rem;
    background-color:rgb(236, 233, 233);
    position:absolute;
    color:black;
    top:50px;
    left:-105px;
    display:none;
  }
  @media only screen and (min-width:0px) and (max-width:741px){
    .text-container{
        font-size:0px;
    }
  }

  /* css end of header style*/
    </style>
</head>
<body>

<header class="header-main-container">

<a href="../welcome/home.php" style="color:white;text-decoration:none;"><div class="logo-container">
    <div class="image-containersos"><img src="../images/logo-roomhunt.png" class="logo-img-stylesos"></div>
    <div class="text-container">RoomHunt</div>
</div>
</a>


<div class="filter-option">My WishList</div>

<div class="option-container" style="cursor:pointer"><img src="../images/menu-icon.png" class="menu-icon-style">

    <div class="option-main-container">
    <a href="../profile/myprofile.php" style="text-decoration:none; color:black"><div>My Profile</div></a>
            <hr>
            <a href="../frontend_houses/mysellhouse.php" style="text-decoration:none;color:black"><div>My SellHouse</div></a>
            <hr>
            <a href="../frontend_houses/mypage.php" style="text-decoration:none;color:black"><div>My RentalHouse</div></a>
            <hr>
            <a href="../php_upload/upload.php" style="text-decoration:none;color:black"><div>Upload Houses</div></a>
    </div>
</div>
</header>

    <div class="container">
        <form class="property-form" action="../backendhouses/backendfullhouse.php" id="form-id" method="post" enctype="multipart/form-data">
            <h1>Property Details</h1>

            <label for="city">City:</label>
            <input type="text" id="city" name="city" placeholder="Enter City Name" required>

            <label for="area">Area:</label>
            <input type="text" id="area" name="area" placeholder="Enter Area Place" required>

            <label for="streetname">Street Name</label>
            <input type="text" id="streetname" name="streetname" placeholder="Street Name" required>

            <label for="roaddetail">Road Name:</label>
            <input type="text" id="roaddetail" name="roaddetail" placeholder="Enter Road Name" required>

            <label for="pincode">PinCode:</label>
            <input type="number" id="pincode" name="pincode" placeholder="Enter Pincode" required>

            <label for="address">Address:</label>
            <textarea id="address" name="address" rows="5" placeholder="Enter address" required></textarea>

            <label for="price">Rent Price:</label>
            <input type="number" id="price" name="price">

            <label for="deposit">Deposit Price:</label>
            <input type="number" id="deposit" name="deposit">


            <label for="sqft">Enter sqft:</label>
            <input type="number" id="sqft" name="sqft">
          

            <label for="ModeOfHouse">Mode Of House:</label>
            <select id="ModeOfHouse" name="ModeOfHouse" onchange="testing();" required>
                <option value="FullHouse" selected>Full House</option>
                <option value="PG">PG</option>
                <option value="FlatMates">FlatMates</option>
            </select>

            <div class="Pg-container">

                
                <label for="pgfor">PG For:</label>
                <select id="pgfor" name="pgfor" required>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="anyone">Anyone</option>
                </select>

                
            <label for="furnish">Furnishing:</label>
            <select id="furnish" name="furnish" required>
                <option value="full">Full</option>
                <option value="semi">Semi</option>
                <option value="none">None</option>
            </select>


                
           
          <div class="checklist-style-container">
            <label>Room Type:</label>
             <div class="checklist-style">
                <label for="singleroom">Single Room</label>
                <input type="checkbox" id="singleroom" value="singleroom" name="roomtypes[]">
             </div>
               <div class="checklist-style">
                <label for="doubleroom">Shared Room</label>
               <input type="checkbox" id="doubleroom" value="sharedroom" name="roomtypes[]">
               </div>
              

          </div>
             
        
            





            
          <div class="checklist-style-container">
            <label>Preferred For:</label>
             <div class="checklist-style">
                <label for="students">Students</label>
                <input type="checkbox" id="students" value="students" name="Preferredfor[]">
             </div>

               <div class="checklist-style">
                <label for="professionals">Professionals</label>
               <input type="checkbox" id="professionals" value="professionals" name="Preferredfor[]">
               </div>

          </div>
             




          <div class="checklist-style-container">
            <label>Food info:</label>

            <div class="checklist-style-container-food">
            <div class="checklist-style">
                <label for="none">None</label>
                <input type="checkbox" id="none" value="none" name="Foodincluded[]">
             </div>

             <div class="checklist-style">
                <label for="breakfast">breakfast(only)</label>
                <input type="checkbox" id="breakfast" value="breakfast(only)" name="Foodincluded[]">
             </div>

             
               <div class="checklist-style">
                <label for="lunch">Lunch(only)</label>
               <input type="checkbox" id="lunch" value="lunch(only)" name="Foodincluded[]">
               </div>

               <div class="checklist-style">
                <label for="dinner">Dinner(only)</label>
                <input type="checkbox" id="dinner" value="dinner(only)" name="Foodincluded[]">
             </div>
             <div class="checklist-style">
                <label for="breakfastlunch">BreakFast+Lunch</label>
                <input type="checkbox" id="breakfastlunch" value="breakfast & lunch" name="Foodincluded[]">
             </div>
             <div class="checklist-style">
                <label for="threetmies">All Meals</label>
                <input type="checkbox" id="3threetimes" value="all meals" name="Foodincluded[]">
             </div>
             </div>
          </div>


          <label for="metro">Metro:</label>
            <select id="metro" name="metro" required>
                <option value="nometro">No Metro</option>
                <option value="1kmaway">1km Away</option>
                <option value="3kmaway">3km Away</option>
                <option value="5kmaway">5km Away</option>
            </select>



          <label for="parkingStatus">Parking Type:</label>
            <select id="parkingStatus" name="parkingStatus" required>
                <option value="2wheller">2 Wheller</option>
                <option value="4wheller">4 Wheller</option>
            </select>





            
            <label for="bathroomfacility">Bathroom Facility:</label>
            <select id="bathroomfacility" name="bathroomfacilitypg" required>
                <option value="commonbathroom">Common Bathroom</option>
                <option value="attachedbathroom">Attached Bathroom</option>
            </select>


            
            <label for="housepic">Upload Picture of House:</label>
            <input type="file" id="housepic" name="housepicpg">

            <button type="submit" class="ref">Submit</button>
         
            </div>


           <div class="Full-House-Container">
           


            <div class="checklist-style-container">
                <label>Housing Type:</label>
                 <div class="checklist-style">
                    <label for="1BHK">1BHK</label>
                    <input type="checkbox" id="1BHK" value="1BHK" name="HousingType[]">
                 </div>
    
                 <div class="checklist-style">
                    <label for="2BHK">2BHK</label>
                    <input type="checkbox" id="2BHK" value="2BHK" name="HousingType[]">
                 </div>

                 <div class="checklist-style">
                    <label for="3BHK">3BHK</label>
                    <input type="checkbox" id="3BHK" value="3BHK" name="HousingType[]">
                 </div>
                
                
                
              </div>
                 



          

            <label for="availabletime">Availability:</label>
            <select id="availabletime" name="houseavailable" required>
                <option value="immediate">immediate</option>
                <option value="within15days">within 15Days</option>
                <option value="within30days">within 30Days</option>
                <option value="after30days">After 30Days</option>
            </select>

            
           

            <div class="checklist-style-container">
                <label>Preferred Tennets:</label>
                 <div class="checklist-style">
                    <label for="family">Family</label>
                    <input type="checkbox" id="family" value="family" name="preferredtenates[]">
                 </div>
    
                 <div class="checklist-style">
                    <label for="company">Company</label>
                    <input type="checkbox" id="company" value="company" name="preferredtenates[]">
                 </div>

              </div>


            <label for="propertytype">Property Type:</label>
            <select id="propertytype" name="propertytype" required>
                <option value="apartment">Apartment</option>
                <option value="independenthouse">Independent House</option>
            </select>


           
            <label for="furnish">Furnishing:</label>
            <select id="furnish" name="furnish" required>
                <option value="full">Full</option>
                <option value="semi">Semi</option>
                <option value="none">None</option>
            </select>
           
            <label for="parkingStatus">Parking Type:</label>
            <select id="parkingStatus" name="parkingStatus" required>
                <option value="2wheller">2 Wheller</option>
                <option value="4wheller">4 Wheller</option>
            </select>

            <label for="metro">Metro:</label>
            <select id="metro" name="metrofh" required>
                <option value="No Metro">No Metro</option>
                <option value="1km Away">1km Away</option>
                <option value="3km Away">3km Away</option>
                <option value="5km Away">5km Away</option>
            </select>

            <label for="housepic">Upload Picture of House:</label>
            <input type="file" id="housepic" name="housepic">

            <button type="submit" class="ref">Submit</button>
         

        </div>


        
        <div class="Flate-Mates-container">

            <div class="checklist-style-container">
                <label>Room Type:</label>
                 <div class="checklist-style">
                    <label for="singleroom">Single Room</label>
                    <input type="checkbox" id="singleroom" value="singleroom" name="RoomType[]">
                 </div>

                 <div class="checklist-style">
                    <label for="doubleroom">Double Room</label>
                   <input type="checkbox" id="doubleroom" value="doubleroom" name="RoomType[]">
                   </div>
    
                   <div class="checklist-style">
                    <label for="sharedroom">Shared Room</label>
                   <input type="checkbox" id="sharedroom" value="sharedroom" name="RoomType[]">
                   </div>
    
              </div>

              <label for="Tenant For">Allowed Tenants:</label>
              <select id="Tenant For" name="TenantFor" required>
                  <option value="couples">Couples</option>
                  <option value="family">Family</option>
                  <option value="bachelor">Bachelor</option>
              </select>

            
  
              <label for="furnish">Furnishing:</label>
              <select id="furnish" name="furnish" required>
                  <option value="full">Full</option>
                  <option value="semi">Semi</option>
                  <option value="none">None</option>
              </select>
  
              <label for="propertytype">Property Type:</label>
              <select id="propertytype" name="propertytype" required>
                  <option value="apartment">Apartment</option>
                  <option value="independenthouse">Independent House</option>
              </select>
  
              <label for="showonly">Show Only:</label>
              <select id="showonly" name="showonly" required>
                  <option value="nonvegallowed">NonVegAllowed</option>
                  <option value="vegallowed">Veg Only Allowed</option>
              </select>
  
   
              <label for="floors">Floors:</label>
              <select id="floors" name="floors" required>
                  <option value="ground">Ground</option>
                  <option value="onetothree">1 to 3</option>
                  <option value="fourtosix">4 to 6</option>
                  <option value="seventonine">7 to 9</option>
              </select>
  
              <label for="parkingStatus">Parking Type:</label>
              <select id="parkingStatus" name="parkingStatus" required>
                  <option value="2wheller">2 Wheller</option>
                  <option value="4wheller">4 Wheller</option>
              </select>

              <label for="metro">Metro:</label>
            <select id="metro" name="metrofm" required>
                <option value="No Metro">No Metro</option>
                <option value="1km Away">1km Away</option>
                <option value="3km Away">3km Away</option>
                <option value="5km Away">5km Away</option>
            </select>
  
  
                 
              <label for="bathroomfacility">Bathroom Facility:</label>
              <select id="bathroomfacility" name="bathroomfacility" required>
                  <option value="oneormore">1 or More</option>
                  <option value="twoormore">2 or More</option>
                  <option value="threeormore">3 or More</option>
              </select>
  
              
            <label for="housepic">Upload Picture of House:</label>
            <input type="file" id="housepic" name="housepics">

            <button type="submit" class="ref">Submit</button>
         

        
            </div>

           
              
           


        </form>
    </div>
</body>
<script>


 // The js code for header interactive
 let menu = document.querySelector('.option-container');

let dropdown = document.querySelector('.option-main-container');
menu.addEventListener('click',function(){

    if(dropdown.style.display == 'block'){
        dropdown.style.display = 'none';
    }
    else{
        dropdown.style.display = 'block';
    }
});


// the js code for header interactive

let formaccess = document.getElementById('form-id');

  let Pgcontainer = document.querySelector('.Pg-container');

  let Fullhousecontainer = document.querySelector('.Full-House-Container');

  let FlatMate = document.querySelector('.Flate-Mates-container');

 function testing(){
    let houseoption = document.getElementById('ModeOfHouse');
    let access = houseoption.value;

    if(houseoption.value === 'PG'){
      Pgcontainer.style.display = 'block';
      Fullhousecontainer.style.display = 'none';
      FlatMate.style.display = 'none';
     formaccess.action = '../backendhouses/backendpg.php';
    }
    else if(houseoption.value === 'FullHouse'){
        Fullhousecontainer.style.display = 'block';
        Pgcontainer.style.display = 'none';
        FlatMate.style.display = 'none';
        formaccess.action = '../backendhouses/backendfullhouse.php';
    }
    else if(houseoption.value === 'FlatMates'){
        FlatMate.style.display = 'block';
        Fullhousecontainer.style.display = 'none';
        Pgcontainer.style.display = 'none';
        formaccess.action = '../backendhouses/backendflatmates.php';
    }
 }
    

    </script>
</html>