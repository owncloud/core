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

class ImageRepositoryShoppingProductInformationProductInformation extends \Google\Collection
{
  protected $collection_key = 'tokenGroups';
  /**
   * @var int[]
   */
  public $categoryId;
  /**
   * @var int[]
   */
  public $clusterIds;
  /**
   * @var float
   */
  public $detectionScore;
  /**
   * @var string
   */
  public $embedding;
  protected $entitiesType = ImageRepositoryShoppingProductInformationEntity::class;
  protected $entitiesDataType = 'array';
  /**
   * @var string
   */
  public $featureType;
  protected $productLocationType = ImageRepositoryShoppingProductInformationBoundingBox::class;
  protected $productLocationDataType = '';
  protected $tokenGroupsType = ImageRepositoryShoppingProductInformationProductInformationTokenGroup::class;
  protected $tokenGroupsDataType = 'array';

  /**
   * @param int[]
   */
  public function setCategoryId($categoryId)
  {
    $this->categoryId = $categoryId;
  }
  /**
   * @return int[]
   */
  public function getCategoryId()
  {
    return $this->categoryId;
  }
  /**
   * @param int[]
   */
  public function setClusterIds($clusterIds)
  {
    $this->clusterIds = $clusterIds;
  }
  /**
   * @return int[]
   */
  public function getClusterIds()
  {
    return $this->clusterIds;
  }
  /**
   * @param float
   */
  public function setDetectionScore($detectionScore)
  {
    $this->detectionScore = $detectionScore;
  }
  /**
   * @return float
   */
  public function getDetectionScore()
  {
    return $this->detectionScore;
  }
  /**
   * @param string
   */
  public function setEmbedding($embedding)
  {
    $this->embedding = $embedding;
  }
  /**
   * @return string
   */
  public function getEmbedding()
  {
    return $this->embedding;
  }
  /**
   * @param ImageRepositoryShoppingProductInformationEntity[]
   */
  public function setEntities($entities)
  {
    $this->entities = $entities;
  }
  /**
   * @return ImageRepositoryShoppingProductInformationEntity[]
   */
  public function getEntities()
  {
    return $this->entities;
  }
  /**
   * @param string
   */
  public function setFeatureType($featureType)
  {
    $this->featureType = $featureType;
  }
  /**
   * @return string
   */
  public function getFeatureType()
  {
    return $this->featureType;
  }
  /**
   * @param ImageRepositoryShoppingProductInformationBoundingBox
   */
  public function setProductLocation(ImageRepositoryShoppingProductInformationBoundingBox $productLocation)
  {
    $this->productLocation = $productLocation;
  }
  /**
   * @return ImageRepositoryShoppingProductInformationBoundingBox
   */
  public function getProductLocation()
  {
    return $this->productLocation;
  }
  /**
   * @param ImageRepositoryShoppingProductInformationProductInformationTokenGroup[]
   */
  public function setTokenGroups($tokenGroups)
  {
    $this->tokenGroups = $tokenGroups;
  }
  /**
   * @return ImageRepositoryShoppingProductInformationProductInformationTokenGroup[]
   */
  public function getTokenGroups()
  {
    return $this->tokenGroups;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ImageRepositoryShoppingProductInformationProductInformation::class, 'Google_Service_Contentwarehouse_ImageRepositoryShoppingProductInformationProductInformation');
