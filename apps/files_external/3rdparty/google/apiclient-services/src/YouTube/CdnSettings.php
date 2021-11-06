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

namespace Google\Service\YouTube;

class CdnSettings extends \Google\Model
{
  public $format;
  public $frameRate;
  protected $ingestionInfoType = IngestionInfo::class;
  protected $ingestionInfoDataType = '';
  public $ingestionType;
  public $resolution;

  public function setFormat($format)
  {
    $this->format = $format;
  }
  public function getFormat()
  {
    return $this->format;
  }
  public function setFrameRate($frameRate)
  {
    $this->frameRate = $frameRate;
  }
  public function getFrameRate()
  {
    return $this->frameRate;
  }
  /**
   * @param IngestionInfo
   */
  public function setIngestionInfo(IngestionInfo $ingestionInfo)
  {
    $this->ingestionInfo = $ingestionInfo;
  }
  /**
   * @return IngestionInfo
   */
  public function getIngestionInfo()
  {
    return $this->ingestionInfo;
  }
  public function setIngestionType($ingestionType)
  {
    $this->ingestionType = $ingestionType;
  }
  public function getIngestionType()
  {
    return $this->ingestionType;
  }
  public function setResolution($resolution)
  {
    $this->resolution = $resolution;
  }
  public function getResolution()
  {
    return $this->resolution;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CdnSettings::class, 'Google_Service_YouTube_CdnSettings');
