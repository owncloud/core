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

class GoogleCloudDialogflowV2beta1IntentFollowupIntentInfo extends \Google\Model
{
  /**
   * @var string
   */
  public $followupIntentName;
  /**
   * @var string
   */
  public $parentFollowupIntentName;

  /**
   * @param string
   */
  public function setFollowupIntentName($followupIntentName)
  {
    $this->followupIntentName = $followupIntentName;
  }
  /**
   * @return string
   */
  public function getFollowupIntentName()
  {
    return $this->followupIntentName;
  }
  /**
   * @param string
   */
  public function setParentFollowupIntentName($parentFollowupIntentName)
  {
    $this->parentFollowupIntentName = $parentFollowupIntentName;
  }
  /**
   * @return string
   */
  public function getParentFollowupIntentName()
  {
    return $this->parentFollowupIntentName;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDialogflowV2beta1IntentFollowupIntentInfo::class, 'Google_Service_Dialogflow_GoogleCloudDialogflowV2beta1IntentFollowupIntentInfo');
