<?php
$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"dropdown_database");
$country=$_GET["country"];
$state=$_GET["state"];

if($country!="")
{   
    
    $res=mysqli_query($link,"select * from states where country_id=$country");  
    echo "<select id='statedd' onChange='change_state()'>";
    echo "<option>"; echo "Select"; echo "</option>";
    while($row=mysqli_fetch_array($res))
    {
    echo "<option value='$row[id]' selected>"; echo $row["name"]; echo "</option>";
    }
    echo "</select>";
}
if($state!="")
{
    $res=mysqli_query($link,"select * from cities where state_id=$state");  
    echo "<select>";
    while($row=mysqli_fetch_array($res))
    {
    echo "<option value='$row[id]' selected>"; echo $row["name"]; echo "</option>";
    }
    echo "</select>";
}
?>