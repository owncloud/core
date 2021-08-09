SCRIPT_PATH=$(dirname "$0")
SCRIPT_PATH=$( cd "${SCRIPT_PATH}" && pwd )  # normalized and made absolute
OWNCLOUD_CORE="owncloud/core"

# The recentBuilds.txt file contains all the information of the PR whose builds are recently running.
# Therefore, to filter out the BuildID and the Reference from all the recent builds which are running,
# the following awk command is used and the output containing the BuildId and the Reference of each
# builds/prs are stored in the filteredDescriptions.txt file.
awk "/Build #|Ref: refs\/pull/" ${SCRIPT_PATH}/../../recentBuilds.txt > ${SCRIPT_PATH}/filteredDescriptions.txt

# The thisBuildInfo.txt file contains the information of the current Build, including the BuildID, Reference, and
# other information of that particular build. To get the reference number/ pr number of the recent build,
# the following awk command and grep commands are used, where the Reference part ("Ref: refs/pull/5496/head")
# is stored in the "thisBuildFiltered.txt" file. From the reference, only the pr/reference number is extracted into
# the "NUMBER" variable.
awk "/Ref: refs\/pull/" ${SCRIPT_PATH}/../../thisBuildInfo.txt > ${SCRIPT_PATH}/thisBuildFiltered.txt
NUMBER=$(grep -o -E "[0-9]+" ${SCRIPT_PATH}/thisBuildFiltered.txt)
referenceNum="Ref: refs/pull/"$NUMBER"/head"

# From all the recent builds, the information about the BuildID and the reference which was stored in the
# "filteredDescriptions.txt" file, only the BuildID part from each of the buildInformation whose Reference is
# exactly same as that of the current build reference is filtered and stored in the "buildsToStop.txt" file.
# The buildIDs and the reference information of each build is stored sequentially in the "filteredDescriptions.txt" file as:

# "Build #<buildID-1>"
# "<ReferenceInformationOfBuildID-1>"
# "Build #<buildID-2>"
# "<ReferenceInformationOfBuildID-2>"
# "Build #<buildID-n>"
# "<ReferenceInformationOfBuildID-n>"

# Therefore the following awk command extracts each lines just above the expected reference information.
awk -v ref="$referenceNum" 'index($0,ref){print p} {p=$0}' ${SCRIPT_PATH}/filteredDescriptions.txt > ${SCRIPT_PATH}/buildsToStop.txt


# The "buildsToStop.txt" file now contains the buildIDs of the recent builds whose reference id was equal to the reference of the
# current pr/build.

# "Build #<BuildID-1>"
# "Build #<BuildID-2>"
# "Build #<BuildID-3>"
# "Build #<BuildID-4>"
# "Build #<BuildID-m>"

# For each build in the "buildsToStop.txt" file, if the build number is older than the current drone build number, the build is cancelled.

while IFS="" read -r p || [ -n "$p" ]
do
  printf '%s\n' "$p"
  buildNumber=$(echo "$p" | awk -F'#' '{print $(2)}')

 if [ $DRONE_BUILD_NUMBER \> "$buildNumber" ]
 then
   echo "CANCELLING BUILD: " $buildNumber
   drone build stop $OWNCLOUD_CORE $buildNumber
  fi

done <${SCRIPT_PATH}/buildsToStop.txt

