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

class SearchPolicyRankableSensitivity extends \Google\Collection
{
  protected $collection_key = 'accountProvenance';
  protected $accountProvenanceType = QualityQrewriteAccountProvenance::class;
  protected $accountProvenanceDataType = 'array';
  protected $attentionalEntityType = SearchPolicyRankableSensitivityAttentionalEntity::class;
  protected $attentionalEntityDataType = '';
  /**
   * @var bool
   */
  public $dasherUser;
  protected $followonType = SearchPolicyRankableSensitivityFollowOn::class;
  protected $followonDataType = '';
  protected $prefilterType = SearchPolicyRankableSensitivityPrefilter::class;
  protected $prefilterDataType = '';
  protected $quType = SearchPolicyRankableSensitivityQueryUnderstanding::class;
  protected $quDataType = '';
  /**
   * @var string
   */
  public $sensitivityMode;
  protected $syntheticIntentType = SearchPolicyRankableSensitivitySyntheticIntent::class;
  protected $syntheticIntentDataType = '';
  protected $winningFulfillmentType = SearchPolicyRankableSensitivityFulfillment::class;
  protected $winningFulfillmentDataType = '';

  /**
   * @param QualityQrewriteAccountProvenance[]
   */
  public function setAccountProvenance($accountProvenance)
  {
    $this->accountProvenance = $accountProvenance;
  }
  /**
   * @return QualityQrewriteAccountProvenance[]
   */
  public function getAccountProvenance()
  {
    return $this->accountProvenance;
  }
  /**
   * @param SearchPolicyRankableSensitivityAttentionalEntity
   */
  public function setAttentionalEntity(SearchPolicyRankableSensitivityAttentionalEntity $attentionalEntity)
  {
    $this->attentionalEntity = $attentionalEntity;
  }
  /**
   * @return SearchPolicyRankableSensitivityAttentionalEntity
   */
  public function getAttentionalEntity()
  {
    return $this->attentionalEntity;
  }
  /**
   * @param bool
   */
  public function setDasherUser($dasherUser)
  {
    $this->dasherUser = $dasherUser;
  }
  /**
   * @return bool
   */
  public function getDasherUser()
  {
    return $this->dasherUser;
  }
  /**
   * @param SearchPolicyRankableSensitivityFollowOn
   */
  public function setFollowon(SearchPolicyRankableSensitivityFollowOn $followon)
  {
    $this->followon = $followon;
  }
  /**
   * @return SearchPolicyRankableSensitivityFollowOn
   */
  public function getFollowon()
  {
    return $this->followon;
  }
  /**
   * @param SearchPolicyRankableSensitivityPrefilter
   */
  public function setPrefilter(SearchPolicyRankableSensitivityPrefilter $prefilter)
  {
    $this->prefilter = $prefilter;
  }
  /**
   * @return SearchPolicyRankableSensitivityPrefilter
   */
  public function getPrefilter()
  {
    return $this->prefilter;
  }
  /**
   * @param SearchPolicyRankableSensitivityQueryUnderstanding
   */
  public function setQu(SearchPolicyRankableSensitivityQueryUnderstanding $qu)
  {
    $this->qu = $qu;
  }
  /**
   * @return SearchPolicyRankableSensitivityQueryUnderstanding
   */
  public function getQu()
  {
    return $this->qu;
  }
  /**
   * @param string
   */
  public function setSensitivityMode($sensitivityMode)
  {
    $this->sensitivityMode = $sensitivityMode;
  }
  /**
   * @return string
   */
  public function getSensitivityMode()
  {
    return $this->sensitivityMode;
  }
  /**
   * @param SearchPolicyRankableSensitivitySyntheticIntent
   */
  public function setSyntheticIntent(SearchPolicyRankableSensitivitySyntheticIntent $syntheticIntent)
  {
    $this->syntheticIntent = $syntheticIntent;
  }
  /**
   * @return SearchPolicyRankableSensitivitySyntheticIntent
   */
  public function getSyntheticIntent()
  {
    return $this->syntheticIntent;
  }
  /**
   * @param SearchPolicyRankableSensitivityFulfillment
   */
  public function setWinningFulfillment(SearchPolicyRankableSensitivityFulfillment $winningFulfillment)
  {
    $this->winningFulfillment = $winningFulfillment;
  }
  /**
   * @return SearchPolicyRankableSensitivityFulfillment
   */
  public function getWinningFulfillment()
  {
    return $this->winningFulfillment;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SearchPolicyRankableSensitivity::class, 'Google_Service_Contentwarehouse_SearchPolicyRankableSensitivity');
