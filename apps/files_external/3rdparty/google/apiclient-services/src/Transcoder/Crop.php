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

class Crop extends \Google\Model
{
  /**
   * @var int
   */
  public $bottomPixels;
  /**
   * @var int
   */
  public $leftPixels;
  /**
   * @var int
   */
  public $rightPixels;
  /**
   * @var int
   */
  public $topPixels;

  /**
   * @param int
   */
  public function setBottomPixels($bottomPixels)
  {
    $this->bottomPixels = $bottomPixels;
  }
  /**
   * @return int
   */
  public function getBottomPixels()
  {
    return $this->bottomPixels;
  }
  /**
   * @param int
   */
  public function setLeftPixels($leftPixels)
  {
    $this->leftPixels = $leftPixels;
  }
  /**
   * @return int
   */
  public function getLeftPixels()
  {
    return $this->leftPixels;
  }
  /**
   * @param int
   */
  public function setRightPixels($rightPixels)
  {
    $this->rightPixels = $rightPixels;
  }
  /**
   * @return int
   */
  public function getRightPixels()
  {
    return $this->rightPixels;
  }
  /**
   * @param int
   */
  public function setTopPixels($topPixels)
  {
    $this->topPixels = $topPixels;
  }
  /**
   * @return int
   */
  public function getTopPixels()
  {
    return $this->topPixels;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Crop::class, 'Google_Service_Transcoder_Crop');
