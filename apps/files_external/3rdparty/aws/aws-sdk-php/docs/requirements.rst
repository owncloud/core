============
Requirements
============

Aside from a baseline understanding of object-oriented programming in PHP (including PHP 5.3 namespaces), there are a
few minimum system requirements to start using the AWS SDK for PHP. The extensions listed are common and are
installed with PHP 5.3 by default in most environments.

Minimum requirements
--------------------

* PHP 5.3.3+ compiled with the cURL extension
* A recent version of cURL 7.16.2+ compiled with OpenSSL and zlib

.. note::

    To work with Amazon CloudFront private distributions, you must have the OpenSSL PHP extension to sign private
    CloudFront URLs.

.. _optimal-settings:

Optimal settings
----------------

Please consult the :doc:`performance` for a list of recommendations and optimal settings that can be made to
ensure that you are using the SDK as efficiently as possible.

Compatibility test
------------------

Run the `compatibility-test.php` file in the SDK to quickly check if your system is capable of running the SDK. In
addition to meeting the minimum system requirements of the SDK, the compatibility test checks for optional settings and
makes recommendations that can help you to improve the performance of the SDK. The compatibility test can output text
for the command line or a web browser. When running in a browser, successful checks appear in green, warnings in
purple, and failures in red. When running from the CLI, the result of a check will appear on each line.

When reporting an issue with the SDK, it is often helpful to share information about your system. Supplying the output
of the compatibility test in forum posts or GitHub issues can help to streamline the process of identifying the root
cause of an issue.
