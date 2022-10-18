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

class RepositoryWebrefNameInfo extends \Google\Collection
{
  protected $collection_key = 'source';
  protected $aggregatedScoresType = RepositoryWebrefAggregatedEntityNameScores::class;
  protected $aggregatedScoresDataType = '';
  protected $annotatedCategoryType = RepositoryWebrefAnnotatedCategoryInfo::class;
  protected $annotatedCategoryDataType = 'array';
  protected $debugDetailsType = RepositoryWebrefNameDebugInfo::class;
  protected $debugDetailsDataType = 'array';
  /**
   * @var bool
   */
  public $includeInModel;
  protected $nameType = RepositoryWebrefLocalizedString::class;
  protected $nameDataType = '';
  protected $ngramDataType = RepositoryWebrefUniversalNgramData::class;
  protected $ngramDataDataType = '';
  protected $perNameLightweightTokenType = RepositoryWebrefLightweightTokensPerNameLightweightToken::class;
  protected $perNameLightweightTokenDataType = '';
  protected $scoresType = RepositoryWebrefNameScores::class;
  protected $scoresDataType = '';
  protected $sourceType = RepositoryWebrefEntityNameSource::class;
  protected $sourceDataType = 'array';

  /**
   * @param RepositoryWebrefAggregatedEntityNameScores
   */
  public function setAggregatedScores(RepositoryWebrefAggregatedEntityNameScores $aggregatedScores)
  {
    $this->aggregatedScores = $aggregatedScores;
  }
  /**
   * @return RepositoryWebrefAggregatedEntityNameScores
   */
  public function getAggregatedScores()
  {
    return $this->aggregatedScores;
  }
  /**
   * @param RepositoryWebrefAnnotatedCategoryInfo[]
   */
  public function setAnnotatedCategory($annotatedCategory)
  {
    $this->annotatedCategory = $annotatedCategory;
  }
  /**
   * @return RepositoryWebrefAnnotatedCategoryInfo[]
   */
  public function getAnnotatedCategory()
  {
    return $this->annotatedCategory;
  }
  /**
   * @param RepositoryWebrefNameDebugInfo[]
   */
  public function setDebugDetails($debugDetails)
  {
    $this->debugDetails = $debugDetails;
  }
  /**
   * @return RepositoryWebrefNameDebugInfo[]
   */
  public function getDebugDetails()
  {
    return $this->debugDetails;
  }
  /**
   * @param bool
   */
  public function setIncludeInModel($includeInModel)
  {
    $this->includeInModel = $includeInModel;
  }
  /**
   * @return bool
   */
  public function getIncludeInModel()
  {
    return $this->includeInModel;
  }
  /**
   * @param RepositoryWebrefLocalizedString
   */
  public function setName(RepositoryWebrefLocalizedString $name)
  {
    $this->name = $name;
  }
  /**
   * @return RepositoryWebrefLocalizedString
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param RepositoryWebrefUniversalNgramData
   */
  public function setNgramData(RepositoryWebrefUniversalNgramData $ngramData)
  {
    $this->ngramData = $ngramData;
  }
  /**
   * @return RepositoryWebrefUniversalNgramData
   */
  public function getNgramData()
  {
    return $this->ngramData;
  }
  /**
   * @param RepositoryWebrefLightweightTokensPerNameLightweightToken
   */
  public function setPerNameLightweightToken(RepositoryWebrefLightweightTokensPerNameLightweightToken $perNameLightweightToken)
  {
    $this->perNameLightweightToken = $perNameLightweightToken;
  }
  /**
   * @return RepositoryWebrefLightweightTokensPerNameLightweightToken
   */
  public function getPerNameLightweightToken()
  {
    return $this->perNameLightweightToken;
  }
  /**
   * @param RepositoryWebrefNameScores
   */
  public function setScores(RepositoryWebrefNameScores $scores)
  {
    $this->scores = $scores;
  }
  /**
   * @return RepositoryWebrefNameScores
   */
  public function getScores()
  {
    return $this->scores;
  }
  /**
   * @param RepositoryWebrefEntityNameSource[]
   */
  public function setSource($source)
  {
    $this->source = $source;
  }
  /**
   * @return RepositoryWebrefEntityNameSource[]
   */
  public function getSource()
  {
    return $this->source;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RepositoryWebrefNameInfo::class, 'Google_Service_Contentwarehouse_RepositoryWebrefNameInfo');
