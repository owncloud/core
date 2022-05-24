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

namespace Google\Service\ShoppingContent;

class LiasettingsCustomBatchRequestEntry extends \Google\Model
{
  /**
   * @var string
   */
  public $accountId;
  /**
   * @var string
   */
  public $batchId;
  /**
   * @var string
   */
  public $contactEmail;
  /**
   * @var string
   */
  public $contactName;
  /**
   * @var string
   */
  public $country;
  /**
   * @var string
   */
  public $gmbEmail;
  protected $liaSettingsType = LiaSettings::class;
  protected $liaSettingsDataType = '';
  /**
   * @var string
   */
  public $merchantId;
  /**
   * @var string
   */
  public $method;
  /**
   * @var string
   */
  public $posDataProviderId;
  /**
   * @var string
   */
  public $posExternalAccountId;

  /**
   * @param string
   */
  public function setAccountId($accountId)
  {
    $this->accountId = $accountId;
  }
  /**
   * @return string
   */
  public function getAccountId()
  {
    return $this->accountId;
  }
  /**
   * @param string
   */
  public function setBatchId($batchId)
  {
    $this->batchId = $batchId;
  }
  /**
   * @return string
   */
  public function getBatchId()
  {
    return $this->batchId;
  }
  /**
   * @param string
   */
  public function setContactEmail($contactEmail)
  {
    $this->contactEmail = $contactEmail;
  }
  /**
   * @return string
   */
  public function getContactEmail()
  {
    return $this->contactEmail;
  }
  /**
   * @param string
   */
  public function setContactName($contactName)
  {
    $this->contactName = $contactName;
  }
  /**
   * @return string
   */
  public function getContactName()
  {
    return $this->contactName;
  }
  /**
   * @param string
   */
  public function setCountry($country)
  {
    $this->country = $country;
  }
  /**
   * @return string
   */
  public function getCountry()
  {
    return $this->country;
  }
  /**
   * @param string
   */
  public function setGmbEmail($gmbEmail)
  {
    $this->gmbEmail = $gmbEmail;
  }
  /**
   * @return string
   */
  public function getGmbEmail()
  {
    return $this->gmbEmail;
  }
  /**
   * @param LiaSettings
   */
  public function setLiaSettings(LiaSettings $liaSettings)
  {
    $this->liaSettings = $liaSettings;
  }
  /**
   * @return LiaSettings
   */
  public function getLiaSettings()
  {
    return $this->liaSettings;
  }
  /**
   * @param string
   */
  public function setMerchantId($merchantId)
  {
    $this->merchantId = $merchantId;
  }
  /**
   * @return string
   */
  public function getMerchantId()
  {
    return $this->merchantId;
  }
  /**
   * @param string
   */
  public function setMethod($method)
  {
    $this->method = $method;
  }
  /**
   * @return string
   */
  public function getMethod()
  {
    return $this->method;
  }
  /**
   * @param string
   */
  public function setPosDataProviderId($posDataProviderId)
  {
    $this->posDataProviderId = $posDataProviderId;
  }
  /**
   * @return string
   */
  public function getPosDataProviderId()
  {
    return $this->posDataProviderId;
  }
  /**
   * @param string
   */
  public function setPosExternalAccountId($posExternalAccountId)
  {
    $this->posExternalAccountId = $posExternalAccountId;
  }
  /**
   * @return string
   */
  public function getPosExternalAccountId()
  {
    return $this->posExternalAccountId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(LiasettingsCustomBatchRequestEntry::class, 'Google_Service_ShoppingContent_LiasettingsCustomBatchRequestEntry');
