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

namespace Google\Service\CloudRetail;

class GoogleCloudRetailV2alphaPurgeProductsResponse extends \Google\Collection
{
  protected $collection_key = 'purgeSample';
  /**
   * @var string
   */
  public $purgeCount;
  /**
   * @var string[]
   */
  public $purgeSample;

  /**
   * @param string
   */
  public function setPurgeCount($purgeCount)
  {
    $this->purgeCount = $purgeCount;
  }
  /**
   * @return string
   */
  public function getPurgeCount()
  {
    return $this->purgeCount;
  }
  /**
   * @param string[]
   */
  public function setPurgeSample($purgeSample)
  {
    $this->purgeSample = $purgeSample;
  }
  /**
   * @return string[]
   */
  public function getPurgeSample()
  {
    return $this->purgeSample;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudRetailV2alphaPurgeProductsResponse::class, 'Google_Service_CloudRetail_GoogleCloudRetailV2alphaPurgeProductsResponse');
