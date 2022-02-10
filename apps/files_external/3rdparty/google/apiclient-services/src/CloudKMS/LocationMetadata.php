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

namespace Google\Service\CloudKMS;

class LocationMetadata extends \Google\Model
{
  /**
   * @var bool
   */
  public $ekmAvailable;
  /**
   * @var bool
   */
  public $hsmAvailable;

  /**
   * @param bool
   */
  public function setEkmAvailable($ekmAvailable)
  {
    $this->ekmAvailable = $ekmAvailable;
  }
  /**
   * @return bool
   */
  public function getEkmAvailable()
  {
    return $this->ekmAvailable;
  }
  /**
   * @param bool
   */
  public function setHsmAvailable($hsmAvailable)
  {
    $this->hsmAvailable = $hsmAvailable;
  }
  /**
   * @return bool
   */
  public function getHsmAvailable()
  {
    return $this->hsmAvailable;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(LocationMetadata::class, 'Google_Service_CloudKMS_LocationMetadata');
