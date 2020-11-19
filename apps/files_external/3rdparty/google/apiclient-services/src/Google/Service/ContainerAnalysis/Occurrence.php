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

class Google_Service_ContainerAnalysis_Occurrence extends Google_Model
{
  protected $attestationType = 'Google_Service_ContainerAnalysis_Details';
  protected $attestationDataType = '';
  protected $buildType = 'Google_Service_ContainerAnalysis_GrafeasV1beta1BuildDetails';
  protected $buildDataType = '';
  public $createTime;
  protected $deploymentType = 'Google_Service_ContainerAnalysis_GrafeasV1beta1DeploymentDetails';
  protected $deploymentDataType = '';
  protected $derivedImageType = 'Google_Service_ContainerAnalysis_GrafeasV1beta1ImageDetails';
  protected $derivedImageDataType = '';
  protected $discoveredType = 'Google_Service_ContainerAnalysis_GrafeasV1beta1DiscoveryDetails';
  protected $discoveredDataType = '';
  protected $installationType = 'Google_Service_ContainerAnalysis_GrafeasV1beta1PackageDetails';
  protected $installationDataType = '';
  protected $intotoType = 'Google_Service_ContainerAnalysis_GrafeasV1beta1IntotoDetails';
  protected $intotoDataType = '';
  public $kind;
  public $name;
  public $noteName;
  public $remediation;
  protected $resourceType = 'Google_Service_ContainerAnalysis_ContaineranalysisResource';
  protected $resourceDataType = '';
  public $updateTime;
  protected $vulnerabilityType = 'Google_Service_ContainerAnalysis_GrafeasV1beta1VulnerabilityDetails';
  protected $vulnerabilityDataType = '';

  /**
   * @param Google_Service_ContainerAnalysis_Details
   */
  public function setAttestation(Google_Service_ContainerAnalysis_Details $attestation)
  {
    $this->attestation = $attestation;
  }
  /**
   * @return Google_Service_ContainerAnalysis_Details
   */
  public function getAttestation()
  {
    return $this->attestation;
  }
  /**
   * @param Google_Service_ContainerAnalysis_GrafeasV1beta1BuildDetails
   */
  public function setBuild(Google_Service_ContainerAnalysis_GrafeasV1beta1BuildDetails $build)
  {
    $this->build = $build;
  }
  /**
   * @return Google_Service_ContainerAnalysis_GrafeasV1beta1BuildDetails
   */
  public function getBuild()
  {
    return $this->build;
  }
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
  }
  /**
   * @param Google_Service_ContainerAnalysis_GrafeasV1beta1DeploymentDetails
   */
  public function setDeployment(Google_Service_ContainerAnalysis_GrafeasV1beta1DeploymentDetails $deployment)
  {
    $this->deployment = $deployment;
  }
  /**
   * @return Google_Service_ContainerAnalysis_GrafeasV1beta1DeploymentDetails
   */
  public function getDeployment()
  {
    return $this->deployment;
  }
  /**
   * @param Google_Service_ContainerAnalysis_GrafeasV1beta1ImageDetails
   */
  public function setDerivedImage(Google_Service_ContainerAnalysis_GrafeasV1beta1ImageDetails $derivedImage)
  {
    $this->derivedImage = $derivedImage;
  }
  /**
   * @return Google_Service_ContainerAnalysis_GrafeasV1beta1ImageDetails
   */
  public function getDerivedImage()
  {
    return $this->derivedImage;
  }
  /**
   * @param Google_Service_ContainerAnalysis_GrafeasV1beta1DiscoveryDetails
   */
  public function setDiscovered(Google_Service_ContainerAnalysis_GrafeasV1beta1DiscoveryDetails $discovered)
  {
    $this->discovered = $discovered;
  }
  /**
   * @return Google_Service_ContainerAnalysis_GrafeasV1beta1DiscoveryDetails
   */
  public function getDiscovered()
  {
    return $this->discovered;
  }
  /**
   * @param Google_Service_ContainerAnalysis_GrafeasV1beta1PackageDetails
   */
  public function setInstallation(Google_Service_ContainerAnalysis_GrafeasV1beta1PackageDetails $installation)
  {
    $this->installation = $installation;
  }
  /**
   * @return Google_Service_ContainerAnalysis_GrafeasV1beta1PackageDetails
   */
  public function getInstallation()
  {
    return $this->installation;
  }
  /**
   * @param Google_Service_ContainerAnalysis_GrafeasV1beta1IntotoDetails
   */
  public function setIntoto(Google_Service_ContainerAnalysis_GrafeasV1beta1IntotoDetails $intoto)
  {
    $this->intoto = $intoto;
  }
  /**
   * @return Google_Service_ContainerAnalysis_GrafeasV1beta1IntotoDetails
   */
  public function getIntoto()
  {
    return $this->intoto;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setNoteName($noteName)
  {
    $this->noteName = $noteName;
  }
  public function getNoteName()
  {
    return $this->noteName;
  }
  public function setRemediation($remediation)
  {
    $this->remediation = $remediation;
  }
  public function getRemediation()
  {
    return $this->remediation;
  }
  /**
   * @param Google_Service_ContainerAnalysis_ContaineranalysisResource
   */
  public function setResource(Google_Service_ContainerAnalysis_ContaineranalysisResource $resource)
  {
    $this->resource = $resource;
  }
  /**
   * @return Google_Service_ContainerAnalysis_ContaineranalysisResource
   */
  public function getResource()
  {
    return $this->resource;
  }
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
  public function getUpdateTime()
  {
    return $this->updateTime;
  }
  /**
   * @param Google_Service_ContainerAnalysis_GrafeasV1beta1VulnerabilityDetails
   */
  public function setVulnerability(Google_Service_ContainerAnalysis_GrafeasV1beta1VulnerabilityDetails $vulnerability)
  {
    $this->vulnerability = $vulnerability;
  }
  /**
   * @return Google_Service_ContainerAnalysis_GrafeasV1beta1VulnerabilityDetails
   */
  public function getVulnerability()
  {
    return $this->vulnerability;
  }
}
