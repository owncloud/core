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

class RepositoryWebrefToprefPageClassification extends \Google\Collection
{
  protected $collection_key = 'ratedTitle';
  /**
   * @var string
   */
  public $isList;
  /**
   * @var string
   */
  public $isListTypeCorrect;
  /**
   * @var string
   */
  public $isRanking;
  /**
   * @var string
   */
  public $isToplist;
  /**
   * @var string
   */
  public $listType;
  protected $ratedTitleType = RepositoryWebrefToprefPageClassificationRatedTitle::class;
  protected $ratedTitleDataType = 'array';
  protected $taskDataType = RepositoryWebrefTaskData::class;
  protected $taskDataDataType = '';

  /**
   * @param string
   */
  public function setIsList($isList)
  {
    $this->isList = $isList;
  }
  /**
   * @return string
   */
  public function getIsList()
  {
    return $this->isList;
  }
  /**
   * @param string
   */
  public function setIsListTypeCorrect($isListTypeCorrect)
  {
    $this->isListTypeCorrect = $isListTypeCorrect;
  }
  /**
   * @return string
   */
  public function getIsListTypeCorrect()
  {
    return $this->isListTypeCorrect;
  }
  /**
   * @param string
   */
  public function setIsRanking($isRanking)
  {
    $this->isRanking = $isRanking;
  }
  /**
   * @return string
   */
  public function getIsRanking()
  {
    return $this->isRanking;
  }
  /**
   * @param string
   */
  public function setIsToplist($isToplist)
  {
    $this->isToplist = $isToplist;
  }
  /**
   * @return string
   */
  public function getIsToplist()
  {
    return $this->isToplist;
  }
  /**
   * @param string
   */
  public function setListType($listType)
  {
    $this->listType = $listType;
  }
  /**
   * @return string
   */
  public function getListType()
  {
    return $this->listType;
  }
  /**
   * @param RepositoryWebrefToprefPageClassificationRatedTitle[]
   */
  public function setRatedTitle($ratedTitle)
  {
    $this->ratedTitle = $ratedTitle;
  }
  /**
   * @return RepositoryWebrefToprefPageClassificationRatedTitle[]
   */
  public function getRatedTitle()
  {
    return $this->ratedTitle;
  }
  /**
   * @param RepositoryWebrefTaskData
   */
  public function setTaskData(RepositoryWebrefTaskData $taskData)
  {
    $this->taskData = $taskData;
  }
  /**
   * @return RepositoryWebrefTaskData
   */
  public function getTaskData()
  {
    return $this->taskData;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RepositoryWebrefToprefPageClassification::class, 'Google_Service_Contentwarehouse_RepositoryWebrefToprefPageClassification');
