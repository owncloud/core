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

class Google_Service_HangoutsChat_GoogleAppsCardV1Widget extends Google_Model
{
  protected $buttonListType = 'Google_Service_HangoutsChat_GoogleAppsCardV1ButtonList';
  protected $buttonListDataType = '';
  protected $dateTimePickerType = 'Google_Service_HangoutsChat_GoogleAppsCardV1DateTimePicker';
  protected $dateTimePickerDataType = '';
  protected $decoratedTextType = 'Google_Service_HangoutsChat_GoogleAppsCardV1DecoratedText';
  protected $decoratedTextDataType = '';
  protected $dividerType = 'Google_Service_HangoutsChat_GoogleAppsCardV1Divider';
  protected $dividerDataType = '';
  protected $gridType = 'Google_Service_HangoutsChat_GoogleAppsCardV1Grid';
  protected $gridDataType = '';
  public $horizontalAlignment;
  protected $imageType = 'Google_Service_HangoutsChat_GoogleAppsCardV1Image';
  protected $imageDataType = '';
  protected $selectionInputType = 'Google_Service_HangoutsChat_GoogleAppsCardV1SelectionInput';
  protected $selectionInputDataType = '';
  protected $textInputType = 'Google_Service_HangoutsChat_GoogleAppsCardV1TextInput';
  protected $textInputDataType = '';
  protected $textParagraphType = 'Google_Service_HangoutsChat_GoogleAppsCardV1TextParagraph';
  protected $textParagraphDataType = '';

  /**
   * @param Google_Service_HangoutsChat_GoogleAppsCardV1ButtonList
   */
  public function setButtonList(Google_Service_HangoutsChat_GoogleAppsCardV1ButtonList $buttonList)
  {
    $this->buttonList = $buttonList;
  }
  /**
   * @return Google_Service_HangoutsChat_GoogleAppsCardV1ButtonList
   */
  public function getButtonList()
  {
    return $this->buttonList;
  }
  /**
   * @param Google_Service_HangoutsChat_GoogleAppsCardV1DateTimePicker
   */
  public function setDateTimePicker(Google_Service_HangoutsChat_GoogleAppsCardV1DateTimePicker $dateTimePicker)
  {
    $this->dateTimePicker = $dateTimePicker;
  }
  /**
   * @return Google_Service_HangoutsChat_GoogleAppsCardV1DateTimePicker
   */
  public function getDateTimePicker()
  {
    return $this->dateTimePicker;
  }
  /**
   * @param Google_Service_HangoutsChat_GoogleAppsCardV1DecoratedText
   */
  public function setDecoratedText(Google_Service_HangoutsChat_GoogleAppsCardV1DecoratedText $decoratedText)
  {
    $this->decoratedText = $decoratedText;
  }
  /**
   * @return Google_Service_HangoutsChat_GoogleAppsCardV1DecoratedText
   */
  public function getDecoratedText()
  {
    return $this->decoratedText;
  }
  /**
   * @param Google_Service_HangoutsChat_GoogleAppsCardV1Divider
   */
  public function setDivider(Google_Service_HangoutsChat_GoogleAppsCardV1Divider $divider)
  {
    $this->divider = $divider;
  }
  /**
   * @return Google_Service_HangoutsChat_GoogleAppsCardV1Divider
   */
  public function getDivider()
  {
    return $this->divider;
  }
  /**
   * @param Google_Service_HangoutsChat_GoogleAppsCardV1Grid
   */
  public function setGrid(Google_Service_HangoutsChat_GoogleAppsCardV1Grid $grid)
  {
    $this->grid = $grid;
  }
  /**
   * @return Google_Service_HangoutsChat_GoogleAppsCardV1Grid
   */
  public function getGrid()
  {
    return $this->grid;
  }
  public function setHorizontalAlignment($horizontalAlignment)
  {
    $this->horizontalAlignment = $horizontalAlignment;
  }
  public function getHorizontalAlignment()
  {
    return $this->horizontalAlignment;
  }
  /**
   * @param Google_Service_HangoutsChat_GoogleAppsCardV1Image
   */
  public function setImage(Google_Service_HangoutsChat_GoogleAppsCardV1Image $image)
  {
    $this->image = $image;
  }
  /**
   * @return Google_Service_HangoutsChat_GoogleAppsCardV1Image
   */
  public function getImage()
  {
    return $this->image;
  }
  /**
   * @param Google_Service_HangoutsChat_GoogleAppsCardV1SelectionInput
   */
  public function setSelectionInput(Google_Service_HangoutsChat_GoogleAppsCardV1SelectionInput $selectionInput)
  {
    $this->selectionInput = $selectionInput;
  }
  /**
   * @return Google_Service_HangoutsChat_GoogleAppsCardV1SelectionInput
   */
  public function getSelectionInput()
  {
    return $this->selectionInput;
  }
  /**
   * @param Google_Service_HangoutsChat_GoogleAppsCardV1TextInput
   */
  public function setTextInput(Google_Service_HangoutsChat_GoogleAppsCardV1TextInput $textInput)
  {
    $this->textInput = $textInput;
  }
  /**
   * @return Google_Service_HangoutsChat_GoogleAppsCardV1TextInput
   */
  public function getTextInput()
  {
    return $this->textInput;
  }
  /**
   * @param Google_Service_HangoutsChat_GoogleAppsCardV1TextParagraph
   */
  public function setTextParagraph(Google_Service_HangoutsChat_GoogleAppsCardV1TextParagraph $textParagraph)
  {
    $this->textParagraph = $textParagraph;
  }
  /**
   * @return Google_Service_HangoutsChat_GoogleAppsCardV1TextParagraph
   */
  public function getTextParagraph()
  {
    return $this->textParagraph;
  }
}
