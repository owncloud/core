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

class Formatting extends \Google\Model
{
  /**
   * @var bool
   */
  public $bold;
  /**
   * @var bool
   */
  public $highlight;
  /**
   * @var bool
   */
  public $italics;
  /**
   * @var bool
   */
  public $strikethrough;
  /**
   * @var string
   */
  public $style;
  /**
   * @var bool
   */
  public $underline;

  /**
   * @param bool
   */
  public function setBold($bold)
  {
    $this->bold = $bold;
  }
  /**
   * @return bool
   */
  public function getBold()
  {
    return $this->bold;
  }
  /**
   * @param bool
   */
  public function setHighlight($highlight)
  {
    $this->highlight = $highlight;
  }
  /**
   * @return bool
   */
  public function getHighlight()
  {
    return $this->highlight;
  }
  /**
   * @param bool
   */
  public function setItalics($italics)
  {
    $this->italics = $italics;
  }
  /**
   * @return bool
   */
  public function getItalics()
  {
    return $this->italics;
  }
  /**
   * @param bool
   */
  public function setStrikethrough($strikethrough)
  {
    $this->strikethrough = $strikethrough;
  }
  /**
   * @return bool
   */
  public function getStrikethrough()
  {
    return $this->strikethrough;
  }
  /**
   * @param string
   */
  public function setStyle($style)
  {
    $this->style = $style;
  }
  /**
   * @return string
   */
  public function getStyle()
  {
    return $this->style;
  }
  /**
   * @param bool
   */
  public function setUnderline($underline)
  {
    $this->underline = $underline;
  }
  /**
   * @return bool
   */
  public function getUnderline()
  {
    return $this->underline;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Formatting::class, 'Google_Service_CloudSearch_Formatting');
