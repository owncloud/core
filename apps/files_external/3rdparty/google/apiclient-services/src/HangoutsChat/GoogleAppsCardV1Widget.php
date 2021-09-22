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

namespace Google\Service\HangoutsChat;

class GoogleAppsCardV1Widget extends \Google\Model
{
  protected $buttonListType = GoogleAppsCardV1ButtonList::class;
  protected $buttonListDataType = '';
  protected $dateTimePickerType = GoogleAppsCardV1DateTimePicker::class;
  protected $dateTimePickerDataType = '';
  protected $decoratedTextType = GoogleAppsCardV1DecoratedText::class;
  protected $decoratedTextDataType = '';
  protected $dividerType = GoogleAppsCardV1Divider::class;
  protected $dividerDataType = '';
  protected $gridType = GoogleAppsCardV1Grid::class;
  protected $gridDataType = '';
  public $horizontalAlignment;
  protected $imageType = GoogleAppsCardV1Image::class;
  protected $imageDataType = '';
  protected $selectionInputType = GoogleAppsCardV1SelectionInput::class;
  protected $selectionInputDataType = '';
  protected $textInputType = GoogleAppsCardV1TextInput::class;
  protected $textInputDataType = '';
  protected $textParagraphType = GoogleAppsCardV1TextParagraph::class;
  protected $textParagraphDataType = '';

  /**
   * @param GoogleAppsCardV1ButtonList
   */
  public function setButtonList(GoogleAppsCardV1ButtonList $buttonList)
  {
    $this->buttonList = $buttonList;
  }
  /**
   * @return GoogleAppsCardV1ButtonList
   */
  public function getButtonList()
  {
    return $this->buttonList;
  }
  /**
   * @param GoogleAppsCardV1DateTimePicker
   */
  public function setDateTimePicker(GoogleAppsCardV1DateTimePicker $dateTimePicker)
  {
    $this->dateTimePicker = $dateTimePicker;
  }
  /**
   * @return GoogleAppsCardV1DateTimePicker
   */
  public function getDateTimePicker()
  {
    return $this->dateTimePicker;
  }
  /**
   * @param GoogleAppsCardV1DecoratedText
   */
  public function setDecoratedText(GoogleAppsCardV1DecoratedText $decoratedText)
  {
    $this->decoratedText = $decoratedText;
  }
  /**
   * @return GoogleAppsCardV1DecoratedText
   */
  public function getDecoratedText()
  {
    return $this->decoratedText;
  }
  /**
   * @param GoogleAppsCardV1Divider
   */
  public function setDivider(GoogleAppsCardV1Divider $divider)
  {
    $this->divider = $divider;
  }
  /**
   * @return GoogleAppsCardV1Divider
   */
  public function getDivider()
  {
    return $this->divider;
  }
  /**
   * @param GoogleAppsCardV1Grid
   */
  public function setGrid(GoogleAppsCardV1Grid $grid)
  {
    $this->grid = $grid;
  }
  /**
   * @return GoogleAppsCardV1Grid
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
   * @param GoogleAppsCardV1Image
   */
  public function setImage(GoogleAppsCardV1Image $image)
  {
    $this->image = $image;
  }
  /**
   * @return GoogleAppsCardV1Image
   */
  public function getImage()
  {
    return $this->image;
  }
  /**
   * @param GoogleAppsCardV1SelectionInput
   */
  public function setSelectionInput(GoogleAppsCardV1SelectionInput $selectionInput)
  {
    $this->selectionInput = $selectionInput;
  }
  /**
   * @return GoogleAppsCardV1SelectionInput
   */
  public function getSelectionInput()
  {
    return $this->selectionInput;
  }
  /**
   * @param GoogleAppsCardV1TextInput
   */
  public function setTextInput(GoogleAppsCardV1TextInput $textInput)
  {
    $this->textInput = $textInput;
  }
  /**
   * @return GoogleAppsCardV1TextInput
   */
  public function getTextInput()
  {
    return $this->textInput;
  }
  /**
   * @param GoogleAppsCardV1TextParagraph
   */
  public function setTextParagraph(GoogleAppsCardV1TextParagraph $textParagraph)
  {
    $this->textParagraph = $textParagraph;
  }
  /**
   * @return GoogleAppsCardV1TextParagraph
   */
  public function getTextParagraph()
  {
    return $this->textParagraph;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleAppsCardV1Widget::class, 'Google_Service_HangoutsChat_GoogleAppsCardV1Widget');
