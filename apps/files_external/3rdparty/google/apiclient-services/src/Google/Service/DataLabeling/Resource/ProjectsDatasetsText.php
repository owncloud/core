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

/**
 * The "text" collection of methods.
 * Typical usage is:
 *  <code>
 *   $datalabelingService = new Google_Service_DataLabeling(...);
 *   $text = $datalabelingService->text;
 *  </code>
 */
class Google_Service_DataLabeling_Resource_ProjectsDatasetsText extends Google_Service_Resource
{
  /**
   * Starts a labeling task for text. The type of text labeling task is configured
   * by feature in the request. (text.label)
   *
   * @param string $parent Required. Name of the data set to request labeling
   * task, format: projects/{project_id}/datasets/{dataset_id}
   * @param Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1LabelTextRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_DataLabeling_GoogleLongrunningOperation
   */
  public function label($parent, Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1LabelTextRequest $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('label', array($params), "Google_Service_DataLabeling_GoogleLongrunningOperation");
  }
}
