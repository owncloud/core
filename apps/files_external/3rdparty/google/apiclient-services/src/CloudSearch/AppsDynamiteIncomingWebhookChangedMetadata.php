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

namespace Google\Service\CloudSearch;

class AppsDynamiteIncomingWebhookChangedMetadata extends \Google\Model
{
  /**
   * @var string
   */
  public $incomingWebhookName;
  protected $initiatorIdType = AppsDynamiteUserId::class;
  protected $initiatorIdDataType = '';
  protected $initiatorProfileType = AppsDynamiteFrontendUser::class;
  protected $initiatorProfileDataType = '';
  /**
   * @var string
   */
  public $obfuscatedIncomingWebhookId;
  /**
   * @var string
   */
  public $oldIncomingWebhookName;
  /**
   * @var string
   */
  public $type;

  /**
   * @param string
   */
  public function setIncomingWebhookName($incomingWebhookName)
  {
    $this->incomingWebhookName = $incomingWebhookName;
  }
  /**
   * @return string
   */
  public function getIncomingWebhookName()
  {
    return $this->incomingWebhookName;
  }
  /**
   * @param AppsDynamiteUserId
   */
  public function setInitiatorId(AppsDynamiteUserId $initiatorId)
  {
    $this->initiatorId = $initiatorId;
  }
  /**
   * @return AppsDynamiteUserId
   */
  public function getInitiatorId()
  {
    return $this->initiatorId;
  }
  /**
   * @param AppsDynamiteFrontendUser
   */
  public function setInitiatorProfile(AppsDynamiteFrontendUser $initiatorProfile)
  {
    $this->initiatorProfile = $initiatorProfile;
  }
  /**
   * @return AppsDynamiteFrontendUser
   */
  public function getInitiatorProfile()
  {
    return $this->initiatorProfile;
  }
  /**
   * @param string
   */
  public function setObfuscatedIncomingWebhookId($obfuscatedIncomingWebhookId)
  {
    $this->obfuscatedIncomingWebhookId = $obfuscatedIncomingWebhookId;
  }
  /**
   * @return string
   */
  public function getObfuscatedIncomingWebhookId()
  {
    return $this->obfuscatedIncomingWebhookId;
  }
  /**
   * @param string
   */
  public function setOldIncomingWebhookName($oldIncomingWebhookName)
  {
    $this->oldIncomingWebhookName = $oldIncomingWebhookName;
  }
  /**
   * @return string
   */
  public function getOldIncomingWebhookName()
  {
    return $this->oldIncomingWebhookName;
  }
  /**
   * @param string
   */
  public function setType($type)
  {
    $this->type = $type;
  }
  /**
   * @return string
   */
  public function getType()
  {
    return $this->type;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AppsDynamiteIncomingWebhookChangedMetadata::class, 'Google_Service_CloudSearch_AppsDynamiteIncomingWebhookChangedMetadata');
