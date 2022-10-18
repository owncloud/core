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

class UniversalsearchNewPackerKnowledgeResultSupport extends \Google\Collection
{
  protected $collection_key = 'provenance';
  /**
   * @var string
   */
  public $debug;
  /**
   * @var string
   */
  public $docid;
  /**
   * @var float
   */
  public $estimatedNaviness;
  protected $provenanceType = UniversalsearchNewPackerKnowledgeResultSupportProvenance::class;
  protected $provenanceDataType = 'array';
  /**
   * @var int
   */
  public $rank;
  /**
   * @var float
   */
  public $score;
  /**
   * @var string
   */
  public $source;
  /**
   * @var string
   */
  public $url;

  /**
   * @param string
   */
  public function setDebug($debug)
  {
    $this->debug = $debug;
  }
  /**
   * @return string
   */
  public function getDebug()
  {
    return $this->debug;
  }
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
   * @param float
   */
  public function setEstimatedNaviness($estimatedNaviness)
  {
    $this->estimatedNaviness = $estimatedNaviness;
  }
  /**
   * @return float
   */
  public function getEstimatedNaviness()
  {
    return $this->estimatedNaviness;
  }
  /**
   * @param UniversalsearchNewPackerKnowledgeResultSupportProvenance[]
   */
  public function setProvenance($provenance)
  {
    $this->provenance = $provenance;
  }
  /**
   * @return UniversalsearchNewPackerKnowledgeResultSupportProvenance[]
   */
  public function getProvenance()
  {
    return $this->provenance;
  }
  /**
   * @param int
   */
  public function setRank($rank)
  {
    $this->rank = $rank;
  }
  /**
   * @return int
   */
  public function getRank()
  {
    return $this->rank;
  }
  /**
   * @param float
   */
  public function setScore($score)
  {
    $this->score = $score;
  }
  /**
   * @return float
   */
  public function getScore()
  {
    return $this->score;
  }
  /**
   * @param string
   */
  public function setSource($source)
  {
    $this->source = $source;
  }
  /**
   * @return string
   */
  public function getSource()
  {
    return $this->source;
  }
  /**
   * @param string
   */
  public function setUrl($url)
  {
    $this->url = $url;
  }
  /**
   * @return string
   */
  public function getUrl()
  {
    return $this->url;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(UniversalsearchNewPackerKnowledgeResultSupport::class, 'Google_Service_Contentwarehouse_UniversalsearchNewPackerKnowledgeResultSupport');
