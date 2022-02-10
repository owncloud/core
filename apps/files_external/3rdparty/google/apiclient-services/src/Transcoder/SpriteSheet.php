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

namespace Google\Service\Transcoder;

class SpriteSheet extends \Google\Model
{
  /**
   * @var int
   */
  public $columnCount;
  /**
   * @var string
   */
  public $endTimeOffset;
  /**
   * @var string
   */
  public $filePrefix;
  /**
   * @var string
   */
  public $format;
  /**
   * @var string
   */
  public $interval;
  /**
   * @var int
   */
  public $quality;
  /**
   * @var int
   */
  public $rowCount;
  /**
   * @var int
   */
  public $spriteHeightPixels;
  /**
   * @var int
   */
  public $spriteWidthPixels;
  /**
   * @var string
   */
  public $startTimeOffset;
  /**
   * @var int
   */
  public $totalCount;

  /**
   * @param int
   */
  public function setColumnCount($columnCount)
  {
    $this->columnCount = $columnCount;
  }
  /**
   * @return int
   */
  public function getColumnCount()
  {
    return $this->columnCount;
  }
  /**
   * @param string
   */
  public function setEndTimeOffset($endTimeOffset)
  {
    $this->endTimeOffset = $endTimeOffset;
  }
  /**
   * @return string
   */
  public function getEndTimeOffset()
  {
    return $this->endTimeOffset;
  }
  /**
   * @param string
   */
  public function setFilePrefix($filePrefix)
  {
    $this->filePrefix = $filePrefix;
  }
  /**
   * @return string
   */
  public function getFilePrefix()
  {
    return $this->filePrefix;
  }
  /**
   * @param string
   */
  public function setFormat($format)
  {
    $this->format = $format;
  }
  /**
   * @return string
   */
  public function getFormat()
  {
    return $this->format;
  }
  /**
   * @param string
   */
  public function setInterval($interval)
  {
    $this->interval = $interval;
  }
  /**
   * @return string
   */
  public function getInterval()
  {
    return $this->interval;
  }
  /**
   * @param int
   */
  public function setQuality($quality)
  {
    $this->quality = $quality;
  }
  /**
   * @return int
   */
  public function getQuality()
  {
    return $this->quality;
  }
  /**
   * @param int
   */
  public function setRowCount($rowCount)
  {
    $this->rowCount = $rowCount;
  }
  /**
   * @return int
   */
  public function getRowCount()
  {
    return $this->rowCount;
  }
  /**
   * @param int
   */
  public function setSpriteHeightPixels($spriteHeightPixels)
  {
    $this->spriteHeightPixels = $spriteHeightPixels;
  }
  /**
   * @return int
   */
  public function getSpriteHeightPixels()
  {
    return $this->spriteHeightPixels;
  }
  /**
   * @param int
   */
  public function setSpriteWidthPixels($spriteWidthPixels)
  {
    $this->spriteWidthPixels = $spriteWidthPixels;
  }
  /**
   * @return int
   */
  public function getSpriteWidthPixels()
  {
    return $this->spriteWidthPixels;
  }
  /**
   * @param string
   */
  public function setStartTimeOffset($startTimeOffset)
  {
    $this->startTimeOffset = $startTimeOffset;
  }
  /**
   * @return string
   */
  public function getStartTimeOffset()
  {
    return $this->startTimeOffset;
  }
  /**
   * @param int
   */
  public function setTotalCount($totalCount)
  {
    $this->totalCount = $totalCount;
  }
  /**
   * @return int
   */
  public function getTotalCount()
  {
    return $this->totalCount;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SpriteSheet::class, 'Google_Service_Transcoder_SpriteSheet');
