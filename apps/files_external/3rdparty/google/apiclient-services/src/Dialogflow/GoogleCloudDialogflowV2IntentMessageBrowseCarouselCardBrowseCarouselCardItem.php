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

class GoogleCloudDialogflowV2IntentMessageBrowseCarouselCardBrowseCarouselCardItem extends \Google\Model
{
  /**
   * @var string
   */
  public $description;
  /**
   * @var string
   */
  public $footer;
  protected $imageType = GoogleCloudDialogflowV2IntentMessageImage::class;
  protected $imageDataType = '';
  protected $openUriActionType = GoogleCloudDialogflowV2IntentMessageBrowseCarouselCardBrowseCarouselCardItemOpenUrlAction::class;
  protected $openUriActionDataType = '';
  /**
   * @var string
   */
  public $title;

  /**
   * @param string
   */
  public function setDescription($description)
  {
    $this->description = $description;
  }
  /**
   * @return string
   */
  public function getDescription()
  {
    return $this->description;
  }
  /**
   * @param string
   */
  public function setFooter($footer)
  {
    $this->footer = $footer;
  }
  /**
   * @return string
   */
  public function getFooter()
  {
    return $this->footer;
  }
  /**
   * @param GoogleCloudDialogflowV2IntentMessageImage
   */
  public function setImage(GoogleCloudDialogflowV2IntentMessageImage $image)
  {
    $this->image = $image;
  }
  /**
   * @return GoogleCloudDialogflowV2IntentMessageImage
   */
  public function getImage()
  {
    return $this->image;
  }
  /**
   * @param GoogleCloudDialogflowV2IntentMessageBrowseCarouselCardBrowseCarouselCardItemOpenUrlAction
   */
  public function setOpenUriAction(GoogleCloudDialogflowV2IntentMessageBrowseCarouselCardBrowseCarouselCardItemOpenUrlAction $openUriAction)
  {
    $this->openUriAction = $openUriAction;
  }
  /**
   * @return GoogleCloudDialogflowV2IntentMessageBrowseCarouselCardBrowseCarouselCardItemOpenUrlAction
   */
  public function getOpenUriAction()
  {
    return $this->openUriAction;
  }
  /**
   * @param string
   */
  public function setTitle($title)
  {
    $this->title = $title;
  }
  /**
   * @return string
   */
  public function getTitle()
  {
    return $this->title;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDialogflowV2IntentMessageBrowseCarouselCardBrowseCarouselCardItem::class, 'Google_Service_Dialogflow_GoogleCloudDialogflowV2IntentMessageBrowseCarouselCardBrowseCarouselCardItem');
