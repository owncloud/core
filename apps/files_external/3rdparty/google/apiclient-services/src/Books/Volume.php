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

namespace Google\Service\Books;

class Volume extends \Google\Model
{
  protected $accessInfoType = VolumeAccessInfo::class;
  protected $accessInfoDataType = '';
  /**
   * @var string
   */
  public $etag;
  /**
   * @var string
   */
  public $id;
  /**
   * @var string
   */
  public $kind;
  protected $layerInfoType = VolumeLayerInfo::class;
  protected $layerInfoDataType = '';
  protected $recommendedInfoType = VolumeRecommendedInfo::class;
  protected $recommendedInfoDataType = '';
  protected $saleInfoType = VolumeSaleInfo::class;
  protected $saleInfoDataType = '';
  protected $searchInfoType = VolumeSearchInfo::class;
  protected $searchInfoDataType = '';
  /**
   * @var string
   */
  public $selfLink;
  protected $userInfoType = VolumeUserInfo::class;
  protected $userInfoDataType = '';
  protected $volumeInfoType = VolumeVolumeInfo::class;
  protected $volumeInfoDataType = '';

  /**
   * @param VolumeAccessInfo
   */
  public function setAccessInfo(VolumeAccessInfo $accessInfo)
  {
    $this->accessInfo = $accessInfo;
  }
  /**
   * @return VolumeAccessInfo
   */
  public function getAccessInfo()
  {
    return $this->accessInfo;
  }
  /**
   * @param string
   */
  public function setEtag($etag)
  {
    $this->etag = $etag;
  }
  /**
   * @return string
   */
  public function getEtag()
  {
    return $this->etag;
  }
  /**
   * @param string
   */
  public function setId($id)
  {
    $this->id = $id;
  }
  /**
   * @return string
   */
  public function getId()
  {
    return $this->id;
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
   * @param VolumeLayerInfo
   */
  public function setLayerInfo(VolumeLayerInfo $layerInfo)
  {
    $this->layerInfo = $layerInfo;
  }
  /**
   * @return VolumeLayerInfo
   */
  public function getLayerInfo()
  {
    return $this->layerInfo;
  }
  /**
   * @param VolumeRecommendedInfo
   */
  public function setRecommendedInfo(VolumeRecommendedInfo $recommendedInfo)
  {
    $this->recommendedInfo = $recommendedInfo;
  }
  /**
   * @return VolumeRecommendedInfo
   */
  public function getRecommendedInfo()
  {
    return $this->recommendedInfo;
  }
  /**
   * @param VolumeSaleInfo
   */
  public function setSaleInfo(VolumeSaleInfo $saleInfo)
  {
    $this->saleInfo = $saleInfo;
  }
  /**
   * @return VolumeSaleInfo
   */
  public function getSaleInfo()
  {
    return $this->saleInfo;
  }
  /**
   * @param VolumeSearchInfo
   */
  public function setSearchInfo(VolumeSearchInfo $searchInfo)
  {
    $this->searchInfo = $searchInfo;
  }
  /**
   * @return VolumeSearchInfo
   */
  public function getSearchInfo()
  {
    return $this->searchInfo;
  }
  /**
   * @param string
   */
  public function setSelfLink($selfLink)
  {
    $this->selfLink = $selfLink;
  }
  /**
   * @return string
   */
  public function getSelfLink()
  {
    return $this->selfLink;
  }
  /**
   * @param VolumeUserInfo
   */
  public function setUserInfo(VolumeUserInfo $userInfo)
  {
    $this->userInfo = $userInfo;
  }
  /**
   * @return VolumeUserInfo
   */
  public function getUserInfo()
  {
    return $this->userInfo;
  }
  /**
   * @param VolumeVolumeInfo
   */
  public function setVolumeInfo(VolumeVolumeInfo $volumeInfo)
  {
    $this->volumeInfo = $volumeInfo;
  }
  /**
   * @return VolumeVolumeInfo
   */
  public function getVolumeInfo()
  {
    return $this->volumeInfo;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Volume::class, 'Google_Service_Books_Volume');
