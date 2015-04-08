# Contributing to the AWS SDK for PHP

We work hard to provide a high-quality and useful SDK, and we greatly value feedback and contributions from our
community. Whether it's a new feature, correction, or additional documentation, we welcome your pull requests.
Please submit any [issues][] or [pull requests][pull-requests] through GitHub.

## What you should keep in mind

1. The SDK is released under the [Apache license][license]. Any code you submit will be released under that license. For
   substantial contributions, we may ask you to sign a [Contributor License Agreement (CLA)][cla].
2. We follow the [PSR-0][], [PSR-1][], and [PSR-2][] recommendations from the [PHP Framework Interop Group][php-fig].
   Please submit code that follows these standards. The [PHP CS Fixer][cs-fixer] tool can be helpful for formatting your
   code.
3. We maintain a high percentage of code coverage in our unit tests. If you make changes to the code, please add,
   update, and/or remove unit (and integration) tests as appropriate.
4. We may choose not to accept pull requests that change service descriptions (e.g., files like
   `src/Aws/OpsWorks/Resources/opsworks-2013-02-18.php`). We generate these files based on our internal knowledge of
   the AWS services. If there is something incorrect with or missing from a service description, it may be more
   appropriate to [submit an issue][issues]. We *will*, however, consider pull requests affecting service descriptions,
   if the changes are related to **Iterator** or **Waiter** configurations (e.g. [PR #84][pr-84]).
5. If your code does not conform to the PSR standards or does not include adequate tests, we may ask you to update your
   pull requests before we accept them. We also reserve the right to deny any pull requests that do not align with our
   standards or goals.
6. If you would like to implement support for a significant feature that is not yet available in the SDK, please talk to
   us beforehand to avoid any duplication of effort.

## What we are looking for

We are open to anything that improves the SDK and doesn't unnecessarily cause backwards-incompatible changes. If you are
unsure if your idea is something we would be open to, please ask us (open a ticket, send us an email, post on the
forums, etc.) Specifically, here are a few things that we would appreciate help on:

1. **Waiters** – Waiter configurations are located in the service descriptions. You can also create concrete waiters
   within the `Aws\*\Waiter` namespace of a service if the logic of the waiter absolutely cannot be defined using waiter
   configuration. There are many waiters that we currently provide, but many that we do not. Please let us know if you
   have any questions about creating waiter configurations.
2. **Docs** – Our [User Guide][user-guide] is an ongoing project, and we would greatly appreciate contributions. The
   docs are written as a [Sphinx][] website using [reStructuredText][] (very similar to Markdown). The User Guide is
   located in the `docs` directory of this repository. Please see the [User Guide README][docs-readme] for more
   information about how to build the User Guide.
3. **Tests** – We maintain high code coverage, but if there are any tests you feel are missing, please add them.
4. **Convenience features** – Are there any features you feel would add value to the SDK (e.g., batching for SES, SNS
   message verification, S3 stream wrapper, etc.)? Contributions in this area would be greatly appreciated.
5. **Third-party modules** – We have modules published for [Silex](mod-silex), [Laravel 4](mod-laravel), and [Zend
   Framework 2][mod-zf2]. Please let us know if you are interested in creating integrations with other frameworks. We
   would be happy to help.
6. If you have some other ideas, please let us know!

## Running the unit tests

The AWS SDK for PHP is unit tested using PHPUnit. You can run the unit tests of the SDK after copying
phpunit.xml.dist to phpunit.xml:

    cp phpunit.xml.dist phpunit.xml

Next, you need to install the dependencies of the SDK using Composer:

    composer.phar install

Now you're ready to run the unit tests using PHPUnit:

    vendor/bin/phpunit

[issues]: https://github.com/aws/aws-sdk-php/issues
[pull-requests]: https://github.com/aws/aws-sdk-php/pulls
[license]: http://aws.amazon.com/apache2.0/
[cla]: http://en.wikipedia.org/wiki/Contributor_License_Agreement
[psr-0]: https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-0.md
[psr-1]: https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-1-basic-coding-standard.md
[psr-2]: https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-2-coding-style-guide.md
[php-fig]: http://php-fig.org
[cs-fixer]: http://cs.sensiolabs.org/
[user-guide]: http://docs.aws.amazon.com/aws-sdk-php/guide/latest/index.html
[sphinx]: http://sphinx-doc.org/
[restructuredtext]: http://sphinx-doc.org/rest.html
[docs-readme]: https://github.com/aws/aws-sdk-php/blob/master/docs/README.md
[mod-silex]: https://github.com/aws/aws-sdk-php-silex
[mod-laravel]: https://github.com/aws/aws-sdk-php-laravel
[mod-zf2]: https://github.com/aws/aws-sdk-php-zf2
[pr-84]: https://github.com/aws/aws-sdk-php/pull/84
