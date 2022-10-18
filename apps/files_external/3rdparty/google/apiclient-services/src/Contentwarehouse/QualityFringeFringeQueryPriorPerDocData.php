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

class QualityFringeFringeQueryPriorPerDocData extends \Google\Model
{
  /**
   * @var string
   */
  public $encodedCalibratedFringeSitePriorScore;
  /**
   * @var string
   */
  public $encodedChardXlqHoaxPrediction;
  /**
   * @var string
   */
  public $encodedChardXlqYmylPrediction;
  /**
   * @var string
   */
  public $encodedDocumentFringeVulnerability;
  /**
   * @var string
   */
  public $encodedEntityPriorScore;
  /**
   * @var string
   */
  public $encodedFringePriorScore;
  /**
   * @var string
   */
  public $encodedFringeSitePriorScore;
  /**
   * @var string
   */
  public $encodedFringeSitePriorScoreForQfsTraining;
  /**
   * @var string
   */
  public $encodedPredictedXlqScoreAndConfidence;
  /**
   * @var string
   */
  public $encodedProximityScore;

  /**
   * @param string
   */
  public function setEncodedCalibratedFringeSitePriorScore($encodedCalibratedFringeSitePriorScore)
  {
    $this->encodedCalibratedFringeSitePriorScore = $encodedCalibratedFringeSitePriorScore;
  }
  /**
   * @return string
   */
  public function getEncodedCalibratedFringeSitePriorScore()
  {
    return $this->encodedCalibratedFringeSitePriorScore;
  }
  /**
   * @param string
   */
  public function setEncodedChardXlqHoaxPrediction($encodedChardXlqHoaxPrediction)
  {
    $this->encodedChardXlqHoaxPrediction = $encodedChardXlqHoaxPrediction;
  }
  /**
   * @return string
   */
  public function getEncodedChardXlqHoaxPrediction()
  {
    return $this->encodedChardXlqHoaxPrediction;
  }
  /**
   * @param string
   */
  public function setEncodedChardXlqYmylPrediction($encodedChardXlqYmylPrediction)
  {
    $this->encodedChardXlqYmylPrediction = $encodedChardXlqYmylPrediction;
  }
  /**
   * @return string
   */
  public function getEncodedChardXlqYmylPrediction()
  {
    return $this->encodedChardXlqYmylPrediction;
  }
  /**
   * @param string
   */
  public function setEncodedDocumentFringeVulnerability($encodedDocumentFringeVulnerability)
  {
    $this->encodedDocumentFringeVulnerability = $encodedDocumentFringeVulnerability;
  }
  /**
   * @return string
   */
  public function getEncodedDocumentFringeVulnerability()
  {
    return $this->encodedDocumentFringeVulnerability;
  }
  /**
   * @param string
   */
  public function setEncodedEntityPriorScore($encodedEntityPriorScore)
  {
    $this->encodedEntityPriorScore = $encodedEntityPriorScore;
  }
  /**
   * @return string
   */
  public function getEncodedEntityPriorScore()
  {
    return $this->encodedEntityPriorScore;
  }
  /**
   * @param string
   */
  public function setEncodedFringePriorScore($encodedFringePriorScore)
  {
    $this->encodedFringePriorScore = $encodedFringePriorScore;
  }
  /**
   * @return string
   */
  public function getEncodedFringePriorScore()
  {
    return $this->encodedFringePriorScore;
  }
  /**
   * @param string
   */
  public function setEncodedFringeSitePriorScore($encodedFringeSitePriorScore)
  {
    $this->encodedFringeSitePriorScore = $encodedFringeSitePriorScore;
  }
  /**
   * @return string
   */
  public function getEncodedFringeSitePriorScore()
  {
    return $this->encodedFringeSitePriorScore;
  }
  /**
   * @param string
   */
  public function setEncodedFringeSitePriorScoreForQfsTraining($encodedFringeSitePriorScoreForQfsTraining)
  {
    $this->encodedFringeSitePriorScoreForQfsTraining = $encodedFringeSitePriorScoreForQfsTraining;
  }
  /**
   * @return string
   */
  public function getEncodedFringeSitePriorScoreForQfsTraining()
  {
    return $this->encodedFringeSitePriorScoreForQfsTraining;
  }
  /**
   * @param string
   */
  public function setEncodedPredictedXlqScoreAndConfidence($encodedPredictedXlqScoreAndConfidence)
  {
    $this->encodedPredictedXlqScoreAndConfidence = $encodedPredictedXlqScoreAndConfidence;
  }
  /**
   * @return string
   */
  public function getEncodedPredictedXlqScoreAndConfidence()
  {
    return $this->encodedPredictedXlqScoreAndConfidence;
  }
  /**
   * @param string
   */
  public function setEncodedProximityScore($encodedProximityScore)
  {
    $this->encodedProximityScore = $encodedProximityScore;
  }
  /**
   * @return string
   */
  public function getEncodedProximityScore()
  {
    return $this->encodedProximityScore;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(QualityFringeFringeQueryPriorPerDocData::class, 'Google_Service_Contentwarehouse_QualityFringeFringeQueryPriorPerDocData');
