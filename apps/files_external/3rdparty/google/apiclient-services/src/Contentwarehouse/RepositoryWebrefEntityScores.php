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

class RepositoryWebrefEntityScores extends \Google\Model
{
  /**
   * @var float
   */
  public $allCapsProb;
  /**
   * @var float
   */
  public $alphaEntityIdf;
  /**
   * @var float
   */
  public $commonNgramProb;
  /**
   * @var float
   */
  public $entityIdf;
  /**
   * @var float
   */
  public $nameCapitalizationProb;
  /**
   * @var float
   */
  public $personProb;

  /**
   * @param float
   */
  public function setAllCapsProb($allCapsProb)
  {
    $this->allCapsProb = $allCapsProb;
  }
  /**
   * @return float
   */
  public function getAllCapsProb()
  {
    return $this->allCapsProb;
  }
  /**
   * @param float
   */
  public function setAlphaEntityIdf($alphaEntityIdf)
  {
    $this->alphaEntityIdf = $alphaEntityIdf;
  }
  /**
   * @return float
   */
  public function getAlphaEntityIdf()
  {
    return $this->alphaEntityIdf;
  }
  /**
   * @param float
   */
  public function setCommonNgramProb($commonNgramProb)
  {
    $this->commonNgramProb = $commonNgramProb;
  }
  /**
   * @return float
   */
  public function getCommonNgramProb()
  {
    return $this->commonNgramProb;
  }
  /**
   * @param float
   */
  public function setEntityIdf($entityIdf)
  {
    $this->entityIdf = $entityIdf;
  }
  /**
   * @return float
   */
  public function getEntityIdf()
  {
    return $this->entityIdf;
  }
  /**
   * @param float
   */
  public function setNameCapitalizationProb($nameCapitalizationProb)
  {
    $this->nameCapitalizationProb = $nameCapitalizationProb;
  }
  /**
   * @return float
   */
  public function getNameCapitalizationProb()
  {
    return $this->nameCapitalizationProb;
  }
  /**
   * @param float
   */
  public function setPersonProb($personProb)
  {
    $this->personProb = $personProb;
  }
  /**
   * @return float
   */
  public function getPersonProb()
  {
    return $this->personProb;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RepositoryWebrefEntityScores::class, 'Google_Service_Contentwarehouse_RepositoryWebrefEntityScores');
