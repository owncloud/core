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

class QualityPreviewRanklabSnippet extends \Google\Model
{
  protected $brainFeaturesType = QualityPreviewSnippetBrainFeatures::class;
  protected $brainFeaturesDataType = '';
  protected $documentFeaturesType = QualityPreviewSnippetDocumentFeatures::class;
  protected $documentFeaturesDataType = '';
  protected $experimentalFeaturesType = QualityPreviewSnippetExperimentalFeatures::class;
  protected $experimentalFeaturesDataType = '';
  protected $qualityFeaturesType = QualityPreviewSnippetQualityFeatures::class;
  protected $qualityFeaturesDataType = '';
  protected $queryFeaturesType = QualityPreviewSnippetQueryFeatures::class;
  protected $queryFeaturesDataType = '';
  protected $queryTermCoverageFeaturesType = QualityPreviewSnippetQueryTermCoverageFeatures::class;
  protected $queryTermCoverageFeaturesDataType = '';
  protected $snippetInfoType = QualityPreviewChosenSnippetInfo::class;
  protected $snippetInfoDataType = '';

  /**
   * @param QualityPreviewSnippetBrainFeatures
   */
  public function setBrainFeatures(QualityPreviewSnippetBrainFeatures $brainFeatures)
  {
    $this->brainFeatures = $brainFeatures;
  }
  /**
   * @return QualityPreviewSnippetBrainFeatures
   */
  public function getBrainFeatures()
  {
    return $this->brainFeatures;
  }
  /**
   * @param QualityPreviewSnippetDocumentFeatures
   */
  public function setDocumentFeatures(QualityPreviewSnippetDocumentFeatures $documentFeatures)
  {
    $this->documentFeatures = $documentFeatures;
  }
  /**
   * @return QualityPreviewSnippetDocumentFeatures
   */
  public function getDocumentFeatures()
  {
    return $this->documentFeatures;
  }
  /**
   * @param QualityPreviewSnippetExperimentalFeatures
   */
  public function setExperimentalFeatures(QualityPreviewSnippetExperimentalFeatures $experimentalFeatures)
  {
    $this->experimentalFeatures = $experimentalFeatures;
  }
  /**
   * @return QualityPreviewSnippetExperimentalFeatures
   */
  public function getExperimentalFeatures()
  {
    return $this->experimentalFeatures;
  }
  /**
   * @param QualityPreviewSnippetQualityFeatures
   */
  public function setQualityFeatures(QualityPreviewSnippetQualityFeatures $qualityFeatures)
  {
    $this->qualityFeatures = $qualityFeatures;
  }
  /**
   * @return QualityPreviewSnippetQualityFeatures
   */
  public function getQualityFeatures()
  {
    return $this->qualityFeatures;
  }
  /**
   * @param QualityPreviewSnippetQueryFeatures
   */
  public function setQueryFeatures(QualityPreviewSnippetQueryFeatures $queryFeatures)
  {
    $this->queryFeatures = $queryFeatures;
  }
  /**
   * @return QualityPreviewSnippetQueryFeatures
   */
  public function getQueryFeatures()
  {
    return $this->queryFeatures;
  }
  /**
   * @param QualityPreviewSnippetQueryTermCoverageFeatures
   */
  public function setQueryTermCoverageFeatures(QualityPreviewSnippetQueryTermCoverageFeatures $queryTermCoverageFeatures)
  {
    $this->queryTermCoverageFeatures = $queryTermCoverageFeatures;
  }
  /**
   * @return QualityPreviewSnippetQueryTermCoverageFeatures
   */
  public function getQueryTermCoverageFeatures()
  {
    return $this->queryTermCoverageFeatures;
  }
  /**
   * @param QualityPreviewChosenSnippetInfo
   */
  public function setSnippetInfo(QualityPreviewChosenSnippetInfo $snippetInfo)
  {
    $this->snippetInfo = $snippetInfo;
  }
  /**
   * @return QualityPreviewChosenSnippetInfo
   */
  public function getSnippetInfo()
  {
    return $this->snippetInfo;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(QualityPreviewRanklabSnippet::class, 'Google_Service_Contentwarehouse_QualityPreviewRanklabSnippet');
