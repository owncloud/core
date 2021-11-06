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

namespace Google\Service\Apigateway;

class ApigatewayApiConfig extends \Google\Collection
{
  protected $collection_key = 'openapiDocuments';
  public $createTime;
  public $displayName;
  public $gatewayServiceAccount;
  protected $grpcServicesType = ApigatewayApiConfigGrpcServiceDefinition::class;
  protected $grpcServicesDataType = 'array';
  public $labels;
  protected $managedServiceConfigsType = ApigatewayApiConfigFile::class;
  protected $managedServiceConfigsDataType = 'array';
  public $name;
  protected $openapiDocumentsType = ApigatewayApiConfigOpenApiDocument::class;
  protected $openapiDocumentsDataType = 'array';
  public $serviceConfigId;
  public $state;
  public $updateTime;

  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
  }
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
  }
  public function setGatewayServiceAccount($gatewayServiceAccount)
  {
    $this->gatewayServiceAccount = $gatewayServiceAccount;
  }
  public function getGatewayServiceAccount()
  {
    return $this->gatewayServiceAccount;
  }
  /**
   * @param ApigatewayApiConfigGrpcServiceDefinition[]
   */
  public function setGrpcServices($grpcServices)
  {
    $this->grpcServices = $grpcServices;
  }
  /**
   * @return ApigatewayApiConfigGrpcServiceDefinition[]
   */
  public function getGrpcServices()
  {
    return $this->grpcServices;
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
   * @param ApigatewayApiConfigFile[]
   */
  public function setManagedServiceConfigs($managedServiceConfigs)
  {
    $this->managedServiceConfigs = $managedServiceConfigs;
  }
  /**
   * @return ApigatewayApiConfigFile[]
   */
  public function getManagedServiceConfigs()
  {
    return $this->managedServiceConfigs;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param ApigatewayApiConfigOpenApiDocument[]
   */
  public function setOpenapiDocuments($openapiDocuments)
  {
    $this->openapiDocuments = $openapiDocuments;
  }
  /**
   * @return ApigatewayApiConfigOpenApiDocument[]
   */
  public function getOpenapiDocuments()
  {
    return $this->openapiDocuments;
  }
  public function setServiceConfigId($serviceConfigId)
  {
    $this->serviceConfigId = $serviceConfigId;
  }
  public function getServiceConfigId()
  {
    return $this->serviceConfigId;
  }
  public function setState($state)
  {
    $this->state = $state;
  }
  public function getState()
  {
    return $this->state;
  }
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
  public function getUpdateTime()
  {
    return $this->updateTime;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ApigatewayApiConfig::class, 'Google_Service_Apigateway_ApigatewayApiConfig');
