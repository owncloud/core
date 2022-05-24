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

namespace Google\Service\Sheets;

class GradientRule extends \Google\Model
{
  protected $maxpointType = InterpolationPoint::class;
  protected $maxpointDataType = '';
  protected $midpointType = InterpolationPoint::class;
  protected $midpointDataType = '';
  protected $minpointType = InterpolationPoint::class;
  protected $minpointDataType = '';

  /**
   * @param InterpolationPoint
   */
  public function setMaxpoint(InterpolationPoint $maxpoint)
  {
    $this->maxpoint = $maxpoint;
  }
  /**
   * @return InterpolationPoint
   */
  public function getMaxpoint()
  {
    return $this->maxpoint;
  }
  /**
   * @param InterpolationPoint
   */
  public function setMidpoint(InterpolationPoint $midpoint)
  {
    $this->midpoint = $midpoint;
  }
  /**
   * @return InterpolationPoint
   */
  public function getMidpoint()
  {
    return $this->midpoint;
  }
  /**
   * @param InterpolationPoint
   */
  public function setMinpoint(InterpolationPoint $minpoint)
  {
    $this->minpoint = $minpoint;
  }
  /**
   * @return InterpolationPoint
   */
  public function getMinpoint()
  {
    return $this->minpoint;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GradientRule::class, 'Google_Service_Sheets_GradientRule');
