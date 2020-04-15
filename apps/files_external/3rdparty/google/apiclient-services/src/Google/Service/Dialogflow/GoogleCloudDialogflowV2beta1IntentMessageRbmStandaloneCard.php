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

class Google_Service_Dialogflow_GoogleCloudDialogflowV2beta1IntentMessageRbmStandaloneCard extends Google_Model
{
  protected $cardContentType = 'Google_Service_Dialogflow_GoogleCloudDialogflowV2beta1IntentMessageRbmCardContent';
  protected $cardContentDataType = '';
  public $cardOrientation;
  public $thumbnailImageAlignment;

  /**
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowV2beta1IntentMessageRbmCardContent
   */
  public function setCardContent(Google_Service_Dialogflow_GoogleCloudDialogflowV2beta1IntentMessageRbmCardContent $cardContent)
  {
    $this->cardContent = $cardContent;
  }
  /**
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowV2beta1IntentMessageRbmCardContent
   */
  public function getCardContent()
  {
    return $this->cardContent;
  }
  public function setCardOrientation($cardOrientation)
  {
    $this->cardOrientation = $cardOrientation;
  }
  public function getCardOrientation()
  {
    return $this->cardOrientation;
  }
  public function setThumbnailImageAlignment($thumbnailImageAlignment)
  {
    $this->thumbnailImageAlignment = $thumbnailImageAlignment;
  }
  public function getThumbnailImageAlignment()
  {
    return $this->thumbnailImageAlignment;
  }
}
