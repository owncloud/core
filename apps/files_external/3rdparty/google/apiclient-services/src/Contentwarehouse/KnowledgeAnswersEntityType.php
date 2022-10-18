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

class KnowledgeAnswersEntityType extends \Google\Collection
{
  protected $collection_key = 'stbrDomain';
  /**
   * @var string[]
   */
  public $collection;
  /**
   * @var string[]
   */
  public $excludedCollection;
  /**
   * @var string[]
   */
  public $id;
  protected $identifierType = KnowledgeAnswersIntentQueryIdentifier::class;
  protected $identifierDataType = 'array';
  /**
   * @var bool
   */
  public $inAllCollections;
  /**
   * @var bool
   */
  public $includeGeolocationData;
  protected $remodelingsType = NlpMeaningMeaningRemodelings::class;
  protected $remodelingsDataType = '';
  /**
   * @var string[]
   */
  public $stbrDomain;

  /**
   * @param string[]
   */
  public function setCollection($collection)
  {
    $this->collection = $collection;
  }
  /**
   * @return string[]
   */
  public function getCollection()
  {
    return $this->collection;
  }
  /**
   * @param string[]
   */
  public function setExcludedCollection($excludedCollection)
  {
    $this->excludedCollection = $excludedCollection;
  }
  /**
   * @return string[]
   */
  public function getExcludedCollection()
  {
    return $this->excludedCollection;
  }
  /**
   * @param string[]
   */
  public function setId($id)
  {
    $this->id = $id;
  }
  /**
   * @return string[]
   */
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param KnowledgeAnswersIntentQueryIdentifier[]
   */
  public function setIdentifier($identifier)
  {
    $this->identifier = $identifier;
  }
  /**
   * @return KnowledgeAnswersIntentQueryIdentifier[]
   */
  public function getIdentifier()
  {
    return $this->identifier;
  }
  /**
   * @param bool
   */
  public function setInAllCollections($inAllCollections)
  {
    $this->inAllCollections = $inAllCollections;
  }
  /**
   * @return bool
   */
  public function getInAllCollections()
  {
    return $this->inAllCollections;
  }
  /**
   * @param bool
   */
  public function setIncludeGeolocationData($includeGeolocationData)
  {
    $this->includeGeolocationData = $includeGeolocationData;
  }
  /**
   * @return bool
   */
  public function getIncludeGeolocationData()
  {
    return $this->includeGeolocationData;
  }
  /**
   * @param NlpMeaningMeaningRemodelings
   */
  public function setRemodelings(NlpMeaningMeaningRemodelings $remodelings)
  {
    $this->remodelings = $remodelings;
  }
  /**
   * @return NlpMeaningMeaningRemodelings
   */
  public function getRemodelings()
  {
    return $this->remodelings;
  }
  /**
   * @param string[]
   */
  public function setStbrDomain($stbrDomain)
  {
    $this->stbrDomain = $stbrDomain;
  }
  /**
   * @return string[]
   */
  public function getStbrDomain()
  {
    return $this->stbrDomain;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(KnowledgeAnswersEntityType::class, 'Google_Service_Contentwarehouse_KnowledgeAnswersEntityType');
