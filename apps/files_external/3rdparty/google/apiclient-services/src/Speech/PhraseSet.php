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

namespace Google\Service\Speech;

class PhraseSet extends \Google\Collection
{
  protected $collection_key = 'phrases';
  /**
   * @var float
   */
  public $boost;
  /**
   * @var string
   */
  public $name;
  protected $phrasesType = Phrase::class;
  protected $phrasesDataType = 'array';

  /**
   * @param float
   */
  public function setBoost($boost)
  {
    $this->boost = $boost;
  }
  /**
   * @return float
   */
  public function getBoost()
  {
    return $this->boost;
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
   * @param Phrase[]
   */
  public function setPhrases($phrases)
  {
    $this->phrases = $phrases;
  }
  /**
   * @return Phrase[]
   */
  public function getPhrases()
  {
    return $this->phrases;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PhraseSet::class, 'Google_Service_Speech_PhraseSet');
