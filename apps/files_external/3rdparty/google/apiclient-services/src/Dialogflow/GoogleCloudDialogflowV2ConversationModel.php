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

namespace Google\Service\Dialogflow;

class GoogleCloudDialogflowV2ConversationModel extends \Google\Collection
{
  protected $collection_key = 'datasets';
  protected $articleSuggestionModelMetadataType = GoogleCloudDialogflowV2ArticleSuggestionModelMetadata::class;
  protected $articleSuggestionModelMetadataDataType = '';
  /**
   * @var string
   */
  public $createTime;
  protected $datasetsType = GoogleCloudDialogflowV2InputDataset::class;
  protected $datasetsDataType = 'array';
  /**
   * @var string
   */
  public $displayName;
  /**
   * @var string
   */
  public $languageCode;
  /**
   * @var string
   */
  public $name;
  protected $smartReplyModelMetadataType = GoogleCloudDialogflowV2SmartReplyModelMetadata::class;
  protected $smartReplyModelMetadataDataType = '';
  /**
   * @var string
   */
  public $state;

  /**
   * @param GoogleCloudDialogflowV2ArticleSuggestionModelMetadata
   */
  public function setArticleSuggestionModelMetadata(GoogleCloudDialogflowV2ArticleSuggestionModelMetadata $articleSuggestionModelMetadata)
  {
    $this->articleSuggestionModelMetadata = $articleSuggestionModelMetadata;
  }
  /**
   * @return GoogleCloudDialogflowV2ArticleSuggestionModelMetadata
   */
  public function getArticleSuggestionModelMetadata()
  {
    return $this->articleSuggestionModelMetadata;
  }
  /**
   * @param string
   */
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  /**
   * @return string
   */
  public function getCreateTime()
  {
    return $this->createTime;
  }
  /**
   * @param GoogleCloudDialogflowV2InputDataset[]
   */
  public function setDatasets($datasets)
  {
    $this->datasets = $datasets;
  }
  /**
   * @return GoogleCloudDialogflowV2InputDataset[]
   */
  public function getDatasets()
  {
    return $this->datasets;
  }
  /**
   * @param string
   */
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  /**
   * @return string
   */
  public function getDisplayName()
  {
    return $this->displayName;
  }
  /**
   * @param string
   */
  public function setLanguageCode($languageCode)
  {
    $this->languageCode = $languageCode;
  }
  /**
   * @return string
   */
  public function getLanguageCode()
  {
    return $this->languageCode;
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
   * @param GoogleCloudDialogflowV2SmartReplyModelMetadata
   */
  public function setSmartReplyModelMetadata(GoogleCloudDialogflowV2SmartReplyModelMetadata $smartReplyModelMetadata)
  {
    $this->smartReplyModelMetadata = $smartReplyModelMetadata;
  }
  /**
   * @return GoogleCloudDialogflowV2SmartReplyModelMetadata
   */
  public function getSmartReplyModelMetadata()
  {
    return $this->smartReplyModelMetadata;
  }
  /**
   * @param string
   */
  public function setState($state)
  {
    $this->state = $state;
  }
  /**
   * @return string
   */
  public function getState()
  {
    return $this->state;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDialogflowV2ConversationModel::class, 'Google_Service_Dialogflow_GoogleCloudDialogflowV2ConversationModel');
