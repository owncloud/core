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

namespace Google\Service\CloudSearch;

class UnmappedIdentity extends \Google\Model
{
  protected $externalIdentityType = Principal::class;
  protected $externalIdentityDataType = '';
  /**
   * @var string
   */
  public $resolutionStatusCode;

  /**
   * @param Principal
   */
  public function setExternalIdentity(Principal $externalIdentity)
  {
    $this->externalIdentity = $externalIdentity;
  }
  /**
   * @return Principal
   */
  public function getExternalIdentity()
  {
    return $this->externalIdentity;
  }
  /**
   * @param string
   */
  public function setResolutionStatusCode($resolutionStatusCode)
  {
    $this->resolutionStatusCode = $resolutionStatusCode;
  }
  /**
   * @return string
   */
  public function getResolutionStatusCode()
  {
    return $this->resolutionStatusCode;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(UnmappedIdentity::class, 'Google_Service_CloudSearch_UnmappedIdentity');
