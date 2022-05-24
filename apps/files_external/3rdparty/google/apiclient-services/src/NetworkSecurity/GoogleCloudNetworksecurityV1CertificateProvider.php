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

namespace Google\Service\NetworkSecurity;

class GoogleCloudNetworksecurityV1CertificateProvider extends \Google\Model
{
  protected $certificateProviderInstanceType = CertificateProviderInstance::class;
  protected $certificateProviderInstanceDataType = '';
  protected $grpcEndpointType = GoogleCloudNetworksecurityV1GrpcEndpoint::class;
  protected $grpcEndpointDataType = '';

  /**
   * @param CertificateProviderInstance
   */
  public function setCertificateProviderInstance(CertificateProviderInstance $certificateProviderInstance)
  {
    $this->certificateProviderInstance = $certificateProviderInstance;
  }
  /**
   * @return CertificateProviderInstance
   */
  public function getCertificateProviderInstance()
  {
    return $this->certificateProviderInstance;
  }
  /**
   * @param GoogleCloudNetworksecurityV1GrpcEndpoint
   */
  public function setGrpcEndpoint(GoogleCloudNetworksecurityV1GrpcEndpoint $grpcEndpoint)
  {
    $this->grpcEndpoint = $grpcEndpoint;
  }
  /**
   * @return GoogleCloudNetworksecurityV1GrpcEndpoint
   */
  public function getGrpcEndpoint()
  {
    return $this->grpcEndpoint;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudNetworksecurityV1CertificateProvider::class, 'Google_Service_NetworkSecurity_GoogleCloudNetworksecurityV1CertificateProvider');
