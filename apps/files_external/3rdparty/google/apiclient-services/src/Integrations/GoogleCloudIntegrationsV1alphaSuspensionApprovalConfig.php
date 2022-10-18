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

namespace Google\Service\Integrations;

class GoogleCloudIntegrationsV1alphaSuspensionApprovalConfig extends \Google\Collection
{
  protected $collection_key = 'emailAddresses';
  /**
   * @var string
   */
  public $customMessage;
  /**
   * @var string[]
   */
  public $emailAddresses;
  protected $expirationType = GoogleCloudIntegrationsV1alphaSuspensionApprovalExpiration::class;
  protected $expirationDataType = '';

  /**
   * @param string
   */
  public function setCustomMessage($customMessage)
  {
    $this->customMessage = $customMessage;
  }
  /**
   * @return string
   */
  public function getCustomMessage()
  {
    return $this->customMessage;
  }
  /**
   * @param string[]
   */
  public function setEmailAddresses($emailAddresses)
  {
    $this->emailAddresses = $emailAddresses;
  }
  /**
   * @return string[]
   */
  public function getEmailAddresses()
  {
    return $this->emailAddresses;
  }
  /**
   * @param GoogleCloudIntegrationsV1alphaSuspensionApprovalExpiration
   */
  public function setExpiration(GoogleCloudIntegrationsV1alphaSuspensionApprovalExpiration $expiration)
  {
    $this->expiration = $expiration;
  }
  /**
   * @return GoogleCloudIntegrationsV1alphaSuspensionApprovalExpiration
   */
  public function getExpiration()
  {
    return $this->expiration;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudIntegrationsV1alphaSuspensionApprovalConfig::class, 'Google_Service_Integrations_GoogleCloudIntegrationsV1alphaSuspensionApprovalConfig');
