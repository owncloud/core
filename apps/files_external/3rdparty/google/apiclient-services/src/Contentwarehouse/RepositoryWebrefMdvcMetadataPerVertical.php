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

class RepositoryWebrefMdvcMetadataPerVertical extends \Google\Collection
{
  protected $collection_key = 'subVerticalFp';
  /**
   * @var string[]
   */
  public $compatibleIds;
  /**
   * @var string[]
   */
  public $dimensionIds;
  /**
   * @var string[]
   */
  public $expandedOutputIds;
  /**
   * @var string[]
   */
  public $generalizationIds;
  /**
   * @var bool
   */
  public $isCore;
  /**
   * @var bool
   */
  public $isDimension;
  /**
   * @var bool
   */
  public $isGeneralization;
  /**
   * @var int
   */
  public $resolutionPriority;
  /**
   * @var string[]
   */
  public $subVerticalFp;
  /**
   * @var string
   */
  public $verticalName;

  /**
   * @param string[]
   */
  public function setCompatibleIds($compatibleIds)
  {
    $this->compatibleIds = $compatibleIds;
  }
  /**
   * @return string[]
   */
  public function getCompatibleIds()
  {
    return $this->compatibleIds;
  }
  /**
   * @param string[]
   */
  public function setDimensionIds($dimensionIds)
  {
    $this->dimensionIds = $dimensionIds;
  }
  /**
   * @return string[]
   */
  public function getDimensionIds()
  {
    return $this->dimensionIds;
  }
  /**
   * @param string[]
   */
  public function setExpandedOutputIds($expandedOutputIds)
  {
    $this->expandedOutputIds = $expandedOutputIds;
  }
  /**
   * @return string[]
   */
  public function getExpandedOutputIds()
  {
    return $this->expandedOutputIds;
  }
  /**
   * @param string[]
   */
  public function setGeneralizationIds($generalizationIds)
  {
    $this->generalizationIds = $generalizationIds;
  }
  /**
   * @return string[]
   */
  public function getGeneralizationIds()
  {
    return $this->generalizationIds;
  }
  /**
   * @param bool
   */
  public function setIsCore($isCore)
  {
    $this->isCore = $isCore;
  }
  /**
   * @return bool
   */
  public function getIsCore()
  {
    return $this->isCore;
  }
  /**
   * @param bool
   */
  public function setIsDimension($isDimension)
  {
    $this->isDimension = $isDimension;
  }
  /**
   * @return bool
   */
  public function getIsDimension()
  {
    return $this->isDimension;
  }
  /**
   * @param bool
   */
  public function setIsGeneralization($isGeneralization)
  {
    $this->isGeneralization = $isGeneralization;
  }
  /**
   * @return bool
   */
  public function getIsGeneralization()
  {
    return $this->isGeneralization;
  }
  /**
   * @param int
   */
  public function setResolutionPriority($resolutionPriority)
  {
    $this->resolutionPriority = $resolutionPriority;
  }
  /**
   * @return int
   */
  public function getResolutionPriority()
  {
    return $this->resolutionPriority;
  }
  /**
   * @param string[]
   */
  public function setSubVerticalFp($subVerticalFp)
  {
    $this->subVerticalFp = $subVerticalFp;
  }
  /**
   * @return string[]
   */
  public function getSubVerticalFp()
  {
    return $this->subVerticalFp;
  }
  /**
   * @param string
   */
  public function setVerticalName($verticalName)
  {
    $this->verticalName = $verticalName;
  }
  /**
   * @return string
   */
  public function getVerticalName()
  {
    return $this->verticalName;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RepositoryWebrefMdvcMetadataPerVertical::class, 'Google_Service_Contentwarehouse_RepositoryWebrefMdvcMetadataPerVertical');
