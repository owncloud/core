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

class MustangReposWwwSnippetsSnippetCandidate extends \Google\Collection
{
  protected $collection_key = 'features';
  /**
   * @var int
   */
  public $dataSourceType;
  protected $featuresType = MustangReposWwwSnippetsCandidateFeature::class;
  protected $featuresDataType = 'array';
  /**
   * @var string
   */
  public $text;

  /**
   * @param int
   */
  public function setDataSourceType($dataSourceType)
  {
    $this->dataSourceType = $dataSourceType;
  }
  /**
   * @return int
   */
  public function getDataSourceType()
  {
    return $this->dataSourceType;
  }
  /**
   * @param MustangReposWwwSnippetsCandidateFeature[]
   */
  public function setFeatures($features)
  {
    $this->features = $features;
  }
  /**
   * @return MustangReposWwwSnippetsCandidateFeature[]
   */
  public function getFeatures()
  {
    return $this->features;
  }
  /**
   * @param string
   */
  public function setText($text)
  {
    $this->text = $text;
  }
  /**
   * @return string
   */
  public function getText()
  {
    return $this->text;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(MustangReposWwwSnippetsSnippetCandidate::class, 'Google_Service_Contentwarehouse_MustangReposWwwSnippetsSnippetCandidate');
