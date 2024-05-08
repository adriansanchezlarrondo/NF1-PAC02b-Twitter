<?php
ini_set('display_errors', 1);
require('abstract.databoundobject.php');
require('class.pdofactory.php');
require('class.twitterdata.php');
require('TwitterAPIExchange.php');

$settings = array(
    'oauth_access_token' => "",
    'oauth_access_token_secret' => "",
    'consumer_key' => "",
    'consumer_secret' => ""
);

$url = 'https://publish.twitter.com/oembed';
$getfield = '?url=https://twitter.com/Interior/status/507185938620219395';
$requestMethod = 'GET';
$twitter = new TwitterAPIExchange($settings);
$response = $twitter->setGetfield($getfield)
                   ->buildOauth($url, $requestMethod)
                   ->performRequest();

$data = json_decode($response, true);

$url = $data['url'];
$author_name = $data['author_name'];
$author_url = $data['author_url'];
$type = $data['type'];

$strDSN = "pgsql:dbname=usuaris;host=localhost;port=5432";
$objPDO = PDOFactory::GetPDO($strDSN, "postgres", "root", array());
$objPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$objTweet = new TwitterData($objPDO, 1);

$objTweet->setURL($url);
$objTweet->setAuthorName($author_name);
$objTweet->setAuthorUrl($author_url);
$objTweet->setPhoto($type);

$objTweet->save();

