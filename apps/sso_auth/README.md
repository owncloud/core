# SSO Auth App for OwnCloud

This app integrates external centralized authentication into OwnCloud.

## Folder Structure
- `lib/Service/CentralAuthService.php` – calls SSO API
- `lib/AppInfo/Application.php` – registers service
- `appinfo/info.xml` – app metadata
- `appinfo/app.php` – bootstrap

## Usage
In `lib/private/User/Session.php`, inject and use:

```php
$centralAuth = \OC::$server->query(\OCA\SsoAuth\Service\CentralAuthService::class);
if ($centralAuth->authenticate($uid, $password)) {
    // custom login logic
}
