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

namespace Google\Service\Contentwarehouse;

class VideoFileFramePackingArrangement extends \Google\Model
{
  /**
   * @var int
   */
  public $gridOffset0Horizontal;
  /**
   * @var int
   */
  public $gridOffset0Vertical;
  /**
   * @var int
   */
  public $gridOffset1Horizontal;
  /**
   * @var int
   */
  public $gridOffset1Vertical;
  /**
   * @var string
   */
  public $interpretation;
  /**
   * @var bool
   */
  public $quincunxSampling;
  /**
   * @var string
   */
  public $type;

  /**
   * @param int
   */
  public function setGridOffset0Horizontal($gridOffset0Horizontal)
  {
    $this->gridOffset0Horizontal = $gridOffset0Horizontal;
  }
  /**
   * @return int
   */
  public function getGridOffset0Horizontal()
  {
    return $this->gridOffset0Horizontal;
  }
  /**
   * @param int
   */
  public function setGridOffset0Vertical($gridOffset0Vertical)
  {
    $this->gridOffset0Vertical = $gridOffset0Vertical;
  }
  /**
   * @return int
   */
  public function getGridOffset0Vertical()
  {
    return $this->gridOffset0Vertical;
  }
  /**
   * @param int
   */
  public function setGridOffset1Horizontal($gridOffset1Horizontal)
  {
    $this->gridOffset1Horizontal = $gridOffset1Horizontal;
  }
  /**
   * @return int
   */
  public function getGridOffset1Horizontal()
  {
    return $this->gridOffset1Horizontal;
  }
  /**
   * @param int
   */
  public function setGridOffset1Vertical($gridOffset1Vertical)
  {
    $this->gridOffset1Vertical = $gridOffset1Vertical;
  }
  /**
   * @return int
   */
  public function getGridOffset1Vertical()
  {
    return $this->gridOffset1Vertical;
  }
  /**
   * @param string
   */
  public function setInterpretation($interpretation)
  {
    $this->interpretation = $interpretation;
  }
  /**
   * @return string
   */
  public function getInterpretation()
  {
    return $this->interpretation;
  }
  /**
   * @param bool
   */
  public function setQuincunxSampling($quincunxSampling)
  {
    $this->quincunxSampling = $quincunxSampling;
  }
  /**
   * @return bool
   */
  public function getQuincunxSampling()
  {
    return $this->quincunxSampling;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VideoFileFramePackingArrangement::class, 'Google_Service_Contentwarehouse_VideoFileFramePackingArrangement');
