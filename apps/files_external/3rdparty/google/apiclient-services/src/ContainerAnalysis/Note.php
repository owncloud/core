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

class Note extends \Google\Collection
{
  protected $collection_key = 'relatedUrl';
  protected $attestationAuthorityType = Authority::class;
  protected $attestationAuthorityDataType = '';
  protected $baseImageType = Basis::class;
  protected $baseImageDataType = '';
  protected $buildType = Build::class;
  protected $buildDataType = '';
  public $createTime;
  protected $deployableType = Deployable::class;
  protected $deployableDataType = '';
  protected $discoveryType = Discovery::class;
  protected $discoveryDataType = '';
  public $expirationTime;
  protected $intotoType = InToto::class;
  protected $intotoDataType = '';
  public $kind;
  public $longDescription;
  public $name;
  protected $packageType = Package::class;
  protected $packageDataType = '';
  public $relatedNoteNames;
  protected $relatedUrlType = RelatedUrl::class;
  protected $relatedUrlDataType = 'array';
  protected $sbomType = DocumentNote::class;
  protected $sbomDataType = '';
  public $shortDescription;
  protected $spdxFileType = FileNote::class;
  protected $spdxFileDataType = '';
  protected $spdxPackageType = PackageNote::class;
  protected $spdxPackageDataType = '';
  protected $spdxRelationshipType = RelationshipNote::class;
  protected $spdxRelationshipDataType = '';
  public $updateTime;
  protected $vulnerabilityType = Vulnerability::class;
  protected $vulnerabilityDataType = '';

  /**
   * @param Authority
   */
  public function setAttestationAuthority(Authority $attestationAuthority)
  {
    $this->attestationAuthority = $attestationAuthority;
  }
  /**
   * @return Authority
   */
  public function getAttestationAuthority()
  {
    return $this->attestationAuthority;
  }
  /**
   * @param Basis
   */
  public function setBaseImage(Basis $baseImage)
  {
    $this->baseImage = $baseImage;
  }
  /**
   * @return Basis
   */
  public function getBaseImage()
  {
    return $this->baseImage;
  }
  /**
   * @param Build
   */
  public function setBuild(Build $build)
  {
    $this->build = $build;
  }
  /**
   * @return Build
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
   * @param Deployable
   */
  public function setDeployable(Deployable $deployable)
  {
    $this->deployable = $deployable;
  }
  /**
   * @return Deployable
   */
  public function getDeployable()
  {
    return $this->deployable;
  }
  /**
   * @param Discovery
   */
  public function setDiscovery(Discovery $discovery)
  {
    $this->discovery = $discovery;
  }
  /**
   * @return Discovery
   */
  public function getDiscovery()
  {
    return $this->discovery;
  }
  public function setExpirationTime($expirationTime)
  {
    $this->expirationTime = $expirationTime;
  }
  public function getExpirationTime()
  {
    return $this->expirationTime;
  }
  /**
   * @param InToto
   */
  public function setIntoto(InToto $intoto)
  {
    $this->intoto = $intoto;
  }
  /**
   * @return InToto
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
  public function setLongDescription($longDescription)
  {
    $this->longDescription = $longDescription;
  }
  public function getLongDescription()
  {
    return $this->longDescription;
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
   * @param Package
   */
  public function setPackage(Package $package)
  {
    $this->package = $package;
  }
  /**
   * @return Package
   */
  public function getPackage()
  {
    return $this->package;
  }
  public function setRelatedNoteNames($relatedNoteNames)
  {
    $this->relatedNoteNames = $relatedNoteNames;
  }
  public function getRelatedNoteNames()
  {
    return $this->relatedNoteNames;
  }
  /**
   * @param RelatedUrl[]
   */
  public function setRelatedUrl($relatedUrl)
  {
    $this->relatedUrl = $relatedUrl;
  }
  /**
   * @return RelatedUrl[]
   */
  public function getRelatedUrl()
  {
    return $this->relatedUrl;
  }
  /**
   * @param DocumentNote
   */
  public function setSbom(DocumentNote $sbom)
  {
    $this->sbom = $sbom;
  }
  /**
   * @return DocumentNote
   */
  public function getSbom()
  {
    return $this->sbom;
  }
  public function setShortDescription($shortDescription)
  {
    $this->shortDescription = $shortDescription;
  }
  public function getShortDescription()
  {
    return $this->shortDescription;
  }
  /**
   * @param FileNote
   */
  public function setSpdxFile(FileNote $spdxFile)
  {
    $this->spdxFile = $spdxFile;
  }
  /**
   * @return FileNote
   */
  public function getSpdxFile()
  {
    return $this->spdxFile;
  }
  /**
   * @param PackageNote
   */
  public function setSpdxPackage(PackageNote $spdxPackage)
  {
    $this->spdxPackage = $spdxPackage;
  }
  /**
   * @return PackageNote
   */
  public function getSpdxPackage()
  {
    return $this->spdxPackage;
  }
  /**
   * @param RelationshipNote
   */
  public function setSpdxRelationship(RelationshipNote $spdxRelationship)
  {
    $this->spdxRelationship = $spdxRelationship;
  }
  /**
   * @return RelationshipNote
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
   * @param Vulnerability
   */
  public function setVulnerability(Vulnerability $vulnerability)
  {
    $this->vulnerability = $vulnerability;
  }
  /**
   * @return Vulnerability
   */
  public function getVulnerability()
  {
    return $this->vulnerability;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Note::class, 'Google_Service_ContainerAnalysis_Note');
