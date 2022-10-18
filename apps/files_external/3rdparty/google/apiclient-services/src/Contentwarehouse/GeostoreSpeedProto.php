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

class GeostoreSpeedProto extends \Google\Model
{
  /**
   * @var float
   */
  public $speed;
  /**
   * @var string
   */
  public $unit;

  /**
   * @param float
   */
  public function setSpeed($speed)
  {
    $this->speed = $speed;
  }
  /**
   * @return float
   */
  public function getSpeed()
  {
    return $this->speed;
  }
  /**
   * @param string
   */
  public function setUnit($unit)
  {
    $this->unit = $unit;
  }
  /**
   * @return string
   */
  public function getUnit()
  {
    return $this->unit;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GeostoreSpeedProto::class, 'Google_Service_Contentwarehouse_GeostoreSpeedProto');
