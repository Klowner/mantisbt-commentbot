mantisbt-commentbot
===================

Automated comment posting plugin for [MantisBT](https://www.mantisbt.org/)


Installation
------------
Copy the contents of the archive into mantis/plugins/CommentBot
From within Mantis's web interface, go to Manage > Manage Plugins
CommentBot should be listed under Available Plugins, click the "Install" action.


Configuration
-------------
CommentBot expects you to have a Mantis user account use for posting comments. In my case, I created
a Mantis user named "git". No special access rights are required for this user since CommentBot bypasses
Mantis's main permission controls, this isn't a huge deal since CommentBot is only capable of posting comments.

 1. (Optional) Create Mantis user to be used for posting comments via CommentBot
 2. Go to the CommentBot configuration section in Mantis's Manage Plugins page
 3. Enter the username created in step 1, this will be the user that CommentBot posts under
 4. Enter a custom secret key, or leave blank and a random one will be generated for you
 5. Call the URL specified in the Access URL field from whatever script you'd like to post a comment.
    The Access URL expects the following three arguments...

 * ```secret_key``` This must match the secret key that CommentBot is configured to use.

 * ```bug_id``` The Mantis bug id that the comment will be posted to.

 * ```message``` URLEncoded message to use as the comment body.


## Example Script

```bash
#!/bin/bash

URL=http://supersite.com/mantis/plugin.php?CommentBot/post
TICKET_ID=000042
SECRET_KEY=veryverysecretkey
MESSAGE="Mark provided fix for this ticket in commit 4bf9a771a5"
MESSAGE="$(perl -MURI::Escape -e 'print uri_escape($ARGV[0]);' "$MESSAGE")"

curl $URL -dbug_id=$TICKET_ID -dsecret_key=$SECRET_KEY -dmessage=$MESSAGE
````
