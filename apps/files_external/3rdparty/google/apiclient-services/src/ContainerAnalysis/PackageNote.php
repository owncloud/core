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

class PackageNote extends \Google\Collection
{
  protected $collection_key = 'distribution';
  /**
   * @var string
   */
  public $architecture;
  /**
   * @var string
   */
  public $cpeUri;
  /**
   * @var string
   */
  public $description;
  protected $digestType = Digest::class;
  protected $digestDataType = 'array';
  protected $distributionType = Distribution::class;
  protected $distributionDataType = 'array';
  protected $licenseType = License::class;
  protected $licenseDataType = '';
  /**
   * @var string
   */
  public $maintainer;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $packageType;
  /**
   * @var string
   */
  public $url;
  protected $versionType = Version::class;
  protected $versionDataType = '';

  /**
   * @param string
   */
  public function setArchitecture($architecture)
  {
    $this->architecture = $architecture;
  }
  /**
   * @return string
   */
  public function getArchitecture()
  {
    return $this->architecture;
  }
  /**
   * @param string
   */
  public function setCpeUri($cpeUri)
  {
    $this->cpeUri = $cpeUri;
  }
  /**
   * @return string
   */
  public function getCpeUri()
  {
    return $this->cpeUri;
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
   * @param Digest[]
   */
  public function setDigest($digest)
  {
    $this->digest = $digest;
  }
  /**
   * @return Digest[]
   */
  public function getDigest()
  {
    return $this->digest;
  }
  /**
   * @param Distribution[]
   */
  public function setDistribution($distribution)
  {
    $this->distribution = $distribution;
  }
  /**
   * @return Distribution[]
   */
  public function getDistribution()
  {
    return $this->distribution;
  }
  /**
   * @param License
   */
  public function setLicense(License $license)
  {
    $this->license = $license;
  }
  /**
   * @return License
   */
  public function getLicense()
  {
    return $this->license;
  }
  /**
   * @param string
   */
  public function setMaintainer($maintainer)
  {
    $this->maintainer = $maintainer;
  }
  /**
   * @return string
   */
  public function getMaintainer()
  {
    return $this->maintainer;
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
  public function setPackageType($packageType)
  {
    $this->packageType = $packageType;
  }
  /**
   * @return string
   */
  public function getPackageType()
  {
    return $this->packageType;
  }
  /**
   * @param string
   */
  public function setUrl($url)
  {
    $this->url = $url;
  }
  /**
   * @return string
   */
  public function getUrl()
  {
    return $this->url;
  }
  /**
   * @param Version
   */
  public function setVersion(Version $version)
  {
    $this->version = $version;
  }
  /**
   * @return Version
   */
  public function getVersion()
  {
    return $this->version;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PackageNote::class, 'Google_Service_ContainerAnalysis_PackageNote');
