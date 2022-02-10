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

class GoogleCloudRetailV2ProductLevelConfig extends \Google\Model
{
  /**
   * @var string
   */
  public $ingestionProductType;
  /**
   * @var string
   */
  public $merchantCenterProductIdField;

  /**
   * @param string
   */
  public function setIngestionProductType($ingestionProductType)
  {
    $this->ingestionProductType = $ingestionProductType;
  }
  /**
   * @return string
   */
  public function getIngestionProductType()
  {
    return $this->ingestionProductType;
  }
  /**
   * @param string
   */
  public function setMerchantCenterProductIdField($merchantCenterProductIdField)
  {
    $this->merchantCenterProductIdField = $merchantCenterProductIdField;
  }
  /**
   * @return string
   */
  public function getMerchantCenterProductIdField()
  {
    return $this->merchantCenterProductIdField;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudRetailV2ProductLevelConfig::class, 'Google_Service_CloudRetail_GoogleCloudRetailV2ProductLevelConfig');
