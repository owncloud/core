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

namespace Google\Service\Dialogflow;

class GoogleCloudDialogflowV2beta1SetSuggestionFeatureConfigOperationMetadata extends \Google\Model
{
  /**
   * @var string
   */
  public $conversationProfile;
  /**
   * @var string
   */
  public $createTime;
  /**
   * @var string
   */
  public $participantRole;
  /**
   * @var string
   */
  public $suggestionFeatureType;

  /**
   * @param string
   */
  public function setConversationProfile($conversationProfile)
  {
    $this->conversationProfile = $conversationProfile;
  }
  /**
   * @return string
   */
  public function getConversationProfile()
  {
    return $this->conversationProfile;
  }
  /**
   * @param string
   */
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  /**
   * @return string
   */
  public function getCreateTime()
  {
    return $this->createTime;
  }
  /**
   * @param string
   */
  public function setParticipantRole($participantRole)
  {
    $this->participantRole = $participantRole;
  }
  /**
   * @return string
   */
  public function getParticipantRole()
  {
    return $this->participantRole;
  }
  /**
   * @param string
   */
  public function setSuggestionFeatureType($suggestionFeatureType)
  {
    $this->suggestionFeatureType = $suggestionFeatureType;
  }
  /**
   * @return string
   */
  public function getSuggestionFeatureType()
  {
    return $this->suggestionFeatureType;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDialogflowV2beta1SetSuggestionFeatureConfigOperationMetadata::class, 'Google_Service_Dialogflow_GoogleCloudDialogflowV2beta1SetSuggestionFeatureConfigOperationMetadata');
