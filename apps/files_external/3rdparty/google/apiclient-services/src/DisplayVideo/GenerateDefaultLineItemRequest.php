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

class GenerateDefaultLineItemRequest extends \Google\Model
{
  public $displayName;
  public $insertionOrderId;
  public $lineItemType;
  protected $mobileAppType = MobileApp::class;
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
   * @param MobileApp
   */
  public function setMobileApp(MobileApp $mobileApp)
  {
    $this->mobileApp = $mobileApp;
  }
  /**
   * @return MobileApp
   */
  public function getMobileApp()
  {
    return $this->mobileApp;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GenerateDefaultLineItemRequest::class, 'Google_Service_DisplayVideo_GenerateDefaultLineItemRequest');
