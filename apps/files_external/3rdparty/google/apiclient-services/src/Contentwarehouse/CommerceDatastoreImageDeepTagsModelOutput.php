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

class CommerceDatastoreImageDeepTagsModelOutput extends \Google\Collection
{
  protected $collection_key = 'textOverlay';
  protected $backgroundTypeType = CommerceDatastoreDeepTag::class;
  protected $backgroundTypeDataType = '';
  protected $collageType = CommerceDatastoreDeepTag::class;
  protected $collageDataType = '';
  protected $croppingType = CommerceDatastoreDeepTag::class;
  protected $croppingDataType = '';
  protected $modelTypeType = CommerceDatastoreDeepTag::class;
  protected $modelTypeDataType = '';
  protected $nfsType = CommerceDatastoreDeepTag::class;
  protected $nfsDataType = '';
  protected $objectCountType = CommerceDatastoreDeepTag::class;
  protected $objectCountDataType = '';
  protected $overlayType = CommerceDatastoreDeepTag::class;
  protected $overlayDataType = '';
  protected $selfieType = CommerceDatastoreDeepTag::class;
  protected $selfieDataType = '';
  protected $textOverlayType = CommerceDatastoreDeepTag::class;
  protected $textOverlayDataType = 'array';
  /**
   * @var string
   */
  public $version;

  /**
   * @param CommerceDatastoreDeepTag
   */
  public function setBackgroundType(CommerceDatastoreDeepTag $backgroundType)
  {
    $this->backgroundType = $backgroundType;
  }
  /**
   * @return CommerceDatastoreDeepTag
   */
  public function getBackgroundType()
  {
    return $this->backgroundType;
  }
  /**
   * @param CommerceDatastoreDeepTag
   */
  public function setCollage(CommerceDatastoreDeepTag $collage)
  {
    $this->collage = $collage;
  }
  /**
   * @return CommerceDatastoreDeepTag
   */
  public function getCollage()
  {
    return $this->collage;
  }
  /**
   * @param CommerceDatastoreDeepTag
   */
  public function setCropping(CommerceDatastoreDeepTag $cropping)
  {
    $this->cropping = $cropping;
  }
  /**
   * @return CommerceDatastoreDeepTag
   */
  public function getCropping()
  {
    return $this->cropping;
  }
  /**
   * @param CommerceDatastoreDeepTag
   */
  public function setModelType(CommerceDatastoreDeepTag $modelType)
  {
    $this->modelType = $modelType;
  }
  /**
   * @return CommerceDatastoreDeepTag
   */
  public function getModelType()
  {
    return $this->modelType;
  }
  /**
   * @param CommerceDatastoreDeepTag
   */
  public function setNfs(CommerceDatastoreDeepTag $nfs)
  {
    $this->nfs = $nfs;
  }
  /**
   * @return CommerceDatastoreDeepTag
   */
  public function getNfs()
  {
    return $this->nfs;
  }
  /**
   * @param CommerceDatastoreDeepTag
   */
  public function setObjectCount(CommerceDatastoreDeepTag $objectCount)
  {
    $this->objectCount = $objectCount;
  }
  /**
   * @return CommerceDatastoreDeepTag
   */
  public function getObjectCount()
  {
    return $this->objectCount;
  }
  /**
   * @param CommerceDatastoreDeepTag
   */
  public function setOverlay(CommerceDatastoreDeepTag $overlay)
  {
    $this->overlay = $overlay;
  }
  /**
   * @return CommerceDatastoreDeepTag
   */
  public function getOverlay()
  {
    return $this->overlay;
  }
  /**
   * @param CommerceDatastoreDeepTag
   */
  public function setSelfie(CommerceDatastoreDeepTag $selfie)
  {
    $this->selfie = $selfie;
  }
  /**
   * @return CommerceDatastoreDeepTag
   */
  public function getSelfie()
  {
    return $this->selfie;
  }
  /**
   * @param CommerceDatastoreDeepTag[]
   */
  public function setTextOverlay($textOverlay)
  {
    $this->textOverlay = $textOverlay;
  }
  /**
   * @return CommerceDatastoreDeepTag[]
   */
  public function getTextOverlay()
  {
    return $this->textOverlay;
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
class_alias(CommerceDatastoreImageDeepTagsModelOutput::class, 'Google_Service_Contentwarehouse_CommerceDatastoreImageDeepTagsModelOutput');
