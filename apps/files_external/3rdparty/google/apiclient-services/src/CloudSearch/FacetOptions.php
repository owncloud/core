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
  public $numFacetBuckets;
  public $objectType;
  public $operatorName;
  public $sourceName;

  public function setNumFacetBuckets($numFacetBuckets)
  {
    $this->numFacetBuckets = $numFacetBuckets;
  }
  public function getNumFacetBuckets()
  {
    return $this->numFacetBuckets;
  }
  public function setObjectType($objectType)
  {
    $this->objectType = $objectType;
  }
  public function getObjectType()
  {
    return $this->objectType;
  }
  public function setOperatorName($operatorName)
  {
    $this->operatorName = $operatorName;
  }
  public function getOperatorName()
  {
    return $this->operatorName;
  }
  public function setSourceName($sourceName)
  {
    $this->sourceName = $sourceName;
  }
  public function getSourceName()
  {
    return $this->sourceName;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(FacetOptions::class, 'Google_Service_CloudSearch_FacetOptions');
