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

class GoogleCloudDialogflowV2beta1IntentMessageRbmSuggestedAction extends \Google\Model
{
  protected $dialType = GoogleCloudDialogflowV2beta1IntentMessageRbmSuggestedActionRbmSuggestedActionDial::class;
  protected $dialDataType = '';
  protected $openUrlType = GoogleCloudDialogflowV2beta1IntentMessageRbmSuggestedActionRbmSuggestedActionOpenUri::class;
  protected $openUrlDataType = '';
  /**
   * @var string
   */
  public $postbackData;
  protected $shareLocationType = GoogleCloudDialogflowV2beta1IntentMessageRbmSuggestedActionRbmSuggestedActionShareLocation::class;
  protected $shareLocationDataType = '';
  /**
   * @var string
   */
  public $text;

  /**
   * @param GoogleCloudDialogflowV2beta1IntentMessageRbmSuggestedActionRbmSuggestedActionDial
   */
  public function setDial(GoogleCloudDialogflowV2beta1IntentMessageRbmSuggestedActionRbmSuggestedActionDial $dial)
  {
    $this->dial = $dial;
  }
  /**
   * @return GoogleCloudDialogflowV2beta1IntentMessageRbmSuggestedActionRbmSuggestedActionDial
   */
  public function getDial()
  {
    return $this->dial;
  }
  /**
   * @param GoogleCloudDialogflowV2beta1IntentMessageRbmSuggestedActionRbmSuggestedActionOpenUri
   */
  public function setOpenUrl(GoogleCloudDialogflowV2beta1IntentMessageRbmSuggestedActionRbmSuggestedActionOpenUri $openUrl)
  {
    $this->openUrl = $openUrl;
  }
  /**
   * @return GoogleCloudDialogflowV2beta1IntentMessageRbmSuggestedActionRbmSuggestedActionOpenUri
   */
  public function getOpenUrl()
  {
    return $this->openUrl;
  }
  /**
   * @param string
   */
  public function setPostbackData($postbackData)
  {
    $this->postbackData = $postbackData;
  }
  /**
   * @return string
   */
  public function getPostbackData()
  {
    return $this->postbackData;
  }
  /**
   * @param GoogleCloudDialogflowV2beta1IntentMessageRbmSuggestedActionRbmSuggestedActionShareLocation
   */
  public function setShareLocation(GoogleCloudDialogflowV2beta1IntentMessageRbmSuggestedActionRbmSuggestedActionShareLocation $shareLocation)
  {
    $this->shareLocation = $shareLocation;
  }
  /**
   * @return GoogleCloudDialogflowV2beta1IntentMessageRbmSuggestedActionRbmSuggestedActionShareLocation
   */
  public function getShareLocation()
  {
    return $this->shareLocation;
  }
  /**
   * @param string
   */
  public function setText($text)
  {
    $this->text = $text;
  }
  /**
   * @return string
   */
  public function getText()
  {
    return $this->text;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDialogflowV2beta1IntentMessageRbmSuggestedAction::class, 'Google_Service_Dialogflow_GoogleCloudDialogflowV2beta1IntentMessageRbmSuggestedAction');
