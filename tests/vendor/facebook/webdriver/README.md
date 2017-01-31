php-webdriver -- WebDriver bindings for PHP
===========================================

##  DESCRIPTION

This WebDriver client aims to be as close as possible to bindings in other languages. The concepts are very similar to the Java, .NET, Python and Ruby bindings for WebDriver.

Looking for documentation about php-webdriver? See http://facebook.github.io/php-webdriver/

The PHP client was rewritten from scratch. Using the old version? Check out Adam Goucher's fork of it at https://github.com/Element-34/php-webdriver

Any complaint, question, idea? You can post it on the user group https://www.facebook.com/groups/phpwebdriver/.

##  GETTING THE CODE

### Github
    git clone git@github.com:facebook/php-webdriver.git

### Packagist
Add the dependency. https://packagist.org/packages/facebook/webdriver

    {
      "require": {
        "facebook/webdriver": "dev-master"
      }
    }
    
Download the composer.phar

    curl -sS https://getcomposer.org/installer | php

Install the library.

    php composer.phar install
        
   

##  GETTING STARTED

*   All you need as the server for this client is the selenium-server-standalone-#.jar file provided here: http://selenium-release.storage.googleapis.com/index.html

*   Download and run that file, replacing # with the current server version.

        java -jar selenium-server-standalone-#.jar

*   Then when you create a session, be sure to pass the url to where your server is running.

        // This would be the url of the host running the server-standalone.jar
        $host = 'http://localhost:4444/wd/hub'; // this is the default

*   Launch Firefox

        $driver = RemoteWebDriver::create($host, DesiredCapabilities::firefox());
        
*   Launch Chrome

        $driver = RemoteWebDriver::create($host, DesiredCapabilities::chrome());

*   You can also customize the desired capabilities. 

        $desired_capabilities = DesiredCapabilities::firefox();
        $desired_capabilities->setJavascriptEnabled(false);
        RemoteWebDriver::create($host, $desired_capabilities);

*   See https://code.google.com/p/selenium/wiki/DesiredCapabilities for more details.

## RUN UNIT TESTS

To run unit tests simply run:

    ./vendor/bin/phpunit -c ./tests

Note: For the functional test suite, a running selenium server is required.

## MORE INFORMATION

Check out the Selenium docs and wiki at http://docs.seleniumhq.org/docs/ and https://code.google.com/p/selenium/wiki

Learn how to integrate it with PHPUnit [Blogpost](http://codeception.com/11-12-2013/working-with-phpunit-and-selenium-webdriver.html) | [Demo Project](https://github.com/DavertMik/php-webdriver-demo)

## SUPPORT

We have a great community willing to try and help you!

Currently we offer support in two manners:

### Via our Facebook Group

If you have questions or are an active contributor consider joining our facebook group and contributing to the communal discussion and support

https://www.facebook.com/groups/phpwebdriver/

### Via Github

If you're reading this you've already found our Github repository. If you have a question, feel free to submit it as an issue and our staff will do their best to help you as soon as possible.

## CONTRIBUTING

We love to have your help to make php-webdriver better. Feel free to 

*   open an [issue](https://github.com/facebook/php-webdriver/issues) if you run into any problem. 
*   fork the project and submit [pull request](https://github.com/facebook/php-webdriver/pulls). Before the pull requests can be accepted, a [Contributors Licensing Agreement](http://developers.facebook.com/opensource/cla) must be signed. 

When you are going to contribute, please keep in mind that this webdriver client aims to be as close as possible to other languages Java/Ruby/Python/C#.
FYI, here is the overview of [the official Java API](http://selenium.googlecode.com/svn/trunk/docs/api/java/index.html?overview-summary.html)
