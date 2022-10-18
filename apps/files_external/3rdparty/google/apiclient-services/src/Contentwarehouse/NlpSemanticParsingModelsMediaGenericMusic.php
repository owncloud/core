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

class NlpSemanticParsingModelsMediaGenericMusic extends \Google\Model
{
  protected $annotationListType = NlpSemanticParsingModelsMediaMediaAnnotationList::class;
  protected $annotationListDataType = '';
  protected $evalDataType = NlpSemanticParsingAnnotationEvalData::class;
  protected $evalDataDataType = '';
  /**
   * @var bool
   */
  public $newMusic;
  /**
   * @var string
   */
  public $rawText;
  /**
   * @var string
   */
  public $type;

  /**
   * @param NlpSemanticParsingModelsMediaMediaAnnotationList
   */
  public function setAnnotationList(NlpSemanticParsingModelsMediaMediaAnnotationList $annotationList)
  {
    $this->annotationList = $annotationList;
  }
  /**
   * @return NlpSemanticParsingModelsMediaMediaAnnotationList
   */
  public function getAnnotationList()
  {
    return $this->annotationList;
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
   * @param bool
   */
  public function setNewMusic($newMusic)
  {
    $this->newMusic = $newMusic;
  }
  /**
   * @return bool
   */
  public function getNewMusic()
  {
    return $this->newMusic;
  }
  /**
   * @param string
   */
  public function setRawText($rawText)
  {
    $this->rawText = $rawText;
  }
  /**
   * @return string
   */
  public function getRawText()
  {
    return $this->rawText;
  }
  /**
   * @param string
   */
  public function setType($type)
  {
    $this->type = $type;
  }
  /**
   * @return string
   */
  public function getType()
  {
    return $this->type;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NlpSemanticParsingModelsMediaGenericMusic::class, 'Google_Service_Contentwarehouse_NlpSemanticParsingModelsMediaGenericMusic');
