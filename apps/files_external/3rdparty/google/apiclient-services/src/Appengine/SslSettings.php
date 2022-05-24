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

namespace Google\Service\Appengine;

class SslSettings extends \Google\Model
{
  /**
   * @var string
   */
  public $certificateId;
  /**
   * @var string
   */
  public $pendingManagedCertificateId;
  /**
   * @var string
   */
  public $sslManagementType;

  /**
   * @param string
   */
  public function setCertificateId($certificateId)
  {
    $this->certificateId = $certificateId;
  }
  /**
   * @return string
   */
  public function getCertificateId()
  {
    return $this->certificateId;
  }
  /**
   * @param string
   */
  public function setPendingManagedCertificateId($pendingManagedCertificateId)
  {
    $this->pendingManagedCertificateId = $pendingManagedCertificateId;
  }
  /**
   * @return string
   */
  public function getPendingManagedCertificateId()
  {
    return $this->pendingManagedCertificateId;
  }
  /**
   * @param string
   */
  public function setSslManagementType($sslManagementType)
  {
    $this->sslManagementType = $sslManagementType;
  }
  /**
   * @return string
   */
  public function getSslManagementType()
  {
    return $this->sslManagementType;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SslSettings::class, 'Google_Service_Appengine_SslSettings');
