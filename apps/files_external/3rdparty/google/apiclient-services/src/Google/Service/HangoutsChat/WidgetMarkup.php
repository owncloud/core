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

class Google_Service_HangoutsChat_WidgetMarkup extends Google_Collection
{
  protected $collection_key = 'buttons';
  protected $buttonsType = 'Google_Service_HangoutsChat_Button';
  protected $buttonsDataType = 'array';
  protected $imageType = 'Google_Service_HangoutsChat_Image';
  protected $imageDataType = '';
  protected $keyValueType = 'Google_Service_HangoutsChat_KeyValue';
  protected $keyValueDataType = '';
  protected $textParagraphType = 'Google_Service_HangoutsChat_TextParagraph';
  protected $textParagraphDataType = '';

  /**
   * @param Google_Service_HangoutsChat_Button
   */
  public function setButtons($buttons)
  {
    $this->buttons = $buttons;
  }
  /**
   * @return Google_Service_HangoutsChat_Button
   */
  public function getButtons()
  {
    return $this->buttons;
  }
  /**
   * @param Google_Service_HangoutsChat_Image
   */
  public function setImage(Google_Service_HangoutsChat_Image $image)
  {
    $this->image = $image;
  }
  /**
   * @return Google_Service_HangoutsChat_Image
   */
  public function getImage()
  {
    return $this->image;
  }
  /**
   * @param Google_Service_HangoutsChat_KeyValue
   */
  public function setKeyValue(Google_Service_HangoutsChat_KeyValue $keyValue)
  {
    $this->keyValue = $keyValue;
  }
  /**
   * @return Google_Service_HangoutsChat_KeyValue
   */
  public function getKeyValue()
  {
    return $this->keyValue;
  }
  /**
   * @param Google_Service_HangoutsChat_TextParagraph
   */
  public function setTextParagraph(Google_Service_HangoutsChat_TextParagraph $textParagraph)
  {
    $this->textParagraph = $textParagraph;
  }
  /**
   * @return Google_Service_HangoutsChat_TextParagraph
   */
  public function getTextParagraph()
  {
    return $this->textParagraph;
  }
}
