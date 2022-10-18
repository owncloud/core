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

class WidgetMarkup extends \Google\Collection
{
  protected $collection_key = 'buttons';
  protected $buttonsType = Button::class;
  protected $buttonsDataType = 'array';
  protected $dateTimePickerType = DateTimePicker::class;
  protected $dateTimePickerDataType = '';
  protected $dividerType = Divider::class;
  protected $dividerDataType = '';
  protected $gridType = Grid::class;
  protected $gridDataType = '';
  /**
   * @var string
   */
  public $horizontalAlignment;
  protected $imageType = Image::class;
  protected $imageDataType = '';
  protected $imageKeyValueType = ImageKeyValue::class;
  protected $imageKeyValueDataType = '';
  protected $keyValueType = KeyValue::class;
  protected $keyValueDataType = '';
  protected $menuType = Menu::class;
  protected $menuDataType = '';
  protected $selectionControlType = SelectionControl::class;
  protected $selectionControlDataType = '';
  protected $textFieldType = TextField::class;
  protected $textFieldDataType = '';
  protected $textKeyValueType = TextKeyValue::class;
  protected $textKeyValueDataType = '';
  protected $textParagraphType = TextParagraph::class;
  protected $textParagraphDataType = '';

  /**
   * @param Button[]
   */
  public function setButtons($buttons)
  {
    $this->buttons = $buttons;
  }
  /**
   * @return Button[]
   */
  public function getButtons()
  {
    return $this->buttons;
  }
  /**
   * @param DateTimePicker
   */
  public function setDateTimePicker(DateTimePicker $dateTimePicker)
  {
    $this->dateTimePicker = $dateTimePicker;
  }
  /**
   * @return DateTimePicker
   */
  public function getDateTimePicker()
  {
    return $this->dateTimePicker;
  }
  /**
   * @param Divider
   */
  public function setDivider(Divider $divider)
  {
    $this->divider = $divider;
  }
  /**
   * @return Divider
   */
  public function getDivider()
  {
    return $this->divider;
  }
  /**
   * @param Grid
   */
  public function setGrid(Grid $grid)
  {
    $this->grid = $grid;
  }
  /**
   * @return Grid
   */
  public function getGrid()
  {
    return $this->grid;
  }
  /**
   * @param string
   */
  public function setHorizontalAlignment($horizontalAlignment)
  {
    $this->horizontalAlignment = $horizontalAlignment;
  }
  /**
   * @return string
   */
  public function getHorizontalAlignment()
  {
    return $this->horizontalAlignment;
  }
  /**
   * @param Image
   */
  public function setImage(Image $image)
  {
    $this->image = $image;
  }
  /**
   * @return Image
   */
  public function getImage()
  {
    return $this->image;
  }
  /**
   * @param ImageKeyValue
   */
  public function setImageKeyValue(ImageKeyValue $imageKeyValue)
  {
    $this->imageKeyValue = $imageKeyValue;
  }
  /**
   * @return ImageKeyValue
   */
  public function getImageKeyValue()
  {
    return $this->imageKeyValue;
  }
  /**
   * @param KeyValue
   */
  public function setKeyValue(KeyValue $keyValue)
  {
    $this->keyValue = $keyValue;
  }
  /**
   * @return KeyValue
   */
  public function getKeyValue()
  {
    return $this->keyValue;
  }
  /**
   * @param Menu
   */
  public function setMenu(Menu $menu)
  {
    $this->menu = $menu;
  }
  /**
   * @return Menu
   */
  public function getMenu()
  {
    return $this->menu;
  }
  /**
   * @param SelectionControl
   */
  public function setSelectionControl(SelectionControl $selectionControl)
  {
    $this->selectionControl = $selectionControl;
  }
  /**
   * @return SelectionControl
   */
  public function getSelectionControl()
  {
    return $this->selectionControl;
  }
  /**
   * @param TextField
   */
  public function setTextField(TextField $textField)
  {
    $this->textField = $textField;
  }
  /**
   * @return TextField
   */
  public function getTextField()
  {
    return $this->textField;
  }
  /**
   * @param TextKeyValue
   */
  public function setTextKeyValue(TextKeyValue $textKeyValue)
  {
    $this->textKeyValue = $textKeyValue;
  }
  /**
   * @return TextKeyValue
   */
  public function getTextKeyValue()
  {
    return $this->textKeyValue;
  }
  /**
   * @param TextParagraph
   */
  public function setTextParagraph(TextParagraph $textParagraph)
  {
    $this->textParagraph = $textParagraph;
  }
  /**
   * @return TextParagraph
   */
  public function getTextParagraph()
  {
    return $this->textParagraph;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(WidgetMarkup::class, 'Google_Service_CloudSearch_WidgetMarkup');
