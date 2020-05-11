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

class Google_Service_Dialogflow_GoogleCloudDialogflowV2beta1IntentMessageTableCard extends Google_Collection
{
  protected $collection_key = 'rows';
  protected $buttonsType = 'Google_Service_Dialogflow_GoogleCloudDialogflowV2beta1IntentMessageBasicCardButton';
  protected $buttonsDataType = 'array';
  protected $columnPropertiesType = 'Google_Service_Dialogflow_GoogleCloudDialogflowV2beta1IntentMessageColumnProperties';
  protected $columnPropertiesDataType = 'array';
  protected $imageType = 'Google_Service_Dialogflow_GoogleCloudDialogflowV2beta1IntentMessageImage';
  protected $imageDataType = '';
  protected $rowsType = 'Google_Service_Dialogflow_GoogleCloudDialogflowV2beta1IntentMessageTableCardRow';
  protected $rowsDataType = 'array';
  public $subtitle;
  public $title;

  /**
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowV2beta1IntentMessageBasicCardButton
   */
  public function setButtons($buttons)
  {
    $this->buttons = $buttons;
  }
  /**
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowV2beta1IntentMessageBasicCardButton
   */
  public function getButtons()
  {
    return $this->buttons;
  }
  /**
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowV2beta1IntentMessageColumnProperties
   */
  public function setColumnProperties($columnProperties)
  {
    $this->columnProperties = $columnProperties;
  }
  /**
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowV2beta1IntentMessageColumnProperties
   */
  public function getColumnProperties()
  {
    return $this->columnProperties;
  }
  /**
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowV2beta1IntentMessageImage
   */
  public function setImage(Google_Service_Dialogflow_GoogleCloudDialogflowV2beta1IntentMessageImage $image)
  {
    $this->image = $image;
  }
  /**
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowV2beta1IntentMessageImage
   */
  public function getImage()
  {
    return $this->image;
  }
  /**
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowV2beta1IntentMessageTableCardRow
   */
  public function setRows($rows)
  {
    $this->rows = $rows;
  }
  /**
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowV2beta1IntentMessageTableCardRow
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
