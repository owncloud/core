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

class RepositoryWebrefLinkInfo extends \Google\Collection
{
  protected $collection_key = 'source';
  /**
   * @var float
   */
  public $aggregatedScore;
  /**
   * @var bool
   */
  public $isPreferredDirection;
  protected $metadataType = RepositoryWebrefEntityLinkMetadata::class;
  protected $metadataDataType = '';
  protected $sourceType = RepositoryWebrefEntityLinkSource::class;
  protected $sourceDataType = 'array';

  /**
   * @param float
   */
  public function setAggregatedScore($aggregatedScore)
  {
    $this->aggregatedScore = $aggregatedScore;
  }
  /**
   * @return float
   */
  public function getAggregatedScore()
  {
    return $this->aggregatedScore;
  }
  /**
   * @param bool
   */
  public function setIsPreferredDirection($isPreferredDirection)
  {
    $this->isPreferredDirection = $isPreferredDirection;
  }
  /**
   * @return bool
   */
  public function getIsPreferredDirection()
  {
    return $this->isPreferredDirection;
  }
  /**
   * @param RepositoryWebrefEntityLinkMetadata
   */
  public function setMetadata(RepositoryWebrefEntityLinkMetadata $metadata)
  {
    $this->metadata = $metadata;
  }
  /**
   * @return RepositoryWebrefEntityLinkMetadata
   */
  public function getMetadata()
  {
    return $this->metadata;
  }
  /**
   * @param RepositoryWebrefEntityLinkSource[]
   */
  public function setSource($source)
  {
    $this->source = $source;
  }
  /**
   * @return RepositoryWebrefEntityLinkSource[]
   */
  public function getSource()
  {
    return $this->source;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RepositoryWebrefLinkInfo::class, 'Google_Service_Contentwarehouse_RepositoryWebrefLinkInfo');
