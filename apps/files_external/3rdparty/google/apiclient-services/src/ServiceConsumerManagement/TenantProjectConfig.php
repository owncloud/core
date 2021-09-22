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

namespace Google\Service\ServiceConsumerManagement;

class TenantProjectConfig extends \Google\Collection
{
  protected $collection_key = 'services';
  protected $billingConfigType = BillingConfig::class;
  protected $billingConfigDataType = '';
  public $folder;
  public $labels;
  protected $serviceAccountConfigType = ServiceAccountConfig::class;
  protected $serviceAccountConfigDataType = '';
  public $services;
  protected $tenantProjectPolicyType = TenantProjectPolicy::class;
  protected $tenantProjectPolicyDataType = '';

  /**
   * @param BillingConfig
   */
  public function setBillingConfig(BillingConfig $billingConfig)
  {
    $this->billingConfig = $billingConfig;
  }
  /**
   * @return BillingConfig
   */
  public function getBillingConfig()
  {
    return $this->billingConfig;
  }
  public function setFolder($folder)
  {
    $this->folder = $folder;
  }
  public function getFolder()
  {
    return $this->folder;
  }
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  public function getLabels()
  {
    return $this->labels;
  }
  /**
   * @param ServiceAccountConfig
   */
  public function setServiceAccountConfig(ServiceAccountConfig $serviceAccountConfig)
  {
    $this->serviceAccountConfig = $serviceAccountConfig;
  }
  /**
   * @return ServiceAccountConfig
   */
  public function getServiceAccountConfig()
  {
    return $this->serviceAccountConfig;
  }
  public function setServices($services)
  {
    $this->services = $services;
  }
  public function getServices()
  {
    return $this->services;
  }
  /**
   * @param TenantProjectPolicy
   */
  public function setTenantProjectPolicy(TenantProjectPolicy $tenantProjectPolicy)
  {
    $this->tenantProjectPolicy = $tenantProjectPolicy;
  }
  /**
   * @return TenantProjectPolicy
   */
  public function getTenantProjectPolicy()
  {
    return $this->tenantProjectPolicy;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(TenantProjectConfig::class, 'Google_Service_ServiceConsumerManagement_TenantProjectConfig');
