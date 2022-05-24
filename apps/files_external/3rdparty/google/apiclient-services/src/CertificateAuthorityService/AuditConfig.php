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

class AuditConfig extends \Google\Collection
{
  protected $collection_key = 'auditLogConfigs';
  protected $auditLogConfigsType = AuditLogConfig::class;
  protected $auditLogConfigsDataType = 'array';
  /**
   * @var string
   */
  public $service;

  /**
   * @param AuditLogConfig[]
   */
  public function setAuditLogConfigs($auditLogConfigs)
  {
    $this->auditLogConfigs = $auditLogConfigs;
  }
  /**
   * @return AuditLogConfig[]
   */
  public function getAuditLogConfigs()
  {
    return $this->auditLogConfigs;
  }
  /**
   * @param string
   */
  public function setService($service)
  {
    $this->service = $service;
  }
  /**
   * @return string
   */
  public function getService()
  {
    return $this->service;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AuditConfig::class, 'Google_Service_CertificateAuthorityService_AuditConfig');
