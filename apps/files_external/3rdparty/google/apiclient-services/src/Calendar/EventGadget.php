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

namespace Google\Service\Calendar;

class EventGadget extends \Google\Model
{
  /**
   * @var string
   */
  public $display;
  /**
   * @var int
   */
  public $height;
  /**
   * @var string
   */
  public $iconLink;
  /**
   * @var string
   */
  public $link;
  /**
   * @var string[]
   */
  public $preferences;
  /**
   * @var string
   */
  public $title;
  /**
   * @var string
   */
  public $type;
  /**
   * @var int
   */
  public $width;

  /**
   * @param string
   */
  public function setDisplay($display)
  {
    $this->display = $display;
  }
  /**
   * @return string
   */
  public function getDisplay()
  {
    return $this->display;
  }
  /**
   * @param int
   */
  public function setHeight($height)
  {
    $this->height = $height;
  }
  /**
   * @return int
   */
  public function getHeight()
  {
    return $this->height;
  }
  /**
   * @param string
   */
  public function setIconLink($iconLink)
  {
    $this->iconLink = $iconLink;
  }
  /**
   * @return string
   */
  public function getIconLink()
  {
    return $this->iconLink;
  }
  /**
   * @param string
   */
  public function setLink($link)
  {
    $this->link = $link;
  }
  /**
   * @return string
   */
  public function getLink()
  {
    return $this->link;
  }
  /**
   * @param string[]
   */
  public function setPreferences($preferences)
  {
    $this->preferences = $preferences;
  }
  /**
   * @return string[]
   */
  public function getPreferences()
  {
    return $this->preferences;
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
  public function setType($type)
  {
    $this->type = $type;
  }
  /**
   * @return string
   */
  public function getType()
  {
    return $this->type;
  }
  /**
   * @param int
   */
  public function setWidth($width)
  {
    $this->width = $width;
  }
  /**
   * @return int
   */
  public function getWidth()
  {
    return $this->width;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(EventGadget::class, 'Google_Service_Calendar_EventGadget');
