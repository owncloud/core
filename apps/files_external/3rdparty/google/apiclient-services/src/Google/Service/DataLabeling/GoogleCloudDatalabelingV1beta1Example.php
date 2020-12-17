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

class Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1Example extends Google_Collection
{
  protected $collection_key = 'annotations';
  protected $annotationsType = 'Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1Annotation';
  protected $annotationsDataType = 'array';
  protected $imagePayloadType = 'Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1ImagePayload';
  protected $imagePayloadDataType = '';
  public $name;
  protected $textPayloadType = 'Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1TextPayload';
  protected $textPayloadDataType = '';
  protected $videoPayloadType = 'Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1VideoPayload';
  protected $videoPayloadDataType = '';

  /**
   * @param Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1Annotation[]
   */
  public function setAnnotations($annotations)
  {
    $this->annotations = $annotations;
  }
  /**
   * @return Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1Annotation[]
   */
  public function getAnnotations()
  {
    return $this->annotations;
  }
  /**
   * @param Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1ImagePayload
   */
  public function setImagePayload(Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1ImagePayload $imagePayload)
  {
    $this->imagePayload = $imagePayload;
  }
  /**
   * @return Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1ImagePayload
   */
  public function getImagePayload()
  {
    return $this->imagePayload;
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
   * @param Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1TextPayload
   */
  public function setTextPayload(Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1TextPayload $textPayload)
  {
    $this->textPayload = $textPayload;
  }
  /**
   * @return Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1TextPayload
   */
  public function getTextPayload()
  {
    return $this->textPayload;
  }
  /**
   * @param Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1VideoPayload
   */
  public function setVideoPayload(Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1VideoPayload $videoPayload)
  {
    $this->videoPayload = $videoPayload;
  }
  /**
   * @return Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1VideoPayload
   */
  public function getVideoPayload()
  {
    return $this->videoPayload;
  }
}
