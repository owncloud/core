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

class RepositoryWebrefCategoryAnnotation extends \Google\Model
{
  protected $browsyTopicType = RepositoryWebrefCategoryAnnotationBrowsyTopic::class;
  protected $browsyTopicDataType = '';
  /**
   * @var string
   */
  public $debugString;
  protected $hitcatType = RepositoryWebrefCategoryAnnotationHitCatSource::class;
  protected $hitcatDataType = '';
  /**
   * @var string
   */
  public $mid;
  protected $shoppingType = RepositoryWebrefCategoryAnnotationShoppingSignals::class;
  protected $shoppingDataType = '';

  /**
   * @param RepositoryWebrefCategoryAnnotationBrowsyTopic
   */
  public function setBrowsyTopic(RepositoryWebrefCategoryAnnotationBrowsyTopic $browsyTopic)
  {
    $this->browsyTopic = $browsyTopic;
  }
  /**
   * @return RepositoryWebrefCategoryAnnotationBrowsyTopic
   */
  public function getBrowsyTopic()
  {
    return $this->browsyTopic;
  }
  /**
   * @param string
   */
  public function setDebugString($debugString)
  {
    $this->debugString = $debugString;
  }
  /**
   * @return string
   */
  public function getDebugString()
  {
    return $this->debugString;
  }
  /**
   * @param RepositoryWebrefCategoryAnnotationHitCatSource
   */
  public function setHitcat(RepositoryWebrefCategoryAnnotationHitCatSource $hitcat)
  {
    $this->hitcat = $hitcat;
  }
  /**
   * @return RepositoryWebrefCategoryAnnotationHitCatSource
   */
  public function getHitcat()
  {
    return $this->hitcat;
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
   * @param RepositoryWebrefCategoryAnnotationShoppingSignals
   */
  public function setShopping(RepositoryWebrefCategoryAnnotationShoppingSignals $shopping)
  {
    $this->shopping = $shopping;
  }
  /**
   * @return RepositoryWebrefCategoryAnnotationShoppingSignals
   */
  public function getShopping()
  {
    return $this->shopping;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RepositoryWebrefCategoryAnnotation::class, 'Google_Service_Contentwarehouse_RepositoryWebrefCategoryAnnotation');
