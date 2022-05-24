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

class Entity extends \Google\Collection
{
  protected $collection_key = 'mentions';
  protected $mentionsType = EntityMention::class;
  protected $mentionsDataType = 'array';
  /**
   * @var string[]
   */
  public $metadata;
  /**
   * @var string
   */
  public $name;
  /**
   * @var float
   */
  public $salience;
  protected $sentimentType = Sentiment::class;
  protected $sentimentDataType = '';
  /**
   * @var string
   */
  public $type;

  /**
   * @param EntityMention[]
   */
  public function setMentions($mentions)
  {
    $this->mentions = $mentions;
  }
  /**
   * @return EntityMention[]
   */
  public function getMentions()
  {
    return $this->mentions;
  }
  /**
   * @param string[]
   */
  public function setMetadata($metadata)
  {
    $this->metadata = $metadata;
  }
  /**
   * @return string[]
   */
  public function getMetadata()
  {
    return $this->metadata;
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
   * @param float
   */
  public function setSalience($salience)
  {
    $this->salience = $salience;
  }
  /**
   * @return float
   */
  public function getSalience()
  {
    return $this->salience;
  }
  /**
   * @param Sentiment
   */
  public function setSentiment(Sentiment $sentiment)
  {
    $this->sentiment = $sentiment;
  }
  /**
   * @return Sentiment
   */
  public function getSentiment()
  {
    return $this->sentiment;
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
class_alias(Entity::class, 'Google_Service_CloudNaturalLanguage_Entity');
