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

class NlpSemanticParsingSaftMentionAnnotation extends \Google\Model
{
  protected $coreferenceType = NlpSemanticParsingSaftCoreference::class;
  protected $coreferenceDataType = '';
  protected $entityType = NlpSemanticParsingSaftSpan::class;
  protected $entityDataType = '';
  protected $measureType = NlpSemanticParsingSaftMeasure::class;
  protected $measureDataType = '';
  protected $titleType = NlpSemanticParsingSaftSpan::class;
  protected $titleDataType = '';

  /**
   * @param NlpSemanticParsingSaftCoreference
   */
  public function setCoreference(NlpSemanticParsingSaftCoreference $coreference)
  {
    $this->coreference = $coreference;
  }
  /**
   * @return NlpSemanticParsingSaftCoreference
   */
  public function getCoreference()
  {
    return $this->coreference;
  }
  /**
   * @param NlpSemanticParsingSaftSpan
   */
  public function setEntity(NlpSemanticParsingSaftSpan $entity)
  {
    $this->entity = $entity;
  }
  /**
   * @return NlpSemanticParsingSaftSpan
   */
  public function getEntity()
  {
    return $this->entity;
  }
  /**
   * @param NlpSemanticParsingSaftMeasure
   */
  public function setMeasure(NlpSemanticParsingSaftMeasure $measure)
  {
    $this->measure = $measure;
  }
  /**
   * @return NlpSemanticParsingSaftMeasure
   */
  public function getMeasure()
  {
    return $this->measure;
  }
  /**
   * @param NlpSemanticParsingSaftSpan
   */
  public function setTitle(NlpSemanticParsingSaftSpan $title)
  {
    $this->title = $title;
  }
  /**
   * @return NlpSemanticParsingSaftSpan
   */
  public function getTitle()
  {
    return $this->title;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NlpSemanticParsingSaftMentionAnnotation::class, 'Google_Service_Contentwarehouse_NlpSemanticParsingSaftMentionAnnotation');
