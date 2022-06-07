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

namespace Google\Service\GKEHub;

class MembershipEndpoint extends \Google\Model
{
  protected $applianceClusterType = ApplianceCluster::class;
  protected $applianceClusterDataType = '';
  protected $edgeClusterType = EdgeCluster::class;
  protected $edgeClusterDataType = '';
  protected $gkeClusterType = GkeCluster::class;
  protected $gkeClusterDataType = '';
  protected $kubernetesMetadataType = KubernetesMetadata::class;
  protected $kubernetesMetadataDataType = '';
  protected $kubernetesResourceType = KubernetesResource::class;
  protected $kubernetesResourceDataType = '';
  protected $multiCloudClusterType = MultiCloudCluster::class;
  protected $multiCloudClusterDataType = '';
  protected $onPremClusterType = OnPremCluster::class;
  protected $onPremClusterDataType = '';

  /**
   * @param ApplianceCluster
   */
  public function setApplianceCluster(ApplianceCluster $applianceCluster)
  {
    $this->applianceCluster = $applianceCluster;
  }
  /**
   * @return ApplianceCluster
   */
  public function getApplianceCluster()
  {
    return $this->applianceCluster;
  }
  /**
   * @param EdgeCluster
   */
  public function setEdgeCluster(EdgeCluster $edgeCluster)
  {
    $this->edgeCluster = $edgeCluster;
  }
  /**
   * @return EdgeCluster
   */
  public function getEdgeCluster()
  {
    return $this->edgeCluster;
  }
  /**
   * @param GkeCluster
   */
  public function setGkeCluster(GkeCluster $gkeCluster)
  {
    $this->gkeCluster = $gkeCluster;
  }
  /**
   * @return GkeCluster
   */
  public function getGkeCluster()
  {
    return $this->gkeCluster;
  }
  /**
   * @param KubernetesMetadata
   */
  public function setKubernetesMetadata(KubernetesMetadata $kubernetesMetadata)
  {
    $this->kubernetesMetadata = $kubernetesMetadata;
  }
  /**
   * @return KubernetesMetadata
   */
  public function getKubernetesMetadata()
  {
    return $this->kubernetesMetadata;
  }
  /**
   * @param KubernetesResource
   */
  public function setKubernetesResource(KubernetesResource $kubernetesResource)
  {
    $this->kubernetesResource = $kubernetesResource;
  }
  /**
   * @return KubernetesResource
   */
  public function getKubernetesResource()
  {
    return $this->kubernetesResource;
  }
  /**
   * @param MultiCloudCluster
   */
  public function setMultiCloudCluster(MultiCloudCluster $multiCloudCluster)
  {
    $this->multiCloudCluster = $multiCloudCluster;
  }
  /**
   * @return MultiCloudCluster
   */
  public function getMultiCloudCluster()
  {
    return $this->multiCloudCluster;
  }
  /**
   * @param OnPremCluster
   */
  public function setOnPremCluster(OnPremCluster $onPremCluster)
  {
    $this->onPremCluster = $onPremCluster;
  }
  /**
   * @return OnPremCluster
   */
  public function getOnPremCluster()
  {
    return $this->onPremCluster;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(MembershipEndpoint::class, 'Google_Service_GKEHub_MembershipEndpoint');
