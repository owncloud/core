<?php

/**
 * Provides a template for search functionality throughout ownCloud; 
 */
abstract class OC_Search_Provider {

    /**
     * List of options (currently unused)
     * @var array
     */
    private $options;

    /**
     * Constructor
     * @param array $options
     */
    public function __construct($options) {
        $this->options = $options;
    }

    /**
     * Search for $query
     * @param string $query
     * @return array An array of OC_Search_Result's
     */
    abstract public function search($query);
}
