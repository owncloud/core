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

class GoogleChatV1WidgetMarkupButton extends \Google\Model
{
  protected $imageButtonType = GoogleChatV1WidgetMarkupImageButton::class;
  protected $imageButtonDataType = '';
  protected $textButtonType = GoogleChatV1WidgetMarkupTextButton::class;
  protected $textButtonDataType = '';

  /**
   * @param GoogleChatV1WidgetMarkupImageButton
   */
  public function setImageButton(GoogleChatV1WidgetMarkupImageButton $imageButton)
  {
    $this->imageButton = $imageButton;
  }
  /**
   * @return GoogleChatV1WidgetMarkupImageButton
   */
  public function getImageButton()
  {
    return $this->imageButton;
  }
  /**
   * @param GoogleChatV1WidgetMarkupTextButton
   */
  public function setTextButton(GoogleChatV1WidgetMarkupTextButton $textButton)
  {
    $this->textButton = $textButton;
  }
  /**
   * @return GoogleChatV1WidgetMarkupTextButton
   */
  public function getTextButton()
  {
    return $this->textButton;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleChatV1WidgetMarkupButton::class, 'Google_Service_CloudSearch_GoogleChatV1WidgetMarkupButton');
