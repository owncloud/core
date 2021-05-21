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

class Google_Service_DisplayVideo_GenerateDefaultLineItemRequest extends Google_Model
{
  public $displayName;
  public $insertionOrderId;
  public $lineItemType;
  protected $mobileAppType = 'Google_Service_DisplayVideo_MobileApp';
  protected $mobileAppDataType = '';

  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
  }
  public function setInsertionOrderId($insertionOrderId)
  {
    $this->insertionOrderId = $insertionOrderId;
  }
  public function getInsertionOrderId()
  {
    return $this->insertionOrderId;
  }
  public function setLineItemType($lineItemType)
  {
    $this->lineItemType = $lineItemType;
  }
  public function getLineItemType()
  {
    return $this->lineItemType;
  }
  /**
   * @param Google_Service_DisplayVideo_MobileApp
   */
  public function setMobileApp(Google_Service_DisplayVideo_MobileApp $mobileApp)
  {
    $this->mobileApp = $mobileApp;
  }
  /**
   * @return Google_Service_DisplayVideo_MobileApp
   */
  public function getMobileApp()
  {
    return $this->mobileApp;
  }
}
