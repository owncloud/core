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

class Google_Service_Dialogflow_GoogleCloudDialogflowV2beta1IntentMessageRbmSuggestedAction extends Google_Model
{
  protected $dialType = 'Google_Service_Dialogflow_GoogleCloudDialogflowV2beta1IntentMessageRbmSuggestedActionRbmSuggestedActionDial';
  protected $dialDataType = '';
  protected $openUrlType = 'Google_Service_Dialogflow_GoogleCloudDialogflowV2beta1IntentMessageRbmSuggestedActionRbmSuggestedActionOpenUri';
  protected $openUrlDataType = '';
  public $postbackData;
  protected $shareLocationType = 'Google_Service_Dialogflow_GoogleCloudDialogflowV2beta1IntentMessageRbmSuggestedActionRbmSuggestedActionShareLocation';
  protected $shareLocationDataType = '';
  public $text;

  /**
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowV2beta1IntentMessageRbmSuggestedActionRbmSuggestedActionDial
   */
  public function setDial(Google_Service_Dialogflow_GoogleCloudDialogflowV2beta1IntentMessageRbmSuggestedActionRbmSuggestedActionDial $dial)
  {
    $this->dial = $dial;
  }
  /**
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowV2beta1IntentMessageRbmSuggestedActionRbmSuggestedActionDial
   */
  public function getDial()
  {
    return $this->dial;
  }
  /**
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowV2beta1IntentMessageRbmSuggestedActionRbmSuggestedActionOpenUri
   */
  public function setOpenUrl(Google_Service_Dialogflow_GoogleCloudDialogflowV2beta1IntentMessageRbmSuggestedActionRbmSuggestedActionOpenUri $openUrl)
  {
    $this->openUrl = $openUrl;
  }
  /**
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowV2beta1IntentMessageRbmSuggestedActionRbmSuggestedActionOpenUri
   */
  public function getOpenUrl()
  {
    return $this->openUrl;
  }
  public function setPostbackData($postbackData)
  {
    $this->postbackData = $postbackData;
  }
  public function getPostbackData()
  {
    return $this->postbackData;
  }
  /**
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowV2beta1IntentMessageRbmSuggestedActionRbmSuggestedActionShareLocation
   */
  public function setShareLocation(Google_Service_Dialogflow_GoogleCloudDialogflowV2beta1IntentMessageRbmSuggestedActionRbmSuggestedActionShareLocation $shareLocation)
  {
    $this->shareLocation = $shareLocation;
  }
  /**
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowV2beta1IntentMessageRbmSuggestedActionRbmSuggestedActionShareLocation
   */
  public function getShareLocation()
  {
    return $this->shareLocation;
  }
  public function setText($text)
  {
    $this->text = $text;
  }
  public function getText()
  {
    return $this->text;
  }
}
