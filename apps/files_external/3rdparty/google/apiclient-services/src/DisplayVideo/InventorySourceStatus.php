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

namespace Google\Service\DisplayVideo;

class InventorySourceStatus extends \Google\Model
{
  /**
   * @var string
   */
  public $configStatus;
  /**
   * @var string
   */
  public $entityPauseReason;
  /**
   * @var string
   */
  public $entityStatus;
  /**
   * @var string
   */
  public $sellerPauseReason;
  /**
   * @var string
   */
  public $sellerStatus;

  /**
   * @param string
   */
  public function setConfigStatus($configStatus)
  {
    $this->configStatus = $configStatus;
  }
  /**
   * @return string
   */
  public function getConfigStatus()
  {
    return $this->configStatus;
  }
  /**
   * @param string
   */
  public function setEntityPauseReason($entityPauseReason)
  {
    $this->entityPauseReason = $entityPauseReason;
  }
  /**
   * @return string
   */
  public function getEntityPauseReason()
  {
    return $this->entityPauseReason;
  }
  /**
   * @param string
   */
  public function setEntityStatus($entityStatus)
  {
    $this->entityStatus = $entityStatus;
  }
  /**
   * @return string
   */
  public function getEntityStatus()
  {
    return $this->entityStatus;
  }
  /**
   * @param string
   */
  public function setSellerPauseReason($sellerPauseReason)
  {
    $this->sellerPauseReason = $sellerPauseReason;
  }
  /**
   * @return string
   */
  public function getSellerPauseReason()
  {
    return $this->sellerPauseReason;
  }
  /**
   * @param string
   */
  public function setSellerStatus($sellerStatus)
  {
    $this->sellerStatus = $sellerStatus;
  }
  /**
   * @return string
   */
  public function getSellerStatus()
  {
    return $this->sellerStatus;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(InventorySourceStatus::class, 'Google_Service_DisplayVideo_InventorySourceStatus');
