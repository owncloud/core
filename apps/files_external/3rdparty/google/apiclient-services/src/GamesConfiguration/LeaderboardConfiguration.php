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

namespace Google\Service\GamesConfiguration;

class LeaderboardConfiguration extends \Google\Model
{
  protected $draftType = LeaderboardConfigurationDetail::class;
  protected $draftDataType = '';
  /**
   * @var string
   */
  public $id;
  /**
   * @var string
   */
  public $kind;
  protected $publishedType = LeaderboardConfigurationDetail::class;
  protected $publishedDataType = '';
  /**
   * @var string
   */
  public $scoreMax;
  /**
   * @var string
   */
  public $scoreMin;
  /**
   * @var string
   */
  public $scoreOrder;
  /**
   * @var string
   */
  public $token;

  /**
   * @param LeaderboardConfigurationDetail
   */
  public function setDraft(LeaderboardConfigurationDetail $draft)
  {
    $this->draft = $draft;
  }
  /**
   * @return LeaderboardConfigurationDetail
   */
  public function getDraft()
  {
    return $this->draft;
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
   * @param string
   */
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  /**
   * @return string
   */
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param LeaderboardConfigurationDetail
   */
  public function setPublished(LeaderboardConfigurationDetail $published)
  {
    $this->published = $published;
  }
  /**
   * @return LeaderboardConfigurationDetail
   */
  public function getPublished()
  {
    return $this->published;
  }
  /**
   * @param string
   */
  public function setScoreMax($scoreMax)
  {
    $this->scoreMax = $scoreMax;
  }
  /**
   * @return string
   */
  public function getScoreMax()
  {
    return $this->scoreMax;
  }
  /**
   * @param string
   */
  public function setScoreMin($scoreMin)
  {
    $this->scoreMin = $scoreMin;
  }
  /**
   * @return string
   */
  public function getScoreMin()
  {
    return $this->scoreMin;
  }
  /**
   * @param string
   */
  public function setScoreOrder($scoreOrder)
  {
    $this->scoreOrder = $scoreOrder;
  }
  /**
   * @return string
   */
  public function getScoreOrder()
  {
    return $this->scoreOrder;
  }
  /**
   * @param string
   */
  public function setToken($token)
  {
    $this->token = $token;
  }
  /**
   * @return string
   */
  public function getToken()
  {
    return $this->token;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(LeaderboardConfiguration::class, 'Google_Service_GamesConfiguration_LeaderboardConfiguration');
