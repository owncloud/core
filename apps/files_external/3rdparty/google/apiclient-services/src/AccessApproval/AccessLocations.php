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

namespace Google\Service\AccessApproval;

class AccessLocations extends \Google\Model
{
  /**
   * @var string
   */
  public $principalOfficeCountry;
  /**
   * @var string
   */
  public $principalPhysicalLocationCountry;

  /**
   * @param string
   */
  public function setPrincipalOfficeCountry($principalOfficeCountry)
  {
    $this->principalOfficeCountry = $principalOfficeCountry;
  }
  /**
   * @return string
   */
  public function getPrincipalOfficeCountry()
  {
    return $this->principalOfficeCountry;
  }
  /**
   * @param string
   */
  public function setPrincipalPhysicalLocationCountry($principalPhysicalLocationCountry)
  {
    $this->principalPhysicalLocationCountry = $principalPhysicalLocationCountry;
  }
  /**
   * @return string
   */
  public function getPrincipalPhysicalLocationCountry()
  {
    return $this->principalPhysicalLocationCountry;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AccessLocations::class, 'Google_Service_AccessApproval_AccessLocations');
