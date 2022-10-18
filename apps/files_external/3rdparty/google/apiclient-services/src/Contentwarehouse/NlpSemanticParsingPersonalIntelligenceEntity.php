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

class NlpSemanticParsingPersonalIntelligenceEntity extends \Google\Model
{
  protected $airlineConfigType = TravelFlightsAirlineConfig::class;
  protected $airlineConfigDataType = '';
  protected $evalDataType = NlpSemanticParsingAnnotationEvalData::class;
  protected $evalDataDataType = '';
  /**
   * @var string
   */
  public $name;
  protected $qrefAnnotationType = NlpSemanticParsingQRefAnnotation::class;
  protected $qrefAnnotationDataType = '';

  /**
   * @param TravelFlightsAirlineConfig
   */
  public function setAirlineConfig(TravelFlightsAirlineConfig $airlineConfig)
  {
    $this->airlineConfig = $airlineConfig;
  }
  /**
   * @return TravelFlightsAirlineConfig
   */
  public function getAirlineConfig()
  {
    return $this->airlineConfig;
  }
  /**
   * @param NlpSemanticParsingAnnotationEvalData
   */
  public function setEvalData(NlpSemanticParsingAnnotationEvalData $evalData)
  {
    $this->evalData = $evalData;
  }
  /**
   * @return NlpSemanticParsingAnnotationEvalData
   */
  public function getEvalData()
  {
    return $this->evalData;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param NlpSemanticParsingQRefAnnotation
   */
  public function setQrefAnnotation(NlpSemanticParsingQRefAnnotation $qrefAnnotation)
  {
    $this->qrefAnnotation = $qrefAnnotation;
  }
  /**
   * @return NlpSemanticParsingQRefAnnotation
   */
  public function getQrefAnnotation()
  {
    return $this->qrefAnnotation;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NlpSemanticParsingPersonalIntelligenceEntity::class, 'Google_Service_Contentwarehouse_NlpSemanticParsingPersonalIntelligenceEntity');
