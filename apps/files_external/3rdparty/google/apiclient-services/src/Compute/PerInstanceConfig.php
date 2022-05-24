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

class PerInstanceConfig extends \Google\Model
{
  /**
   * @var string
   */
  public $fingerprint;
  /**
   * @var string
   */
  public $name;
  protected $preservedStateType = PreservedState::class;
  protected $preservedStateDataType = '';
  /**
   * @var string
   */
  public $status;

  /**
   * @param string
   */
  public function setFingerprint($fingerprint)
  {
    $this->fingerprint = $fingerprint;
  }
  /**
   * @return string
   */
  public function getFingerprint()
  {
    return $this->fingerprint;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param PreservedState
   */
  public function setPreservedState(PreservedState $preservedState)
  {
    $this->preservedState = $preservedState;
  }
  /**
   * @return PreservedState
   */
  public function getPreservedState()
  {
    return $this->preservedState;
  }
  /**
   * @param string
   */
  public function setStatus($status)
  {
    $this->status = $status;
  }
  /**
   * @return string
   */
  public function getStatus()
  {
    return $this->status;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PerInstanceConfig::class, 'Google_Service_Compute_PerInstanceConfig');
