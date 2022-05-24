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
  protected $attestationType = AttestationOccurrence::class;
  protected $attestationDataType = '';
  protected $buildType = BuildOccurrence::class;
  protected $buildDataType = '';
  protected $complianceType = ComplianceOccurrence::class;
  protected $complianceDataType = '';
  /**
   * @var string
   */
  public $createTime;
  protected $deploymentType = DeploymentOccurrence::class;
  protected $deploymentDataType = '';
  protected $discoveryType = DiscoveryOccurrence::class;
  protected $discoveryDataType = '';
  protected $dsseAttestationType = DSSEAttestationOccurrence::class;
  protected $dsseAttestationDataType = '';
  protected $envelopeType = Envelope::class;
  protected $envelopeDataType = '';
  protected $imageType = ImageOccurrence::class;
  protected $imageDataType = '';
  /**
   * @var string
   */
  public $kind;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $noteName;
  protected $packageType = PackageOccurrence::class;
  protected $packageDataType = '';
  /**
   * @var string
   */
  public $remediation;
  /**
   * @var string
   */
  public $resourceUri;
  /**
   * @var string
   */
  public $updateTime;
  protected $upgradeType = UpgradeOccurrence::class;
  protected $upgradeDataType = '';
  protected $vulnerabilityType = VulnerabilityOccurrence::class;
  protected $vulnerabilityDataType = '';

  /**
   * @param AttestationOccurrence
   */
  public function setAttestation(AttestationOccurrence $attestation)
  {
    $this->attestation = $attestation;
  }
  /**
   * @return AttestationOccurrence
   */
  public function getAttestation()
  {
    return $this->attestation;
  }
  /**
   * @param BuildOccurrence
   */
  public function setBuild(BuildOccurrence $build)
  {
    $this->build = $build;
  }
  /**
   * @return BuildOccurrence
   */
  public function getBuild()
  {
    return $this->build;
  }
  /**
   * @param ComplianceOccurrence
   */
  public function setCompliance(ComplianceOccurrence $compliance)
  {
    $this->compliance = $compliance;
  }
  /**
   * @return ComplianceOccurrence
   */
  public function getCompliance()
  {
    return $this->compliance;
  }
  /**
   * @param string
   */
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  /**
   * @return string
   */
  public function getCreateTime()
  {
    return $this->createTime;
  }
  /**
   * @param DeploymentOccurrence
   */
  public function setDeployment(DeploymentOccurrence $deployment)
  {
    $this->deployment = $deployment;
  }
  /**
   * @return DeploymentOccurrence
   */
  public function getDeployment()
  {
    return $this->deployment;
  }
  /**
   * @param DiscoveryOccurrence
   */
  public function setDiscovery(DiscoveryOccurrence $discovery)
  {
    $this->discovery = $discovery;
  }
  /**
   * @return DiscoveryOccurrence
   */
  public function getDiscovery()
  {
    return $this->discovery;
  }
  /**
   * @param DSSEAttestationOccurrence
   */
  public function setDsseAttestation(DSSEAttestationOccurrence $dsseAttestation)
  {
    $this->dsseAttestation = $dsseAttestation;
  }
  /**
   * @return DSSEAttestationOccurrence
   */
  public function getDsseAttestation()
  {
    return $this->dsseAttestation;
  }
  /**
   * @param Envelope
   */
  public function setEnvelope(Envelope $envelope)
  {
    $this->envelope = $envelope;
  }
  /**
   * @return Envelope
   */
  public function getEnvelope()
  {
    return $this->envelope;
  }
  /**
   * @param ImageOccurrence
   */
  public function setImage(ImageOccurrence $image)
  {
    $this->image = $image;
  }
  /**
   * @return ImageOccurrence
   */
  public function getImage()
  {
    return $this->image;
  }
  /**
   * @param string
   */
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  /**
   * @return string
   */
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param string
   */
  public function setNoteName($noteName)
  {
    $this->noteName = $noteName;
  }
  /**
   * @return string
   */
  public function getNoteName()
  {
    return $this->noteName;
  }
  /**
   * @param PackageOccurrence
   */
  public function setPackage(PackageOccurrence $package)
  {
    $this->package = $package;
  }
  /**
   * @return PackageOccurrence
   */
  public function getPackage()
  {
    return $this->package;
  }
  /**
   * @param string
   */
  public function setRemediation($remediation)
  {
    $this->remediation = $remediation;
  }
  /**
   * @return string
   */
  public function getRemediation()
  {
    return $this->remediation;
  }
  /**
   * @param string
   */
  public function setResourceUri($resourceUri)
  {
    $this->resourceUri = $resourceUri;
  }
  /**
   * @return string
   */
  public function getResourceUri()
  {
    return $this->resourceUri;
  }
  /**
   * @param string
   */
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
  /**
   * @return string
   */
  public function getUpdateTime()
  {
    return $this->updateTime;
  }
  /**
   * @param UpgradeOccurrence
   */
  public function setUpgrade(UpgradeOccurrence $upgrade)
  {
    $this->upgrade = $upgrade;
  }
  /**
   * @return UpgradeOccurrence
   */
  public function getUpgrade()
  {
    return $this->upgrade;
  }
  /**
   * @param VulnerabilityOccurrence
   */
  public function setVulnerability(VulnerabilityOccurrence $vulnerability)
  {
    $this->vulnerability = $vulnerability;
  }
  /**
   * @return VulnerabilityOccurrence
   */
  public function getVulnerability()
  {
    return $this->vulnerability;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Occurrence::class, 'Google_Service_ContainerAnalysis_Occurrence');
