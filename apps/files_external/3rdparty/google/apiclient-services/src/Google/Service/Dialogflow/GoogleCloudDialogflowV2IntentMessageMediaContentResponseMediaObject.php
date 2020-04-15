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

class Google_Service_Dialogflow_GoogleCloudDialogflowV2IntentMessageMediaContentResponseMediaObject extends Google_Model
{
  public $contentUrl;
  public $description;
  protected $iconType = 'Google_Service_Dialogflow_GoogleCloudDialogflowV2IntentMessageImage';
  protected $iconDataType = '';
  protected $largeImageType = 'Google_Service_Dialogflow_GoogleCloudDialogflowV2IntentMessageImage';
  protected $largeImageDataType = '';
  public $name;

  public function setContentUrl($contentUrl)
  {
    $this->contentUrl = $contentUrl;
  }
  public function getContentUrl()
  {
    return $this->contentUrl;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  /**
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowV2IntentMessageImage
   */
  public function setIcon(Google_Service_Dialogflow_GoogleCloudDialogflowV2IntentMessageImage $icon)
  {
    $this->icon = $icon;
  }
  /**
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowV2IntentMessageImage
   */
  public function getIcon()
  {
    return $this->icon;
  }
  /**
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowV2IntentMessageImage
   */
  public function setLargeImage(Google_Service_Dialogflow_GoogleCloudDialogflowV2IntentMessageImage $largeImage)
  {
    $this->largeImage = $largeImage;
  }
  /**
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowV2IntentMessageImage
   */
  public function getLargeImage()
  {
    return $this->largeImage;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
}
