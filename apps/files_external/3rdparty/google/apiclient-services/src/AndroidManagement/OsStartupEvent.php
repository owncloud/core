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

namespace Google\Service\AndroidManagement;

class OsStartupEvent extends \Google\Model
{
  /**
   * @var string
   */
  public $verifiedBootState;
  /**
   * @var string
   */
  public $verityMode;

  /**
   * @param string
   */
  public function setVerifiedBootState($verifiedBootState)
  {
    $this->verifiedBootState = $verifiedBootState;
  }
  /**
   * @return string
   */
  public function getVerifiedBootState()
  {
    return $this->verifiedBootState;
  }
  /**
   * @param string
   */
  public function setVerityMode($verityMode)
  {
    $this->verityMode = $verityMode;
  }
  /**
   * @return string
   */
  public function getVerityMode()
  {
    return $this->verityMode;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(OsStartupEvent::class, 'Google_Service_AndroidManagement_OsStartupEvent');
