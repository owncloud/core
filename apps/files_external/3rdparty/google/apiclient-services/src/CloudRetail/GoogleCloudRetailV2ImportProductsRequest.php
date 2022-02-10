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

class GoogleCloudRetailV2ImportProductsRequest extends \Google\Model
{
  protected $errorsConfigType = GoogleCloudRetailV2ImportErrorsConfig::class;
  protected $errorsConfigDataType = '';
  protected $inputConfigType = GoogleCloudRetailV2ProductInputConfig::class;
  protected $inputConfigDataType = '';
  /**
   * @var string
   */
  public $notificationPubsubTopic;
  /**
   * @var string
   */
  public $reconciliationMode;
  /**
   * @var string
   */
  public $requestId;
  /**
   * @var string
   */
  public $updateMask;

  /**
   * @param GoogleCloudRetailV2ImportErrorsConfig
   */
  public function setErrorsConfig(GoogleCloudRetailV2ImportErrorsConfig $errorsConfig)
  {
    $this->errorsConfig = $errorsConfig;
  }
  /**
   * @return GoogleCloudRetailV2ImportErrorsConfig
   */
  public function getErrorsConfig()
  {
    return $this->errorsConfig;
  }
  /**
   * @param GoogleCloudRetailV2ProductInputConfig
   */
  public function setInputConfig(GoogleCloudRetailV2ProductInputConfig $inputConfig)
  {
    $this->inputConfig = $inputConfig;
  }
  /**
   * @return GoogleCloudRetailV2ProductInputConfig
   */
  public function getInputConfig()
  {
    return $this->inputConfig;
  }
  /**
   * @param string
   */
  public function setNotificationPubsubTopic($notificationPubsubTopic)
  {
    $this->notificationPubsubTopic = $notificationPubsubTopic;
  }
  /**
   * @return string
   */
  public function getNotificationPubsubTopic()
  {
    return $this->notificationPubsubTopic;
  }
  /**
   * @param string
   */
  public function setReconciliationMode($reconciliationMode)
  {
    $this->reconciliationMode = $reconciliationMode;
  }
  /**
   * @return string
   */
  public function getReconciliationMode()
  {
    return $this->reconciliationMode;
  }
  /**
   * @param string
   */
  public function setRequestId($requestId)
  {
    $this->requestId = $requestId;
  }
  /**
   * @return string
   */
  public function getRequestId()
  {
    return $this->requestId;
  }
  /**
   * @param string
   */
  public function setUpdateMask($updateMask)
  {
    $this->updateMask = $updateMask;
  }
  /**
   * @return string
   */
  public function getUpdateMask()
  {
    return $this->updateMask;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudRetailV2ImportProductsRequest::class, 'Google_Service_CloudRetail_GoogleCloudRetailV2ImportProductsRequest');
