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

class NlpSemanticParsingLocalLocation extends \Google\Collection
{
  protected $collection_key = 'locationConstraint';
  protected $basicLocationType = NlpSemanticParsingLocalBasicLocation::class;
  protected $basicLocationDataType = '';
  protected $compoundLocationType = NlpSemanticParsingLocalCompoundLocation::class;
  protected $compoundLocationDataType = '';
  protected $contactLocationType = NlpSemanticParsingLocalContactLocation::class;
  protected $contactLocationDataType = '';
  /**
   * @var bool
   */
  public $isMerged;
  protected $locationConstraintType = NlpSemanticParsingLocalLocationConstraint::class;
  protected $locationConstraintDataType = 'array';
  /**
   * @var int
   */
  public $numBytes;
  protected $resolvedLocalResultType = QualityDialogManagerLocalResult::class;
  protected $resolvedLocalResultDataType = '';
  /**
   * @var int
   */
  public $startByte;
  /**
   * @var string
   */
  public $text;
  protected $userSpecifiedLocationType = KnowledgeVerticalsWeatherProtoUserSpecifiedLocation::class;
  protected $userSpecifiedLocationDataType = '';
  protected $vicinityLocationType = NlpSemanticParsingLocalVicinityLocation::class;
  protected $vicinityLocationDataType = '';

  /**
   * @param NlpSemanticParsingLocalBasicLocation
   */
  public function setBasicLocation(NlpSemanticParsingLocalBasicLocation $basicLocation)
  {
    $this->basicLocation = $basicLocation;
  }
  /**
   * @return NlpSemanticParsingLocalBasicLocation
   */
  public function getBasicLocation()
  {
    return $this->basicLocation;
  }
  /**
   * @param NlpSemanticParsingLocalCompoundLocation
   */
  public function setCompoundLocation(NlpSemanticParsingLocalCompoundLocation $compoundLocation)
  {
    $this->compoundLocation = $compoundLocation;
  }
  /**
   * @return NlpSemanticParsingLocalCompoundLocation
   */
  public function getCompoundLocation()
  {
    return $this->compoundLocation;
  }
  /**
   * @param NlpSemanticParsingLocalContactLocation
   */
  public function setContactLocation(NlpSemanticParsingLocalContactLocation $contactLocation)
  {
    $this->contactLocation = $contactLocation;
  }
  /**
   * @return NlpSemanticParsingLocalContactLocation
   */
  public function getContactLocation()
  {
    return $this->contactLocation;
  }
  /**
   * @param bool
   */
  public function setIsMerged($isMerged)
  {
    $this->isMerged = $isMerged;
  }
  /**
   * @return bool
   */
  public function getIsMerged()
  {
    return $this->isMerged;
  }
  /**
   * @param NlpSemanticParsingLocalLocationConstraint[]
   */
  public function setLocationConstraint($locationConstraint)
  {
    $this->locationConstraint = $locationConstraint;
  }
  /**
   * @return NlpSemanticParsingLocalLocationConstraint[]
   */
  public function getLocationConstraint()
  {
    return $this->locationConstraint;
  }
  /**
   * @param int
   */
  public function setNumBytes($numBytes)
  {
    $this->numBytes = $numBytes;
  }
  /**
   * @return int
   */
  public function getNumBytes()
  {
    return $this->numBytes;
  }
  /**
   * @param QualityDialogManagerLocalResult
   */
  public function setResolvedLocalResult(QualityDialogManagerLocalResult $resolvedLocalResult)
  {
    $this->resolvedLocalResult = $resolvedLocalResult;
  }
  /**
   * @return QualityDialogManagerLocalResult
   */
  public function getResolvedLocalResult()
  {
    return $this->resolvedLocalResult;
  }
  /**
   * @param int
   */
  public function setStartByte($startByte)
  {
    $this->startByte = $startByte;
  }
  /**
   * @return int
   */
  public function getStartByte()
  {
    return $this->startByte;
  }
  /**
   * @param string
   */
  public function setText($text)
  {
    $this->text = $text;
  }
  /**
   * @return string
   */
  public function getText()
  {
    return $this->text;
  }
  /**
   * @param KnowledgeVerticalsWeatherProtoUserSpecifiedLocation
   */
  public function setUserSpecifiedLocation(KnowledgeVerticalsWeatherProtoUserSpecifiedLocation $userSpecifiedLocation)
  {
    $this->userSpecifiedLocation = $userSpecifiedLocation;
  }
  /**
   * @return KnowledgeVerticalsWeatherProtoUserSpecifiedLocation
   */
  public function getUserSpecifiedLocation()
  {
    return $this->userSpecifiedLocation;
  }
  /**
   * @param NlpSemanticParsingLocalVicinityLocation
   */
  public function setVicinityLocation(NlpSemanticParsingLocalVicinityLocation $vicinityLocation)
  {
    $this->vicinityLocation = $vicinityLocation;
  }
  /**
   * @return NlpSemanticParsingLocalVicinityLocation
   */
  public function getVicinityLocation()
  {
    return $this->vicinityLocation;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NlpSemanticParsingLocalLocation::class, 'Google_Service_Contentwarehouse_NlpSemanticParsingLocalLocation');
