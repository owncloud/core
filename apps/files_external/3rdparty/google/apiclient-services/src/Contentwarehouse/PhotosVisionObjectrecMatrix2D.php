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

class PhotosVisionObjectrecMatrix2D extends \Google\Model
{
  /**
   * @var float
   */
  public $xx;
  /**
   * @var float
   */
  public $xy;
  /**
   * @var float
   */
  public $yx;
  /**
   * @var float
   */
  public $yy;

  /**
   * @param float
   */
  public function setXx($xx)
  {
    $this->xx = $xx;
  }
  /**
   * @return float
   */
  public function getXx()
  {
    return $this->xx;
  }
  /**
   * @param float
   */
  public function setXy($xy)
  {
    $this->xy = $xy;
  }
  /**
   * @return float
   */
  public function getXy()
  {
    return $this->xy;
  }
  /**
   * @param float
   */
  public function setYx($yx)
  {
    $this->yx = $yx;
  }
  /**
   * @return float
   */
  public function getYx()
  {
    return $this->yx;
  }
  /**
   * @param float
   */
  public function setYy($yy)
  {
    $this->yy = $yy;
  }
  /**
   * @return float
   */
  public function getYy()
  {
    return $this->yy;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PhotosVisionObjectrecMatrix2D::class, 'Google_Service_Contentwarehouse_PhotosVisionObjectrecMatrix2D');
