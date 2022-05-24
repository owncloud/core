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

namespace Google\Service\DataLabeling;

class GoogleCloudDatalabelingV1beta1FeedbackMessage extends \Google\Model
{
  /**
   * @var string
   */
  public $body;
  /**
   * @var string
   */
  public $createTime;
  /**
   * @var string
   */
  public $image;
  /**
   * @var string
   */
  public $name;
  protected $operatorFeedbackMetadataType = GoogleCloudDatalabelingV1beta1OperatorFeedbackMetadata::class;
  protected $operatorFeedbackMetadataDataType = '';
  protected $requesterFeedbackMetadataType = GoogleCloudDatalabelingV1beta1RequesterFeedbackMetadata::class;
  protected $requesterFeedbackMetadataDataType = '';

  /**
   * @param string
   */
  public function setBody($body)
  {
    $this->body = $body;
  }
  /**
   * @return string
   */
  public function getBody()
  {
    return $this->body;
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
   * @param string
   */
  public function setImage($image)
  {
    $this->image = $image;
  }
  /**
   * @return string
   */
  public function getImage()
  {
    return $this->image;
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
   * @param GoogleCloudDatalabelingV1beta1OperatorFeedbackMetadata
   */
  public function setOperatorFeedbackMetadata(GoogleCloudDatalabelingV1beta1OperatorFeedbackMetadata $operatorFeedbackMetadata)
  {
    $this->operatorFeedbackMetadata = $operatorFeedbackMetadata;
  }
  /**
   * @return GoogleCloudDatalabelingV1beta1OperatorFeedbackMetadata
   */
  public function getOperatorFeedbackMetadata()
  {
    return $this->operatorFeedbackMetadata;
  }
  /**
   * @param GoogleCloudDatalabelingV1beta1RequesterFeedbackMetadata
   */
  public function setRequesterFeedbackMetadata(GoogleCloudDatalabelingV1beta1RequesterFeedbackMetadata $requesterFeedbackMetadata)
  {
    $this->requesterFeedbackMetadata = $requesterFeedbackMetadata;
  }
  /**
   * @return GoogleCloudDatalabelingV1beta1RequesterFeedbackMetadata
   */
  public function getRequesterFeedbackMetadata()
  {
    return $this->requesterFeedbackMetadata;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDatalabelingV1beta1FeedbackMessage::class, 'Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1FeedbackMessage');
