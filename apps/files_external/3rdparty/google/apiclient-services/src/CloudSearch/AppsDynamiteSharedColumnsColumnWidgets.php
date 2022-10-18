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

namespace Google\Service\CloudSearch;

class AppsDynamiteSharedColumnsColumnWidgets extends \Google\Model
{
  protected $buttonListType = AppsDynamiteSharedButtonList::class;
  protected $buttonListDataType = '';
  protected $dateTimePickerType = AppsDynamiteSharedDateTimePicker::class;
  protected $dateTimePickerDataType = '';
  protected $decoratedTextType = AppsDynamiteSharedDecoratedText::class;
  protected $decoratedTextDataType = '';
  protected $imageType = AppsDynamiteSharedImage::class;
  protected $imageDataType = '';
  protected $selectionInputType = AppsDynamiteSharedSelectionInput::class;
  protected $selectionInputDataType = '';
  protected $textInputType = AppsDynamiteSharedTextInput::class;
  protected $textInputDataType = '';
  protected $textParagraphType = AppsDynamiteSharedTextParagraph::class;
  protected $textParagraphDataType = '';

  /**
   * @param AppsDynamiteSharedButtonList
   */
  public function setButtonList(AppsDynamiteSharedButtonList $buttonList)
  {
    $this->buttonList = $buttonList;
  }
  /**
   * @return AppsDynamiteSharedButtonList
   */
  public function getButtonList()
  {
    return $this->buttonList;
  }
  /**
   * @param AppsDynamiteSharedDateTimePicker
   */
  public function setDateTimePicker(AppsDynamiteSharedDateTimePicker $dateTimePicker)
  {
    $this->dateTimePicker = $dateTimePicker;
  }
  /**
   * @return AppsDynamiteSharedDateTimePicker
   */
  public function getDateTimePicker()
  {
    return $this->dateTimePicker;
  }
  /**
   * @param AppsDynamiteSharedDecoratedText
   */
  public function setDecoratedText(AppsDynamiteSharedDecoratedText $decoratedText)
  {
    $this->decoratedText = $decoratedText;
  }
  /**
   * @return AppsDynamiteSharedDecoratedText
   */
  public function getDecoratedText()
  {
    return $this->decoratedText;
  }
  /**
   * @param AppsDynamiteSharedImage
   */
  public function setImage(AppsDynamiteSharedImage $image)
  {
    $this->image = $image;
  }
  /**
   * @return AppsDynamiteSharedImage
   */
  public function getImage()
  {
    return $this->image;
  }
  /**
   * @param AppsDynamiteSharedSelectionInput
   */
  public function setSelectionInput(AppsDynamiteSharedSelectionInput $selectionInput)
  {
    $this->selectionInput = $selectionInput;
  }
  /**
   * @return AppsDynamiteSharedSelectionInput
   */
  public function getSelectionInput()
  {
    return $this->selectionInput;
  }
  /**
   * @param AppsDynamiteSharedTextInput
   */
  public function setTextInput(AppsDynamiteSharedTextInput $textInput)
  {
    $this->textInput = $textInput;
  }
  /**
   * @return AppsDynamiteSharedTextInput
   */
  public function getTextInput()
  {
    return $this->textInput;
  }
  /**
   * @param AppsDynamiteSharedTextParagraph
   */
  public function setTextParagraph(AppsDynamiteSharedTextParagraph $textParagraph)
  {
    $this->textParagraph = $textParagraph;
  }
  /**
   * @return AppsDynamiteSharedTextParagraph
   */
  public function getTextParagraph()
  {
    return $this->textParagraph;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AppsDynamiteSharedColumnsColumnWidgets::class, 'Google_Service_CloudSearch_AppsDynamiteSharedColumnsColumnWidgets');
