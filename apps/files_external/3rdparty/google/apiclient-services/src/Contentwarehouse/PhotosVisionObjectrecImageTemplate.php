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

class PhotosVisionObjectrecImageTemplate extends \Google\Collection
{
  protected $collection_key = 'subset';
  /**
   * @var string
   */
  public $authorName;
  /**
   * @var string
   */
  public $corpus;
  protected $geoLocationType = PhotosVisionObjectrecGeoLocation::class;
  protected $geoLocationDataType = '';
  protected $globalFeatureType = PhotosVisionObjectrecGlobalFeature::class;
  protected $globalFeatureDataType = 'array';
  /**
   * @var int
   */
  public $imageHeight;
  /**
   * @var string
   */
  public $imageId;
  /**
   * @var string
   */
  public $imageUrl;
  /**
   * @var int
   */
  public $imageWidth;
  /**
   * @var string
   */
  public $info;
  /**
   * @var string[]
   */
  public $objectInfo;
  /**
   * @var string
   */
  public $objectName;
  /**
   * @var string
   */
  public $opaqueData;
  protected $roiType = PhotosVisionObjectrecROI::class;
  protected $roiDataType = '';
  protected $subsetType = PhotosVisionObjectrecImageTemplateSubSet::class;
  protected $subsetDataType = 'array';
  /**
   * @var string
   */
  public $version;

  /**
   * @param string
   */
  public function setAuthorName($authorName)
  {
    $this->authorName = $authorName;
  }
  /**
   * @return string
   */
  public function getAuthorName()
  {
    return $this->authorName;
  }
  /**
   * @param string
   */
  public function setCorpus($corpus)
  {
    $this->corpus = $corpus;
  }
  /**
   * @return string
   */
  public function getCorpus()
  {
    return $this->corpus;
  }
  /**
   * @param PhotosVisionObjectrecGeoLocation
   */
  public function setGeoLocation(PhotosVisionObjectrecGeoLocation $geoLocation)
  {
    $this->geoLocation = $geoLocation;
  }
  /**
   * @return PhotosVisionObjectrecGeoLocation
   */
  public function getGeoLocation()
  {
    return $this->geoLocation;
  }
  /**
   * @param PhotosVisionObjectrecGlobalFeature[]
   */
  public function setGlobalFeature($globalFeature)
  {
    $this->globalFeature = $globalFeature;
  }
  /**
   * @return PhotosVisionObjectrecGlobalFeature[]
   */
  public function getGlobalFeature()
  {
    return $this->globalFeature;
  }
  /**
   * @param int
   */
  public function setImageHeight($imageHeight)
  {
    $this->imageHeight = $imageHeight;
  }
  /**
   * @return int
   */
  public function getImageHeight()
  {
    return $this->imageHeight;
  }
  /**
   * @param string
   */
  public function setImageId($imageId)
  {
    $this->imageId = $imageId;
  }
  /**
   * @return string
   */
  public function getImageId()
  {
    return $this->imageId;
  }
  /**
   * @param string
   */
  public function setImageUrl($imageUrl)
  {
    $this->imageUrl = $imageUrl;
  }
  /**
   * @return string
   */
  public function getImageUrl()
  {
    return $this->imageUrl;
  }
  /**
   * @param int
   */
  public function setImageWidth($imageWidth)
  {
    $this->imageWidth = $imageWidth;
  }
  /**
   * @return int
   */
  public function getImageWidth()
  {
    return $this->imageWidth;
  }
  /**
   * @param string
   */
  public function setInfo($info)
  {
    $this->info = $info;
  }
  /**
   * @return string
   */
  public function getInfo()
  {
    return $this->info;
  }
  /**
   * @param string[]
   */
  public function setObjectInfo($objectInfo)
  {
    $this->objectInfo = $objectInfo;
  }
  /**
   * @return string[]
   */
  public function getObjectInfo()
  {
    return $this->objectInfo;
  }
  /**
   * @param string
   */
  public function setObjectName($objectName)
  {
    $this->objectName = $objectName;
  }
  /**
   * @return string
   */
  public function getObjectName()
  {
    return $this->objectName;
  }
  /**
   * @param string
   */
  public function setOpaqueData($opaqueData)
  {
    $this->opaqueData = $opaqueData;
  }
  /**
   * @return string
   */
  public function getOpaqueData()
  {
    return $this->opaqueData;
  }
  /**
   * @param PhotosVisionObjectrecROI
   */
  public function setRoi(PhotosVisionObjectrecROI $roi)
  {
    $this->roi = $roi;
  }
  /**
   * @return PhotosVisionObjectrecROI
   */
  public function getRoi()
  {
    return $this->roi;
  }
  /**
   * @param PhotosVisionObjectrecImageTemplateSubSet[]
   */
  public function setSubset($subset)
  {
    $this->subset = $subset;
  }
  /**
   * @return PhotosVisionObjectrecImageTemplateSubSet[]
   */
  public function getSubset()
  {
    return $this->subset;
  }
  /**
   * @param string
   */
  public function setVersion($version)
  {
    $this->version = $version;
  }
  /**
   * @return string
   */
  public function getVersion()
  {
    return $this->version;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PhotosVisionObjectrecImageTemplate::class, 'Google_Service_Contentwarehouse_PhotosVisionObjectrecImageTemplate');
