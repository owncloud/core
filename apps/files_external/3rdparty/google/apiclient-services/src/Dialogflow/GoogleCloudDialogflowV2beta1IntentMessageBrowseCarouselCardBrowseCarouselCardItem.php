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

class GoogleCloudDialogflowV2beta1IntentMessageBrowseCarouselCardBrowseCarouselCardItem extends \Google\Model
{
  public $description;
  public $footer;
  protected $imageType = GoogleCloudDialogflowV2beta1IntentMessageImage::class;
  protected $imageDataType = '';
  protected $openUriActionType = GoogleCloudDialogflowV2beta1IntentMessageBrowseCarouselCardBrowseCarouselCardItemOpenUrlAction::class;
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
   * @param GoogleCloudDialogflowV2beta1IntentMessageImage
   */
  public function setImage(GoogleCloudDialogflowV2beta1IntentMessageImage $image)
  {
    $this->image = $image;
  }
  /**
   * @return GoogleCloudDialogflowV2beta1IntentMessageImage
   */
  public function getImage()
  {
    return $this->image;
  }
  /**
   * @param GoogleCloudDialogflowV2beta1IntentMessageBrowseCarouselCardBrowseCarouselCardItemOpenUrlAction
   */
  public function setOpenUriAction(GoogleCloudDialogflowV2beta1IntentMessageBrowseCarouselCardBrowseCarouselCardItemOpenUrlAction $openUriAction)
  {
    $this->openUriAction = $openUriAction;
  }
  /**
   * @return GoogleCloudDialogflowV2beta1IntentMessageBrowseCarouselCardBrowseCarouselCardItemOpenUrlAction
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

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDialogflowV2beta1IntentMessageBrowseCarouselCardBrowseCarouselCardItem::class, 'Google_Service_Dialogflow_GoogleCloudDialogflowV2beta1IntentMessageBrowseCarouselCardBrowseCarouselCardItem');
