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

class NlpSaftEntity extends \Google\Collection
{
  protected $collection_key = 'type';
  /**
   * @var int
   */
  public $antecedent;
  /**
   * @var string
   */
  public $entityType;
  public $entityTypeProbability;
  /**
   * @var string
   */
  public $gender;
  protected $infoType = Proto2BridgeMessageSet::class;
  protected $infoDataType = '';
  protected $mentionType = NlpSaftMention::class;
  protected $mentionDataType = 'array';
  /**
   * @var string
   */
  public $name;
  protected $profileType = NlpSaftEntityProfile::class;
  protected $profileDataType = '';
  protected $referentType = NlpSaftReferent::class;
  protected $referentDataType = '';
  /**
   * @var int
   */
  public $representativeMention;
  public $salience;
  protected $typeType = NlpSaftEntityType::class;
  protected $typeDataType = 'array';

  /**
   * @param int
   */
  public function setAntecedent($antecedent)
  {
    $this->antecedent = $antecedent;
  }
  /**
   * @return int
   */
  public function getAntecedent()
  {
    return $this->antecedent;
  }
  /**
   * @param string
   */
  public function setEntityType($entityType)
  {
    $this->entityType = $entityType;
  }
  /**
   * @return string
   */
  public function getEntityType()
  {
    return $this->entityType;
  }
  public function setEntityTypeProbability($entityTypeProbability)
  {
    $this->entityTypeProbability = $entityTypeProbability;
  }
  public function getEntityTypeProbability()
  {
    return $this->entityTypeProbability;
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
   * @param Proto2BridgeMessageSet
   */
  public function setInfo(Proto2BridgeMessageSet $info)
  {
    $this->info = $info;
  }
  /**
   * @return Proto2BridgeMessageSet
   */
  public function getInfo()
  {
    return $this->info;
  }
  /**
   * @param NlpSaftMention[]
   */
  public function setMention($mention)
  {
    $this->mention = $mention;
  }
  /**
   * @return NlpSaftMention[]
   */
  public function getMention()
  {
    return $this->mention;
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
   * @param NlpSaftEntityProfile
   */
  public function setProfile(NlpSaftEntityProfile $profile)
  {
    $this->profile = $profile;
  }
  /**
   * @return NlpSaftEntityProfile
   */
  public function getProfile()
  {
    return $this->profile;
  }
  /**
   * @param NlpSaftReferent
   */
  public function setReferent(NlpSaftReferent $referent)
  {
    $this->referent = $referent;
  }
  /**
   * @return NlpSaftReferent
   */
  public function getReferent()
  {
    return $this->referent;
  }
  /**
   * @param int
   */
  public function setRepresentativeMention($representativeMention)
  {
    $this->representativeMention = $representativeMention;
  }
  /**
   * @return int
   */
  public function getRepresentativeMention()
  {
    return $this->representativeMention;
  }
  public function setSalience($salience)
  {
    $this->salience = $salience;
  }
  public function getSalience()
  {
    return $this->salience;
  }
  /**
   * @param NlpSaftEntityType[]
   */
  public function setType($type)
  {
    $this->type = $type;
  }
  /**
   * @return NlpSaftEntityType[]
   */
  public function getType()
  {
    return $this->type;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NlpSaftEntity::class, 'Google_Service_Contentwarehouse_NlpSaftEntity');
