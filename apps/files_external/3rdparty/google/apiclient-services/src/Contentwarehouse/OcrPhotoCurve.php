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

class OcrPhotoCurve extends \Google\Collection
{
  protected $collection_key = 'points';
  protected $pointsType = OcrPhotoCurvePoint::class;
  protected $pointsDataType = 'array';

  /**
   * @param OcrPhotoCurvePoint[]
   */
  public function setPoints($points)
  {
    $this->points = $points;
  }
  /**
   * @return OcrPhotoCurvePoint[]
   */
  public function getPoints()
  {
    return $this->points;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(OcrPhotoCurve::class, 'Google_Service_Contentwarehouse_OcrPhotoCurve');
