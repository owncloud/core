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

class MediaIndexRegion extends \Google\Collection
{
  protected $collection_key = 'starburstTokensV5';
  protected $boundingBoxType = MediaIndexBoundingbox::class;
  protected $boundingBoxDataType = '';
  protected $entityFieldsType = MediaIndexEntityField::class;
  protected $entityFieldsDataType = 'array';
  protected $labelsType = MediaIndexSparseFloatVector::class;
  protected $labelsDataType = '';
  /**
   * @var string
   */
  public $primiApparelFeaturesV2;
  /**
   * @var string[]
   */
  public $primiApparelTokensV2;
  /**
   * @var string
   */
  public $primiGenericFeaturesV25;
  /**
   * @var string[]
   */
  public $primiGenericTokensV25;
  /**
   * @var string
   */
  public $starburstFeaturesV4;
  /**
   * @var string
   */
  public $starburstFeaturesV5;
  /**
   * @var string[]
   */
  public $starburstTokensV4;
  /**
   * @var string[]
   */
  public $starburstTokensV5;
  protected $starburstV4Type = ImageContentStarburstVersionGroup::class;
  protected $starburstV4DataType = '';

  /**
   * @param MediaIndexBoundingbox
   */
  public function setBoundingBox(MediaIndexBoundingbox $boundingBox)
  {
    $this->boundingBox = $boundingBox;
  }
  /**
   * @return MediaIndexBoundingbox
   */
  public function getBoundingBox()
  {
    return $this->boundingBox;
  }
  /**
   * @param MediaIndexEntityField[]
   */
  public function setEntityFields($entityFields)
  {
    $this->entityFields = $entityFields;
  }
  /**
   * @return MediaIndexEntityField[]
   */
  public function getEntityFields()
  {
    return $this->entityFields;
  }
  /**
   * @param MediaIndexSparseFloatVector
   */
  public function setLabels(MediaIndexSparseFloatVector $labels)
  {
    $this->labels = $labels;
  }
  /**
   * @return MediaIndexSparseFloatVector
   */
  public function getLabels()
  {
    return $this->labels;
  }
  /**
   * @param string
   */
  public function setPrimiApparelFeaturesV2($primiApparelFeaturesV2)
  {
    $this->primiApparelFeaturesV2 = $primiApparelFeaturesV2;
  }
  /**
   * @return string
   */
  public function getPrimiApparelFeaturesV2()
  {
    return $this->primiApparelFeaturesV2;
  }
  /**
   * @param string[]
   */
  public function setPrimiApparelTokensV2($primiApparelTokensV2)
  {
    $this->primiApparelTokensV2 = $primiApparelTokensV2;
  }
  /**
   * @return string[]
   */
  public function getPrimiApparelTokensV2()
  {
    return $this->primiApparelTokensV2;
  }
  /**
   * @param string
   */
  public function setPrimiGenericFeaturesV25($primiGenericFeaturesV25)
  {
    $this->primiGenericFeaturesV25 = $primiGenericFeaturesV25;
  }
  /**
   * @return string
   */
  public function getPrimiGenericFeaturesV25()
  {
    return $this->primiGenericFeaturesV25;
  }
  /**
   * @param string[]
   */
  public function setPrimiGenericTokensV25($primiGenericTokensV25)
  {
    $this->primiGenericTokensV25 = $primiGenericTokensV25;
  }
  /**
   * @return string[]
   */
  public function getPrimiGenericTokensV25()
  {
    return $this->primiGenericTokensV25;
  }
  /**
   * @param string
   */
  public function setStarburstFeaturesV4($starburstFeaturesV4)
  {
    $this->starburstFeaturesV4 = $starburstFeaturesV4;
  }
  /**
   * @return string
   */
  public function getStarburstFeaturesV4()
  {
    return $this->starburstFeaturesV4;
  }
  /**
   * @param string
   */
  public function setStarburstFeaturesV5($starburstFeaturesV5)
  {
    $this->starburstFeaturesV5 = $starburstFeaturesV5;
  }
  /**
   * @return string
   */
  public function getStarburstFeaturesV5()
  {
    return $this->starburstFeaturesV5;
  }
  /**
   * @param string[]
   */
  public function setStarburstTokensV4($starburstTokensV4)
  {
    $this->starburstTokensV4 = $starburstTokensV4;
  }
  /**
   * @return string[]
   */
  public function getStarburstTokensV4()
  {
    return $this->starburstTokensV4;
  }
  /**
   * @param string[]
   */
  public function setStarburstTokensV5($starburstTokensV5)
  {
    $this->starburstTokensV5 = $starburstTokensV5;
  }
  /**
   * @return string[]
   */
  public function getStarburstTokensV5()
  {
    return $this->starburstTokensV5;
  }
  /**
   * @param ImageContentStarburstVersionGroup
   */
  public function setStarburstV4(ImageContentStarburstVersionGroup $starburstV4)
  {
    $this->starburstV4 = $starburstV4;
  }
  /**
   * @return ImageContentStarburstVersionGroup
   */
  public function getStarburstV4()
  {
    return $this->starburstV4;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(MediaIndexRegion::class, 'Google_Service_Contentwarehouse_MediaIndexRegion');
