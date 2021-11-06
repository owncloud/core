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

namespace Google\Service\Books;

class DictlayerdataDictWords extends \Google\Collection
{
  protected $collection_key = 'senses';
  protected $derivativesType = DictlayerdataDictWordsDerivatives::class;
  protected $derivativesDataType = 'array';
  protected $examplesType = DictlayerdataDictWordsExamples::class;
  protected $examplesDataType = 'array';
  protected $sensesType = DictlayerdataDictWordsSenses::class;
  protected $sensesDataType = 'array';
  protected $sourceType = DictlayerdataDictWordsSource::class;
  protected $sourceDataType = '';

  /**
   * @param DictlayerdataDictWordsDerivatives[]
   */
  public function setDerivatives($derivatives)
  {
    $this->derivatives = $derivatives;
  }
  /**
   * @return DictlayerdataDictWordsDerivatives[]
   */
  public function getDerivatives()
  {
    return $this->derivatives;
  }
  /**
   * @param DictlayerdataDictWordsExamples[]
   */
  public function setExamples($examples)
  {
    $this->examples = $examples;
  }
  /**
   * @return DictlayerdataDictWordsExamples[]
   */
  public function getExamples()
  {
    return $this->examples;
  }
  /**
   * @param DictlayerdataDictWordsSenses[]
   */
  public function setSenses($senses)
  {
    $this->senses = $senses;
  }
  /**
   * @return DictlayerdataDictWordsSenses[]
   */
  public function getSenses()
  {
    return $this->senses;
  }
  /**
   * @param DictlayerdataDictWordsSource
   */
  public function setSource(DictlayerdataDictWordsSource $source)
  {
    $this->source = $source;
  }
  /**
   * @return DictlayerdataDictWordsSource
   */
  public function getSource()
  {
    return $this->source;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DictlayerdataDictWords::class, 'Google_Service_Books_DictlayerdataDictWords');
