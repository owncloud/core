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
 * The "courseWorkMaterials" collection of methods.
 * Typical usage is:
 *  <code>
 *   $classroomService = new Google_Service_Classroom(...);
 *   $courseWorkMaterials = $classroomService->courseWorkMaterials;
 *  </code>
 */
class Google_Service_Classroom_Resource_CoursesCourseWorkMaterials extends Google_Service_Resource
{
  /**
   * Creates a course work material. This method returns the following error
   * codes: * `PERMISSION_DENIED` if the requesting user is not permitted to
   * access the requested course, create course work material in the requested
   * course, share a Drive attachment, or for access errors. * `INVALID_ARGUMENT`
   * if the request is malformed or if more than 20 * materials are provided. *
   * `NOT_FOUND` if the requested course does not exist. * `FAILED_PRECONDITION`
   * for the following request error: * AttachmentNotVisible
   * (courseWorkMaterials.create)
   *
   * @param string $courseId Identifier of the course. This identifier can be
   * either the Classroom-assigned identifier or an alias.
   * @param Google_Service_Classroom_CourseWorkMaterial $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Classroom_CourseWorkMaterial
   */
  public function create($courseId, Google_Service_Classroom_CourseWorkMaterial $postBody, $optParams = array())
  {
    $params = array('courseId' => $courseId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Classroom_CourseWorkMaterial");
  }
  /**
   * Deletes a course work material. This request must be made by the Developer
   * Console project of the [OAuth client
   * ID](https://support.google.com/cloud/answer/6158849) used to create the
   * corresponding course work material item. This method returns the following
   * error codes: * `PERMISSION_DENIED` if the requesting developer project did
   * not create the corresponding course work material, if the requesting user is
   * not permitted to delete the requested course or for access errors. *
   * `FAILED_PRECONDITION` if the requested course work material has already been
   * deleted. * `NOT_FOUND` if no course exists with the requested ID.
   * (courseWorkMaterials.delete)
   *
   * @param string $courseId Identifier of the course. This identifier can be
   * either the Classroom-assigned identifier or an alias.
   * @param string $id Identifier of the course work material to delete. This
   * identifier is a Classroom-assigned identifier.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Classroom_ClassroomEmpty
   */
  public function delete($courseId, $id, $optParams = array())
  {
    $params = array('courseId' => $courseId, 'id' => $id);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_Classroom_ClassroomEmpty");
  }
  /**
   * Returns a course work material. This method returns the following error
   * codes: * `PERMISSION_DENIED` if the requesting user is not permitted to
   * access the requested course or course work material, or for access errors. *
   * `INVALID_ARGUMENT` if the request is malformed. * `NOT_FOUND` if the
   * requested course or course work material does not exist.
   * (courseWorkMaterials.get)
   *
   * @param string $courseId Identifier of the course. This identifier can be
   * either the Classroom-assigned identifier or an alias.
   * @param string $id Identifier of the course work material.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Classroom_CourseWorkMaterial
   */
  public function get($courseId, $id, $optParams = array())
  {
    $params = array('courseId' => $courseId, 'id' => $id);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Classroom_CourseWorkMaterial");
  }
  /**
   * Returns a list of course work material that the requester is permitted to
   * view. Course students may only view `PUBLISHED` course work material. Course
   * teachers and domain administrators may view all course work material. This
   * method returns the following error codes: * `PERMISSION_DENIED` if the
   * requesting user is not permitted to access the requested course or for access
   * errors. * `INVALID_ARGUMENT` if the request is malformed. * `NOT_FOUND` if
   * the requested course does not exist.
   * (courseWorkMaterials.listCoursesCourseWorkMaterials)
   *
   * @param string $courseId Identifier of the course. This identifier can be
   * either the Classroom-assigned identifier or an alias.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string courseWorkMaterialStates Restriction on the work status to
   * return. Only course work material that matches is returned. If unspecified,
   * items with a work status of `PUBLISHED` is returned.
   * @opt_param string materialDriveId Optional filtering for course work material
   * with at least one Drive material whose ID matches the provided string. If
   * `material_link` is also specified, course work material must have materials
   * matching both filters.
   * @opt_param string materialLink Optional filtering for course work material
   * with at least one link material whose URL partially matches the provided
   * string.
   * @opt_param string orderBy Optional sort ordering for results. A comma-
   * separated list of fields with an optional sort direction keyword. Supported
   * field is `updateTime`. Supported direction keywords are `asc` and `desc`. If
   * not specified, `updateTime desc` is the default behavior. Examples:
   * `updateTime asc`, `updateTime`
   * @opt_param int pageSize Maximum number of items to return. Zero or
   * unspecified indicates that the server may assign a maximum. The server may
   * return fewer than the specified number of results.
   * @opt_param string pageToken nextPageToken value returned from a previous list
   * call, indicating that the subsequent page of results should be returned. The
   * list request must be otherwise identical to the one that resulted in this
   * token.
   * @return Google_Service_Classroom_ListCourseWorkMaterialResponse
   */
  public function listCoursesCourseWorkMaterials($courseId, $optParams = array())
  {
    $params = array('courseId' => $courseId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Classroom_ListCourseWorkMaterialResponse");
  }
  /**
   * Updates one or more fields of a course work material. This method returns the
   * following error codes: * `PERMISSION_DENIED` if the requesting developer
   * project for access errors. * `INVALID_ARGUMENT` if the request is malformed.
   * * `FAILED_PRECONDITION` if the requested course work material has already
   * been deleted. * `NOT_FOUND` if the requested course or course work material
   * does not exist (courseWorkMaterials.patch)
   *
   * @param string $courseId Identifier of the course. This identifier can be
   * either the Classroom-assigned identifier or an alias.
   * @param string $id Identifier of the course work material.
   * @param Google_Service_Classroom_CourseWorkMaterial $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Mask that identifies which fields on the course
   * work material to update. This field is required to do an update. The update
   * fails if invalid fields are specified. If a field supports empty values, it
   * can be cleared by specifying it in the update mask and not in the course work
   * material object. If a field that does not support empty values is included in
   * the update mask and not set in the course work material object, an
   * `INVALID_ARGUMENT` error is returned. The following fields may be specified
   * by teachers: * `title` * `description` * `state` * `scheduled_time` *
   * `topic_id`
   * @return Google_Service_Classroom_CourseWorkMaterial
   */
  public function patch($courseId, $id, Google_Service_Classroom_CourseWorkMaterial $postBody, $optParams = array())
  {
    $params = array('courseId' => $courseId, 'id' => $id, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_Classroom_CourseWorkMaterial");
  }
}
