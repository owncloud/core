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

namespace Google\Service\Contactcenterinsights;

class GoogleCloudContactcenterinsightsV1ConversationParticipant extends \Google\Model
{
  /**
   * @var string
   */
  public $dialogflowParticipant;
  /**
   * @var string
   */
  public $dialogflowParticipantName;
  /**
   * @var string
   */
  public $obfuscatedExternalUserId;
  /**
   * @var string
   */
  public $role;
  /**
   * @var string
   */
  public $userId;

  /**
   * @param string
   */
  public function setDialogflowParticipant($dialogflowParticipant)
  {
    $this->dialogflowParticipant = $dialogflowParticipant;
  }
  /**
   * @return string
   */
  public function getDialogflowParticipant()
  {
    return $this->dialogflowParticipant;
  }
  /**
   * @param string
   */
  public function setDialogflowParticipantName($dialogflowParticipantName)
  {
    $this->dialogflowParticipantName = $dialogflowParticipantName;
  }
  /**
   * @return string
   */
  public function getDialogflowParticipantName()
  {
    return $this->dialogflowParticipantName;
  }
  /**
   * @param string
   */
  public function setObfuscatedExternalUserId($obfuscatedExternalUserId)
  {
    $this->obfuscatedExternalUserId = $obfuscatedExternalUserId;
  }
  /**
   * @return string
   */
  public function getObfuscatedExternalUserId()
  {
    return $this->obfuscatedExternalUserId;
  }
  /**
   * @param string
   */
  public function setRole($role)
  {
    $this->role = $role;
  }
  /**
   * @return string
   */
  public function getRole()
  {
    return $this->role;
  }
  /**
   * @param string
   */
  public function setUserId($userId)
  {
    $this->userId = $userId;
  }
  /**
   * @return string
   */
  public function getUserId()
  {
    return $this->userId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudContactcenterinsightsV1ConversationParticipant::class, 'Google_Service_Contactcenterinsights_GoogleCloudContactcenterinsightsV1ConversationParticipant');
