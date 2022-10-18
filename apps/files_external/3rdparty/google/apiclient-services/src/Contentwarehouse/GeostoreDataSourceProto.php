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

namespace Google\Service\Contentwarehouse;

class GeostoreDataSourceProto extends \Google\Collection
{
  protected $collection_key = 'rawMetadata';
  protected $attributionUrlType = GeostoreUrlProto::class;
  protected $attributionUrlDataType = 'array';
  /**
   * @var string
   */
  public $copyrightOwner;
  /**
   * @var int
   */
  public $copyrightYear;
  /**
   * @var string
   */
  public $description;
  /**
   * @var string
   */
  public $importerBuildInfo;
  /**
   * @var string
   */
  public $importerBuildTarget;
  /**
   * @var string
   */
  public $importerClientInfo;
  /**
   * @var string
   */
  public $importerMpmVersion;
  /**
   * @var string
   */
  public $importerTimestamp;
  /**
   * @var string
   */
  public $provider;
  protected $rawMetadataType = GeostoreRawMetadataProto::class;
  protected $rawMetadataDataType = 'array';
  /**
   * @var string
   */
  public $release;
  protected $releaseDateType = GeostoreDateTimeProto::class;
  protected $releaseDateDataType = '';
  /**
   * @var string
   */
  public $sourceDataset;

  /**
   * @param GeostoreUrlProto[]
   */
  public function setAttributionUrl($attributionUrl)
  {
    $this->attributionUrl = $attributionUrl;
  }
  /**
   * @return GeostoreUrlProto[]
   */
  public function getAttributionUrl()
  {
    return $this->attributionUrl;
  }
  /**
   * @param string
   */
  public function setCopyrightOwner($copyrightOwner)
  {
    $this->copyrightOwner = $copyrightOwner;
  }
  /**
   * @return string
   */
  public function getCopyrightOwner()
  {
    return $this->copyrightOwner;
  }
  /**
   * @param int
   */
  public function setCopyrightYear($copyrightYear)
  {
    $this->copyrightYear = $copyrightYear;
  }
  /**
   * @return int
   */
  public function getCopyrightYear()
  {
    return $this->copyrightYear;
  }
  /**
   * @param string
   */
  public function setDescription($description)
  {
    $this->description = $description;
  }
  /**
   * @return string
   */
  public function getDescription()
  {
    return $this->description;
  }
  /**
   * @param string
   */
  public function setImporterBuildInfo($importerBuildInfo)
  {
    $this->importerBuildInfo = $importerBuildInfo;
  }
  /**
   * @return string
   */
  public function getImporterBuildInfo()
  {
    return $this->importerBuildInfo;
  }
  /**
   * @param string
   */
  public function setImporterBuildTarget($importerBuildTarget)
  {
    $this->importerBuildTarget = $importerBuildTarget;
  }
  /**
   * @return string
   */
  public function getImporterBuildTarget()
  {
    return $this->importerBuildTarget;
  }
  /**
   * @param string
   */
  public function setImporterClientInfo($importerClientInfo)
  {
    $this->importerClientInfo = $importerClientInfo;
  }
  /**
   * @return string
   */
  public function getImporterClientInfo()
  {
    return $this->importerClientInfo;
  }
  /**
   * @param string
   */
  public function setImporterMpmVersion($importerMpmVersion)
  {
    $this->importerMpmVersion = $importerMpmVersion;
  }
  /**
   * @return string
   */
  public function getImporterMpmVersion()
  {
    return $this->importerMpmVersion;
  }
  /**
   * @param string
   */
  public function setImporterTimestamp($importerTimestamp)
  {
    $this->importerTimestamp = $importerTimestamp;
  }
  /**
   * @return string
   */
  public function getImporterTimestamp()
  {
    return $this->importerTimestamp;
  }
  /**
   * @param string
   */
  public function setProvider($provider)
  {
    $this->provider = $provider;
  }
  /**
   * @return string
   */
  public function getProvider()
  {
    return $this->provider;
  }
  /**
   * @param GeostoreRawMetadataProto[]
   */
  public function setRawMetadata($rawMetadata)
  {
    $this->rawMetadata = $rawMetadata;
  }
  /**
   * @return GeostoreRawMetadataProto[]
   */
  public function getRawMetadata()
  {
    return $this->rawMetadata;
  }
  /**
   * @param string
   */
  public function setRelease($release)
  {
    $this->release = $release;
  }
  /**
   * @return string
   */
  public function getRelease()
  {
    return $this->release;
  }
  /**
   * @param GeostoreDateTimeProto
   */
  public function setReleaseDate(GeostoreDateTimeProto $releaseDate)
  {
    $this->releaseDate = $releaseDate;
  }
  /**
   * @return GeostoreDateTimeProto
   */
  public function getReleaseDate()
  {
    return $this->releaseDate;
  }
  /**
   * @param string
   */
  public function setSourceDataset($sourceDataset)
  {
    $this->sourceDataset = $sourceDataset;
  }
  /**
   * @return string
   */
  public function getSourceDataset()
  {
    return $this->sourceDataset;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GeostoreDataSourceProto::class, 'Google_Service_Contentwarehouse_GeostoreDataSourceProto');
