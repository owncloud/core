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

class RegionInstanceGroupManagersApplyUpdatesRequest extends \Google\Collection
{
  protected $collection_key = 'instances';
  /**
   * @var bool
   */
  public $allInstances;
  /**
   * @var string[]
   */
  public $instances;
  /**
   * @var string
   */
  public $minimalAction;
  /**
   * @var string
   */
  public $mostDisruptiveAllowedAction;

  /**
   * @param bool
   */
  public function setAllInstances($allInstances)
  {
    $this->allInstances = $allInstances;
  }
  /**
   * @return bool
   */
  public function getAllInstances()
  {
    return $this->allInstances;
  }
  /**
   * @param string[]
   */
  public function setInstances($instances)
  {
    $this->instances = $instances;
  }
  /**
   * @return string[]
   */
  public function getInstances()
  {
    return $this->instances;
  }
  /**
   * @param string
   */
  public function setMinimalAction($minimalAction)
  {
    $this->minimalAction = $minimalAction;
  }
  /**
   * @return string
   */
  public function getMinimalAction()
  {
    return $this->minimalAction;
  }
  /**
   * @param string
   */
  public function setMostDisruptiveAllowedAction($mostDisruptiveAllowedAction)
  {
    $this->mostDisruptiveAllowedAction = $mostDisruptiveAllowedAction;
  }
  /**
   * @return string
   */
  public function getMostDisruptiveAllowedAction()
  {
    return $this->mostDisruptiveAllowedAction;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RegionInstanceGroupManagersApplyUpdatesRequest::class, 'Google_Service_Compute_RegionInstanceGroupManagersApplyUpdatesRequest');
