# ownCloud Demo 

ownCloud is a flexible, open source file sync and share solution. This
demo shows how easily it can be pushed to Stackato. 

 * Project homepage: http://owncloud.org/ 
 * The company behind ownCloud: https://owncloud.com/
 * License: AGPLv3

# Configuration

You may wish to change the admin account login and password which is set
in the 'config/autoconfig.php' file, also sets the Stackato database
service credentials the specifies the data directory (linked to the
filesystem service - see 'stackato.yml').

## Deploying to Stackato

    stackato push -n

**Note**: The initial admin login is the same as your Stackato user
(email address). The default password is 'changeme'.
