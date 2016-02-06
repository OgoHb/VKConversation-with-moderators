# VKConversation-with-moderators
Multi-admin in vk conversation script.

User with ids from array "moder_id" have 2* fields - 1 user id, 2 - reason. And they can kick anybody in conversation. If user with not-moder id try to login - he will get "access denied" message.  

* - 2 field only if reason_massage switch to true.

Config:

● chat_id        - Chat id. Take id from bot page!

● access_token   - Bot page access token. Take http://vk.cc/4KeIFn (copy part in address bar between "access_token=" and "&expires_in")

● client_id      - Create app here - https://vk.com/dev/ and take Application ID in settings

● client_secret  - Secure key in settings too

● redirect_uri   -  Index script page

● moder_id       - array with moderators ids

● reason_message - Switching this to "false" if you don't want use "reason message" (Default - true)

● bot_prefix     - Prefix for "reason message"
