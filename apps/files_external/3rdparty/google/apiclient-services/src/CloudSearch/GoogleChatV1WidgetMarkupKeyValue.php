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

class GoogleChatV1WidgetMarkupKeyValue extends \Google\Model
{
  /**
   * @var string
   */
  public $bottomLabel;
  protected $buttonType = GoogleChatV1WidgetMarkupButton::class;
  protected $buttonDataType = '';
  /**
   * @var string
   */
  public $content;
  /**
   * @var bool
   */
  public $contentMultiline;
  /**
   * @var string
   */
  public $icon;
  /**
   * @var string
   */
  public $iconUrl;
  protected $onClickType = GoogleChatV1WidgetMarkupOnClick::class;
  protected $onClickDataType = '';
  /**
   * @var string
   */
  public $topLabel;

  /**
   * @param string
   */
  public function setBottomLabel($bottomLabel)
  {
    $this->bottomLabel = $bottomLabel;
  }
  /**
   * @return string
   */
  public function getBottomLabel()
  {
    return $this->bottomLabel;
  }
  /**
   * @param GoogleChatV1WidgetMarkupButton
   */
  public function setButton(GoogleChatV1WidgetMarkupButton $button)
  {
    $this->button = $button;
  }
  /**
   * @return GoogleChatV1WidgetMarkupButton
   */
  public function getButton()
  {
    return $this->button;
  }
  /**
   * @param string
   */
  public function setContent($content)
  {
    $this->content = $content;
  }
  /**
   * @return string
   */
  public function getContent()
  {
    return $this->content;
  }
  /**
   * @param bool
   */
  public function setContentMultiline($contentMultiline)
  {
    $this->contentMultiline = $contentMultiline;
  }
  /**
   * @return bool
   */
  public function getContentMultiline()
  {
    return $this->contentMultiline;
  }
  /**
   * @param string
   */
  public function setIcon($icon)
  {
    $this->icon = $icon;
  }
  /**
   * @return string
   */
  public function getIcon()
  {
    return $this->icon;
  }
  /**
   * @param string
   */
  public function setIconUrl($iconUrl)
  {
    $this->iconUrl = $iconUrl;
  }
  /**
   * @return string
   */
  public function getIconUrl()
  {
    return $this->iconUrl;
  }
  /**
   * @param GoogleChatV1WidgetMarkupOnClick
   */
  public function setOnClick(GoogleChatV1WidgetMarkupOnClick $onClick)
  {
    $this->onClick = $onClick;
  }
  /**
   * @return GoogleChatV1WidgetMarkupOnClick
   */
  public function getOnClick()
  {
    return $this->onClick;
  }
  /**
   * @param string
   */
  public function setTopLabel($topLabel)
  {
    $this->topLabel = $topLabel;
  }
  /**
   * @return string
   */
  public function getTopLabel()
  {
    return $this->topLabel;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleChatV1WidgetMarkupKeyValue::class, 'Google_Service_CloudSearch_GoogleChatV1WidgetMarkupKeyValue');
