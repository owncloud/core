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

class SocialPersonalizationKnexAnnotationItem extends \Google\Collection
{
  protected $collection_key = 'relatedEntity';
  /**
   * @var float
   */
  public $confidence;
  /**
   * @var string
   */
  public $description;
  /**
   * @var string
   */
  public $equivalentMid;
  /**
   * @var float
   */
  public $generality;
  /**
   * @var string
   */
  public $mid;
  protected $relatedEntityType = SocialPersonalizationKnexAnnotationItemTopic::class;
  protected $relatedEntityDataType = 'array';
  /**
   * @var float
   */
  public $topicality;

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
   * @param string
   */
  public function setDescription($description)
  {
    $this->description = $description;
  }
  /**
   * @return string
   */
  public function getDescription()
  {
    return $this->description;
  }
  /**
   * @param string
   */
  public function setEquivalentMid($equivalentMid)
  {
    $this->equivalentMid = $equivalentMid;
  }
  /**
   * @return string
   */
  public function getEquivalentMid()
  {
    return $this->equivalentMid;
  }
  /**
   * @param float
   */
  public function setGenerality($generality)
  {
    $this->generality = $generality;
  }
  /**
   * @return float
   */
  public function getGenerality()
  {
    return $this->generality;
  }
  /**
   * @param string
   */
  public function setMid($mid)
  {
    $this->mid = $mid;
  }
  /**
   * @return string
   */
  public function getMid()
  {
    return $this->mid;
  }
  /**
   * @param SocialPersonalizationKnexAnnotationItemTopic[]
   */
  public function setRelatedEntity($relatedEntity)
  {
    $this->relatedEntity = $relatedEntity;
  }
  /**
   * @return SocialPersonalizationKnexAnnotationItemTopic[]
   */
  public function getRelatedEntity()
  {
    return $this->relatedEntity;
  }
  /**
   * @param float
   */
  public function setTopicality($topicality)
  {
    $this->topicality = $topicality;
  }
  /**
   * @return float
   */
  public function getTopicality()
  {
    return $this->topicality;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SocialPersonalizationKnexAnnotationItem::class, 'Google_Service_Contentwarehouse_SocialPersonalizationKnexAnnotationItem');
