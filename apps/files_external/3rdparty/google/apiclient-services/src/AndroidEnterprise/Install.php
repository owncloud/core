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

namespace Google\Service\AndroidEnterprise;

class Install extends \Google\Model
{
  /**
   * @var string
   */
  public $installState;
  /**
   * @var string
   */
  public $productId;
  /**
   * @var int
   */
  public $versionCode;

  /**
   * @param string
   */
  public function setInstallState($installState)
  {
    $this->installState = $installState;
  }
  /**
   * @return string
   */
  public function getInstallState()
  {
    return $this->installState;
  }
  /**
   * @param string
   */
  public function setProductId($productId)
  {
    $this->productId = $productId;
  }
  /**
   * @return string
   */
  public function getProductId()
  {
    return $this->productId;
  }
  /**
   * @param int
   */
  public function setVersionCode($versionCode)
  {
    $this->versionCode = $versionCode;
  }
  /**
   * @return int
   */
  public function getVersionCode()
  {
    return $this->versionCode;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Install::class, 'Google_Service_AndroidEnterprise_Install');
