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

class LocalWWWInfoCluster extends \Google\Collection
{
  protected $collection_key = 'source';
  /**
   * @var string
   */
  public $addrFprint;
  /**
   * @var float
   */
  public $annotationConfidence;
  /**
   * @var string
   */
  public $clusterdocid;
  /**
   * @var string
   */
  public $clusterid;
  /**
   * @var float
   */
  public $confidence;
  /**
   * @var int
   */
  public $featureType;
  protected $hoursType = GeostoreTimeScheduleProto::class;
  protected $hoursDataType = '';
  /**
   * @var string
   */
  public $hoursSource;
  /**
   * @var bool
   */
  public $includeInIndex;
  /**
   * @var bool
   */
  public $isPlusbox;
  /**
   * @var int
   */
  public $latitudeE6;
  /**
   * @var int
   */
  public $level;
  /**
   * @var int
   */
  public $longitudeE6;
  /**
   * @var bool
   */
  public $makePlusboxVisible;
  /**
   * @var string[]
   */
  public $menuUrl;
  /**
   * @var int
   */
  public $pageTypeFlags;
  /**
   * @var string
   */
  public $phoneFprint;
  protected $phoneNumberType = TelephoneNumber::class;
  protected $phoneNumberDataType = '';
  protected $postalAddressType = PostalAddress::class;
  protected $postalAddressDataType = '';
  /**
   * @var float
   */
  public $relevance;
  /**
   * @var bool
   */
  public $showInSnippets;
  /**
   * @var string[]
   */
  public $source;
  /**
   * @var string
   */
  public $title;

  /**
   * @param string
   */
  public function setAddrFprint($addrFprint)
  {
    $this->addrFprint = $addrFprint;
  }
  /**
   * @return string
   */
  public function getAddrFprint()
  {
    return $this->addrFprint;
  }
  /**
   * @param float
   */
  public function setAnnotationConfidence($annotationConfidence)
  {
    $this->annotationConfidence = $annotationConfidence;
  }
  /**
   * @return float
   */
  public function getAnnotationConfidence()
  {
    return $this->annotationConfidence;
  }
  /**
   * @param string
   */
  public function setClusterdocid($clusterdocid)
  {
    $this->clusterdocid = $clusterdocid;
  }
  /**
   * @return string
   */
  public function getClusterdocid()
  {
    return $this->clusterdocid;
  }
  /**
   * @param string
   */
  public function setClusterid($clusterid)
  {
    $this->clusterid = $clusterid;
  }
  /**
   * @return string
   */
  public function getClusterid()
  {
    return $this->clusterid;
  }
  /**
   * @param float
   */
  public function setConfidence($confidence)
  {
    $this->confidence = $confidence;
  }
  /**
   * @return float
   */
  public function getConfidence()
  {
    return $this->confidence;
  }
  /**
   * @param int
   */
  public function setFeatureType($featureType)
  {
    $this->featureType = $featureType;
  }
  /**
   * @return int
   */
  public function getFeatureType()
  {
    return $this->featureType;
  }
  /**
   * @param GeostoreTimeScheduleProto
   */
  public function setHours(GeostoreTimeScheduleProto $hours)
  {
    $this->hours = $hours;
  }
  /**
   * @return GeostoreTimeScheduleProto
   */
  public function getHours()
  {
    return $this->hours;
  }
  /**
   * @param string
   */
  public function setHoursSource($hoursSource)
  {
    $this->hoursSource = $hoursSource;
  }
  /**
   * @return string
   */
  public function getHoursSource()
  {
    return $this->hoursSource;
  }
  /**
   * @param bool
   */
  public function setIncludeInIndex($includeInIndex)
  {
    $this->includeInIndex = $includeInIndex;
  }
  /**
   * @return bool
   */
  public function getIncludeInIndex()
  {
    return $this->includeInIndex;
  }
  /**
   * @param bool
   */
  public function setIsPlusbox($isPlusbox)
  {
    $this->isPlusbox = $isPlusbox;
  }
  /**
   * @return bool
   */
  public function getIsPlusbox()
  {
    return $this->isPlusbox;
  }
  /**
   * @param int
   */
  public function setLatitudeE6($latitudeE6)
  {
    $this->latitudeE6 = $latitudeE6;
  }
  /**
   * @return int
   */
  public function getLatitudeE6()
  {
    return $this->latitudeE6;
  }
  /**
   * @param int
   */
  public function setLevel($level)
  {
    $this->level = $level;
  }
  /**
   * @return int
   */
  public function getLevel()
  {
    return $this->level;
  }
  /**
   * @param int
   */
  public function setLongitudeE6($longitudeE6)
  {
    $this->longitudeE6 = $longitudeE6;
  }
  /**
   * @return int
   */
  public function getLongitudeE6()
  {
    return $this->longitudeE6;
  }
  /**
   * @param bool
   */
  public function setMakePlusboxVisible($makePlusboxVisible)
  {
    $this->makePlusboxVisible = $makePlusboxVisible;
  }
  /**
   * @return bool
   */
  public function getMakePlusboxVisible()
  {
    return $this->makePlusboxVisible;
  }
  /**
   * @param string[]
   */
  public function setMenuUrl($menuUrl)
  {
    $this->menuUrl = $menuUrl;
  }
  /**
   * @return string[]
   */
  public function getMenuUrl()
  {
    return $this->menuUrl;
  }
  /**
   * @param int
   */
  public function setPageTypeFlags($pageTypeFlags)
  {
    $this->pageTypeFlags = $pageTypeFlags;
  }
  /**
   * @return int
   */
  public function getPageTypeFlags()
  {
    return $this->pageTypeFlags;
  }
  /**
   * @param string
   */
  public function setPhoneFprint($phoneFprint)
  {
    $this->phoneFprint = $phoneFprint;
  }
  /**
   * @return string
   */
  public function getPhoneFprint()
  {
    return $this->phoneFprint;
  }
  /**
   * @param TelephoneNumber
   */
  public function setPhoneNumber(TelephoneNumber $phoneNumber)
  {
    $this->phoneNumber = $phoneNumber;
  }
  /**
   * @return TelephoneNumber
   */
  public function getPhoneNumber()
  {
    return $this->phoneNumber;
  }
  /**
   * @param PostalAddress
   */
  public function setPostalAddress(PostalAddress $postalAddress)
  {
    $this->postalAddress = $postalAddress;
  }
  /**
   * @return PostalAddress
   */
  public function getPostalAddress()
  {
    return $this->postalAddress;
  }
  /**
   * @param float
   */
  public function setRelevance($relevance)
  {
    $this->relevance = $relevance;
  }
  /**
   * @return float
   */
  public function getRelevance()
  {
    return $this->relevance;
  }
  /**
   * @param bool
   */
  public function setShowInSnippets($showInSnippets)
  {
    $this->showInSnippets = $showInSnippets;
  }
  /**
   * @return bool
   */
  public function getShowInSnippets()
  {
    return $this->showInSnippets;
  }
  /**
   * @param string[]
   */
  public function setSource($source)
  {
    $this->source = $source;
  }
  /**
   * @return string[]
   */
  public function getSource()
  {
    return $this->source;
  }
  /**
   * @param string
   */
  public function setTitle($title)
  {
    $this->title = $title;
  }
  /**
   * @return string
   */
  public function getTitle()
  {
    return $this->title;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(LocalWWWInfoCluster::class, 'Google_Service_Contentwarehouse_LocalWWWInfoCluster');
