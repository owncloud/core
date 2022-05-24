<?php
/*
 * Copyright 2014 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */

namespace Google\Service\CloudSearch;

class FacetOptions extends \Google\Model
{
  /**
   * @var int
   */
  public $numFacetBuckets;
  /**
   * @var string
   */
  public $objectType;
  /**
   * @var string
   */
  public $operatorName;
  /**
   * @var string
   */
  public $sourceName;

  /**
   * @param int
   */
  public function setNumFacetBuckets($numFacetBuckets)
  {
    $this->numFacetBuckets = $numFacetBuckets;
  }
  /**
   * @return int
   */
  public function getNumFacetBuckets()
  {
    return $this->numFacetBuckets;
  }
  /**
   * @param string
   */
  public function setObjectType($objectType)
  {
    $this->objectType = $objectType;
  }
  /**
   * @return string
   */
  public function getObjectType()
  {
    return $this->objectType;
  }
  /**
   * @param string
   */
  public function setOperatorName($operatorName)
  {
    $this->operatorName = $operatorName;
  }
  /**
   * @return string
   */
  public function getOperatorName()
  {
    return $this->operatorName;
  }
  /**
   * @param string
   */
  public function setSourceName($sourceName)
  {
    $this->sourceName = $sourceName;
  }
  /**
   * @return string
   */
  public function getSourceName()
  {
    return $this->sourceName;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(FacetOptions::class, 'Google_Service_CloudSearch_FacetOptions');
