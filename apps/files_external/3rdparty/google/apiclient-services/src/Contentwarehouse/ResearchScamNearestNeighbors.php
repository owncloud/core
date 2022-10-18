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

class ResearchScamNearestNeighbors extends \Google\Collection
{
  protected $collection_key = 'neighbor';
  /**
   * @var string
   */
  public $docid;
  /**
   * @var string
   */
  public $metadata;
  protected $neighborType = ResearchScamNearestNeighborsNeighbor::class;
  protected $neighborDataType = 'array';
  protected $neighborSelectionOverrideType = ResearchScamNeighborSelectionOverride::class;
  protected $neighborSelectionOverrideDataType = '';
  protected $queryType = ResearchScamGenericFeatureVector::class;
  protected $queryDataType = '';
  /**
   * @var string
   */
  public $retrievedVersion;

  /**
   * @param string
   */
  public function setDocid($docid)
  {
    $this->docid = $docid;
  }
  /**
   * @return string
   */
  public function getDocid()
  {
    return $this->docid;
  }
  /**
   * @param string
   */
  public function setMetadata($metadata)
  {
    $this->metadata = $metadata;
  }
  /**
   * @return string
   */
  public function getMetadata()
  {
    return $this->metadata;
  }
  /**
   * @param ResearchScamNearestNeighborsNeighbor[]
   */
  public function setNeighbor($neighbor)
  {
    $this->neighbor = $neighbor;
  }
  /**
   * @return ResearchScamNearestNeighborsNeighbor[]
   */
  public function getNeighbor()
  {
    return $this->neighbor;
  }
  /**
   * @param ResearchScamNeighborSelectionOverride
   */
  public function setNeighborSelectionOverride(ResearchScamNeighborSelectionOverride $neighborSelectionOverride)
  {
    $this->neighborSelectionOverride = $neighborSelectionOverride;
  }
  /**
   * @return ResearchScamNeighborSelectionOverride
   */
  public function getNeighborSelectionOverride()
  {
    return $this->neighborSelectionOverride;
  }
  /**
   * @param ResearchScamGenericFeatureVector
   */
  public function setQuery(ResearchScamGenericFeatureVector $query)
  {
    $this->query = $query;
  }
  /**
   * @return ResearchScamGenericFeatureVector
   */
  public function getQuery()
  {
    return $this->query;
  }
  /**
   * @param string
   */
  public function setRetrievedVersion($retrievedVersion)
  {
    $this->retrievedVersion = $retrievedVersion;
  }
  /**
   * @return string
   */
  public function getRetrievedVersion()
  {
    return $this->retrievedVersion;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ResearchScamNearestNeighbors::class, 'Google_Service_Contentwarehouse_ResearchScamNearestNeighbors');
