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
  public $bottomPixels;
  public $leftPixels;
  public $rightPixels;
  public $topPixels;

  public function setBottomPixels($bottomPixels)
  {
    $this->bottomPixels = $bottomPixels;
  }
  public function getBottomPixels()
  {
    return $this->bottomPixels;
  }
  public function setLeftPixels($leftPixels)
  {
    $this->leftPixels = $leftPixels;
  }
  public function getLeftPixels()
  {
    return $this->leftPixels;
  }
  public function setRightPixels($rightPixels)
  {
    $this->rightPixels = $rightPixels;
  }
  public function getRightPixels()
  {
    return $this->rightPixels;
  }
  public function setTopPixels($topPixels)
  {
    $this->topPixels = $topPixels;
  }
  public function getTopPixels()
  {
    return $this->topPixels;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Crop::class, 'Google_Service_Transcoder_Crop');
