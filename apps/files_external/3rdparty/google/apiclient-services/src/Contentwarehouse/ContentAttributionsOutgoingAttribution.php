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

class ContentAttributionsOutgoingAttribution extends \Google\Model
{
  /**
   * @var string
   */
  public $bestEvidenceType;
  /**
   * @var string
   */
  public $docid;
  /**
   * @var string
   */
  public $properties;
  /**
   * @var bool
   */
  public $usableForClustering;

  /**
   * @param string
   */
  public function setBestEvidenceType($bestEvidenceType)
  {
    $this->bestEvidenceType = $bestEvidenceType;
  }
  /**
   * @return string
   */
  public function getBestEvidenceType()
  {
    return $this->bestEvidenceType;
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
   * @param string
   */
  public function setProperties($properties)
  {
    $this->properties = $properties;
  }
  /**
   * @return string
   */
  public function getProperties()
  {
    return $this->properties;
  }
  /**
   * @param bool
   */
  public function setUsableForClustering($usableForClustering)
  {
    $this->usableForClustering = $usableForClustering;
  }
  /**
   * @return bool
   */
  public function getUsableForClustering()
  {
    return $this->usableForClustering;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ContentAttributionsOutgoingAttribution::class, 'Google_Service_Contentwarehouse_ContentAttributionsOutgoingAttribution');
