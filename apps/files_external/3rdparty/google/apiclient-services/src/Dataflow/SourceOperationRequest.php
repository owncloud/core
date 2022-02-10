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

namespace Google\Service\Dataflow;

class SourceOperationRequest extends \Google\Model
{
  protected $getMetadataType = SourceGetMetadataRequest::class;
  protected $getMetadataDataType = '';
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $originalName;
  protected $splitType = SourceSplitRequest::class;
  protected $splitDataType = '';
  /**
   * @var string
   */
  public $stageName;
  /**
   * @var string
   */
  public $systemName;

  /**
   * @param SourceGetMetadataRequest
   */
  public function setGetMetadata(SourceGetMetadataRequest $getMetadata)
  {
    $this->getMetadata = $getMetadata;
  }
  /**
   * @return SourceGetMetadataRequest
   */
  public function getGetMetadata()
  {
    return $this->getMetadata;
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
   * @param string
   */
  public function setOriginalName($originalName)
  {
    $this->originalName = $originalName;
  }
  /**
   * @return string
   */
  public function getOriginalName()
  {
    return $this->originalName;
  }
  /**
   * @param SourceSplitRequest
   */
  public function setSplit(SourceSplitRequest $split)
  {
    $this->split = $split;
  }
  /**
   * @return SourceSplitRequest
   */
  public function getSplit()
  {
    return $this->split;
  }
  /**
   * @param string
   */
  public function setStageName($stageName)
  {
    $this->stageName = $stageName;
  }
  /**
   * @return string
   */
  public function getStageName()
  {
    return $this->stageName;
  }
  /**
   * @param string
   */
  public function setSystemName($systemName)
  {
    $this->systemName = $systemName;
  }
  /**
   * @return string
   */
  public function getSystemName()
  {
    return $this->systemName;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SourceOperationRequest::class, 'Google_Service_Dataflow_SourceOperationRequest');
