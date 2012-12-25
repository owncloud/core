<?php
/**
 * Provides search functionalty.
 */
abstract class OC_Search_Provider {
	private $options;
        
        /**
         * Constructor
         * @param array $options currently unused
         */
	public function __construct($options) {
		$this->options=$options;
	}

	/**
	 * Search for $query
	 * @param string $query
	 * @return array An array of OC_Search_Result's
	 */
	abstract public function search($query);
}
