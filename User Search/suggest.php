<?php
$people = array(
  'Christopher',
  'Ryan',
  'Ethan',
  'John',
  'Zoey',
  'Sarah',
  'Michelle',
  'Samantha',
  "Martin",
  "Kert",
  "Kevin",
  "Crihs",
  "Marta",
  "Maria",
  "Edvin",
  "Maxim",
  "Ivan",
  "Linda",
  "Renar",
  "Kristjan",
  "Meeri",
  "Peter",
  "Tom",
  "Eva",
  "Ott",
  "Madis",
  "Kerli",
  "Hanna",
  "Kairi",
  "Kristin",
  "Jekaterina",
  "Kadi",
  "Daisy",
  "Annabel",
  "Eerika",
  "Renate",
  "Polina"
);

# request = so if we use POST method we can use it aswell
$q = $_REQUEST["q"];
$suggestion = "";

# Get Suggestions

if($q !== "") {
  $q = strtolower($q);
  $len = strlen($q);

  foreach ($people as $person) {
    if(stristr($q, substr($person, 0, $len))) {
      if ($suggestion === "") {
        $suggestion = $person;
      } else {
        $suggestion .= ", $person";
      }
    }
  }
}

echo $suggestion === "" ? "No Suggestions" : $suggestion;

?>