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
 * The "annotationSpecSets" collection of methods.
 * Typical usage is:
 *  <code>
 *   $datalabelingService = new Google_Service_DataLabeling(...);
 *   $annotationSpecSets = $datalabelingService->annotationSpecSets;
 *  </code>
 */
class Google_Service_DataLabeling_Resource_ProjectsAnnotationSpecSets extends Google_Service_Resource
{
  /**
   * Creates an annotation spec set by providing a set of labels.
   * (annotationSpecSets.create)
   *
   * @param string $parent Required. AnnotationSpecSet resource parent, format:
   * projects/{project_id}
   * @param Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1CreateAnnotationSpecSetRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1AnnotationSpecSet
   */
  public function create($parent, Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1CreateAnnotationSpecSetRequest $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1AnnotationSpecSet");
  }
  /**
   * Deletes an annotation spec set by resource name. (annotationSpecSets.delete)
   *
   * @param string $name Required. AnnotationSpec resource name, format:
   * `projects/{project_id}/annotationSpecSets/{annotation_spec_set_id}`.
   * @param array $optParams Optional parameters.
   * @return Google_Service_DataLabeling_GoogleProtobufEmpty
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_DataLabeling_GoogleProtobufEmpty");
  }
  /**
   * Gets an annotation spec set by resource name. (annotationSpecSets.get)
   *
   * @param string $name Required. AnnotationSpecSet resource name, format:
   * projects/{project_id}/annotationSpecSets/{annotation_spec_set_id}
   * @param array $optParams Optional parameters.
   * @return Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1AnnotationSpecSet
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1AnnotationSpecSet");
  }
  /**
   * Lists annotation spec sets for a project. Pagination is supported.
   * (annotationSpecSets.listProjectsAnnotationSpecSets)
   *
   * @param string $parent Required. Parent of AnnotationSpecSet resource, format:
   * projects/{project_id}
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Optional. Filter is not supported at this moment.
   * @opt_param int pageSize Optional. Requested page size. Server may return
   * fewer results than requested. Default value is 100.
   * @opt_param string pageToken Optional. A token identifying a page of results
   * for the server to return. Typically obtained by
   * ListAnnotationSpecSetsResponse.next_page_token of the previous
   * [DataLabelingService.ListAnnotationSpecSets] call. Return first page if
   * empty.
   * @return Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1ListAnnotationSpecSetsResponse
   */
  public function listProjectsAnnotationSpecSets($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1ListAnnotationSpecSetsResponse");
  }
}
