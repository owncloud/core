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

class LocalWWWInfo extends \Google\Collection
{
  protected $collection_key = 'wrapptorItem';
  protected $addressType = LocalWWWInfoAddress::class;
  protected $addressDataType = 'array';
  public $brickAndMortarStrength;
  protected $clusterType = LocalWWWInfoCluster::class;
  protected $clusterDataType = 'array';
  /**
   * @var string
   */
  public $docid;
  protected $geotopicalityType = RepositoryAnnotationsGeoTopicality::class;
  protected $geotopicalityDataType = '';
  protected $hoursType = LocalWWWInfoOpeningHours::class;
  protected $hoursDataType = 'array';
  /**
   * @var bool
   */
  public $isLargeChain;
  /**
   * @var bool
   */
  public $isLargeLocalwwwinfo;
  protected $phoneType = LocalWWWInfoPhone::class;
  protected $phoneDataType = 'array';
  /**
   * @var int
   */
  public $siteSiblings;
  /**
   * @var string
   */
  public $url;
  protected $wrapptorItemType = LocalWWWInfoWrapptorItem::class;
  protected $wrapptorItemDataType = 'array';

  /**
   * @param LocalWWWInfoAddress[]
   */
  public function setAddress($address)
  {
    $this->address = $address;
  }
  /**
   * @return LocalWWWInfoAddress[]
   */
  public function getAddress()
  {
    return $this->address;
  }
  public function setBrickAndMortarStrength($brickAndMortarStrength)
  {
    $this->brickAndMortarStrength = $brickAndMortarStrength;
  }
  public function getBrickAndMortarStrength()
  {
    return $this->brickAndMortarStrength;
  }
  /**
   * @param LocalWWWInfoCluster[]
   */
  public function setCluster($cluster)
  {
    $this->cluster = $cluster;
  }
  /**
   * @return LocalWWWInfoCluster[]
   */
  public function getCluster()
  {
    return $this->cluster;
  }
  /**
   * @param string
   */
  public function setDocid($docid)
  {
    $this->docid = $docid;
  }
  /**
   * @return string
   */
  public function getDocid()
  {
    return $this->docid;
  }
  /**
   * @param RepositoryAnnotationsGeoTopicality
   */
  public function setGeotopicality(RepositoryAnnotationsGeoTopicality $geotopicality)
  {
    $this->geotopicality = $geotopicality;
  }
  /**
   * @return RepositoryAnnotationsGeoTopicality
   */
  public function getGeotopicality()
  {
    return $this->geotopicality;
  }
  /**
   * @param LocalWWWInfoOpeningHours[]
   */
  public function setHours($hours)
  {
    $this->hours = $hours;
  }
  /**
   * @return LocalWWWInfoOpeningHours[]
   */
  public function getHours()
  {
    return $this->hours;
  }
  /**
   * @param bool
   */
  public function setIsLargeChain($isLargeChain)
  {
    $this->isLargeChain = $isLargeChain;
  }
  /**
   * @return bool
   */
  public function getIsLargeChain()
  {
    return $this->isLargeChain;
  }
  /**
   * @param bool
   */
  public function setIsLargeLocalwwwinfo($isLargeLocalwwwinfo)
  {
    $this->isLargeLocalwwwinfo = $isLargeLocalwwwinfo;
  }
  /**
   * @return bool
   */
  public function getIsLargeLocalwwwinfo()
  {
    return $this->isLargeLocalwwwinfo;
  }
  /**
   * @param LocalWWWInfoPhone[]
   */
  public function setPhone($phone)
  {
    $this->phone = $phone;
  }
  /**
   * @return LocalWWWInfoPhone[]
   */
  public function getPhone()
  {
    return $this->phone;
  }
  /**
   * @param int
   */
  public function setSiteSiblings($siteSiblings)
  {
    $this->siteSiblings = $siteSiblings;
  }
  /**
   * @return int
   */
  public function getSiteSiblings()
  {
    return $this->siteSiblings;
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
   * @param LocalWWWInfoWrapptorItem[]
   */
  public function setWrapptorItem($wrapptorItem)
  {
    $this->wrapptorItem = $wrapptorItem;
  }
  /**
   * @return LocalWWWInfoWrapptorItem[]
   */
  public function getWrapptorItem()
  {
    return $this->wrapptorItem;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(LocalWWWInfo::class, 'Google_Service_Contentwarehouse_LocalWWWInfo');
