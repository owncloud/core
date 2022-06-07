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

class EditInventorySourceReadWriteAccessorsRequest extends \Google\Model
{
  protected $advertisersUpdateType = EditInventorySourceReadWriteAccessorsRequestAdvertisersUpdate::class;
  protected $advertisersUpdateDataType = '';
  /**
   * @var bool
   */
  public $assignPartner;
  /**
   * @var string
   */
  public $partnerId;

  /**
   * @param EditInventorySourceReadWriteAccessorsRequestAdvertisersUpdate
   */
  public function setAdvertisersUpdate(EditInventorySourceReadWriteAccessorsRequestAdvertisersUpdate $advertisersUpdate)
  {
    $this->advertisersUpdate = $advertisersUpdate;
  }
  /**
   * @return EditInventorySourceReadWriteAccessorsRequestAdvertisersUpdate
   */
  public function getAdvertisersUpdate()
  {
    return $this->advertisersUpdate;
  }
  /**
   * @param bool
   */
  public function setAssignPartner($assignPartner)
  {
    $this->assignPartner = $assignPartner;
  }
  /**
   * @return bool
   */
  public function getAssignPartner()
  {
    return $this->assignPartner;
  }
  /**
   * @param string
   */
  public function setPartnerId($partnerId)
  {
    $this->partnerId = $partnerId;
  }
  /**
   * @return string
   */
  public function getPartnerId()
  {
    return $this->partnerId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(EditInventorySourceReadWriteAccessorsRequest::class, 'Google_Service_DisplayVideo_EditInventorySourceReadWriteAccessorsRequest');
