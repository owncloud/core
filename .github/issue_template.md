<!--
Thanks for reporting issues back to ownCloud! This is the issue tracker of ownCloud, if you have any support question please check out https://owncloud.org/support

This is the bug tracker for the Server component. Find other components at https://github.com/owncloud/core/blob/master/.github/CONTRIBUTING.md#guidelines

For reporting potential security issues please see https://owncloud.org/security/

To make it possible for us to help you please fill out below information carefully.

Before reporting any issues please make sure that you're using the latest available version for your major branch (e.g. 9.0.x), see https://owncloud.org/changelog/
--> 
### Steps to reproduce
1.
2.
3.

### Expected behaviour
Tell us what should happen

### Actual behaviour
Tell us what happens instead

### Server configuration
**Operating system**:

**Web server:**

**Database:**

**PHP version:**

**ownCloud version:** (see ownCloud admin page)

**Updated from an older ownCloud or fresh install:**

**Where did you install ownCloud from:**

**Signing status (ownCloud 9.0 and above):**

```
Login as admin user into your ownCloud and access 
http://example.com/index.php/settings/integrity/failed 
paste the results into https://gist.github.com/ and puth the link here.
```


**The content of config/config.php:**
make sure to remove *all* host names, passwords, usernames, salts and other credentials before posting.

```
Log in to the web-UI with an administrator account and click on
'admin' -> 'Generate Config Report' -> 'Download ownCloud config report'
This report includes the config.php settings, the list of activated apps
and other details in a well sanitized form.

or 

If you have access to your command line run e.g.:
sudo -u www-data php occ config:list system
from within your ownCloud installation folder

*ATTENTION:* Do not post your config.php file in public as is. Please use one of the above
methods whenever possible. Both, the generated reports from the web-ui and from occ config:list
consistently remove sensitive data. You still may want to review the report before sending.
If done manually then it is critical for your own privacy to dilligently
remove *all* host names, passwords, usernames, salts and other credentials before posting.
You should assume that attackers find such information and will use them against your systems.
```

**List of activated apps:**

```
If you have access to your command line run e.g.:
sudo -u www-data php occ app:list
from within your ownCloud installation folder.
```

**Are you using external storage, if yes which one:** local/smb/sftp/...

**Are you using encryption:** yes/no

**Are you using an external user-backend, if yes which one:** LDAP/ActiveDirectory/Webdav/...

#### LDAP configuration (delete this part if not used)

```
With access to your command line run e.g.:
sudo -u www-data php occ ldap:show-config
from within your ownCloud installation folder

Without access to your command line download the data/owncloud.db to your local
computer or access your SQL server remotely and run the select query:
SELECT * FROM `oc_appconfig` WHERE `appid` = 'user_ldap';


Eventually replace sensitive data as the name/IP-address of your LDAP server or groups.
```

### Client configuration
**Browser:**

**Operating system:**

### Logs
#### Web server error log
```
Insert your webserver log here
```

#### ownCloud log (data/owncloud.log)
```
Insert your ownCloud log here
```

#### Browser log
```
Insert your browser log here, this could for example include:

a) The javascript console log
b) The network log 
c) ...
```
