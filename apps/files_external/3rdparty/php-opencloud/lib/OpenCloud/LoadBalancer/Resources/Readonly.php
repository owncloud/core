<?php

namespace OpenCloud\LoadBalancer\Resources;

/**
 * This defines a read-only SubResource - one that cannot be created, updated,
 * or deleted. Many subresources are like this, and this simplifies their
 * class definitions.
 */
abstract class Readonly extends SubResource 
{
	
	/**
	 * no Create
	 */
	public function Create($params = array()) 
	{ 
		$this->NoCreate(); 
	}

	/**
	 * no Update
	 */
	public function Update($params = array()) 
	{ 
		$this->NoUpdate(); 
	}

	/**
	 * no Delete
	 */
	public function Delete() 
	{ 
		$this->NoDelete(); 
	}

}
