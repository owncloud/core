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

namespace Google\Service\Container;

class BlueGreenInfo extends \Google\Collection
{
  protected $collection_key = 'greenInstanceGroupUrls';
  /**
   * @var string[]
   */
  public $blueInstanceGroupUrls;
  /**
   * @var string
   */
  public $bluePoolDeletionStartTime;
  /**
   * @var string[]
   */
  public $greenInstanceGroupUrls;
  /**
   * @var string
   */
  public $greenPoolVersion;
  /**
   * @var string
   */
  public $phase;

  /**
   * @param string[]
   */
  public function setBlueInstanceGroupUrls($blueInstanceGroupUrls)
  {
    $this->blueInstanceGroupUrls = $blueInstanceGroupUrls;
  }
  /**
   * @return string[]
   */
  public function getBlueInstanceGroupUrls()
  {
    return $this->blueInstanceGroupUrls;
  }
  /**
   * @param string
   */
  public function setBluePoolDeletionStartTime($bluePoolDeletionStartTime)
  {
    $this->bluePoolDeletionStartTime = $bluePoolDeletionStartTime;
  }
  /**
   * @return string
   */
  public function getBluePoolDeletionStartTime()
  {
    return $this->bluePoolDeletionStartTime;
  }
  /**
   * @param string[]
   */
  public function setGreenInstanceGroupUrls($greenInstanceGroupUrls)
  {
    $this->greenInstanceGroupUrls = $greenInstanceGroupUrls;
  }
  /**
   * @return string[]
   */
  public function getGreenInstanceGroupUrls()
  {
    return $this->greenInstanceGroupUrls;
  }
  /**
   * @param string
   */
  public function setGreenPoolVersion($greenPoolVersion)
  {
    $this->greenPoolVersion = $greenPoolVersion;
  }
  /**
   * @return string
   */
  public function getGreenPoolVersion()
  {
    return $this->greenPoolVersion;
  }
  /**
   * @param string
   */
  public function setPhase($phase)
  {
    $this->phase = $phase;
  }
  /**
   * @return string
   */
  public function getPhase()
  {
    return $this->phase;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(BlueGreenInfo::class, 'Google_Service_Container_BlueGreenInfo');
