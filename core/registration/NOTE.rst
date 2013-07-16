Imitate the way lostpassword is implemented, many codes can be reused.

Flow
====

Plan A
------
1. User clicks *Register*
2. User enters email
   a. Use JS to check user email domain (email domain configured in admin settings). 
   Notify when email domain does not match the configured domain. Possible messages:
   *We currently only allow the following email domains: @nctu.edu.tw* /
   *We currently only allow email domains that match the following pattern* <- not user friendly
   *We currently only allow email domains from educational institutions* <- custom message
   b. If JS check OK, allow user to submit
3. Check if Email has been used, check domain again
4. Admin approves the request, generate verification URL, save corresponding URL and Email address in database, set URL expire time
5. Email with verification URL is sent, user clicks the link.
6. Show registration form and policy, user needs to click agree
   a. username
   b. password
7. Really create account

Plan B
------
1. User clicks *Register*
2. User enters email
3. Check if Email has been used, check domain
4. Admin approves the request, generate verification URL, save corresponding URL and Email address in database, set URL expire time
5. Email with verification URL is sent, user clicks the link.
6. Show registration form and policy, user needs to click agree
   a. username
   b. password
7. Really create account


Admin
=====

Settings
--------
1. Accepted Email domain - regex or simple multiple domains?
2. Open status: automatically impose actions upon each request
   a. Allow all
   b. deny all
   c. ignore all
3. registration policy
4. default new user group

Pages
-----
Pending registration list. Admins can allow / deny / ignore a request.
1. allow: ownCloud sends email with verification URL
2. deny: sends email telling user that the request has been denied.
3. ignore: delete the request without sending anything

- Multiple selections

Problems
========
**When set to deny all, just not show registration link?**

1. Email domain use regex?
2. URL expire time -> PostgreSQL ?
3. how are translation strings handled?
4. Check free space before?

Implementation Notes
====================
1. set URL expire time -> https://dev.mysql.com/doc/refman/5.5/en/events-overview.html -> needs to support PostgreSQL ?
