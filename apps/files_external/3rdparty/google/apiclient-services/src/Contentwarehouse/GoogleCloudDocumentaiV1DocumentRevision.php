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

class GoogleCloudDocumentaiV1DocumentRevision extends \Google\Collection
{
  protected $collection_key = 'parentIds';
  /**
   * @var string
   */
  public $agent;
  /**
   * @var string
   */
  public $createTime;
  protected $humanReviewType = GoogleCloudDocumentaiV1DocumentRevisionHumanReview::class;
  protected $humanReviewDataType = '';
  /**
   * @var string
   */
  public $id;
  /**
   * @var int[]
   */
  public $parent;
  /**
   * @var string[]
   */
  public $parentIds;
  /**
   * @var string
   */
  public $processor;

  /**
   * @param string
   */
  public function setAgent($agent)
  {
    $this->agent = $agent;
  }
  /**
   * @return string
   */
  public function getAgent()
  {
    return $this->agent;
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
   * @param GoogleCloudDocumentaiV1DocumentRevisionHumanReview
   */
  public function setHumanReview(GoogleCloudDocumentaiV1DocumentRevisionHumanReview $humanReview)
  {
    $this->humanReview = $humanReview;
  }
  /**
   * @return GoogleCloudDocumentaiV1DocumentRevisionHumanReview
   */
  public function getHumanReview()
  {
    return $this->humanReview;
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
   * @param int[]
   */
  public function setParent($parent)
  {
    $this->parent = $parent;
  }
  /**
   * @return int[]
   */
  public function getParent()
  {
    return $this->parent;
  }
  /**
   * @param string[]
   */
  public function setParentIds($parentIds)
  {
    $this->parentIds = $parentIds;
  }
  /**
   * @return string[]
   */
  public function getParentIds()
  {
    return $this->parentIds;
  }
  /**
   * @param string
   */
  public function setProcessor($processor)
  {
    $this->processor = $processor;
  }
  /**
   * @return string
   */
  public function getProcessor()
  {
    return $this->processor;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDocumentaiV1DocumentRevision::class, 'Google_Service_Contentwarehouse_GoogleCloudDocumentaiV1DocumentRevision');
