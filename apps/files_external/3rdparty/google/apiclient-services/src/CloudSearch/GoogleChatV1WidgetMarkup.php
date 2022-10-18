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

class GoogleChatV1WidgetMarkup extends \Google\Collection
{
  protected $collection_key = 'buttons';
  protected $buttonsType = GoogleChatV1WidgetMarkupButton::class;
  protected $buttonsDataType = 'array';
  protected $imageType = GoogleChatV1WidgetMarkupImage::class;
  protected $imageDataType = '';
  protected $keyValueType = GoogleChatV1WidgetMarkupKeyValue::class;
  protected $keyValueDataType = '';
  protected $textParagraphType = GoogleChatV1WidgetMarkupTextParagraph::class;
  protected $textParagraphDataType = '';

  /**
   * @param GoogleChatV1WidgetMarkupButton[]
   */
  public function setButtons($buttons)
  {
    $this->buttons = $buttons;
  }
  /**
   * @return GoogleChatV1WidgetMarkupButton[]
   */
  public function getButtons()
  {
    return $this->buttons;
  }
  /**
   * @param GoogleChatV1WidgetMarkupImage
   */
  public function setImage(GoogleChatV1WidgetMarkupImage $image)
  {
    $this->image = $image;
  }
  /**
   * @return GoogleChatV1WidgetMarkupImage
   */
  public function getImage()
  {
    return $this->image;
  }
  /**
   * @param GoogleChatV1WidgetMarkupKeyValue
   */
  public function setKeyValue(GoogleChatV1WidgetMarkupKeyValue $keyValue)
  {
    $this->keyValue = $keyValue;
  }
  /**
   * @return GoogleChatV1WidgetMarkupKeyValue
   */
  public function getKeyValue()
  {
    return $this->keyValue;
  }
  /**
   * @param GoogleChatV1WidgetMarkupTextParagraph
   */
  public function setTextParagraph(GoogleChatV1WidgetMarkupTextParagraph $textParagraph)
  {
    $this->textParagraph = $textParagraph;
  }
  /**
   * @return GoogleChatV1WidgetMarkupTextParagraph
   */
  public function getTextParagraph()
  {
    return $this->textParagraph;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleChatV1WidgetMarkup::class, 'Google_Service_CloudSearch_GoogleChatV1WidgetMarkup');
