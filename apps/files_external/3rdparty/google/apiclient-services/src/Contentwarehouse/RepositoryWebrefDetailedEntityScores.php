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

class RepositoryWebrefDetailedEntityScores extends \Google\Model
{
  /**
   * @var float
   */
  public $anchorScore;
  /**
   * @var float
   */
  public $bodyScore;
  /**
   * @var float
   */
  public $connectedness;
  /**
   * @var float
   */
  public $docScore;
  /**
   * @var float
   */
  public $geoTopicNormalizedScore;
  /**
   * @var bool
   */
  public $isAuthor;
  /**
   * @var bool
   */
  public $isPublisher;
  /**
   * @var bool
   */
  public $isReferencePage;
  /**
   * @var float
   */
  public $localEntityLocationConfidence;
  /**
   * @var float
   */
  public $nbScore;
  /**
   * @var float
   */
  public $newConfidenceExperimentalDontUse;
  /**
   * @var float
   */
  public $newsTopicalityScore;
  /**
   * @var float
   */
  public $normalizedTopicality;
  protected $referencePageScoresType = RepositoryWebrefReferencePageScores::class;
  protected $referencePageScoresDataType = '';
  /**
   * @var float
   */
  public $relevanceScore;

  /**
   * @param float
   */
  public function setAnchorScore($anchorScore)
  {
    $this->anchorScore = $anchorScore;
  }
  /**
   * @return float
   */
  public function getAnchorScore()
  {
    return $this->anchorScore;
  }
  /**
   * @param float
   */
  public function setBodyScore($bodyScore)
  {
    $this->bodyScore = $bodyScore;
  }
  /**
   * @return float
   */
  public function getBodyScore()
  {
    return $this->bodyScore;
  }
  /**
   * @param float
   */
  public function setConnectedness($connectedness)
  {
    $this->connectedness = $connectedness;
  }
  /**
   * @return float
   */
  public function getConnectedness()
  {
    return $this->connectedness;
  }
  /**
   * @param float
   */
  public function setDocScore($docScore)
  {
    $this->docScore = $docScore;
  }
  /**
   * @return float
   */
  public function getDocScore()
  {
    return $this->docScore;
  }
  /**
   * @param float
   */
  public function setGeoTopicNormalizedScore($geoTopicNormalizedScore)
  {
    $this->geoTopicNormalizedScore = $geoTopicNormalizedScore;
  }
  /**
   * @return float
   */
  public function getGeoTopicNormalizedScore()
  {
    return $this->geoTopicNormalizedScore;
  }
  /**
   * @param bool
   */
  public function setIsAuthor($isAuthor)
  {
    $this->isAuthor = $isAuthor;
  }
  /**
   * @return bool
   */
  public function getIsAuthor()
  {
    return $this->isAuthor;
  }
  /**
   * @param bool
   */
  public function setIsPublisher($isPublisher)
  {
    $this->isPublisher = $isPublisher;
  }
  /**
   * @return bool
   */
  public function getIsPublisher()
  {
    return $this->isPublisher;
  }
  /**
   * @param bool
   */
  public function setIsReferencePage($isReferencePage)
  {
    $this->isReferencePage = $isReferencePage;
  }
  /**
   * @return bool
   */
  public function getIsReferencePage()
  {
    return $this->isReferencePage;
  }
  /**
   * @param float
   */
  public function setLocalEntityLocationConfidence($localEntityLocationConfidence)
  {
    $this->localEntityLocationConfidence = $localEntityLocationConfidence;
  }
  /**
   * @return float
   */
  public function getLocalEntityLocationConfidence()
  {
    return $this->localEntityLocationConfidence;
  }
  /**
   * @param float
   */
  public function setNbScore($nbScore)
  {
    $this->nbScore = $nbScore;
  }
  /**
   * @return float
   */
  public function getNbScore()
  {
    return $this->nbScore;
  }
  /**
   * @param float
   */
  public function setNewConfidenceExperimentalDontUse($newConfidenceExperimentalDontUse)
  {
    $this->newConfidenceExperimentalDontUse = $newConfidenceExperimentalDontUse;
  }
  /**
   * @return float
   */
  public function getNewConfidenceExperimentalDontUse()
  {
    return $this->newConfidenceExperimentalDontUse;
  }
  /**
   * @param float
   */
  public function setNewsTopicalityScore($newsTopicalityScore)
  {
    $this->newsTopicalityScore = $newsTopicalityScore;
  }
  /**
   * @return float
   */
  public function getNewsTopicalityScore()
  {
    return $this->newsTopicalityScore;
  }
  /**
   * @param float
   */
  public function setNormalizedTopicality($normalizedTopicality)
  {
    $this->normalizedTopicality = $normalizedTopicality;
  }
  /**
   * @return float
   */
  public function getNormalizedTopicality()
  {
    return $this->normalizedTopicality;
  }
  /**
   * @param RepositoryWebrefReferencePageScores
   */
  public function setReferencePageScores(RepositoryWebrefReferencePageScores $referencePageScores)
  {
    $this->referencePageScores = $referencePageScores;
  }
  /**
   * @return RepositoryWebrefReferencePageScores
   */
  public function getReferencePageScores()
  {
    return $this->referencePageScores;
  }
  /**
   * @param float
   */
  public function setRelevanceScore($relevanceScore)
  {
    $this->relevanceScore = $relevanceScore;
  }
  /**
   * @return float
   */
  public function getRelevanceScore()
  {
    return $this->relevanceScore;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RepositoryWebrefDetailedEntityScores::class, 'Google_Service_Contentwarehouse_RepositoryWebrefDetailedEntityScores');
