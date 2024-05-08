<?php
require('abstract.databoundobject.php');
require('class.pdofactory.php');
require('class.twitterdata.php');

$strDSN = "pgsql:dbname=usuaris;host=localhost;port=5432";
$objPDO = PDOFactory::GetPDO($strDSN, "postgres", "root", array());
$objPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$objTweet = new TwitterData($objPDO, 1);

$url = $objTweet->getURL();
$author_name = $objTweet->getAuthorName();
$author_url = $objTweet->getAuthorUrl();
$type = $objTweet->getPhoto();

echo "<strong>URL:</strong> $url <br>";
echo "<strong>Author Name:</strong> $author_name <br>";
echo "<strong>Author URL:</strong> $author_url <br>";
echo "<strong>Type:</strong> $type <br>";