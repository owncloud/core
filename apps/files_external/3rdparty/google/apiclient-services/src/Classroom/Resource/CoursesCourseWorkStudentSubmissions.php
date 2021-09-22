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
use Google\Service\Classroom\ListStudentSubmissionsResponse;
use Google\Service\Classroom\ModifyAttachmentsRequest;
use Google\Service\Classroom\ReclaimStudentSubmissionRequest;
use Google\Service\Classroom\ReturnStudentSubmissionRequest;
use Google\Service\Classroom\StudentSubmission;
use Google\Service\Classroom\TurnInStudentSubmissionRequest;

/**
 * The "studentSubmissions" collection of methods.
 * Typical usage is:
 *  <code>
 *   $classroomService = new Google\Service\Classroom(...);
 *   $studentSubmissions = $classroomService->studentSubmissions;
 *  </code>
 */
class CoursesCourseWorkStudentSubmissions extends \Google\Service\Resource
{
  /**
   * Returns a student submission. * `PERMISSION_DENIED` if the requesting user is
   * not permitted to access the requested course, course work, or student
   * submission or for access errors. * `INVALID_ARGUMENT` if the request is
   * malformed. * `NOT_FOUND` if the requested course, course work, or student
   * submission does not exist. (studentSubmissions.get)
   *
   * @param string $courseId Identifier of the course. This identifier can be
   * either the Classroom-assigned identifier or an alias.
   * @param string $courseWorkId Identifier of the course work.
   * @param string $id Identifier of the student submission.
   * @param array $optParams Optional parameters.
   * @return StudentSubmission
   */
  public function get($courseId, $courseWorkId, $id, $optParams = [])
  {
    $params = ['courseId' => $courseId, 'courseWorkId' => $courseWorkId, 'id' => $id];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], StudentSubmission::class);
  }
  /**
   * Returns a list of student submissions that the requester is permitted to
   * view, factoring in the OAuth scopes of the request. `-` may be specified as
   * the `course_work_id` to include student submissions for multiple course work
   * items. Course students may only view their own work. Course teachers and
   * domain administrators may view all student submissions. This method returns
   * the following error codes: * `PERMISSION_DENIED` if the requesting user is
   * not permitted to access the requested course or course work, or for access
   * errors. * `INVALID_ARGUMENT` if the request is malformed. * `NOT_FOUND` if
   * the requested course does not exist.
   * (studentSubmissions.listCoursesCourseWorkStudentSubmissions)
   *
   * @param string $courseId Identifier of the course. This identifier can be
   * either the Classroom-assigned identifier or an alias.
   * @param string $courseWorkId Identifier of the student work to request. This
   * may be set to the string literal `"-"` to request student work for all course
   * work in the specified course.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string late Requested lateness value. If specified, returned
   * student submissions are restricted by the requested value. If unspecified,
   * submissions are returned regardless of `late` value.
   * @opt_param int pageSize Maximum number of items to return. Zero or
   * unspecified indicates that the server may assign a maximum. The server may
   * return fewer than the specified number of results.
   * @opt_param string pageToken nextPageToken value returned from a previous list
   * call, indicating that the subsequent page of results should be returned. The
   * list request must be otherwise identical to the one that resulted in this
   * token.
   * @opt_param string states Requested submission states. If specified, returned
   * student submissions match one of the specified submission states.
   * @opt_param string userId Optional argument to restrict returned student work
   * to those owned by the student with the specified identifier. The identifier
   * can be one of the following: * the numeric identifier for the user * the
   * email address of the user * the string literal `"me"`, indicating the
   * requesting user
   * @return ListStudentSubmissionsResponse
   */
  public function listCoursesCourseWorkStudentSubmissions($courseId, $courseWorkId, $optParams = [])
  {
    $params = ['courseId' => $courseId, 'courseWorkId' => $courseWorkId];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListStudentSubmissionsResponse::class);
  }
  /**
   * Modifies attachments of student submission. Attachments may only be added to
   * student submissions belonging to course work objects with a `workType` of
   * `ASSIGNMENT`. This request must be made by the Developer Console project of
   * the [OAuth client ID](https://support.google.com/cloud/answer/6158849) used
   * to create the corresponding course work item. This method returns the
   * following error codes: * `PERMISSION_DENIED` if the requesting user is not
   * permitted to access the requested course or course work, if the user is not
   * permitted to modify attachments on the requested student submission, or for
   * access errors. * `INVALID_ARGUMENT` if the request is malformed. *
   * `NOT_FOUND` if the requested course, course work, or student submission does
   * not exist. (studentSubmissions.modifyAttachments)
   *
   * @param string $courseId Identifier of the course. This identifier can be
   * either the Classroom-assigned identifier or an alias.
   * @param string $courseWorkId Identifier of the course work.
   * @param string $id Identifier of the student submission.
   * @param ModifyAttachmentsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return StudentSubmission
   */
  public function modifyAttachments($courseId, $courseWorkId, $id, ModifyAttachmentsRequest $postBody, $optParams = [])
  {
    $params = ['courseId' => $courseId, 'courseWorkId' => $courseWorkId, 'id' => $id, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('modifyAttachments', [$params], StudentSubmission::class);
  }
  /**
   * Updates one or more fields of a student submission. See
   * google.classroom.v1.StudentSubmission for details of which fields may be
   * updated and who may change them. This request must be made by the Developer
   * Console project of the [OAuth client
   * ID](https://support.google.com/cloud/answer/6158849) used to create the
   * corresponding course work item. This method returns the following error
   * codes: * `PERMISSION_DENIED` if the requesting developer project did not
   * create the corresponding course work, if the user is not permitted to make
   * the requested modification to the student submission, or for access errors. *
   * `INVALID_ARGUMENT` if the request is malformed. * `NOT_FOUND` if the
   * requested course, course work, or student submission does not exist.
   * (studentSubmissions.patch)
   *
   * @param string $courseId Identifier of the course. This identifier can be
   * either the Classroom-assigned identifier or an alias.
   * @param string $courseWorkId Identifier of the course work.
   * @param string $id Identifier of the student submission.
   * @param StudentSubmission $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Mask that identifies which fields on the student
   * submission to update. This field is required to do an update. The update
   * fails if invalid fields are specified. The following fields may be specified
   * by teachers: * `draft_grade` * `assigned_grade`
   * @return StudentSubmission
   */
  public function patch($courseId, $courseWorkId, $id, StudentSubmission $postBody, $optParams = [])
  {
    $params = ['courseId' => $courseId, 'courseWorkId' => $courseWorkId, 'id' => $id, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], StudentSubmission::class);
  }
  /**
   * Reclaims a student submission on behalf of the student that owns it.
   * Reclaiming a student submission transfers ownership of attached Drive files
   * to the student and updates the submission state. Only the student that owns
   * the requested student submission may call this method, and only for a student
   * submission that has been turned in. This request must be made by the
   * Developer Console project of the [OAuth client
   * ID](https://support.google.com/cloud/answer/6158849) used to create the
   * corresponding course work item. This method returns the following error
   * codes: * `PERMISSION_DENIED` if the requesting user is not permitted to
   * access the requested course or course work, unsubmit the requested student
   * submission, or for access errors. * `FAILED_PRECONDITION` if the student
   * submission has not been turned in. * `INVALID_ARGUMENT` if the request is
   * malformed. * `NOT_FOUND` if the requested course, course work, or student
   * submission does not exist. (studentSubmissions.reclaim)
   *
   * @param string $courseId Identifier of the course. This identifier can be
   * either the Classroom-assigned identifier or an alias.
   * @param string $courseWorkId Identifier of the course work.
   * @param string $id Identifier of the student submission.
   * @param ReclaimStudentSubmissionRequest $postBody
   * @param array $optParams Optional parameters.
   * @return ClassroomEmpty
   */
  public function reclaim($courseId, $courseWorkId, $id, ReclaimStudentSubmissionRequest $postBody, $optParams = [])
  {
    $params = ['courseId' => $courseId, 'courseWorkId' => $courseWorkId, 'id' => $id, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('reclaim', [$params], ClassroomEmpty::class);
  }
  /**
   * Returns a student submission. Returning a student submission transfers
   * ownership of attached Drive files to the student and may also update the
   * submission state. Unlike the Classroom application, returning a student
   * submission does not set assignedGrade to the draftGrade value. Only a teacher
   * of the course that contains the requested student submission may call this
   * method. This request must be made by the Developer Console project of the
   * [OAuth client ID](https://support.google.com/cloud/answer/6158849) used to
   * create the corresponding course work item. This method returns the following
   * error codes: * `PERMISSION_DENIED` if the requesting user is not permitted to
   * access the requested course or course work, return the requested student
   * submission, or for access errors. * `INVALID_ARGUMENT` if the request is
   * malformed. * `NOT_FOUND` if the requested course, course work, or student
   * submission does not exist.
   * (studentSubmissions.returnCoursesCourseWorkStudentSubmissions)
   *
   * @param string $courseId Identifier of the course. This identifier can be
   * either the Classroom-assigned identifier or an alias.
   * @param string $courseWorkId Identifier of the course work.
   * @param string $id Identifier of the student submission.
   * @param ReturnStudentSubmissionRequest $postBody
   * @param array $optParams Optional parameters.
   * @return ClassroomEmpty
   */
  public function returnCoursesCourseWorkStudentSubmissions($courseId, $courseWorkId, $id, ReturnStudentSubmissionRequest $postBody, $optParams = [])
  {
    $params = ['courseId' => $courseId, 'courseWorkId' => $courseWorkId, 'id' => $id, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('return', [$params], ClassroomEmpty::class);
  }
  /**
   * Turns in a student submission. Turning in a student submission transfers
   * ownership of attached Drive files to the teacher and may also update the
   * submission state. This may only be called by the student that owns the
   * specified student submission. This request must be made by the Developer
   * Console project of the [OAuth client
   * ID](https://support.google.com/cloud/answer/6158849) used to create the
   * corresponding course work item. This method returns the following error
   * codes: * `PERMISSION_DENIED` if the requesting user is not permitted to
   * access the requested course or course work, turn in the requested student
   * submission, or for access errors. * `INVALID_ARGUMENT` if the request is
   * malformed. * `NOT_FOUND` if the requested course, course work, or student
   * submission does not exist. (studentSubmissions.turnIn)
   *
   * @param string $courseId Identifier of the course. This identifier can be
   * either the Classroom-assigned identifier or an alias.
   * @param string $courseWorkId Identifier of the course work.
   * @param string $id Identifier of the student submission.
   * @param TurnInStudentSubmissionRequest $postBody
   * @param array $optParams Optional parameters.
   * @return ClassroomEmpty
   */
  public function turnIn($courseId, $courseWorkId, $id, TurnInStudentSubmissionRequest $postBody, $optParams = [])
  {
    $params = ['courseId' => $courseId, 'courseWorkId' => $courseWorkId, 'id' => $id, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('turnIn', [$params], ClassroomEmpty::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CoursesCourseWorkStudentSubmissions::class, 'Google_Service_Classroom_Resource_CoursesCourseWorkStudentSubmissions');
