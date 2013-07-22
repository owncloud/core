Exceptions and Errors
=====================

<b>php-opencloud</b> handles errors by throwing 
[Exceptions](http://php.net/manual/en/language.exceptions.php).
The entire list of exceptions is defined in `lib/exceptions.php` and
is documented in the full API reference.

If an exception is expected, you will usually surround the call in
a standard php `try`...`catch` block. For example, if you are not sure
if a container exists, but want to proceed whether it does or not, this
code will handle the exception:

	$cloud = new OpenCloud\Rackspace(...);
	$objectstore = $cloud->ObjectStore(...);
	try {
		// this will fail if the container doesn't exist
		$container = $objectstore('ImportantContainer');
	} catch (OpenCloud\ObjectStore\ContainerNotFoundError $e) {
		// here if the container was not found
		$container->Create('ImportantContainer');
	}
	// continue on...
	$container->...

## What's next?

Return to the [Table of Contents](toc.md).