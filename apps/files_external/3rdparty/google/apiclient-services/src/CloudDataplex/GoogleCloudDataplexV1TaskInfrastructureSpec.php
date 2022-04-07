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

namespace Google\Service\CloudDataplex;

class GoogleCloudDataplexV1TaskInfrastructureSpec extends \Google\Model
{
  protected $batchType = GoogleCloudDataplexV1TaskInfrastructureSpecBatchComputeResources::class;
  protected $batchDataType = '';
  protected $containerImageType = GoogleCloudDataplexV1TaskInfrastructureSpecContainerImageRuntime::class;
  protected $containerImageDataType = '';
  protected $vpcNetworkType = GoogleCloudDataplexV1TaskInfrastructureSpecVpcNetwork::class;
  protected $vpcNetworkDataType = '';

  /**
   * @param GoogleCloudDataplexV1TaskInfrastructureSpecBatchComputeResources
   */
  public function setBatch(GoogleCloudDataplexV1TaskInfrastructureSpecBatchComputeResources $batch)
  {
    $this->batch = $batch;
  }
  /**
   * @return GoogleCloudDataplexV1TaskInfrastructureSpecBatchComputeResources
   */
  public function getBatch()
  {
    return $this->batch;
  }
  /**
   * @param GoogleCloudDataplexV1TaskInfrastructureSpecContainerImageRuntime
   */
  public function setContainerImage(GoogleCloudDataplexV1TaskInfrastructureSpecContainerImageRuntime $containerImage)
  {
    $this->containerImage = $containerImage;
  }
  /**
   * @return GoogleCloudDataplexV1TaskInfrastructureSpecContainerImageRuntime
   */
  public function getContainerImage()
  {
    return $this->containerImage;
  }
  /**
   * @param GoogleCloudDataplexV1TaskInfrastructureSpecVpcNetwork
   */
  public function setVpcNetwork(GoogleCloudDataplexV1TaskInfrastructureSpecVpcNetwork $vpcNetwork)
  {
    $this->vpcNetwork = $vpcNetwork;
  }
  /**
   * @return GoogleCloudDataplexV1TaskInfrastructureSpecVpcNetwork
   */
  public function getVpcNetwork()
  {
    return $this->vpcNetwork;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDataplexV1TaskInfrastructureSpec::class, 'Google_Service_CloudDataplex_GoogleCloudDataplexV1TaskInfrastructureSpec');
