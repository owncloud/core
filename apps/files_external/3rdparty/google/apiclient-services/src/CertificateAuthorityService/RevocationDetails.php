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

namespace Google\Service\CertificateAuthorityService;

class RevocationDetails extends \Google\Model
{
  /**
   * @var string
   */
  public $revocationState;
  /**
   * @var string
   */
  public $revocationTime;

  /**
   * @param string
   */
  public function setRevocationState($revocationState)
  {
    $this->revocationState = $revocationState;
  }
  /**
   * @return string
   */
  public function getRevocationState()
  {
    return $this->revocationState;
  }
  /**
   * @param string
   */
  public function setRevocationTime($revocationTime)
  {
    $this->revocationTime = $revocationTime;
  }
  /**
   * @return string
   */
  public function getRevocationTime()
  {
    return $this->revocationTime;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RevocationDetails::class, 'Google_Service_CertificateAuthorityService_RevocationDetails');
