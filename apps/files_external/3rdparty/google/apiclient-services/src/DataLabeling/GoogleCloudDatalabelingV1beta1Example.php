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

class GoogleCloudDatalabelingV1beta1Example extends \Google\Collection
{
  protected $collection_key = 'annotations';
  protected $annotationsType = GoogleCloudDatalabelingV1beta1Annotation::class;
  protected $annotationsDataType = 'array';
  protected $imagePayloadType = GoogleCloudDatalabelingV1beta1ImagePayload::class;
  protected $imagePayloadDataType = '';
  public $name;
  protected $textPayloadType = GoogleCloudDatalabelingV1beta1TextPayload::class;
  protected $textPayloadDataType = '';
  protected $videoPayloadType = GoogleCloudDatalabelingV1beta1VideoPayload::class;
  protected $videoPayloadDataType = '';

  /**
   * @param GoogleCloudDatalabelingV1beta1Annotation[]
   */
  public function setAnnotations($annotations)
  {
    $this->annotations = $annotations;
  }
  /**
   * @return GoogleCloudDatalabelingV1beta1Annotation[]
   */
  public function getAnnotations()
  {
    return $this->annotations;
  }
  /**
   * @param GoogleCloudDatalabelingV1beta1ImagePayload
   */
  public function setImagePayload(GoogleCloudDatalabelingV1beta1ImagePayload $imagePayload)
  {
    $this->imagePayload = $imagePayload;
  }
  /**
   * @return GoogleCloudDatalabelingV1beta1ImagePayload
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
   * @param GoogleCloudDatalabelingV1beta1TextPayload
   */
  public function setTextPayload(GoogleCloudDatalabelingV1beta1TextPayload $textPayload)
  {
    $this->textPayload = $textPayload;
  }
  /**
   * @return GoogleCloudDatalabelingV1beta1TextPayload
   */
  public function getTextPayload()
  {
    return $this->textPayload;
  }
  /**
   * @param GoogleCloudDatalabelingV1beta1VideoPayload
   */
  public function setVideoPayload(GoogleCloudDatalabelingV1beta1VideoPayload $videoPayload)
  {
    $this->videoPayload = $videoPayload;
  }
  /**
   * @return GoogleCloudDatalabelingV1beta1VideoPayload
   */
  public function getVideoPayload()
  {
    return $this->videoPayload;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDatalabelingV1beta1Example::class, 'Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1Example');
