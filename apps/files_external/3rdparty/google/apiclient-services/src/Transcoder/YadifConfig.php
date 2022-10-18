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

class YadifConfig extends \Google\Model
{
  /**
   * @var bool
   */
  public $deinterlaceAllFrames;
  /**
   * @var bool
   */
  public $disableSpatialInterlacing;
  /**
   * @var string
   */
  public $mode;
  /**
   * @var string
   */
  public $parity;

  /**
   * @param bool
   */
  public function setDeinterlaceAllFrames($deinterlaceAllFrames)
  {
    $this->deinterlaceAllFrames = $deinterlaceAllFrames;
  }
  /**
   * @return bool
   */
  public function getDeinterlaceAllFrames()
  {
    return $this->deinterlaceAllFrames;
  }
  /**
   * @param bool
   */
  public function setDisableSpatialInterlacing($disableSpatialInterlacing)
  {
    $this->disableSpatialInterlacing = $disableSpatialInterlacing;
  }
  /**
   * @return bool
   */
  public function getDisableSpatialInterlacing()
  {
    return $this->disableSpatialInterlacing;
  }
  /**
   * @param string
   */
  public function setMode($mode)
  {
    $this->mode = $mode;
  }
  /**
   * @return string
   */
  public function getMode()
  {
    return $this->mode;
  }
  /**
   * @param string
   */
  public function setParity($parity)
  {
    $this->parity = $parity;
  }
  /**
   * @return string
   */
  public function getParity()
  {
    return $this->parity;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(YadifConfig::class, 'Google_Service_Transcoder_YadifConfig');
