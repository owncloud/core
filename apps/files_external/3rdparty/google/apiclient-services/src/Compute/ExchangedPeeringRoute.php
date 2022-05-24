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

class ExchangedPeeringRoute extends \Google\Model
{
  /**
   * @var string
   */
  public $destRange;
  /**
   * @var bool
   */
  public $imported;
  /**
   * @var string
   */
  public $nextHopRegion;
  /**
   * @var string
   */
  public $priority;
  /**
   * @var string
   */
  public $type;

  /**
   * @param string
   */
  public function setDestRange($destRange)
  {
    $this->destRange = $destRange;
  }
  /**
   * @return string
   */
  public function getDestRange()
  {
    return $this->destRange;
  }
  /**
   * @param bool
   */
  public function setImported($imported)
  {
    $this->imported = $imported;
  }
  /**
   * @return bool
   */
  public function getImported()
  {
    return $this->imported;
  }
  /**
   * @param string
   */
  public function setNextHopRegion($nextHopRegion)
  {
    $this->nextHopRegion = $nextHopRegion;
  }
  /**
   * @return string
   */
  public function getNextHopRegion()
  {
    return $this->nextHopRegion;
  }
  /**
   * @param string
   */
  public function setPriority($priority)
  {
    $this->priority = $priority;
  }
  /**
   * @return string
   */
  public function getPriority()
  {
    return $this->priority;
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
class_alias(ExchangedPeeringRoute::class, 'Google_Service_Compute_ExchangedPeeringRoute');
