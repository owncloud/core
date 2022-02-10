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

namespace Google\Service\CloudNaturalLanguage;

class PartOfSpeech extends \Google\Model
{
  /**
   * @var string
   */
  public $aspect;
  /**
   * @var string
   */
  public $case;
  /**
   * @var string
   */
  public $form;
  /**
   * @var string
   */
  public $gender;
  /**
   * @var string
   */
  public $mood;
  /**
   * @var string
   */
  public $number;
  /**
   * @var string
   */
  public $person;
  /**
   * @var string
   */
  public $proper;
  /**
   * @var string
   */
  public $reciprocity;
  /**
   * @var string
   */
  public $tag;
  /**
   * @var string
   */
  public $tense;
  /**
   * @var string
   */
  public $voice;

  /**
   * @param string
   */
  public function setAspect($aspect)
  {
    $this->aspect = $aspect;
  }
  /**
   * @return string
   */
  public function getAspect()
  {
    return $this->aspect;
  }
  /**
   * @param string
   */
  public function setCase($case)
  {
    $this->case = $case;
  }
  /**
   * @return string
   */
  public function getCase()
  {
    return $this->case;
  }
  /**
   * @param string
   */
  public function setForm($form)
  {
    $this->form = $form;
  }
  /**
   * @return string
   */
  public function getForm()
  {
    return $this->form;
  }
  /**
   * @param string
   */
  public function setGender($gender)
  {
    $this->gender = $gender;
  }
  /**
   * @return string
   */
  public function getGender()
  {
    return $this->gender;
  }
  /**
   * @param string
   */
  public function setMood($mood)
  {
    $this->mood = $mood;
  }
  /**
   * @return string
   */
  public function getMood()
  {
    return $this->mood;
  }
  /**
   * @param string
   */
  public function setNumber($number)
  {
    $this->number = $number;
  }
  /**
   * @return string
   */
  public function getNumber()
  {
    return $this->number;
  }
  /**
   * @param string
   */
  public function setPerson($person)
  {
    $this->person = $person;
  }
  /**
   * @return string
   */
  public function getPerson()
  {
    return $this->person;
  }
  /**
   * @param string
   */
  public function setProper($proper)
  {
    $this->proper = $proper;
  }
  /**
   * @return string
   */
  public function getProper()
  {
    return $this->proper;
  }
  /**
   * @param string
   */
  public function setReciprocity($reciprocity)
  {
    $this->reciprocity = $reciprocity;
  }
  /**
   * @return string
   */
  public function getReciprocity()
  {
    return $this->reciprocity;
  }
  /**
   * @param string
   */
  public function setTag($tag)
  {
    $this->tag = $tag;
  }
  /**
   * @return string
   */
  public function getTag()
  {
    return $this->tag;
  }
  /**
   * @param string
   */
  public function setTense($tense)
  {
    $this->tense = $tense;
  }
  /**
   * @return string
   */
  public function getTense()
  {
    return $this->tense;
  }
  /**
   * @param string
   */
  public function setVoice($voice)
  {
    $this->voice = $voice;
  }
  /**
   * @return string
   */
  public function getVoice()
  {
    return $this->voice;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PartOfSpeech::class, 'Google_Service_CloudNaturalLanguage_PartOfSpeech');
