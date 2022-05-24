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

namespace Google\Service\Classroom\Resource;

use Google\Service\Classroom\ClassroomEmpty;
use Google\Service\Classroom\Course;
use Google\Service\Classroom\ListCoursesResponse;

/**
 * The "courses" collection of methods.
 * Typical usage is:
 *  <code>
 *   $classroomService = new Google\Service\Classroom(...);
 *   $courses = $classroomService->courses;
 *  </code>
 */
class Courses extends \Google\Service\Resource
{
  /**
   * Creates a course. The user specified in `ownerId` is the owner of the created
   * course and added as a teacher. A non-admin requesting user can only create a
   * course with themselves as the owner. Domain admins can create courses owned
   * by any user within their domain. This method returns the following error
   * codes: * `PERMISSION_DENIED` if the requesting user is not permitted to
   * create courses or for access errors. * `NOT_FOUND` if the primary teacher is
   * not a valid user. * `FAILED_PRECONDITION` if the course owner's account is
   * disabled or for the following request errors: *
   * UserGroupsMembershipLimitReached * `ALREADY_EXISTS` if an alias was specified
   * in the `id` and already exists. (courses.create)
   *
   * @param Course $postBody
   * @param array $optParams Optional parameters.
   * @return Course
   */
  public function create(Course $postBody, $optParams = [])
  {
    $params = ['postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Course::class);
  }
  /**
   * Deletes a course. This method returns the following error codes: *
   * `PERMISSION_DENIED` if the requesting user is not permitted to delete the
   * requested course or for access errors. * `NOT_FOUND` if no course exists with
   * the requested ID. (courses.delete)
   *
   * @param string $id Identifier of the course to delete. This identifier can be
   * either the Classroom-assigned identifier or an alias.
   * @param array $optParams Optional parameters.
   * @return ClassroomEmpty
   */
  public function delete($id, $optParams = [])
  {
    $params = ['id' => $id];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], ClassroomEmpty::class);
  }
  /**
   * Returns a course. This method returns the following error codes: *
   * `PERMISSION_DENIED` if the requesting user is not permitted to access the
   * requested course or for access errors. * `NOT_FOUND` if no course exists with
   * the requested ID. (courses.get)
   *
   * @param string $id Identifier of the course to return. This identifier can be
   * either the Classroom-assigned identifier or an alias.
   * @param array $optParams Optional parameters.
   * @return Course
   */
  public function get($id, $optParams = [])
  {
    $params = ['id' => $id];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Course::class);
  }
  /**
   * Returns a list of courses that the requesting user is permitted to view,
   * restricted to those that match the request. Returned courses are ordered by
   * creation time, with the most recently created coming first. This method
   * returns the following error codes: * `PERMISSION_DENIED` for access errors. *
   * `INVALID_ARGUMENT` if the query argument is malformed. * `NOT_FOUND` if any
   * users specified in the query arguments do not exist. (courses.listCourses)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string courseStates Restricts returned courses to those in one of
   * the specified states The default value is ACTIVE, ARCHIVED, PROVISIONED,
   * DECLINED.
   * @opt_param int pageSize Maximum number of items to return. Zero or
   * unspecified indicates that the server may assign a maximum. The server may
   * return fewer than the specified number of results.
   * @opt_param string pageToken nextPageToken value returned from a previous list
   * call, indicating that the subsequent page of results should be returned. The
   * list request must be otherwise identical to the one that resulted in this
   * token.
   * @opt_param string studentId Restricts returned courses to those having a
   * student with the specified identifier. The identifier can be one of the
   * following: * the numeric identifier for the user * the email address of the
   * user * the string literal `"me"`, indicating the requesting user
   * @opt_param string teacherId Restricts returned courses to those having a
   * teacher with the specified identifier. The identifier can be one of the
   * following: * the numeric identifier for the user * the email address of the
   * user * the string literal `"me"`, indicating the requesting user
   * @return ListCoursesResponse
   */
  public function listCourses($optParams = [])
  {
    $params = [];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListCoursesResponse::class);
  }
  /**
   * Updates one or more fields in a course. This method returns the following
   * error codes: * `PERMISSION_DENIED` if the requesting user is not permitted to
   * modify the requested course or for access errors. * `NOT_FOUND` if no course
   * exists with the requested ID. * `INVALID_ARGUMENT` if invalid fields are
   * specified in the update mask or if no update mask is supplied. *
   * `FAILED_PRECONDITION` for the following request errors: * CourseNotModifiable
   * * InactiveCourseOwner (courses.patch)
   *
   * @param string $id Identifier of the course to update. This identifier can be
   * either the Classroom-assigned identifier or an alias.
   * @param Course $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Mask that identifies which fields on the course
   * to update. This field is required to do an update. The update will fail if
   * invalid fields are specified. The following fields are valid: * `name` *
   * `section` * `descriptionHeading` * `description` * `room` * `courseState` *
   * `ownerId` Note: patches to ownerId are treated as being effective
   * immediately, but in practice it may take some time for the ownership transfer
   * of all affected resources to complete. When set in a query parameter, this
   * field should be specified as `updateMask=,,...`
   * @return Course
   */
  public function patch($id, Course $postBody, $optParams = [])
  {
    $params = ['id' => $id, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], Course::class);
  }
  /**
   * Updates a course. This method returns the following error codes: *
   * `PERMISSION_DENIED` if the requesting user is not permitted to modify the
   * requested course or for access errors. * `NOT_FOUND` if no course exists with
   * the requested ID. * `FAILED_PRECONDITION` for the following request errors: *
   * CourseNotModifiable (courses.update)
   *
   * @param string $id Identifier of the course to update. This identifier can be
   * either the Classroom-assigned identifier or an alias.
   * @param Course $postBody
   * @param array $optParams Optional parameters.
   * @return Course
   */
  public function update($id, Course $postBody, $optParams = [])
  {
    $params = ['id' => $id, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('update', [$params], Course::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Courses::class, 'Google_Service_Classroom_Resource_Courses');
