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
  protected $attestationType = 'Google_Service_ContainerAnalysis_Attestation';
  protected $attestationDataType = '';
  protected $buildDetailsType = 'Google_Service_ContainerAnalysis_BuildDetails';
  protected $buildDetailsDataType = '';
  public $createTime;
  protected $deploymentType = 'Google_Service_ContainerAnalysis_Deployment';
  protected $deploymentDataType = '';
  protected $derivedImageType = 'Google_Service_ContainerAnalysis_Derived';
  protected $derivedImageDataType = '';
  protected $discoveredType = 'Google_Service_ContainerAnalysis_Discovered';
  protected $discoveredDataType = '';
  protected $installationType = 'Google_Service_ContainerAnalysis_Installation';
  protected $installationDataType = '';
  public $kind;
  public $name;
  public $noteName;
  public $remediation;
  protected $resourceType = 'Google_Service_ContainerAnalysis_ContaineranalysisResource';
  protected $resourceDataType = '';
  public $resourceUrl;
  public $updateTime;
  protected $upgradeType = 'Google_Service_ContainerAnalysis_UpgradeOccurrence';
  protected $upgradeDataType = '';
  protected $vulnerabilityDetailsType = 'Google_Service_ContainerAnalysis_VulnerabilityDetails';
  protected $vulnerabilityDetailsDataType = '';

  /**
   * @param Google_Service_ContainerAnalysis_Attestation
   */
  public function setAttestation(Google_Service_ContainerAnalysis_Attestation $attestation)
  {
    $this->attestation = $attestation;
  }
  /**
   * @return Google_Service_ContainerAnalysis_Attestation
   */
  public function getAttestation()
  {
    return $this->attestation;
  }
  /**
   * @param Google_Service_ContainerAnalysis_BuildDetails
   */
  public function setBuildDetails(Google_Service_ContainerAnalysis_BuildDetails $buildDetails)
  {
    $this->buildDetails = $buildDetails;
  }
  /**
   * @return Google_Service_ContainerAnalysis_BuildDetails
   */
  public function getBuildDetails()
  {
    return $this->buildDetails;
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
   * @param Google_Service_ContainerAnalysis_Deployment
   */
  public function setDeployment(Google_Service_ContainerAnalysis_Deployment $deployment)
  {
    $this->deployment = $deployment;
  }
  /**
   * @return Google_Service_ContainerAnalysis_Deployment
   */
  public function getDeployment()
  {
    return $this->deployment;
  }
  /**
   * @param Google_Service_ContainerAnalysis_Derived
   */
  public function setDerivedImage(Google_Service_ContainerAnalysis_Derived $derivedImage)
  {
    $this->derivedImage = $derivedImage;
  }
  /**
   * @return Google_Service_ContainerAnalysis_Derived
   */
  public function getDerivedImage()
  {
    return $this->derivedImage;
  }
  /**
   * @param Google_Service_ContainerAnalysis_Discovered
   */
  public function setDiscovered(Google_Service_ContainerAnalysis_Discovered $discovered)
  {
    $this->discovered = $discovered;
  }
  /**
   * @return Google_Service_ContainerAnalysis_Discovered
   */
  public function getDiscovered()
  {
    return $this->discovered;
  }
  /**
   * @param Google_Service_ContainerAnalysis_Installation
   */
  public function setInstallation(Google_Service_ContainerAnalysis_Installation $installation)
  {
    $this->installation = $installation;
  }
  /**
   * @return Google_Service_ContainerAnalysis_Installation
   */
  public function getInstallation()
  {
    return $this->installation;
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
  public function setResourceUrl($resourceUrl)
  {
    $this->resourceUrl = $resourceUrl;
  }
  public function getResourceUrl()
  {
    return $this->resourceUrl;
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
   * @param Google_Service_ContainerAnalysis_UpgradeOccurrence
   */
  public function setUpgrade(Google_Service_ContainerAnalysis_UpgradeOccurrence $upgrade)
  {
    $this->upgrade = $upgrade;
  }
  /**
   * @return Google_Service_ContainerAnalysis_UpgradeOccurrence
   */
  public function getUpgrade()
  {
    return $this->upgrade;
  }
  /**
   * @param Google_Service_ContainerAnalysis_VulnerabilityDetails
   */
  public function setVulnerabilityDetails(Google_Service_ContainerAnalysis_VulnerabilityDetails $vulnerabilityDetails)
  {
    $this->vulnerabilityDetails = $vulnerabilityDetails;
  }
  /**
   * @return Google_Service_ContainerAnalysis_VulnerabilityDetails
   */
  public function getVulnerabilityDetails()
  {
    return $this->vulnerabilityDetails;
  }
}
