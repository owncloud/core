<?php

use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;

require __DIR__ . '/../../../../lib/composer/autoload.php';


/**
 * Features context.
 */
class FeatureContext implements Context, SnippetAcceptingContext {
	use WebDav;
}
