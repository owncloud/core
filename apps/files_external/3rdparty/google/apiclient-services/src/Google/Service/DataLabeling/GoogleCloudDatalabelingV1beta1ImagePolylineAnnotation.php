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

class Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1ImagePolylineAnnotation extends Google_Model
{
  protected $annotationSpecType = 'Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1AnnotationSpec';
  protected $annotationSpecDataType = '';
  protected $normalizedPolylineType = 'Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1NormalizedPolyline';
  protected $normalizedPolylineDataType = '';
  protected $polylineType = 'Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1Polyline';
  protected $polylineDataType = '';

  /**
   * @param Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1AnnotationSpec
   */
  public function setAnnotationSpec(Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1AnnotationSpec $annotationSpec)
  {
    $this->annotationSpec = $annotationSpec;
  }
  /**
   * @return Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1AnnotationSpec
   */
  public function getAnnotationSpec()
  {
    return $this->annotationSpec;
  }
  /**
   * @param Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1NormalizedPolyline
   */
  public function setNormalizedPolyline(Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1NormalizedPolyline $normalizedPolyline)
  {
    $this->normalizedPolyline = $normalizedPolyline;
  }
  /**
   * @return Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1NormalizedPolyline
   */
  public function getNormalizedPolyline()
  {
    return $this->normalizedPolyline;
  }
  /**
   * @param Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1Polyline
   */
  public function setPolyline(Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1Polyline $polyline)
  {
    $this->polyline = $polyline;
  }
  /**
   * @return Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1Polyline
   */
  public function getPolyline()
  {
    return $this->polyline;
  }
}
