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

class GeostoreSourceInfoProto extends \Google\Collection
{
  protected $collection_key = 'rawData';
  protected $attributionUrlType = GeostoreUrlProto::class;
  protected $attributionUrlDataType = 'array';
  protected $collectionDateType = GeostoreDateTimeProto::class;
  protected $collectionDateDataType = '';
  /**
   * @var string
   */
  public $cookie;
  /**
   * @var string
   */
  public $dataset;
  /**
   * @var string
   */
  public $gaiaId;
  protected $impersonationUserType = GeostoreUserProto::class;
  protected $impersonationUserDataType = '';
  /**
   * @var string
   */
  public $layer;
  /**
   * @var string
   */
  public $ogrFid;
  /**
   * @var int
   */
  public $provider;
  protected $rawDataType = GeostoreRawDataProto::class;
  protected $rawDataDataType = 'array';
  /**
   * @var string
   */
  public $release;
  protected $sourceIdType = GeostoreFeatureIdProto::class;
  protected $sourceIdDataType = '';
  protected $temporaryDataType = Proto2BridgeMessageSet::class;
  protected $temporaryDataDataType = '';
  protected $userType = GeostoreUserProto::class;
  protected $userDataType = '';

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
   * @param GeostoreDateTimeProto
   */
  public function setCollectionDate(GeostoreDateTimeProto $collectionDate)
  {
    $this->collectionDate = $collectionDate;
  }
  /**
   * @return GeostoreDateTimeProto
   */
  public function getCollectionDate()
  {
    return $this->collectionDate;
  }
  /**
   * @param string
   */
  public function setCookie($cookie)
  {
    $this->cookie = $cookie;
  }
  /**
   * @return string
   */
  public function getCookie()
  {
    return $this->cookie;
  }
  /**
   * @param string
   */
  public function setDataset($dataset)
  {
    $this->dataset = $dataset;
  }
  /**
   * @return string
   */
  public function getDataset()
  {
    return $this->dataset;
  }
  /**
   * @param string
   */
  public function setGaiaId($gaiaId)
  {
    $this->gaiaId = $gaiaId;
  }
  /**
   * @return string
   */
  public function getGaiaId()
  {
    return $this->gaiaId;
  }
  /**
   * @param GeostoreUserProto
   */
  public function setImpersonationUser(GeostoreUserProto $impersonationUser)
  {
    $this->impersonationUser = $impersonationUser;
  }
  /**
   * @return GeostoreUserProto
   */
  public function getImpersonationUser()
  {
    return $this->impersonationUser;
  }
  /**
   * @param string
   */
  public function setLayer($layer)
  {
    $this->layer = $layer;
  }
  /**
   * @return string
   */
  public function getLayer()
  {
    return $this->layer;
  }
  /**
   * @param string
   */
  public function setOgrFid($ogrFid)
  {
    $this->ogrFid = $ogrFid;
  }
  /**
   * @return string
   */
  public function getOgrFid()
  {
    return $this->ogrFid;
  }
  /**
   * @param int
   */
  public function setProvider($provider)
  {
    $this->provider = $provider;
  }
  /**
   * @return int
   */
  public function getProvider()
  {
    return $this->provider;
  }
  /**
   * @param GeostoreRawDataProto[]
   */
  public function setRawData($rawData)
  {
    $this->rawData = $rawData;
  }
  /**
   * @return GeostoreRawDataProto[]
   */
  public function getRawData()
  {
    return $this->rawData;
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
   * @param GeostoreFeatureIdProto
   */
  public function setSourceId(GeostoreFeatureIdProto $sourceId)
  {
    $this->sourceId = $sourceId;
  }
  /**
   * @return GeostoreFeatureIdProto
   */
  public function getSourceId()
  {
    return $this->sourceId;
  }
  /**
   * @param Proto2BridgeMessageSet
   */
  public function setTemporaryData(Proto2BridgeMessageSet $temporaryData)
  {
    $this->temporaryData = $temporaryData;
  }
  /**
   * @return Proto2BridgeMessageSet
   */
  public function getTemporaryData()
  {
    return $this->temporaryData;
  }
  /**
   * @param GeostoreUserProto
   */
  public function setUser(GeostoreUserProto $user)
  {
    $this->user = $user;
  }
  /**
   * @return GeostoreUserProto
   */
  public function getUser()
  {
    return $this->user;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GeostoreSourceInfoProto::class, 'Google_Service_Contentwarehouse_GeostoreSourceInfoProto');
