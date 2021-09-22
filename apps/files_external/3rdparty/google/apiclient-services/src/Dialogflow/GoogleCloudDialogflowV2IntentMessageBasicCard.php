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

class GoogleCloudDialogflowV2IntentMessageBasicCard extends \Google\Collection
{
  protected $collection_key = 'buttons';
  protected $buttonsType = GoogleCloudDialogflowV2IntentMessageBasicCardButton::class;
  protected $buttonsDataType = 'array';
  public $formattedText;
  protected $imageType = GoogleCloudDialogflowV2IntentMessageImage::class;
  protected $imageDataType = '';
  public $subtitle;
  public $title;

  /**
   * @param GoogleCloudDialogflowV2IntentMessageBasicCardButton[]
   */
  public function setButtons($buttons)
  {
    $this->buttons = $buttons;
  }
  /**
   * @return GoogleCloudDialogflowV2IntentMessageBasicCardButton[]
   */
  public function getButtons()
  {
    return $this->buttons;
  }
  public function setFormattedText($formattedText)
  {
    $this->formattedText = $formattedText;
  }
  public function getFormattedText()
  {
    return $this->formattedText;
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
  public function setSubtitle($subtitle)
  {
    $this->subtitle = $subtitle;
  }
  public function getSubtitle()
  {
    return $this->subtitle;
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
class_alias(GoogleCloudDialogflowV2IntentMessageBasicCard::class, 'Google_Service_Dialogflow_GoogleCloudDialogflowV2IntentMessageBasicCard');
