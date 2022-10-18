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

class QualitySalientTermsSignalTermData extends \Google\Collection
{
  protected $collection_key = 'originalTerm';
  /**
   * @var float
   */
  public $bigramDiscountTf;
  /**
   * @var float
   */
  public $bigramness;
  /**
   * @var float
   */
  public $centrality;
  /**
   * @var float
   */
  public $correctedTf;
  /**
   * @var float
   */
  public $expectedTf;
  /**
   * @var float
   */
  public $globalNpmi;
  /**
   * @var float
   */
  public $idf;
  /**
   * @var bool
   */
  public $isBigram;
  /**
   * @var string
   */
  public $label;
  /**
   * @var float
   */
  public $localNpmi;
  /**
   * @var float
   */
  public $observedTf;
  protected $originalTermType = QualitySalientTermsSignalTermData::class;
  protected $originalTermDataType = 'array';
  /**
   * @var float
   */
  public $rawTf;
  /**
   * @var float
   */
  public $salience;
  /**
   * @var string
   */
  public $source;

  /**
   * @param float
   */
  public function setBigramDiscountTf($bigramDiscountTf)
  {
    $this->bigramDiscountTf = $bigramDiscountTf;
  }
  /**
   * @return float
   */
  public function getBigramDiscountTf()
  {
    return $this->bigramDiscountTf;
  }
  /**
   * @param float
   */
  public function setBigramness($bigramness)
  {
    $this->bigramness = $bigramness;
  }
  /**
   * @return float
   */
  public function getBigramness()
  {
    return $this->bigramness;
  }
  /**
   * @param float
   */
  public function setCentrality($centrality)
  {
    $this->centrality = $centrality;
  }
  /**
   * @return float
   */
  public function getCentrality()
  {
    return $this->centrality;
  }
  /**
   * @param float
   */
  public function setCorrectedTf($correctedTf)
  {
    $this->correctedTf = $correctedTf;
  }
  /**
   * @return float
   */
  public function getCorrectedTf()
  {
    return $this->correctedTf;
  }
  /**
   * @param float
   */
  public function setExpectedTf($expectedTf)
  {
    $this->expectedTf = $expectedTf;
  }
  /**
   * @return float
   */
  public function getExpectedTf()
  {
    return $this->expectedTf;
  }
  /**
   * @param float
   */
  public function setGlobalNpmi($globalNpmi)
  {
    $this->globalNpmi = $globalNpmi;
  }
  /**
   * @return float
   */
  public function getGlobalNpmi()
  {
    return $this->globalNpmi;
  }
  /**
   * @param float
   */
  public function setIdf($idf)
  {
    $this->idf = $idf;
  }
  /**
   * @return float
   */
  public function getIdf()
  {
    return $this->idf;
  }
  /**
   * @param bool
   */
  public function setIsBigram($isBigram)
  {
    $this->isBigram = $isBigram;
  }
  /**
   * @return bool
   */
  public function getIsBigram()
  {
    return $this->isBigram;
  }
  /**
   * @param string
   */
  public function setLabel($label)
  {
    $this->label = $label;
  }
  /**
   * @return string
   */
  public function getLabel()
  {
    return $this->label;
  }
  /**
   * @param float
   */
  public function setLocalNpmi($localNpmi)
  {
    $this->localNpmi = $localNpmi;
  }
  /**
   * @return float
   */
  public function getLocalNpmi()
  {
    return $this->localNpmi;
  }
  /**
   * @param float
   */
  public function setObservedTf($observedTf)
  {
    $this->observedTf = $observedTf;
  }
  /**
   * @return float
   */
  public function getObservedTf()
  {
    return $this->observedTf;
  }
  /**
   * @param QualitySalientTermsSignalTermData[]
   */
  public function setOriginalTerm($originalTerm)
  {
    $this->originalTerm = $originalTerm;
  }
  /**
   * @return QualitySalientTermsSignalTermData[]
   */
  public function getOriginalTerm()
  {
    return $this->originalTerm;
  }
  /**
   * @param float
   */
  public function setRawTf($rawTf)
  {
    $this->rawTf = $rawTf;
  }
  /**
   * @return float
   */
  public function getRawTf()
  {
    return $this->rawTf;
  }
  /**
   * @param float
   */
  public function setSalience($salience)
  {
    $this->salience = $salience;
  }
  /**
   * @return float
   */
  public function getSalience()
  {
    return $this->salience;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(QualitySalientTermsSignalTermData::class, 'Google_Service_Contentwarehouse_QualitySalientTermsSignalTermData');
