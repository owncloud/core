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

class LeaderboardConfigurationDetail extends \Google\Model
{
  /**
   * @var string
   */
  public $iconUrl;
  /**
   * @var string
   */
  public $kind;
  protected $nameType = LocalizedStringBundle::class;
  protected $nameDataType = '';
  protected $scoreFormatType = GamesNumberFormatConfiguration::class;
  protected $scoreFormatDataType = '';
  /**
   * @var int
   */
  public $sortRank;

  /**
   * @param string
   */
  public function setIconUrl($iconUrl)
  {
    $this->iconUrl = $iconUrl;
  }
  /**
   * @return string
   */
  public function getIconUrl()
  {
    return $this->iconUrl;
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
   * @param LocalizedStringBundle
   */
  public function setName(LocalizedStringBundle $name)
  {
    $this->name = $name;
  }
  /**
   * @return LocalizedStringBundle
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param GamesNumberFormatConfiguration
   */
  public function setScoreFormat(GamesNumberFormatConfiguration $scoreFormat)
  {
    $this->scoreFormat = $scoreFormat;
  }
  /**
   * @return GamesNumberFormatConfiguration
   */
  public function getScoreFormat()
  {
    return $this->scoreFormat;
  }
  /**
   * @param int
   */
  public function setSortRank($sortRank)
  {
    $this->sortRank = $sortRank;
  }
  /**
   * @return int
   */
  public function getSortRank()
  {
    return $this->sortRank;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(LeaderboardConfigurationDetail::class, 'Google_Service_GamesConfiguration_LeaderboardConfigurationDetail');
