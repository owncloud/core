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

class TenancyUnit extends \Google\Collection
{
  protected $collection_key = 'tenantResources';
  public $consumer;
  public $createTime;
  public $name;
  public $service;
  protected $tenantResourcesType = TenantResource::class;
  protected $tenantResourcesDataType = 'array';

  public function setConsumer($consumer)
  {
    $this->consumer = $consumer;
  }
  public function getConsumer()
  {
    return $this->consumer;
  }
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setService($service)
  {
    $this->service = $service;
  }
  public function getService()
  {
    return $this->service;
  }
  /**
   * @param TenantResource[]
   */
  public function setTenantResources($tenantResources)
  {
    $this->tenantResources = $tenantResources;
  }
  /**
   * @return TenantResource[]
   */
  public function getTenantResources()
  {
    return $this->tenantResources;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(TenancyUnit::class, 'Google_Service_ServiceConsumerManagement_TenancyUnit');
