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

namespace Google\Service\ContainerAnalysis;

class Occurrence extends \Google\Model
{
  protected $attestationType = Details::class;
  protected $attestationDataType = '';
  protected $buildType = GrafeasV1beta1BuildDetails::class;
  protected $buildDataType = '';
  public $createTime;
  protected $deploymentType = GrafeasV1beta1DeploymentDetails::class;
  protected $deploymentDataType = '';
  protected $derivedImageType = GrafeasV1beta1ImageDetails::class;
  protected $derivedImageDataType = '';
  protected $discoveredType = GrafeasV1beta1DiscoveryDetails::class;
  protected $discoveredDataType = '';
  protected $installationType = GrafeasV1beta1PackageDetails::class;
  protected $installationDataType = '';
  protected $intotoType = GrafeasV1beta1IntotoDetails::class;
  protected $intotoDataType = '';
  public $kind;
  public $name;
  public $noteName;
  public $remediation;
  protected $resourceType = ContaineranalysisResource::class;
  protected $resourceDataType = '';
  protected $sbomType = DocumentOccurrence::class;
  protected $sbomDataType = '';
  protected $spdxFileType = FileOccurrence::class;
  protected $spdxFileDataType = '';
  protected $spdxPackageType = PackageOccurrence::class;
  protected $spdxPackageDataType = '';
  protected $spdxRelationshipType = RelationshipOccurrence::class;
  protected $spdxRelationshipDataType = '';
  public $updateTime;
  protected $vulnerabilityType = GrafeasV1beta1VulnerabilityDetails::class;
  protected $vulnerabilityDataType = '';

  /**
   * @param Details
   */
  public function setAttestation(Details $attestation)
  {
    $this->attestation = $attestation;
  }
  /**
   * @return Details
   */
  public function getAttestation()
  {
    return $this->attestation;
  }
  /**
   * @param GrafeasV1beta1BuildDetails
   */
  public function setBuild(GrafeasV1beta1BuildDetails $build)
  {
    $this->build = $build;
  }
  /**
   * @return GrafeasV1beta1BuildDetails
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
   * @param GrafeasV1beta1DeploymentDetails
   */
  public function setDeployment(GrafeasV1beta1DeploymentDetails $deployment)
  {
    $this->deployment = $deployment;
  }
  /**
   * @return GrafeasV1beta1DeploymentDetails
   */
  public function getDeployment()
  {
    return $this->deployment;
  }
  /**
   * @param GrafeasV1beta1ImageDetails
   */
  public function setDerivedImage(GrafeasV1beta1ImageDetails $derivedImage)
  {
    $this->derivedImage = $derivedImage;
  }
  /**
   * @return GrafeasV1beta1ImageDetails
   */
  public function getDerivedImage()
  {
    return $this->derivedImage;
  }
  /**
   * @param GrafeasV1beta1DiscoveryDetails
   */
  public function setDiscovered(GrafeasV1beta1DiscoveryDetails $discovered)
  {
    $this->discovered = $discovered;
  }
  /**
   * @return GrafeasV1beta1DiscoveryDetails
   */
  public function getDiscovered()
  {
    return $this->discovered;
  }
  /**
   * @param GrafeasV1beta1PackageDetails
   */
  public function setInstallation(GrafeasV1beta1PackageDetails $installation)
  {
    $this->installation = $installation;
  }
  /**
   * @return GrafeasV1beta1PackageDetails
   */
  public function getInstallation()
  {
    return $this->installation;
  }
  /**
   * @param GrafeasV1beta1IntotoDetails
   */
  public function setIntoto(GrafeasV1beta1IntotoDetails $intoto)
  {
    $this->intoto = $intoto;
  }
  /**
   * @return GrafeasV1beta1IntotoDetails
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
   * @param ContaineranalysisResource
   */
  public function setResource(ContaineranalysisResource $resource)
  {
    $this->resource = $resource;
  }
  /**
   * @return ContaineranalysisResource
   */
  public function getResource()
  {
    return $this->resource;
  }
  /**
   * @param DocumentOccurrence
   */
  public function setSbom(DocumentOccurrence $sbom)
  {
    $this->sbom = $sbom;
  }
  /**
   * @return DocumentOccurrence
   */
  public function getSbom()
  {
    return $this->sbom;
  }
  /**
   * @param FileOccurrence
   */
  public function setSpdxFile(FileOccurrence $spdxFile)
  {
    $this->spdxFile = $spdxFile;
  }
  /**
   * @return FileOccurrence
   */
  public function getSpdxFile()
  {
    return $this->spdxFile;
  }
  /**
   * @param PackageOccurrence
   */
  public function setSpdxPackage(PackageOccurrence $spdxPackage)
  {
    $this->spdxPackage = $spdxPackage;
  }
  /**
   * @return PackageOccurrence
   */
  public function getSpdxPackage()
  {
    return $this->spdxPackage;
  }
  /**
   * @param RelationshipOccurrence
   */
  public function setSpdxRelationship(RelationshipOccurrence $spdxRelationship)
  {
    $this->spdxRelationship = $spdxRelationship;
  }
  /**
   * @return RelationshipOccurrence
   */
  public function getSpdxRelationship()
  {
    return $this->spdxRelationship;
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
   * @param GrafeasV1beta1VulnerabilityDetails
   */
  public function setVulnerability(GrafeasV1beta1VulnerabilityDetails $vulnerability)
  {
    $this->vulnerability = $vulnerability;
  }
  /**
   * @return GrafeasV1beta1VulnerabilityDetails
   */
  public function getVulnerability()
  {
    return $this->vulnerability;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Occurrence::class, 'Google_Service_ContainerAnalysis_Occurrence');
