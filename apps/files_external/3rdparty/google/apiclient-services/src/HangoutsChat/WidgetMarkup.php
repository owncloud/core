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

class WidgetMarkup extends \Google\Collection
{
  protected $collection_key = 'buttons';
  protected $buttonsType = Button::class;
  protected $buttonsDataType = 'array';
  protected $imageType = Image::class;
  protected $imageDataType = '';
  protected $keyValueType = KeyValue::class;
  protected $keyValueDataType = '';
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
class_alias(WidgetMarkup::class, 'Google_Service_HangoutsChat_WidgetMarkup');
