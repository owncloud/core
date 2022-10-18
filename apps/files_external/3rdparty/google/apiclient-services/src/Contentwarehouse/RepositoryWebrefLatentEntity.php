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

namespace Google\Service\Contentwarehouse;

class RepositoryWebrefLatentEntity extends \Google\Collection
{
  protected $collection_key = 'sources';
  /**
   * @var float[]
   */
  public $broaderImportance;
  /**
   * @var string
   */
  public $mid;
  /**
   * @var string[]
   */
  public $sources;

  /**
   * @param float[]
   */
  public function setBroaderImportance($broaderImportance)
  {
    $this->broaderImportance = $broaderImportance;
  }
  /**
   * @return float[]
   */
  public function getBroaderImportance()
  {
    return $this->broaderImportance;
  }
  /**
   * @param string
   */
  public function setMid($mid)
  {
    $this->mid = $mid;
  }
  /**
   * @return string
   */
  public function getMid()
  {
    return $this->mid;
  }
  /**
   * @param string[]
   */
  public function setSources($sources)
  {
    $this->sources = $sources;
  }
  /**
   * @return string[]
   */
  public function getSources()
  {
    return $this->sources;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RepositoryWebrefLatentEntity::class, 'Google_Service_Contentwarehouse_RepositoryWebrefLatentEntity');
