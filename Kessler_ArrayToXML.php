<?php
// Matthew Kessler
// Array to XML

$characters = array( array( "name" => "Peter Parker", 
    "email" => "peterparker@mail.com", ), 
array( "name" => "Clark Kent", 
    "email" => "clarkkent@mail.com", ), 
array( "name" => "Harry Potter", 
    "email" => "harrypotter@mail.com", ) 
);

//Append new character to next spot in array
$characters[count($characters)] = array("name" => "Captain America", "email" => "captnAmerica@mail.com");
$characters[count($characters)] = array("name" => "Superman, "email" => "superMan@mail.com");

//create temp $xml string, add opening lines for xml file
$xml = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n<characters>\n";

$keys = array_keys($characters);
//Loop through elements of the $characters array, format and append them to the $xml string
for($i = 0; $i < count($characters); $i++) 
{
    $xml .= "\t"."<".$keys[$i].">\n";
    foreach($characters[$keys[$i]] as $key => $value) 
    {
        $xml .= "\t\t"."<".$key.">".$value."</".$key.">\n";
    }
    $xml .= "\t</".$keys[$i].">\n";  
}
//Closing tag
$xml .= "</characters>";
//Write contents of $xml to new xml file named characters
file_put_contents(__DIR__.'/characters.xml', $xml);


?>
