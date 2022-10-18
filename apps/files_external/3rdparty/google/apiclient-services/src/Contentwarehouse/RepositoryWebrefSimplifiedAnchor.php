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

class RepositoryWebrefSimplifiedAnchor extends \Google\Model
{
  protected $anchorIndicesType = RepositoryWebrefAnchorIndices::class;
  protected $anchorIndicesDataType = '';
  protected $anchorTextType = RepositoryWebrefLocalizedString::class;
  protected $anchorTextDataType = '';
  /**
   * @var string
   */
  public $count;
  /**
   * @var string
   */
  public $countFromOffdomain;
  /**
   * @var string
   */
  public $countFromOnsite;
  /**
   * @var float
   */
  public $normalizedScore;
  /**
   * @var float
   */
  public $normalizedScoreFromOffdomain;
  /**
   * @var float
   */
  public $normalizedScoreFromOnsite;
  /**
   * @var float
   */
  public $score;
  /**
   * @var float
   */
  public $scoreFromFragment;
  /**
   * @var float
   */
  public $scoreFromOffdomain;
  /**
   * @var float
   */
  public $scoreFromOffdomainFragment;
  /**
   * @var float
   */
  public $scoreFromOnsite;
  /**
   * @var float
   */
  public $scoreFromOnsiteFragment;
  /**
   * @var float
   */
  public $scoreFromRedirect;
  /**
   * @var float
   */
  public $totalVolume;
  /**
   * @var float
   */
  public $totalVolumeFromOffdomain;
  /**
   * @var float
   */
  public $totalVolumeFromOnsite;

  /**
   * @param RepositoryWebrefAnchorIndices
   */
  public function setAnchorIndices(RepositoryWebrefAnchorIndices $anchorIndices)
  {
    $this->anchorIndices = $anchorIndices;
  }
  /**
   * @return RepositoryWebrefAnchorIndices
   */
  public function getAnchorIndices()
  {
    return $this->anchorIndices;
  }
  /**
   * @param RepositoryWebrefLocalizedString
   */
  public function setAnchorText(RepositoryWebrefLocalizedString $anchorText)
  {
    $this->anchorText = $anchorText;
  }
  /**
   * @return RepositoryWebrefLocalizedString
   */
  public function getAnchorText()
  {
    return $this->anchorText;
  }
  /**
   * @param string
   */
  public function setCount($count)
  {
    $this->count = $count;
  }
  /**
   * @return string
   */
  public function getCount()
  {
    return $this->count;
  }
  /**
   * @param string
   */
  public function setCountFromOffdomain($countFromOffdomain)
  {
    $this->countFromOffdomain = $countFromOffdomain;
  }
  /**
   * @return string
   */
  public function getCountFromOffdomain()
  {
    return $this->countFromOffdomain;
  }
  /**
   * @param string
   */
  public function setCountFromOnsite($countFromOnsite)
  {
    $this->countFromOnsite = $countFromOnsite;
  }
  /**
   * @return string
   */
  public function getCountFromOnsite()
  {
    return $this->countFromOnsite;
  }
  /**
   * @param float
   */
  public function setNormalizedScore($normalizedScore)
  {
    $this->normalizedScore = $normalizedScore;
  }
  /**
   * @return float
   */
  public function getNormalizedScore()
  {
    return $this->normalizedScore;
  }
  /**
   * @param float
   */
  public function setNormalizedScoreFromOffdomain($normalizedScoreFromOffdomain)
  {
    $this->normalizedScoreFromOffdomain = $normalizedScoreFromOffdomain;
  }
  /**
   * @return float
   */
  public function getNormalizedScoreFromOffdomain()
  {
    return $this->normalizedScoreFromOffdomain;
  }
  /**
   * @param float
   */
  public function setNormalizedScoreFromOnsite($normalizedScoreFromOnsite)
  {
    $this->normalizedScoreFromOnsite = $normalizedScoreFromOnsite;
  }
  /**
   * @return float
   */
  public function getNormalizedScoreFromOnsite()
  {
    return $this->normalizedScoreFromOnsite;
  }
  /**
   * @param float
   */
  public function setScore($score)
  {
    $this->score = $score;
  }
  /**
   * @return float
   */
  public function getScore()
  {
    return $this->score;
  }
  /**
   * @param float
   */
  public function setScoreFromFragment($scoreFromFragment)
  {
    $this->scoreFromFragment = $scoreFromFragment;
  }
  /**
   * @return float
   */
  public function getScoreFromFragment()
  {
    return $this->scoreFromFragment;
  }
  /**
   * @param float
   */
  public function setScoreFromOffdomain($scoreFromOffdomain)
  {
    $this->scoreFromOffdomain = $scoreFromOffdomain;
  }
  /**
   * @return float
   */
  public function getScoreFromOffdomain()
  {
    return $this->scoreFromOffdomain;
  }
  /**
   * @param float
   */
  public function setScoreFromOffdomainFragment($scoreFromOffdomainFragment)
  {
    $this->scoreFromOffdomainFragment = $scoreFromOffdomainFragment;
  }
  /**
   * @return float
   */
  public function getScoreFromOffdomainFragment()
  {
    return $this->scoreFromOffdomainFragment;
  }
  /**
   * @param float
   */
  public function setScoreFromOnsite($scoreFromOnsite)
  {
    $this->scoreFromOnsite = $scoreFromOnsite;
  }
  /**
   * @return float
   */
  public function getScoreFromOnsite()
  {
    return $this->scoreFromOnsite;
  }
  /**
   * @param float
   */
  public function setScoreFromOnsiteFragment($scoreFromOnsiteFragment)
  {
    $this->scoreFromOnsiteFragment = $scoreFromOnsiteFragment;
  }
  /**
   * @return float
   */
  public function getScoreFromOnsiteFragment()
  {
    return $this->scoreFromOnsiteFragment;
  }
  /**
   * @param float
   */
  public function setScoreFromRedirect($scoreFromRedirect)
  {
    $this->scoreFromRedirect = $scoreFromRedirect;
  }
  /**
   * @return float
   */
  public function getScoreFromRedirect()
  {
    return $this->scoreFromRedirect;
  }
  /**
   * @param float
   */
  public function setTotalVolume($totalVolume)
  {
    $this->totalVolume = $totalVolume;
  }
  /**
   * @return float
   */
  public function getTotalVolume()
  {
    return $this->totalVolume;
  }
  /**
   * @param float
   */
  public function setTotalVolumeFromOffdomain($totalVolumeFromOffdomain)
  {
    $this->totalVolumeFromOffdomain = $totalVolumeFromOffdomain;
  }
  /**
   * @return float
   */
  public function getTotalVolumeFromOffdomain()
  {
    return $this->totalVolumeFromOffdomain;
  }
  /**
   * @param float
   */
  public function setTotalVolumeFromOnsite($totalVolumeFromOnsite)
  {
    $this->totalVolumeFromOnsite = $totalVolumeFromOnsite;
  }
  /**
   * @return float
   */
  public function getTotalVolumeFromOnsite()
  {
    return $this->totalVolumeFromOnsite;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RepositoryWebrefSimplifiedAnchor::class, 'Google_Service_Contentwarehouse_RepositoryWebrefSimplifiedAnchor');
