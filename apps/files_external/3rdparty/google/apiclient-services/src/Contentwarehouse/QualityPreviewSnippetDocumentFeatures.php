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

class QualityPreviewSnippetDocumentFeatures extends \Google\Model
{
  /**
   * @var float
   */
  public $experimentalTitleSalientTermsScore;
  /**
   * @var float
   */
  public $leadingtextDistanceScore;
  /**
   * @var float
   */
  public $metaBoostScore;
  /**
   * @var float
   */
  public $salientPositionBoostScore;
  /**
   * @var float
   */
  public $salientTermsScore;
  /**
   * @var float
   */
  public $schemaOrgDescriptionBoostScore;
  /**
   * @var float
   */
  public $unstableTokensScore;

  /**
   * @param float
   */
  public function setExperimentalTitleSalientTermsScore($experimentalTitleSalientTermsScore)
  {
    $this->experimentalTitleSalientTermsScore = $experimentalTitleSalientTermsScore;
  }
  /**
   * @return float
   */
  public function getExperimentalTitleSalientTermsScore()
  {
    return $this->experimentalTitleSalientTermsScore;
  }
  /**
   * @param float
   */
  public function setLeadingtextDistanceScore($leadingtextDistanceScore)
  {
    $this->leadingtextDistanceScore = $leadingtextDistanceScore;
  }
  /**
   * @return float
   */
  public function getLeadingtextDistanceScore()
  {
    return $this->leadingtextDistanceScore;
  }
  /**
   * @param float
   */
  public function setMetaBoostScore($metaBoostScore)
  {
    $this->metaBoostScore = $metaBoostScore;
  }
  /**
   * @return float
   */
  public function getMetaBoostScore()
  {
    return $this->metaBoostScore;
  }
  /**
   * @param float
   */
  public function setSalientPositionBoostScore($salientPositionBoostScore)
  {
    $this->salientPositionBoostScore = $salientPositionBoostScore;
  }
  /**
   * @return float
   */
  public function getSalientPositionBoostScore()
  {
    return $this->salientPositionBoostScore;
  }
  /**
   * @param float
   */
  public function setSalientTermsScore($salientTermsScore)
  {
    $this->salientTermsScore = $salientTermsScore;
  }
  /**
   * @return float
   */
  public function getSalientTermsScore()
  {
    return $this->salientTermsScore;
  }
  /**
   * @param float
   */
  public function setSchemaOrgDescriptionBoostScore($schemaOrgDescriptionBoostScore)
  {
    $this->schemaOrgDescriptionBoostScore = $schemaOrgDescriptionBoostScore;
  }
  /**
   * @return float
   */
  public function getSchemaOrgDescriptionBoostScore()
  {
    return $this->schemaOrgDescriptionBoostScore;
  }
  /**
   * @param float
   */
  public function setUnstableTokensScore($unstableTokensScore)
  {
    $this->unstableTokensScore = $unstableTokensScore;
  }
  /**
   * @return float
   */
  public function getUnstableTokensScore()
  {
    return $this->unstableTokensScore;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(QualityPreviewSnippetDocumentFeatures::class, 'Google_Service_Contentwarehouse_QualityPreviewSnippetDocumentFeatures');
