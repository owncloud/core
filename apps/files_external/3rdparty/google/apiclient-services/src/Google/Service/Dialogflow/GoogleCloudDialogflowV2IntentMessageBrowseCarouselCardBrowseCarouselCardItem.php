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

class Google_Service_Dialogflow_GoogleCloudDialogflowV2IntentMessageBrowseCarouselCardBrowseCarouselCardItem extends Google_Model
{
  public $description;
  public $footer;
  protected $imageType = 'Google_Service_Dialogflow_GoogleCloudDialogflowV2IntentMessageImage';
  protected $imageDataType = '';
  protected $openUriActionType = 'Google_Service_Dialogflow_GoogleCloudDialogflowV2IntentMessageBrowseCarouselCardBrowseCarouselCardItemOpenUrlAction';
  protected $openUriActionDataType = '';
  public $title;

  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setFooter($footer)
  {
    $this->footer = $footer;
  }
  public function getFooter()
  {
    return $this->footer;
  }
  /**
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowV2IntentMessageImage
   */
  public function setImage(Google_Service_Dialogflow_GoogleCloudDialogflowV2IntentMessageImage $image)
  {
    $this->image = $image;
  }
  /**
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowV2IntentMessageImage
   */
  public function getImage()
  {
    return $this->image;
  }
  /**
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowV2IntentMessageBrowseCarouselCardBrowseCarouselCardItemOpenUrlAction
   */
  public function setOpenUriAction(Google_Service_Dialogflow_GoogleCloudDialogflowV2IntentMessageBrowseCarouselCardBrowseCarouselCardItemOpenUrlAction $openUriAction)
  {
    $this->openUriAction = $openUriAction;
  }
  /**
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowV2IntentMessageBrowseCarouselCardBrowseCarouselCardItemOpenUrlAction
   */
  public function getOpenUriAction()
  {
    return $this->openUriAction;
  }
  public function setTitle($title)
  {
    $this->title = $title;
  }
  public function getTitle()
  {
    return $this->title;
  }
}
