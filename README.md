# ipcamera-motion-jpeg-preview
Demo of how to dynamically create and display a motion jpeg video from protected camera snapshot

## Problem
A friend of mine has an IP camera and he wanted to embed a preview of the video stream into his website. However, for a certain reason I decided to go with using the camera's snapshot and make some sort of a motion jpeg video out of it. Since the camera's snapshot is basic auth protected, there were some problems with displaying the protected image on every browser without prompting users to enter a user and a password.

## Solution
The solution was done in three steps:
- PHP script that, using curl, would authenticate as well as fetch the snapshot for the users and echo the output
- HTML page that would display a the single JPEG snapshot, provided by the PHP script
- Java Script that would replace the displayed image on the html page after a timeout with the newest snapshot. Furthermore, in order for the browsers to not display a cached snapshot, the java script would also attach a timestamp as a query string parameter to the image resource.
- Use apache's mod_rewrite module, to rewrite every incomping request for `camera-snapshot.jpg` to `snapshot.php`
