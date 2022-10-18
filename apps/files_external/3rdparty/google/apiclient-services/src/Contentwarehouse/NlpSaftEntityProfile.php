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

class NlpSaftEntityProfile extends \Google\Collection
{
  protected $collection_key = 'related';
  protected $alternateType = NlpSaftEntityProfileAlternate::class;
  protected $alternateDataType = 'array';
  protected $annotationsType = Proto2BridgeMessageSet::class;
  protected $annotationsDataType = '';
  protected $attributeType = NlpSaftEntityProfileAttribute::class;
  protected $attributeDataType = 'array';
  /**
   * @var string
   */
  public $canonicalName;
  /**
   * @var string
   */
  public $collectionScoreType;
  /**
   * @var string
   */
  public $disambiguation;
  /**
   * @var float[]
   */
  public $embedding;
  /**
   * @var string
   */
  public $frame;
  /**
   * @var string
   */
  public $gender;
  /**
   * @var string
   */
  public $id;
  protected $identifierType = NlpSaftIdentifier::class;
  protected $identifierDataType = 'array';
  protected $keywordType = NlpSaftEntityProfileKeyword::class;
  protected $keywordDataType = 'array';
  /**
   * @var string
   */
  public $mid;
  /**
   * @var string
   */
  public $name;
  /**
   * @var int
   */
  public $nameLanguage;
  /**
   * @var string
   */
  public $nature;
  protected $referenceType = NlpSaftEntityProfileReference::class;
  protected $referenceDataType = 'array';
  protected $relatedType = NlpSaftEntityProfileRelated::class;
  protected $relatedDataType = 'array';
  /**
   * @var string
   */
  public $type;

  /**
   * @param NlpSaftEntityProfileAlternate[]
   */
  public function setAlternate($alternate)
  {
    $this->alternate = $alternate;
  }
  /**
   * @return NlpSaftEntityProfileAlternate[]
   */
  public function getAlternate()
  {
    return $this->alternate;
  }
  /**
   * @param Proto2BridgeMessageSet
   */
  public function setAnnotations(Proto2BridgeMessageSet $annotations)
  {
    $this->annotations = $annotations;
  }
  /**
   * @return Proto2BridgeMessageSet
   */
  public function getAnnotations()
  {
    return $this->annotations;
  }
  /**
   * @param NlpSaftEntityProfileAttribute[]
   */
  public function setAttribute($attribute)
  {
    $this->attribute = $attribute;
  }
  /**
   * @return NlpSaftEntityProfileAttribute[]
   */
  public function getAttribute()
  {
    return $this->attribute;
  }
  /**
   * @param string
   */
  public function setCanonicalName($canonicalName)
  {
    $this->canonicalName = $canonicalName;
  }
  /**
   * @return string
   */
  public function getCanonicalName()
  {
    return $this->canonicalName;
  }
  /**
   * @param string
   */
  public function setCollectionScoreType($collectionScoreType)
  {
    $this->collectionScoreType = $collectionScoreType;
  }
  /**
   * @return string
   */
  public function getCollectionScoreType()
  {
    return $this->collectionScoreType;
  }
  /**
   * @param string
   */
  public function setDisambiguation($disambiguation)
  {
    $this->disambiguation = $disambiguation;
  }
  /**
   * @return string
   */
  public function getDisambiguation()
  {
    return $this->disambiguation;
  }
  /**
   * @param float[]
   */
  public function setEmbedding($embedding)
  {
    $this->embedding = $embedding;
  }
  /**
   * @return float[]
   */
  public function getEmbedding()
  {
    return $this->embedding;
  }
  /**
   * @param string
   */
  public function setFrame($frame)
  {
    $this->frame = $frame;
  }
  /**
   * @return string
   */
  public function getFrame()
  {
    return $this->frame;
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
  public function setId($id)
  {
    $this->id = $id;
  }
  /**
   * @return string
   */
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param NlpSaftIdentifier[]
   */
  public function setIdentifier($identifier)
  {
    $this->identifier = $identifier;
  }
  /**
   * @return NlpSaftIdentifier[]
   */
  public function getIdentifier()
  {
    return $this->identifier;
  }
  /**
   * @param NlpSaftEntityProfileKeyword[]
   */
  public function setKeyword($keyword)
  {
    $this->keyword = $keyword;
  }
  /**
   * @return NlpSaftEntityProfileKeyword[]
   */
  public function getKeyword()
  {
    return $this->keyword;
  }
  /**
   * @param string
   */
  public function setMid($mid)
  {
    $this->mid = $mid;
  }
  /**
   * @return string
   */
  public function getMid()
  {
    return $this->mid;
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
   * @param int
   */
  public function setNameLanguage($nameLanguage)
  {
    $this->nameLanguage = $nameLanguage;
  }
  /**
   * @return int
   */
  public function getNameLanguage()
  {
    return $this->nameLanguage;
  }
  /**
   * @param string
   */
  public function setNature($nature)
  {
    $this->nature = $nature;
  }
  /**
   * @return string
   */
  public function getNature()
  {
    return $this->nature;
  }
  /**
   * @param NlpSaftEntityProfileReference[]
   */
  public function setReference($reference)
  {
    $this->reference = $reference;
  }
  /**
   * @return NlpSaftEntityProfileReference[]
   */
  public function getReference()
  {
    return $this->reference;
  }
  /**
   * @param NlpSaftEntityProfileRelated[]
   */
  public function setRelated($related)
  {
    $this->related = $related;
  }
  /**
   * @return NlpSaftEntityProfileRelated[]
   */
  public function getRelated()
  {
    return $this->related;
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
class_alias(NlpSaftEntityProfile::class, 'Google_Service_Contentwarehouse_NlpSaftEntityProfile');
