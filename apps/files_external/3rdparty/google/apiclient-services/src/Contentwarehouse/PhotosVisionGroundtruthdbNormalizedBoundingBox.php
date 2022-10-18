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

class PhotosVisionGroundtruthdbNormalizedBoundingBox extends \Google\Model
{
  /**
   * @var float
   */
  public $xmax;
  /**
   * @var float
   */
  public $xmin;
  /**
   * @var float
   */
  public $ymax;
  /**
   * @var float
   */
  public $ymin;

  /**
   * @param float
   */
  public function setXmax($xmax)
  {
    $this->xmax = $xmax;
  }
  /**
   * @return float
   */
  public function getXmax()
  {
    return $this->xmax;
  }
  /**
   * @param float
   */
  public function setXmin($xmin)
  {
    $this->xmin = $xmin;
  }
  /**
   * @return float
   */
  public function getXmin()
  {
    return $this->xmin;
  }
  /**
   * @param float
   */
  public function setYmax($ymax)
  {
    $this->ymax = $ymax;
  }
  /**
   * @return float
   */
  public function getYmax()
  {
    return $this->ymax;
  }
  /**
   * @param float
   */
  public function setYmin($ymin)
  {
    $this->ymin = $ymin;
  }
  /**
   * @return float
   */
  public function getYmin()
  {
    return $this->ymin;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PhotosVisionGroundtruthdbNormalizedBoundingBox::class, 'Google_Service_Contentwarehouse_PhotosVisionGroundtruthdbNormalizedBoundingBox');
