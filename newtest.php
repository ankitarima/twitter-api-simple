<?php
echo "string";
api_key = 'tg9jWcNFJaTK1gV9j5YpoOWzV ';
api_secret = '4BcOUXcV1oQnfdU6MYCKKPza7afrMHn1wxZfzgxk3C0mpyAW05';

# https://dev.twitter.com/oauth/application-only
# The base64 stuff described there is the normal Basic Auth dance.
import requests
r = requests.post('https://api.twitter.com/oauth2/token',
                  auth=(api_key, api_secret),
                  headers={'Content-Type':
                      'application/x-www-form-urlencoded;charset=UTF-8'},
                  data='grant_type=client_credentials')
assert r.json()['token_type'] == 'bearer'
bearer = r.json()['access_token']

url = 'https://api.twitter.com/1.1/search/tweets.json?q=%23yourhashtag'
r = requests.get(url, headers={'Authorization': 'Bearer ' + bearer})
print r.json()

?>


