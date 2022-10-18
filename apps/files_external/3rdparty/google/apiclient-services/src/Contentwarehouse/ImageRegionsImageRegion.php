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

class ImageRegionsImageRegion extends \Google\Model
{
  protected $boundingBoxType = PhotosVisionGroundtruthdbNormalizedBoundingBox::class;
  protected $boundingBoxDataType = '';
  /**
   * @var float
   */
  public $boundingBoxScore;
  /**
   * @var string
   */
  public $id;
  /**
   * @var bool
   */
  public $isProduct;
  public $knnScore;
  protected $labelGroupType = ImageUnderstandingIndexingLabelGroup::class;
  protected $labelGroupDataType = '';
  /**
   * @var string
   */
  public $labelVersion;
  protected $primaryLabelType = ImageUnderstandingIndexingLabel::class;
  protected $primaryLabelDataType = '';
  /**
   * @var string
   */
  public $renderType;
  protected $starburstV4Type = ImageUnderstandingIndexingFeature::class;
  protected $starburstV4DataType = '';

  /**
   * @param PhotosVisionGroundtruthdbNormalizedBoundingBox
   */
  public function setBoundingBox(PhotosVisionGroundtruthdbNormalizedBoundingBox $boundingBox)
  {
    $this->boundingBox = $boundingBox;
  }
  /**
   * @return PhotosVisionGroundtruthdbNormalizedBoundingBox
   */
  public function getBoundingBox()
  {
    return $this->boundingBox;
  }
  /**
   * @param float
   */
  public function setBoundingBoxScore($boundingBoxScore)
  {
    $this->boundingBoxScore = $boundingBoxScore;
  }
  /**
   * @return float
   */
  public function getBoundingBoxScore()
  {
    return $this->boundingBoxScore;
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
   * @param bool
   */
  public function setIsProduct($isProduct)
  {
    $this->isProduct = $isProduct;
  }
  /**
   * @return bool
   */
  public function getIsProduct()
  {
    return $this->isProduct;
  }
  public function setKnnScore($knnScore)
  {
    $this->knnScore = $knnScore;
  }
  public function getKnnScore()
  {
    return $this->knnScore;
  }
  /**
   * @param ImageUnderstandingIndexingLabelGroup
   */
  public function setLabelGroup(ImageUnderstandingIndexingLabelGroup $labelGroup)
  {
    $this->labelGroup = $labelGroup;
  }
  /**
   * @return ImageUnderstandingIndexingLabelGroup
   */
  public function getLabelGroup()
  {
    return $this->labelGroup;
  }
  /**
   * @param string
   */
  public function setLabelVersion($labelVersion)
  {
    $this->labelVersion = $labelVersion;
  }
  /**
   * @return string
   */
  public function getLabelVersion()
  {
    return $this->labelVersion;
  }
  /**
   * @param ImageUnderstandingIndexingLabel
   */
  public function setPrimaryLabel(ImageUnderstandingIndexingLabel $primaryLabel)
  {
    $this->primaryLabel = $primaryLabel;
  }
  /**
   * @return ImageUnderstandingIndexingLabel
   */
  public function getPrimaryLabel()
  {
    return $this->primaryLabel;
  }
  /**
   * @param string
   */
  public function setRenderType($renderType)
  {
    $this->renderType = $renderType;
  }
  /**
   * @return string
   */
  public function getRenderType()
  {
    return $this->renderType;
  }
  /**
   * @param ImageUnderstandingIndexingFeature
   */
  public function setStarburstV4(ImageUnderstandingIndexingFeature $starburstV4)
  {
    $this->starburstV4 = $starburstV4;
  }
  /**
   * @return ImageUnderstandingIndexingFeature
   */
  public function getStarburstV4()
  {
    return $this->starburstV4;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ImageRegionsImageRegion::class, 'Google_Service_Contentwarehouse_ImageRegionsImageRegion');
