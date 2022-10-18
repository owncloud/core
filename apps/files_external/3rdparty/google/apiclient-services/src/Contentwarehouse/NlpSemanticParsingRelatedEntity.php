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

class NlpSemanticParsingRelatedEntity extends \Google\Model
{
  /**
   * @var string
   */
  public $clusterSupportTransferRelation;
  /**
   * @var string
   */
  public $composedFromRelation;
  /**
   * @var string
   */
  public $equivalentRelation;
  /**
   * @var string
   */
  public $mdvcRelation;
  /**
   * @var string
   */
  public $mid;
  /**
   * @var string
   */
  public $supportTransferRelation;
  /**
   * @var bool
   */
  public $targetIsStbrSource;

  /**
   * @param string
   */
  public function setClusterSupportTransferRelation($clusterSupportTransferRelation)
  {
    $this->clusterSupportTransferRelation = $clusterSupportTransferRelation;
  }
  /**
   * @return string
   */
  public function getClusterSupportTransferRelation()
  {
    return $this->clusterSupportTransferRelation;
  }
  /**
   * @param string
   */
  public function setComposedFromRelation($composedFromRelation)
  {
    $this->composedFromRelation = $composedFromRelation;
  }
  /**
   * @return string
   */
  public function getComposedFromRelation()
  {
    return $this->composedFromRelation;
  }
  /**
   * @param string
   */
  public function setEquivalentRelation($equivalentRelation)
  {
    $this->equivalentRelation = $equivalentRelation;
  }
  /**
   * @return string
   */
  public function getEquivalentRelation()
  {
    return $this->equivalentRelation;
  }
  /**
   * @param string
   */
  public function setMdvcRelation($mdvcRelation)
  {
    $this->mdvcRelation = $mdvcRelation;
  }
  /**
   * @return string
   */
  public function getMdvcRelation()
  {
    return $this->mdvcRelation;
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
   * @param string
   */
  public function setSupportTransferRelation($supportTransferRelation)
  {
    $this->supportTransferRelation = $supportTransferRelation;
  }
  /**
   * @return string
   */
  public function getSupportTransferRelation()
  {
    return $this->supportTransferRelation;
  }
  /**
   * @param bool
   */
  public function setTargetIsStbrSource($targetIsStbrSource)
  {
    $this->targetIsStbrSource = $targetIsStbrSource;
  }
  /**
   * @return bool
   */
  public function getTargetIsStbrSource()
  {
    return $this->targetIsStbrSource;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NlpSemanticParsingRelatedEntity::class, 'Google_Service_Contentwarehouse_NlpSemanticParsingRelatedEntity');
