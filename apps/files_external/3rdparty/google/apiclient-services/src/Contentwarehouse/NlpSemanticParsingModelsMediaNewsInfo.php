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

class NlpSemanticParsingModelsMediaNewsInfo extends \Google\Model
{
  /**
   * @var string
   */
  public $docid;
  /**
   * @var string
   */
  public $newsContentType;
  protected $publicationTimeType = AssistantApiTimestamp::class;
  protected $publicationTimeDataType = '';
  /**
   * @var string
   */
  public $publisher;

  /**
   * @param string
   */
  public function setDocid($docid)
  {
    $this->docid = $docid;
  }
  /**
   * @return string
   */
  public function getDocid()
  {
    return $this->docid;
  }
  /**
   * @param string
   */
  public function setNewsContentType($newsContentType)
  {
    $this->newsContentType = $newsContentType;
  }
  /**
   * @return string
   */
  public function getNewsContentType()
  {
    return $this->newsContentType;
  }
  /**
   * @param AssistantApiTimestamp
   */
  public function setPublicationTime(AssistantApiTimestamp $publicationTime)
  {
    $this->publicationTime = $publicationTime;
  }
  /**
   * @return AssistantApiTimestamp
   */
  public function getPublicationTime()
  {
    return $this->publicationTime;
  }
  /**
   * @param string
   */
  public function setPublisher($publisher)
  {
    $this->publisher = $publisher;
  }
  /**
   * @return string
   */
  public function getPublisher()
  {
    return $this->publisher;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NlpSemanticParsingModelsMediaNewsInfo::class, 'Google_Service_Contentwarehouse_NlpSemanticParsingModelsMediaNewsInfo');
