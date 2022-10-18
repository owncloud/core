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

class RepositoryWebrefPerDocRelevanceRating extends \Google\Model
{
  /**
   * @var string
   */
  public $contentRelevant;
  /**
   * @var int
   */
  public $deprecatedItemId;
  /**
   * @var int
   */
  public $deprecatedProjectId;
  /**
   * @var int
   */
  public $deprecatedTaskId;
  /**
   * @var string
   */
  public $displayString;
  /**
   * @var string
   */
  public $furballUrl;
  /**
   * @var string
   */
  public $itemDescription;
  /**
   * @var string
   */
  public $itemId;
  /**
   * @var string
   */
  public $language;
  /**
   * @var string
   */
  public $pageIsAboutChain;
  /**
   * @var bool
   */
  public $pageNotLoaded;
  /**
   * @var string
   */
  public $projectId;
  /**
   * @var bool
   */
  public $raterCanUnderstandTopic;
  public $ratingScore;
  protected $taskDetailsType = RepositoryWebrefTaskDetails::class;
  protected $taskDetailsDataType = '';
  /**
   * @var string
   */
  public $taskId;
  /**
   * @var string
   */
  public $taskStatus;
  /**
   * @var int
   */
  public $taskUser;
  /**
   * @var int
   */
  public $templateId;
  /**
   * @var string
   */
  public $topicIsChain;

  /**
   * @param string
   */
  public function setContentRelevant($contentRelevant)
  {
    $this->contentRelevant = $contentRelevant;
  }
  /**
   * @return string
   */
  public function getContentRelevant()
  {
    return $this->contentRelevant;
  }
  /**
   * @param int
   */
  public function setDeprecatedItemId($deprecatedItemId)
  {
    $this->deprecatedItemId = $deprecatedItemId;
  }
  /**
   * @return int
   */
  public function getDeprecatedItemId()
  {
    return $this->deprecatedItemId;
  }
  /**
   * @param int
   */
  public function setDeprecatedProjectId($deprecatedProjectId)
  {
    $this->deprecatedProjectId = $deprecatedProjectId;
  }
  /**
   * @return int
   */
  public function getDeprecatedProjectId()
  {
    return $this->deprecatedProjectId;
  }
  /**
   * @param int
   */
  public function setDeprecatedTaskId($deprecatedTaskId)
  {
    $this->deprecatedTaskId = $deprecatedTaskId;
  }
  /**
   * @return int
   */
  public function getDeprecatedTaskId()
  {
    return $this->deprecatedTaskId;
  }
  /**
   * @param string
   */
  public function setDisplayString($displayString)
  {
    $this->displayString = $displayString;
  }
  /**
   * @return string
   */
  public function getDisplayString()
  {
    return $this->displayString;
  }
  /**
   * @param string
   */
  public function setFurballUrl($furballUrl)
  {
    $this->furballUrl = $furballUrl;
  }
  /**
   * @return string
   */
  public function getFurballUrl()
  {
    return $this->furballUrl;
  }
  /**
   * @param string
   */
  public function setItemDescription($itemDescription)
  {
    $this->itemDescription = $itemDescription;
  }
  /**
   * @return string
   */
  public function getItemDescription()
  {
    return $this->itemDescription;
  }
  /**
   * @param string
   */
  public function setItemId($itemId)
  {
    $this->itemId = $itemId;
  }
  /**
   * @return string
   */
  public function getItemId()
  {
    return $this->itemId;
  }
  /**
   * @param string
   */
  public function setLanguage($language)
  {
    $this->language = $language;
  }
  /**
   * @return string
   */
  public function getLanguage()
  {
    return $this->language;
  }
  /**
   * @param string
   */
  public function setPageIsAboutChain($pageIsAboutChain)
  {
    $this->pageIsAboutChain = $pageIsAboutChain;
  }
  /**
   * @return string
   */
  public function getPageIsAboutChain()
  {
    return $this->pageIsAboutChain;
  }
  /**
   * @param bool
   */
  public function setPageNotLoaded($pageNotLoaded)
  {
    $this->pageNotLoaded = $pageNotLoaded;
  }
  /**
   * @return bool
   */
  public function getPageNotLoaded()
  {
    return $this->pageNotLoaded;
  }
  /**
   * @param string
   */
  public function setProjectId($projectId)
  {
    $this->projectId = $projectId;
  }
  /**
   * @return string
   */
  public function getProjectId()
  {
    return $this->projectId;
  }
  /**
   * @param bool
   */
  public function setRaterCanUnderstandTopic($raterCanUnderstandTopic)
  {
    $this->raterCanUnderstandTopic = $raterCanUnderstandTopic;
  }
  /**
   * @return bool
   */
  public function getRaterCanUnderstandTopic()
  {
    return $this->raterCanUnderstandTopic;
  }
  public function setRatingScore($ratingScore)
  {
    $this->ratingScore = $ratingScore;
  }
  public function getRatingScore()
  {
    return $this->ratingScore;
  }
  /**
   * @param RepositoryWebrefTaskDetails
   */
  public function setTaskDetails(RepositoryWebrefTaskDetails $taskDetails)
  {
    $this->taskDetails = $taskDetails;
  }
  /**
   * @return RepositoryWebrefTaskDetails
   */
  public function getTaskDetails()
  {
    return $this->taskDetails;
  }
  /**
   * @param string
   */
  public function setTaskId($taskId)
  {
    $this->taskId = $taskId;
  }
  /**
   * @return string
   */
  public function getTaskId()
  {
    return $this->taskId;
  }
  /**
   * @param string
   */
  public function setTaskStatus($taskStatus)
  {
    $this->taskStatus = $taskStatus;
  }
  /**
   * @return string
   */
  public function getTaskStatus()
  {
    return $this->taskStatus;
  }
  /**
   * @param int
   */
  public function setTaskUser($taskUser)
  {
    $this->taskUser = $taskUser;
  }
  /**
   * @return int
   */
  public function getTaskUser()
  {
    return $this->taskUser;
  }
  /**
   * @param int
   */
  public function setTemplateId($templateId)
  {
    $this->templateId = $templateId;
  }
  /**
   * @return int
   */
  public function getTemplateId()
  {
    return $this->templateId;
  }
  /**
   * @param string
   */
  public function setTopicIsChain($topicIsChain)
  {
    $this->topicIsChain = $topicIsChain;
  }
  /**
   * @return string
   */
  public function getTopicIsChain()
  {
    return $this->topicIsChain;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RepositoryWebrefPerDocRelevanceRating::class, 'Google_Service_Contentwarehouse_RepositoryWebrefPerDocRelevanceRating');
