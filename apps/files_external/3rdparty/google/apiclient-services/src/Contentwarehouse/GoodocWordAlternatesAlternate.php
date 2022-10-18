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

class GoodocWordAlternatesAlternate extends \Google\Model
{
  protected $internal_gapi_mappings = [
        "ocrEngineId" => "OcrEngineId",
        "ocrEngineVersion" => "OcrEngineVersion",
        "word" => "Word",
  ];
  /**
   * @var string
   */
  public $ocrEngineId;
  /**
   * @var string
   */
  public $ocrEngineVersion;
  protected $wordType = GoodocWord::class;
  protected $wordDataType = '';

  /**
   * @param string
   */
  public function setOcrEngineId($ocrEngineId)
  {
    $this->ocrEngineId = $ocrEngineId;
  }
  /**
   * @return string
   */
  public function getOcrEngineId()
  {
    return $this->ocrEngineId;
  }
  /**
   * @param string
   */
  public function setOcrEngineVersion($ocrEngineVersion)
  {
    $this->ocrEngineVersion = $ocrEngineVersion;
  }
  /**
   * @return string
   */
  public function getOcrEngineVersion()
  {
    return $this->ocrEngineVersion;
  }
  /**
   * @param GoodocWord
   */
  public function setWord(GoodocWord $word)
  {
    $this->word = $word;
  }
  /**
   * @return GoodocWord
   */
  public function getWord()
  {
    return $this->word;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoodocWordAlternatesAlternate::class, 'Google_Service_Contentwarehouse_GoodocWordAlternatesAlternate');
