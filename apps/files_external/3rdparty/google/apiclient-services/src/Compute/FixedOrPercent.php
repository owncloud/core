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

namespace Google\Service\Compute;

class FixedOrPercent extends \Google\Model
{
  public $calculated;
  public $fixed;
  public $percent;

  public function setCalculated($calculated)
  {
    $this->calculated = $calculated;
  }
  public function getCalculated()
  {
    return $this->calculated;
  }
  public function setFixed($fixed)
  {
    $this->fixed = $fixed;
  }
  public function getFixed()
  {
    return $this->fixed;
  }
  public function setPercent($percent)
  {
    $this->percent = $percent;
  }
  public function getPercent()
  {
    return $this->percent;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(FixedOrPercent::class, 'Google_Service_Compute_FixedOrPercent');
