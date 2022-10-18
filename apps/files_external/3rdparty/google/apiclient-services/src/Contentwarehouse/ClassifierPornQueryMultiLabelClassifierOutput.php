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

class ClassifierPornQueryMultiLabelClassifierOutput extends \Google\Model
{
  protected $csaiType = ClassifierPornQueryClassifierOutput::class;
  protected $csaiDataType = '';
  protected $fringeType = ClassifierPornQueryClassifierOutput::class;
  protected $fringeDataType = '';
  protected $medicalType = ClassifierPornQueryClassifierOutput::class;
  protected $medicalDataType = '';
  protected $offensiveType = ClassifierPornQueryClassifierOutput::class;
  protected $offensiveDataType = '';
  protected $pornType = ClassifierPornQueryClassifierOutput::class;
  protected $pornDataType = '';
  protected $spoofType = ClassifierPornQueryClassifierOutput::class;
  protected $spoofDataType = '';
  protected $violenceType = ClassifierPornQueryClassifierOutput::class;
  protected $violenceDataType = '';
  protected $vulgarType = ClassifierPornQueryClassifierOutput::class;
  protected $vulgarDataType = '';

  /**
   * @param ClassifierPornQueryClassifierOutput
   */
  public function setCsai(ClassifierPornQueryClassifierOutput $csai)
  {
    $this->csai = $csai;
  }
  /**
   * @return ClassifierPornQueryClassifierOutput
   */
  public function getCsai()
  {
    return $this->csai;
  }
  /**
   * @param ClassifierPornQueryClassifierOutput
   */
  public function setFringe(ClassifierPornQueryClassifierOutput $fringe)
  {
    $this->fringe = $fringe;
  }
  /**
   * @return ClassifierPornQueryClassifierOutput
   */
  public function getFringe()
  {
    return $this->fringe;
  }
  /**
   * @param ClassifierPornQueryClassifierOutput
   */
  public function setMedical(ClassifierPornQueryClassifierOutput $medical)
  {
    $this->medical = $medical;
  }
  /**
   * @return ClassifierPornQueryClassifierOutput
   */
  public function getMedical()
  {
    return $this->medical;
  }
  /**
   * @param ClassifierPornQueryClassifierOutput
   */
  public function setOffensive(ClassifierPornQueryClassifierOutput $offensive)
  {
    $this->offensive = $offensive;
  }
  /**
   * @return ClassifierPornQueryClassifierOutput
   */
  public function getOffensive()
  {
    return $this->offensive;
  }
  /**
   * @param ClassifierPornQueryClassifierOutput
   */
  public function setPorn(ClassifierPornQueryClassifierOutput $porn)
  {
    $this->porn = $porn;
  }
  /**
   * @return ClassifierPornQueryClassifierOutput
   */
  public function getPorn()
  {
    return $this->porn;
  }
  /**
   * @param ClassifierPornQueryClassifierOutput
   */
  public function setSpoof(ClassifierPornQueryClassifierOutput $spoof)
  {
    $this->spoof = $spoof;
  }
  /**
   * @return ClassifierPornQueryClassifierOutput
   */
  public function getSpoof()
  {
    return $this->spoof;
  }
  /**
   * @param ClassifierPornQueryClassifierOutput
   */
  public function setViolence(ClassifierPornQueryClassifierOutput $violence)
  {
    $this->violence = $violence;
  }
  /**
   * @return ClassifierPornQueryClassifierOutput
   */
  public function getViolence()
  {
    return $this->violence;
  }
  /**
   * @param ClassifierPornQueryClassifierOutput
   */
  public function setVulgar(ClassifierPornQueryClassifierOutput $vulgar)
  {
    $this->vulgar = $vulgar;
  }
  /**
   * @return ClassifierPornQueryClassifierOutput
   */
  public function getVulgar()
  {
    return $this->vulgar;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ClassifierPornQueryMultiLabelClassifierOutput::class, 'Google_Service_Contentwarehouse_ClassifierPornQueryMultiLabelClassifierOutput');
