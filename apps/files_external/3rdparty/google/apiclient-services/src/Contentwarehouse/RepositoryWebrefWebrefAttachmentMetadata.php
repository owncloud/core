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

class RepositoryWebrefWebrefAttachmentMetadata extends \Google\Model
{
  /**
   * @var string
   */
  public $featureType;
  /**
   * @var int
   */
  public $index;
  /**
   * @var string
   */
  public $latE7;
  /**
   * @var string
   */
  public $lngE7;
  protected $oysterIdType = GeostoreFeatureIdProto::class;
  protected $oysterIdDataType = '';
  /**
   * @var int
   */
  public $singleTopicnessE2;

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
   * @param int
   */
  public function setIndex($index)
  {
    $this->index = $index;
  }
  /**
   * @return int
   */
  public function getIndex()
  {
    return $this->index;
  }
  /**
   * @param string
   */
  public function setLatE7($latE7)
  {
    $this->latE7 = $latE7;
  }
  /**
   * @return string
   */
  public function getLatE7()
  {
    return $this->latE7;
  }
  /**
   * @param string
   */
  public function setLngE7($lngE7)
  {
    $this->lngE7 = $lngE7;
  }
  /**
   * @return string
   */
  public function getLngE7()
  {
    return $this->lngE7;
  }
  /**
   * @param GeostoreFeatureIdProto
   */
  public function setOysterId(GeostoreFeatureIdProto $oysterId)
  {
    $this->oysterId = $oysterId;
  }
  /**
   * @return GeostoreFeatureIdProto
   */
  public function getOysterId()
  {
    return $this->oysterId;
  }
  /**
   * @param int
   */
  public function setSingleTopicnessE2($singleTopicnessE2)
  {
    $this->singleTopicnessE2 = $singleTopicnessE2;
  }
  /**
   * @return int
   */
  public function getSingleTopicnessE2()
  {
    return $this->singleTopicnessE2;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RepositoryWebrefWebrefAttachmentMetadata::class, 'Google_Service_Contentwarehouse_RepositoryWebrefWebrefAttachmentMetadata');
