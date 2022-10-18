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

class KeyValue extends \Google\Model
{
  /**
   * @var string
   */
  public $bottomLabel;
  protected $buttonType = Button::class;
  protected $buttonDataType = '';
  /**
   * @var string
   */
  public $content;
  /**
   * @var bool
   */
  public $contentMultiline;
  protected $endIconType = IconImage::class;
  protected $endIconDataType = '';
  /**
   * @var string
   */
  public $icon;
  /**
   * @var string
   */
  public $iconAltText;
  /**
   * @var string
   */
  public $iconUrl;
  /**
   * @var string
   */
  public $imageStyle;
  protected $onClickType = OnClick::class;
  protected $onClickDataType = '';
  protected $startIconType = IconImage::class;
  protected $startIconDataType = '';
  protected $switchWidgetType = SwitchWidget::class;
  protected $switchWidgetDataType = '';
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
   * @param Button
   */
  public function setButton(Button $button)
  {
    $this->button = $button;
  }
  /**
   * @return Button
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
   * @param IconImage
   */
  public function setEndIcon(IconImage $endIcon)
  {
    $this->endIcon = $endIcon;
  }
  /**
   * @return IconImage
   */
  public function getEndIcon()
  {
    return $this->endIcon;
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
  public function setIconAltText($iconAltText)
  {
    $this->iconAltText = $iconAltText;
  }
  /**
   * @return string
   */
  public function getIconAltText()
  {
    return $this->iconAltText;
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
   * @param string
   */
  public function setImageStyle($imageStyle)
  {
    $this->imageStyle = $imageStyle;
  }
  /**
   * @return string
   */
  public function getImageStyle()
  {
    return $this->imageStyle;
  }
  /**
   * @param OnClick
   */
  public function setOnClick(OnClick $onClick)
  {
    $this->onClick = $onClick;
  }
  /**
   * @return OnClick
   */
  public function getOnClick()
  {
    return $this->onClick;
  }
  /**
   * @param IconImage
   */
  public function setStartIcon(IconImage $startIcon)
  {
    $this->startIcon = $startIcon;
  }
  /**
   * @return IconImage
   */
  public function getStartIcon()
  {
    return $this->startIcon;
  }
  /**
   * @param SwitchWidget
   */
  public function setSwitchWidget(SwitchWidget $switchWidget)
  {
    $this->switchWidget = $switchWidget;
  }
  /**
   * @return SwitchWidget
   */
  public function getSwitchWidget()
  {
    return $this->switchWidget;
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
class_alias(KeyValue::class, 'Google_Service_CloudSearch_KeyValue');
