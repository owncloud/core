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

class NlpSemanticParsingModelsDialogReferentsDialogReferents extends \Google\Collection
{
  protected $collection_key = 'taskMention';
  protected $evalDataType = NlpSemanticParsingAnnotationEvalData::class;
  protected $evalDataDataType = '';
  protected $fieldType = NlpSemanticParsingModelsDialogReferentsListSelection::class;
  protected $fieldDataType = '';
  /**
   * @var int
   */
  public $index;
  protected $nextType = NlpSemanticParsingModelsDialogReferentsDialogReferents::class;
  protected $nextDataType = '';
  protected $selectionType = NlpSemanticParsingModelsDialogReferentsListSelection::class;
  protected $selectionDataType = 'array';
  protected $taskMentionType = NlpSemanticParsingModelsDialogReferentsListSelection::class;
  protected $taskMentionDataType = 'array';

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
   * @param NlpSemanticParsingModelsDialogReferentsListSelection
   */
  public function setField(NlpSemanticParsingModelsDialogReferentsListSelection $field)
  {
    $this->field = $field;
  }
  /**
   * @return NlpSemanticParsingModelsDialogReferentsListSelection
   */
  public function getField()
  {
    return $this->field;
  }
  /**
   * @param int
   */
  public function setIndex($index)
  {
    $this->index = $index;
  }
  /**
   * @return int
   */
  public function getIndex()
  {
    return $this->index;
  }
  /**
   * @param NlpSemanticParsingModelsDialogReferentsDialogReferents
   */
  public function setNext(NlpSemanticParsingModelsDialogReferentsDialogReferents $next)
  {
    $this->next = $next;
  }
  /**
   * @return NlpSemanticParsingModelsDialogReferentsDialogReferents
   */
  public function getNext()
  {
    return $this->next;
  }
  /**
   * @param NlpSemanticParsingModelsDialogReferentsListSelection[]
   */
  public function setSelection($selection)
  {
    $this->selection = $selection;
  }
  /**
   * @return NlpSemanticParsingModelsDialogReferentsListSelection[]
   */
  public function getSelection()
  {
    return $this->selection;
  }
  /**
   * @param NlpSemanticParsingModelsDialogReferentsListSelection[]
   */
  public function setTaskMention($taskMention)
  {
    $this->taskMention = $taskMention;
  }
  /**
   * @return NlpSemanticParsingModelsDialogReferentsListSelection[]
   */
  public function getTaskMention()
  {
    return $this->taskMention;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NlpSemanticParsingModelsDialogReferentsDialogReferents::class, 'Google_Service_Contentwarehouse_NlpSemanticParsingModelsDialogReferentsDialogReferents');
