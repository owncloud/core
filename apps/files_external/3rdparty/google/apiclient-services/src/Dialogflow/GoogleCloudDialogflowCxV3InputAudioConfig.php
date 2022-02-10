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

namespace Google\Service\Dialogflow;

class GoogleCloudDialogflowCxV3InputAudioConfig extends \Google\Collection
{
  protected $collection_key = 'phraseHints';
  /**
   * @var string
   */
  public $audioEncoding;
  /**
   * @var bool
   */
  public $enableWordInfo;
  /**
   * @var string
   */
  public $model;
  /**
   * @var string
   */
  public $modelVariant;
  /**
   * @var string[]
   */
  public $phraseHints;
  /**
   * @var int
   */
  public $sampleRateHertz;
  /**
   * @var bool
   */
  public $singleUtterance;

  /**
   * @param string
   */
  public function setAudioEncoding($audioEncoding)
  {
    $this->audioEncoding = $audioEncoding;
  }
  /**
   * @return string
   */
  public function getAudioEncoding()
  {
    return $this->audioEncoding;
  }
  /**
   * @param bool
   */
  public function setEnableWordInfo($enableWordInfo)
  {
    $this->enableWordInfo = $enableWordInfo;
  }
  /**
   * @return bool
   */
  public function getEnableWordInfo()
  {
    return $this->enableWordInfo;
  }
  /**
   * @param string
   */
  public function setModel($model)
  {
    $this->model = $model;
  }
  /**
   * @return string
   */
  public function getModel()
  {
    return $this->model;
  }
  /**
   * @param string
   */
  public function setModelVariant($modelVariant)
  {
    $this->modelVariant = $modelVariant;
  }
  /**
   * @return string
   */
  public function getModelVariant()
  {
    return $this->modelVariant;
  }
  /**
   * @param string[]
   */
  public function setPhraseHints($phraseHints)
  {
    $this->phraseHints = $phraseHints;
  }
  /**
   * @return string[]
   */
  public function getPhraseHints()
  {
    return $this->phraseHints;
  }
  /**
   * @param int
   */
  public function setSampleRateHertz($sampleRateHertz)
  {
    $this->sampleRateHertz = $sampleRateHertz;
  }
  /**
   * @return int
   */
  public function getSampleRateHertz()
  {
    return $this->sampleRateHertz;
  }
  /**
   * @param bool
   */
  public function setSingleUtterance($singleUtterance)
  {
    $this->singleUtterance = $singleUtterance;
  }
  /**
   * @return bool
   */
  public function getSingleUtterance()
  {
    return $this->singleUtterance;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDialogflowCxV3InputAudioConfig::class, 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3InputAudioConfig');
