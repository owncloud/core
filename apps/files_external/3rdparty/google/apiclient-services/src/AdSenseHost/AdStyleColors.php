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

namespace Google\Service\AdSenseHost;

class AdStyleColors extends \Google\Model
{
  /**
   * @var string
   */
  public $background;
  /**
   * @var string
   */
  public $border;
  /**
   * @var string
   */
  public $text;
  /**
   * @var string
   */
  public $title;
  /**
   * @var string
   */
  public $url;

  /**
   * @param string
   */
  public function setBackground($background)
  {
    $this->background = $background;
  }
  /**
   * @return string
   */
  public function getBackground()
  {
    return $this->background;
  }
  /**
   * @param string
   */
  public function setBorder($border)
  {
    $this->border = $border;
  }
  /**
   * @return string
   */
  public function getBorder()
  {
    return $this->border;
  }
  /**
   * @param string
   */
  public function setText($text)
  {
    $this->text = $text;
  }
  /**
   * @return string
   */
  public function getText()
  {
    return $this->text;
  }
  /**
   * @param string
   */
  public function setTitle($title)
  {
    $this->title = $title;
  }
  /**
   * @return string
   */
  public function getTitle()
  {
    return $this->title;
  }
  /**
   * @param string
   */
  public function setUrl($url)
  {
    $this->url = $url;
  }
  /**
   * @return string
   */
  public function getUrl()
  {
    return $this->url;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AdStyleColors::class, 'Google_Service_AdSenseHost_AdStyleColors');
