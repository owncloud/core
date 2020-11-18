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

class Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1FeedbackMessage extends Google_Model
{
  public $body;
  public $createTime;
  public $image;
  public $name;
  protected $operatorFeedbackMetadataType = 'Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1OperatorFeedbackMetadata';
  protected $operatorFeedbackMetadataDataType = '';
  protected $requesterFeedbackMetadataType = 'Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1RequesterFeedbackMetadata';
  protected $requesterFeedbackMetadataDataType = '';

  public function setBody($body)
  {
    $this->body = $body;
  }
  public function getBody()
  {
    return $this->body;
  }
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
  }
  public function setImage($image)
  {
    $this->image = $image;
  }
  public function getImage()
  {
    return $this->image;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1OperatorFeedbackMetadata
   */
  public function setOperatorFeedbackMetadata(Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1OperatorFeedbackMetadata $operatorFeedbackMetadata)
  {
    $this->operatorFeedbackMetadata = $operatorFeedbackMetadata;
  }
  /**
   * @return Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1OperatorFeedbackMetadata
   */
  public function getOperatorFeedbackMetadata()
  {
    return $this->operatorFeedbackMetadata;
  }
  /**
   * @param Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1RequesterFeedbackMetadata
   */
  public function setRequesterFeedbackMetadata(Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1RequesterFeedbackMetadata $requesterFeedbackMetadata)
  {
    $this->requesterFeedbackMetadata = $requesterFeedbackMetadata;
  }
  /**
   * @return Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1RequesterFeedbackMetadata
   */
  public function getRequesterFeedbackMetadata()
  {
    return $this->requesterFeedbackMetadata;
  }
}
