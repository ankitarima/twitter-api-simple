<?php

require_once('twitteroauth.php');
require_once('OAuth.php');
require_once('TwitterAPIExchange.php');

/** Set access tokens here - see: https://dev.twitter.com/apps/ **/
$settings = array(
    'oauth_access_token' => "4319847375-L1cfmW1dcFaJSMPhI0zz2koob0lBKeXL1TZlg9z",
    'oauth_access_token_secret' => "o7XY89XBTHWQrSQmgjT2fB2EImyHwh966cSVUk6ZEyJ6S",
    'consumer_key' => "tg9jWcNFJaTK1gV9j5YpoOWzV",
    'consumer_secret' => "4BcOUXcV1oQnfdU6MYCKKPza7afrMHn1wxZfzgxk3C0mpyAW05"
); 

// get the url from twitter development
$url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
$search = 'https://api.twitter.com/1.1/search/tweets.json';
$trend = 'https://api.twitter.com/1.1/trends/place.json';
$terndinglocation = 'https://api.twitter.com/1.1/trends/available.json';

// explain the purpose of get and post
$requestMethod = 'GET';

$username = 'ArvindKejriwal';
$tag = 'instamood';
$search1 = '?q=#metoo';

//set getfield 
$getfield = '?screen_name='.$username.'&count=2';

$getsearch = '?hashtags='.$tag.'&count=2';
$getsf = '?q=#metoo&count=2';

$gettrend ='?id=2282863&count=1';



$twitter = new TwitterAPIExchange($settings);
$twitter->buildOauth($url, $requestMethod)
        ->performRequest();


//COMPLICATED COMPLEX RESPONSE
$twitter = new TwitterAPIExchange($settings);
$response1 = $twitter->setGetfield($getfield)
             ->buildOauth($url, $requestMethod)
             ->performRequest();

echo "$response1";

$twitter = new TwitterAPIExchange($settings);
$twitter->buildOauth($url, $requestMethod)
        ->performRequest();


//COMPLICATED COMPLEX RESPONSE
$twitter = new TwitterAPIExchange($settings);
$response2 = $twitter->setGetfield($getsf)
             ->buildOauth($search, $requestMethod)
             ->performRequest();

//echo "$response2";

//COMPLICATED COMPLEX RESPONSE
$twitter = new TwitterAPIExchange($settings);
$response3 = $twitter->setGetfield($gettrend)
             ->buildOauth($trend, $requestMethod)
             ->performRequest();

//echo "$response3";

             //COMPLICATED COMPLEX RESPONSE
$twitter = new TwitterAPIExchange($settings);
$response4 = $twitter
             ->buildOauth($terndinglocation, $requestMethod)
             ->performRequest();

//echo "$response4";



//SIMPLIFIED RESPONSE
//explian json_decode

$string2 = json_decode($twitter->setGetfield($getfield)
             ->buildOauth($url, $requestMethod)
             ->performRequest(),$assoc = TRUE);

// foreach($string2 as $items)
//     {
// 		//explian objects 
// 		//get name of objects from twitter documentation OR from the complex response

//     	$propicurl=$items['user']['profile_image_url'];
//     	echo '<img src='.$propicurl.'></img>';
//         echo "Time and Date of Tweet: ".$items['created_at']."<br />";
//         echo "Tweet: ". $items['text']."<br />";
//         echo "Tweeted by: ". $items['user']['name']."<br />";
//         echo "Screen name: ". $items['user']['screen_name']."<br />";
//         echo "Followers: ". $items['user']['followers_count']."<br />";
//         echo "Friends: ". $items['user']['friends_count']."<br />";
//         echo "Listed: ". $items['user']['listed_count']."<br />";
//         echo "profile image url:". $items['user']['profile_image_url']."<br />";
//         echo "url: ". $items['id_str']."<br />;
//         <hr>";
//     }




?>