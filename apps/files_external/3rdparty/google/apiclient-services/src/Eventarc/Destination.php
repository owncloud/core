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

namespace Google\Service\Eventarc;

class Destination extends \Google\Model
{
  /**
   * @var string
   */
  public $cloudFunction;
  protected $cloudRunType = CloudRun::class;
  protected $cloudRunDataType = '';
  protected $gkeType = GKE::class;
  protected $gkeDataType = '';

  /**
   * @param string
   */
  public function setCloudFunction($cloudFunction)
  {
    $this->cloudFunction = $cloudFunction;
  }
  /**
   * @return string
   */
  public function getCloudFunction()
  {
    return $this->cloudFunction;
  }
  /**
   * @param CloudRun
   */
  public function setCloudRun(CloudRun $cloudRun)
  {
    $this->cloudRun = $cloudRun;
  }
  /**
   * @return CloudRun
   */
  public function getCloudRun()
  {
    return $this->cloudRun;
  }
  /**
   * @param GKE
   */
  public function setGke(GKE $gke)
  {
    $this->gke = $gke;
  }
  /**
   * @return GKE
   */
  public function getGke()
  {
    return $this->gke;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Destination::class, 'Google_Service_Eventarc_Destination');
