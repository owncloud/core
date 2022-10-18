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

namespace Google\Service\Document;

class GoogleCloudDocumentaiV1DocumentPageImageQualityScores extends \Google\Collection
{
  protected $collection_key = 'detectedDefects';
  protected $detectedDefectsType = GoogleCloudDocumentaiV1DocumentPageImageQualityScoresDetectedDefect::class;
  protected $detectedDefectsDataType = 'array';
  /**
   * @var float
   */
  public $qualityScore;

  /**
   * @param GoogleCloudDocumentaiV1DocumentPageImageQualityScoresDetectedDefect[]
   */
  public function setDetectedDefects($detectedDefects)
  {
    $this->detectedDefects = $detectedDefects;
  }
  /**
   * @return GoogleCloudDocumentaiV1DocumentPageImageQualityScoresDetectedDefect[]
   */
  public function getDetectedDefects()
  {
    return $this->detectedDefects;
  }
  /**
   * @param float
   */
  public function setQualityScore($qualityScore)
  {
    $this->qualityScore = $qualityScore;
  }
  /**
   * @return float
   */
  public function getQualityScore()
  {
    return $this->qualityScore;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDocumentaiV1DocumentPageImageQualityScores::class, 'Google_Service_Document_GoogleCloudDocumentaiV1DocumentPageImageQualityScores');
