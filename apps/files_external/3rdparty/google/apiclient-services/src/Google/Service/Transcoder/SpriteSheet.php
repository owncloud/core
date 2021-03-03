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

class Google_Service_Transcoder_SpriteSheet extends Google_Model
{
  public $columnCount;
  public $endTimeOffset;
  public $filePrefix;
  public $format;
  public $interval;
  public $quality;
  public $rowCount;
  public $spriteHeightPixels;
  public $spriteWidthPixels;
  public $startTimeOffset;
  public $totalCount;

  public function setColumnCount($columnCount)
  {
    $this->columnCount = $columnCount;
  }
  public function getColumnCount()
  {
    return $this->columnCount;
  }
  public function setEndTimeOffset($endTimeOffset)
  {
    $this->endTimeOffset = $endTimeOffset;
  }
  public function getEndTimeOffset()
  {
    return $this->endTimeOffset;
  }
  public function setFilePrefix($filePrefix)
  {
    $this->filePrefix = $filePrefix;
  }
  public function getFilePrefix()
  {
    return $this->filePrefix;
  }
  public function setFormat($format)
  {
    $this->format = $format;
  }
  public function getFormat()
  {
    return $this->format;
  }
  public function setInterval($interval)
  {
    $this->interval = $interval;
  }
  public function getInterval()
  {
    return $this->interval;
  }
  public function setQuality($quality)
  {
    $this->quality = $quality;
  }
  public function getQuality()
  {
    return $this->quality;
  }
  public function setRowCount($rowCount)
  {
    $this->rowCount = $rowCount;
  }
  public function getRowCount()
  {
    return $this->rowCount;
  }
  public function setSpriteHeightPixels($spriteHeightPixels)
  {
    $this->spriteHeightPixels = $spriteHeightPixels;
  }
  public function getSpriteHeightPixels()
  {
    return $this->spriteHeightPixels;
  }
  public function setSpriteWidthPixels($spriteWidthPixels)
  {
    $this->spriteWidthPixels = $spriteWidthPixels;
  }
  public function getSpriteWidthPixels()
  {
    return $this->spriteWidthPixels;
  }
  public function setStartTimeOffset($startTimeOffset)
  {
    $this->startTimeOffset = $startTimeOffset;
  }
  public function getStartTimeOffset()
  {
    return $this->startTimeOffset;
  }
  public function setTotalCount($totalCount)
  {
    $this->totalCount = $totalCount;
  }
  public function getTotalCount()
  {
    return $this->totalCount;
  }
}
