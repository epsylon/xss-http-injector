XSS HTTP Inject0r is a proof of concept tool that shows how XSS (Cross Site Scripting) flags can be exploited easily.

It is written in HTML + Javascript + PHP and released under GPLv3.

-------------------------------------

To deploy it:

  - run a webserver (ex: apache)
  - place tool's folder to be accesible via web browser (ex: /var/www/)
  - check permissions (ex: chown -R www-data:www-data /var/www/xss-http-injector/)
  - visit it (ex: http://127.0.0.1/xss-http-injector/)

-------------------------------------

PoC (proof of concept):

There are different 'sandboxes' ready to try your XSS injections, locally. 

Enter this info to see how some flags can be exploited:

Method: GET
Target URL: sandbox/search.php
Vulnerability: search_text
Vector: ">

Method: POST
Target URL: sandbox/search.php
Vulnerability: search_text
Vector: ">

-------------------------------------

Hooker:

This feature creates automatically a malicious code that can be sent to targets like a non-suspicious URL (ex: Index.html) to 'hook' them. 

If someone click on it, will execute your exploit code. This is nice for cookie grabbing, history stealing, etc..

Use sandboxes to test your hooks locally.

Happy Cross Hacking!  
