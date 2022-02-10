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

namespace Google\Service\Books;

class VolumeUserInfoRentalPeriod extends \Google\Model
{
  /**
   * @var string
   */
  public $endUtcSec;
  /**
   * @var string
   */
  public $startUtcSec;

  /**
   * @param string
   */
  public function setEndUtcSec($endUtcSec)
  {
    $this->endUtcSec = $endUtcSec;
  }
  /**
   * @return string
   */
  public function getEndUtcSec()
  {
    return $this->endUtcSec;
  }
  /**
   * @param string
   */
  public function setStartUtcSec($startUtcSec)
  {
    $this->startUtcSec = $startUtcSec;
  }
  /**
   * @return string
   */
  public function getStartUtcSec()
  {
    return $this->startUtcSec;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VolumeUserInfoRentalPeriod::class, 'Google_Service_Books_VolumeUserInfoRentalPeriod');
