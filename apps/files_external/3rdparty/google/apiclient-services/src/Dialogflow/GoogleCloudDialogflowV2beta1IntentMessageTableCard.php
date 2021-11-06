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

class GoogleCloudDialogflowV2beta1IntentMessageTableCard extends \Google\Collection
{
  protected $collection_key = 'rows';
  protected $buttonsType = GoogleCloudDialogflowV2beta1IntentMessageBasicCardButton::class;
  protected $buttonsDataType = 'array';
  protected $columnPropertiesType = GoogleCloudDialogflowV2beta1IntentMessageColumnProperties::class;
  protected $columnPropertiesDataType = 'array';
  protected $imageType = GoogleCloudDialogflowV2beta1IntentMessageImage::class;
  protected $imageDataType = '';
  protected $rowsType = GoogleCloudDialogflowV2beta1IntentMessageTableCardRow::class;
  protected $rowsDataType = 'array';
  public $subtitle;
  public $title;

  /**
   * @param GoogleCloudDialogflowV2beta1IntentMessageBasicCardButton[]
   */
  public function setButtons($buttons)
  {
    $this->buttons = $buttons;
  }
  /**
   * @return GoogleCloudDialogflowV2beta1IntentMessageBasicCardButton[]
   */
  public function getButtons()
  {
    return $this->buttons;
  }
  /**
   * @param GoogleCloudDialogflowV2beta1IntentMessageColumnProperties[]
   */
  public function setColumnProperties($columnProperties)
  {
    $this->columnProperties = $columnProperties;
  }
  /**
   * @return GoogleCloudDialogflowV2beta1IntentMessageColumnProperties[]
   */
  public function getColumnProperties()
  {
    return $this->columnProperties;
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
   * @param GoogleCloudDialogflowV2beta1IntentMessageTableCardRow[]
   */
  public function setRows($rows)
  {
    $this->rows = $rows;
  }
  /**
   * @return GoogleCloudDialogflowV2beta1IntentMessageTableCardRow[]
   */
  public function getRows()
  {
    return $this->rows;
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
class_alias(GoogleCloudDialogflowV2beta1IntentMessageTableCard::class, 'Google_Service_Dialogflow_GoogleCloudDialogflowV2beta1IntentMessageTableCard');
