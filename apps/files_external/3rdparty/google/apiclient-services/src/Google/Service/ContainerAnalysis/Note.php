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

class Google_Service_ContainerAnalysis_Note extends Google_Collection
{
  protected $collection_key = 'relatedUrl';
  protected $attestationAuthorityType = 'Google_Service_ContainerAnalysis_Authority';
  protected $attestationAuthorityDataType = '';
  protected $baseImageType = 'Google_Service_ContainerAnalysis_Basis';
  protected $baseImageDataType = '';
  protected $buildType = 'Google_Service_ContainerAnalysis_Build';
  protected $buildDataType = '';
  public $createTime;
  protected $deployableType = 'Google_Service_ContainerAnalysis_Deployable';
  protected $deployableDataType = '';
  protected $discoveryType = 'Google_Service_ContainerAnalysis_Discovery';
  protected $discoveryDataType = '';
  public $expirationTime;
  protected $intotoType = 'Google_Service_ContainerAnalysis_InToto';
  protected $intotoDataType = '';
  public $kind;
  public $longDescription;
  public $name;
  protected $packageType = 'Google_Service_ContainerAnalysis_Package';
  protected $packageDataType = '';
  public $relatedNoteNames;
  protected $relatedUrlType = 'Google_Service_ContainerAnalysis_RelatedUrl';
  protected $relatedUrlDataType = 'array';
  public $shortDescription;
  public $updateTime;
  protected $vulnerabilityType = 'Google_Service_ContainerAnalysis_Vulnerability';
  protected $vulnerabilityDataType = '';

  /**
   * @param Google_Service_ContainerAnalysis_Authority
   */
  public function setAttestationAuthority(Google_Service_ContainerAnalysis_Authority $attestationAuthority)
  {
    $this->attestationAuthority = $attestationAuthority;
  }
  /**
   * @return Google_Service_ContainerAnalysis_Authority
   */
  public function getAttestationAuthority()
  {
    return $this->attestationAuthority;
  }
  /**
   * @param Google_Service_ContainerAnalysis_Basis
   */
  public function setBaseImage(Google_Service_ContainerAnalysis_Basis $baseImage)
  {
    $this->baseImage = $baseImage;
  }
  /**
   * @return Google_Service_ContainerAnalysis_Basis
   */
  public function getBaseImage()
  {
    return $this->baseImage;
  }
  /**
   * @param Google_Service_ContainerAnalysis_Build
   */
  public function setBuild(Google_Service_ContainerAnalysis_Build $build)
  {
    $this->build = $build;
  }
  /**
   * @return Google_Service_ContainerAnalysis_Build
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
   * @param Google_Service_ContainerAnalysis_Deployable
   */
  public function setDeployable(Google_Service_ContainerAnalysis_Deployable $deployable)
  {
    $this->deployable = $deployable;
  }
  /**
   * @return Google_Service_ContainerAnalysis_Deployable
   */
  public function getDeployable()
  {
    return $this->deployable;
  }
  /**
   * @param Google_Service_ContainerAnalysis_Discovery
   */
  public function setDiscovery(Google_Service_ContainerAnalysis_Discovery $discovery)
  {
    $this->discovery = $discovery;
  }
  /**
   * @return Google_Service_ContainerAnalysis_Discovery
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
   * @param Google_Service_ContainerAnalysis_InToto
   */
  public function setIntoto(Google_Service_ContainerAnalysis_InToto $intoto)
  {
    $this->intoto = $intoto;
  }
  /**
   * @return Google_Service_ContainerAnalysis_InToto
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
   * @param Google_Service_ContainerAnalysis_Package
   */
  public function setPackage(Google_Service_ContainerAnalysis_Package $package)
  {
    $this->package = $package;
  }
  /**
   * @return Google_Service_ContainerAnalysis_Package
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
   * @param Google_Service_ContainerAnalysis_RelatedUrl
   */
  public function setRelatedUrl($relatedUrl)
  {
    $this->relatedUrl = $relatedUrl;
  }
  /**
   * @return Google_Service_ContainerAnalysis_RelatedUrl
   */
  public function getRelatedUrl()
  {
    return $this->relatedUrl;
  }
  public function setShortDescription($shortDescription)
  {
    $this->shortDescription = $shortDescription;
  }
  public function getShortDescription()
  {
    return $this->shortDescription;
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
   * @param Google_Service_ContainerAnalysis_Vulnerability
   */
  public function setVulnerability(Google_Service_ContainerAnalysis_Vulnerability $vulnerability)
  {
    $this->vulnerability = $vulnerability;
  }
  /**
   * @return Google_Service_ContainerAnalysis_Vulnerability
   */
  public function getVulnerability()
  {
    return $this->vulnerability;
  }
}
